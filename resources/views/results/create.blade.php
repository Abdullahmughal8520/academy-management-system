
@extends('layouts.app')

@section('title', 'Add Result')

@section('content')

<style>

/* =========================================================
   RESULT CREATE - DARK THEME
========================================================= */

body:has(.result-form-page) {
    background: #080e17 !important;
    color: #dbe4f2;
}

body:has(.result-form-page) .main-wrapper {
    background: #080e17 !important;
}

body:has(.result-form-page) .page-content {
    background: #080e17 !important;
    color: #dbe4f2;
}

body:has(.result-form-page) .topbar {
    background: rgba(8, 14, 23, 0.95) !important;
    border-bottom-color: #1b2738 !important;
}

body:has(.result-form-page) .page-title {
    color: #f8fafc !important;
}

body:has(.result-form-page) .page-subtitle {
    color: #64748b !important;
}


/* =========================================================
   PAGE
========================================================= */

.result-form-page {
    color: #dbe4f2;
    padding-bottom: 35px;
}


/* =========================================================
   HEADER
========================================================= */

.result-form-page .form-header {
    display: flex;
    align-items: flex-start;
    justify-content: space-between;
    gap: 20px;

    margin-bottom: 24px;
}

.result-form-page .eyebrow {
    margin: 0 0 7px;

    color: #8b5cf6;

    font-size: 11px;
    font-weight: 700;

    letter-spacing: 1.5px;
    text-transform: uppercase;
}

.result-form-page h1 {
    margin: 0;

    color: #f8fafc;

    font-size: 28px;
    font-weight: 700;

    letter-spacing: -0.4px;
}

.result-form-page .subtitle {
    margin: 7px 0 0;

    color: #64748b;

    font-size: 13px;
}


/* =========================================================
   BACK BUTTON
========================================================= */

.result-form-page .back-btn {
    display: inline-flex;
    align-items: center;
    gap: 7px;

    padding: 9px 13px;

    border: 1px solid #293548;
    border-radius: 8px;

    background: #0d1521;

    color: #94a3b8;

    font-size: 12px;
    font-weight: 700;

    text-decoration: none;

    transition: 0.18s ease;
}

.result-form-page .back-btn:hover {
    background: #111c2b;
    border-color: #39475c;
    color: #e2e8f0;
}


/* =========================================================
   FORM CARD
========================================================= */

.result-form-page .form-card {
    border: 1px solid #1b2738;
    border-radius: 14px;

    background:
        linear-gradient(
            180deg,
            rgba(15, 23, 42, 0.96),
            rgba(10, 17, 28, 0.98)
        );

    box-shadow:
        0 15px 45px rgba(0, 0, 0, 0.18);

    overflow: hidden;
}

.result-form-page .form-card-body {
    padding: 25px;
}


/* =========================================================
   SECTION TITLE
========================================================= */

.result-form-page .section-title {
    display: flex;
    align-items: center;
    gap: 10px;

    margin-bottom: 18px;
}

.result-form-page .section-icon {
    width: 34px;
    height: 34px;

    display: inline-flex;
    align-items: center;
    justify-content: center;

    border: 1px solid rgba(139, 92, 246, 0.20);
    border-radius: 8px;

    background: rgba(139, 92, 246, 0.08);

    color: #a78bfa;

    font-size: 14px;
}

.result-form-page .section-title h2 {
    margin: 0;

    color: #f1f5f9;

    font-size: 15px;
    font-weight: 700;
}

.result-form-page .section-title p {
    margin: 2px 0 0;

    color: #64748b;

    font-size: 11px;
}


/* =========================================================
   GRID
========================================================= */

.result-form-page .form-grid {
    display: grid;

    grid-template-columns: repeat(2, minmax(0, 1fr));

    gap: 18px;

    margin-bottom: 28px;
}

.result-form-page .form-group {
    min-width: 0;
}

