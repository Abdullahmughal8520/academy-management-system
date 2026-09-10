@extends('layouts.app')

@section('title', 'Weekly Timetable')

@section('content')

<style>
    /* =========================================================
       WEEKLY TIMETABLE — DARK ADMIN THEME
       ========================================================= */

    body:has(.weekly-timetable-page) .main-wrapper,
    body:has(.weekly-timetable-page) .page-content {
        background: #080e17 !important;
    }

    body:has(.weekly-timetable-page) .page-content {
        padding: 22px 24px 0 24px !important;
        min-height: calc(100vh - 76px) !important;
    }

    .weekly-timetable-page {
        width: 100%;
        color: #edf3fb;
    }


    /* =========================================================
       PAGE HEADER
       ========================================================= */

    .timetable-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 18px;
        margin-bottom: 20px;
    }

    .timetable-kicker {
        font-size: 10px;
        letter-spacing: 1.6px;
        text-transform: uppercase;
        color: #a78bfa;
        font-weight: 900;
        margin-bottom: 3px;
    }

    .timetable-title {
        font-size: 27px;
        line-height: 1.15;
        font-weight: 850;
        color: #f8fafc;
        margin: 0 0 5px;
        letter-spacing: -.3px;
    }

    .timetable-subtitle {
        color: #718096;
        font-size: 11px;
        margin: 0;
    }


    /* =========================================================
       MANAGE SCHEDULES BUTTON
       ========================================================= */

    .manage-schedules-btn {
        position: relative;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 6px;
        overflow: hidden;

        padding: 10px 15px;

        border-radius: 10px;

        background: linear-gradient(
            135deg,
            #6848e8,
            #8b5cf6
        ) !important;

        border: 1px solid rgba(167,139,250,.45) !important;

        color: #fff !important;

        font-size: 10px;
        font-weight: 850;

        text-decoration: none;

        box-shadow:
            0 8px 24px rgba(124,58,237,.20);

        transition:
            transform .25s ease,
            box-shadow .25s ease,
            border-color .25s ease;
    }

    .manage-schedules-btn::before {
        content: "";

        position: absolute;
        top: 0;
        left: -120%;

        width: 75%;
        height: 100%;

        background: linear-gradient(
            90deg,
            transparent,
            rgba(255,255,255,.20),
            transparent
        );

        transform: skewX(-20deg);

        transition: left .55s ease;
    }

    .manage-schedules-btn:hover {
        color: #fff !important;

        transform: translateY(-3px);

        border-color: rgba(196,181,253,.75) !important;

        box-shadow:
            0 12px 30px rgba(124,58,237,.32),
            0 0 20px rgba(139,92,246,.12);
    }

    .manage-schedules-btn:hover::before {
        left: 140%;
    }

    .manage-schedules-btn i {
        transition: transform .25s ease;
    }

    .manage-schedules-btn:hover i {
        transform: scale(1.08);

        filter:
            drop-shadow(
                0 0 5px rgba(255,255,255,.50)
            );
    }


    /* =========================================================
       TIMETABLE CARD
       ========================================================= */

    .timetable-card {
        background: linear-gradient(
            145deg,
            #111b2a,
            #0d1521
        ) !important;

        border: 1px solid #223149 !important;

        border-radius: 15px;

        box-shadow:
            0 12px 30px rgba(0,0,0,.14);

        overflow: hidden;
    }

    .timetable-card-body {
        padding: 15px;
    }


    /* =========================================================
       TABLE WRAPPER
       ========================================================= */

    .timetable-table-wrapper {
        width: 100%;
        overflow-x: auto;
        border-radius: 11px;

        scrollbar-width: thin;
        scrollbar-color: #344760 #0d1725;
    }

    .timetable-table-wrapper::-webkit-scrollbar {
        height: 7px;
    }

    .timetable-table-wrapper::-webkit-scrollbar-track {
        background: #0d1725;
        border-radius: 10px;
    }

    .timetable-table-wrapper::-webkit-scrollbar-thumb {
        background: #344760;
        border-radius: 10px;
    }

    .timetable-table-wrapper::-webkit-scrollbar-thumb:hover {
        background: #4b5f7a;
    }


    /* =========================================================
       TIMETABLE TABLE
       ========================================================= */

    .weekly-timetable-table {
        width: 100%;
        min-width: 1260px;

        margin: 0 !important;

        border-collapse: separate !important;
        border-spacing: 0;

        background: #0b1420 !important;

        color: #cbd5e1 !important;

        --bs-table-bg: transparent !important;
        --bs-table-color: #cbd5e1 !important;
        --bs-table-border-color: #1e2b3e !important;
    }


    /* =========================================================
       TABLE HEADER
       ========================================================= */

    .weekly-timetable-table thead th {
        min-width: 180px;

        padding: 13px 10px;

        background: #111c2c !important;

        color: #a78bfa !important;

        border-top: 1px solid #26364d !important;
        border-bottom: 1px solid #26364d !important;
        border-right: 1px solid #1e2b3e !important;

        font-size: 9px;

        text-transform: uppercase;

        letter-spacing: .9px;

        font-weight: 900;

        white-space: nowrap;
    }

    .weekly-timetable-table thead th:first-child {
        border-left: 1px solid #26364d !important;

        border-top-left-radius: 10px;
    }

    .weekly-timetable-table thead th:last-child {
        border-top-right-radius: 10px;
    }


    /* =========================================================
       TABLE BODY / DAY COLUMNS
       ========================================================= */

    .weekly-timetable-table tbody td {
        vertical-align: top !important;

        min-width: 180px;

        height: 230px;

        padding: 12px !important;

        background: #0d1725 !important;

        color: #cbd5e1 !important;

        border-right: 1px solid #1e2b3e !important;
        border-bottom: 1px solid #1e2b3e !important;

        box-shadow: none !important;
    }

    .weekly-timetable-table tbody td:first-child {
        border-left: 1px solid #1e2b3e !important;
    }

    .weekly-timetable-table tbody td:last-child {
        border-bottom-right-radius: 10px;
    }

    .weekly-timetable-table tbody td:hover {
        background: #0f1a2a !important;
    }


    /* Bootstrap table overrides */

    .weekly-timetable-table > :not(caption) > * > * {
        background-color: transparent !important;
        color: #cbd5e1 !important;
        border-bottom-color: #1e2b3e !important;
        box-shadow: none !important;
    }

    .weekly-timetable-table > thead > tr > th {
        background-color: #111c2c !important;
        color: #a78bfa !important;
    }

    .weekly-timetable-table > tbody > tr > td {
        background-color: #0d1725 !important;
        color: #cbd5e1 !important;
    }


    /* =========================================================
       CLASS SCHEDULE CARD
       ========================================================= */

    .class-schedule-card {
        position: relative;

        background: linear-gradient(
            145deg,
            #111c2c,
            #0e1725
        ) !important;

        border: 1px solid #26364d !important;

        border-radius: 11px;

        margin-bottom: 10px !important;

        box-shadow:
            0 7px 18px rgba(0,0,0,.14);

        overflow: hidden;

        transition:
            transform .22s ease,
            border-color .22s ease,
            box-shadow .22s ease,
            background .22s ease;
    }

    .class-schedule-card:last-child {
        margin-bottom: 0 !important;
    }

    .class-schedule-card::before {
        content: "";

        position: absolute;

        top: 0;
        left: 0;

        width: 3px;
        height: 100%;

        background: linear-gradient(
            180deg,
            #8b5cf6,
            #22d3ee
        );

        opacity: .75;
    }

    .class-schedule-card:hover {
        transform: translateY(-3px);

        border-color: rgba(139,92,246,.48) !important;

        background: linear-gradient(
            145deg,
            #141f32,
            #0e1725
        ) !important;

        box-shadow:
            0 12px 25px rgba(0,0,0,.25),
            0 0 18px rgba(139,92,246,.08);
    }

    .class-schedule-card .card-body {
        padding: 12px !important;
    }


    /* =========================================================
       SUBJECT
       ========================================================= */

    .schedule-subject {
        color: #f1f5f9 !important;

        font-size: 11px;

        line-height: 1.3;

        font-weight: 850;

        margin: 0 0 5px;

        padding-left: 2px;
    }


    /* =========================================================
       TIME
       ========================================================= */

    .schedule-time {
        display: flex;

        align-items: center;

        gap: 5px;

        color: #7dd3fc !important;

        font-size: 8.5px;

        font-weight: 800;

        white-space: nowrap;
    }

    .schedule-time i {
        color: #22d3ee;

        font-size: 9px;

        filter:
            drop-shadow(
                0 0 4px rgba(34,211,238,.45)
            );
    }


    /* =========================================================
       DIVIDER
       ========================================================= */

    .schedule-divider {
        border: 0;

        border-top: 1px solid #1e2b3e !important;

        opacity: 1;

        margin: 9px 0 !important;
    }


    /* =========================================================
       DETAILS
       ========================================================= */

    .schedule-detail {
        display: flex;

        align-items: flex-start;

        gap: 6px;

        margin-bottom: 5px;

        color: #8b9ab0 !important;

        font-size: 8.5px;

        line-height: 1.35;
    }

    .schedule-detail:last-child {
        margin-bottom: 0;
    }

    .schedule-detail strong {
        color: #cbd5e1 !important;

        font-weight: 800;
    }

    .schedule-detail-label {
        min-width: 42px;

        color: #64758c !important;

        font-weight: 700;
    }


    /* =========================================================
       NO CLASSES
       ========================================================= */

    .no-classes {
        display: flex;

        flex-direction: column;

        align-items: center;

        justify-content: center;

        min-height: 190px;

        color: #52637a !important;

        font-size: 9px;

        text-align: center;
    }

    .no-classes i {
        width: 32px;
        height: 32px;

        display: grid;
        place-items: center;

        margin-bottom: 8px;

        border-radius: 9px;

        background: #111d2d;

        border: 1px solid #223149;

        color: #53647c;

        font-size: 13px;
    }


    /* =========================================================
       MOBILE
       ========================================================= */

    @media (max-width: 767px) {

        body:has(.weekly-timetable-page) .page-content {
            padding: 20px 15px !important;
        }

        .timetable-header {
            align-items: flex-start;

            gap: 12px;
        }

        .timetable-title {
            font-size: 22px;
        }

        .timetable-subtitle {
            font-size: 10px;
        }

        .manage-schedules-btn {
            padding: 8px 10px;

            font-size: 9px;

            white-space: nowrap;
        }

        .timetable-card-body {
            padding: 10px;
        }

        .weekly-timetable-table {
            min-width: 1200px;
        }
    }
