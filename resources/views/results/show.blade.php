@extends('layouts.app')

@section('title', 'Result Details')

@section('content')

<style>
/* =========================================================
   RESULT SHOW PAGE
========================================================= */

body:has(.result-show-page) {
    background: #080e17 !important;
    color: #dbe4f2;
}

body:has(.result-show-page) .main-wrapper {
    background: #080e17 !important;
}

body:has(.result-show-page) .page-content {
    background: #080e17 !important;
    color: #dbe4f2;
}

body:has(.result-show-page) .topbar {
    background: rgba(8, 14, 23, 0.95) !important;
    border-bottom-color: #1b2738 !important;
}

body:has(.result-show-page) .page-title {
    color: #f8fafc !important;
}

body:has(.result-show-page) .page-subtitle {
    color: #64748b !important;
}

.result-show-page {
    color: #dbe4f2;
    padding-bottom: 35px;
}

/* Header */

.result-show-header {
    display: flex;
    justify-content: space-between;
    align-items: flex-end;
    gap: 20px;
    margin-bottom: 24px;
}

.result-show-heading small {
    display: block;
    color: #8b5cf6;
    font-size: 11px;
    font-weight: 800;
    letter-spacing: 1.8px;
    text-transform: uppercase;
    margin-bottom: 6px;
}

.result-show-heading h1 {
    margin: 0;
    color: #f8fafc;
    font-size: 28px;
    font-weight: 800;
}

.result-show-heading p {
    margin: 7px 0 0;
    color: #64748b;
    font-size: 13px;
}

/* Buttons */

.result-show-actions {
    display: flex;
    gap: 10px;
    flex-wrap: wrap;
}

.result-btn {
    border: 1px solid #263449;
    background: #0d1521;
    color: #cbd5e1;
    text-decoration: none;
    padding: 9px 15px;
    border-radius: 9px;
    font-size: 13px;
    font-weight: 700;
    transition: .2s ease;
}

.result-btn:hover {
    color: #fff;
    border-color: #8b5cf6;
    background: #151126;
}

