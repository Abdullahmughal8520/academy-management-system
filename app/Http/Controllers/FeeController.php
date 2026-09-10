<?php

namespace App\Http\Controllers;

use App\Models\Fee;
use App\Models\Student;
use App\Models\FeeStructure;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class FeeController extends Controller
{
    /**
     * Display all fees.
     */
    public function index(Request $request)
    {
        $query = Fee::with([
            'student',
            'feeStructure',
            'payments'
        ]);

        /*
        |--------------------------------------------------------------------------
        | Search Student
        |--------------------------------------------------------------------------
        */

        if ($request->filled('search')) {
            $search = $request->search;

            $query->whereHas('student', function ($q) use ($search) {
                $q->where('student_code', 'like', "%{$search}%")
                    ->orWhere('first_name', 'like', "%{$search}%")
                    ->orWhere('last_name', 'like', "%{$search}%");
            });
        }

        /*
        |--------------------------------------------------------------------------
        | Filter Month
        |--------------------------------------------------------------------------
        */

        if ($request->filled('month')) {
            $query->where('fee_month', $request->month);
        }

        /*
        |--------------------------------------------------------------------------
        | Filter Status
        |--------------------------------------------------------------------------
        */

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $fees = $query
            ->latest()
            ->paginate(20)
            ->withQueryString();

        return view('fees.index', compact('fees'));
    }

    /**
     * Show create fee form.
     */
    public function create()
    {
        $students = Student::with([
            'academyClass',
            'group'
        ])
        ->where('status', 'active')
        ->orderBy('first_name')
        ->get();

        $feeStructures = FeeStructure::with([
            'academyClass',
            'group'
        ])
        ->where('status', true)
        ->latest()
        ->get();

        return view('fees.create', compact(
            'students',
            'feeStructures'
        ));
    }

    /**
     * Store a new fee.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'student_id' => 'required|exists:students,id',
            'fee_structure_id' => 'nullable|exists:fee_structures,id',

            'fee_month' => [
                'required',
                'date_format:Y-m',
            ],

            'total_amount' => 'required|numeric|min:0',
            'discount' => 'nullable|numeric|min:0',
            'due_date' => 'nullable|date|after_or_equal:today',
            'remarks' => 'nullable|string|max:1000',
        ]);

        /*
        |--------------------------------------------------------------------------
        | Prevent Duplicate Monthly Fee
        |--------------------------------------------------------------------------
        */

        $alreadyExists = Fee::where('student_id', $validated['student_id'])
            ->where('fee_month', $validated['fee_month'])
            ->exists();

        if ($alreadyExists) {
            return back()
                ->withInput()
                ->withErrors([
                    'fee_month' => 'Fee for this student and month already exists.'
                ]);
        }

        /*
        |--------------------------------------------------------------------------
        | Calculate Payable Amount
        |--------------------------------------------------------------------------
        */

        $totalAmount = (float) $validated['total_amount'];
        $discount = (float) ($validated['discount'] ?? 0);

        if ($discount > $totalAmount) {
            return back()
                ->withInput()
                ->withErrors([
                    'discount' => 'Discount cannot be greater than total amount.'
                ]);
        }

        $payableAmount = $totalAmount - $discount;

        Fee::create([
            'student_id' => $validated['student_id'],
            'fee_structure_id' => $validated['fee_structure_id'] ?? null,

            'fee_month' => $validated['fee_month'],

            'total_amount' => $totalAmount,
            'discount' => $discount,
            'payable_amount' => $payableAmount,

            'paid_amount' => 0,
            'remaining_amount' => $payableAmount,

            'due_date' => $validated['due_date'] ?? null,

            'status' => 'unpaid',

            'remarks' => $validated['remarks'] ?? null,
        ]);

        return redirect()
            ->route('fees.index')
            ->with('success', 'Fee generated successfully.');
    }

    /**
     * Show fee details.
     */
    public function show(Fee $fee)
    {
        $fee->load([
            'student',
            'student.academyClass',
            'student.group',
            'feeStructure',
            'payments'
        ]);

        return view('fees.show', compact('fee'));
    }

    /**
     * Show edit form.
     */
    public function edit(Fee $fee)
    {
        $fee->load('student');

        $feeStructures = FeeStructure::with([
            'academyClass',
            'group'
        ])
        ->where('status', true)
        ->latest()
        ->get();

        return view('fees.edit', compact(
            'fee',
            'feeStructures'
        ));
    }

    /**
     * Update fee.
     */
    public function update(Request $request, Fee $fee)
    {
        $validated = $request->validate([
            'fee_structure_id' => 'nullable|exists:fee_structures,id',

            'fee_month' => [
                'required',
                'date_format:Y-m',
            ],

            'total_amount' => 'required|numeric|min:0',
            'discount' => 'nullable|numeric|min:0',

            'due_date' => 'nullable|date',

            'remarks' => 'nullable|string|max:1000',
        ]);

        /*
        |--------------------------------------------------------------------------
        | Check Duplicate Month
        |--------------------------------------------------------------------------
        */

        $alreadyExists = Fee::where('student_id', $fee->student_id)
            ->where('fee_month', $validated['fee_month'])
            ->where('id', '!=', $fee->id)
            ->exists();

        if ($alreadyExists) {
            return back()
                ->withInput()
                ->withErrors([
                    'fee_month' => 'Another fee for this student and month already exists.'
                ]);
        }

        $totalAmount = (float) $validated['total_amount'];
        $discount = (float) ($validated['discount'] ?? 0);

        if ($discount > $totalAmount) {
            return back()
                ->withInput()
                ->withErrors([
                    'discount' => 'Discount cannot be greater than total amount.'
                ]);
        }

        $payableAmount = $totalAmount - $discount;

        /*
        |--------------------------------------------------------------------------
        | Existing Payments
        |--------------------------------------------------------------------------
        */

        $paidAmount = (float) $fee->paid_amount;

        if ($paidAmount > $payableAmount) {
            return back()
                ->withInput()
                ->withErrors([
                    'total_amount' => 'Payable amount cannot be less than already paid amount.'
                ]);
        }

        $remainingAmount = $payableAmount - $paidAmount;

        /*
        |--------------------------------------------------------------------------
        | Determine Status
        |--------------------------------------------------------------------------
        */

        if ($remainingAmount <= 0) {
            $status = 'paid';
        } elseif ($paidAmount > 0) {
            $status = 'partial';
        } else {
            $status = 'unpaid';
        }

        if (
            $status !== 'paid' &&
            $validated['due_date'] &&
            Carbon::parse($validated['due_date'])->isPast()
        ) {
            $status = 'overdue';
        }

        $fee->update([
            'fee_structure_id' => $validated['fee_structure_id'] ?? null,

            'fee_month' => $validated['fee_month'],

            'total_amount' => $totalAmount,
            'discount' => $discount,
            'payable_amount' => $payableAmount,

            'remaining_amount' => $remainingAmount,

            'due_date' => $validated['due_date'] ?? null,

            'status' => $status,

            'remarks' => $validated['remarks'] ?? null,
        ]);

        return redirect()
            ->route('fees.show', $fee)
            ->with('success', 'Fee updated successfully.');
    }

    /**
     * Delete fee.
     */
    public function destroy(Fee $fee)
    {
        if ($fee->payments()->exists()) {
            return back()->with(
                'error',
                'This fee has payments and cannot be deleted.'
            );
        }

        $fee->delete();

        return redirect()
            ->route('fees.index')
            ->with('success', 'Fee deleted successfully.');
    }
}