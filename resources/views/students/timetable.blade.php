@extends('layouts.app')

@section('title', 'My Timetable')

@section('content')

<style>

    /* =========================================================
   FORCE FULL PAGE DARK BACKGROUND
========================================================= */

.student-timetable-page {
    position: relative !important;

    width: calc(100% + 48px) !important;

    min-height: calc(100vh - 76px) !important;

    margin: -22px -24px 0 -24px !important;

    padding: 22px 24px 40px 24px !important;

    background: #080e17 !important;

    color: #dbe4f2 !important;

    overflow: hidden;
}
/* ================================
   STUDENT TIMETABLE
================================ */

.student-timetable-page {
    color: #dbe4f2;
    padding-bottom: 30px;
}

/* Header */
.student-timetable-page .timetable-heading {
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 20px;
    margin-bottom: 24px;
}

.student-timetable-page .heading-left {
    display: flex;
    align-items: center;
    gap: 14px;
}

.student-timetable-page .heading-icon {
    width: 48px;
    height: 48px;
    border-radius: 14px;
    display: grid;
    place-items: center;

    background: linear-gradient(
        135deg,
        rgba(139,92,246,.18),
        rgba(34,211,238,.08)
    );

    border: 1px solid rgba(139,92,246,.30);
    color: #a78bfa;

    box-shadow:
        0 0 22px rgba(139,92,246,.08),
        inset 0 0 15px rgba(139,92,246,.03);

    transition:
        transform .25s ease,
        border-color .25s ease,
        box-shadow .25s ease;
}

.student-timetable-page .heading-icon i {
    font-size: 21px;
}

.student-timetable-page .heading-left:hover .heading-icon {
    transform: translateY(-2px);
    border-color: rgba(139,92,246,.55);

    box-shadow:
        0 0 25px rgba(139,92,246,.15),
        inset 0 0 15px rgba(139,92,246,.05);
}

.student-timetable-page h1 {
    color: #f8fafc;
    font-size: 25px;
    font-weight: 850;
    margin: 0 0 5px;
    letter-spacing: -.4px;
}

.student-timetable-page .student-info {
    color: #718096;
    font-size: 12px;
    margin: 0;
}

.student-timetable-page .student-info strong {
    color: #aebbd0;
    font-weight: 700;
}

/* Back button */
.student-timetable-page .back-btn {
    display: inline-flex;
    align-items: center;
    gap: 8px;

    padding: 10px 16px;
    border-radius: 10px;

    background: #111c2c;
    border: 1px solid #223149;

    color: #cbd5e1;
    text-decoration: none;

    font-size: 12px;
    font-weight: 750;

    transition:
        background .25s ease,
        border-color .25s ease,
        color .25s ease,
        transform .25s ease,
        box-shadow .25s ease;
}

.student-timetable-page .back-btn:hover {
    background: rgba(139,92,246,.10);
    border-color: rgba(139,92,246,.40);
    color: #c4b5fd;

    transform: translateY(-2px);

    box-shadow: 0 8px 20px rgba(0,0,0,.20);
}

/* Day Card */
.student-timetable-page .day-card {
    background: #0f1826;
    border: 1px solid #1b293c;
    border-radius: 15px;
    overflow: hidden;

    box-shadow:
        0 10px 30px rgba(0,0,0,.14),
        inset 0 1px 0 rgba(255,255,255,.015);

    transition:
        transform .25s ease,
        border-color .25s ease,
        box-shadow .25s ease;
}

.student-timetable-page .day-card:hover {
    transform: translateY(-2px);
    border-color: rgba(139,92,246,.28);

    box-shadow:
        0 14px 35px rgba(0,0,0,.22),
        0 0 20px rgba(139,92,246,.04);
}

/* Day Header */
.student-timetable-page .day-header {
    min-height: 52px;
    padding: 0 18px;

    display: flex;
    align-items: center;
    justify-content: space-between;

    background:
        linear-gradient(
            135deg,
            rgba(139,92,246,.13),
            rgba(34,211,238,.035)
        );

    border-bottom: 1px solid #1d2b3e;
}

.student-timetable-page .day-header-left {
    display: flex;
    align-items: center;
    gap: 10px;
}

