@extends('layouts.app')

@section('title', 'My Fees')

@section('content')

<style>

body:has(.student-fees-page) {
    background: #080e17 !important;
}

body:has(.student-fees-page) .main-wrapper {
    background: #080e17 !important;
}

body:has(.student-fees-page) .page-content {
    background: #080e17 !important;
    padding: 18px 20px 30px 20px !important;
    margin: 0 !important;
    min-height: calc(100vh - 76px) !important;
}

/* =========================================================
   STUDENT FEES PAGE
   ========================================================= */

.student-fees-page {
    color: #dbe4f2;
    padding-bottom: 35px;
}

.student-fees-page * {
    box-sizing: border-box;
}

.student-fees-page .muted {
    color: #718096;
}

/* Header */

.sf-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 15px;
    margin-bottom: 22px;
}

.sf-title {
    margin: 0;
    font-size: 26px;
    font-weight: 800;
    color: #f1f5f9;
}

.sf-subtitle {
    margin: 5px 0 0;
    color: #718096;
    font-size: 14px;
}

.sf-back-btn {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 10px 15px;
    border-radius: 10px;
    color: #cbd5e1 !important;
    background: #111827;
    border: 1px solid #263244;
    text-decoration: none;
    font-size: 13px;
    font-weight: 700;
    transition: .2s ease;
}

.sf-back-btn:hover {
    background: #182235;
    color: #fff !important;
}

/* Summary Cards */

.sf-summary-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 15px;
    margin-bottom: 22px;
}

.sf-summary-card {
    background: #0d1522;
    border: 1px solid #1d2939;
    border-radius: 14px;
    padding: 18px;
    position: relative;
    overflow: hidden;
}

.sf-summary-card::after {
    content: "";
    position: absolute;
    width: 75px;
    height: 75px;
    border-radius: 50%;
    background: rgba(139, 92, 246, .06);
    right: -25px;
    top: -25px;
}

.sf-summary-label {
    color: #718096;
    font-size: 12px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: .5px;
}

.sf-summary-value {
    margin-top: 7px;
    font-size: 25px;
    font-weight: 800;
    color: #f8fafc;
}

.sf-summary-value.pending {
    color: #fbbf24;
}

.sf-summary-value.paid {
    color: #34d399;
}

/* Current Fee */

.sf-current-card {
    background: #0d1522;
    border: 1px solid #1d2939;
    border-radius: 15px;
    padding: 20px;
    margin-bottom: 22px;
}

.sf-card-heading {
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 10px;
    margin-bottom: 18px;
}

.sf-card-title {
    margin: 0;
    font-size: 17px;
    font-weight: 800;
    color: #f1f5f9;
}

.sf-current-month {
    color: #8b5cf6;
    font-size: 13px;
    font-weight: 700;
}

.sf-current-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 12px;
}

.sf-info-box {
    background: #080e17;
    border: 1px solid #1d2939;
    border-radius: 11px;
    padding: 14px;
}

.sf-info-label {
    color: #718096;
    font-size: 11px;
    margin-bottom: 5px;
}

.sf-info-value {
    color: #e2e8f0;
    font-size: 15px;
    font-weight: 800;
}

/* Status */

.sf-status {
    display: inline-flex;
    align-items: center;
    padding: 5px 9px;
    border-radius: 7px;
    font-size: 11px;
    font-weight: 800;
    text-transform: capitalize;
}

.sf-status.paid {
    color: #34d399;
    background: rgba(52, 211, 153, .10);
    border: 1px solid rgba(52, 211, 153, .18);
}

.sf-status.partial {
    color: #fbbf24;
    background: rgba(251, 191, 36, .10);
    border: 1px solid rgba(251, 191, 36, .18);
}

.sf-status.unpaid,
.sf-status.overdue {
    color: #f87171;
    background: rgba(248, 113, 113, .10);
    border: 1px solid rgba(248, 113, 113, .18);
}

/* History */

.sf-history-card {
    background: #0d1522;
    border: 1px solid #1d2939;
    border-radius: 15px;
    overflow: hidden;
}

.sf-history-header {
    padding: 18px 20px;
    border-bottom: 1px solid #1d2939;
}

.sf-history-title {
    margin: 0;
    font-size: 17px;
    font-weight: 800;
    color: #f1f5f9;
}

