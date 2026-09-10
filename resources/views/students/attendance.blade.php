
@extends('layouts.app')

@section('title', 'My Attendance')

@section('content')

<style>

    html,
body {
    margin: 0;
    padding: 0;
    min-height: 100%;
    background: #080b12 !important;
    color: #e5e7eb;
}

body {
    min-height: 100vh;
}

/* Laravel main content wrapper */
main,
.app-content,
.content,
.container-fluid {
    background: #080b12 !important;
}

/* Full student page */
.student-attendance-page {
    min-height: 100vh;
    width: 100%;
    background: #080b12 !important;
    color: #e5e7eb;
    padding: 30px;
    box-sizing: border-box;
}

.student-attendance-page {
    color: #dbe4f2;
    padding-bottom: 30px;
}

.student-attendance-page * {
    box-sizing: border-box;
}

.sa-muted {
    color: #718096;
}

/* Header */
.sa-hero {
    display: flex;
    justify-content: space-between;
    align-items: flex-end;
    gap: 18px;
    margin-bottom: 20px;
}

.sa-kicker {
    font-size: 10px;
    letter-spacing: 1.6px;
    text-transform: uppercase;
    color: #a78bfa;
    font-weight: 900;
}

.sa-title {
    font-size: 27px;
    line-height: 1.15;
    font-weight: 850;
    color: #f8fafc;
    margin: 4px 0;
}

.sa-sub {
    font-size: 12px;
    color: #728197;
    margin: 0;
}

/* Buttons */
.sa-btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 7px;
    border: 1px solid #26364b;
    background: #101a29;
    color: #dce5f2;
    border-radius: 10px;
    padding: 9px 12px;
    text-decoration: none;
    font-size: 10px;
    font-weight: 800;
    transition: .25s ease;
}

.sa-btn:hover {
    color: #fff;
    transform: translateY(-3px);
    border-color: #465777;
    box-shadow: 0 10px 24px rgba(0,0,0,.25);
}

