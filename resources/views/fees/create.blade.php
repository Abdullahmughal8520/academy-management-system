@extends('layouts.app')

@section('title', 'Generate Fee')

@section('content')

<style>
    /* =========================================================
       GENERATE FEE PAGE
       ========================================================= */

    body:has(.generate-fee-page) {
        background: #080e17 !important;
    }

    body:has(.generate-fee-page) .main-wrapper {
        background: #080e17 !important;
    }

    body:has(.generate-fee-page) .page-content {
        background: #080e17 !important;
        padding: 18px 20px 30px 20px !important;
        margin: 0 !important;
        min-height: calc(100vh - 76px) !important;
    }

    .generate-fee-page {
        color: #dbe4f2;
        max-width: 1200px;
        margin: 0 auto;
    }

    /* Header */

    .fee-page-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 20px;
        margin-bottom: 22px;
    }

    .fee-page-title {
        display: flex;
        align-items: center;
        gap: 13px;
    }

    .fee-page-icon {
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
        box-shadow: 0 8px 25px rgba(124, 58, 237, .25);
    }

    .fee-page-title h1 {
        margin: 0;
        font-size: 25px;
        font-weight: 700;
        color: #f8fafc;
    }

    .fee-page-title p {
        margin: 4px 0 0;
        color: #718096;
        font-size: 13px;
    }

    .back-btn {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 10px 16px;
        border-radius: 10px;
        text-decoration: none;
        color: #cbd5e1 !important;
        background: #101827;
        border: 1px solid #1e293b;
        font-size: 13px;
        font-weight: 600;
        transition: .2s;
    }

    .back-btn:hover {
        background: #151f30;
        border-color: #334155;
        color: #fff !important;
    }

    /* Main card */

    .fee-card {
        background: #0d1522;
        border: 1px solid #1b2636;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 15px 40px rgba(0,0,0,.18);
    }

    .fee-card-header {
        padding: 18px 22px;
        border-bottom: 1px solid #1b2636;
        background: #0f1826;
    }

    .fee-card-header h2 {
        margin: 0;
        font-size: 16px;
        color: #f8fafc;
        font-weight: 700;
    }

    .fee-card-header p {
        margin: 5px 0 0;
        color: #64748b;
        font-size: 12px;
    }

    .fee-card-body {
        padding: 24px;
    }

    /* Form */

    .form-grid {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 20px;
    }

    .form-group {
        margin-bottom: 2px;
    }

    .form-group.full {
        grid-column: 1 / -1;
    }

    .form-label {
        display: block;
        margin-bottom: 8px;
        color: #cbd5e1;
        font-size: 13px;
        font-weight: 600;
    }

    .required {
        color: #f87171;
    }

    .form-control,
    .form-select {
        width: 100%;
        min-height: 44px;
        padding: 10px 13px;
        border-radius: 10px;
        border: 1px solid #263448;
        background: #09111d !important;
        color: #e2e8f0 !important;
        font-size: 13px;
        outline: none;
        transition: .2s;
    }

    .form-control::placeholder {
        color: #475569;
    }

    .form-control:focus,
    .form-select:focus {
        border-color: #7c3aed;
        box-shadow: 0 0 0 3px rgba(124,58,237,.12);
        background: #0b1422 !important;
    }

    .form-select option {
        background: #0d1522;
        color: #e2e8f0;
    }

    textarea.form-control {
        min-height: 105px;
        resize: vertical;
    }

    .help-text {
        margin-top: 6px;
        color: #64748b;
        font-size: 11px;
    }

    /* Amount summary */

    .amount-summary {
        margin-top: 22px;
        padding: 18px;
        border-radius: 13px;
        background: #09111d;
        border: 1px solid #1b2636;
    }

    .summary-title {
        margin-bottom: 15px;
        color: #f8fafc;
        font-size: 14px;
        font-weight: 700;
    }

    .summary-grid {
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 14px;
    }

    .summary-item {
        padding: 13px;
        border-radius: 10px;
        background: #0d1725;
        border: 1px solid #1c2a3d;
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
        background: rgba(124,58,237,.08);
    }

    .summary-item.payable .summary-value {
        color: #a78bfa;
    }

    /* Errors */

    .error-box {
        margin-bottom: 20px;
        padding: 14px 16px;
        border-radius: 11px;
        background: rgba(239,68,68,.08);
        border: 1px solid rgba(239,68,68,.25);
        color: #fca5a5;
    }

    .error-box strong {
        display: block;
        margin-bottom: 6px;
        color: #f87171;
    }

    .error-box ul {
        margin: 0;
        padding-left: 20px;
        font-size: 12px;
    }

    .field-error {
        margin-top: 6px;
        color: #f87171;
        font-size: 11px;
    }

    /* Buttons */

    .form-actions {
        display: flex;
        justify-content: flex-end;
        align-items: center;
        gap: 10px;
        margin-top: 25px;
        padding-top: 20px;
        border-top: 1px solid #1b2636;
    }

    .cancel-btn,
    .submit-btn {
        min-height: 43px;
        padding: 10px 18px;
        border-radius: 10px;
        font-size: 13px;
        font-weight: 700;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        cursor: pointer;
        transition: .2s;
    }

    .cancel-btn {
        color: #cbd5e1 !important;
        background: #111b29;
        border: 1px solid #263448;
    }

    .cancel-btn:hover {
        background: #182335;
        color: #fff !important;
    }

    .submit-btn {
        border: 0;
        color: #fff;
        background: linear-gradient(
            135deg,
            #7c3aed,
            #9333ea
        );
        box-shadow: 0 8px 22px rgba(124,58,237,.22);
    }

    .submit-btn:hover {
        transform: translateY(-1px);
        box-shadow: 0 11px 27px rgba(124,58,237,.30);
    }

    /* Responsive */

    @media (max-width: 768px) {

        .fee-page-header {
            flex-direction: column;
            align-items: flex-start;
        }

        .form-grid {
            grid-template-columns: 1fr;
        }

        .form-group.full {
            grid-column: auto;
        }

        .summary-grid {
            grid-template-columns: 1fr;
        }

        .fee-card-body {
            padding: 18px;
        }

        .form-actions {
            flex-direction: column;
        }

        .cancel-btn,
        .submit-btn {
            width: 100%;
        }
    }
