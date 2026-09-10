
@extends('layouts.app')

@section('title', 'Edit Exam')

@section('content')

<div class="exam-form-page">

    <div class="exam-form-header">
        <div>
            <div class="exam-form-eyebrow">Academy Management</div>
            <h1>Edit Exam</h1>
            <p>Update examination and academic session details.</p>
        </div>

        <a href="{{ route('exams.index') }}" class="back-btn">
            <i class="bi bi-arrow-left"></i>
            Back to Exams
        </a>
    </div>


    @if ($errors->any())
        <div class="alert-box">
            <i class="bi bi-exclamation-triangle-fill"></i>

            <div>
                <strong>Please fix the following errors:</strong>

                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif


    <div class="exam-form-card">

        <div class="form-card-heading">
            <div class="form-icon">
                <i class="bi bi-pencil-square"></i>
            </div>

            <div>
                <h2>Edit Exam</h2>
                <p>Modify the details of this examination.</p>
            </div>
        </div>


        <form action="{{ route('exams.update', $exam) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-grid">

                <!-- Exam Name -->
                <div class="form-group full-width">
                    <label for="name">
                        Exam Name <span>*</span>
                    </label>

                    <input
                        type="text"
                        id="name"
                        name="name"
                        value="{{ old('name', $exam->name) }}"
                        placeholder="e.g. Mid Term Examination"
                        required
                    >

                    @error('name')
                        <small class="field-error">{{ $message }}</small>
                    @enderror
                </div>


                <!-- Academic Year -->
                <div class="form-group">
                    <label for="academic_year">
                        Academic Year
                    </label>

                    <input
                        type="text"
                        id="academic_year"
                        name="academic_year"
                        value="{{ old('academic_year', $exam->academic_year) }}"
                        placeholder="e.g. 2026-27"
                    >

                    @error('academic_year')
                        <small class="field-error">{{ $message }}</small>
                    @enderror
                </div>


                <!-- Exam Date -->
                <div class="form-group">
                    <label for="exam_date">
                        Exam Date
                    </label>

                    <input
                        type="date"
                        id="exam_date"
                        name="exam_date"
                        value="{{ old('exam_date', $exam->exam_date?->format('Y-m-d')) }}"
                    >

                    @error('exam_date')
                        <small class="field-error">{{ $message }}</small>
                    @enderror
                </div>


                <!-- Status -->
                <div class="form-group">
                    <label for="status">
                        Status <span>*</span>
                    </label>

                    <select id="status" name="status" required>
                        <option value="active"
                            {{ old('status', $exam->status) === 'active' ? 'selected' : '' }}>
                            Active
                        </option>

                        <option value="inactive"
                            {{ old('status', $exam->status) === 'inactive' ? 'selected' : '' }}>
                            Inactive
                        </option>
                    </select>

                    @error('status')
                        <small class="field-error">{{ $message }}</small>
                    @enderror
                </div>

            </div>


            <div class="form-actions">

                <a href="{{ route('exams.index') }}" class="cancel-btn">
                    Cancel
                </a>

                <button type="submit" class="save-btn">
                    <i class="bi bi-check2-circle"></i>
                    Update Exam
                </button>

            </div>

        </form>

    </div>

</div>


<style>

/* =========================================================
   EDIT EXAM PAGE
========================================================= */

.exam-form-page {
    color: #dbe4f2;
    padding-bottom: 40px;
}


/* Header */

.exam-form-header {
    display: flex;
    align-items: flex-end;
    justify-content: space-between;
    gap: 20px;
    margin-bottom: 24px;
}

.exam-form-eyebrow {
    color: #8b5cf6;
    font-size: 11px;
    font-weight: 700;
    letter-spacing: 1.5px;
    text-transform: uppercase;
    margin-bottom: 7px;
}

.exam-form-header h1 {
    margin: 0;
    color: #f8fafc;
    font-size: 28px;
    font-weight: 800;
}

.exam-form-header p {
    margin: 7px 0 0;
    color: #64748b;
    font-size: 14px;
}


/* Back Button */

.back-btn {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    padding: 10px 16px;
    border: 1px solid #263448;
    border-radius: 9px;
    background: #0d1521;
    color: #cbd5e1;
    text-decoration: none;
    font-size: 13px;
    font-weight: 600;
    transition: .2s ease;
}

.back-btn:hover {
    background: #131d2d;
    border-color: #8b5cf6;
    color: #a78bfa;
}


/* Alert */

