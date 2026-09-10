@extends('layouts.app')

@section('title', 'My Timetable')

@section('content')

<style>
    /* =========================================================
       MY TIMETABLE — DARK THEME
       ========================================================= */

    .my-timetable-page {
        color: #dbe4f2;
        width: 100%;
    }

    /* Full dark background */
    body:has(.my-timetable-page) .main-wrapper,
    body:has(.my-timetable-page) .page-content {
        background: #080e17 !important;
    }

    body:has(.my-timetable-page) .page-content {
        padding: 22px 24px 0 24px !important;
        min-height: calc(100vh - 76px) !important;
    }

    /* =========================================================
       PAGE HEADER
       ========================================================= */

    .my-timetable-page .timetable-top {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 18px;
        margin-bottom: 18px;
        padding: 20px 22px;
        background: linear-gradient(145deg, #111b2a, #0d1521);
        border: 1px solid #223149;
        border-radius: 15px;
        box-shadow: 0 12px 30px rgba(0, 0, 0, .14);
        position: relative;
        overflow: hidden;
    }

    .my-timetable-page .timetable-top::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 1px;
        background: linear-gradient(
            90deg,
            transparent,
            rgba(139, 92, 246, .65),
            rgba(34, 211, 238, .45),
            transparent
        );
    }

    .my-timetable-page .timetable-top::after {
        content: "";
        position: absolute;
        width: 120px;
        height: 120px;
        border-radius: 50%;
        right: -65px;
        top: -65px;
        background: rgba(139, 92, 246, .06);
        pointer-events: none;
    }

    .my-timetable-page .title-area {
        position: relative;
        z-index: 1;
    }

    .my-timetable-page .page-kicker {
        font-size: 9px;
        text-transform: uppercase;
        letter-spacing: 1.5px;
        color: #a78bfa;
        font-weight: 900;
        margin-bottom: 4px;
    }

    .my-timetable-page .page-title {
        color: #f8fafc;
        font-size: 22px;
        line-height: 1.2;
        font-weight: 850;
        margin: 0 0 5px;
        letter-spacing: -.2px;
    }

    .my-timetable-page .teacher-name {
        color: #64758c;
        font-size: 10px;
        margin: 0;
    }

    .my-timetable-page .teacher-name strong {
        color: #aab7ca;
        font-weight: 750;
    }

    /* =========================================================
       BACK BUTTON
       ========================================================= */

    .my-timetable-page .back-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 7px;
        background: #0d1725;
        color: #aab7ca;
        border: 1px solid #26364d;
        border-radius: 9px;
        padding: 9px 13px;
        text-decoration: none;
        font-size: 10px;
        font-weight: 850;
        transition:
            transform .22s ease,
            background .22s ease,
            border-color .22s ease,
            color .22s ease,
            box-shadow .22s ease;
        position: relative;
        z-index: 2;
        white-space: nowrap;
    }

    .my-timetable-page .back-btn:hover {
        background: #151f31;
        color: #f8fafc;
        border-color: rgba(139, 92, 246, .55);
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, .25);
    }

    .my-timetable-page .back-btn i {
        color: #a78bfa;
        transition: transform .22s ease;
    }

    .my-timetable-page .back-btn:hover i {
        transform: translateX(-3px);
        filter: drop-shadow(0 0 5px rgba(167, 139, 250, .65));
    }

    /* =========================================================
       DAY CARD
       ========================================================= */

    .my-timetable-page .day-card {
        background: linear-gradient(145deg, #111b2a, #0d1521);
        border: 1px solid #223149;
        border-radius: 15px;
        box-shadow: 0 12px 30px rgba(0, 0, 0, .12);
        overflow: hidden;
        margin-bottom: 14px;
        transition:
            transform .25s ease,
            border-color .25s ease,
            box-shadow .25s ease;
    }

    .my-timetable-page .day-card:hover {
        border-color: rgba(139, 92, 246, .38);
        box-shadow:
            0 15px 32px rgba(0, 0, 0, .24),
            0 0 18px rgba(139, 92, 246, .06);
    }

    /* =========================================================
       DAY HEADER
       ========================================================= */

    .my-timetable-page .day-header {
        min-height: 47px;
        padding: 12px 16px;
        display: flex;
        align-items: center;
        gap: 10px;
        background: #101a29;
        border-bottom: 1px solid #1e2b3e;
        position: relative;
    }

    .my-timetable-page .day-header::after {
        content: "";
        position: absolute;
        bottom: -1px;
        left: 16px;
        width: 45px;
        height: 2px;
        background: linear-gradient(
            90deg,
            #8b5cf6,
            #22d3ee
        );
        border-radius: 5px;
    }

    .my-timetable-page .day-icon {
        width: 28px;
        height: 28px;
        border-radius: 8px;
        display: grid;
        place-items: center;
        background: #172237;
        color: #a78bfa;
        font-size: 11px;
        border: 1px solid rgba(139, 92, 246, .12);
        box-shadow: inset 0 0 10px rgba(139, 92, 246, .03);
    }

    .my-timetable-page .day-icon i {
        filter: drop-shadow(0 0 5px rgba(167, 139, 250, .55));
    }

    .my-timetable-page .day-name {
        color: #edf3fb;
        font-size: 12px;
        font-weight: 850;
        margin: 0;
    }

    /* =========================================================
       TABLE
       ========================================================= */

    .my-timetable-page .table-wrap {
        width: 100%;
        overflow-x: auto;
    }

    .my-timetable-page .timetable-table {
        width: 100%;
        margin: 0 !important;
        --bs-table-bg: transparent !important;
        --bs-table-color: #cbd5e1 !important;
        --bs-table-border-color: #1d2a3c !important;
        --bs-table-hover-bg: rgba(139, 92, 246, .035) !important;
        --bs-table-hover-color: #dbe4f2 !important;
    }

    .my-timetable-page .timetable-table > :not(caption) > * > * {
        background-color: transparent !important;
        color: #cbd5e1 !important;
        border-color: #1d2a3c !important;
        box-shadow: none !important;
    }

    /* Table Head */

    .my-timetable-page .timetable-table thead {
        background: #0d1725 !important;
    }

    .my-timetable-page .timetable-table thead th {
        background: #0d1725 !important;
        color: #607089 !important;
        font-size: 8px;
        font-weight: 900;
        text-transform: uppercase;
        letter-spacing: .65px;
        padding: 10px 12px;
        border-bottom: 1px solid #223149 !important;
        white-space: nowrap;
    }

    /* Table Body */

    .my-timetable-page .timetable-table tbody tr {
        transition: background .2s ease;
    }

    .my-timetable-page .timetable-table tbody tr:hover {
        background: rgba(139, 92, 246, .035) !important;
    }

    .my-timetable-page .timetable-table tbody td {
        background: transparent !important;
        color: #cbd5e1 !important;
        font-size: 9px;
        font-weight: 650;
        padding: 11px 12px;
        border-bottom: 1px solid #1a2637 !important;
        vertical-align: middle;
    }

    .my-timetable-page .timetable-table tbody tr:last-child td {
        border-bottom: none !important;
    }

    /* =========================================================
       TIME
       ========================================================= */

    .my-timetable-page .time-cell {
        color: #7dd3fc !important;
        font-size: 9px;
        font-weight: 800;
        white-space: nowrap;
        text-shadow: 0 0 8px rgba(34, 211, 238, .08);
    }

    /* =========================================================
       SUBJECT
       ========================================================= */

    .my-timetable-page .subject-cell {
        color: #e2e8f0 !important;
        font-weight: 800 !important;
    }

    .my-timetable-page .subject-name {
        display: inline-flex;
        align-items: center;
        gap: 6px;
    }

    .my-timetable-page .subject-dot {
        width: 6px;
        height: 6px;
        border-radius: 50%;
        background: #8b5cf6;
        box-shadow: 0 0 8px rgba(139, 92, 246, .65);
        flex-shrink: 0;
    }

    /* =========================================================
       CLASS / GROUP / ROOM
       ========================================================= */

    .my-timetable-page .info-badge {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        padding: 5px 8px;
        border-radius: 7px;
        font-size: 8px;
        font-weight: 800;
        white-space: nowrap;
    }

    .my-timetable-page .class-badge {
        background: rgba(34, 211, 238, .07);
        border: 1px solid rgba(34, 211, 238, .12);
        color: #7dd3fc;
    }

    .my-timetable-page .group-badge {
        background: rgba(139, 92, 246, .08);
        border: 1px solid rgba(139, 92, 246, .12);
        color: #c4b5fd;
    }

    .my-timetable-page .room-badge {
        background: rgba(34, 197, 94, .07);
        border: 1px solid rgba(34, 197, 94, .11);
        color: #86efac;
    }

    .my-timetable-page .info-badge i {
        font-size: 8px;
    }

    .my-timetable-page .dash-value {
        color: #56667c !important;
    }

    /* =========================================================
       EMPTY STATE
       ========================================================= */

    .my-timetable-page .empty-state {
        background: linear-gradient(145deg, #111b2a, #0d1521);
        border: 1px solid #223149;
        border-radius: 15px;
        padding: 55px 20px;
        text-align: center;
        box-shadow: 0 12px 30px rgba(0, 0, 0, .12);
        position: relative;
        overflow: hidden;
    }

    .my-timetable-page .empty-state::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 1px;
        background: linear-gradient(
            90deg,
            transparent,
            rgba(139, 92, 246, .55),
            rgba(34, 211, 238, .35),
            transparent
        );
    }

    .my-timetable-page .empty-icon {
        width: 58px;
        height: 58px;
        margin: 0 auto 15px;
        border-radius: 15px;
        display: grid;
        place-items: center;
        background: #172237;
        border: 1px solid rgba(139, 92, 246, .12);
        color: #718096;
        font-size: 23px;
        box-shadow: inset 0 0 15px rgba(139, 92, 246, .035);
    }

    .my-timetable-page .empty-icon i {
        filter: drop-shadow(0 0 6px rgba(139, 92, 246, .35));
    }

    .my-timetable-page .empty-title {
        color: #dbe4f2;
        font-size: 13px;
        font-weight: 850;
        margin-bottom: 5px;
    }

    .my-timetable-page .empty-text {
        color: #64758c;
        font-size: 9px;
        margin: 0;
    }

    /* =========================================================
       RESPONSIVE
       ========================================================= */

    @media (max-width: 767px) {

        body:has(.my-timetable-page) .page-content {
            padding: 20px 15px !important;
        }

        .my-timetable-page .timetable-top {
            padding: 17px;
            margin-bottom: 15px;
            align-items: flex-start;
        }

        .my-timetable-page .page-title {
            font-size: 19px;
        }

        .my-timetable-page .teacher-name {
            font-size: 9px;
        }

        .my-timetable-page .back-btn {
            padding: 8px 10px;
            font-size: 9px;
        }

        .my-timetable-page .day-header {
            padding: 11px 13px;
        }

        .my-timetable-page .timetable-table {
            min-width: 650px;
        }

        .my-timetable-page .timetable-table thead th {
            padding: 9px 10px;
        }

        .my-timetable-page .timetable-table tbody td {
            padding: 10px;
        }
    }

    @media (max-width: 480px) {

        .my-timetable-page .timetable-top {
            flex-direction: column;
            gap: 14px;
        }

        .my-timetable-page .back-btn {
            width: 100%;
        }

        .my-timetable-page .empty-state {
            padding: 45px 15px;
        }
    }
</style>


<div class="my-timetable-page">

    {{-- =====================================================
         PAGE HEADER
         ===================================================== --}}

    <div class="timetable-top">

        <div class="title-area">

            <div class="page-kicker">
                Teacher Portal
            </div>

            <h1 class="page-title">
                My Timetable
            </h1>

            <p class="teacher-name">
                {{ $teacher->first_name ?? auth()->user()->name }}
            </p>

        </div>


        <a href="{{ route('teacher.dashboard') }}" class="back-btn">

            <i class="bi bi-arrow-left"></i>

            Back to Dashboard

        </a>

    </div>


    {{-- =====================================================
         CHECK IF SCHEDULES EXIST
         ===================================================== --}}

    @php
        $hasSchedules = false;
    @endphp


    {{-- =====================================================
         DAYS
         ===================================================== --}}

    @foreach ($days as $day)

        @if (isset($schedules[$day]) && $schedules[$day]->count())

            @php
                $hasSchedules = true;
            @endphp


            {{-- =================================================
                 DAY CARD
                 ================================================= --}}

            <div class="day-card">


                {{-- DAY HEADER --}}

                <div class="day-header">

                    <div class="day-icon">
                        <i class="bi bi-calendar3"></i>
                    </div>

                    <h5 class="day-name">
                        {{ $day }}
                    </h5>

                </div>


                {{-- =================================================
                     TABLE
                     ================================================= --}}

                <div class="table-wrap">

                    <table class="table table-bordered table-hover align-middle timetable-table">

                        <thead>

                            <tr>

                                <th>Time</th>

                                <th>Subject</th>

                                <th>Class</th>

                                <th>Group</th>

                                <th>Room</th>

                            </tr>

                        </thead>


                        <tbody>

                            @foreach ($schedules[$day] as $schedule)

                                <tr>


                                    {{-- TIME --}}

                                    <td class="time-cell">

                                        {{ \Carbon\Carbon::parse($schedule->start_time)->format('h:i A') }}

                                        <span style="color:#56667c;">
                                            -
                                        </span>

                                        {{ \Carbon\Carbon::parse($schedule->end_time)->format('h:i A') }}

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


    {{-- =====================================================
         EMPTY STATE
         ===================================================== --}}

    @if (!$hasSchedules)

        <div class="empty-state">

            <div class="empty-icon">
                <i class="bi bi-calendar-x"></i>
            </div>

            <div class="empty-title">
                No Timetable Yet
            </div>

            <p class="empty-text">
                No timetable has been created for you yet.
            </p>

        </div>

    @endif

</div>

@endsection