</style>


<div class="generate-fee-page">

    {{-- HEADER --}}
    <div class="fee-page-header">

        <div class="fee-page-title">

            <div class="fee-page-icon">
                <i class="bi bi-receipt-cutoff"></i>
            </div>

            <div>
                <h1>Generate Fee</h1>
                <p>Create a new fee record for a student</p>
            </div>

        </div>

        <a
            href="{{ route('fees.index') }}"
            class="back-btn"
        >
            <i class="bi bi-arrow-left"></i>
            Back to Fees
        </a>

    </div>


    {{-- CARD --}}
    <div class="fee-card">

        <div class="fee-card-header">
            <h2>Fee Information</h2>
            <p>
                Select student and enter the fee details below.
            </p>
        </div>


        <div class="fee-card-body">

            {{-- VALIDATION ERRORS --}}
            @if ($errors->any())

                <div class="error-box">

                    <strong>
                        <i class="bi bi-exclamation-triangle"></i>
                        Please fix the following errors:
                    </strong>

                    <ul>

                        @foreach ($errors->all() as $error)

                            <li>{{ $error }}</li>

                        @endforeach

                    </ul>

                </div>

            @endif


            {{-- FORM --}}
            <form
                method="POST"
                action="{{ route('fees.store') }}"
            >

                @csrf


                <div class="form-grid">

                    {{-- STUDENT --}}
                    <div class="form-group">

                        <label class="form-label">
                            Student
                            <span class="required">*</span>
                        </label>

                        <select
                            name="student_id"
                            id="student_id"
                            class="form-select"
                            required
                        >

                            <option value="">
                                Select Student
                            </option>

                            @foreach($students as $student)

                                <option
                                    value="{{ $student->id }}"
                                    {{ old('student_id') == $student->id ? 'selected' : '' }}
                                >
                                    {{ $student->first_name }}
                                    {{ $student->last_name }}

                                    @if($student->student_code)
                                        — {{ $student->student_code }}
                                    @endif
                                </option>

                            @endforeach

                        </select>

                        @error('student_id')

                            <div class="field-error">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>


                    {{-- FEE STRUCTURE --}}
                    <div class="form-group">

                        <label class="form-label">
                            Fee Structure
                        </label>

                        <select
                            name="fee_structure_id"
                            id="fee_structure_id"
                            class="form-select"
                        >

                            <option value="">
                                Select Fee Structure
                            </option>

                            @foreach($feeStructures as $structure)

                                <option
                                    value="{{ $structure->id }}"
                                    data-monthly="{{ $structure->monthly_fee }}"
                                    data-admission="{{ $structure->admission_fee }}"
                                    data-exam="{{ $structure->exam_fee }}"
                                    data-other="{{ $structure->other_fee }}"
                                    data-discount="{{ $structure->default_discount }}"
                                    {{ old('fee_structure_id') == $structure->id ? 'selected' : '' }}
                                >

                                    {{ $structure->academyClass->name ?? 'Class' }}

                                    @if($structure->group)
                                        — {{ $structure->group->name }}
                                    @endif

                                    — Rs.
                                    {{ number_format($structure->monthly_fee, 2) }}

                                </option>

                            @endforeach

                        </select>

                        <div class="help-text">
                            Selecting a fee structure will automatically fill the monthly fee.
                        </div>

                        @error('fee_structure_id')

                            <div class="field-error">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>


                    {{-- MONTH --}}
                    <div class="form-group">

                        <label class="form-label">
                            Fee Month
                            <span class="required">*</span>
                        </label>

                        <input
                            type="month"
                            name="fee_month"
                            id="fee_month"
                            class="form-control"
                            value="{{ old('fee_month', now()->format('Y-m')) }}"
                            required
                        >

                        @error('fee_month')

                            <div class="field-error">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>


                    {{-- TOTAL AMOUNT --}}
                    <div class="form-group">

                        <label class="form-label">
                            Total Amount
                            <span class="required">*</span>
                        </label>

                        <input
                            type="number"
                            name="total_amount"
                            id="total_amount"
                            class="form-control"
                            value="{{ old('total_amount') }}"
                            min="0"
                            step="0.01"
                            placeholder="Enter total fee"
                            required
                        >

                        @error('total_amount')

                            <div class="field-error">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>


                    {{-- DISCOUNT --}}
                    <div class="form-group">

                        <label class="form-label">
                            Discount
                        </label>

                        <input
                            type="number"
                            name="discount"
                            id="discount"
                            class="form-control"
                            value="{{ old('discount', 0) }}"
                            min="0"
                            step="0.01"
                            placeholder="Enter discount"
                        >

                        @error('discount')

                            <div class="field-error">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>


                    {{-- DUE DATE --}}
                    <div class="form-group">

                        <label class="form-label">
                            Due Date
                        </label>

                        <input
                            type="date"
                            name="due_date"
                            id="due_date"
                            class="form-control"
                            value="{{ old('due_date') }}"
                        >

                        @error('due_date')

                            <div class="field-error">
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
                            id="remarks"
                            class="form-control"
                            placeholder="Optional notes about this fee..."
                        >{{ old('remarks') }}</textarea>

                        @error('remarks')

                            <div class="field-error">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>

                </div>


                {{-- AMOUNT SUMMARY --}}
                <div class="amount-summary">

                    <div class="summary-title">
                        <i class="bi bi-calculator"></i>
                        Fee Summary
                    </div>

                    <div class="summary-grid">

                        <div class="summary-item">

                            <div class="summary-label">
                                Total Amount
                            </div>

                            <div
                                class="summary-value"
                                id="summary-total"
                            >
                                Rs. 0.00
                            </div>

                        </div>


                        <div class="summary-item">

                            <div class="summary-label">
                                Discount
                            </div>

                            <div
                                class="summary-value"
                                id="summary-discount"
                            >
                                Rs. 0.00
                            </div>

                        </div>


                        <div class="summary-item payable">

                            <div class="summary-label">
                                Payable Amount
                            </div>

                            <div
                                class="summary-value"
                                id="summary-payable"
                            >
                                Rs. 0.00
                            </div>

                        </div>

                    </div>

                </div>


                {{-- ACTIONS --}}
                <div class="form-actions">

                    <a
                        href="{{ route('fees.index') }}"
                        class="cancel-btn"
                    >
                        <i class="bi bi-x-lg"></i>
                        Cancel
                    </a>

                    <button
                        type="submit"
                        class="submit-btn"
                    >
                        <i class="bi bi-check2-circle"></i>
                        Generate Fee
                    </button>

                </div>

            </form>

        </div>

    </div>

