
@extends('layouts.app')

@section('title', 'Add Exam')

@section('content')

<style>
    /* ================================
       EXAM CREATE PAGE
    ================================= */

    .exam-form-page {
        width: 100%;
        min-height: calc(100vh - 70px);
        color: #dbe4f2;
        padding-bottom: 40px;
    }

    /* Header */
    .exam-form-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-end;
        gap: 20px;
        margin-bottom: 28px;
    }

    .exam-form-heading small {
        display: block;
        color: #8b5cf6;
        font-size: 11px;
        font-weight: 700;
        letter-spacing: 1.5px;
        text-transform: uppercase;
        margin-bottom: 6px;
    }

    .exam-form-heading h1 {
        margin: 0;
        color: #f8fafc;
        font-size: 28px;
        font-weight: 700;
        line-height: 1.2;
    }

    .exam-form-heading p {
        margin: 7px 0 0;
        color: #94a3b8;
        font-size: 13px;
    }

    /* Back Button */
    .back-btn {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 10px 15px;
        color: #cbd5e1;
        background: #111827;
        border: 1px solid #263548;
        border-radius: 8px;
        text-decoration: none;
        font-size: 13px;
        font-weight: 600;
        transition: .2s ease;
    }

    .back-btn:hover {
        color: #fff;
        border-color: #8b5cf6;
        background: #151d2d;
    }

    /* Main Card */
    .exam-form-card {
        width: 100%;
        max-width: 900px;
        background: linear-gradient(
            145deg,
            rgba(13, 21, 34, .98),
            rgba(8, 14, 23, .98)
        );
        border: 1px solid #1c2939;
        border-radius: 14px;
        padding: 30px;
        box-shadow: 0 15px 40px rgba(0, 0, 0, .22);
    }

    /* Form Grid */
    .exam-form-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 22px 20px;
    }

    .form-group.full-width {
        grid-column: 1 / -1;
    }

    .form-group {
        margin: 0;
    }

    .form-group label {
        display: block;
        margin-bottom: 8px;
        color: #cbd5e1;
        font-size: 13px;
        font-weight: 600;
    }

    .form-group label .required {
        color: #f43f5e;
    }

    /* Inputs */
    .form-control,
    .form-select {
        display: block;
        width: 100%;
        height: 44px;
        padding: 10px 13px;
        background: #080e17;
        border: 1px solid #263548;
        border-radius: 8px;
        color: #e2e8f0;
        font-size: 13px;
        outline: none;
        transition: .2s ease;
        box-sizing: border-box;
    }

    .form-control::placeholder {
        color: #64748b;
    }

    .form-control:hover,
    .form-select:hover {
        border-color: #334155;
    }

    .form-control:focus,
    .form-select:focus {
        border-color: #8b5cf6;
        background: #0a111c;
        box-shadow: 0 0 0 3px rgba(139, 92, 246, .12);
    }

    .form-select option {
        background: #0d1522;
        color: #e2e8f0;
    }

    /* Date input */
    input[type="date"] {
        color-scheme: dark;
    }

    /* Error */
    .alert-danger {
        margin-bottom: 24px;
        padding: 14px 16px;
        background: rgba(244, 63, 94, .07);
        border: 1px solid rgba(244, 63, 94, .25);
        border-radius: 9px;
        color: #fda4af;
        font-size: 13px;
    }

    .alert-danger strong {
        color: #fb7185;
    }

    .alert-danger ul {
        margin: 7px 0 0;
        padding-left: 19px;
    }

    .alert-danger li {
        margin-bottom: 3px;
    }

    /* Actions */
    .form-actions {
        display: flex;
        justify-content: flex-end;
        align-items: center;
        gap: 10px;
        margin-top: 28px;
        padding-top: 22px;
        border-top: 1px solid #1c2939;
    }

    .cancel-btn,
    .save-btn {
        min-height: 42px;
        padding: 10px 19px;
        border-radius: 8px;
        font-size: 13px;
        font-weight: 600;
        text-decoration: none;
        cursor: pointer;
        transition: .2s ease;
    }

    .cancel-btn {
        color: #cbd5e1;
        background: #111827;
        border: 1px solid #263548;
    }

    .cancel-btn:hover {
        color: #fff;
        background: #1a2535;
        border-color: #334155;
    }

    .save-btn {
        color: #fff;
        background: linear-gradient(135deg, #8b5cf6, #7c3aed);
        border: 1px solid #8b5cf6;
        box-shadow: 0 5px 15px rgba(139, 92, 246, .18);
    }

    .save-btn:hover {
        transform: translateY(-1px);
        box-shadow: 0 7px 20px rgba(139, 92, 246, .28);
    }

    .save-btn i {
        margin-right: 5px;
    }

    /* Responsive */
    @media (max-width: 700px) {

        .exam-form-header {
            align-items: flex-start;
            flex-direction: column;
        }

        .exam-form-card {
            padding: 22px;
        }

        .exam-form-grid {
            grid-template-columns: 1fr;
        }

        .form-group.full-width {
            grid-column: auto;
        }

        .form-actions {
            flex-direction: column-reverse;
            align-items: stretch;
        }

        .cancel-btn,
        .save-btn {
            width: 100%;
            text-align: center;
        }
    }
</style>


<div class="exam-form-page">

    {{-- ================= HEADER ================= --}}
    <div class="exam-form-header">

        <div class="exam-form-heading">
            <small>Academy Management</small>

            <h1>Add Exam</h1>

            <p>
                Create a new examination and academic session.
            </p>
        </div>

        <a href="{{ route('exams.index') }}" class="back-btn">
            <i class="bi bi-arrow-left"></i>
            Back to Exams
        </a>

    </div>


    {{-- ================= FORM CARD ================= --}}
    <div class="exam-form-card">

        {{-- Validation Errors --}}
        @if ($errors->any())

            <div class="alert-danger">

                <strong>
                    <i class="bi bi-exclamation-circle"></i>
                    Please fix the following errors:
                </strong>

                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>

            </div>

        @endif


        <form action="{{ route('exams.store') }}" method="POST">

            @csrf


            <div class="exam-form-grid">

                {{-- Exam Name --}}
                <div class="form-group full-width">

                    <label for="name">
                        Exam Name
                        <span class="required">*</span>
                    </label>

                    <input
                        type="text"
                        id="name"
                        name="name"
                        class="form-control"
                        value="{{ old('name') }}"
                        placeholder="e.g. Mid Term Exam"
                        required
                    >

                </div>


                {{-- Academic Year --}}
                <div class="form-group">

                    <label for="academic_year">
                        Academic Year
                    </label>

                    <input
                        type="text"
                        id="academic_year"
                        name="academic_year"
                        class="form-control"
                        value="{{ old('academic_year') }}"
                        placeholder="e.g. 2026-2027"
                    >

                </div>


                {{-- Exam Date --}}
                <div class="form-group">

                    <label for="exam_date">
                        Exam Date
                    </label>

                    <input
                        type="date"
                        id="exam_date"
                        name="exam_date"
                        class="form-control"
                        value="{{ old('exam_date') }}"
                    >

                </div>


                {{-- Status --}}
                <div class="form-group">

                    <label for="status">
                        Status
                        <span class="required">*</span>
                    </label>

                    <select
                        id="status"
                        name="status"
                        class="form-select"
                        required
                    >

                        <option
                            value="active"
                            {{ old('status', 'active') === 'active' ? 'selected' : '' }}
                        >
                            Active
                        </option>

                        <option
                            value="inactive"
                            {{ old('status') === 'inactive' ? 'selected' : '' }}
                        >
                            Inactive
                        </option>

                    </select>

                </div>

            </div>


            {{-- ================= ACTIONS ================= --}}
            <div class="form-actions">

                <a
                    href="{{ route('exams.index') }}"
                    class="cancel-btn"
                >
                    Cancel
                </a>

                <button
                    type="submit"
                    class="save-btn"
                >
                    <i class="bi bi-check-lg"></i>
                    Create Exam
                </button>

            </div>

        </form>

    </div>

</div>

@endsection
