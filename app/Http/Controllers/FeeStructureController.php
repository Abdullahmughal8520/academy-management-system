<?php

namespace App\Http\Controllers;

use App\Models\FeeStructure;
use App\Models\AcademyClass;
use App\Models\Group;
use Illuminate\Http\Request;

class FeeStructureController extends Controller
{
    /**
     * Display all fee structures.
     */
    public function index()
    {
        $feeStructures = FeeStructure::with([
            'academyClass',
            'group'
        ])
        ->latest()
        ->get();

        return view('fees.structures.index', compact('feeStructures'));
    }

    /**
     * Show create form.
     */
    public function create()
    {
        $classes = AcademyClass::orderBy('name')->get();
        $groups = Group::orderBy('name')->get();

        return view('fees.structures.create', compact(
            'classes',
            'groups'
        ));
    }

    /**
     * Store fee structure.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'academy_class_id' => 'required|exists:academy_classes,id',
            'group_id' => 'nullable|exists:groups,id',

            'monthly_fee' => 'required|numeric|min:0',
            'admission_fee' => 'nullable|numeric|min:0',
            'exam_fee' => 'nullable|numeric|min:0',
            'other_fee' => 'nullable|numeric|min:0',
            'default_discount' => 'nullable|numeric|min:0',

            'effective_from' => 'nullable|date',
            'status' => 'nullable|boolean',
        ]);

        $validated['admission_fee'] = $validated['admission_fee'] ?? 0;
        $validated['exam_fee'] = $validated['exam_fee'] ?? 0;
        $validated['other_fee'] = $validated['other_fee'] ?? 0;
        $validated['default_discount'] = $validated['default_discount'] ?? 0;
        $validated['status'] = $request->has('status');

        FeeStructure::create($validated);

        return redirect()
            ->route('fee-structures.index')
            ->with('success', 'Fee structure created successfully.');
    }

    /**
     * Show edit form.
     */
    public function edit(FeeStructure $feeStructure)
    {
        $classes = AcademyClass::orderBy('name')->get();
        $groups = Group::orderBy('name')->get();

        return view('fees.structures.edit', compact(
            'feeStructure',
            'classes',
            'groups'
        ));
    }

    /**
     * Update fee structure.
     */
    public function update(Request $request, FeeStructure $feeStructure)
    {
        $validated = $request->validate([
            'academy_class_id' => 'required|exists:academy_classes,id',
            'group_id' => 'nullable|exists:groups,id',

            'monthly_fee' => 'required|numeric|min:0',
            'admission_fee' => 'nullable|numeric|min:0',
            'exam_fee' => 'nullable|numeric|min:0',
            'other_fee' => 'nullable|numeric|min:0',
            'default_discount' => 'nullable|numeric|min:0',

            'effective_from' => 'nullable|date',
            'status' => 'nullable|boolean',
        ]);

        $validated['admission_fee'] = $validated['admission_fee'] ?? 0;
        $validated['exam_fee'] = $validated['exam_fee'] ?? 0;
        $validated['other_fee'] = $validated['other_fee'] ?? 0;
        $validated['default_discount'] = $validated['default_discount'] ?? 0;
        $validated['status'] = $request->has('status');

        $feeStructure->update($validated);

        return redirect()
            ->route('fee-structures.index')
            ->with('success', 'Fee structure updated successfully.');
    }

    /**
     * Delete fee structure.
     */
    public function destroy(FeeStructure $feeStructure)
    {
        if ($feeStructure->fees()->exists()) {
            return back()->with(
                'error',
                'This fee structure is already being used and cannot be deleted.'
            );
        }

        $feeStructure->delete();

        return redirect()
            ->route('fee-structures.index')
            ->with('success', 'Fee structure deleted successfully.');
    }
}