</div>


<script>
document.addEventListener('DOMContentLoaded', function () {

    const structureSelect =
        document.getElementById('fee_structure_id');

    const totalInput =
        document.getElementById('total_amount');

    const discountInput =
        document.getElementById('discount');

    const summaryTotal =
        document.getElementById('summary-total');

    const summaryDiscount =
        document.getElementById('summary-discount');

    const summaryPayable =
        document.getElementById('summary-payable');


    function formatAmount(amount) {

        return 'Rs. ' +
            Number(amount).toLocaleString(
                'en-PK',
                {
                    minimumFractionDigits: 2,
                    maximumFractionDigits: 2
                }
            );

    }


    function calculatePayable() {

        let total =
            parseFloat(totalInput.value) || 0;

        let discount =
            parseFloat(discountInput.value) || 0;

        if (discount > total) {
            discount = total;
        }

        let payable =
            total - discount;

        summaryTotal.textContent =
            formatAmount(total);

        summaryDiscount.textContent =
            formatAmount(discount);

        summaryPayable.textContent =
            formatAmount(payable);

    }


    /* Fee Structure Selection */

    structureSelect.addEventListener(
        'change',
        function () {

            const selectedOption =
                this.options[this.selectedIndex];

            if (!selectedOption.value) {
                return;
            }

            const monthlyFee =
                parseFloat(
                    selectedOption.dataset.monthly
                ) || 0;

            const defaultDiscount =
                parseFloat(
                    selectedOption.dataset.discount
                ) || 0;

            totalInput.value =
                monthlyFee.toFixed(2);

            discountInput.value =
                defaultDiscount.toFixed(2);

            calculatePayable();

        }
    );


    /* Amount changes */

    totalInput.addEventListener(
        'input',
        calculatePayable
    );

    discountInput.addEventListener(
        'input',
        calculatePayable
    );


    /* Initial calculation */

    calculatePayable();

});
</script>

@endsection