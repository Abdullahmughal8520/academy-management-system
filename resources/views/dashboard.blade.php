@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')

<style>
    :root {
        --a-bg: #080e17;
        --a-panel: #0f1826;
        --a-panel2: #111c2c;
        --a-border: #223149;
        --a-text: #edf3fb;
        --a-muted: #718096;
        --a-purple: #8b5cf6;
        --a-cyan: #22d3ee;
        --a-green: #22c55e;
        --a-red: #f43f5e;
        --a-orange: #f59e0b;
    }

    .admin-dash {
        color: var(--a-text);
        width: 100%;
    }

    .admin-dash * {
        box-sizing: border-box;
    }

    .admin-dash .muted {
        color: var(--a-muted);
    }

    /* ================================
       TOP HEADER
    ================================= */

    .ad-top {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 18px;
        margin-bottom: 20px;
    }

    .ad-kicker {
        font-size: 10px;
        letter-spacing: 1.7px;
        text-transform: uppercase;
        color: #a78bfa;
        font-weight: 900;
    }

    .ad-title {
        font-size: 27px;
        line-height: 1.15;
        font-weight: 850;
        margin: 4px 0;
        color: #f8fafc;
    }

    .ad-sub {
        font-size: 12px;
        color: #728197;
        margin: 0;
    }

    .ad-actions {
        display: flex;
        gap: 8px;
        flex-wrap: wrap;
    }

    /* ================================
       TOP BUTTONS
    ================================= */

    .ad-btn {
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
        );
        border: 1px solid rgba(167, 139, 250, .45);
        color: #fff;
        font-size: 10px;
        font-weight: 850;
        text-decoration: none;
        box-shadow: 0 8px 24px rgba(124, 58, 237, .20);
        transition:
            transform .25s ease,
            box-shadow .25s ease,
            border-color .25s ease;
    }

    .ad-btn::before {
        content: "";
        position: absolute;
        top: 0;
        left: -120%;
        width: 75%;
        height: 100%;
        background: linear-gradient(
            90deg,
            transparent,
            rgba(255, 255, 255, .20),
            transparent
        );
        transform: skewX(-20deg);
        transition: left .55s ease;
    }

    .ad-btn:hover {
        color: #fff;
        transform: translateY(-3px);
        border-color: rgba(196, 181, 253, .75);
        box-shadow:
            0 12px 30px rgba(124, 58, 237, .32),
            0 0 20px rgba(139, 92, 246, .12);
    }

    .ad-btn:hover::before {
        left: 140%;
    }

    .ad-btn i {
        transition: transform .25s ease;
    }

    .ad-btn:hover i {
        transform: rotate(90deg) scale(1.08);
        filter: drop-shadow(
            0 0 5px rgba(255, 255, 255, .55)
        );
    }

    /* ================================
       STAT CARDS
    ================================= */

    .ad-card,
    .ad-panel {
        background: linear-gradient(
            145deg,
            #111b2a,
            #0d1521
        );
        border: 1px solid var(--a-border);
        border-radius: 15px;
        box-shadow: 0 12px 30px rgba(0, 0, 0, .12);
    }

    .ad-card {
        min-height: 112px;
        padding: 15px;
        position: relative;
        overflow: hidden;
        transition:
            transform .25s ease,
            border-color .25s ease,
            box-shadow .25s ease,
            background .25s ease;
        cursor: pointer;
    }

    .ad-card::after {
        content: "";
        position: absolute;
        width: 90px;
        height: 90px;
        border-radius: 50%;
        right: -50px;
        top: -48px;
        background: rgba(139, 92, 246, .08);
        transition:
            transform .35s ease,
            background .35s ease;
    }

    .ad-card:hover {
        transform: translateY(-6px);
        border-color: rgba(139, 92, 246, .55);
        background: linear-gradient(
            145deg,
            #141f32,
            #0e1725
        );
        box-shadow:
            0 14px 35px rgba(0, 0, 0, .32),
            0 0 22px rgba(139, 92, 246, .12);
    }

    .ad-card:hover::after {
        transform: scale(1.35);
        background: rgba(139, 92, 246, .13);
    }

    .ad-icon {
        width: 39px;
        height: 39px;
        border-radius: 11px;
        display: grid;
        place-items: center;
        font-size: 16px;
        background: #172237;
        color: #a78bfa;
        transition:
            transform .25s ease,
            box-shadow .25s ease,
            background .25s ease,
            color .25s ease;
    }

    .ad-card:hover .ad-icon {
        transform: scale(1.10) rotate(-2deg);
        background: rgba(139, 92, 246, .13);
        color: #c4b5fd;
        box-shadow:
            0 0 18px rgba(139, 92, 246, .25),
            inset 0 0 12px rgba(139, 92, 246, .06);
    }

    .admin-dash .ad-icon i,
    .admin-dash .admin-icon i {
        filter: drop-shadow(
            0 0 5px rgba(34, 211, 238, .55)
        );
        transition: .25s ease;
    }

    .admin-dash .ad-card:hover .ad-icon i {
        filter:
            drop-shadow(0 0 5px rgba(167, 139, 250, .85))
            drop-shadow(0 0 10px rgba(139, 92, 246, .45));
        transform: scale(1.08);
    }

    .ad-label {
        font-size: 9px;
        text-transform: uppercase;
        letter-spacing: .65px;
        color: #7c8ba1;
        font-weight: 900;
        margin-top: 11px;
    }

    .ad-value {
        font-size: 24px;
        line-height: 1;
        font-weight: 900;
        color: #f8fafc;
        margin-top: 6px;
        transition: text-shadow .25s ease;
    }

    .ad-card:hover .ad-value {
        text-shadow: 0 0 12px rgba(255, 255, 255, .12);
    }

    .ad-note {
        font-size: 9px;
        color: #5f7089;
        margin-top: 5px;
        transition: color .25s ease;
    }

    .ad-card:hover .ad-note {
        color: #8192aa;
    }

    /* ================================
       PANELS
    ================================= */

    .ad-panel {
        height: 100%;
        overflow: hidden;
    }

    .ad-head {
        padding: 14px 16px;
        border-bottom: 1px solid #1e2b3e;
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 12px;
    }

    .ad-head h3 {
        font-size: 12px;
        font-weight: 850;
        color: #eef3fb;
        margin: 0;
    }

    .ad-head p {
        font-size: 9px;
        color: #687890;
        margin: 3px 0 0;
    }

    .ad-body {
        padding: 15px;
    }

    .ad-chart {
        height: 235px;
        position: relative;
    }

    .ad-chart.small {
        height: 190px;
    }

    .ad-select {
        background: #111d2d;
        color: #aab7ca;
        border: 1px solid #27364b;
        border-radius: 8px;
        font-size: 9px;
        padding: 5px 8px;
    }

    /* ================================
       TABLE
    ================================= */

    .ad-table {
        width: 100%;
        border-collapse: collapse;
    }

    .ad-table th {
        font-size: 8px;
        text-transform: uppercase;
        letter-spacing: .6px;
        color: #607089;
        font-weight: 900;
        text-align: left;
        padding: 7px 5px;
        border-bottom: 1px solid #1c293b;
    }

    .ad-table td {
        font-size: 10px;
        color: #cbd5e1;
        padding: 10px 5px;
        border-bottom: 1px solid #1a2637;
    }

    .ad-table tr:last-child td {
        border-bottom: 0;
    }

    .score {
        color: #9fe8d1 !important;
        font-weight: 850;
    }

    .rank {
        width: 25px;
        height: 25px;
        border-radius: 8px;
        background: #182237;
        color: #a78bfa;
        display: grid;
        place-items: center;
        font-size: 9px;
        font-weight: 900;
    }

    /* ================================
       SCHEDULE
    ================================= */

    .ad-schedule {
        display: flex;
        gap: 10px;
        padding: 10px 0;
        border-bottom: 1px solid #1a2637;
    }

    .ad-schedule:last-child {
        border-bottom: 0;
    }

    .ad-time {
        width: 65px;
        color: #8494aa;
        font-size: 9px;
        font-weight: 850;
    }

    .ad-dot {
        width: 7px;
        height: 7px;
        border-radius: 50%;
        background: var(--a-cyan);
        margin-top: 4px;
        box-shadow: 0 0 8px rgba(34, 211, 238, .7);
        flex-shrink: 0;
    }

    .ad-main {
        flex: 1;
        min-width: 0;
    }

    .ad-row-title {
        font-size: 10px;
        color: #dbe4f2;
        font-weight: 800;
    }

    .ad-row-sub {
        font-size: 9px;
        color: #64758c;
        margin-top: 2px;
    }

    .ad-pill {
        background: #162437;
        color: #7dd3fc;
        border-radius: 999px;
        padding: 4px 7px;
        font-size: 8px;
        font-weight: 900;
        white-space: nowrap;
    }

    /* ================================
       RECENT STUDENTS
    ================================= */

    .ad-mini {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 10px;
        padding: 10px 0;
        border-bottom: 1px solid #1a2637;
    }

    .ad-mini:last-child {
        border-bottom: 0;
    }

    .ad-avatar {
        width: 28px;
        height: 28px;
        border-radius: 9px;
        background: linear-gradient(
            135deg,
            #312e81,
            #7c3aed
        );
        display: grid;
        place-items: center;
        color: #fff;
        font-size: 9px;
        font-weight: 900;
        flex-shrink: 0;
    }

    .ad-mini-main {
        flex: 1;
        min-width: 0;
    }

    .ad-mini-title {
        font-size: 10px;
        color: #dbe4f2;
        font-weight: 800;
    }

    .ad-mini-sub {
        font-size: 8px;
        color: #64758c;
        margin-top: 2px;
    }

    /* ================================
       QUICK ACTIONS
    ================================= */

    .admin-dash .ad-panel.mb-3 {
        margin-bottom: 10px !important;
    }

    .admin-dash .ad-action {
        display: flex;
        align-items: center;
        gap: 9px;
        padding: 7px 0;
        border-bottom: 1px solid #1a2637;
        color: #cbd5e1;
        text-decoration: none;
        font-size: 9px;
        font-weight: 700;
        transition:
            color .2s ease,
            padding-left .2s ease;
    }

    .admin-dash .ad-action:last-child {
        border-bottom: 0;
    }

    .admin-dash .ad-action:hover {
        color: #fff;
        padding-left: 4px;
    }

    .admin-dash .ad-action i {
        width: 22px;
        color: #a78bfa;
        text-align: center;
        font-size: 11px;
    }

    .admin-dash .ad-action:hover i {
        color: #c4b5fd;
    }

    /* ================================
       ALERTS
    ================================= */

    .ad-alert {
        display: flex;
        gap: 8px;
        align-items: center;
        padding: 6px 0;
        font-size: 8.5px;
        color: #cbd5e1;
    }

    .ad-alert i {
        font-size: 10px;
    }

    .ad-alert.red i {
        color: #f43f5e;
    }

    .ad-alert.orange i {
        color: #f59e0b;
    }

    .ad-alert.green i {
        color: #22c55e;
    }

    /* ================================
       LINKS
    ================================= */

    .ad-link {
        color: #a78bfa;
        text-decoration: none;
        font-size: 9px;
        font-weight: 800;
    }

    .ad-link:hover {
        color: #c4b5fd;
    }

    .ad-empty {
        color: #64758c;
        text-align: center;
        font-size: 10px;
        padding: 22px 0;
    }

    /* ================================
       RIGHT SIDE COMPACT PANELS
    ================================= */

    .admin-dash .col-xl-3 > .ad-panel {
        height: auto;
    }

    .admin-dash .col-xl-3 > .ad-panel:first-child {
        min-height: 0;
    }

    .admin-dash .col-xl-3 > .ad-panel:last-child {
        min-height: 0;
    }

    /* ================================
       MOBILE
    ================================= */

    @media (max-width: 767px) {

        .ad-top {
            align-items: flex-start;
        }

        .ad-actions {
            display: none;
        }

        .ad-title {
            font-size: 22px;
        }

        .ad-chart {
            height: 210px;
        }
    }

    @media (max-width: 991px) {

        .ad-top {
            align-items: flex-start;
        }
    }
