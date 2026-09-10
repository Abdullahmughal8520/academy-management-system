@extends('layouts.app')

@section('title', 'Create Fee Structure')

@section('content')

<style>
/* =========================================================
   CREATE FEE STRUCTURE — EXAMS THEME
   ========================================================= */

body:has(.fee-structure-form-page) {
    background: #080e17 !important;
}

body:has(.fee-structure-form-page) .main-wrapper {
    background: #080e17 !important;
}

body:has(.fee-structure-form-page) .page-content {
    background: #080e17 !important;
    padding: 18px 20px 0 20px !important;
    margin: 0 !important;
    min-height: calc(100vh - 76px) !important;
}

.fee-structure-form-page {
    width: 100%;
    min-height: calc(100vh - 94px);
    margin: 0 !important;
    padding: 0 !important;
    color: #edf3fb;
}

/* Header */

.fsf-header {
    margin-bottom: 22px;
}

.fsf-back {
    display: inline-flex;
    align-items: center;
    gap: 7px;
    color: #8795aa;
    text-decoration: none;
    font-size: 13px;
    margin-bottom: 13px;
    transition: .2s ease;
}

.fsf-back:hover {
    color: #a78bfa;
}

.fsf-kicker {
    color: #8b5cf6;
    font-size: 12px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 1.4px;
    margin-bottom: 5px;
}

.fsf-title {
    margin: 0;
    color: #f5f7fb;
    font-size: 30px;
    font-weight: 800;
}

.fsf-subtitle {
    margin: 7px 0 0;
    color: #718096;
    font-size: 14px;
}

/* Card */

.fsf-card {
    max-width: 1000px;
    background: linear-gradient(135deg, #111b2a, #0d1521);
    border: 1px solid #223149;
    border-radius: 15px;
    padding: 25px;
    box-shadow: 0 12px 30px rgba(0,0,0,.18);
}

/* Sections */

.fsf-section {
    margin-bottom: 26px;
}

.fsf-section:last-child {
    margin-bottom: 0;
}

.fsf-section-title {
    color: #f1f5f9;
    font-size: 15px;
    font-weight: 750;
    margin-bottom: 17px;
    padding-bottom: 10px;
    border-bottom: 1px solid #223149;
}

.fsf-section-title i {
    color: #8b5cf6;
    margin-right: 7px;
}

/* Form */

.fsf-label {
    display: block;
    color: #a8b4c5;
    font-size: 12px;
    font-weight: 700;
    margin-bottom: 7px;
}

.fsf-required {
    color: #f87171;
}

.fsf-input,
.fsf-select {
    width: 100%;
    height: 44px;
    border-radius: 9px;
    border: 1px solid #293950;
    background: #0b1421;
    color: #e8eef7;
    padding: 0 13px;
    outline: none;
    font-size: 13px;
    transition: .2s ease;
}

.fsf-input:focus,
.fsf-select:focus {
    border-color: #7655ed;
    box-shadow: 0 0 0 3px rgba(118,85,237,.10);
}

.fsf-input::placeholder {
    color: #56657a;
}

.fsf-error {
    color: #fca5a5;
    font-size: 11px;
    margin-top: 6px;
}

.fsf-hint {
    color: #64748b;
    font-size: 11px;
    margin-top: 6px;
}

/* Checkbox */

.fsf-checkbox-wrapper {
    display: flex;
    align-items: center;
    gap: 10px;
    min-height: 44px;
}

.fsf-checkbox {
    width: 18px;
    height: 18px;
    accent-color: #8b5cf6;
}

.fsf-checkbox-label {
    color: #cbd5e1;
    font-size: 13px;
    font-weight: 600;
}

/* Buttons */

.fsf-actions {
    display: flex;
    justify-content: flex-end;
    align-items: center;
    gap: 10px;
    padding-top: 20px;
    border-top: 1px solid #223149;
}

.fsf-btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    min-height: 42px;
    padding: 0 17px;
    border-radius: 9px;
    font-size: 13px;
    font-weight: 700;
    text-decoration: none;
    transition: .2s ease;
}