.result-form-page .form-label {
    display: block;

    margin-bottom: 7px;

    color: #94a3b8;

    font-size: 11px;
    font-weight: 700;

    letter-spacing: 0.3px;
}

.result-form-page .required {
    color: #f43f5e;
}


/* =========================================================
   INPUTS
========================================================= */

.result-form-page .form-control,
.result-form-page .form-select {
    width: 100%;

    min-height: 42px;

    padding: 10px 12px;

    border: 1px solid #293548;
    border-radius: 8px;

    outline: none;

    background: #0d1521 !important;

    color: #dbe4f2 !important;

    font-size: 13px;

    box-shadow: none !important;

    transition: 0.18s ease;
}

.result-form-page .form-control::placeholder {
    color: #475569;
}

.result-form-page .form-control:focus,
.result-form-page .form-select:focus {
    border-color: #8b5cf6;

    background: #0d1521 !important;

    color: #f8fafc !important;

    box-shadow:
        0 0 0 3px rgba(139, 92, 246, 0.10) !important;
}

.result-form-page .form-select option {
    background: #0d1521;
    color: #dbe4f2;
}


/* =========================================================
   ERROR
========================================================= */

.result-form-page .field-error {
    margin-top: 6px;

    color: #fb7185;

    font-size: 11px;
}


/* =========================================================
   SUBJECT SECTION
========================================================= */

.result-form-page .subjects-header {
    display: flex;
    align-items: center;
    justify-content: space-between;

    gap: 15px;

    margin-bottom: 15px;
}

.result-form-page .subjects-title {
    display: flex;
    align-items: center;
    gap: 10px;
}

.result-form-page .subjects-title h2 {
    margin: 0;

    color: #f1f5f9;

    font-size: 15px;
    font-weight: 700;
}

.result-form-page .subjects-title p {
    margin: 3px 0 0;

    color: #64748b;

    font-size: 11px;
}


/* =========================================================
   ADD SUBJECT
========================================================= */

.result-form-page .add-subject-btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 7px;

    padding: 9px 13px;

    border: 1px solid rgba(139, 92, 246, 0.30);
    border-radius: 8px;

    background: rgba(139, 92, 246, 0.08);

    color: #a78bfa;

    font-size: 11px;
    font-weight: 700;

    cursor: pointer;

    transition: 0.18s ease;
}

.result-form-page .add-subject-btn:hover {
    background: rgba(139, 92, 246, 0.14);
    border-color: rgba(139, 92, 246, 0.45);
    color: #c4b5fd;
}


/* =========================================================
   SUBJECT ROW
========================================================= */

.result-form-page .subjects-container {
    display: flex;
    flex-direction: column;
    gap: 10px;
}

.result-form-page .subject-row {
    display: grid;

    grid-template-columns:
        minmax(180px, 2fr)
        minmax(120px, 1fr)
        minmax(120px, 1fr)
        42px;

    gap: 10px;

    align-items: end;

    padding: 14px;

    border: 1px solid #1b2738;
    border-radius: 10px;

    background: rgba(13, 21, 33, 0.72);
}

.result-form-page .subject-row .form-label {
    margin-bottom: 6px;
}


/* =========================================================
   REMOVE SUBJECT
========================================================= */

.result-form-page .remove-subject-btn {
    width: 42px;
    height: 42px;

    display: inline-flex;
    align-items: center;
    justify-content: center;

    border: 1px solid rgba(244, 63, 94, 0.20);
    border-radius: 8px;

    background: rgba(244, 63, 94, 0.07);

    color: #fb7185;

    cursor: pointer;

    transition: 0.18s ease;
}

.result-form-page .remove-subject-btn:hover {
    background: rgba(244, 63, 94, 0.14);
    color: #fda4af;
}


/* =========================================================
   RESULT SUMMARY
========================================================= */

.result-form-page .summary-card {
    margin-top: 24px;

    padding: 18px;

    border: 1px solid #1b2738;
    border-radius: 10px;

    background: rgba(8, 14, 23, 0.65);
}

.result-form-page .summary-grid {
    display: grid;

    grid-template-columns: repeat(4, minmax(0, 1fr));

    gap: 12px;
}

.result-form-page .summary-box {
    padding: 14px;

    border: 1px solid #1b2738;
    border-radius: 9px;

    background: #0d1521;
}

.result-form-page .summary-label {
    margin-bottom: 6px;

    color: #64748b;

    font-size: 10px;
    font-weight: 700;

    letter-spacing: 0.7px;
    text-transform: uppercase;
}

.result-form-page .summary-value {
    color: #f8fafc;

    font-size: 19px;
    font-weight: 800;
}

.result-form-page .summary-value.cyan {
    color: #22d3ee;
}

.result-form-page .summary-value.purple {
    color: #a78bfa;
}

.result-form-page .summary-value.green {
    color: #86efac;
}


/* =========================================================
   FORM ACTIONS
========================================================= */

.result-form-page .form-actions {
    display: flex;
    align-items: center;
    justify-content: flex-end;

    gap: 10px;

    margin-top: 25px;
    padding-top: 20px;

    border-top: 1px solid #1b2738;
}

.result-form-page .cancel-btn,
.result-form-page .save-btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 7px;

    min-height: 40px;

    padding: 9px 16px;

    border-radius: 8px;

    font-size: 12px;
    font-weight: 700;

    text-decoration: none;

    cursor: pointer;
}

.result-form-page .cancel-btn {
    border: 1px solid #293548;

    background: #0d1521;

    color: #94a3b8;
}

.result-form-page .cancel-btn:hover {
    color: #e2e8f0;
    background: #111c2b;
}

.result-form-page .save-btn {
    border: 1px solid rgba(139, 92, 246, 0.45);

    background:
        linear-gradient(
            135deg,
            #8b5cf6,
            #6d28d9
        );

    color: #fff;

    box-shadow:
        0 8px 25px rgba(109, 40, 217, 0.20);
}

.result-form-page .save-btn:hover {
    color: #fff;
    transform: translateY(-1px);
}


/* =========================================================
   VALIDATION SUMMARY
========================================================= */

.result-form-page .validation-box {
    margin-bottom: 20px;

    padding: 13px 15px;

    border: 1px solid rgba(244, 63, 94, 0.22);
    border-radius: 9px;

    background: rgba(244, 63, 94, 0.07);

    color: #fda4af;

    font-size: 12px;
}

.result-form-page .validation-box ul {
    margin: 7px 0 0;
    padding-left: 18px;
}


/* =========================================================
   MOBILE
========================================================= */

@media (max-width: 900px) {

    .result-form-page .subject-row {
        grid-template-columns: 1fr 1fr;
    }

    .result-form-page .subject-row .subject-field {
        grid-column: span 2;
    }

    .result-form-page .remove-subject-btn {
        width: 100%;
    }

    .result-form-page .summary-grid {
        grid-template-columns: repeat(2, minmax(0, 1fr));
    }

}

@media (max-width: 650px) {

    .result-form-page .form-header {
        flex-direction: column;
    }

    .result-form-page .back-btn {
        width: 100%;
    }

    .result-form-page .form-grid {
        grid-template-columns: 1fr;
    }

    .result-form-page .form-card-body {
        padding: 18px;
    }

    .result-form-page .subjects-header {
        align-items: flex-start;
        flex-direction: column;
    }

    .result-form-page .add-subject-btn {
        width: 100%;
    }

    .result-form-page .subject-row {
        grid-template-columns: 1fr;
    }

    .result-form-page .subject-row .subject-field {
        grid-column: span 1;
    }

    .result-form-page .remove-subject-btn {
        width: 100%;
    }

    .result-form-page .summary-grid {
        grid-template-columns: 1fr 1fr;
    }

    .result-form-page .form-actions {
        flex-direction: column-reverse;
    }

    .result-form-page .cancel-btn,
    .result-form-page .save-btn {
        width: 100%;
    }

}

</style>