.result-btn.primary {
    border: none;
    color: #fff;
    background: linear-gradient(135deg, #8b5cf6, #6d28d9);
}

.result-btn.primary:hover {
    color: #fff;
    transform: translateY(-1px);
}

/* Student / Exam Card */

.result-info-card {
    background: linear-gradient(145deg, #0d1521, #101827);
    border: 1px solid #1b2738;
    border-radius: 15px;
    padding: 22px;
    margin-bottom: 20px;
    box-shadow: 0 12px 30px rgba(0,0,0,.16);
}

.result-info-grid {
    display: grid;
    grid-template-columns: repeat(2, minmax(0, 1fr));
    gap: 20px;
}

.info-label {
    color: #64748b;
    font-size: 10px;
    font-weight: 800;
    letter-spacing: 1px;
    text-transform: uppercase;
    margin-bottom: 6px;
}

.info-value {
    color: #f8fafc;
    font-size: 16px;
    font-weight: 700;
}

.info-value span {
    color: #94a3b8;
    font-size: 12px;
    font-weight: 500;
}

/* Summary Cards */

.result-summary {
    display: grid;
    grid-template-columns: repeat(4, minmax(0, 1fr));
    gap: 14px;
    margin-bottom: 20px;
}

.summary-card {
    background: linear-gradient(145deg, #0d1521, #101827);
    border: 1px solid #1b2738;
    border-radius: 13px;
    padding: 18px;
}

.summary-card .summary-label {
    color: #64748b;
    font-size: 10px;
    font-weight: 800;
    text-transform: uppercase;
    letter-spacing: 1px;
    margin-bottom: 8px;
}

.summary-card .summary-value {
    color: #f8fafc;
    font-size: 23px;
    font-weight: 800;
}

.summary-card .summary-value.percentage {
    color: #22d3ee;
}

.summary-card .summary-value.grade {
    color: #22c55e;
}

/* Marks Table */

.result-table-card {
    background: linear-gradient(145deg, #0d1521, #101827);
    border: 1px solid #1b2738;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 12px 30px rgba(0,0,0,.16);
}

.result-table-header {
    padding: 18px 20px;
    border-bottom: 1px solid #1b2738;
}

.result-table-header h2 {
    margin: 0;
    color: #f8fafc;
    font-size: 16px;
    font-weight: 800;
}

.result-table-header p {
    margin: 5px 0 0;
    color: #64748b;
    font-size: 12px;
}

.table-responsive {
    overflow-x: auto;
}

.result-table {
    width: 100%;
    border-collapse: collapse;
    min-width: 650px;
}

.result-table th {
    background: #0a111c;
    color: #64748b;
    padding: 13px 16px;
    text-align: left;
    font-size: 10px;
    font-weight: 800;
    letter-spacing: 1px;
    text-transform: uppercase;
    border-bottom: 1px solid #1b2738;
}

.result-table td {
    padding: 14px 16px;
    color: #cbd5e1;
    font-size: 13px;
    border-bottom: 1px solid #172131;
}

.result-table tbody tr:hover {
    background: rgba(139, 92, 246, .035);
}

.result-table tbody tr:last-child td {
    border-bottom: none;
}

.subject-name {
    color: #f8fafc;
    font-weight: 700;
}

.marks-obtained {
    color: #22d3ee !important;
    font-weight: 800;
}

.percentage-badge {
    display: inline-flex;
    align-items: center;
    padding: 5px 9px;
    border-radius: 7px;
    background: rgba(34, 211, 238, .08);
    border: 1px solid rgba(34, 211, 238, .18);
    color: #22d3ee;
    font-size: 11px;
    font-weight: 800;
}

.grade-badge {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    min-width: 38px;
    padding: 5px 9px;
    border-radius: 7px;
    background: rgba(34, 197, 94, .08);
    border: 1px solid rgba(34, 197, 94, .18);
    color: #22c55e;
    font-size: 11px;
    font-weight: 800;
}

/* Empty */

.no-items {
    text-align: center;
    padding: 35px 20px;
    color: #64748b;
}

/* Print */

@media print {

    body,
    body:has(.result-show-page),
    body:has(.result-show-page) .main-wrapper,
    body:has(.result-show-page) .page-content {
        background: #fff !important;
        color: #111 !important;
    }

    body:has(.result-show-page) .topbar,
    .result-show-actions {
        display: none !important;
    }

    .result-show-page {
        color: #111 !important;
    }

    .result-info-card,
    .summary-card,
    .result-table-card {
        background: #fff !important;
        border: 1px solid #ddd !important;
        box-shadow: none !important;
    }

    .result-show-heading h1,
    .info-value,
    .summary-card .summary-value,
    .result-table-header h2,
    .subject-name {
        color: #111 !important;
    }

    .result-table th {
        background: #f5f5f5 !important;
        color: #333 !important;
    }

    .result-table td {
        color: #333 !important;
        border-color: #ddd !important;
    }

    .percentage-badge,
    .grade-badge {
        color: #111 !important;
        background: #fff !important;
        border: 1px solid #aaa !important;
    }
}

/* Mobile */

@media (max-width: 900px) {

    .result-summary {
        grid-template-columns: repeat(2, minmax(0, 1fr));
    }
}

@media (max-width: 700px) {

    .result-show-header {
        align-items: flex-start;
        flex-direction: column;
    }

    .result-info-grid {
        grid-template-columns: 1fr;
        gap: 15px;
    }

    .result-show-heading h1 {
        font-size: 23px;
    }

    .result-info-card {
        padding: 17px;
    }
}

@media (max-width: 480px) {

    .result-summary {
        grid-template-columns: 1fr;
    }

    .result-show-actions {
        width: 100%;
    }

    .result-btn {
        flex: 1;
        text-align: center;
    }
}
</style>

<div class="result-show-page">


{{-- HEADER --}}
<div class="result-show-header">

    <div class="result-show-heading">
        <small>Academy Management</small>

        <h1>Result Details</h1>

        <p>
            Complete examination result and subject-wise marks.
        </p>
    </div>

    <div class="result-show-actions">

        <a href="{{ route('results.index') }}" class="result-btn">
            <i class="bi bi-arrow-left"></i>
            Back
        </a>

        <a href="{{ route('results.edit', $result) }}" class="result-btn">
            <i class="bi bi-pencil-square"></i>
            Edit
        </a>

        <button type="button"
                onclick="window.print()"
                class="result-btn primary">
            <i class="bi bi-printer"></i>
            Print Result
        </button>

    </div>

</div>


{{-- STUDENT / EXAM INFORMATION --}}
<div class="result-info-card">

    <div class="result-info-grid">

        <div>
            <div class="info-label">Student</div>

            <div class="info-value">
                {{ $result->student->first_name }}
                {{ $result->student->last_name }}
            </div>

            <span>
                Student Code:
                {{ $result->student->student_code }}
            </span>
        </div>


        <div>
            <div class="info-label">Father Name</div>

            <div class="info-value">
                {{ $result->student->father_name }}
            </div>
        </div>


        <div>
            <div class="info-label">Exam</div>

            <div class="info-value">
                {{ $result->exam->name }}
            </div>

            @if($result->exam->academic_year)
                <span>
                    Academic Year:
                    {{ $result->exam->academic_year }}
                </span>
            @endif
        </div>


        <div>
            <div class="info-label">Exam Date</div>

            <div class="info-value">

                @if($result->exam->exam_date)
                    {{ $result->exam->exam_date->format('d M Y') }}
                @else
                    <span>Not specified</span>
                @endif

            </div>
        </div>

    </div>

</div>


{{-- SUMMARY --}}
<div class="result-summary">

    <div class="summary-card">

        <div class="summary-label">
            Total Marks
        </div>

        <div class="summary-value">
            {{ number_format($result->total_marks, 2) }}
        </div>

    </div>


    <div class="summary-card">

        <div class="summary-label">
            Obtained Marks
        </div>

        <div class="summary-value">
            {{ number_format($result->obtained_marks, 2) }}
        </div>

    </div>


    <div class="summary-card">

        <div class="summary-label">
            Percentage
        </div>

        <div class="summary-value percentage">
            {{ number_format($result->percentage, 2) }}%
        </div>

    </div>


    <div class="summary-card">

        <div class="summary-label">
            Grade
        </div>

        <div class="summary-value grade">
            {{ $result->grade ?? '-' }}
        </div>

    </div>

</div>


{{-- SUBJECT MARKS --}}
<div class="result-table-card">

    <div class="result-table-header">

        <h2>Subject-wise Result</h2>

        <p>
            Marks obtained in each subject.
        </p>

    </div>


    <div class="table-responsive">

        @if($result->items->count())

            <table class="result-table">

                <thead>
                    <tr>
                        <th>#</th>
                        <th>Subject</th>
                        <th>Total Marks</th>
                        <th>Obtained Marks</th>
                        <th>Percentage</th>
                        <th>Grade</th>
                    </tr>
                </thead>

                <tbody>

                    @foreach($result->items as $index => $item)

                        <tr>

                            <td>
                                {{ $index + 1 }}
                            </td>

                            <td class="subject-name">
                                {{ $item->subject->name }}
                            </td>

                            <td>
                                {{ number_format($item->total_marks, 2) }}
                            </td>

                            <td class="marks-obtained">
                                {{ number_format($item->obtained_marks, 2) }}
                            </td>

                            <td>
                                <span class="percentage-badge">
                                    {{ number_format($item->percentage, 2) }}%
                                </span>
                            </td>

                            <td>
                                <span class="grade-badge">
                                    {{ $item->grade ?? '-' }}
                                </span>
                            </td>

                        </tr>

                    @endforeach

                </tbody>

            </table>

        @else

            <div class="no-items">
                No subject marks found for this result.
            </div>

        @endif

    </div>

</div>


</div>

@endsection
