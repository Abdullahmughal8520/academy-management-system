@extends('layouts.app')

@section('title', 'Payment Receipt')

@section('content')

<style>
    body:has(.receipt-page) {
        background: #080e17 !important;
    }

    body:has(.receipt-page) .main-wrapper {
        background: #080e17 !important;
    }

    body:has(.receipt-page) .page-content {
        background: #080e17 !important;
        padding: 18px 20px 30px 20px !important;
        margin: 0 !important;
        min-height: calc(100vh - 76px) !important;
    }

    .receipt-page {
        max-width: 900px;
        margin: 0 auto;
        color: #dbe4f2;
    }

    .receipt-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
        gap: 15px;
    }

    .receipt-title {
        display: flex;
        align-items: center;
        gap: 13px;
    }

    .receipt-icon {
        width: 48px;
        height: 48px;
        border-radius: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(135deg, #7c3aed, #9333ea);
        color: #fff;
        font-size: 21px;
    }

    .receipt-title h1 {
        margin: 0;
        color: #f8fafc;
        font-size: 24px;
        font-weight: 700;
    }

    .receipt-title p {
        margin: 4px 0 0;
        color: #718096;
        font-size: 12px;
    }

    .header-buttons {
        display: flex;
        gap: 9px;
    }

    .header-btn {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        padding: 10px 14px;
        border-radius: 9px;
        text-decoration: none;
        font-size: 12px;
        font-weight: 600;
        cursor: pointer;
    }

    .back-btn {
        color: #cbd5e1 !important;
        background: #101827;
        border: 1px solid #263448;
    }

    .print-btn {
        color: #fff;
        background: linear-gradient(135deg, #7c3aed, #9333ea);
        border: 0;
    }

    .receipt-card {
        background: #0d1522;
        border: 1px solid #1b2636;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 15px 40px rgba(0,0,0,.2);
    }

    .receipt-top {
        padding: 28px 30px;
        text-align: center;
        border-bottom: 1px solid #1b2636;
        background: #0f1826;
    }

    .academy-name {
        margin: 0;
        color: #f8fafc;
        font-size: 24px;
        font-weight: 800;
    }

    .academy-subtitle {
        margin-top: 5px;
        color: #64748b;
        font-size: 12px;
    }

    .receipt-label {
        margin-top: 20px;
        color: #a78bfa;
        font-size: 12px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: .12em;
    }

    .receipt-number {
        margin-top: 5px;
        color: #f8fafc;
        font-size: 18px;
        font-weight: 700;
    }

    .receipt-body {
        padding: 28px 30px;
    }

    .section-title {
        margin-bottom: 13px;
        color: #f8fafc;
        font-size: 14px;
        font-weight: 700;
    }

    .info-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 12px;
        margin-bottom: 25px;
    }

    .info-box {
        padding: 13px;
        border-radius: 10px;
        background: #09111d;
        border: 1px solid #1b2636;
    }

    .info-label {
        color: #64748b;
        font-size: 10px;
        text-transform: uppercase;
        margin-bottom: 5px;
    }

    .info-value {
        color: #e2e8f0;
        font-size: 13px;
        font-weight: 600;
    }

    .amount-section {
        margin-top: 5px;
        border: 1px solid #1b2636;
        border-radius: 13px;
        overflow: hidden;
    }

    .amount-row {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 13px 16px;
        border-bottom: 1px solid #172233;
    }

    .amount-row:last-child {
        border-bottom: 0;
    }

    .amount-label {
        color: #94a3b8;
        font-size: 12px;
    }

    .amount-value {
        color: #e2e8f0;
        font-size: 13px;
        font-weight: 700;
    }

    .amount-row.paid {
        background: rgba(52,211,153,.05);
    }

    .amount-row.paid .amount-label,
    .amount-row.paid .amount-value {
        color: #34d399;
    }

    .amount-row.remaining {
        background: rgba(248,113,113,.05);
    }

    .amount-row.remaining .amount-label,
    .amount-row.remaining .amount-value {
        color: #f87171;
    }

    .payment-details {
        margin-top: 25px;
    }

    .remarks {
        margin-top: 18px;
        padding: 14px;
        border-radius: 10px;
        background: #09111d;
        border: 1px solid #1b2636;
    }

    .remarks-title {
        color: #64748b;
        font-size: 10px;
        text-transform: uppercase;
        margin-bottom: 6px;
    }

    .remarks-text {
        color: #cbd5e1;
        font-size: 12px;
        line-height: 1.6;
    }

    .receipt-footer {
        padding: 20px 30px;
        border-top: 1px solid #1b2636;
        text-align: center;
        background: #0b1320;
    }

    .receipt-footer p {
        margin: 0;
        color: #64748b;
        font-size: 11px;
    }

    .thank-you {
        margin-top: 6px !important;
        color: #94a3b8 !important;
        font-weight: 600;
    }

    @media print {

        body,
        body:has(.receipt-page),
        body:has(.receipt-page) .main-wrapper,
        body:has(.receipt-page) .page-content {
            background: #fff !important;
        }

        .receipt-page {
            max-width: 100%;
            color: #111;
        }

        .receipt-header {
            display: none;
        }

        .receipt-card {
            border: 1px solid #ddd;
            box-shadow: none;
            background: #fff;
        }

        .receipt-top,
        .receipt-footer {
            background: #fff;
        }

        .academy-name,
        .receipt-number,
        .section-title,
        .info-value,
        .amount-value {
            color: #111 !important;
        }

        .academy-subtitle,
        .info-label,
        .amount-label,
        .receipt-footer p {
            color: #555 !important;
        }

        .info-box,
        .remarks {
            background: #fff;
            border-color: #ddd;
        }

        .amount-section {
            border-color: #ddd;
        }

        .amount-row {
            border-color: #ddd;
        }

        .payment-details {
            margin-top: 25px;
        }
    }

    @media (max-width: 650px) {

        .receipt-header {
            flex-direction: column;
            align-items: flex-start;
        }

        .header-buttons {
            width: 100%;
        }

        .header-btn {
            flex: 1;
            justify-content: center;
        }

        .info-grid {
            grid-template-columns: 1fr;
        }

        .receipt-body,
        .receipt-top {
            padding: 22px 18px;
        }
    }
</style>


<div class="receipt-page">

    {{-- HEADER --}}
    <div class="receipt-header">

        <div class="receipt-title">

            <div class="receipt-icon">
                <i class="bi bi-receipt-cutoff"></i>
            </div>

            <div>
                <h1>Payment Receipt</h1>
                <p>Fee payment receipt details</p>
            </div>

        </div>


        <div class="header-buttons">

            <a
                href="{{ route('fees.show', $feePayment->fee) }}"
                class="header-btn back-btn"
            >
                <i class="bi bi-arrow-left"></i>
                Back
            </a>

            <button
                type="button"
                onclick="window.print()"
                class="header-btn print-btn"
            >
                <i class="bi bi-printer"></i>
                Print Receipt
            </button>

        </div>

    </div>


    {{-- RECEIPT --}}
    <div class="receipt-card">

        {{-- TOP --}}
        <div class="receipt-top">

            <h2 class="academy-name">
                Academy Management System
            </h2>

            <div class="academy-subtitle">
                Official Fee Payment Receipt
            </div>

            <div class="receipt-label">
                Receipt Number
            </div>

            <div class="receipt-number">
                {{ $feePayment->receipt_number }}
            </div>

        </div>


        {{-- BODY --}}
        <div class="receipt-body">


            {{-- STUDENT --}}
            <div class="section-title">
                <i class="bi bi-person"></i>
                Student Information
            </div>


            <div class="info-grid">

                <div class="info-box">

                    <div class="info-label">
                        Student Name
                    </div>

                    <div class="info-value">
                        {{ $feePayment->fee->student->first_name ?? '' }}
                        {{ $feePayment->fee->student->last_name ?? '' }}
                    </div>

                </div>


                <div class="info-box">

                    <div class="info-label">
                        Student Code
                    </div>

                    <div class="info-value">
                        {{ $feePayment->fee->student->student_code ?? '—' }}
                    </div>

                </div>


                <div class="info-box">

                    <div class="info-label">
                        Class
                    </div>

                    <div class="info-value">
                        {{ $feePayment->fee->student->academyClass->name ?? '—' }}
                    </div>

                </div>


                <div class="info-box">

                    <div class="info-label">
                        Group
                    </div>

                    <div class="info-value">
                        {{ $feePayment->fee->student->group->name ?? '—' }}
                    </div>

                </div>

            </div>


            {{-- PAYMENT DETAILS --}}
            <div class="payment-details">

                <div class="section-title">
                    <i class="bi bi-cash-stack"></i>
                    Payment Details
                </div>


                <div class="info-grid">

                    <div class="info-box">

                        <div class="info-label">
                            Fee Month
                        </div>

                        <div class="info-value">

                            {{ \Carbon\Carbon::createFromFormat(
                                'Y-m',
                                $feePayment->fee->fee_month
                            )->format('F Y') }}

                        </div>

                    </div>


                    <div class="info-box">

                        <div class="info-label">
                            Payment Date
                        </div>

                        <div class="info-value">

                            {{ $feePayment->payment_date
                                ? $feePayment->payment_date->format('d M Y')
                                : '—'
                            }}

                        </div>

                    </div>


                    <div class="info-box">

                        <div class="info-label">
                            Payment Method
                        </div>

                        <div class="info-value">
                            {{ ucfirst($feePayment->payment_method) }}
                        </div>

                    </div>


                    <div class="info-box">

                        <div class="info-label">
                            Transaction Reference
                        </div>

                        <div class="info-value">
                            {{ $feePayment->transaction_reference ?? '—' }}
                        </div>

                    </div>

                </div>

            </div>


            {{-- AMOUNT --}}
            <div class="section-title">
                <i class="bi bi-calculator"></i>
                Fee Amount
            </div>


            <div class="amount-section">

                <div class="amount-row">

                    <span class="amount-label">
                        Total Fee
                    </span>

                    <span class="amount-value">
                        Rs.
                        {{ number_format(
                            (float) $feePayment->fee->total_amount,
                            2
                        ) }}
                    </span>

                </div>


                <div class="amount-row">

                    <span class="amount-label">
                        Discount
                    </span>

                    <span class="amount-value">
                        Rs.
                        {{ number_format(
                            (float) $feePayment->fee->discount,
                            2
                        ) }}
                    </span>

                </div>


                <div class="amount-row">

                    <span class="amount-label">
                        Payable Amount
                    </span>

                    <span class="amount-value">
                        Rs.
                        {{ number_format(
                            (float) $feePayment->fee->payable_amount,
                            2
                        ) }}
                    </span>

                </div>


                <div class="amount-row paid">

                    <span class="amount-label">
                        This Payment
                    </span>

                    <span class="amount-value">
                        Rs.
                        {{ number_format(
                            (float) $feePayment->amount,
                            2
                        ) }}
                    </span>

                </div>


                <div class="amount-row">

                    <span class="amount-label">
                        Total Paid
                    </span>

                    <span class="amount-value">
                        Rs.
                        {{ number_format(
                            (float) $feePayment->fee->paid_amount,
                            2
                        ) }}
                    </span>

                </div>


                <div class="amount-row remaining">

                    <span class="amount-label">
                        Remaining Balance
                    </span>

                    <span class="amount-value">
                        Rs.
                        {{ number_format(
                            (float) $feePayment->fee->remaining_amount,
                            2
                        ) }}
                    </span>

                </div>

            </div>


            {{-- REMARKS --}}
            @if($feePayment->remarks)

                <div class="remarks">

                    <div class="remarks-title">
                        Remarks
                    </div>

                    <div class="remarks-text">
                        {{ $feePayment->remarks }}
                    </div>

                </div>

            @endif

        </div>


        {{-- FOOTER --}}
        <div class="receipt-footer">

            <p>
                This is a system-generated payment receipt.
            </p>

            <p class="thank-you">
                Thank you for your payment.
            </p>

        </div>

    </div>

</div>

@endsection