.student-timetable-page .day-icon {
    width: 30px;
    height: 30px;
    border-radius: 9px;

    display: grid;
    place-items: center;

    background: rgba(139,92,246,.12);
    border: 1px solid rgba(139,92,246,.22);

    color: #a78bfa;
}

.student-timetable-page .day-icon i {
    font-size: 13px;
}

.student-timetable-page .day-title {
    color: #f1f5f9;
    font-size: 14px;
    font-weight: 850;
    margin: 0;
}

.student-timetable-page .day-badge {
    padding: 5px 9px;
    border-radius: 7px;

    background: rgba(34,211,238,.07);
    border: 1px solid rgba(34,211,238,.14);

    color: #67e8f9;
    font-size: 9px;
    font-weight: 800;
    text-transform: uppercase;
    letter-spacing: .4px;
}

/* Table */
.student-timetable-page .table-wrapper {
    overflow-x: auto;
}

.student-timetable-page .timetable-table {
    width: 100%;
    margin: 0;

    --bs-table-bg: transparent !important;
    --bs-table-color: #cbd5e1 !important;
    --bs-table-border-color: #1a2637 !important;
    --bs-table-hover-bg: rgba(139,92,246,.035) !important;
    --bs-table-hover-color: #e2e8f0 !important;

    background: transparent !important;
}

.student-timetable-page .timetable-table thead {
    background: #0c1521;
}

.student-timetable-page .timetable-table thead th {
    padding: 13px 17px;

    color: #718096 !important;

    font-size: 9px;
    font-weight: 850;
    text-transform: uppercase;
    letter-spacing: .7px;

    border-bottom: 1px solid #1c2a3d !important;
    border-top: 0 !important;

    white-space: nowrap;

    background: #0c1521 !important;
}

.student-timetable-page .timetable-table tbody tr {
    background: transparent !important;

    transition:
        background .2s ease,
        transform .2s ease;
}

.student-timetable-page .timetable-table tbody tr:hover {
    background: rgba(139,92,246,.035) !important;
}

.student-timetable-page .timetable-table tbody td {
    padding: 15px 17px;

    color: #cbd5e1 !important;

    font-size: 12px;
    font-weight: 600;

    border-bottom: 1px solid #192638 !important;
    border-top: 0 !important;

    background: transparent !important;
}

.student-timetable-page .timetable-table tbody tr:last-child td {
    border-bottom: 0 !important;
}

/* Time */
.student-timetable-page .time-cell {
    color: #a78bfa !important;
    font-weight: 800 !important;
    white-space: nowrap;
}

.student-timetable-page .time-icon {
    color: #64748b;
    margin-right: 6px;
}

/* Subject */
.student-timetable-page .subject-cell {
    color: #f1f5f9 !important;
    font-weight: 750 !important;
}

.student-timetable-page .subject-icon {
    color: #22d3ee;
    margin-right: 7px;
}

/* Teacher */
.student-timetable-page .teacher-cell {
    color: #aebbd0 !important;
}

.student-timetable-page .teacher-icon {
    color: #718096;
    margin-right: 7px;
}

/* Room */
.student-timetable-page .room-cell {
    color: #94a3b8 !important;
}

.student-timetable-page .room-badge {
    display: inline-flex;
    align-items: center;
    gap: 6px;

    padding: 5px 9px;
    border-radius: 7px;

    background: #111c2c;
    border: 1px solid #223149;

    color: #94a3b8;
    font-size: 10px;
    font-weight: 750;
}

/* Empty State */
.student-timetable-page .empty-state {
    background: #0f1826;
    border: 1px solid #1b293c;
    border-radius: 15px;

    padding: 42px 25px;
    text-align: center;

    box-shadow: 0 10px 30px rgba(0,0,0,.12);
}

.student-timetable-page .empty-icon {
    width: 58px;
    height: 58px;

    margin: 0 auto 15px;

    display: grid;
    place-items: center;

    border-radius: 16px;

    background: rgba(34,211,238,.07);
    border: 1px solid rgba(34,211,238,.15);

    color: #22d3ee;
    font-size: 23px;
}

.student-timetable-page .empty-state h4 {
    color: #e2e8f0;
    font-size: 15px;
    font-weight: 800;
    margin-bottom: 7px;
}

.student-timetable-page .empty-state p {
    color: #64748b;
    font-size: 11px;
    margin: 0;
}

