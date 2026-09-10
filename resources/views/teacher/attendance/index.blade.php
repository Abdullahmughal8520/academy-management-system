@extends('layouts.app')

@section('title', 'Attendance')

@section('content')

<style>
    /* =========================
       TEACHER ATTENDANCE PAGE
       ========================= */

    body:has(.teacher-attendance-page) .main-wrapper,
    body:has(.teacher-attendance-page) .page-content {
        background:#080e17 !important;
    }

    body:has(.teacher-attendance-page) .page-content {
        padding:22px 24px 0 24px !important;
        min-height:calc(100vh - 76px) !important;
    }

    .teacher-attendance-page {
        color:#edf3fb;
    }

    .teacher-attendance-page * {
        box-sizing:border-box;
    }


    /* =========================
       PAGE HEADER
       ========================= */

    .attendance-page-header {
        display:flex;
        justify-content:space-between;
        align-items:center;
        margin-bottom:20px;
    }

    .attendance-kicker {
        font-size:10px;
        letter-spacing:1.7px;
        text-transform:uppercase;
        color:#a78bfa;
        font-weight:900;
        margin-bottom:4px;
    }

    .attendance-page-title {
        font-size:27px;
        line-height:1.15;
        font-weight:850;
        color:#f8fafc;
        margin:0;
    }

    .attendance-page-subtitle {
        font-size:12px;
        color:#718096;
        margin:5px 0 0;
    }


    /* =========================
       MARK ATTENDANCE BUTTON
       ========================= */

    .add-attendance-btn {
        position:relative;
        display:inline-flex;
        align-items:center;
        justify-content:center;
        gap:5px;
        overflow:hidden;
        background:linear-gradient(135deg,#6848e8,#8b5cf6);
        border:1px solid rgba(167,139,250,.45);
        color:#fff;
        padding:10px 16px;
        border-radius:10px;
        font-size:10px;
        font-weight:850;
        text-decoration:none;
        box-shadow:0 8px 24px rgba(124,58,237,.20);
        transition:
            transform .25s ease,
            box-shadow .25s ease,
            border-color .25s ease;
    }

    .add-attendance-btn::before {
        content:"";
        position:absolute;
        top:0;
        left:-120%;
        width:75%;
        height:100%;
        background:linear-gradient(
            90deg,
            transparent,
            rgba(255,255,255,.20),
            transparent
        );
        transform:skewX(-20deg);
        transition:left .55s ease;
    }

    .add-attendance-btn:hover {
        color:#fff;
        transform:translateY(-3px);
        border-color:rgba(196,181,253,.75);
        box-shadow:
            0 12px 30px rgba(124,58,237,.32),
            0 0 20px rgba(139,92,246,.12);
    }

    .add-attendance-btn:hover::before {
        left:140%;
    }

    .add-attendance-btn i {
        transition:transform .25s ease;
    }

    .add-attendance-btn:hover i {
        transform:scale(1.08);
        filter:drop-shadow(0 0 5px rgba(255,255,255,.55));
    }


    /* =========================
       SUCCESS ALERT
       ========================= */

    .attendance-success-alert {
        display:flex;
        align-items:center;
        background:rgba(34,197,94,.08);
        border:1px solid rgba(34,197,94,.20);
        border-radius:10px;
        color:#86efac;
        font-size:10px;
        padding:11px 14px;
        box-shadow:0 5px 18px rgba(0,0,0,.10);
    }

    .attendance-success-alert i {
        color:#22c55e;
        filter:drop-shadow(0 0 5px rgba(34,197,94,.45));
    }


    /* =========================
       ATTENDANCE CARD
       ========================= */

    .attendance-card {
        background:linear-gradient(145deg,#111b2a,#0d1521);
        border:1px solid #223149;
        border-radius:15px;
        box-shadow:0 12px 30px rgba(0,0,0,.12);
        overflow:hidden;
    }

    .attendance-card-header {
        padding:15px 17px;
        border-bottom:1px solid #1e2b3e;
    }

    .attendance-card-title {
        font-size:12px;
        font-weight:850;
        color:#eef3fb;
        margin:0;
    }

    .attendance-card-subtitle {
        font-size:9px;
        color:#687890;
        margin:3px 0 0;
    }


    /* =========================
       TABLE
       ========================= */

    .attendance-table {
        width:100%;
        margin:0;
        border-collapse:collapse;
    }

    .attendance-table {
        --bs-table-bg:transparent !important;
        --bs-table-color:#cbd5e1 !important;
        --bs-table-border-color:#1a2637 !important;
        --bs-table-hover-bg:rgba(139,92,246,.035) !important;
        --bs-table-hover-color:#dbe4f2 !important;
    }

    .attendance-table > :not(caption) > * > * {
        background-color:transparent !important;
        color:#cbd5e1 !important;
        border-bottom-color:#1a2637 !important;
        box-shadow:none !important;
    }

    .attendance-table thead th {
        background:#0d1725 !important;
        color:#607089 !important;
        font-size:8px;
        font-weight:900;
        text-transform:uppercase;
        letter-spacing:.65px;
        padding:11px 12px;
        border-bottom:1px solid #223149 !important;
        white-space:nowrap;
    }

    .attendance-table tbody td {
        padding:12px;
        color:#cbd5e1 !important;
        font-size:10px;
        border-bottom:1px solid #1a2637 !important;
        vertical-align:middle;
    }

    .attendance-table tbody tr {
        transition:background .2s ease;
    }

    .attendance-table tbody tr:hover {
        background:rgba(139,92,246,.035) !important;
    }

    .attendance-table tbody tr:last-child td {
        border-bottom:0 !important;
    }


    /* =========================
       ID
       ========================= */

    .attendance-id {
        color:#64758c;
        font-size:9px;
        font-weight:850;
    }


    /* =========================
       DATE
       ========================= */

    .date-text {
        color:#cbd5e1;
        font-weight:700;
        white-space:nowrap;
    }

    .date-text i {
        color:#718096 !important;
    }


    /* =========================
       STUDENT
       ========================= */

    .student-name {
        color:#dbe4f2;
        font-size:10px;
        font-weight:800;
    }


    /* =========================
       CLASS / GROUP BADGES
       ========================= */

    .class-badge,
    .group-badge {
        display:inline-flex;
        align-items:center;
        gap:4px;
        padding:5px 8px;
        border-radius:7px;
        font-size:8px;
        font-weight:850;
        white-space:nowrap;
    }

    .class-badge {
        background:rgba(139,92,246,.10);
        border:1px solid rgba(139,92,246,.16);
        color:#a78bfa;
    }

    .group-badge {
        background:rgba(34,211,238,.08);
        border:1px solid rgba(34,211,238,.14);
        color:#67e8f9;
    }

    .class-badge i,
    .group-badge i {
        font-size:8px;
    }


    /* =========================
       STATUS BADGES
       ========================= */

    .status-badge {
        display:inline-flex;
        align-items:center;
        gap:5px;
        padding:5px 9px;
        border-radius:999px;
        font-size:8px;
        font-weight:900;
        white-space:nowrap;
    }

    .status-present {
        background:rgba(34,197,94,.09);
        border:1px solid rgba(34,197,94,.16);
        color:#4ade80;
    }

    .status-absent {
        background:rgba(244,63,94,.09);
        border:1px solid rgba(244,63,94,.16);
        color:#fb7185;
    }

    .status-leave {
        background:rgba(245,158,11,.09);
        border:1px solid rgba(245,158,11,.16);
        color:#fbbf24;
    }

    .status-dot {
        width:5px;
        height:5px;
        border-radius:50%;
        background:currentColor;
        box-shadow:0 0 6px currentColor;
    }


    /* =========================
       EMPTY STATE
       ========================= */

    .attendance-empty-state {
        padding:55px 20px !important;
        text-align:center;
    }

    .attendance-empty-icon {
        width:58px;
        height:58px;
        margin:0 auto 15px;
        border-radius:15px;
        display:grid;
        place-items:center;
        background:#172237;
        border:1px solid #26364d;
        color:#718096;
    }

    .attendance-empty-icon i {
        font-size:24px;
        filter:drop-shadow(0 0 5px rgba(113,128,150,.35));
    }

    .attendance-empty-title {
        color:#f8fafc;
        font-size:14px;
        font-weight:850;
        margin-bottom:5px;
    }

    .attendance-empty-text {
        color:#64758c;
        font-size:10px;
        margin:0;
    }


    /* =========================
       RESPONSIVE
       ========================= */

    @media(max-width:767px) {

        body:has(.teacher-attendance-page) .page-content {
            padding:20px 15px !important;
        }

        .attendance-page-header {
            align-items:flex-start;
            gap:15px;
        }

        .attendance-page-title {
            font-size:22px;
        }

        .attendance-page-subtitle {
            font-size:10px;
        }

        .add-attendance-btn {
            padding:9px 12px;
            white-space:nowrap;
        }

        .attendance-card-header {
            padding:14px;
        }

        .attendance-table thead th,
        .attendance-table tbody td {
            padding:10px;
        }
    }
</style>


<div class="teacher-attendance-page">

    {{-- PAGE HEADER --}}
    <div class="attendance-page-header">

        <div>

            <div class="attendance-kicker">
                Teacher Portal
            </div>

            <h1 class="attendance-page-title">
                Attendance
            </h1>

            <p class="attendance-page-subtitle">
                View attendance records of your students.
            </p>

        </div>


        <a
            href="{{ route('teacher.attendance.create') }}"
            class="add-attendance-btn"
        >
            <i class="bi bi-calendar-check-fill"></i>
            Mark Attendance
        </a>

    </div>


    {{-- SUCCESS MESSAGE --}}
    @if(session('success'))

        <div class="attendance-success-alert mb-3">

            <i class="bi bi-check-circle-fill me-2"></i>

            {{ session('success') }}

        </div>

    @endif


    {{-- ATTENDANCE CARD --}}
    <div class="attendance-card">

        <div class="attendance-card-header">

            <h2 class="attendance-card-title">
                Attendance Records
            </h2>

            <p class="attendance-card-subtitle">
                Your recently marked student attendance.
            </p>

        </div>


        <div class="table-responsive">

            <table class="table attendance-table align-middle">

                <thead>

                    <tr>
                        <th>ID</th>
                        <th>Date</th>
                        <th>Student</th>
                        <th>Class</th>
                        <th>Group</th>
                        <th>Status</th>
                    </tr>

                </thead>


                <tbody>

                    @forelse($attendances as $attendance)

                        <tr>

                            {{-- ID --}}
                            <td>

                                <span class="attendance-id">
                                    #{{ $attendance->id }}
                                </span>

                            </td>


                            {{-- Date --}}
                            <td>

                                <span class="date-text">

                                    <i class="bi bi-calendar3 me-1"></i>

                                    {{ \Carbon\Carbon::parse($attendance->attendance_date)->format('d M Y') }}

                                </span>

                            </td>


                            {{-- Student --}}
                            <td>

                                <div class="student-name">

                                    {{ $attendance->student->first_name ?? '' }}
                                    {{ $attendance->student->last_name ?? '' }}

                                </div>

                            </td>


                            {{-- Class --}}
                            <td>

                                @if($attendance->academyClass)

                                    <span class="class-badge">

                                        <i class="bi bi-mortarboard-fill"></i>

                                        {{ $attendance->academyClass->name }}

                                    </span>

                                @else

                                    <span style="color:#56667c;">
                                        -
                                    </span>

                                @endif

                            </td>


                            {{-- Group --}}
                            <td>

                                @if($attendance->group)

                                    <span class="group-badge">

                                        <i class="bi bi-people-fill"></i>

                                        {{ $attendance->group->name }}

                                    </span>

                                @else

                                    <span style="color:#56667c;">
                                        -
                                    </span>

                                @endif

                            </td>


                            {{-- Status --}}
                            <td>

                                @if($attendance->status === 'present')

                                    <span class="status-badge status-present">

                                        <span class="status-dot"></span>

                                        Present

                                    </span>

                                @elseif($attendance->status === 'absent')

                                    <span class="status-badge status-absent">

                                        <span class="status-dot"></span>

                                        Absent

                                    </span>

                                @elseif($attendance->status === 'leave')

                                    <span class="status-badge status-leave">

                                        <span class="status-dot"></span>

                                        Leave

                                    </span>

                                @else

                                    <span class="status-badge">

                                        {{ ucfirst($attendance->status) }}

                                    </span>

                                @endif

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td
                                colspan="6"
                                class="attendance-empty-state"
                            >

                                <div class="attendance-empty-icon">

                                    <i class="bi bi-calendar-x"></i>

                                </div>

                                <div class="attendance-empty-title">
                                    No Attendance Records
                                </div>

                                <p class="attendance-empty-text">
                                    You haven't marked any attendance yet.
                                </p>

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection