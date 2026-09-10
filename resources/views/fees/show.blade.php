@extends('layouts.app')

@section('title', 'Fee Details')

@section('content')

<style>
    /* =========================================================
       FEE DETAILS PAGE
       ========================================================= */

    body:has(.fee-show-page) {
        background: #080e17 !important;
    }

    body:has(.fee-show-page) .main-wrapper {
        background: #080e17 !important;
    }

    body:has(.fee-show-page) .page-content {
        background: #080e17 !important;
        padding: 18px 20px 30px 20px !important;
        margin: 0 !important;
        min-height: calc(100vh - 76px) !important;
    }

    .fee-show-page {
        color: #dbe4f2;
        max-width: 1200px;
        margin: 0 auto;
    }

    /* Header */

    .fee-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 15px;
        margin-bottom: 22px;
    }

    .fee-title {
        display: flex;
        align-items: center;
        gap: 13px;
    }

    .fee-icon {
        width: 48px;
        height: 48px;
        border-radius: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(
            135deg,
            #7c3aed,
            #9333ea
        );
        color: white;
        font-size: 21px;
        box-shadow: 0 8px 25px rgba(124,58,237,.25);
    }

    .fee-title h1 {
        margin: 0;
        color: #f8fafc;
        font-size: 25px;
        font-weight: 700;
    }

    .fee-title p {
        margin: 4px 0 0;
        color: #718096;
        font-size: 13px;
    }

    .header-actions {
        display: flex;
        gap: 9px;
        flex-wrap: wrap;
    }

    .action-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        padding: 10px 15px;
        border-radius: 10px;
        text-decoration: none;
        font-size: 13px;
        font-weight: 600;
        transition: .2s;
    }

    .back-btn {
        color: #cbd5e1 !important;
        background: #101827;
        border: 1px solid #263448;
    }

    .back-btn:hover {
        background: #172234;
        color: #fff !important;
    }

    .edit-btn {
        color: #c4b5fd !important;
        background: rgba(124,58,237,.10);
        border: 1px solid rgba(124,58,237,.30);
    }

    .edit-btn:hover {
        background: rgba(124,58,237,.18);
        color: #ddd6fe !important;
    }

    .payment-btn {
        color: #34d399 !important;
        background: rgba(52,211,153,.08);
        border: 1px solid rgba(52,211,153,.25);
    }

    .payment-btn:hover {
        background: rgba(52,211,153,.14);
    }

    /* Main grid */

    .details-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 18px;
    }

    .card {
        background: #0d1522;
        border: 1px solid #1b2636;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 15px 40px rgba(0,0,0,.16);
    }

    .card-header {
        padding: 17px 20px;
        border-bottom: 1px solid #1b2636;
        background: #0f1826;
    }

    .card-header h2 {
        margin: 0;
        color: #f8fafc;
        font-size: 15px;
        font-weight: 700;
    }

    .card-body {
        padding: 20px;
    }

    /* Student information */

    .student-info {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 16px;
    }

    .info-item {
        padding: 13px;
        border-radius: 10px;
        background: #09111d;
        border: 1px solid #1b2636;
    }

    .info-label {
        color: #64748b;
        font-size: 11px;
        margin-bottom: 5px;
    }

    .info-value {
        color: #e2e8f0;
        font-size: 14px;
        font-weight: 600;
    }

    /* Fee summary */

    .fee-summary {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 13px;
    }

    .summary-item {
        padding: 14px;
        border-radius: 11px;
        background: #09111d;
        border: 1px solid #1b2636;
    }

    .summary-label {
        color: #64748b;
        font-size: 11px;
        margin-bottom: 5px;
    }

    .summary-value {
        color: #e2e8f0;
        font-size: 18px;
        font-weight: 700;
    }

    .summary-item.payable {
        border-color: rgba(124,58,237,.35);
        background: rgba(124,58,237,.07);
    }

    .summary-item.payable .summary-value {
        color: #a78bfa;
    }

    .summary-item.paid {
        border-color: rgba(52,211,153,.25);
        background: rgba(52,211,153,.05);
    }

    .summary-item.paid .summary-value {
        color: #34d399;
    }

    .summary-item.remaining {
        border-color: rgba(248,113,113,.25);
        background: rgba(248,113,113,.05);
    }

    .summary-item.remaining .summary-value {
        color: #f87171;
    }

    /* Status */

    .status {
        display: inline-flex;
        align-items: center;
        padding: 5px 10px;
        border-radius: 20px;
        font-size: 11px;
        font-weight: 700;
        text-transform: capitalize;
    }

    .status-paid {
        color: #34d399;
        background: rgba(52,211,153,.10);
        border: 1px solid rgba(52,211,153,.20);
    }

    .status-partial {
        color: #fbbf24;
        background: rgba(251,191,36,.10);
        border: 1px solid rgba(251,191,36,.20);
    }

    .status-unpaid {
        color: #f87171;
        background: rgba(248,113,113,.10);
        border: 1px solid rgba(248,113,113,.20);
    }

    .status-overdue {
        color: #fb7185;
        background: rgba(244,63,94,.10);
        border: 1px solid rgba(244,63,94,.20);
    }

    /* Payment history */

    .payment-card {
        grid-column: 1 / -1;
    }

    .payment-table-wrapper {
        overflow-x: auto;
    }

    .payment-table {
        width: 100%;
        border-collapse: collapse;
    }

    .payment-table th {
        padding: 12px 14px;
        text-align: left;
        color: #64748b;
        font-size: 11px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: .04em;
        border-bottom: 1px solid #1b2636;
        white-space: nowrap;
    }

    .payment-table td {
        padding: 14px;
        color: #cbd5e1;
        font-size: 12px;
        border-bottom: 1px solid #172233;
        white-space: nowrap;
    }

    .payment-table tbody tr:hover {
        background: rgba(255,255,255,.015);
    }

    .receipt-number {
        color: #a78bfa;
        font-weight: 700;
    }

    .payment-amount {
        color: #34d399;
        font-weight: 700;
    }

    .receipt-btn {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 7px 10px;
        border-radius: 8px;
        text-decoration: none;
        color: #c4b5fd !important;
        background: rgba(124,58,237,.08);
        border: 1px solid rgba(124,58,237,.20);
        font-size: 11px;
        font-weight: 600;
    }

    .receipt-btn:hover {
        background: rgba(124,58,237,.16);
    }

    .empty-payments {
        padding: 35px 20px;
        text-align: center;
        color: #64748b;
        font-size: 13px;
    }

    .empty-payments i {
        display: block;
        margin-bottom: 9px;
        font-size: 27px;
    }

    /* Remarks */

    .remarks {
        margin-top: 16px;
        padding: 14px;
        border-radius: 10px;
        background: #09111d;
        border: 1px solid #1b2636;
    }

    .remarks-label {
        color: #64748b;
        font-size: 11px;
        margin-bottom: 6px;
    }

    .remarks-text {
        color: #cbd5e1;
        font-size: 13px;
        line-height: 1.6;
        white-space: pre-wrap;
    }

    /* Responsive */

    @media (max-width: 800px) {

        .fee-header {
            flex-direction: column;
            align-items: flex-start;
        }

        .details-grid {
            grid-template-columns: 1fr;
        }

        .payment-card {
            grid-column: auto;
        }

        .student-info,
        .fee-summary {
            grid-template-columns: 1fr;
        }

        .header-actions {
            width: 100%;
        }

        .action-btn {
            flex: 1;
        }
    }
