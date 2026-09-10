<?php

namespace App\Http\Controllers;

use App\Models\Fee;
use App\Models\FeePayment;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class FeePaymentController extends Controller
{
    /**
     * Show students who have pending fees.
     */
   public function create(Request $request)
{
    $search = trim($request->input('search', ''));

    $query = Student::with([
        'academyClass',
        'group',
        'fees' => function ($query) {
            $query->where('remaining_amount', '>', 0)
                ->orderBy('fee_month', 'desc');
        }
    ])
    ->whereHas('fees', function ($query) {
        $query->where('remaining_amount', '>', 0);
    });

    /*
    |--------------------------------------------------------------------------
    | SEARCH STUDENT
    |--------------------------------------------------------------------------
    */

    if ($search !== '') {

        $query->where(function ($q) use ($search) {

            $q->where('student_code', 'like', '%' . $search . '%')

                ->orWhere('first_name', 'like', '%' . $search . '%')

                ->orWhere('last_name', 'like', '%' . $search . '%')

                ->orWhereRaw(
                    "CONCAT(first_name, ' ', last_name) LIKE ?",
                    ['%' . $search . '%']
                );
        });
    }

    /*
    |--------------------------------------------------------------------------
    | STUDENTS
    |--------------------------------------------------------------------------
    */

    $students = $query
        ->orderBy('first_name')
        ->orderBy('last_name')
        ->paginate(15)
        ->withQueryString();

    return view(
        'fees.payments.select',
        compact('students')
    );
}


    /**
     * Show payment form for selected fee.
     */
    public function paymentForm(Fee $fee)
    {
        $fee->load([
            'student',
            'student.academyClass',
            'student.group',
            'payments'
        ]);

        /*
        |--------------------------------------------------------------------------
        | Already Paid
        |--------------------------------------------------------------------------
        */
        if ((float) $fee->remaining_amount <= 0) {

            return redirect()
                ->route('fee-payments.create')
                ->with(
                    'error',
                    'This fee has already been fully paid.'
                );
        }

        return view(
            'fees.payments.create',
            compact('fee')
        );
    }


    /**
     * Store payment.
     */
    public function store(Request $request, Fee $fee)
    {
        $validated = $request->validate([

            'amount' => [
                'required',
                'numeric',
                'min:0.01',
                'max:' . $fee->remaining_amount,
            ],

            'payment_date' => [
                'required',
                'date',
            ],

            'payment_method' => [
                'required',
                'in:cash,bank,online',
            ],

            'transaction_reference' => [
                'nullable',
                'string',
                'max:255',
            ],

            'remarks' => [
                'nullable',
                'string',
                'max:1000',
            ],
        ]);


        /*
        |--------------------------------------------------------------------------
        | Payment Transaction
        |--------------------------------------------------------------------------
        */
        DB::transaction(function () use ($validated, $fee) {

            /*
            |--------------------------------------------------------------------------
            | Generate Unique Receipt Number
            |--------------------------------------------------------------------------
            */
            do {

                $receiptNumber =
                    'REC-' .
                    now()->format('Ym') .
                    '-' .
                    strtoupper(
                        Str::random(6)
                    );

            } while (
                FeePayment::where(
                    'receipt_number',
                    $receiptNumber
                )->exists()
            );


            /*
            |--------------------------------------------------------------------------
            | Create Payment
            |--------------------------------------------------------------------------
            */
            FeePayment::create([

                'fee_id' => $fee->id,

                'receipt_number' =>
                    $receiptNumber,

                'amount' =>
                    $validated['amount'],

                'payment_date' =>
                    $validated['payment_date'],

                'payment_method' =>
                    $validated['payment_method'],

                'transaction_reference' =>
                    $validated['transaction_reference']
                    ?? null,

                'remarks' =>
                    $validated['remarks']
                    ?? null,
            ]);


            /*
            |--------------------------------------------------------------------------
            | Calculate New Balance
            |--------------------------------------------------------------------------
            */
            $newPaidAmount =
                (float) $fee->paid_amount
                +
                (float) $validated['amount'];


            $remainingAmount =
                (float) $fee->payable_amount
                -
                $newPaidAmount;


            /*
            |--------------------------------------------------------------------------
            | Status
            |--------------------------------------------------------------------------
            */
            if ($remainingAmount <= 0) {

                $remainingAmount = 0;

                $status = 'paid';

            } else {

                $status = 'partial';
            }


            /*
            |--------------------------------------------------------------------------
            | Update Fee
            |--------------------------------------------------------------------------
            */
            $fee->update([

                'paid_amount' =>
                    $newPaidAmount,

                'remaining_amount' =>
                    $remainingAmount,

                'status' =>
                    $status,
            ]);
        });


        /*
        |--------------------------------------------------------------------------
        | Success
        |--------------------------------------------------------------------------
        */
        return redirect()
            ->route('fees.show', $fee)
            ->with(
                'success',
                'Payment received successfully.'
            );
    }


    /**
     * Show printable receipt.
     */
    public function receipt(FeePayment $feePayment)
    {
        $feePayment->load([

            'fee',

            'fee.student',

            'fee.student.academyClass',

            'fee.student.group',
        ]);

        return view(
            'fees.payments.receipt',
            compact('feePayment')
        );
    }
}