.sf-table-wrapper {
    overflow-x: auto;
}

.sf-table {
    width: 100%;
    border-collapse: collapse;
    min-width: 850px;
}

.sf-table th {
    text-align: left;
    padding: 13px 16px;
    background: #0a111c;
    color: #718096;
    font-size: 11px;
    text-transform: uppercase;
    letter-spacing: .5px;
    white-space: nowrap;
}

.sf-table td {
    padding: 15px 16px;
    border-top: 1px solid #172233;
    color: #cbd5e1;
    font-size: 13px;
    white-space: nowrap;
}

.sf-table tbody tr {
    transition: .2s ease;
}

.sf-table tbody tr:hover {
    background: rgba(139, 92, 246, .035);
}

.sf-month {
    color: #f1f5f9;
    font-weight: 800;
}

.sf-amount {
    font-weight: 700;
}

.sf-remaining {
    color: #fbbf24;
    font-weight: 800;
}

.sf-paid {
    color: #34d399;
    font-weight: 800;
}

/* Empty */

.sf-empty {
    padding: 45px 20px;
    text-align: center;
    color: #718096;
}

.sf-empty i {
    display: block;
    font-size: 38px;
    margin-bottom: 10px;
    color: #334155;
}

.sf-empty-title {
    color: #cbd5e1;
    font-size: 15px;
    font-weight: 700;
}

/* Notice */

.sf-notice {
    margin-top: 18px;
    padding: 13px 15px;
    border-radius: 10px;
    background: rgba(139, 92, 246, .07);
    border: 1px solid rgba(139, 92, 246, .16);
    color: #a5b4fc;
    font-size: 12px;
}

.sf-notice i {
    margin-right: 6px;
}

/* Responsive */

@media (max-width: 1000px) {

    .sf-current-grid {
        grid-template-columns: repeat(2, 1fr);
    }

    .sf-summary-grid {
        grid-template-columns: 1fr;
    }
}

@media (max-width: 600px) {

    .sf-header {
        align-items: flex-start;
        flex-direction: column;
    }

    .sf-title {
        font-size: 22px;
    }

    .sf-current-grid {
        grid-template-columns: 1fr;
    }
}
</style>


