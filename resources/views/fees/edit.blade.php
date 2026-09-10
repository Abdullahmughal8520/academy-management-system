@extends('layouts.app')

@section('title', 'Edit Fee')

@section('content')

<style>
    /* =========================================================
       EDIT FEE PAGE
       ========================================================= */

    body:has(.edit-fee-page) {
        background: #080e17 !important;
    }

    body:has(.edit-fee-page) .main-wrapper {
        background: #080e17 !important;
    }

    body:has(.edit-fee-page) .page-content {
        background: #080e17 !important;
        padding: 18px 20px 30px 20px !important;
        margin: 0 !important;
        min-height: calc(100vh - 76px) !important;
    }

    .edit-fee-page {
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
        box-shadow: 0 8px 25px rgba(124,58,237,.25);
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

    /* Card */

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

    /* Student info */

    .student-info {
        display: grid;
        grid-template-columns: repeat(3, minmax(0, 1fr));
        gap: 12px;
        margin-bottom: 24px;
    }

    .student-info-item {
        padding: 13px;
        border-radius: 10px;
        background: #09111d;
        border: 1px solid #1b2636;
    }

    .student-info-label {
        color: #64748b;
        font-size: 10px;
        margin-bottom: 5px;
        text-transform: uppercase;
        letter-spacing: .04em;
    }

    .student-info-value {
        color: #e2e8f0;
        font-size: 13px;
        font-weight: 600;
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

    /* Error */

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

    /* Current payment warning */

    .payment-warning {
        margin-top: 20px;
        padding: 14px 16px;
        border-radius: 11px;
        background: rgba(251,191,36,.06);
        border: 1px solid rgba(251,191,36,.20);
        color: #fcd34d;
        font-size: 12px;
        line-height: 1.6;
    }

    .payment-warning i {
        margin-right: 6px;
    }

    /* Summary */

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

    .summary-item.paid {
        border-color: rgba(52,211,153,.25);
        background: rgba(52,211,153,.05);
    }

    .summary-item.paid .summary-value {
        color: #34d399;
    }

    /* Actions */

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

    @media (max-width: 850px) {

        .fee-page-header {
            flex-direction: column;
            align-items: flex-start;
        }

        .student-info {
            grid-template-columns: 1fr;
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

        .form-actions {
            flex-direction: column;
        }

        .cancel-btn,
        .submit-btn {
            width: 100%;
        }
    }
</style>


<div class="edit-fee-page">

    {{-- HEADER --}}
    <div class="fee-page-header">

        <div class="fee-page-title">

            <div class="fee-page-icon">
                <i class="bi bi-pencil-square"></i>
            </div>

            <div>
                <h1>Edit Fee</h1>
                <p>
                    Update the selected student's fee information
                </p>
            </div>

        </div>


        <a
            href="{{ route('fees.show', $fee) }}"
            class="back-btn"
        >
            <i class="bi bi-arrow-left"></i>
            Back to Fee
        </a>

    </div>


    {{-- CARD --}}
    <div class="fee-card">

        <div class="fee-card-header">

            <h2>
                <i class="bi bi-receipt"></i>
                Fee Information
            </h2>

            <p>
                Student and payment information is shown below.
            </p>

        </div>


        <div class="fee-card-body">

            {{-- ERRORS --}}
            @if($errors->any())

                <div class="error-box">

                    <strong>
                        <i class="bi bi-exclamation-triangle"></i>
                        Please fix the following errors:
                    </strong>

                    <ul>

                        @foreach($errors->all() as $error)

                            <li>{{ $error }}</li>

                        @endforeach

                    </ul>

                </div>

            @endif


            {{-- STUDENT INFORMATION --}}
            <div class="student-info">

                <div class="student-info-item">

                    <div class="student-info-label">
                        Student
                    </div>

                    <div class="student-info-value">
                        {{ $fee->student->first_name ?? '' }}
                        {{ $fee->student->last_name ?? '' }}
                    </div>

                </div>


                <div class="student-info-item">

                    <div class="student-info-label">
                        Student Code
                    </div>

                    <div class="student-info-value">
                        {{ $fee->student->student_code ?? '—' }}
                    </div>

                </div>


                <div class="student-info-item">

                    <div class="student-info-label">
                        Class
                    </div>

                    <div class="student-info-value">
                        {{ $fee->student->academyClass->name ?? '—' }}
                    </div>

                </div>

            </div>


            {{-- FORM --}}
            <form
                method="POST"
                action="{{ route('fees.update', $fee) }}"
            >

                @csrf

                @method('PUT')


                <div class="form-grid">


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
                                    data-discount="{{ $structure->default_discount }}"
                                    {{ old(
                                        'fee_structure_id',
                                        $fee->fee_structure_id
                                    ) == $structure->id ? 'selected' : '' }}
                                >

                                    {{ $structure->academyClass->name ?? 'Class' }}

                                    @if($structure->group)
                                        — {{ $structure->group->name }}
                                    @endif

                                    — Rs.
                                    {{ number_format(
                                        $structure->monthly_fee,
                                        2
                                    ) }}

                                </option>

                            @endforeach

                        </select>

                        <div class="help-text">
                            You can change the fee structure if required.
                        </div>

                        @error('fee_structure_id')

                            <div class="field-error">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>


                    {{-- FEE MONTH --}}
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
                            value="{{ old(
                                'fee_month',
                                $fee->fee_month
                            ) }}"
                            required
                        >

                        @error('fee_month')

                            <div class="field-error">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>


                    {{-- TOTAL --}}
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
                            value="{{ old(
                                'total_amount',
                                $fee->total_amount
                            ) }}"
                            min="0"
                            step="0.01"
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
                            value="{{ old(
                                'discount',
                                $fee->discount
                            ) }}"
                            min="0"
                            step="0.01"
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
                            value="{{ old(
                                'due_date',
                                $fee->due_date
                                    ? $fee->due_date->format('Y-m-d')
                                    : ''
                            ) }}"
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
                        >{{ old(
                            'remarks',
                            $fee->remarks
                        ) }}</textarea>

                        @error('remarks')

                            <div class="field-error">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>

                </div>


                {{-- PAYMENT WARNING --}}
                @if((float) $fee->paid_amount > 0)

                    <div class="payment-warning">

                        <i class="bi bi-info-circle"></i>

                        This fee already has a payment of
                        <strong>
                            Rs.
                            {{ number_format(
                                (float) $fee->paid_amount,
                                2
                            ) }}
                        </strong>.

                        The payable amount cannot be reduced below
                        the amount already paid.

                    </div>

                @endif


                {{-- SUMMARY --}}
                <div class="amount-summary">

                    <div class="summary-title">
                        <i class="bi bi-calculator"></i>
                        Updated Fee Summary
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


                        <div class="summary-item paid">

                            <div class="summary-label">
                                Already Paid
                            </div>

                            <div class="summary-value">
                                Rs.
                                {{ number_format(
                                    (float) $fee->paid_amount,
                                    2
                                ) }}
                            </div>

                        </div>

                    </div>

                </div>


                {{-- ACTIONS --}}
                <div class="form-actions">

                    <a
                        href="{{ route('fees.show', $fee) }}"
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
                        Update Fee
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

        const total =
            parseFloat(totalInput.value) || 0;

        const discount =
            parseFloat(discountInput.value) || 0;

        const payable =
            Math.max(total - discount, 0);

        summaryTotal.textContent =
            formatAmount(total);

        summaryDiscount.textContent =
            formatAmount(discount);

        summaryPayable.textContent =
            formatAmount(payable);

    }


    /*
     * Fee Structure Selection
     */

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


    /*
     * Recalculate while typing
     */

    totalInput.addEventListener(
        'input',
        calculatePayable
    );

    discountInput.addEventListener(
        'input',
        calculatePayable
    );


    /*
     * Initial calculation
     */

    calculatePayable();

});
</script>

@endsection