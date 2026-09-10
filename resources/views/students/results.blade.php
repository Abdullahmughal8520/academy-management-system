
@extends('layouts.app')

@section('title', 'My Results')

@section('content')

<style>

/* =========================================================
   STUDENT RESULTS PAGE
========================================================= */

.student-results-page {
    color: #dbe4f2;
    padding-bottom: 30px;
}

/* Header */

.student-results-page .results-header {
    display: flex;
    justify-content: space-between;
    align-items: flex-end;
    gap: 20px;
    margin-bottom: 24px;
}

.student-results-page .eyebrow {
    color: #8b5cf6;
    font-size: 11px;
    font-weight: 700;
    letter-spacing: 1.5px;
    text-transform: uppercase;
    margin-bottom: 7px;
}

.student-results-page h1 {
    margin: 0;
    color: #f8fafc;
    font-size: 27px;
    font-weight: 800;
}

.student-results-page .subtitle {
    color: #64748b;
    font-size: 13px;
    margin-top: 6px;
}

/* Back button */

.student-results-page .back-btn {
    display: inline-flex;
    align-items: center;
    gap: 7px;
    text-decoration: none;
    color: #c4b5fd;
    background: #111827;
    border: 1px solid #263244;
    border-radius: 10px;
    padding: 9px 14px;
    font-size: 12px;
    font-weight: 600;
    transition: .2s ease;
}

.student-results-page .back-btn:hover {
    background: #171f30;
    border-color: #8b5cf6;
    color: #fff;
}

/* Student info */

.student-results-page .student-info {
    background: linear-gradient(
        135deg,
        #111827 0%,
        #121a2a 55%,
        #171331 100%
    );
    border: 1px solid #202c3e;
    border-radius: 15px;
    padding: 18px 20px;
    margin-bottom: 20px;
}

.student-results-page .student-info-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 18px;
}

.student-results-page .info-label {
    color: #64748b;
    font-size: 10px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: .7px;
    margin-bottom: 5px;
}

.student-results-page .info-value {
    color: #f1f5f9;
    font-size: 14px;
    font-weight: 600;
}

/* No results */

.student-results-page .empty-state {
    background: linear-gradient(
        135deg,
        #0d1521,
        #111827
    );
    border: 1px solid #1f2b3d;
    border-radius: 15px;
    padding: 55px 20px;
    text-align: center;
}

.student-results-page .empty-icon {
    width: 62px;
    height: 62px;
    margin: 0 auto 16px;
    border-radius: 16px;
    background: rgba(139, 92, 246, .12);
    border: 1px solid rgba(139, 92, 246, .25);
    display: flex;
    align-items: center;
    justify-content: center;
    color: #a78bfa;
    font-size: 26px;
}

.student-results-page .empty-state h3 {
    color: #f8fafc;
    font-size: 18px;
    margin-bottom: 7px;
}

.student-results-page .empty-state p {
    color: #64748b;
    font-size: 13px;
    margin: 0;
}

/* Result card */

.student-results-page .result-card {
    background: linear-gradient(
        135deg,
        #0d1521 0%,
        #111827 65%,
        #15122a 100%
    );
    border: 1px solid #202c3e;
    border-radius: 16px;
    overflow: hidden;
    margin-bottom: 22px;
    box-shadow: 0 12px 35px rgba(0, 0, 0, .18);
}

/* Result top */

.student-results-page .result-top {
    padding: 20px;
    border-bottom: 1px solid #1d2939;
}

.student-results-page .exam-info {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    gap: 20px;
}

.student-results-page .exam-name {
    color: #f8fafc;
    font-size: 19px;
    font-weight: 800;
    margin-bottom: 5px;
}

.student-results-page .exam-meta {
    color: #64748b;
    font-size: 12px;
}

.student-results-page .grade-badge {
    min-width: 58px;
    height: 42px;
    padding: 0 12px;
    border-radius: 10px;
    background: rgba(34, 197, 94, .10);
    border: 1px solid rgba(34, 197, 94, .25);
    color: #4ade80;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 16px;
    font-weight: 800;
}

/* Summary */

