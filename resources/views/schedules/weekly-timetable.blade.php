@extends('layouts.app')

@section('title', 'Weekly Timetable')

@section('content')

<style>
    .weekly-timetable-page {
        color: #dbe4f2;
        width: 100%;
    }

    body:has(.weekly-timetable-page) .main-wrapper,
    body:has(.weekly-timetable-page) .page-content {
        background: #080e17 !important;
    }

    body:has(.weekly-timetable-page) .page-content {
        padding: 22px 24px 30px 24px !important;
        min-height: calc(100vh - 76px) !important;
    }

    .timetable-top {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 20px;
        margin-bottom: 28px;
    }

    .page-kicker {
        color: #718096;
        font-size: 12px;
        font-weight: 700;
        letter-spacing: 1.5px;
        text-transform: uppercase;
        margin-bottom: 7px;
    }

    .page-title {
        margin: 0;
        color: #f1f5f9;
        font-size: 28px;
        font-weight: 800;
    }

    .page-subtitle {
        margin: 7px 0 0;
        color: #718096;
        font-size: 14px;
    }

    .back-btn {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 10px 16px;
        border: 1px solid #263449;
        border-radius: 9px;
        background: #111a28;
        color: #cbd5e1;
        text-decoration: none;
        font-size: 13px;
        font-weight: 600;
        transition: background 0.2s, border-color 0.2s, transform 0.2s;
    }

    .back-btn:hover {
        background: #182335;
        border-color: #34445c;
        color: #ffffff;
        transform: translateY(-1px);
    }

    .day-card {
        background: #0d1522;
        border: 1px solid #1d2a3d;
        border-radius: 14px;
        overflow: hidden;
        margin-bottom: 22px;
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.18);
    }

    .day-header {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 16px 20px;
        background: #111b2b;
        border-bottom: 1px solid #1d2a3d;
    }

    .day-icon {
        width: 38px;
        height: 38px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 9px;
        background: #18263a;
        color: #8ab4f8;
        font-size: 17px;
    }

    .day-name {
        margin: 0;
        color: #f1f5f9;
        font-size: 16px;
        font-weight: 700;
    }

    .day-count {
        margin-left: auto;
        color: #718096;
        font-size: 12px;
    }

    .table-wrap {
        width: 100%;
        overflow-x: auto;
    }

    .timetable-table {
        width: 100%;
        min-width: 850px;
        margin: 0 !important;
        color: #cbd5e1;
        border-color: #1d2a3d !important;
    }

    .timetable-table thead th {
        padding: 13px 15px;
        background: #0a111d !important;
        color: #718096 !important;
        border-color: #1d2a3d !important;
        font-size: 11px;
        font-weight: 800;
        letter-spacing: 0.8px;
        text-transform: uppercase;
        white-space: nowrap;
    }

    .timetable-table tbody td {
        padding: 15px;
        background: #0d1522 !important;
        color: #cbd5e1 !important;
        border-color: #1d2a3d !important;
        vertical-align: middle;
    }

    .timetable-table tbody tr {
        transition: background 0.2s;
    }

    .timetable-table tbody tr:hover td {
        background: #111c2b !important;
    }

    .time-cell {
        min-width: 170px;
        color: #9fb8d8 !important;
        font-size: 13px;
        font-weight: 700;
        white-space: nowrap;
    }

    .teacher-cell {
        min-width: 180px;
    }

    .teacher-name {
        color: #e2e8f0;
        font-size: 13px;
        font-weight: 700;
    }

    .teacher-label {
        display: block;
        margin-top: 3px;
        color: #5f7188;
        font-size: 10px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .subject-cell {
        min-width: 170px;
    }

    .subject-name {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        color: #e2e8f0;
        font-size: 13px;
        font-weight: 700;
    }

    .subject-dot {
        width: 7px;
        height: 7px;
        border-radius: 50%;
        background: #6ea8fe;
        display: inline-block;
    }

    .info-badge {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 6px 9px;
        border-radius: 7px;
        font-size: 11px;
        font-weight: 700;
        white-space: nowrap;
    }

    .class-badge {
        background: #17263a;
        color: #9fc3ef;
        border: 1px solid #263d59;
    }

    .group-badge {
        background: #211d36;
        color: #b8a9e8;
        border: 1px solid #393255;
    }

    .room-badge {
        background: #1c2928;
        color: #8fc5b5;
        border: 1px solid #2d4743;
    }

    .dash-value {
        color: #4e5d70;
    }

    .empty-state {
        padding: 60px 20px;
        text-align: center;
        background: #0d1522;
        border: 1px solid #1d2a3d;
        border-radius: 14px;
    }

    .empty-icon {
        width: 70px;
        height: 70px;
        margin: 0 auto 18px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        background: #111d2d;
        color: #5f7897;
        font-size: 28px;
    }

    .empty-title {
        color: #dbe4f2;
        font-size: 18px;
        font-weight: 700;
        margin-bottom: 7px;
    }

    .empty-text {
        margin: 0;
        color: #66758a;
        font-size: 13px;
    }

    @media (max-width: 768px) {
        body:has(.weekly-timetable-page) .page-content {
            padding: 18px 14px 25px 14px !important;
        }

        .timetable-top {
            align-items: flex-start;
            flex-direction: column;
        }

        .page-title {
            font-size: 23px;
        }

        .back-btn {
            width: 100%;
            justify-content: center;
        }

        .day-header {
            padding: 14px;
        }

        .timetable-table tbody td {
            padding: 12px;
        }
    }
</style>


<div class="weekly-timetable-page">

    {{-- PAGE HEADER --}}
    <div class="timetable-top">

        <div>
            <div class="page-kicker">Admin Panel</div>

            <h1 class="page-title">
                Academy Weekly Timetable
            </h1>

            <p class="page-subtitle">
                Complete weekly schedule of teachers, subjects and classes
            </p>
        </div>

        <a href="{{ route('dashboard') }}" class="back-btn">
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


            <div class="day-card">

                {{-- DAY HEADER --}}
                <div class="day-header">

                    <div class="day-icon">
                        <i class="bi bi-calendar3"></i>
                    </div>

                    <h5 class="day-name">
                        {{ $day }}
                    </h5>

                    <span class="day-count">
                        {{ $schedules[$day]->count() }}
                        {{ $schedules[$day]->count() == 1 ? 'Class' : 'Classes' }}
                    </span>

                </div>


                {{-- TABLE --}}
                <div class="table-wrap">

                    <table class="table table-bordered table-hover align-middle timetable-table">

                        <thead>
                            <tr>
                                <th>Time</th>
                                <th>Teacher</th>
                                <th>Subject</th>
                                <th>Class</th>
                                <th>Group</th>
                                <th>Room</th>
                            </tr>
                        </thead>


                        <tbody>

                            @foreach ($schedules[$day] as $schedule)

                                @php
                                    $teacher = $schedule->teacherAssignment?->teacher;

                                    $teacherName = trim(
                                        ($teacher?->first_name ?? '') . ' ' .
                                        ($teacher?->last_name ?? '')
                                    );

                                    if (!$teacherName) {
                                        $teacherName = $teacher?->name ?? '-';
                                    }
                                @endphp


                                <tr>

                                    {{-- TIME --}}
                                    <td class="time-cell">

                                        {{ \Carbon\Carbon::parse($schedule->start_time)->format('h:i A') }}

                                        <span style="color:#56667c;">
                                            -
                                        </span>

                                        {{ \Carbon\Carbon::parse($schedule->end_time)->format('h:i A') }}

                                    </td>


                                    {{-- TEACHER --}}
                                    <td class="teacher-cell">

                                        @if ($teacherName !== '-')

                                            <span class="teacher-name">
                                                {{ $teacherName }}
                                            </span>

                                            <span class="teacher-label">
                                                Teacher
                                            </span>

                                        @else

                                            <span class="dash-value">
                                                -
                                            </span>

                                        @endif

                                    </td>


                                    {{-- SUBJECT --}}
                                    <td class="subject-cell">

                                        @if ($schedule->teacherAssignment?->subject?->name)

                                            <span class="subject-name">

                                                <span class="subject-dot"></span>

                                                {{ $schedule->teacherAssignment->subject->name }}

                                            </span>

                                        @else

                                            <span class="dash-value">
                                                -
                                            </span>

                                        @endif

                                    </td>


                                    {{-- CLASS --}}
                                    <td>

                                        @if ($schedule->teacherAssignment?->academyClass?->name)

                                            <span class="info-badge class-badge">

                                                <i class="bi bi-building"></i>

                                                {{ $schedule->teacherAssignment->academyClass->name }}

                                            </span>

                                        @else

                                            <span class="dash-value">
                                                -
                                            </span>

                                        @endif

                                    </td>


                                    {{-- GROUP --}}
                                    <td>

                                        @if ($schedule->teacherAssignment?->group?->name)

                                            <span class="info-badge group-badge">

                                                <i class="bi bi-diagram-3"></i>

                                                {{ $schedule->teacherAssignment->group->name }}

                                            </span>

                                        @else

                                            <span class="dash-value">
                                                -
                                            </span>

                                        @endif

                                    </td>


                                    {{-- ROOM --}}
                                    <td>

                                        @if ($schedule->room)

                                            <span class="info-badge room-badge">

                                                <i class="bi bi-door-open"></i>

                                                {{ $schedule->room }}

                                            </span>

                                        @else

                                            <span class="dash-value">
                                                -
                                            </span>

                                        @endif

                                    </td>

                                </tr>

                            @endforeach

                        </tbody>

                    </table>

                </div>

            </div>

        @endif

    @endforeach


    {{-- EMPTY STATE --}}
    @if (!$hasSchedules)

        <div class="empty-state">

            <div class="empty-icon">
                <i class="bi bi-calendar-x"></i>
            </div>

            <div class="empty-title">
                No Timetable Yet
            </div>

            <p class="empty-text">
                No active timetable has been created yet.
            </p>

        </div>

    @endif

</div>

@endsection