</style>


<div class="admin-dash">

    {{-- ================================
         DASHBOARD HEADER
    ================================= --}}

    <div class="ad-top">

        <div>

            <div class="ad-kicker">
                Smart academy command center
            </div>

            <h1 class="ad-title">
                Admin Dashboard
            </h1>

            <p class="ad-sub">
                Real-time overview of students, staff, academics and daily operations.
            </p>

        </div>


        <div class="ad-actions">

            {{-- TIMETABLE --}}
            <a class="ad-btn"
               href="{{ route('admin.weekly-timetable') }}">

                <i class="bi bi-calendar3 me-1"></i>
                Timetable

            </a>


            {{-- EXAMS --}}
            <a class="ad-btn"
               href="{{ route('exams.index') }}">

                <i class="bi bi-file-earmark-text-fill me-1"></i>
                Exams

            </a>


            {{-- ADD STUDENT --}}
            <a class="ad-btn"
               href="{{ route('students.create') }}">

                <i class="bi bi-plus-lg me-1"></i>
                Add Student

            </a>

        </div>

    </div>


    {{-- ================================
         STAT CARDS
    ================================= --}}

    <div class="row g-3 mb-3">

        @foreach([
            [
                'Active Students',
                $studentsCount,
                'bi-people-fill',
                'All active learners'
            ],
            [
                'Active Teachers',
                $teachersCount,
                'bi-person-video3',
                'Teaching staff'
            ],
            [
                'Active Classes',
                $classesCount,
                'bi-building',
                'Academic classes'
            ],
            [
                'Groups',
                $groupsCount,
                'bi-diagram-3-fill',
                'Active groups'
            ],
            [
                'Subjects',
                $subjectsCount,
                'bi-journal-bookmark-fill',
                'Assigned subjects'
            ],
            [
                'Attendance Today',
                $attendanceRate . '%',
                'bi-activity',
                'Present + late'
            ]
        ] as $m)

            <div class="col-6 col-md-4 col-xl-2">

                <div class="ad-card">

                    <div class="d-flex justify-content-between">

                        <span class="ad-label mt-0">
                            {{ $m[0] }}
                        </span>

                        <span class="ad-icon">
                            <i class="bi {{ $m[2] }}"></i>
                        </span>

                    </div>

                    <div class="ad-value">
                        {{ $m[1] }}
                    </div>

                    <div class="ad-note">
                        {{ $m[3] }}
                    </div>

                </div>

            </div>

        @endforeach

    </div>


    {{-- ================================
         CHARTS + TODAY SCHEDULE
    ================================= --}}

    <div class="row g-3 mb-3">

        {{-- ENROLLMENT TREND --}}
        <div class="col-xl-6">

            <div class="ad-panel">

                <div class="ad-head">

                    <div>

                        <h3>
                            Student enrollment trend
                        </h3>

                        <p>
                            Admissions and cumulative active intake
                        </p>

                    </div>

                    <span class="ad-pill">
                        6 months
                    </span>

                </div>


                <div class="ad-body">

                    <div class="ad-chart">
                        <canvas id="enrollmentChart"></canvas>
                    </div>

                </div>

            </div>

        </div>


        {{-- ATTENDANCE OVERVIEW --}}
        <div class="col-xl-3">

            <div class="ad-panel">

                <div class="ad-head">

                    <div>

                        <h3>
                            Attendance overview
                        </h3>

                        <p>
                            Last 7 recorded days
                        </p>

                    </div>

                    <span class="ad-pill">
                        Live
                    </span>

                </div>


                <div class="ad-body">

                    <div class="ad-chart small">
                        <canvas id="attendanceChart"></canvas>
                    </div>

                </div>

            </div>

        </div>


        {{-- TODAY'S SCHEDULE --}}
        <div class="col-xl-3">

            <div class="ad-panel">

                <div class="ad-head">

                    <div>

                        <h3>
                            Today's schedule
                        </h3>

                        <p>
                            {{ now()->format('l, d M') }}
                        </p>

                    </div>

                </div>


                <div class="ad-body">

                    @forelse($todaySchedules as $schedule)

                        @php
                            $a = $schedule->teacherAssignment;
                        @endphp

                        <div class="ad-schedule">

                            <div class="ad-time">

                                {{ \Carbon\Carbon::parse($schedule->start_time)->format('h:i A') }}

                            </div>


                            <div class="ad-dot"></div>


                            <div class="ad-main">

                                <div class="ad-row-title">

                                    {{ $a?->subject?->name ?? 'Subject' }}

                                </div>

                                <div class="ad-row-sub">

                                    {{ $a?->academyClass?->name ?? 'Class' }}

                                    ·

                                    {{ $a?->teacher?->first_name ?? 'Teacher' }}

                                </div>

                            </div>

                        </div>

                    @empty

                        <div class="ad-empty">
                            No classes scheduled today.
                        </div>

                    @endforelse


                    <a class="ad-link d-block text-center mt-2"
                       href="{{ route('admin.weekly-timetable') }}">

                        View full timetable →

                    </a>

                </div>

            </div>

        </div>

    </div>


    {{-- ================================
         BOTTOM SECTION
    ================================= --}}

    <div class="row g-3">


        {{-- TOP CLASSES --}}
        <div class="col-xl-5">

            <div class="ad-panel">

                <div class="ad-head">

                    <div>

                        <h3>
                            Top classes by active students
                        </h3>

                        <p>
                            Current academy distribution
                        </p>

                    </div>

                    <a class="ad-link"
                       href="{{ route('classes.index') }}">

                        View all

                    </a>

                </div>


                <div class="ad-body">

                    <table class="ad-table">

                        <thead>

                            <tr>

                                <th>
                                    Class
                                </th>

                                <th>
                                    Students
                                </th>

                                <th>
                                    Share
                                </th>

                            </tr>

                        </thead>


                        <tbody>

                            @forelse($topClasses as $class)

                                <tr>

                                    <td>

                                        <div class="d-flex align-items-center gap-2">

                                            <span class="rank">
                                                {{ $loop->iteration }}
                                            </span>

                                            {{ $class->name }}

                                        </div>

                                    </td>


                                    <td>

                                        {{ $class->active_students_count }}

                                    </td>


                                    <td class="score">

                                        {{ $studentsCount
                                            ? round(
                                                ($class->active_students_count / $studentsCount) * 100,
                                                1
                                            )
                                            : 0
                                        }}%

                                    </td>

                                </tr>

                            @empty

                                <tr>

                                    <td colspan="3"
                                        class="text-center muted">

                                        No class data yet.

                                    </td>

                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

            </div>

        </div>


        {{-- RECENT STUDENTS --}}
        <div class="col-xl-4">

            <div class="ad-panel">

                <div class="ad-head">

                    <div>

                        <h3>
                            Recent students
                        </h3>

                        <p>
                            Latest records added to the academy
                        </p>

                    </div>

                    <a class="ad-link"
                       href="{{ route('students.index') }}">

                        View all

                    </a>

                </div>


                <div class="ad-body">

                    @forelse($recentStudents as $student)

                        <div class="ad-mini">

                            <div class="ad-avatar">

                                {{ strtoupper(
                                    substr($student->first_name ?? 'S', 0, 1)
                                ) }}

                            </div>


                            <div class="ad-mini-main">

                                <div class="ad-mini-title">

                                    {{ $student->first_name ?? '' }}
                                    {{ $student->last_name ?? '' }}

                                </div>


                                <div class="ad-mini-sub">

                                    {{ $student->academyClass?->name ?? 'No class' }}

                                    ·

                                    {{ $student->student_code ?? '-' }}

                                </div>

                            </div>


                            <span class="ad-pill">

                                {{ ucfirst($student->status ?? 'active') }}

                            </span>

                        </div>

                    @empty

                        <div class="ad-empty">
                            No students yet.
                        </div>

                    @endforelse

                </div>

            </div>

        </div>


        {{-- RIGHT SIDE --}}
        <div class="col-xl-3">


            {{-- QUICK ACTIONS --}}
            <div class="ad-panel mb-3">

                <div class="ad-head">

                    <div>

                        <h3>
                            Quick actions
                        </h3>

                        <p>
                            Common admin tasks
                        </p>

                    </div>

                </div>


                <div class="ad-body py-1">


                    {{-- ADD STUDENT --}}
                    <a class="ad-action"
                       href="{{ route('students.create') }}">

                        <i class="bi bi-person-plus-fill"></i>

                        Add student

                        <i class="bi bi-chevron-right ms-auto"></i>

                    </a>


                    {{-- ADD TEACHER --}}
                    <a class="ad-action"
                       href="{{ route('teachers.create') }}">

                        <i class="bi bi-person-video3"></i>

                        Add teacher

                        <i class="bi bi-chevron-right ms-auto"></i>

                    </a>


                    {{-- ADD CLASS --}}
                    <a class="ad-action"
                       href="{{ route('classes.create') }}">

                        <i class="bi bi-building"></i>

                        Add class

                        <i class="bi bi-chevron-right ms-auto"></i>

                    </a>


                    {{-- CREATE SCHEDULE --}}
                    <a class="ad-action"
                       href="{{ route('schedules.create') }}">

                        <i class="bi bi-calendar-plus"></i>

                        Create schedule

                        <i class="bi bi-chevron-right ms-auto"></i>

                    </a>


                    {{-- EXAMS --}}
                    <a class="ad-action"
                       href="{{ route('exams.index') }}">

                        <i class="bi bi-file-earmark-text-fill"></i>

                        Manage exams

                        <i class="bi bi-chevron-right ms-auto"></i>

                    </a>


                    {{-- RESULTS --}}
                    <a class="ad-action"
                       href="{{ route('results.index') }}">

                        <i class="bi bi-award-fill"></i>

                        Manage results

                        <i class="bi bi-chevron-right ms-auto"></i>

                    </a>

                </div>

            </div>


            {{-- ALERTS --}}
            <div class="ad-panel">

                <div class="ad-head">

                    <div>

                        <h3>
                            Alerts
                        </h3>

                        <p>
                            Items needing attention
                        </p>

                    </div>

                </div>


                <div class="ad-body">


                    @if($attendanceAbsent > 0)

                        <div class="ad-alert red">

                            <i class="bi bi-exclamation-circle-fill"></i>

                            {{ $attendanceAbsent }}
                            students absent today

                        </div>

                    @endif


                    @if($attendanceLate > 0)

                        <div class="ad-alert orange">

                            <i class="bi bi-clock-fill"></i>

                            {{ $attendanceLate }}
                            late records today

                        </div>

                    @endif


                    @if($attendanceTotal === 0)

                        <div class="ad-alert orange">

                            <i class="bi bi-info-circle-fill"></i>

                            Attendance has not been recorded today

                        </div>

                    @endif


                    <div class="ad-alert green">

                        <i class="bi bi-check-circle-fill"></i>

                        {{ $schedulesCount }}
                        active schedules configured

                    </div>


                </div>

            </div>

        </div>

    </div>

</div>

@endsection


@section('scripts')

<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.7/dist/chart.umd.min.js"></script>

<script>

    const chartOpts = {

        responsive: true,

        maintainAspectRatio: false,

        plugins: {

            legend: {

                labels: {

                    color: '#91a0b5',

                    font: {
                        size: 9
                    },

                    usePointStyle: true

                }

            }

        },

        scales: {

            x: {

                grid: {

                    color: 'rgba(255,255,255,.035)'

                },

                ticks: {

                    color: '#718096',

                    font: {
                        size: 9
                    }

                }

            },

            y: {

                grid: {

                    color: 'rgba(255,255,255,.035)'

                },

                ticks: {

                    color: '#718096',

                    font: {
                        size: 9
                    }

                }

            }

        }

    };


    /* ================================
       ENROLLMENT CHART
    ================================= */

    const enrollmentCanvas =
        document.getElementById('enrollmentChart');


    if (enrollmentCanvas) {

        new Chart(

            enrollmentCanvas,

            {

                type: 'line',

                data: {

                    labels: @json($enrollmentTrend->pluck('label')),

                    datasets: [

                        {

                            label: 'Students',

                            data: @json($enrollmentTrend->pluck('students')),

                            borderColor: '#8b5cf6',

                            backgroundColor: 'rgba(139,92,246,.13)',

                            fill: true,

                            tension: .42,

                            borderWidth: 2,

                            pointRadius: 2

                        },

                        {

                            label: 'Admissions',

                            data: @json($enrollmentTrend->pluck('admissions')),

                            borderColor: '#22d3ee',

                            backgroundColor: 'transparent',

                            tension: .42,

                            borderWidth: 2,

                            pointRadius: 2

                        }

                    ]

                },

                options: chartOpts

            }

        );

    }


    /* ================================
       ATTENDANCE CHART
    ================================= */

    const attendanceCanvas =
        document.getElementById('attendanceChart');


    if (attendanceCanvas) {

        new Chart(

            attendanceCanvas,

            {

                type: 'line',

                data: {

                    labels: @json($attendanceTrend->pluck('label')),

                    datasets: [

                        {

                            label: 'Attendance %',

                            data: @json($attendanceTrend->pluck('rate')),

                            borderColor: '#22c55e',

                            backgroundColor: 'rgba(34,197,94,.10)',

                            fill: true,

                            tension: .42,

                            borderWidth: 2,

                            pointRadius: 2

                        }

                    ]

                },

                options: {

                    ...chartOpts,

                    scales: {

                        ...chartOpts.scales,

                        y: {

                            ...chartOpts.scales.y,

                            min: 0,

                            max: 100

                        }

                    }

                }

            }

        );

    }

</script>

@endsection