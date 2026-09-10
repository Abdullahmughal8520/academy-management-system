@extends('layouts.app')

@section('title', 'Edit Result')

@section('content')

<style>
/* =========================================================
   RESULT EDIT PAGE
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
    background: rgba(8, 14, 23, .95) !important;
    border-bottom-color: #1b2738 !important;
}

body:has(.result-form-page) .page-title {
    color: #f8fafc !important;
}

body:has(.result-form-page) .page-subtitle {
    color: #64748b !important;
}

.result-form-page {
    color: #dbe4f2;
    padding-bottom: 35px;
}

.result-form-header {
    display: flex;
    justify-content: space-between;
    align-items: flex-end;
    gap: 20px;
    margin-bottom: 24px;
}

.result-form-heading small {
    display: block;
    color: #8b5cf6;
    font-size: 11px;
    font-weight: 800;
    letter-spacing: 1.8px;
    text-transform: uppercase;
    margin-bottom: 6px;
}

.result-form-heading h1 {
    margin: 0;
    color: #f8fafc;
    font-size: 28px;
    font-weight: 800;
}

.result-form-heading p {
    margin: 7px 0 0;
    color: #64748b;
    font-size: 13px;
}

.result-back-btn {
    display: inline-flex;
    align-items: center;
    gap: 7px;
    padding: 9px 15px;
    border-radius: 9px;
    background: #0d1521;
    border: 1px solid #263449;
    color: #cbd5e1;
    text-decoration: none;
    font-size: 13px;
    font-weight: 700;
    transition: .2s ease;
}

.result-back-btn:hover {
    color: #fff;
    border-color: #8b5cf6;
    background: #151126;
}

.result-form-card {
    background: linear-gradient(145deg, #0d1521, #101827);
    border: 1px solid #1b2738;
    border-radius: 15px;
    padding: 22px;
    box-shadow: 0 12px 30px rgba(0,0,0,.16);
}

.form-section-title {
    color: #f8fafc;
    font-size: 14px;
    font-weight: 800;
    margin-bottom: 15px;
}

.form-section-subtitle {
    color: #64748b;
    font-size: 11px;
    margin-top: -9px;
    margin-bottom: 18px;
}

.result-form-page .form-label {
    color: #94a3b8;
    font-size: 10px;
    font-weight: 800;
    letter-spacing: .8px;
    text-transform: uppercase;
    margin-bottom: 7px;
}

.result-form-page .form-control,
.result-form-page .form-select {
    background: #0a111c !important;
    border: 1px solid #263449 !important;
    color: #dbe4f2 !important;
    border-radius: 9px;
    font-size: 13px;
    min-height: 42px;
    box-shadow: none !important;
}

.result-form-page .form-control:focus,
.result-form-page .form-select:focus {
    border-color: #8b5cf6 !important;
    box-shadow: 0 0 0 3px rgba(139,92,246,.10) !important;
}

.result-form-page .form-select option {
    background: #0d1521;
    color: #dbe4f2;
}

.result-form-page .form-control::placeholder {
    color: #4f6076;
}

.subject-section {
    margin-top: 25px;
}

.subject-table-wrapper {
    overflow-x: auto;
    border: 1px solid #1b2738;
    border-radius: 12px;
}

.subject-table {
    width: 100%;
    min-width: 760px;
    border-collapse: collapse;
}

.subject-table th {
    background: #0a111c;
    color: #64748b;
    padding: 11px 12px;
    font-size: 9px;
    font-weight: 800;
    letter-spacing: .8px;
    text-transform: uppercase;
    border-bottom: 1px solid #1b2738;
    text-align: left;
}

.subject-table td {
    padding: 10px 12px;
    border-bottom: 1px solid #172131;
    vertical-align: middle;
}

.subject-table tbody tr:last-child td {
    border-bottom: none;
}

.subject-table .form-control,
.subject-table .form-select {
    min-height: 38px;
    font-size: 12px;
}

.remove-subject {
    width: 36px;
    height: 36px;
    display: inline-grid;
    place-items: center;
    border: 1px solid rgba(244,63,94,.25);
    background: rgba(244,63,94,.07);
    color: #f43f5e;
    border-radius: 8px;
    transition: .2s ease;
}

.remove-subject:hover {
    background: rgba(244,63,94,.14);
    border-color: rgba(244,63,94,.45);
}

.add-subject-btn {
    display: inline-flex;
    align-items: center;
    gap: 7px;
    margin-top: 13px;
    padding: 8px 13px;
    border-radius: 8px;
    background: rgba(139,92,246,.08);
    border: 1px solid rgba(139,92,246,.25);
    color: #a78bfa;
    font-size: 11px;
    font-weight: 800;
    transition: .2s ease;
}

.add-subject-btn:hover {
    background: rgba(139,92,246,.15);
    border-color: rgba(139,92,246,.45);
    color: #c4b5fd;
}

.result-summary {
    display: grid;
    grid-template-columns: repeat(4, minmax(0, 1fr));
    gap: 12px;
    margin-top: 22px;
}

.summary-box {
    background: #0a111c;
    border: 1px solid #1b2738;
    border-radius: 11px;
    padding: 14px;
}

.summary-label {
    color: #64748b;
    font-size: 9px;
    font-weight: 800;
    text-transform: uppercase;
    letter-spacing: .8px;
    margin-bottom: 6px;
}

.summary-value {
    color: #f8fafc;
    font-size: 19px;
    font-weight: 800;
}

.summary-value.cyan {
    color: #22d3ee;
}

.summary-value.green {
    color: #22c55e;
}

.form-actions {
    display: flex;
    justify-content: flex-end;
    gap: 10px;
    margin-top: 25px;
    padding-top: 18px;
    border-top: 1px solid #1b2738;
}

.cancel-btn,
.update-btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 7px;
    padding: 10px 17px;
    border-radius: 9px;
    font-size: 12px;
    font-weight: 800;
    text-decoration: none;
    transition: .2s ease;
}

.cancel-btn {
    background: #0d1521;
    border: 1px solid #263449;
    color: #94a3b8;
}

.cancel-btn:hover {
    color: #fff;
    border-color: #465777;
}

.update-btn {
    border: 1px solid rgba(167,139,250,.4);
    background: linear-gradient(135deg,#6848e8,#8b5cf6);
    color: #fff;
    cursor: pointer;
    box-shadow: 0 8px 22px rgba(124,58,237,.18);
}

.update-btn:hover {
    color: #fff;
    transform: translateY(-2px);
    box-shadow: 0 11px 27px rgba(124,58,237,.28);
}

.validation-errors {
    background: rgba(244,63,94,.07);
    border: 1px solid rgba(244,63,94,.25);
    border-radius: 10px;
    padding: 12px 15px;
    margin-bottom: 20px;
}

.validation-errors strong {
    color: #f43f5e;
    font-size: 12px;
}

.validation-errors ul {
    margin: 7px 0 0;
    padding-left: 18px;
}

.validation-errors li {
    color: #fda4af;
    font-size: 11px;
    margin-bottom: 3px;
}

@media(max-width:900px) {
    .result-summary {
        grid-template-columns: repeat(2, minmax(0, 1fr));
    }
}

@media(max-width:700px) {

    .result-form-header {
        align-items: flex-start;
        flex-direction: column;
    }

    .result-form-heading h1 {
        font-size: 23px;
    }

    .result-form-card {
        padding: 17px;
    }

    .form-actions {
        flex-direction: column;
    }

    .cancel-btn,
    .update-btn {
        width: 100%;
    }
}

@media(max-width:480px) {

    .result-summary {
        grid-template-columns: 1fr;
    }
}
</style>

<div class="result-form-page">


{{-- HEADER --}}
<div class="result-form-header">

    <div class="result-form-heading">

        <small>Academy Management</small>

        <h1>Edit Result</h1>

        <p>
            Update student examination marks and result details.
        </p>

    </div>


    <a href="{{ route('results.index') }}"
       class="result-back-btn">

        <i class="bi bi-arrow-left"></i>

        Back to Results

    </a>

</div>


{{-- VALIDATION ERRORS --}}
@if($errors->any())

    <div class="validation-errors">

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


{{-- FORM --}}
<div class="result-form-card">

    <form action="{{ route('results.update', $result) }}"
          method="POST">

        @csrf
        @method('PUT')


        {{-- BASIC INFORMATION --}}

        <div class="form-section-title">
            Result Information
        </div>

        <div class="form-section-subtitle">
            Select the student and examination for this result.
        </div>


        <div class="row g-3">

            {{-- STUDENT --}}

            <div class="col-md-6">

                <label class="form-label">
                    Student
                </label>

                <select name="student_id"
                        class="form-select"
                        required>

                    <option value="">
                        Select Student
                    </option>

                    @foreach($students as $student)

                        <option value="{{ $student->id }}"
                            {{ old('student_id', $result->student_id) == $student->id ? 'selected' : '' }}>

                            {{ $student->first_name }}
                            {{ $student->last_name }}

                            — {{ $student->student_code }}

                        </option>

                    @endforeach

                </select>

            </div>


            {{-- EXAM --}}

            <div class="col-md-6">

                <label class="form-label">
                    Exam
                </label>

                <select name="exam_id"
                        class="form-select"
                        required>

                    <option value="">
                        Select Exam
                    </option>

                    @foreach($exams as $exam)

                        <option value="{{ $exam->id }}"
                            {{ old('exam_id', $result->exam_id) == $exam->id ? 'selected' : '' }}>

                            {{ $exam->name }}

                            @if($exam->academic_year)
                                — {{ $exam->academic_year }}
                            @endif

                        </option>

                    @endforeach

                </select>

            </div>

        </div>


        {{-- SUBJECTS --}}

        <div class="subject-section">

            <div class="form-section-title">
                Subject Marks
            </div>

            <div class="form-section-subtitle">
                Update total and obtained marks for every subject.
            </div>


            <div class="subject-table-wrapper">

                <table class="subject-table">

                    <thead>

                        <tr>

                            <th style="width:25px;">
                                #
                            </th>

                            <th style="min-width:210px;">
                                Subject
                            </th>

                            <th style="min-width:150px;">
                                Total Marks
                            </th>

                            <th style="min-width:170px;">
                                Obtained Marks
                            </th>

                            <th style="min-width:130px;">
                                Percentage
                            </th>

                            <th style="width:65px;">
                                Action
                            </th>

                        </tr>

                    </thead>


                    <tbody id="subjectsContainer">

                        @php

                            $existingItems = $result->items;

                            if(old('subjects')) {
                                $rows = old('subjects');
                            } else {
                                $rows = $existingItems->map(function($item) {
                                    return [
                                        'subject_id' => $item->subject_id,
                                        'total_marks' => $item->total_marks,
                                        'obtained_marks' => $item->obtained_marks,
                                    ];
                                })->toArray();
                            }

                        @endphp


                        @foreach($rows as $index => $row)

                            <tr class="subject-row">

                                <td class="row-number">
                                    {{ $index + 1 }}
                                </td>


                                <td>

                                    <select name="subjects[{{ $index }}][subject_id]"
                                            class="form-select subject-select"
                                            required>

                                        <option value="">
                                            Select Subject
                                        </option>

                                        @foreach($subjects as $subject)

                                            <option value="{{ $subject->id }}"
                                                {{ ($row['subject_id'] ?? '') == $subject->id ? 'selected' : '' }}>

                                                {{ $subject->name }}

                                            </option>

                                        @endforeach

                                    </select>

                                </td>


                                <td>

                                    <input type="number"
                                           name="subjects[{{ $index }}][total_marks]"
                                           class="form-control total-marks"
                                           value="{{ $row['total_marks'] ?? '' }}"
                                           min="0"
                                           step="0.01"
                                           required>

                                </td>


                                <td>

                                    <input type="number"
                                           name="subjects[{{ $index }}][obtained_marks]"
                                           class="form-control obtained-marks"
                                           value="{{ $row['obtained_marks'] ?? '' }}"
                                           min="0"
                                           step="0.01"
                                           required>

                                </td>


                                <td>

                                    <span class="row-percentage"
                                          style="color:#22d3ee;font-size:12px;font-weight:800;">

                                        0.00%

                                    </span>

                                </td>


                                <td>

                                    <button type="button"
                                            class="remove-subject"
                                            title="Remove Subject">

                                        <i class="bi bi-trash3"></i>

                                    </button>

                                </td>

                            </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>


            <button type="button"
                    id="addSubject"
                    class="add-subject-btn">

                <i class="bi bi-plus-lg"></i>

                Add Subject

            </button>

        </div>


        {{-- SUMMARY --}}

        <div class="result-summary">

            <div class="summary-box">

                <div class="summary-label">
                    Total Marks
                </div>

                <div class="summary-value"
                     id="totalMarks">
                    0.00
                </div>

            </div>


            <div class="summary-box">

                <div class="summary-label">
                    Obtained Marks
                </div>

                <div class="summary-value"
                     id="obtainedMarks">
                    0.00
                </div>

            </div>


            <div class="summary-box">

                <div class="summary-label">
                    Percentage
                </div>

                <div class="summary-value cyan"
                     id="percentage">
                    0.00%
                </div>

            </div>


            <div class="summary-box">

                <div class="summary-label">
                    Grade
                </div>

                <div class="summary-value green"
                     id="grade">
                    -
                </div>

            </div>

        </div>


        {{-- ACTIONS --}}

        <div class="form-actions">

            <a href="{{ route('results.index') }}"
               class="cancel-btn">

                <i class="bi bi-x-lg"></i>

                Cancel

            </a>


            <button type="submit"
                    class="update-btn">

                <i class="bi bi-check2-circle"></i>

                Update Result

            </button>

        </div>

    </form>

</div>


</div>

<script>

document.addEventListener('DOMContentLoaded', function () {

    const container = document.getElementById('subjectsContainer');
    const addButton = document.getElementById('addSubject');

    let rowIndex = container.querySelectorAll('.subject-row').length;


    function updateRowNumbers() {

        const rows = container.querySelectorAll('.subject-row');

        rows.forEach((row, index) => {

            const number = row.querySelector('.row-number');

            if (number) {
                number.textContent = index + 1;
            }

        });

    }


    function calculateRow(row) {

        const totalInput =
            row.querySelector('.total-marks');

        const obtainedInput =
            row.querySelector('.obtained-marks');

        const percentageElement =
            row.querySelector('.row-percentage');


        const total =
            parseFloat(totalInput.value) || 0;

        const obtained =
            parseFloat(obtainedInput.value) || 0;


        if (obtained > total && total > 0) {

            obtainedInput.setCustomValidity(
                'Obtained marks cannot be greater than total marks.'
            );

        } else {

            obtainedInput.setCustomValidity('');

        }


        const percentage =
            total > 0
                ? (obtained / total) * 100
                : 0;


        percentageElement.textContent =
            percentage.toFixed(2) + '%';


        return {
            total,
            obtained
        };

    }


    function calculateSummary() {

        let totalMarks = 0;
        let obtainedMarks = 0;


        const rows =
            container.querySelectorAll('.subject-row');


        rows.forEach(row => {

            const values =
                calculateRow(row);

            totalMarks += values.total;
            obtainedMarks += values.obtained;

        });


        const percentage =
            totalMarks > 0
                ? (obtainedMarks / totalMarks) * 100
                : 0;


        let grade = '-';


        if (totalMarks > 0) {

            if (percentage >= 80) {
                grade = 'A+';
            } else if (percentage >= 70) {
                grade = 'A';
            } else if (percentage >= 60) {
                grade = 'B';
            } else if (percentage >= 50) {
                grade = 'C';
            } else if (percentage >= 40) {
                grade = 'D';
            } else {
                grade = 'F';
            }

        }


        document.getElementById('totalMarks')
            .textContent = totalMarks.toFixed(2);

        document.getElementById('obtainedMarks')
            .textContent = obtainedMarks.toFixed(2);

        document.getElementById('percentage')
            .textContent = percentage.toFixed(2) + '%';

        document.getElementById('grade')
            .textContent = grade;

    }


    function attachRowEvents(row) {

        const totalInput =
            row.querySelector('.total-marks');

        const obtainedInput =
            row.querySelector('.obtained-marks');


        totalInput.addEventListener(
            'input',
            calculateSummary
        );

        obtainedInput.addEventListener(
            'input',
            calculateSummary
        );


        const removeButton =
            row.querySelector('.remove-subject');


        removeButton.addEventListener(
            'click',
            function () {

                const rows =
                    container.querySelectorAll('.subject-row');


                if (rows.length <= 1) {

                    alert(
                        'At least one subject is required.'
                    );

                    return;

                }


                row.remove();

                updateRowNumbers();

                calculateSummary();

            }
        );

    }


    container
        .querySelectorAll('.subject-row')
        .forEach(attachRowEvents);


    addButton.addEventListener(
        'click',
        function () {

            const row = document.createElement('tr');

            row.className = 'subject-row';


            row.innerHTML = `

                <td class="row-number">
                    ${container.querySelectorAll('.subject-row').length + 1}
                </td>

                <td>

                    <select
                        name="subjects[${rowIndex}][subject_id]"
                        class="form-select subject-select"
                        required>

                        <option value="">
                            Select Subject
                        </option>

                        @foreach($subjects as $subject)

                            <option value="{{ $subject->id }}">
                                {{ $subject->name }}
                            </option>

                        @endforeach

                    </select>

                </td>

                <td>

                    <input
                        type="number"
                        name="subjects[${rowIndex}][total_marks]"
                        class="form-control total-marks"
                        min="0"
                        step="0.01"
                        required>

                </td>

                <td>

                    <input
                        type="number"
                        name="subjects[${rowIndex}][obtained_marks]"
                        class="form-control obtained-marks"
                        min="0"
                        step="0.01"
                        required>

                </td>

                <td>

                    <span
                        class="row-percentage"
                        style="color:#22d3ee;font-size:12px;font-weight:800;">

                        0.00%

                    </span>

                </td>

                <td>

                    <button
                        type="button"
                        class="remove-subject"
                        title="Remove Subject">

                        <i class="bi bi-trash3"></i>

                    </button>

                </td>

            `;


            container.appendChild(row);

            attachRowEvents(row);

            rowIndex++;

            calculateSummary();

        }
    );


    calculateSummary();

});

</script>

@endsection
