@extends('layouts.app')

@section('title', 'Receive Fee Payment')

@section('content')

<style>
/* =========================================================
   RECEIVE FEE PAYMENT
   ========================================================= */

body:has(.fee-payment-page) {
    background: #080e17 !important;
}

body:has(.fee-payment-page) .main-wrapper {
    background: #080e17 !important;
}

body:has(.fee-payment-page) .page-content {
    background: #080e17 !important;
    padding: 18px 20px 0 20px !important;
    margin: 0 !important;
    min-height: calc(100vh - 76px) !important;
}

.fee-payment-page {
    width: 100%;
    min-height: calc(100vh - 94px);
    padding: 0 !important;
    margin: 0 !important;
    color: #edf3fb;
}

/* =========================================================
   HEADER
   ========================================================= */

.fee-payment-page .page-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 15px;
    margin-bottom: 20px;
}

.fee-payment-page .heading-left {
    display: flex;
    align-items: center;
    gap: 13px;
}

.fee-payment-page .heading-icon {
    width: 48px;
    height: 48px;
    border-radius: 14px;

    display: flex;
    align-items: center;
    justify-content: center;

    background: linear-gradient(
        135deg,
        #7c3aed,
        #a855f7
    );

    color: #fff;
    font-size: 21px;

    box-shadow: 0 10px 25px rgba(124, 58, 237, .25);
}

.fee-payment-page h1 {
    margin: 0;
    font-size: 25px;
    font-weight: 750;
    letter-spacing: -.4px;
    color: #f5f7fb;
}

.fee-payment-page .subtitle {
    margin-top: 4px;
    color: #8190a5;
    font-size: 13px;
}

/* =========================================================
   BACK BUTTON
   ========================================================= */

.back-btn {
    display: inline-flex;
    align-items: center;
    gap: 8px;

    padding: 10px 15px;

    border: 1px solid #26364d;
    border-radius: 10px;

    color: #cbd5e1;
    background: #111a28;

    text-decoration: none;
    font-size: 13px;
    font-weight: 650;

    transition: .2s ease;
}

.back-btn:hover {
    color: #fff;
    border-color: #7c3aed;
    background: #151f30;
}

/* =========================================================
   LAYOUT
   ========================================================= */

.payment-grid {
    display: grid;
    grid-template-columns: minmax(0, 1.4fr) minmax(300px, .8fr);
    gap: 20px;
    align-items: start;
}

/* =========================================================
   CARD
   ========================================================= */

.payment-card {
    background:
        radial-gradient(
            circle at top right,
            rgba(124, 58, 237, .08),
            transparent 30%
        ),
        linear-gradient(
            145deg,
            #101a29,
            #0d1521
        );

    border: 1px solid #1e2d42;
    border-radius: 17px;

    box-shadow:
        0 18px 45px rgba(0, 0, 0, .20);

    overflow: hidden;
}

.card-header {
    padding: 18px 20px;

    border-bottom: 1px solid #1e2d42;

    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 10px;
}

.card-title {
    display: flex;
    align-items: center;
    gap: 10px;

    font-size: 15px;
    font-weight: 700;
    color: #eef2f7;
}

.card-title i {
    color: #a855f7;
    font-size: 17px;
}

.card-body {
    padding: 22px 20px;
}

/* =========================================================
   STUDENT INFO
   ========================================================= */

.student-box {
    padding: 17px;

    border: 1px solid #26364d;
    border-radius: 13px;

    background: rgba(9, 15, 25, .65);

    margin-bottom: 22px;
}

.student-top {
    display: flex;
    align-items: center;
    gap: 13px;
}

.student-avatar {
    width: 48px;
    height: 48px;

    border-radius: 13px;

    display: flex;
    align-items: center;
    justify-content: center;

    background: linear-gradient(
        135deg,
        #312e81,
        #7c3aed
    );

    color: #fff;
    font-size: 18px;
    font-weight: 750;
}

.student-name {
    color: #f3f6fb;
    font-size: 15px;
    font-weight: 700;
}

.student-code {
    color: #8290a5;
    font-size: 12px;
    margin-top: 3px;
}

.student-meta {
    display: flex;
    flex-wrap: wrap;
    gap: 8px;

    margin-top: 14px;
}

.student-tag {
    display: inline-flex;
    align-items: center;
    gap: 5px;

    padding: 6px 9px;

    border-radius: 8px;

    background: #121e2e;
    border: 1px solid #24344b;

    color: #aebbd0;
    font-size: 11px;
}

.student-tag i {
    color: #a855f7;
}

/* =========================================================
   FORM
   ========================================================= */

.form-grid {
    display: grid;
    grid-template-columns: repeat(2, minmax(0, 1fr));
    gap: 17px;
}

.form-group {
    display: flex;
    flex-direction: column;
    gap: 7px;
}