.sa-btn.primary {
    background: linear-gradient(135deg,#5b21b6,#8b5cf6);
    border-color: #7c3aed;
    color: #fff;
}

/* Cards */
.sa-card {
    position: relative;
    overflow: hidden;
    background: linear-gradient(145deg,#111b2a,#0d1521);
    border: 1px solid #223149;
    border-radius: 15px;
    padding: 15px;
    min-height: 105px;
    box-shadow: 0 12px 30px rgba(0,0,0,.12);
    transition: .25s ease;
}

.sa-card:hover {
    transform: translateY(-5px);
    border-color: rgba(139,92,246,.55);
    box-shadow:
        0 16px 38px rgba(0,0,0,.32),
        0 0 22px rgba(139,92,246,.12);
}

.sa-label {
    font-size: 9px;
    color: #7c8ba1;
    text-transform: uppercase;
    letter-spacing: .65px;
    font-weight: 900;
}

.sa-number {
    font-size: 23px;
    color: #f8fafc;
    font-weight: 900;
    margin-top: 10px;
}

.sa-icon {
    width: 38px;
    height: 38px;
    border-radius: 11px;
    background: #211d3b;
    color: #a78bfa;
    display: grid;
    place-items: center;
}

/* Panel */
.sa-panel {
    background: linear-gradient(145deg,#111b2a,#0d1521);
    border: 1px solid #223149;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 12px 30px rgba(0,0,0,.12);
}

.sa-head {
    padding: 14px 16px;
    border-bottom: 1px solid #1d2a3c;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.sa-head h3 {
    font-size: 12px;
    color: #eef3fb;
    font-weight: 850;
    margin: 0;
}

.sa-head p {
    font-size: 9px;
    color: #687890;
    margin: 3px 0 0;
}

.sa-body {
    padding: 15px;
}

/* Table */
.sa-table {
    width: 100%;
    border-collapse: collapse;
}

.sa-table th {
    color: #687890;
    font-size: 8px;
    text-transform: uppercase;
    letter-spacing: .7px;
    font-weight: 900;
    padding: 11px 10px;
    border-bottom: 1px solid #223149;
    text-align: left;
}

.sa-table td {
    padding: 12px 10px;
    border-bottom: 1px solid #1b283a;
    font-size: 10px;
    color: #dbe4f2;
}

.sa-table tbody tr {
    transition: .2s ease;
}

.sa-table tbody tr:hover {
    background: rgba(139,92,246,.045);
}

.sa-status {
    display: inline-flex;
    align-items: center;
    gap: 5px;
    padding: 4px 8px;
    border-radius: 999px;
    font-size: 8px;
    font-weight: 900;
    text-transform: capitalize;
}

.sa-status.present {
    color: #86efac;
    background: rgba(34,197,94,.10);
}

.sa-status.absent {
    color: #fda4af;
    background: rgba(244,63,94,.10);
}

.sa-status.leave {
    color: #fcd34d;
    background: rgba(245,158,11,.10);
}

.sa-status.late {
    color: #67e8f9;
    background: rgba(34,211,238,.10);
}

.sa-empty {
    text-align: center;
    color: #65758c;
    font-size: 10px;
    padding: 30px 0;
}

/* Summary */
.sa-summary-row {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 11px 0;
    border-bottom: 1px solid #1b283a;
    font-size: 10px;
}

.sa-summary-row:last-child {
    border-bottom: 0;
}

.sa-summary-row span:first-child {
    color: #687890;
}

.sa-summary-row span:last-child {
    color: #dbe4f2;
    font-weight: 850;
}

.sa-rate {
    font-size: 34px;
    font-weight: 900;
    color: #a78bfa;
    text-align: center;
    padding: 8px 0 16px;
}

/* Mobile */
@media(max-width:767px) {
    .sa-hero {
        align-items: flex-start;
    }

    .sa-title {
        font-size: 22px;
    }

    .sa-hero .sa-btn {
        display: none;
    }

    .sa-table {
        min-width: 600px;
    }

    .sa-table-wrap {
        overflow-x: auto;
    }
}
</style>

<div class="student-attendance-page">

    {{-- HEADER --}}
    <div class="sa-hero">
        <div>
            <div class="sa-kicker">
                Personal academic cockpit
            </div>

            <h1 class="sa-title">
                My Attendance
            </h1>

            <p class="sa-sub">
                {{ $student->academyClass->name ?? 'Class not assigned' }}
                ·
                {{ $student->group->name ?? 'Group not assigned' }}
                ·
                {{ now()->format('l, d M Y') }}
            </p>
        </div>

        <a
            href="{{ route('student.timetable') }}"
            class="sa-btn primary"
        >
            <i class="bi bi-calendar-week"></i>
            Open timetable
        </a>
    </div>


    {{-- STAT CARDS --}}
    <div class="row g-3 mb-3">

        <div class="col-6 col-xl-3">
            <div class="sa-card">
                <div class="d-flex justify-content-between align-items-start">
                    <span class="sa-label">Attendance Rate</span>

                    <span class="sa-icon">
                        <i class="bi bi-activity"></i>
                    </span>
                </div>

                <div class="sa-number">
                    {{ $attendanceRate }}%
                </div>
            </div>
        </div>

        <div class="col-6 col-xl-3">
            <div class="sa-card">
                <div class="d-flex justify-content-between align-items-start">
                    <span class="sa-label">Present</span>

                    <span class="sa-icon">
                        <i class="bi bi-check-circle"></i>
                    </span>
                </div>

                <div class="sa-number">
                    {{ $attendancePresent }}
                </div>
            </div>
        </div>

        <div class="col-6 col-xl-3">
            <div class="sa-card">
                <div class="d-flex justify-content-between align-items-start">
                    <span class="sa-label">Absent</span>

                    <span class="sa-icon">
                        <i class="bi bi-x-circle"></i>
                    </span>
                </div>

                <div class="sa-number">
                    {{ $attendanceAbsent }}
                </div>
            </div>
        </div>

        <div class="col-6 col-xl-3">
            <div class="sa-card">
                <div class="d-flex justify-content-between align-items-start">
                    <span class="sa-label">Leave</span>

                    <span class="sa-icon">
                        <i class="bi bi-calendar-minus"></i>
                    </span>
                </div>

                <div class="sa-number">
                    {{ $attendanceLeave }}
                </div>
            </div>
        </div>

    </div>


    <div class="row g-3">

        {{-- ATTENDANCE SUMMARY --}}
        <div class="col-xl-4">

            <div class="sa-panel h-100">

                <div class="sa-head">
                    <div>
                        <h3>Attendance summary</h3>
                        <p>Your overall attendance performance</p>
                    </div>

                    <i class="bi bi-bar-chart-fill text-info"></i>
                </div>

                <div class="sa-body">

                    <div class="sa-rate">
                        {{ $attendanceRate }}%
                    </div>

                    <div class="sa-summary-row">
                        <span>Total records</span>
                        <span>{{ $attendanceTotal }}</span>
                    </div>

                    <div class="sa-summary-row">
                        <span>Present / Late</span>
                        <span>{{ $attendancePresent }}</span>
                    </div>

                    <div class="sa-summary-row">
                        <span>Absent</span>
                        <span>{{ $attendanceAbsent }}</span>
                    </div>

                    <div class="sa-summary-row">
                        <span>Leave</span>
                        <span>{{ $attendanceLeave }}</span>
                    </div>

                    <a
                        href="{{ route('student.timetable') }}"
                        class="sa-btn d-block text-center mt-3"
                    >
                        View timetable
                    </a>

                </div>
            </div>

        </div>


        {{-- RECORDS --}}
        <div class="col-xl-8">

            <div class="sa-panel">

                <div class="sa-head">
                    <div>
                        <h3>Attendance records</h3>
                        <p>Your complete attendance history</p>
                    </div>

                    <span class="sa-label">
                        {{ $attendanceTotal }} records
                    </span>
                </div>

                <div class="sa-body">

                    @if($attendances->count())

                        <div class="sa-table-wrap">

                            <table class="sa-table">

                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Status</th>
                                        <th>Day</th>
                                    </tr>
                                </thead>

                                <tbody>

                                    @foreach($attendances as $attendance)

                                        <tr>

                                            <td>
                                                {{ \Carbon\Carbon::parse($attendance->attendance_date)->format('d M Y') }}
                                            </td>

                                            <td>

                                                <span class="sa-status {{ strtolower($attendance->status) }}">

                                                    @if($attendance->status === 'present')
                                                        <i class="bi bi-check-circle"></i>
                                                    @elseif($attendance->status === 'absent')
                                                        <i class="bi bi-x-circle"></i>
                                                    @elseif($attendance->status === 'leave')
                                                        <i class="bi bi-calendar-minus"></i>
                                                    @elseif($attendance->status === 'late')
                                                        <i class="bi bi-clock"></i>
                                                    @endif

                                                    {{ $attendance->status }}

                                                </span>

                                            </td>

                                            <td class="sa-muted">
                                                {{ \Carbon\Carbon::parse($attendance->attendance_date)->format('l') }}
                                            </td>

                                        </tr>

                                    @endforeach

                                </tbody>

                            </table>

                        </div>

                    @else

                        <div class="sa-empty">
                            <i class="bi bi-clipboard-x d-block mb-2" style="font-size:24px;"></i>
                            No attendance records found yet.
                        </div>

                    @endif

                </div>
            </div>

        </div>

    </div>

</div>

@endsection