<div class="student-fees-page">

    {{-- HEADER --}}
    <div class="sf-header">

        <div>
            <h1 class="sf-title">
                <i class="bi bi-wallet2"></i>
                My Fees
            </h1>

            <p class="sf-subtitle">
                View your fee details, payment history and pending balance.
            </p>
        </div>

        <a
            href="{{ route('student.dashboard') }}"
            class="sf-back-btn"
        >
            <i class="bi bi-arrow-left"></i>
            Back to Dashboard
        </a>

    </div>


    {{-- SUMMARY --}}
    <div class="sf-summary-grid">

        <div class="sf-summary-card">

            <div class="sf-summary-label">
                Total Payable
            </div>

            <div class="sf-summary-value">
                Rs. {{ number_format($totalPayable, 2) }}
            </div>

        </div>


        <div class="sf-summary-card">

            <div class="sf-summary-label">
                Total Paid
            </div>

            <div class="sf-summary-value paid">
                Rs. {{ number_format($totalPaid, 2) }}
            </div>

        </div>


        <div class="sf-summary-card">

            <div class="sf-summary-label">
                Total Pending
            </div>

            <div class="sf-summary-value pending">
                Rs. {{ number_format($totalPending, 2) }}
            </div>

        </div>

    </div>


    {{-- CURRENT FEE --}}
    @if($currentFee)

        <div class="sf-current-card">

            <div class="sf-card-heading">

                <h2 class="sf-card-title">
                    Current Fee
                </h2>

                <span class="sf-current-month">
                    {{ \Carbon\Carbon::createFromFormat('Y-m', $currentFee->fee_month)->format('F Y') }}
                </span>

            </div>


            <div class="sf-current-grid">

                <div class="sf-info-box">

                    <div class="sf-info-label">
                        Total Fee
                    </div>

                    <div class="sf-info-value">
                        Rs. {{ number_format($currentFee->total_amount, 2) }}
                    </div>

                </div>


                <div class="sf-info-box">

                    <div class="sf-info-label">
                        Discount
                    </div>

                    <div class="sf-info-value">
                        Rs. {{ number_format($currentFee->discount, 2) }}
                    </div>

                </div>


                <div class="sf-info-box">

                    <div class="sf-info-label">
                        Payable
                    </div>

                    <div class="sf-info-value">
                        Rs. {{ number_format($currentFee->payable_amount, 2) }}
                    </div>

                </div>


                <div class="sf-info-box">

                    <div class="sf-info-label">
                        Paid
                    </div>

                    <div class="sf-info-value">
                        <span class="sf-paid">
                            Rs. {{ number_format($currentFee->paid_amount, 2) }}
                        </span>
                    </div>

                </div>


                <div class="sf-info-box">

                    <div class="sf-info-label">
                        Pending
                    </div>

                    <div class="sf-info-value">
                        <span class="sf-remaining">
                            Rs. {{ number_format($currentFee->remaining_amount, 2) }}
                        </span>
                    </div>

                </div>


                <div class="sf-info-box">

                    <div class="sf-info-label">
                        Due Date
                    </div>

                    <div class="sf-info-value">

                        @if($currentFee->due_date)
                            {{ $currentFee->due_date->format('d M Y') }}
                        @else
                            <span class="muted">
                                Not set
                            </span>
                        @endif

                    </div>

                </div>


                <div class="sf-info-box">

                    <div class="sf-info-label">
                        Status
                    </div>

                    <div class="sf-info-value">

                        <span class="sf-status {{ $currentFee->status }}">
                            {{ ucfirst($currentFee->status) }}
                        </span>

                    </div>

                </div>


                <div class="sf-info-box">

                    <div class="sf-info-label">
                        Fee Structure
                    </div>

                    <div class="sf-info-value">

                        @if($currentFee->feeStructure)
                            {{ $currentFee->feeStructure->monthly_fee }}
                        @else
                            <span class="muted">
                                Not linked
                            </span>
                        @endif

                    </div>

                </div>

            </div>

        </div>

    @endif


    {{-- FEE HISTORY --}}
    <div class="sf-history-card">

        <div class="sf-history-header">

            <h2 class="sf-history-title">
                Fee History
            </h2>

        </div>


        @if($fees->count())

            <div class="sf-table-wrapper">

                <table class="sf-table">

                    <thead>
                        <tr>
                            <th>Month</th>
                            <th>Total Fee</th>
                            <th>Discount</th>
                            <th>Payable</th>
                            <th>Paid</th>
                            <th>Remaining</th>
                            <th>Due Date</th>
                            <th>Status</th>
                        </tr>
                    </thead>


                    <tbody>

                        @foreach($fees as $fee)

                            <tr>

                                <td>
                                    <span class="sf-month">
                                        {{ \Carbon\Carbon::createFromFormat('Y-m', $fee->fee_month)->format('F Y') }}
                                    </span>
                                </td>


                                <td>
                                    <span class="sf-amount">
                                        Rs. {{ number_format($fee->total_amount, 2) }}
                                    </span>
                                </td>


                                <td>
                                    Rs. {{ number_format($fee->discount, 2) }}
                                </td>


                                <td>
                                    <span class="sf-amount">
                                        Rs. {{ number_format($fee->payable_amount, 2) }}
                                    </span>
                                </td>


                                <td>
                                    <span class="sf-paid">
                                        Rs. {{ number_format($fee->paid_amount, 2) }}
                                    </span>
                                </td>


                                <td>
                                    <span class="sf-remaining">
                                        Rs. {{ number_format($fee->remaining_amount, 2) }}
                                    </span>
                                </td>


                                <td>

                                    @if($fee->due_date)

                                        {{ $fee->due_date->format('d M Y') }}

                                    @else

                                        <span class="muted">
                                            Not set
                                        </span>

                                    @endif

                                </td>


                                <td>

                                    <span class="sf-status {{ $fee->status }}">
                                        {{ ucfirst($fee->status) }}
                                    </span>

                                </td>

                            </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>

        @else

            <div class="sf-empty">

                <i class="bi bi-wallet2"></i>

                <div class="sf-empty-title">
                    No fee records found
                </div>

                <div>
                    Your fee information will appear here.
                </div>

            </div>

        @endif

    </div>


    {{-- NOTICE --}}
    <div class="sf-notice">

        <i class="bi bi-info-circle"></i>

        This page is for viewing your fee information only.
        For fee payment, please contact the academy administration.

    </div>

</div>

@endsection