.student-results-page .summary-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 12px;
    padding: 18px 20px;
    border-bottom: 1px solid #1d2939;
}

.student-results-page .summary-box {
    background: #0a111c;
    border: 1px solid #1b2738;
    border-radius: 11px;
    padding: 13px;
}

.student-results-page .summary-label {
    color: #64748b;
    font-size: 10px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: .6px;
    margin-bottom: 6px;
}

.student-results-page .summary-value {
    color: #e2e8f0;
    font-size: 17px;
    font-weight: 800;
}

.student-results-page .percentage-value {
    color: #a78bfa;
}

/* Subject table */

.student-results-page .subjects-section {
    padding: 18px 20px 20px;
}

.student-results-page .section-title {
    color: #f1f5f9;
    font-size: 13px;
    font-weight: 700;
    margin-bottom: 13px;
}

.student-results-page .table-wrap {
    overflow-x: auto;
}

.student-results-page table {
    width: 100%;
    min-width: 650px;
    border-collapse: collapse;
}

.student-results-page thead th {
    background: #0a111c;
    color: #64748b;
    font-size: 10px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: .6px;
    padding: 11px 12px;
    border-bottom: 1px solid #1f2b3d;
    text-align: left;
}

.student-results-page tbody td {
    color: #cbd5e1;
    font-size: 12px;
    padding: 13px 12px;
    border-bottom: 1px solid #172232;
}

.student-results-page tbody tr:last-child td {
    border-bottom: 0;
}

.student-results-page tbody tr:hover {
    background: rgba(139, 92, 246, .035);
}

.student-results-page .subject-name {
    color: #f1f5f9;
    font-weight: 600;
}

.student-results-page .marks {
    font-weight: 700;
    color: #e2e8f0;
}

.student-results-page .subject-percentage {
    color: #a78bfa;
    font-weight: 700;
}

.student-results-page .subject-grade {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    min-width: 34px;
    padding: 5px 8px;
    border-radius: 7px;
    background: rgba(139, 92, 246, .10);
    border: 1px solid rgba(139, 92, 246, .20);
    color: #c4b5fd;
    font-size: 11px;
    font-weight: 800;
}

/* Footer */

.student-results-page .result-footer {
    display: flex;
    justify-content: flex-end;
    padding: 14px 20px;
    border-top: 1px solid #1d2939;
}

.student-results-page .result-date {
    color: #475569;
    font-size: 10px;
}

/* Dark layout */

body:has(.student-results-page) {
    background: #080e17 !important;
    color: #dbe4f2;
}

body:has(.student-results-page) .main-wrapper {
    background: #080e17 !important;
}

body:has(.student-results-page) .page-content {
    background: #080e17 !important;
    color: #dbe4f2;
}

body:has(.student-results-page) .topbar {
    background: rgba(8, 14, 23, .95) !important;
    border-bottom-color: #1b2738 !important;
}

/* Mobile */