<div class="result-form-page">

    {{-- =====================================================
         HEADER
    ====================================================== --}}

    <div class="form-header">

        <div>

            <p class="eyebrow">
                Academy Management
            </p>

            <h1>
                Add Result
            </h1>

            <p class="subtitle">
                Enter student examination marks and generate the result.
            </p>

        </div>


        <a href="{{ route('results.index') }}"
           class="back-btn">

            <i class="bi bi-arrow-left"></i>

            Back to Results

        </a>

    </div>


    {{-- =====================================================
         VALIDATION ERRORS
    ====================================================== --}}

    @if($errors->any())

        <div class="validation-box">

            <strong>
                Please fix the following errors:
            </strong>

            <ul>

                @foreach($errors->all() as $error)

                    <li>
                        {{ $error }}
                    </li>

                @endforeach

            </ul>

        </div>

    @endif


    {{-- =====================================================
         FORM
    ====================================================== --}}

    <div class="form-card">

        <div class="form-card-body">

            <form
                action="{{ route('results.store') }}"
                method="POST"
                id="resultForm">

                @csrf


                {{-- =================================================
                     STUDENT / EXAM
                ================================================== --}}

                <div class="section-title">

                    <div class="section-icon">

                        <i class="bi bi-person-vcard-fill"></i>

                    </div>

                    <div>

                        <h2>
                            Result Information
                        </h2>

                        <p>
                            Select the student and examination.
                        </p>

                    </div>

                </div>


                <div class="form-grid">

                    {{-- STUDENT --}}

                    <div class="form-group">

                        <label class="form-label">
                            Student
                            <span class="required">*</span>
                        </label>

                        <select
                            name="student_id"
                            class="form-select"
                            required>

                            <option value="">
                                Select Student
                            </option>

                            @foreach($students as $student)

                             <option value="{{ $student->id }}">
    {{ $student->first_name }} {{ $student->last_name }}