/* Responsive */
@media (max-width: 767px) {

    .student-timetable-page .timetable-heading {
        align-items: flex-start;
        flex-direction: column;
    }

    .student-timetable-page .back-btn {
        width: 100%;
        justify-content: center;
    }

    .student-timetable-page h1 {
        font-size: 21px;
    }

    .student-timetable-page .heading-icon {
        width: 42px;
        height: 42px;
    }

    .student-timetable-page .day-header {
        padding: 0 13px;
    }

    .student-timetable-page .timetable-table thead th,
    .student-timetable-page .timetable-table tbody td {
        padding: 12px;
    }
}
</style>


<div class="student-timetable-page">

    {{-- PAGE HEADER --}}
    <div class="timetable-heading">

        <div class="heading-left">

            <div class="heading-icon">
                <i class="bi bi-calendar3"></i>
            </div>

            <div>
                <h1>My Timetable</h1>

                <p class="student-info">
                    <strong>
                        {{ $student->first_name }}
                        {{ $student->last_name }}
                    </strong>

                    <span> — </span>

                    {{ $student->academyClass->name ?? '-' }}

                    <span> / </span>

                    {{ $student->group->name ?? '-' }}
                </p>
            </div>

        </div>


        <a
            href="{{ route('student.dashboard') }}"
            class="back-btn"
        >
            <i class="bi bi-arrow-left"></i>
            Back to Dashboard
        </a>

    </div>


    @php
        $hasSchedules = false;
    @endphp


    {{-- DAYS --}}
    @foreach ($days as $day)

        @if (isset($schedules[$day]) && $schedules[$day]->count())

            @php
                $hasSchedules = true;
            @endphp


            <div class="day-card mb-4">

                {{-- DAY HEADER --}}
                <div class="day-header">

                    <div class="day-header-left">

                        <div class="day-icon">
                            <i class="bi bi-calendar-day"></i>
                        </div>

                        <h5 class="day-title">
                            {{ $day }}
                        </h5>

                    </div>

                    <div class="day-badge">
                        {{ $schedules[$day]->count() }}
                        {{ $schedules[$day]->count() == 1 ? 'Class' : 'Classes' }}
                    </div>

                </div>


                {{-- TABLE --}}
                <div class="table-wrapper">

                    <table class="table table-hover align-middle timetable-table">

                        <thead>
                            <tr>
                                <th>Time</th>
                                <th>Subject</th>
                                <th>Teacher</th>
                                <th>Room</th>
                            </tr>
                        </thead>


                        <tbody>

                            @foreach ($schedules[$day] as $schedule)

                                <tr>

                                    {{-- TIME --}}
                                    <td class="time-cell">

                                        <i class="bi bi-clock time-icon"></i>

                                        {{ \Carbon\Carbon::parse($schedule->start_time)->format('h:i A') }}

                                        <span style="color:#475569;">
                                            -
                                        </span>

                                        {{ \Carbon\Carbon::parse($schedule->end_time)->format('h:i A') }}

                                    </td>


                                    {{-- SUBJECT --}}
                                    <td class="subject-cell">

                                        <i class="bi bi-book subject-icon"></i>

                                        {{ $schedule->teacherAssignment->subject->name ?? '-' }}

                                    </td>


                                    {{-- TEACHER --}}
                                    <td class="teacher-cell">

                                        <i class="bi bi-person teacher-icon"></i>

                                        {{ $schedule->teacherAssignment->teacher->first_name ?? '-' }}

                                        {{ $schedule->teacherAssignment->teacher->last_name ?? '' }}

                                    </td>


                                    {{-- ROOM --}}
                                    <td class="room-cell">

                                        <span class="room-badge">

                                            <i class="bi bi-door-open"></i>

                                            {{ $schedule->room ?? '-' }}

                                        </span>

                                    </td>

                                </tr>

                            @endforeach

                        </tbody>

                    </table>

                </div>

            </div>

        @endif

    @endforeach


    {{-- EMPTY --}}
    @if (!$hasSchedules)

        <div class="empty-state">

            <div class="empty-icon">
                <i class="bi bi-calendar-x"></i>
            </div>

            <h4>No Timetable Available</h4>

            <p>
                No timetable has been created for your class and group yet.
            </p>

        </div>

    @endif

</div>

@endsection