@media (max-width: 900px) {

    .student-results-page .summary-grid {
        grid-template-columns: repeat(2, 1fr);
    }

    .student-results-page .student-info-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (max-width: 600px) {

    .student-results-page .results-header {
        align-items: flex-start;
        flex-direction: column;
    }

    .student-results-page h1 {
        font-size: 23px;
    }

    .student-results-page .student-info-grid {
        grid-template-columns: 1fr;
    }

    .student-results-page .summary-grid {
        grid-template-columns: 1fr 1fr;
    }

    .student-results-page .result-top {
        padding: 16px;
    }

    .student-results-page .exam-info {
        gap: 12px;
    }

    .student-results-page .exam-name {
        font-size: 16px;
    }

    .student-results-page .subjects-section {
        padding: 15px;
    }
}

</style>


<div class="student-results-page">

    {{-- Header --}}
    <div class="results-header">

        <div>
            <div class="eyebrow">Academy Management</div>

            <h1>My Results</h1>

            <div class="subtitle">
                View your examination results and subject-wise performance.
            </div>
        </div>

        <a
            href="{{ route('student.dashboard') }}"
            class="back-btn"
        >
            <i class="bi bi-arrow-left"></i>
            Dashboard
        </a>

    </div>


    {{-- Student Information --}}
    <div class="student-info">

        <div class="student-info-grid">

            <div>
                <div class="info-label">
                    Student
                </div>

                <div class="info-value">
                    {{ $student->first_name }}
                    {{ $student->last_name }}
                </div>
            </div>


            <div>
                <div class="info-label">
                    Student Code
                </div>

                <div class="info-value">
                    {{ $student->student_code }}
                </div>
            </div>


            <div>
                <div class="info-label">
                    Father Name
                </div>

                <div class="info-value">
                    {{ $student->father_name }}
                </div>
            </div>

        </div>

    </div>


    {{-- Results --}}
    @if($results->isEmpty())

        <div class="empty-state">

            <div class="empty-icon">
                <i class="bi bi-award"></i>
            </div>

            <h3>No Results Available</h3>

            <p>
                Your examination results have not been published yet.
            </p>

        </div>

    @else

        @foreach($results as $result)

            <div class="result-card">

                {{-- Exam Header --}}
                <div class="result-top">

                    <div class="exam-info">

                        <div>

                            <div class="exam-name">
                                {{ $result->exam->name }}
                            </div>

                            <div class="exam-meta">

                                @if($result->exam->academic_year)
                                    Academic Year:
                                    {{ $result->exam->academic_year }}
                                @endif

                                @if($result->exam->exam_date)
                                    •
                                    {{ $result->exam->exam_date->format('d M Y') }}
                                @endif

                            </div>

                        </div>


                        <div class="grade-badge">
                            {{ $result->grade ?? '-' }}
                        </div>

                    </div>

                </div>


                {{-- Summary --}}
                <div class="summary-grid">

                    <div class="summary-box">

                        <div class="summary-label">
                            Total Marks
                        </div>

                        <div class="summary-value">
                            {{ number_format($result->total_marks, 0) }}
                        </div>

                    </div>


                    <div class="summary-box">

                        <div class="summary-label">
                            Obtained
                        </div>

                        <div class="summary-value">
                            {{ number_format($result->obtained_marks, 0) }}
                        </div>

                    </div>


                    <div class="summary-box">

                        <div class="summary-label">
                            Percentage
                        </div>

                        <div class="summary-value percentage-value">
                            {{ number_format($result->percentage, 2) }}%
                        </div>

                    </div>


                    <div class="summary-box">

                        <div class="summary-label">
                            Grade
                        </div>

                        <div class="summary-value">
                            {{ $result->grade ?? '-' }}
                        </div>

                    </div>

                </div>


                {{-- Subjects --}}
                <div class="subjects-section">

                    <div class="section-title">
                        Subject-wise Result
                    </div>

                    <div class="table-wrap">

                        <table>

                            <thead>
                                <tr>
                                    <th>Subject</th>
                                    <th>Total Marks</th>
                                    <th>Obtained</th>
                                    <th>Percentage</th>
                                    <th>Grade</th>
                                </tr>
                            </thead>

                            <tbody>

                                @forelse($result->items as $item)

                                    <tr>

                                        <td>
                                            <span class="subject-name">
                                                {{ $item->subject->name }}
                                            </span>
                                        </td>

                                        <td>
                                            <span class="marks">
                                                {{ number_format($item->total_marks, 0) }}
                                            </span>
                                        </td>

                                        <td>
                                            <span class="marks">
                                                {{ number_format($item->obtained_marks, 0) }}
                                            </span>
                                        </td>

                                        <td>
                                            <span class="subject-percentage">
                                                {{ number_format($item->percentage, 2) }}%
                                            </span>
                                        </td>

                                        <td>
                                            <span class="subject-grade">
                                                {{ $item->grade ?? '-' }}
                                            </span>
                                        </td>

                                    </tr>

                                @empty

                                    <tr>
                                        <td colspan="5">
                                            No subject details available.
                                        </td>
                                    </tr>

                                @endforelse

                            </tbody>

                        </table>

                    </div>

                </div>


                {{-- Footer --}}
                <div class="result-footer">

                    <div class="result-date">
                        Result recorded
                        {{ $result->created_at->format('d M Y') }}
                    </div>

                </div>

            </div>

        @endforeach

    @endif

</div>

@endsection