</option>

                            @endforeach

                        </select>

                        @error('student_id')

                            <div class="field-error">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>


                    {{-- EXAM --}}

                    <div class="form-group">

                        <label class="form-label">
                            Exam
                            <span class="required">*</span>
                        </label>

                        <select
                            name="exam_id"
                            class="form-select"
                            required>

                            <option value="">
                                Select Exam
                            </option>

                            @foreach($exams as $exam)

                                <option
                                    value="{{ $exam->id }}"
                                    {{ old('exam_id') == $exam->id ? 'selected' : '' }}>

                                    {{ $exam->name }}

                                    @if($exam->academic_year)
                                        — {{ $exam->academic_year }}
                                    @endif

                                </option>

                            @endforeach

                        </select>

                        @error('exam_id')

                            <div class="field-error">
                                {{ $message }}
                            </div>

                        @enderror

                    </div>

                </div>


                {{-- =================================================
                     SUBJECTS
                ================================================== --}}

                <div class="subjects-header">

                    <div class="subjects-title">

                        <div class="section-icon">

                            <i class="bi bi-book-half"></i>

                        </div>

                        <div>

                            <h2>
                                Subject Marks
                            </h2>

                            <p>
                                Enter total and obtained marks for each subject.
                            </p>

                        </div>

                    </div>


                    <button
                        type="button"
                        class="add-subject-btn"
                        onclick="addSubjectRow()">

                        <i class="bi bi-plus-lg"></i>

                        Add Subject

                    </button>

                </div>


                <div id="subjectsContainer"
                     class="subjects-container">

                    {{-- FIRST SUBJECT ROW --}}

                    <div class="subject-row">

                        <div class="form-group subject-field">

                            <label class="form-label">
                                Subject
                                <span class="required">*</span>
                            </label>

                            <select
                                name="subjects[0][subject_id]"
                                class="form-select subject-select"
                                required>

                                <option value="">
                                    Select Subject
                                </option>

                                @foreach($subjects as $subject)

                                    <option
                                        value="{{ $subject->id }}">

                                        {{ $subject->name }}

                                    </option>

                                @endforeach

                            </select>

                        </div>


                        <div class="form-group">

                            <label class="form-label">
                                Total Marks
                                <span class="required">*</span>
                            </label>

                            <input
                                type="number"
                                name="subjects[0][total_marks]"
                                class="form-control total-marks"
                                min="0"
                                step="0.01"
                                placeholder="e.g. 100"
                                required>

                        </div>


                        <div class="form-group">

                            <label class="form-label">
                                Obtained Marks
                                <span class="required">*</span>
                            </label>

                            <input
                                type="number"
                                name="subjects[0][obtained_marks]"
                                class="form-control obtained-marks"
                                min="0"
                                step="0.01"
                                placeholder="e.g. 85"
                                required>

                        </div>


                        <button
                            type="button"
                            class="remove-subject-btn"
                            onclick="removeSubjectRow(this)"
                            title="Remove Subject">

                            <i class="bi bi-trash-fill"></i>

                        </button>

                    </div>

                </div>


                {{-- =================================================
                     SUMMARY
                ================================================== --}}

                <div class="summary-card">

                    <div class="summary-grid">

                        <div class="summary-box">

                            <div class="summary-label">
                                Total Marks
                            </div>

                            <div
                                class="summary-value"
                                id="totalMarksDisplay">

                                0

                            </div>

                        </div>


                        <div class="summary-box">

                            <div class="summary-label">
                                Obtained Marks
                            </div>

                            <div
                                class="summary-value cyan"
                                id="obtainedMarksDisplay">

                                0

                            </div>

                        </div>


                        <div class="summary-box">

                            <div class="summary-label">
                                Percentage
                            </div>

                            <div
                                class="summary-value purple"
                                id="percentageDisplay">

                                0.00%

                            </div>

                        </div>


                        <div class="summary-box">

                            <div class="summary-label">
                                Grade
                            </div>

                            <div
                                class="summary-value green"
                                id="gradeDisplay">

                                F

                            </div>

                        </div>

                    </div>

                </div>


                {{-- =================================================
                     ACTIONS
                ================================================== --}}

                <div class="form-actions">

                    <a
                        href="{{ route('results.index') }}"
                        class="cancel-btn">

                        <i class="bi bi-x-lg"></i>

                        Cancel

                    </a>


                    <button
                        type="submit"
                        class="save-btn">

                        <i class="bi bi-check-lg"></i>

                        Save Result

                    </button>

                </div>

            </form>

        </div>

    </div>

</div>


<script>

/* =========================================================
   SUBJECT DATA
========================================================= */

const subjectOptions = `
    <option value="">
        Select Subject
    </option>

    @foreach($subjects as $subject)

        <option value="{{ $subject->id }}">
            {{ $subject->name }}
        </option>

    @endforeach
`;


/* =========================================================
   SUBJECT INDEX
========================================================= */

let subjectIndex = 1;


/* =========================================================
   ADD SUBJECT
========================================================= */

function addSubjectRow()
{
    const container = document.getElementById(
        'subjectsContainer'
    );

    const row = document.createElement('div');

    row.className = 'subject-row';

    row.innerHTML = `

        <div class="form-group subject-field">

            <label class="form-label">
                Subject
                <span class="required">*</span>
            </label>

            <select
                name="subjects[${subjectIndex}][subject_id]"
                class="form-select subject-select"
                required>

                ${subjectOptions}

            </select>

        </div>


        <div class="form-group">

            <label class="form-label">
                Total Marks
                <span class="required">*</span>
            </label>

            <input
                type="number"
                name="subjects[${subjectIndex}][total_marks]"
                class="form-control total-marks"
                min="0"
                step="0.01"
                placeholder="e.g. 100"
                required>

        </div>


        <div class="form-group">

            <label class="form-label">
                Obtained Marks
                <span class="required">*</span>
            </label>

            <input
                type="number"
                name="subjects[${subjectIndex}][obtained_marks]"
                class="form-control obtained-marks"
                min="0"
                step="0.01"
                placeholder="e.g. 85"
                required>

        </div>


        <button
            type="button"
            class="remove-subject-btn"
            onclick="removeSubjectRow(this)"
            title="Remove Subject">

            <i class="bi bi-trash-fill"></i>

        </button>

    `;

    container.appendChild(row);

    subjectIndex++;

    attachCalculationEvents();

    updateSummary();
}