</style>


<div class="weekly-timetable-page">


    {{-- PAGE HEADER --}}

    <div class="timetable-header">

        <div>

            <div class="timetable-kicker">
                Academy Schedule
            </div>

            <h1 class="timetable-title">
                Weekly Timetable
            </h1>

            <p class="timetable-subtitle">
                View the academy's weekly class schedule.
            </p>

        </div>


        <a
            href="{{ route('schedules.index') }}"
            class="manage-schedules-btn"
        >
            <i class="bi bi-calendar2-week"></i>
            Manage Schedules
        </a>

    </div>


    {{-- TIMETABLE CARD --}}

    <div class="timetable-card">

        <div class="timetable-card-body">

            <div class="timetable-table-wrapper">

                <table class="weekly-timetable-table">

                    <thead>

                        <tr>

                            @foreach ($days as $day)

                                <th>
                                    {{ $day }}
                                </th>

                            @endforeach

                        </tr>

                    </thead>


                    <tbody>

                        <tr>

                            @foreach ($days as $day)

                                <td>


                                    @forelse ($schedules->get($day, collect()) as $schedule)

                                        @php
                                            $assignment = $schedule->teacherAssignment;
                                        @endphp


                                        <div class="class-schedule-card">

                                            <div class="card-body">


                                                {{-- SUBJECT --}}

                                                <h6 class="schedule-subject">

                                                    {{ $assignment?->subject?->name ?? '-' }}

                                                </h6>


                                                {{-- TIME --}}

                                                <div class="schedule-time">

                                                    <i class="bi bi-clock"></i>

                                                    {{ \Carbon\Carbon::parse($schedule->start_time)->format('h:i A') }}

                                                    <span>-</span>

                                                    {{ \Carbon\Carbon::parse($schedule->end_time)->format('h:i A') }}

                                                </div>


                                                <hr class="schedule-divider">


                                                {{-- TEACHER --}}

                                                <div class="schedule-detail">

                                                    <span class="schedule-detail-label">
                                                        Teacher:
                                                    </span>

                                                    <strong>

                                                        {{ $assignment?->teacher?->first_name ?? '-' }}

                                                        {{ $assignment?->teacher?->last_name ?? '' }}

                                                    </strong>

                                                </div>


                                                {{-- CLASS --}}

                                                <div class="schedule-detail">

                                                    <span class="schedule-detail-label">
                                                        Class:
                                                    </span>

                                                    <strong>
                                                        {{ $assignment?->academyClass?->name ?? '-' }}
                                                    </strong>

                                                </div>


                                                {{-- GROUP --}}

                                                <div class="schedule-detail">

                                                    <span class="schedule-detail-label">
                                                        Group:
                                                    </span>

                                                    <strong>
                                                        {{ $assignment?->group?->name ?? '-' }}
                                                    </strong>

                                                </div>


                                                {{-- ROOM --}}

                                                <div class="schedule-detail">

                                                    <span class="schedule-detail-label">
                                                        Room:
                                                    </span>

                                                    <strong>
                                                        {{ $schedule->room ?? '-' }}
                                                    </strong>

                                                </div>


                                            </div>

                                        </div>


                                    @empty

                                        <div class="no-classes">

                                            <i class="bi bi-calendar-x"></i>

                                            <span>
                                                No classes
                                            </span>

                                        </div>

                                    @endforelse


                                </td>

                            @endforeach

                        </tr>

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

@endsection