.fsf-btn-primary {
    border: 0;
    color: #fff;
    background: linear-gradient(135deg, #6848e8, #8b5cf6);
    box-shadow: 0 8px 20px rgba(104,72,232,.20);
}

.fsf-btn-primary:hover {
    color: #fff;
    transform: translateY(-1px);
}

.fsf-btn-secondary {
    color: #aab7c8;
    background: #101a29;
    border: 1px solid #293950;
}

.fsf-btn-secondary:hover {
    color: #fff;
    background: #142033;
}

/* Responsive */

@media (max-width: 768px) {

    body:has(.fee-structure-form-page) .page-content {
        padding: 15px 14px 0 14px !important;
    }

    .fsf-title {
        font-size: 25px;
    }

    .fsf-card {
        padding: 18px;
    }

    .fsf-actions {
        flex-direction: column-reverse;
    }

    .fsf-btn {
        width: 100%;
    }
}
</style>

<div class="fee-structure-form-page">

    {{-- HEADER --}}
    <div class="fsf-header">

        <a href="{{ route('fee-structures.index') }}"
           class="fsf-back">

            <i class="bi bi-arrow-left"></i>

            Back to Fee Structures

        </a>

        <div class="fsf-kicker">
            Finance Management
        </div>

        <h1 class="fsf-title">
            Create Fee Structure
        </h1>

        <p class="fsf-subtitle">
            Define the fee structure for a specific class or group.
        </p>

    </div>


    {{-- FORM CARD --}}
    <div class="fsf-card">

        <form action="{{ route('fee-structures.store') }}"
              method="POST">

            @csrf


            {{-- BASIC INFORMATION --}}
            <div class="fsf-section">

                <div class="fsf-section-title">

                    <i class="bi bi-mortarboard-fill"></i>

                    Class Information

                </div>


                <div class="row g-3">

                    {{-- CLASS --}}
                    <div class="col-md-6">

                        <label class="fsf-label">
                            Academy Class
                            <span class="fsf-required">*</span>
                        </label>

                        <select name="academy_class_id"
                                class="fsf-select"
                                required>

                            <option value="">
                                Select Class
                            </option>

                            @foreach($classes as $class)

                                <option value="{{ $class->id }}"
                                    {{ old('academy_class_id') == $class->id ? 'selected' : '' }}>

                                    {{ $class->name }}

                                </option>

                            @endforeach

                        </select>

                        @error('academy_class_id')
                            <div class="fsf-error">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


                    {{-- GROUP --}}
                    <div class="col-md-6">

                        <label class="fsf-label">
                            Group
                        </label>

                        <select name="group_id"
                                class="fsf-select">

                            <option value="">
                                All Groups
                            </option>

                            @foreach($groups as $group)

                                <option value="{{ $group->id }}"
                                    {{ old('group_id') == $group->id ? 'selected' : '' }}>

                                    {{ $group->name }}

                                </option>

                            @endforeach

                        </select>

                        @error('group_id')
                            <div class="fsf-error">
                                {{ $message }}
                            </div>
                        @enderror

                        <div class="fsf-hint">
                            Leave empty if this structure applies to all groups.
                        </div>

                    </div>

                </div>

            </div>


            {{-- FEE INFORMATION --}}
            <div class="fsf-section">

                <div class="fsf-section-title">

                    <i class="bi bi-cash-stack"></i>

                    Fee Information

                </div>


                <div class="row g-3">

                    {{-- MONTHLY --}}
                    <div class="col-md-6">

                        <label class="fsf-label">
                            Monthly Fee
                            <span class="fsf-required">*</span>
                        </label>

                        <input type="number"
                               name="monthly_fee"
                               class="fsf-input"
                               step="0.01"
                               min="0"
                               value="{{ old('monthly_fee') }}"
                               placeholder="e.g. 3000"
                               required>

                        @error('monthly_fee')
                            <div class="fsf-error">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


                    {{-- ADMISSION --}}
                    <div class="col-md-6">

                        <label class="fsf-label">
                            Admission Fee
                        </label>

                        <input type="number"
                               name="admission_fee"
                               class="fsf-input"
                               step="0.01"
                               min="0"
                               value="{{ old('admission_fee', 0) }}"
                               placeholder="e.g. 5000">

                        @error('admission_fee')
                            <div class="fsf-error">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


                    {{-- EXAM --}}
                    <div class="col-md-6">

                        <label class="fsf-label">
                            Exam Fee
                        </label>

                        <input type="number"
                               name="exam_fee"
                               class="fsf-input"
                               step="0.01"
                               min="0"
                               value="{{ old('exam_fee', 0) }}"
                               placeholder="e.g. 1000">

                        @error('exam_fee')
                            <div class="fsf-error">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


                    {{-- OTHER --}}
                    <div class="col-md-6">

                        <label class="fsf-label">
                            Other Fee
                        </label>

                        <input type="number"
                               name="other_fee"
                               class="fsf-input"
                               step="0.01"
                               min="0"
                               value="{{ old('other_fee', 0) }}"
                               placeholder="e.g. 500">

                        @error('other_fee')
                            <div class="fsf-error">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>


                    {{-- DISCOUNT --}}
                    <div class="col-md-6">

                        <label class="fsf-label">
                            Default Discount
                        </label>

                        <input type="number"
                               name="default_discount"
                               class="fsf-input"
                               step="0.01"
                               min="0"
                               value="{{ old('default_discount', 0) }}"
                               placeholder="e.g. 200">

                        @error('default_discount')
                            <div class="fsf-error">
                                {{ $message }}
                            </div>
                        @enderror

                        <div class="fsf-hint">
                            Default discount applied when generating fees.
                        </div>

                    </div>


                    {{-- EFFECTIVE DATE --}}
                    <div class="col-md-6">

                        <label class="fsf-label">
                            Effective From
                        </label>

                        <input type="date"
                               name="effective_from"
                               class="fsf-input"
                               value="{{ old('effective_from') }}">

                        @error('effective_from')
                            <div class="fsf-error">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                </div>

            </div>


            {{-- STATUS --}}
            <div class="fsf-section">

                <div class="fsf-section-title">

                    <i class="bi bi-toggle-on"></i>

                    Status

                </div>

                <div class="fsf-checkbox-wrapper">

                    <input type="checkbox"
                           name="status"
                           value="1"
                           class="fsf-checkbox"
                           id="status"
                           {{ old('status', true) ? 'checked' : '' }}>

                    <label for="status"
                           class="fsf-checkbox-label">

                        Make this fee structure active

                    </label>

                </div>

            </div>


            {{-- ACTIONS --}}
            <div class="fsf-actions">

                <a href="{{ route('fee-structures.index') }}"
                   class="fsf-btn fsf-btn-secondary">

                    Cancel

                </a>

                <button type="submit"
                        class="fsf-btn fsf-btn-primary">

                    <i class="bi bi-check-lg"></i>

                    Create Fee Structure

                </button>

            </div>

        </form>

    </div>

</div>

@endsection