.alert-box {
    display: flex;
    align-items: flex-start;
    gap: 12px;
    margin-bottom: 20px;
    padding: 14px 16px;
    border: 1px solid rgba(244, 63, 94, .35);
    border-radius: 10px;
    background: rgba(244, 63, 94, .08);
    color: #fda4af;
    font-size: 13px;
}

.alert-box > i {
    color: #f43f5e;
    font-size: 17px;
    margin-top: 1px;
}

.alert-box strong {
    color: #fda4af;
}

.alert-box ul {
    margin: 6px 0 0;
    padding-left: 18px;
}


/* Main Card */

.exam-form-card {
    width: 100%;
    padding: 28px;
    border: 1px solid #1b2738;
    border-radius: 14px;
    background:
        linear-gradient(
            145deg,
            rgba(15, 23, 42, .98),
            rgba(10, 17, 29, .98)
        );
    box-shadow: 0 18px 45px rgba(0, 0, 0, .22);
}


/* Card Heading */

.form-card-heading {
    display: flex;
    align-items: center;
    gap: 13px;
    padding-bottom: 22px;
    margin-bottom: 24px;
    border-bottom: 1px solid #1b2738;
}

.form-icon {
    width: 42px;
    height: 42px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 10px;
    background: rgba(139, 92, 246, .12);
    border: 1px solid rgba(139, 92, 246, .25);
    color: #a78bfa;
    font-size: 19px;
}

.form-card-heading h2 {
    margin: 0;
    color: #f8fafc;
    font-size: 17px;
    font-weight: 700;
}

.form-card-heading p {
    margin: 4px 0 0;
    color: #64748b;
    font-size: 12px;
}


/* Form Grid */

.form-grid {
    display: grid;
    grid-template-columns: repeat(2, minmax(0, 1fr));
    gap: 20px;
}

.full-width {
    grid-column: 1 / -1;
}


/* Fields */

.form-group {
    display: flex;
    flex-direction: column;
}

.form-group label {
    margin-bottom: 8px;
    color: #cbd5e1;
    font-size: 12px;
    font-weight: 700;
}

.form-group label span {
    color: #f43f5e;
}

.form-group input,
.form-group select {
    width: 100%;
    height: 44px;
    padding: 0 13px;
    border: 1px solid #263448;
    border-radius: 8px;
    outline: none;
    background: #0b1320;
    color: #e2e8f0;
    font-family: inherit;
    font-size: 13px;
    transition: .2s ease;
}

.form-group input::placeholder {
    color: #475569;
}

.form-group input:focus,
.form-group select:focus {
    border-color: #8b5cf6;
    box-shadow: 0 0 0 3px rgba(139, 92, 246, .10);
}

.form-group select {
    cursor: pointer;
}

.form-group select option {
    background: #0b1320;
    color: #e2e8f0;
}


/* Error */

.field-error {
    margin-top: 6px;
    color: #fb7185;
    font-size: 11px;
}


/* Actions */

.form-actions {
    display: flex;
    align-items: center;
    justify-content: flex-end;
    gap: 10px;
    margin-top: 28px;
    padding-top: 22px;
    border-top: 1px solid #1b2738;
}

.cancel-btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    height: 42px;
    padding: 0 18px;
    border: 1px solid #263448;
    border-radius: 8px;
    background: #0d1521;
    color: #94a3b8;
    text-decoration: none;
    font-size: 13px;
    font-weight: 600;
    transition: .2s ease;
}

.cancel-btn:hover {
    background: #151f2f;
    color: #e2e8f0;
}


.save-btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    height: 42px;
    padding: 0 20px;
    border: 0;
    border-radius: 8px;
    background: linear-gradient(135deg, #8b5cf6, #7c3aed);
    color: white;
    font-size: 13px;
    font-weight: 700;
    cursor: pointer;
    box-shadow: 0 8px 20px rgba(124, 58, 237, .22);
    transition: .2s ease;
}

.save-btn:hover {
    transform: translateY(-1px);
    box-shadow: 0 10px 24px rgba(124, 58, 237, .30);
}


/* Mobile */

@media (max-width: 768px) {

    .exam-form-header {
        align-items: flex-start;
        flex-direction: column;
    }

    .exam-form-header h1 {
        font-size: 23px;
    }

    .exam-form-card {
        padding: 20px;
    }

    .form-grid {
        grid-template-columns: 1fr;
    }

    .full-width {
        grid-column: auto;
    }

    .form-actions {
        flex-direction: column-reverse;
        align-items: stretch;
    }

    .cancel-btn,
    .save-btn {
        width: 100%;
    }
}

</style>

@endsection