/* =========================================================
   REMOVE SUBJECT
========================================================= */

function removeSubjectRow(button)
{
    const rows = document.querySelectorAll(
        '#subjectsContainer .subject-row'
    );

    if (rows.length <= 1) {

        alert('At least one subject is required.');

        return;
    }

    button.closest('.subject-row').remove();

    updateSummary();
}


/* =========================================================
   CALCULATE RESULT
========================================================= */

function updateSummary()
{
    const totalInputs = document.querySelectorAll(
        '.total-marks'
    );

    const obtainedInputs = document.querySelectorAll(
        '.obtained-marks'
    );

    let totalMarks = 0;

    let obtainedMarks = 0;


    totalInputs.forEach(function(input) {

        const value = parseFloat(input.value);

        if (!isNaN(value) && value >= 0) {
            totalMarks += value;
        }

    });


    obtainedInputs.forEach(function(input) {

        const value = parseFloat(input.value);

        if (!isNaN(value) && value >= 0) {
            obtainedMarks += value;
        }

    });


    const percentage = totalMarks > 0
        ? (obtainedMarks / totalMarks) * 100
        : 0;


    const grade = calculateGrade(percentage);


    document.getElementById(
        'totalMarksDisplay'
    ).textContent = formatNumber(totalMarks);


    document.getElementById(
        'obtainedMarksDisplay'
    ).textContent = formatNumber(obtainedMarks);


    document.getElementById(
        'percentageDisplay'
    ).textContent = percentage.toFixed(2) + '%';


    document.getElementById(
        'gradeDisplay'
    ).textContent = grade;
}


/* =========================================================
   GRADE
========================================================= */

function calculateGrade(percentage)
{
    if (percentage >= 80) {
        return 'A+';
    }

    if (percentage >= 70) {
        return 'A';
    }

    if (percentage >= 60) {
        return 'B';
    }

    if (percentage >= 50) {
        return 'C';
    }

    if (percentage >= 40) {
        return 'D';
    }

    return 'F';
}


/* =========================================================
   NUMBER FORMAT
========================================================= */

function formatNumber(number)
{
    if (Number.isInteger(number)) {
        return number.toString();
    }

    return number.toFixed(2);
}


/* =========================================================
   CALCULATION EVENTS
========================================================= */

function attachCalculationEvents()
{
    document
        .querySelectorAll('.total-marks, .obtained-marks')
        .forEach(function(input) {

            input.removeEventListener(
                'input',
                updateSummary
            );

            input.addEventListener(
                'input',
                updateSummary
            );

        });
}


/* =========================================================
   PREVENT OBTAINED > TOTAL
========================================================= */

document.addEventListener('input', function(event) {

    if (
        event.target.classList.contains(
            'obtained-marks'
        )
    ) {

        const row = event.target.closest(
            '.subject-row'
        );

        if (!row) {
            return;
        }

        const totalInput = row.querySelector(
            '.total-marks'
        );

        const obtainedInput = event.target;

        const total = parseFloat(
            totalInput.value
        );

        const obtained = parseFloat(
            obtainedInput.value
        );

        if (
            !isNaN(total) &&
            !isNaN(obtained) &&
            obtained > total
        ) {

            obtainedInput.setCustomValidity(
                'Obtained marks cannot be greater than total marks.'
            );

        } else {

            obtainedInput.setCustomValidity('');

        }

    }

});


/* =========================================================
   INITIAL EVENTS
========================================================= */

attachCalculationEvents();

updateSummary();

</script>

@endsection