.form-group.full {
    grid-column: 1 / -1;
}

.form-label {
    color: #b9c5d6;
    font-size: 12px;
    font-weight: 650;
}

.form-label span {
    color: #f87171;
}

.form-control,
.form-select {
    width: 100%;

    min-height: 43px;

    padding: 10px 12px;

    border-radius: 10px;
    border: 1px solid #293a52;

    background: #0b1421;
    color: #e7edf6;

    outline: none;

    font-size: 13px;

    transition: .2s ease;
}

.form-control::placeholder {
    color: #59687c;
}

.form-control:focus,
.form-select:focus {
    border-color: #8b5cf6;

    box-shadow:
        0 0 0 3px rgba(139, 92, 246, .12);
}

.form-select option {
    background: #101a29;
    color: #fff;
}

textarea.form-control {
    min-height: 95px;
    resize: vertical;
}

/* =========================================================
   AMOUNT INPUT
   ========================================================= */

.amount-wrapper {
    position: relative;
}

.amount-wrapper .currency {
    position: absolute;
    left: 13px;
    top: 50%;

    transform: translateY(-50%);

    color: #8b5cf6;
    font-size: 12px;
    font-weight: 750;

    pointer-events: none;
}

.amount-wrapper .form-control {
    padding-left: 40px;
    font-size: 16px;
    font-weight: 700;
}

/* =========================================================
   ERROR
   ========================================================= */

.input-error {
    color: #fca5a5;
    font-size: 11px;
}

.alert-error {
    margin-bottom: 18px;

    padding: 12px 14px;

    border: 1px solid rgba(239, 68, 68, .25);
    border-radius: 10px;

    background: rgba(127, 29, 29, .16);

    color: #fecaca;

    font-size: 12px;
}

/* =========================================================
   BUTTONS
   ========================================================= */

.form-actions {
    display: flex;
    justify-content: flex-end;
    gap: 10px;

    margin-top: 23px;
    padding-top: 20px;

    border-top: 1px solid #1e2d42;
}

.btn-cancel,
.btn-submit {
    min-height: 42px;

    padding: 10px 17px;

    border-radius: 10px;

    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 8px;

    text-decoration: none;

    font-size: 13px;
    font-weight: 700;

    cursor: pointer;

    transition: .2s ease;
}

.btn-cancel {
    color: #cbd5e1;
    background: #111a28;
    border: 1px solid #293a52;
}

.btn-cancel:hover {
    color: #fff;
    background: #172235;
}

.btn-submit {
    border: 0;

    color: #fff;

    background: linear-gradient(
        135deg,
        #7c3aed,
        #a855f7
    );

    box-shadow:
        0 10px 25px rgba(124, 58, 237, .20);
}

.btn-submit:hover {
    transform: translateY(-1px);

    box-shadow:
        0 13px 28px rgba(124, 58, 237, .30);
}

/* =========================================================
   SUMMARY
   ========================================================= */

.summary-card {
    position: sticky;
    top: 20px;
}

.summary-header-icon {
    width: 34px;
    height: 34px;

    border-radius: 9px;

    display: flex;
    align-items: center;
    justify-content: center;

    background: rgba(124, 58, 237, .12);
    color: #a855f7;
}

.summary-list {
    display: flex;
    flex-direction: column;
}

.summary-row {
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 15px;

    padding: 15px 0;

    border-bottom: 1px solid #1c2a3d;
}

.summary-row:last-child {
    border-bottom: 0;
}

.summary-label {
    color: #8290a5;
    font-size: 12px;
}

.summary-value {
    color: #edf3fb;
    font-size: 14px;
    font-weight: 700;
}

.summary-value.paid {
    color: #4ade80;
}

.summary-value.remaining {
    color: #fbbf24;
    font-size: 18px;
}

.summary-total {
    margin-top: 10px;
    padding: 16px;

    border-radius: 12px;

    background:
        linear-gradient(
            135deg,
            rgba(124, 58, 237, .15),
            rgba(168, 85, 247, .06)
        );

    border: 1px solid rgba(139, 92, 246, .25);
}

.summary-total-label {
    color: #9ba9bc;
    font-size: 11px;
}

.summary-total-value {
    margin-top: 5px;

    color: #fff;
    font-size: 25px;
    font-weight: 800;
}

/* =========================================================
   PAYMENT INFO
   ========================================================= */

.info-box {
    margin-top: 18px;

    padding: 13px 14px;

    border-radius: 11px;

    background: rgba(14, 165, 233, .06);
    border: 1px solid rgba(14, 165, 233, .16);

    color: #9fb3c9;
    font-size: 11px;
    line-height: 1.6;
}

.info-box i {
    color: #38bdf8;
    margin-right: 5px;
}

/* =========================================================
   RESPONSIVE
   ========================================================= */

@media (max-width: 1000px) {
    .payment-grid {
        grid-template-columns: 1fr;
    }

    .summary-card {
        position: static;
    }
}

@media (max-width: 700px) {
    body:has(.fee-payment-page) .page-content {
        padding: 14px !important;
    }

    .fee-payment-page .page-header {
        align-items: flex-start;
    }

    .fee-payment-page h1 {
        font-size: 21px;
    }

    .heading-icon {
        width: 43px;
        height: 43px;
    }

    .back-btn span {
        display: none;
    }

    .form-grid {
        grid-template-columns: 1fr;
    }

    .form-group.full {
        grid-column: auto;
    }

    .card-body {
        padding: 17px 15px;
    }

    .card-header {
        padding: 16px 15px;
    }
}

@media (max-width: 480px) {
    .fee-payment-page .page-header {
        gap: 10px;
    }

    .fee-payment-page .heading-left {
        gap: 9px;
    }

    .fee-payment-page .subtitle {
        display: none;
    }

    .form-actions {
        flex-direction: column;
    }

    .btn-cancel,
    .btn-submit {
        width: 100%;
    }
}
</style>


<div class="fee-payment-page">

    {{-- =====================================================
         HEADER
    ====================================================== --}}
    <div class="page-header">

        <div class="heading-left">

            <div class="heading-icon">
                <i class="bi bi-cash-coin"></i>
            </div>

            <div>
                <h1>Receive Fee Payment</h1>

                <div class="subtitle">
                    Record a payment against this student's fee
                </div>
            </div>

        </div>

        <a href="{{ route('fees.show', $fee) }}"
           class="back-btn">

            <i class="bi bi-arrow-left"></i>

            <span>Back to Fee</span>

        </a>

    </div>


    {{-- =====================================================
         ERROR MESSAGE
    ====================================================== --}}
    @if ($errors->any())

        <div class="alert-error">

            <i class="bi bi-exclamation-triangle-fill me-1"></i>

            Please fix the following errors:

            <ul style="margin:8px 0 0 18px; padding:0;">

                @foreach ($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif


    <div class="payment-grid">

        {{-- =================================================
             PAYMENT FORM
        ================================================== --}}
        <div class="payment-card">

            <div class="card-header">

                <div class="card-title">

                    <i class="bi bi-wallet2"></i>

                    Payment Details

                </div>

                <span style="
                    color:#718096;
                    font-size:11px;
                ">
                    Fee #{{ $fee->id }}
                </span>

            </div>


            <div class="card-body">

                {{-- STUDENT --}}
                <div class="student-box">

                    <div class="student-top">

                        <div class="student-avatar">

                            {{ strtoupper(substr($fee->student->first_name ?? 'S', 0, 1)) }}

                        </div>

                        <div>

                            <div class="student-name">

                                {{ $fee->student->first_name }}
                                {{ $fee->student->last_name }}

                            </div>

                            <div class="student-code">

                                {{ $fee->student->student_code ?? 'No Student Code' }}

                            </div>

                        </div>

                    </div>


                    <div class="student-meta">

                        @if($fee->student->academyClass)

                            <div class="student-tag">

                                <i class="bi bi-mortarboard-fill"></i>

                                {{ $fee->student->academyClass->name }}

                            </div>

                        @endif


                        @if($fee->student->group)

                            <div class="student-tag">

                                <i class="bi bi-people-fill"></i>

                                {{ $fee->student->group->name }}

                            </div>

                        @endif


                        <div class="student-tag">

                            <i class="bi bi-calendar3"></i>

                            {{ \Carbon\Carbon::createFromFormat('Y-m', $fee->fee_month)->format('F Y') }}

                        </div>

                    </div>

                </div>


                {{-- FORM --}}
                <form
                    action="{{ route('fees.payments.store', $fee) }}"
                    method="POST"
                >

                    @csrf


                    <div class="form-grid">

                        {{-- AMOUNT --}}
                        <div class="form-group">

                            <label class="form-label">
                                Payment Amount <span>*</span>
                            </label>

                            <div class="amount-wrapper">

                                <span class="currency">
                                    PKR
                                </span>

                                <input
                                    type="number"
                                    name="amount"
                                    id="amount"
                                    class="form-control"
                                    step="0.01"
                                    min="0.01"
                                    max="{{ $fee->remaining_amount }}"
                                    value="{{ old('amount') }}"
                                    placeholder="Enter amount"
                                    required
                                >

                            </div>

                            @error('amount')

                                <div class="input-error">
                                    {{ $message }}
                                </div>

                            @enderror

                        </div>


                        {{-- PAYMENT DATE --}}
                        <div class="form-group">

                            <label class="form-label">
                                Payment Date <span>*</span>
                            </label>

                            <input
                                type="date"
                                name="payment_date"
                                class="form-control"
                                value="{{ old('payment_date', now()->format('Y-m-d')) }}"
                                required
                            >

                            @error('payment_date')

                                <div class="input-error">
                                    {{ $message }}
                                </div>

                            @enderror

                        </div>


                        {{-- PAYMENT METHOD --}}
                        <div class="form-group">

                            <label class="form-label">
                                Payment Method <span>*</span>
                            </label>

                            <select
                                name="payment_method"
                                class="form-select"
                                required
                            >

                                <option value="">
                                    Select Method
                                </option>

                                <option
                                    value="cash"
                                    {{ old('payment_method') === 'cash' ? 'selected' : '' }}
                                >
                                    Cash
                                </option>

                                <option
                                    value="bank"
                                    {{ old('payment_method') === 'bank' ? 'selected' : '' }}
                                >
                                    Bank Transfer
                                </option>

                                <option
                                    value="online"
                                    {{ old('payment_method') === 'online' ? 'selected' : '' }}
                                >
                                    Online Payment
                                </option>

                            </select>

                            @error('payment_method')

                                <div class="input-error">
                                    {{ $message }}
                                </div>

                            @enderror

                        </div>


                        {{-- TRANSACTION REFERENCE --}}
                        <div class="form-group">

                            <label class="form-label">
                                Transaction Reference
                            </label>

                            <input
                                type="text"
                                name="transaction_reference"
                                class="form-control"
                                value="{{ old('transaction_reference') }}"
                                placeholder="Optional reference number"
                            >

                            @error('transaction_reference')

                                <div class="input-error">
                                    {{ $message }}
                                </div>

                            @enderror

                        </div>


                        {{-- REMARKS --}}
                        <div class="form-group full">

                            <label class="form-label">
                                Remarks
                            </label>

                            <textarea
                                name="remarks"
                                class="form-control"
                                placeholder="Optional payment remarks..."
                            >{{ old('remarks') }}</textarea>

                            @error('remarks')

                                <div class="input-error">
                                    {{ $message }}
                                </div>

                            @enderror

                        </div>

                    </div>


                    {{-- ACTIONS --}}
                    <div class="form-actions">

                        <a
                            href="{{ route('fees.show', $fee) }}"
                            class="btn-cancel"
                        >
                            <i class="bi bi-x-lg"></i>
                            Cancel
                        </a>

                        <button
                            type="submit"
                            class="btn-submit"
                        >
                            <i class="bi bi-check-circle-fill"></i>
                            Receive Payment
                        </button>

                    </div>

                </form>

            </div>

        </div>


        {{-- =================================================
             FEE SUMMARY
        ================================================== --}}
        <div class="payment-card summary-card">

            <div class="card-header">

                <div class="card-title">

                    <div class="summary-header-icon">
                        <i class="bi bi-receipt"></i>
                    </div>

                    Fee Summary

                </div>

            </div>


            <div class="card-body">

                <div class="summary-list">

                    <div class="summary-row">

                        <div class="summary-label">
                            Fee Month
                        </div>

                        <div class="summary-value">

                            {{ \Carbon\Carbon::createFromFormat('Y-m', $fee->fee_month)->format('M Y') }}

                        </div>

                    </div>


                    <div class="summary-row">

                        <div class="summary-label">
                            Total Amount
                        </div>

                        <div class="summary-value">

                            PKR {{ number_format((float) $fee->total_amount, 2) }}

                        </div>

                    </div>


                    <div class="summary-row">

                        <div class="summary-label">
                            Discount
                        </div>

                        <div class="summary-value">

                            PKR {{ number_format((float) $fee->discount, 2) }}

                        </div>

                    </div>


                    <div class="summary-row">

                        <div class="summary-label">
                            Payable Amount
                        </div>

                        <div class="summary-value">

                            PKR {{ number_format((float) $fee->payable_amount, 2) }}

                        </div>

                    </div>


                    <div class="summary-row">

                        <div class="summary-label">
                            Already Paid
                        </div>

                        <div class="summary-value paid">

                            PKR {{ number_format((float) $fee->paid_amount, 2) }}

                        </div>

                    </div>


                    <div class="summary-row">

                        <div class="summary-label">
                            Remaining
                        </div>

                        <div class="summary-value remaining">

                            PKR {{ number_format((float) $fee->remaining_amount, 2) }}

                        </div>

                    </div>

                </div>


                <div class="summary-total">

                    <div class="summary-total-label">
                        Maximum Payment Allowed
                    </div>

                    <div class="summary-total-value">

                        PKR {{ number_format((float) $fee->remaining_amount, 2) }}

                    </div>

                </div>


                <div class="info-box">

                    <i class="bi bi-info-circle-fill"></i>

                    You can receive a partial payment. The remaining
                    amount will automatically be updated after payment.

                </div>

            </div>

        </div>

    </div>

</div>

@endsection