</style>


<div class="fee-show-page">

    {{-- HEADER --}}
    <div class="fee-header">

        <div class="fee-title">

            <div class="fee-icon">
                <i class="bi bi-receipt"></i>
            </div>

            <div>
                <h1>Fee Details</h1>
                <p>
                    View student fee and payment information
                </p>
            </div>

        </div>


        <div class="header-actions">

            <a
                href="{{ route('fees.index') }}"
                class="action-btn back-btn"
            >
                <i class="bi bi-arrow-left"></i>
                Back
            </a>


            <a
                href="{{ route('fees.edit', $fee) }}"
                class="action-btn edit-btn"
            >
                <i class="bi bi-pencil"></i>
                Edit Fee
            </a>


            @if((float) $fee->remaining_amount > 0)

                <a
                    href="{{ route('fees.payments.create', $fee) }}"
                    class="action-btn payment-btn"
                >
                    <i class="bi bi-cash-coin"></i>
                    Receive Payment
                </a>

            @endif

        </div>

    </div>


    {{-- MAIN GRID --}}
    <div class="details-grid">


        {{-- STUDENT INFORMATION --}}
        <div class="card">

            <div class="card-header">
                <h2>
                    <i class="bi bi-person"></i>
                    Student Information
                </h2>
            </div>

            <div class="card-body">

                <div class="student-info">

                    <div class="info-item">

                        <div class="info-label">
                            Student Name
                        </div>

                        <div class="info-value">
                            {{ $fee->student->first_name ?? '' }}
                            {{ $fee->student->last_name ?? '' }}
                        </div>

                    </div>


                    <div class="info-item">

                        <div class="info-label">
                            Student Code
                        </div>

                        <div class="info-value">
                            {{ $fee->student->student_code ?? '—' }}
                        </div>

                    </div>


                    <div class="info-item">

                        <div class="info-label">
                            Class
                        </div>

                        <div class="info-value">
                            {{ $fee->student->academyClass->name ?? '—' }}
                        </div>

                    </div>


                    <div class="info-item">

                        <div class="info-label">
                            Group
                        </div>

                        <div class="info-value">
                            {{ $fee->student->group->name ?? '—' }}
                        </div>

                    </div>


                    <div class="info-item">

                        <div class="info-label">
                            Fee Month
                        </div>

                        <div class="info-value">
                            {{ \Carbon\Carbon::createFromFormat(
                                'Y-m',
                                $fee->fee_month
                            )->format('F Y') }}
                        </div>

                    </div>


                    <div class="info-item">

                        <div class="info-label">
                            Due Date
                        </div>

                        <div class="info-value">
                            @if($fee->due_date)
                                {{ $fee->due_date->format('d M Y') }}
                            @else
                                —
                            @endif
                        </div>

                    </div>


                    <div class="info-item">

                        <div class="info-label">
                            Fee Structure
                        </div>

                        <div class="info-value">
                            @if($fee->feeStructure)

                                {{ $fee->feeStructure->academyClass->name ?? 'Class' }}

                                @if($fee->feeStructure->group)
                                    — {{ $fee->feeStructure->group->name }}
                                @endif

                            @else
                                —
                            @endif
                        </div>

                    </div>


                    <div class="info-item">

                        <div class="info-label">
                            Status
                        </div>

                        <div class="info-value">

                            <span class="status status-{{ $fee->status }}">
                                {{ $fee->status }}
                            </span>

                        </div>

                    </div>

                </div>


                @if($fee->remarks)

                    <div class="remarks">

                        <div class="remarks-label">
                            Remarks
                        </div>

                        <div class="remarks-text">
                            {{ $fee->remarks }}
                        </div>

                    </div>

                @endif

            </div>

        </div>


        {{-- FEE SUMMARY --}}
        <div class="card">

            <div class="card-header">
                <h2>
                    <i class="bi bi-calculator"></i>
                    Fee Summary
                </h2>
            </div>

            <div class="card-body">

                <div class="fee-summary">

                    <div class="summary-item">

                        <div class="summary-label">
                            Total Amount
                        </div>

                        <div class="summary-value">
                            Rs.
                            {{ number_format(
                                (float) $fee->total_amount,
                                2
                            ) }}
                        </div>

                    </div>


                    <div class="summary-item">

                        <div class="summary-label">
                            Discount
                        </div>

                        <div class="summary-value">
                            Rs.
                            {{ number_format(
                                (float) $fee->discount,
                                2
                            ) }}
                        </div>

                    </div>


                    <div class="summary-item payable">

                        <div class="summary-label">
                            Payable Amount
                        </div>

                        <div class="summary-value">
                            Rs.
                            {{ number_format(
                                (float) $fee->payable_amount,
                                2
                            ) }}
                        </div>

                    </div>


                    <div class="summary-item paid">

                        <div class="summary-label">
                            Paid Amount
                        </div>

                        <div class="summary-value">
                            Rs.
                            {{ number_format(
                                (float) $fee->paid_amount,
                                2
                            ) }}
                        </div>

                    </div>


                    <div class="summary-item remaining">

                        <div class="summary-label">
                            Remaining Amount
                        </div>

                        <div class="summary-value">
                            Rs.
                            {{ number_format(
                                (float) $fee->remaining_amount,
                                2
                            ) }}
                        </div>

                    </div>


                    <div class="summary-item">

                        <div class="summary-label">
                            Created
                        </div>

                        <div class="summary-value">
                            {{ $fee->created_at->format('d M Y') }}
                        </div>

                    </div>

                </div>

            </div>

        </div>


        {{-- PAYMENT HISTORY --}}
        <div class="card payment-card">

            <div class="card-header">
                <h2>
                    <i class="bi bi-clock-history"></i>
                    Payment History
                </h2>
            </div>


            @if($fee->payments->count())

                <div class="payment-table-wrapper">

                    <table class="payment-table">

                        <thead>

                            <tr>
                                <th>Receipt</th>
                                <th>Amount</th>
                                <th>Date</th>
                                <th>Method</th>
                                <th>Reference</th>
                                <th>Action</th>
                            </tr>

                        </thead>


                        <tbody>

                            @foreach($fee->payments as $payment)

                                <tr>

                                    <td>
                                        <span class="receipt-number">
                                            {{ $payment->receipt_number }}
                                        </span>
                                    </td>


                                    <td>
                                        <span class="payment-amount">
                                            Rs.
                                            {{ number_format(
                                                (float) $payment->amount,
                                                2
                                            ) }}
                                        </span>
                                    </td>


                                    <td>
                                        {{ $payment->payment_date
                                            ? $payment->payment_date->format('d M Y')
                                            : '—'
                                        }}
                                    </td>


                                    <td>
                                        {{ ucfirst($payment->payment_method) }}
                                    </td>


                                    <td>
                                        {{ $payment->transaction_reference ?? '—' }}
                                    </td>


                                    <td>

                                        <a
                                            href="{{ route(
                                                'fee-payments.receipt',
                                                $payment
                                            ) }}"
                                            class="receipt-btn"
                                        >
                                            <i class="bi bi-printer"></i>
                                            Receipt
                                        </a>

                                    </td>

                                </tr>

                            @endforeach

                        </tbody>

                    </table>

                </div>

            @else

                <div class="empty-payments">

                    <i class="bi bi-cash-stack"></i>

                    No payments have been received for this fee yet.

                </div>

            @endif

        </div>

    </div>

</div>

@endsection