@extends('layouts.app')

@section('title', 'Student Dashboard')

@section('content')

<style>

/* =========================================================
   STUDENT DASHBOARD
========================================================= */

body:has(.sd),
body:has(.sd) .main-wrapper,
body:has(.sd) .page-content {
    background: #080e17 !important;
    color: #dbe4f2;
}

body:has(.sd) .topbar {
    background: rgba(8, 14, 23, .95) !important;
    border-bottom-color: #1b2738 !important;
}

.sd {
    color: #dbe4f2;
    padding-bottom: 40px;
}

/* =========================================================
   HERO
========================================================= */

.sd-hero {
    background:
        radial-gradient(circle at top right, rgba(139,92,246,.18), transparent 35%),
        linear-gradient(135deg, #101827, #0b1220);
    border: 1px solid #1b2738;
    border-radius: 22px;
    padding: 28px;
    margin-bottom: 22px;
    box-shadow: 0 18px 45px rgba(0,0,0,.25);
}

.sd-eyebrow {
    color: #8b5cf6;
    font-size: 11px;
    font-weight: 800;
    text-transform: uppercase;
    letter-spacing: 1.5px;
    margin-bottom: 8px;
}

.sd-hero h1 {
    color: #f8fafc;
    font-size: 30px;
    font-weight: 800;
    margin: 0 0 8px;
}

.sd-hero p {
    color: #8190a5;
    margin: 0;
}

.sd-hero-bottom {
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 20px;
    margin-top: 22px;
}

.sd-meta {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
}

.sd-chip {
    display: inline-flex;
    align-items: center;
    gap: 7px;
    background: #0d1521;
    border: 1px solid #1b2738;
    border-radius: 999px;
    padding: 8px 12px;
    color: #aebbd0;
    font-size: 12px;
}

.sd-chip i {
    color: #8b5cf6;
}

.sd-open-btn {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    text-decoration: none;
    color: white;
    background: linear-gradient(135deg, #8b5cf6, #6d28d9);
    padding: 11px 17px;
    border-radius: 11px;
    font-size: 13px;
    font-weight: 700;
    box-shadow: 0 8px 20px rgba(139,92,246,.2);
}

.sd-open-btn:hover {
    color: white;
    transform: translateY(-1px);
}

/* =========================================================
   STAT CARDS
========================================================= */

.sd-stats {
    display: grid;
    grid-template-columns: repeat(5, minmax(0, 1fr));
    gap: 14px;
    margin-bottom: 22px;
}

.sd-stat {
    background: linear-gradient(145deg, #0f1825, #0b121d);
    border: 1px solid #1b2738;
    border-radius: 16px;
    padding: 18px;
}

.sd-stat-top {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.sd-stat-icon {
    width: 38px;
    height: 38px;
    border-radius: 11px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: rgba(139,92,246,.12);
    color: #a78bfa;
}

.sd-stat-label {
    margin-top: 13px;
    color: #718096;
    font-size: 11px;
    text-transform: uppercase;
    letter-spacing: .8px;
    font-weight: 700;
}

.sd-stat-value {
    margin-top: 4px;
    color: #f8fafc;
    font-size: 23px;
    font-weight: 800;
}

/* =========================================================
   GRID
========================================================= */

.sd-grid {
    display: grid;
    grid-template-columns: minmax(0, 1.4fr) minmax(320px, .8fr);
    gap: 18px;
    margin-bottom: 18px;
}

.sd-card {
    background: linear-gradient(145deg, #0f1825, #0b121d);
    border: 1px solid #1b2738;
    border-radius: 18px;
    overflow: hidden;
}

.sd-card-header {
    padding: 18px 20px;
    border-bottom: 1px solid #1b2738;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.sd-card-title {
    color: #f8fafc;
    font-size: 15px;
    font-weight: 800;
    margin: 0;
}

.sd-card-subtitle {
    color: #64748b;
    font-size: 11px;
    margin-top: 3px;
}

.sd-card-body {
    padding: 18px 20px;
}

/* =========================================================
   ATTENDANCE
========================================================= */

.sd-attendance-main {
    display: flex;
    align-items: center;
    gap: 25px;
}

.sd-attendance-circle {
    width: 120px;
    height: 120px;
    flex: 0 0 120px;
    border-radius: 50%;
    background:
        radial-gradient(circle at center, #0d1521 57%, transparent 58%),
        conic-gradient(#8b5cf6 {{ $attendanceRate }}%, #1b2738 0);
    display: flex;
    align-items: center;
    justify-content: center;
}

.sd-attendance-number {
    color: #f8fafc;
    font-size: 25px;
    font-weight: 800;
}

.sd-attendance-stats {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 10px;
    flex: 1;
}

.sd-mini-stat {
    background: #0d1521;
    border: 1px solid #1b2738;
    border-radius: 12px;
    padding: 13px;
}

.sd-mini-stat span {
    display: block;
    color: #64748b;
    font-size: 10px;
    text-transform: uppercase;
    margin-bottom: 4px;
}

.sd-mini-stat strong {
    color: #f8fafc;
    font-size: 18px;
}

/* =========================================================
   SCHEDULE
========================================================= */

.sd-schedule {
    display: flex;
    flex-direction: column;
    gap: 10px;
}

.sd-class {
    display: flex;
    align-items: center;
    gap: 13px;
    padding: 12px;
    background: #0d1521;
    border: 1px solid #1b2738;
    border-radius: 12px;
}

.sd-class-time {
    min-width: 68px;
    color: #a78bfa;
    font-size: 11px;
    font-weight: 800;
}

.sd-class-info {
    min-width: 0;
}

.sd-class-subject {
    color: #e5e7eb;
    font-size: 13px;
    font-weight: 700;
}

.sd-class-teacher {
    color: #64748b;
    font-size: 11px;
    margin-top: 2px;
}

.sd-empty {
    padding: 25px 10px;
    text-align: center;
    color: #64748b;
    font-size: 12px;
}

/* =========================================================
   FEE OVERVIEW
========================================================= */

.sd-fee-grid {
    display: grid;
    grid-template-columns: minmax(0, 1.4fr) minmax(280px, .8fr);
    gap: 18px;
    margin-bottom: 18px;
}

.sd-fee-main {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 12px;
}

.sd-fee-box {
    background: #0d1521;
    border: 1px solid #1b2738;
    border-radius: 13px;
    padding: 15px;
}

.sd-fee-box-label {
    color: #64748b;
    font-size: 10px;
    text-transform: uppercase;
    letter-spacing: .7px;
    margin-bottom: 6px;
}

.sd-fee-box-value {
    color: #f8fafc;
    font-size: 19px;
    font-weight: 800;
}

.sd-fee-box.pending {
    border-color: rgba(248,113,113,.25);
    background: rgba(248,113,113,.045);
}

.sd-fee-box.pending .sd-fee-box-value {
    color: #f87171;
}

.sd-fee-box.paid {
    border-color: rgba(52,211,153,.22);
    background: rgba(52,211,153,.04);
}

.sd-fee-box.paid .sd-fee-box-value {
    color: #34d399;
}

.sd-fee-box.due {
    border-color: rgba(251,191,36,.22);
    background: rgba(251,191,36,.04);
}

.sd-fee-box.due .sd-fee-box-value {
    color: #fbbf24;
}

.sd-fee-side {
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    gap: 13px;
}

.sd-fee-alert {
    padding: 15px;
    border-radius: 13px;
    border: 1px solid rgba(248,113,113,.22);
    background: rgba(248,113,113,.045);
}

.sd-fee-alert.success {
    border-color: rgba(52,211,153,.22);
    background: rgba(52,211,153,.04);
}

.sd-fee-alert-title {
    display: flex;
    align-items: center;
    gap: 8px;
    color: #f87171;
    font-size: 12px;
    font-weight: 800;
}

.sd-fee-alert.success .sd-fee-alert-title {
    color: #34d399;
}

.sd-fee-alert-text {
    color: #718096;
    font-size: 11px;
    line-height: 1.6;
    margin-top: 6px;
}

.sd-fee-btn {
    display: inline-flex;
    justify-content: center;
    align-items: center;
    gap: 8px;
    width: 100%;
    text-decoration: none;
    color: white !important;
    background: linear-gradient(135deg, #8b5cf6, #6d28d9);
    border-radius: 10px;
    padding: 11px 14px;
    font-size: 12px;
    font-weight: 700;
}

.sd-fee-btn:hover {
    color: white !important;
    transform: translateY(-1px);
}

.sd-fee-history {
    display: grid;
    gap: 9px;
    margin-top: 15px;
}

.sd-fee-history-row {
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 12px;
    background: #0d1521;
    border: 1px solid #1b2738;
    border-radius: 11px;
    padding: 11px 13px;
}

.sd-fee-history-month {
    color: #e5e7eb;
    font-size: 12px;
    font-weight: 700;
}

.sd-fee-history-due {
    color: #64748b;
    font-size: 10px;
    margin-top: 3px;
}

.sd-fee-history-amount {
    text-align: right;
}

.sd-fee-history-amount strong {
    display: block;
    color: #f87171;
    font-size: 12px;
}

.sd-fee-history-amount span {
    color: #64748b;
    font-size: 9px;
}

.sd-fee-paid-label {
    color: #34d399 !important;
}

/* =========================================================
   LOWER GRID
========================================================= */

.sd-lower-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 18px;
}

.sd-subject-list {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 10px;
}

.sd-subject {
    background: #0d1521;
    border: 1px solid #1b2738;
    border-radius: 12px;
    padding: 13px;
}

.sd-subject-name {
    color: #e5e7eb;
    font-size: 12px;
    font-weight: 700;
}

.sd-subject-meta {
    color: #64748b;
    font-size: 10px;
    margin-top: 5px;
}

/* =========================================================
   SNAPSHOT
========================================================= */

.sd-snapshot {
    display: grid;
    gap: 10px;
}

.sd-snapshot-row {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background: #0d1521;
    border: 1px solid #1b2738;
    border-radius: 12px;
    padding: 12px 14px;
}

.sd-snapshot-row span {
    color: #718096;
    font-size: 11px;
}

.sd-snapshot-row strong {
    color: #f8fafc;
    font-size: 12px;
}

/* =========================================================
   QUICK LINKS
========================================================= */

.sd-actions {
    display: grid;
    gap: 9px;
}

.sd-action {
    display: flex;
    align-items: center;
    gap: 11px;
    text-decoration: none;
    color: #b7c2d3;
    background: #0d1521;
    border: 1px solid #1b2738;
    border-radius: 11px;
    padding: 12px 13px;
    font-size: 12px;
    font-weight: 600;
    transition: .2s ease;
}

.sd-action:hover {
    color: #fff;
    border-color: #8b5cf6;
    background: #111b2b;
    transform: translateX(2px);
}

.sd-action > i:first-child {
    color: #8b5cf6;
}

.sd-action .muted {
    color: #475569;
}

/* =========================================================
   NOTICE
========================================================= */

.sd-notice {
    margin-top: 18px;
    background: linear-gradient(
        135deg,
        rgba(34,211,238,.07),
        rgba(139,92,246,.08)
    );
    border: 1px solid #1b2738;
    border-radius: 16px;
    padding: 16px;
    display: flex;
    align-items: flex-start;
    gap: 12px;
}

.sd-notice-icon {
    width: 35px;
    height: 35px;
    flex: 0 0 35px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 10px;
    background: rgba(34,211,238,.1);
    color: #22d3ee;
}

.sd-notice strong {
    display: block;
    color: #e5e7eb;
    font-size: 12px;
    margin-bottom: 3px;
}

.sd-notice span {
    color: #64748b;
    font-size: 11px;
}

/* =========================================================
   RESPONSIVE
========================================================= */

@media (max-width: 1200px) {

    .sd-stats {
        grid-template-columns: repeat(3, 1fr);
    }

}

@media (max-width: 900px) {

    .sd-grid,
    .sd-lower-grid,
    .sd-fee-grid {
        grid-template-columns: 1fr;
    }

    .sd-hero-bottom {
        align-items: flex-start;
        flex-direction: column;
    }

}

@media (max-width: 650px) {

    .sd-stats {
        grid-template-columns: repeat(2, 1fr);
    }

    .sd-hero {
        padding: 20px;
    }

    .sd-hero h1 {
        font-size: 24px;
    }

    .sd-attendance-main {
        flex-direction: column;
        align-items: stretch;
    }

    .sd-attendance-circle {
        margin: auto;
    }

    .sd-attendance-stats {
        grid-template-columns: 1fr;
    }

    .sd-subject-list,
    .sd-fee-main {
        grid-template-columns: 1fr;
    }

}

@media (max-width: 430px) {

    .sd-stats {
        grid-template-columns: 1fr;
    }

}

</style>


<div class="sd">

    {{-- =====================================================
         HERO
    ====================================================== --}}

    <div class="sd-hero">

        <div class="sd-eyebrow">
            Personal academic cockpit
        </div>

        <h1>
            Welcome,
            {{ $student->first_name }}
            👋
        </h1>

        <p>
            Track your attendance, classes, subjects, fees and academic progress
            from one place.
        </p>

        <div class="sd-hero-bottom">

            <div class="sd-meta">

                <div class="sd-chip">
                    <i class="bi bi-person-badge-fill"></i>
                    {{ $student->student_code }}
                </div>

                <div class="sd-chip">
                    <i class="bi bi-mortarboard-fill"></i>
                    {{ $student->academyClass->name ?? 'Class not assigned' }}
                </div>

                <div class="sd-chip">
                    <i class="bi bi-people-fill"></i>
                    {{ $student->group->name ?? 'Group not assigned' }}
                </div>

                <div class="sd-chip">
                    <i class="bi bi-calendar3"></i>
                    {{ now()->format('d M Y') }}
                </div>

            </div>

            <a
                href="{{ route('student.timetable') }}"
                class="sd-open-btn"
            >
                <i class="bi bi-calendar3"></i>
                Open Timetable
            </a>

        </div>

    </div>


    {{-- =====================================================
         STAT CARDS
    ====================================================== --}}

    <div class="sd-stats">

        <div class="sd-stat">

            <div class="sd-stat-top">

                <div>
                    <div class="sd-stat-label">
                        Attendance
                    </div>

                    <div class="sd-stat-value">
                        {{ $attendanceRate }}%
                    </div>
                </div>

                <div class="sd-stat-icon">
                    <i class="bi bi-bar-chart-fill"></i>
                </div>

            </div>

        </div>


        <div class="sd-stat">

            <div class="sd-stat-top">

                <div>
                    <div class="sd-stat-label">
                        My Subjects
                    </div>

                    <div class="sd-stat-value">
                        {{ $subjects->count() }}
                    </div>
                </div>

                <div class="sd-stat-icon">
                    <i class="bi bi-book-fill"></i>
                </div>

            </div>

        </div>


        <div class="sd-stat">

            <div class="sd-stat-top">

                <div>
                    <div class="sd-stat-label">
                        Today's Classes
                    </div>

                    <div class="sd-stat-value">
                        {{ $todaySchedules->count() }}
                    </div>
                </div>

                <div class="sd-stat-icon">
                    <i class="bi bi-calendar-day-fill"></i>
                </div>

            </div>

        </div>


        <div class="sd-stat">

            <div class="sd-stat-top">

                <div>
                    <div class="sd-stat-label">
                        Attendance Records
                    </div>

                    <div class="sd-stat-value">
                        {{ $attendanceTotal }}
                    </div>
                </div>

                <div class="sd-stat-icon">
                    <i class="bi bi-clipboard2-check-fill"></i>
                </div>

            </div>

        </div>


        {{-- NEW: PENDING FEE STAT --}}

        <div class="sd-stat">

            <div class="sd-stat-top">

                <div>

                    <div class="sd-stat-label">
                        Pending Fee
                    </div>

                    <div class="sd-stat-value"
                         style="
                            color:
                            {{ $totalPendingFee > 0
                                ? '#f87171'
                                : '#34d399'
                            }};
                         ">

                        Rs.
                        {{ number_format(
                            (float) $totalPendingFee,
                            0
                        ) }}

                    </div>

                </div>

                <div class="sd-stat-icon"
                     style="
                        background:
                        {{ $totalPendingFee > 0
                            ? 'rgba(248,113,113,.10)'
                            : 'rgba(52,211,153,.10)'
                        }};
                        color:
                        {{ $totalPendingFee > 0
                            ? '#f87171'
                            : '#34d399'
                        }};
                     ">

                    <i class="bi bi-cash-stack"></i>

                </div>

            </div>

        </div>

    </div>


    {{-- =====================================================
         ATTENDANCE + TODAY'S SCHEDULE
    ====================================================== --}}

    <div class="sd-grid">

        {{-- Attendance --}}

        <div class="sd-card">

            <div class="sd-card-header">

                <div>
                    <div class="sd-card-title">
                        Attendance Overview
                    </div>

                    <div class="sd-card-subtitle">
                        Your attendance performance
                    </div>
                </div>

                <i class="bi bi-activity"
                   style="color:#8b5cf6;"></i>

            </div>

            <div class="sd-card-body">

                <div class="sd-attendance-main">

                    <div class="sd-attendance-circle">

                        <div class="sd-attendance-number">
                            {{ $attendanceRate }}%
                        </div>

                    </div>

                    <div class="sd-attendance-stats">

                        <div class="sd-mini-stat">

                            <span>
                                Present
                            </span>

                            <strong>
                                {{ $attendancePresent }}
                            </strong>

                        </div>

                        <div class="sd-mini-stat">

                            <span>
                                Absent
                            </span>

                            <strong>
                                {{ $attendanceAbsent }}
                            </strong>

                        </div>

                        <div class="sd-mini-stat">

                            <span>
                                Leave
                            </span>

                            <strong>
                                {{ $attendanceLeave }}
                            </strong>

                        </div>

                    </div>

                </div>

            </div>

        </div>


        {{-- Today's Schedule --}}

        <div class="sd-card">

            <div class="sd-card-header">

                <div>
                    <div class="sd-card-title">
                        Today's Schedule
                    </div>

                    <div class="sd-card-subtitle">
                        {{ now()->format('l, d M Y') }}
                    </div>
                </div>

                <i class="bi bi-clock-history"
                   style="color:#22d3ee;"></i>

            </div>

            <div class="sd-card-body">

                @if($todaySchedules->count())

                    <div class="sd-schedule">

                        @foreach($todaySchedules as $schedule)

                            <div class="sd-class">

                                <div class="sd-class-time">

                                    {{ \Carbon\Carbon::parse($schedule->start_time)->format('h:i A') }}

                                    <br>

                                    {{ \Carbon\Carbon::parse($schedule->end_time)->format('h:i A') }}

                                </div>

                                <div class="sd-class-info">

                                    <div class="sd-class-subject">

                                        {{ $schedule->teacherAssignment->subject->name ?? 'Subject' }}

                                    </div>

                                    <div class="sd-class-teacher">

                                        {{ $schedule->teacherAssignment->teacher->name ?? 'Teacher' }}

                                    </div>

                                </div>

                            </div>

                        @endforeach

                    </div>

                @else

                    <div class="sd-empty">

                        <i class="bi bi-calendar-x d-block mb-2"
                           style="font-size:24px;"></i>

                        No classes scheduled for today.

                    </div>

                @endif

            </div>

        </div>

    </div>


    {{-- =====================================================
         FEE OVERVIEW
    ====================================================== --}}

    <div class="sd-card mb-3">

        <div class="sd-card-header">

            <div>

                <div class="sd-card-title">
                    Fee Overview
                </div>

                <div class="sd-card-subtitle">
                    Your current fee status and outstanding balance
                </div>

            </div>

            <i class="bi bi-wallet2"
               style="color:#34d399;"></i>

        </div>


        <div class="sd-card-body">

            @if($currentFee)

                <div class="sd-fee-grid">

                    {{-- LEFT SIDE --}}

                    <div>

                        <div class="sd-fee-main">

                            {{-- Total --}}

                            <div class="sd-fee-box">

                                <div class="sd-fee-box-label">
                                    Total Fee
                                </div>

                                <div class="sd-fee-box-value">

                                    Rs.
                                    {{ number_format(
                                        (float) $currentFee->total_amount,
                                        0
                                    ) }}

                                </div>

                            </div>


                            {{-- Paid --}}

                            <div class="sd-fee-box paid">

                                <div class="sd-fee-box-label">
                                    Paid
                                </div>

                                <div class="sd-fee-box-value">

                                    Rs.
                                    {{ number_format(
                                        (float) $currentFee->paid_amount,
                                        0
                                    ) }}

                                </div>

                            </div>


                            {{-- Pending --}}

                            <div class="sd-fee-box pending">

                                <div class="sd-fee-box-label">
                                    Pending
                                </div>

                                <div class="sd-fee-box-value">

                                    Rs.
                                    {{ number_format(
                                        (float) $currentFee->remaining_amount,
                                        0
                                    ) }}

                                </div>

                            </div>


                            {{-- Due Date --}}

                            <div class="sd-fee-box due">

                                <div class="sd-fee-box-label">
                                    Due Date
                                </div>

                                <div class="sd-fee-box-value">

                                    @if($currentFee->due_date)

                                        {{ $currentFee->due_date->format('d M Y') }}

                                    @else

                                        Not Set

                                    @endif

                                </div>

                            </div>

                        </div>

                    </div>


                    {{-- RIGHT SIDE --}}

                    <div class="sd-fee-side">

                        @php

                            $feeStatus = $currentFee->status;

                            $isOverdue =
                                $currentFee->due_date &&
                                $currentFee->due_date->isPast() &&
                                $currentFee->remaining_amount > 0;

                        @endphp


                        @if($currentFee->remaining_amount <= 0)

                            <div class="sd-fee-alert success">

                                <div class="sd-fee-alert-title">

                                    <i class="bi bi-check-circle-fill"></i>

                                    Fee Fully Paid

                                </div>

                                <div class="sd-fee-alert-text">

                                    Your fee for

                                    {{ \Carbon\Carbon::createFromFormat(
                                        'Y-m',
                                        $currentFee->fee_month
                                    )->format('F Y') }}

                                    has been completely paid.

                                </div>

                            </div>

                        @elseif($isOverdue || $feeStatus === 'overdue')

                            <div class="sd-fee-alert">

                                <div class="sd-fee-alert-title">

                                    <i class="bi bi-exclamation-triangle-fill"></i>

                                    Fee Overdue

                                </div>

                                <div class="sd-fee-alert-text">

                                    Your fee is overdue.

                                    Please contact the academy office
                                    regarding the pending amount.

                                </div>

                            </div>

                        @elseif($feeStatus === 'partial')

                            <div class="sd-fee-alert">

                                <div class="sd-fee-alert-title">

                                    <i class="bi bi-hourglass-split"></i>

                                    Partial Payment

                                </div>

                                <div class="sd-fee-alert-text">

                                    A partial payment has been received.

                                    Remaining balance:

                                    <strong style="color:#f87171;">

                                        Rs.
                                        {{ number_format(
                                            (float) $currentFee->remaining_amount,
                                            0
                                        ) }}

                                    </strong>

                                </div>

                            </div>

                        @else

                            <div class="sd-fee-alert">

                                <div class="sd-fee-alert-title">

                                    <i class="bi bi-exclamation-circle-fill"></i>

                                    Fee Pending

                                </div>

                                <div class="sd-fee-alert-text">

                                    Your fee for

                                    {{ \Carbon\Carbon::createFromFormat(
                                        'Y-m',
                                        $currentFee->fee_month
                                    )->format('F Y') }}

                                    is currently pending.

                                </div>

                            </div>

                        @endif


                        <a
                            href="{{ route('student.fees') }}"
                            class="sd-fee-btn"
                        >

                            <i class="bi bi-eye"></i>

                            View Fee Details

                        </a>

                    </div>

                </div>


                {{-- PENDING FEE HISTORY --}}

                @if($pendingFees->count())

                    <div
                        style="
                            color:#f8fafc;
                            font-size:13px;
                            font-weight:800;
                            margin-top:8px;
                        "
                    >
                        Pending Fee History
                    </div>


                    <div class="sd-fee-history">

                        @foreach($pendingFees->take(5) as $fee)

                            <div class="sd-fee-history-row">

                                <div>

                                    <div class="sd-fee-history-month">

                                        {{ \Carbon\Carbon::createFromFormat(
                                            'Y-m',
                                            $fee->fee_month
                                        )->format('F Y') }}

                                    </div>

                                    <div class="sd-fee-history-due">

                                        Due:

                                        @if($fee->due_date)

                                            {{ $fee->due_date->format('d M Y') }}

                                        @else

                                            Not Set

                                        @endif

                                    </div>

                                </div>


                                <div class="sd-fee-history-amount">

                                    <strong>

                                        Rs.
                                        {{ number_format(
                                            (float) $fee->remaining_amount,
                                            0
                                        ) }}

                                    </strong>

                                    <span>
                                        {{ ucfirst($fee->status) }}
                                    </span>

                                </div>

                            </div>

                        @endforeach

                    </div>

                @endif

            @else

                <div class="sd-empty">

                    <i
                        class="bi bi-wallet2 d-block mb-2"
                        style="font-size:28px;"
                    ></i>

                    No fee record has been generated yet.

                </div>

            @endif

        </div>

    </div>


    {{-- =====================================================
         SUBJECTS + ACADEMIC SNAPSHOT
    ====================================================== --}}

    <div class="sd-lower-grid">

        {{-- Subjects --}}

        <div class="sd-card">

            <div class="sd-card-header">

                <div>

                    <div class="sd-card-title">
                        My Subjects
                    </div>

                    <div class="sd-card-subtitle">
                        Subjects assigned to your class/group
                    </div>

                </div>

                <i class="bi bi-journal-bookmark-fill"
                   style="color:#8b5cf6;"></i>

            </div>


            <div class="sd-card-body">

                @if($subjects->count())

                    <div class="sd-subject-list">

                        @foreach($subjects as $subject)

                            <div class="sd-subject">

                                <div class="sd-subject-name">

                                    {{ $subject->name }}

                                </div>

                                <div class="sd-subject-meta">

                                    Academic subject

                                </div>

                            </div>

                        @endforeach

                    </div>

                @else

                    <div class="sd-empty">
                        No subjects assigned yet.
                    </div>

                @endif

            </div>

        </div>


        {{-- Academic Snapshot --}}

        <div class="sd-card">

            <div class="sd-card-header">

                <div>

                    <div class="sd-card-title">
                        Academic Snapshot
                    </div>

                    <div class="sd-card-subtitle">
                        Your current student information
                    </div>

                </div>

                <i class="bi bi-person-lines-fill"
                   style="color:#22d3ee;"></i>

            </div>


            <div class="sd-card-body">

                <div class="sd-snapshot">

                    <div class="sd-snapshot-row">

                        <span>
                            Student
                        </span>

                        <strong>
                            {{ $student->first_name }}
                            {{ $student->last_name }}
                        </strong>

                    </div>


                    <div class="sd-snapshot-row">

                        <span>
                            Father Name
                        </span>

                        <strong>
                            {{ $student->father_name }}
                        </strong>

                    </div>


                    <div class="sd-snapshot-row">

                        <span>
                            Class
                        </span>

                        <strong>
                            {{ $student->academyClass->name ?? 'Not assigned' }}
                        </strong>

                    </div>


                    <div class="sd-snapshot-row">

                        <span>
                            Group
                        </span>

                        <strong>
                            {{ $student->group->name ?? 'Not assigned' }}
                        </strong>

                    </div>

                </div>

            </div>

        </div>

    </div>


    {{-- =====================================================
         QUICK LINKS
    ====================================================== --}}

    <div class="sd-card mt-3">

        <div class="sd-card-header">

            <div>

                <div class="sd-card-title">
                    Quick Links
                </div>

                <div class="sd-card-subtitle">
                    Quickly access your student portal
                </div>

            </div>

            <i class="bi bi-grid-fill"
               style="color:#8b5cf6;"></i>

        </div>


        <div class="sd-card-body">

            <div class="sd-actions">

                {{-- Timetable --}}

                <a
                    class="sd-action"
                    href="{{ route('student.timetable') }}"
                >
                    <i class="bi bi-calendar3"></i>

                    My timetable

                    <i class="bi bi-chevron-right ms-auto muted"></i>
                </a>


                {{-- Attendance --}}

                <a
                    class="sd-action"
                    href="{{ route('student.attendance') }}"
                >
                    <i class="bi bi-clipboard2-check-fill"></i>

                    Attendance overview

                    <i class="bi bi-chevron-right ms-auto muted"></i>
                </a>


                {{-- Subjects --}}

                <a
                    class="sd-action"
                    href="{{ route('student.subjects') }}"
                >
                    <i class="bi bi-book-fill"></i>

                    My subjects

                    <i class="bi bi-chevron-right ms-auto muted"></i>
                </a>


                {{-- Results --}}

                <a
                    class="sd-action"
                    href="{{ route('student.results') }}"
                >
                    <i class="bi bi-award-fill"></i>

                    My results

                    <i class="bi bi-chevron-right ms-auto muted"></i>
                </a>


                {{-- Fees --}}

                @if($currentFee)

                    <a
                        class="sd-action"
                        href="{{ route('student.fees') }}"
                    >

                        <i
                            class="bi bi-wallet2"
                            style="color:#34d399;"
                        ></i>

                        My fee details

                        @if($totalPendingFee > 0)

                            <span
                                style="
                                    margin-left:auto;
                                    color:#f87171;
                                    font-size:11px;
                                    font-weight:800;
                                "
                            >
                                Rs.
                                {{ number_format(
                                    (float) $totalPendingFee,
                                    0
                                ) }}
                                pending
                            </span>

                        @else

                            <span
                                style="
                                    margin-left:auto;
                                    color:#34d399;
                                    font-size:11px;
                                    font-weight:800;
                                "
                            >
                                Paid
                            </span>

                        @endif

                        <i class="bi bi-chevron-right muted"></i>

                    </a>

                @endif

            </div>

        </div>

    </div>


    {{-- =====================================================
         ACADEMY NOTICE
    ====================================================== --}}

    <div class="sd-notice">

        <div class="sd-notice-icon">
            <i class="bi bi-info-circle-fill"></i>
        </div>

        <div>

            <strong>
                Academy Notices
            </strong>

            <span>
                Keep checking your timetable, attendance, fees and results
                regularly for the latest academic updates.
            </span>

        </div>

    </div>

</div>

@endsection