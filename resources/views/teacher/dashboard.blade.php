@extends('layouts.app')

@section('title', 'Teacher Dashboard')

@section('content')

<style>

.td{
    color:#dbe4f2;
}

/* ================================
   HERO
================================ */

.td-hero{
    display:flex;
    justify-content:space-between;
    align-items:flex-end;
    gap:18px;
    margin-bottom:20px;
}

.td-kicker{
    font-size:10px;
    letter-spacing:1.6px;
    text-transform:uppercase;
    color:#22d3ee;
    font-weight:900;
}

.td-title{
    font-size:27px;
    font-weight:850;
    color:#f8fafc;
    margin:4px 0;
}

.td-sub{
    font-size:12px;
    color:#728197;
    margin:0;
}

.td-btn{
    border:1px solid #26364b;
    background:#101a29;
    color:#dce5f2;
    border-radius:10px;
    padding:9px 12px;
    text-decoration:none;
    font-size:10px;
    font-weight:800;
}

.td-btn:hover{
    color:#fff;
    border-color:#22d3ee;
    box-shadow:0 0 15px rgba(34,211,238,.15);
}

.td-btn.primary{
    background:linear-gradient(135deg,#087ea4,#0ea5e9);
    border-color:#0891b2;
    color:#fff;
}

/* ================================
   STAT CARDS
================================ */

.td-card,
.td-panel{
    background:linear-gradient(145deg,#111b2a,#0d1521);
    border:1px solid #223149;
    border-radius:15px;
}

.td-card{
    padding:15px;
    min-height:105px;
    transition:.25s ease;
}

.td-card:hover{
    transform:translateY(-3px);
    border-color:#2e506d;
    box-shadow:0 8px 30px rgba(0,0,0,.25);
}

.td-icon{
    width:44px;
    height:44px;
    border-radius:13px;
    display:grid;
    place-items:center;

    background:rgba(34,211,238,.08);
    border:1px solid rgba(34,211,238,.25);

    color:#22d3ee;

    box-shadow:
        0 0 12px rgba(34,211,238,.12),
        inset 0 0 15px rgba(34,211,238,.04);

    transition:.25s ease;
}

.td-card:hover .td-icon{
    transform:scale(1.08);
    box-shadow:
        0 0 20px rgba(34,211,238,.25),
        inset 0 0 18px rgba(34,211,238,.07);
}

.td-icon i{
    font-size:19px;
    filter:drop-shadow(0 0 5px rgba(34,211,238,.45));
}

.td-label{
    font-size:9px;
    color:#7c8ba1;
    text-transform:uppercase;
    letter-spacing:.65px;
    font-weight:900;
}

.td-num{
    font-size:23px;
    color:#f8fafc;
    font-weight:900;
    margin-top:10px;
}

/* ================================
   PANELS
================================ */

.td-head{
    padding:14px 16px;
    border-bottom:1px solid #1d2a3c;

    display:flex;
    justify-content:space-between;
    align-items:center;
}

.td-head h3{
    font-size:12px;
    color:#eef3fb;
    font-weight:850;
    margin:0;
}

.td-head p{
    font-size:9px;
    color:#687890;
    margin:3px 0 0;
}

.td-body{
    padding:15px;
}

/* ================================
   ATTENDANCE CIRCLE
================================ */

.attendance-circle-wrap{
    display:flex;
    align-items:center;
    justify-content:center;
    min-height:190px;
    height:190px;
    position:relative;
}

.attendance-chart{
    width:170px;
    height:170px;
}

.attendance-center{
    position:absolute;
    text-align:center;
    pointer-events:none;
}

.attendance-center-value{
    font-size:30px;
    font-weight:900;
    color:#f8fafc;
    line-height:1;
}

.attendance-center-label{
    font-size:9px;
    color:#718096;
    text-transform:uppercase;
    letter-spacing:1px;
    margin-top:6px;
    font-weight:800;
}

/* ================================
   ATTENDANCE LEGEND
================================ */

.attendance-legend{
    display:flex;
    justify-content:center;
    gap:18px;
    margin-top:5px;
    flex-wrap:wrap;
}

.attendance-legend-item{
    display:flex;
    align-items:center;
    gap:6px;
    font-size:9px;
    color:#a8b5c7;
}

.attendance-dot{
    width:8px;
    height:8px;
    border-radius:50%;
}

.attendance-dot.present{
    background:#22c55e;
    box-shadow:0 0 8px rgba(34,197,94,.65);
}

.attendance-dot.absent{
    background:#ef4444;
    box-shadow:0 0 8px rgba(239,68,68,.55);
}

.attendance-dot.leave{
    background:#f59e0b;
    box-shadow:0 0 8px rgba(245,158,11,.55);
}

/* ================================
   SCHEDULE
================================ */

.td-badge{
    background:#162437;
    color:#7dd3fc;
    border-radius:999px;
    padding:4px 7px;
    font-size:8px;
    font-weight:900;
}

.td-schedule{
    display:flex;
    gap:10px;
    padding:10px 0;
    border-bottom:1px solid #1b283a;
}

.td-schedule:last-child{
    border-bottom:0;
}

.td-time{
    width:65px;
    color:#8fa0b7;
    font-size:9px;
    font-weight:850;
}

.td-dot{
    width:7px;
    height:7px;
    border-radius:50%;
    background:#22d3ee;
    margin-top:4px;

    box-shadow:
        0 0 8px rgba(34,211,238,.7);
}

.td-main{
    flex:1;
}

.td-row-title{
    font-size:10px;
    color:#dbe4f2;
    font-weight:800;
}

.td-row-sub{
    font-size:9px;
    color:#687890;
    margin-top:2px;
}

/* ================================
   ASSIGNMENTS
================================ */

.td-assignment{
    display:flex;
    gap:10px;
    align-items:center;
    padding:10px 0;
    border-bottom:1px solid #1b283a;
}

.td-assignment:last-child{
    border-bottom:0;
}

.td-aicon{
    width:30px;
    height:30px;
    border-radius:9px;
    background:#211d3d;
    color:#a78bfa;
    display:grid;
    place-items:center;

    box-shadow:0 0 12px rgba(139,92,246,.12);
}

.td-progress{
    height:5px;
    background:#1b2738;
    border-radius:99px;
    overflow:hidden;
    margin-top:7px;
}

.td-progress span{
    display:block;
    height:100%;
    background:linear-gradient(90deg,#22d3ee,#8b5cf6);
    border-radius:99px;
}

/* ================================
   QUICK ACTIONS
================================ */

.td-action{
    display:flex;
    align-items:center;
    gap:9px;
    padding:9px 0;
    border-bottom:1px solid #1b283a;

    color:#dbe4f2;
    text-decoration:none;

    font-size:10px;
    font-weight:750;
}

.td-action:last-child{
    border-bottom:0;
}

.td-action i{
    color:#22d3ee;
    width:22px;
    text-align:center;
}

.td-action:hover{
    color:#fff;
}

.td-action:hover i{
    filter:drop-shadow(0 0 5px rgba(34,211,238,.7));
}

/* ================================
   ALERT / STATUS
================================ */

.td-alert{
    display:flex;
    justify-content:space-between;
    align-items:center;
    padding:10px 0;
    border-bottom:1px solid #1b283a;
}

.td-alert:last-child{
    border-bottom:0;
}

.td-alert small{
    color:#718096;
    font-size:8px;
}

.td-empty{
    text-align:center;
    color:#65758c;
    font-size:10px;
    padding:22px 0;
}

.muted{
    color:#718096 !important;
}

/* ================================
   RESPONSIVE
================================ */

@media(max-width:767px){

    .td-hero{
        align-items:flex-start;
    }

    .td-btn{
        display:none;
    }

    .td-title{
        font-size:22px;
    }

 .attendance-chart{
    width:160px !important;
    height:160px !important;
}
}

</style>


<div class="td">

    {{-- ================================
         HERO
    ================================= --}}

    <div class="td-hero">

        <div>

            <div class="td-kicker">
                Teacher workspace
            </div>

            <h1 class="td-title">
                Welcome back, {{ $teacher->first_name }} 👋
            </h1>

            <p class="td-sub">
                Your classes, attendance, timetable and teaching workload in one place.
            </p>

        </div>

        <a
            class="td-btn primary"
            href="{{ route('teacher.attendance.create') }}"
        >
            <i class="bi bi-check2-circle me-1"></i>
            Mark attendance
        </a>

    </div>


    {{-- ================================
         STAT CARDS
    ================================= --}}

    <div class="row g-3 mb-3">

        @foreach([

            ['My Classes', $classes->count(), 'bi-mortarboard-fill'],

            ['My Students', $studentsCount, 'bi-people-fill'],

            ['Attendance Today', $attendanceRate.'%', 'bi-lightning-charge-fill'],

            ['My Subjects', $subjects->count(), 'bi-journal-bookmark-fill'],

            ['Schedules', $schedules->count(), 'bi-calendar2-week-fill']

        ] as $m)

            <div class="col-6 col-md-4 col-xl">

                <div class="td-card">

                    <div class="d-flex justify-content-between align-items-start">

                        <span class="td-label">
                            {{ $m[0] }}
                        </span>

                        <span class="td-icon">

                            <i class="bi {{ $m[2] }}"></i>

                        </span>

                    </div>

                    <div class="td-num">
                        {{ $m[1] }}
                    </div>

                </div>

            </div>

        @endforeach

    </div>


    {{-- ================================
         MAIN ROW
    ================================= --}}

    <div class="row g-3 mb-3">


        {{-- ================================
             ATTENDANCE CIRCLE
        ================================= --}}

        <div class="col-xl-7">

            <div class="td-panel h-100">

                <div class="td-head">

                    <div>

                        <h3>
                            Attendance performance
                        </h3>

                        <p>
                            Today's attendance breakdown
                        </p>

                    </div>

                    <span class="td-badge">
                        {{ $attendanceTotal }} records
                    </span>

                </div>


                <div class="td-body">

                    <div class="attendance-circle-wrap">

                        <canvas
                            id="teacherAttendanceCircle"
                            class="attendance-chart"
                        ></canvas>


                        <div class="attendance-center">

                            <div class="attendance-center-value">
                                {{ $attendanceRate }}%
                            </div>

                            <div class="attendance-center-label">
                                Attendance
                            </div>

                        </div>

                    </div>


                    {{-- Legend --}}

                    <div class="attendance-legend">

                        <div class="attendance-legend-item">

                            <span class="attendance-dot present"></span>

                            Present:
                            <strong class="ms-1">
                                {{ $attendancePresent }}
                            </strong>

                        </div>


                        <div class="attendance-legend-item">

                            <span class="attendance-dot absent"></span>

                            Absent:
                            <strong class="ms-1">
                                {{ $attendanceAbsent }}
                            </strong>

                        </div>


                        <div class="attendance-legend-item">

                            <span class="attendance-dot leave"></span>

                            Leave:
                            <strong class="ms-1">
                                {{ $attendanceLeave }}
                            </strong>

                        </div>

                    </div>

                </div>

            </div>

        </div>


        {{-- ================================
             TODAY'S CLASSES
        ================================= --}}

        <div class="col-xl-5">

            <div class="td-panel h-100">

                <div class="td-head">

                    <div>

                        <h3>
                            Today's classes
                        </h3>

                        <p>
                            {{ now()->format('l, d M') }}
                        </p>

                    </div>

                    <span class="td-badge">
                        {{ $todaySchedules->count() }} classes
                    </span>

                </div>


                <div class="td-body">

                    @forelse($todaySchedules as $schedule)

                        @php
                            $a = $schedule->teacherAssignment;
                        @endphp

                        <div class="td-schedule">

                            <div class="td-time">

                                {{ \Carbon\Carbon::parse($schedule->start_time)->format('h:i A') }}

                            </div>

                            <div class="td-dot"></div>

                            <div class="td-main">

                                <div class="td-row-title">

                                    {{ $a->subject->name ?? 'Subject' }}

                                    ·

                                    {{ $a->academyClass->name ?? 'Class' }}

                                </div>

                                <div class="td-row-sub">

                                    {{ $a->group->name ?? 'All groups' }}

                                    ·

                                    {{ $schedule->room ?: 'Room —' }}

                                </div>

                            </div>

                        </div>

                    @empty

                        <div class="td-empty">
                            No classes scheduled today.
                        </div>

                    @endforelse


                    <a
                        href="{{ route('teacher.timetable') }}"
                        class="td-btn d-block text-center mt-2"
                    >
                        View full timetable →
                    </a>

                </div>

            </div>

        </div>

    </div>


    {{-- ================================
         BOTTOM ROW
    ================================= --}}

    <div class="row g-3">


        {{-- ================================
             TEACHING LOAD
        ================================= --}}

        <div class="col-xl-5">

            <div class="td-panel h-100">

                <div class="td-head">

                    <div>

                        <h3>
                            My teaching load
                        </h3>

                        <p>
                            Subjects, classes and groups assigned to you
                        </p>

                    </div>

                    <span class="td-badge">
                        {{ $assignments->count() }} assignments
                    </span>

                </div>


                <div class="td-body">

                    @forelse($assignments->take(7) as $a)

                        <div class="td-assignment">

                            <div class="td-aicon">

                                <i class="bi bi-mortarboard-fill"></i>

                            </div>


                            <div class="td-main">

                                <div class="td-row-title">

                                    {{ $a->subject->name ?? 'Subject' }}

                                </div>

                                <div class="td-row-sub">

                                    {{ $a->academyClass->name ?? 'Class' }}

                                    ·

                                    {{ $a->group->name ?? 'Group' }}

                                </div>


                                <div class="td-progress">

                                    <span
                                        style="width:{{ 35 + (($loop->index * 11) % 55) }}%"
                                    ></span>

                                </div>

                            </div>


                            <i class="bi bi-chevron-right muted"></i>

                        </div>

                    @empty

                        <div class="td-empty">
                            No teaching assignments yet.
                        </div>

                    @endforelse

                </div>

            </div>

        </div>


        {{-- ================================
             ATTENDANCE SNAPSHOT
        ================================= --}}

        <div class="col-xl-4">

            <div class="td-panel h-100">

                <div class="td-head">

                    <div>

                        <h3>
                            Attendance snapshot
                        </h3>

                        <p>
                            Today's marked records
                        </p>

                    </div>

                    <i class="bi bi-pie-chart-fill text-info"></i>

                </div>


                <div class="td-body">

                    <div class="display-5 fw-bold text-light">

                        {{ $attendanceRate }}%

                    </div>

                    <div class="muted small mb-3">

                        Effective attendance rate

                    </div>


                    {{-- Present --}}

                    <div class="d-flex justify-content-between small mb-1">

                        <span>
                            Present
                        </span>

                        <span class="muted">
                            {{ $attendancePresent }}
                        </span>

                    </div>

                 


                  


                    {{-- Absent --}}

                    <div class="d-flex justify-content-between small mb-1">

                        <span>
                            Absent
                        </span>

                        <span class="muted">
                            {{ $attendanceAbsent }}
                        </span>

                    </div>

                    <div class="td-progress mb-3">

                        <span
                            style="width:{{ $attendanceTotal ? ($attendanceAbsent / $attendanceTotal) * 100 : 0 }}%"
                        ></span>

                    </div>


                    {{-- Leave --}}

                    <div class="d-flex justify-content-between small mb-1">

                        <span>
                            Leave
                        </span>

                        <span class="muted">
                            {{ $attendanceLeave }}
                        </span>

                    </div>

                    <div class="td-progress mb-3">

                        <span
                            style="width:{{ $attendanceTotal ? ($attendanceLeave / $attendanceTotal) * 100 : 0 }}%"
                        ></span>

                    </div>


                    <a
                        href="{{ route('teacher.attendance.index') }}"
                        class="td-btn d-block text-center mt-2"
                    >
                        Open attendance
                    </a>

                </div>

            </div>

        </div>


        {{-- ================================
             QUICK ACTIONS + STATUS
        ================================= --}}

        <div class="col-xl-3">


            {{-- Quick Actions --}}

            <div class="td-panel mb-3">

                <div class="td-head">

                    <div>

                        <h3>
                            Quick actions
                        </h3>

                        <p>
                            Teaching tools
                        </p>

                    </div>

                </div>


                <div class="td-body py-1">

                    <a
                        class="td-action"
                        href="{{ route('teacher.attendance.create') }}"
                    >

                        <i class="bi bi-check2-square"></i>

                        Take attendance

                        <i class="bi bi-chevron-right ms-auto muted"></i>

                    </a>


                    <a
                        class="td-action"
                        href="{{ route('teacher.assignments') }}"
                    >

                        <i class="bi bi-journal-text"></i>

                        My assignments

                        <i class="bi bi-chevron-right ms-auto muted"></i>

                    </a>


                    <a
                        class="td-action"
                        href="{{ route('teacher.classes') }}"
                    >

                        <i class="bi bi-building"></i>

                        My classes

                        <i class="bi bi-chevron-right ms-auto muted"></i>

                    </a>


                    <a
                        class="td-action"
                        href="{{ route('teacher.timetable') }}"
                    >

                        <i class="bi bi-calendar-week"></i>

                        My timetable

                        <i class="bi bi-chevron-right ms-auto muted"></i>

                    </a>

                </div>

            </div>


            {{-- Workspace Status --}}

            <div class="td-panel">

                <div class="td-head">

                    <div>

                        <h3>
                            Workspace status
                        </h3>

                        <p>
                            System snapshot
                        </p>

                    </div>

                </div>


                <div class="td-body">


                    <div class="td-alert">

                        <span>
                            Subjects connected
                        </span>

                        <strong>
                            {{ $subjects->count() }}
                        </strong>

                    </div>


                    <div class="td-alert">

                        <span>
                            Assigned groups
                        </span>

                        <strong>
                            {{ $groups->count() }}
                        </strong>

                    </div>


                    <div class="td-alert">

                        <span>
                            Today's records
                        </span>

                        <strong>
                            {{ $attendanceTotal }}
                        </strong>

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

document.addEventListener('DOMContentLoaded', function () {

    const canvas = document.getElementById('teacherAttendanceCircle');

    if (!canvas) {
        return;
    }

    const present = {{ $attendancePresent }};
    const absent = {{ $attendanceAbsent }};
    const leave = {{ $attendanceLeave }};

    const total = present + absent + leave;

    /*
    |--------------------------------------------------------------------------
    | If no attendance records exist
    |--------------------------------------------------------------------------
    */

    const chartData = total > 0
        ? [present, absent, leave]
        : [1, 0, 0];


    new Chart(canvas, {

        type: 'doughnut',

        data: {

            labels: [
                'Present',
                'Absent',
                'Leave'
            ],

            datasets: [{

                data: chartData,

                backgroundColor: [

                    '#22c55e',

                    '#ef4444',

                    '#f59e0b'

                ],

                borderColor: '#0d1521',

                borderWidth: 4,

                hoverOffset: 7

            }]

        },


        options: {

            responsive: true,

            maintainAspectRatio: false,

            cutout: '72%',

            plugins: {

                legend: {

                    display: false

                },

                tooltip: {

                    backgroundColor: '#101a29',

                    borderColor: '#26364b',

                    borderWidth: 1,

                    titleColor: '#f8fafc',

                    bodyColor: '#dbe4f2',

                    padding: 10,

                    callbacks: {

                        label: function(context) {

                            if (total === 0) {

                                return ' No attendance records';

                            }

                            const value = context.raw;

                            const percentage = ((value / total) * 100).toFixed(1);

                            return ` ${context.label}: ${value} (${percentage}%)`;

                        }

                    }

                }

            },

            animation: {

                animateRotate: true,

                animateScale: true,

                duration: 900

            }

        }

    });

});

</script>

@endsection