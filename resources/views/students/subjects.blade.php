
@extends('layouts.app')

@section('title', 'My Subjects')

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

main,
.app-content,
.content,
.container-fluid {
    background: #080b12 !important;
}

.student-subjects-page {
    min-height: 100vh;
    width: 100%;
    background: #080b12 !important;
    color: #e5e7eb;
    padding: 30px;
    box-sizing: border-box;
}
.student-subjects-page {
    color: #dbe4f2;
    padding-bottom: 30px;
}

.student-subjects-page * {
    box-sizing: border-box;
}

.ss-muted {
    color: #718096;
}

/* Header */
.ss-hero {
    display: flex;
    justify-content: space-between;
    align-items: flex-end;
    gap: 18px;
    margin-bottom: 20px;
}

.ss-kicker {
    font-size: 10px;
    letter-spacing: 1.6px;
    text-transform: uppercase;
    color: #a78bfa;
    font-weight: 900;
}

.ss-title {
    font-size: 27px;
    line-height: 1.15;
    font-weight: 850;
    color: #f8fafc;
    margin: 4px 0;
}

.ss-sub {
    font-size: 12px;
    color: #728197;
    margin: 0;
}

/* Button */
.ss-btn {
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

.ss-btn:hover {
    color: #fff;
    transform: translateY(-3px);
    border-color: #465777;
    box-shadow: 0 10px 24px rgba(0,0,0,.25);
}

.ss-btn.primary {
    background: linear-gradient(135deg,#5b21b6,#8b5cf6);
    border-color: #7c3aed;
    color: #fff;
}

/* Subject Card */
.ss-card {
    position: relative;
    overflow: hidden;
    background: linear-gradient(145deg,#111b2a,#0d1521);
    border: 1px solid #223149;
    border-radius: 15px;
    padding: 17px;
    min-height: 155px;
    box-shadow: 0 12px 30px rgba(0,0,0,.12);
    transition:
        transform .25s ease,
        border-color .25s ease,
        box-shadow .25s ease;
}

.ss-card::after {
    content: "";
    position: absolute;
    width: 100px;
    height: 100px;
    right: -45px;
    top: -45px;
    border-radius: 50%;
    background: rgba(139,92,246,.07);
    transition: .3s ease;
}

.ss-card:hover {
    transform: translateY(-6px);
    border-color: rgba(139,92,246,.55);
    box-shadow:
        0 16px 38px rgba(0,0,0,.32),
        0 0 22px rgba(139,92,246,.12);
}

.ss-card:hover::after {
    transform: scale(1.4);
}

.ss-icon {
    width: 42px;
    height: 42px;
    border-radius: 12px;
    background: #211d3b;
    color: #a78bfa;
    display: grid;
    place-items: center;
    font-size: 17px;
    margin-bottom: 14px;
}

.ss-name {
    font-size: 13px;
    color: #eef3fb;
    font-weight: 850;
    margin-bottom: 5px;
}

.ss-info {
    color: #687890;
    font-size: 9px;
    line-height: 1.6;
}

.ss-status {
    display: inline-flex;
    padding: 4px 8px;
    border-radius: 999px;
    background: rgba(34,197,94,.10);
    color: #86efac;
    font-size: 8px;
    font-weight: 900;
    margin-top: 12px;
}

/* Panel */
.ss-panel {
    background: linear-gradient(145deg,#111b2a,#0d1521);
    border: 1px solid #223149;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 12px 30px rgba(0,0,0,.12);
}

.ss-head {
    padding: 14px 16px;
    border-bottom: 1px solid #1d2a3c;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.ss-head h3 {
    font-size: 12px;
    color: #eef3fb;
    font-weight: 850;
    margin: 0;
}

.ss-head p {
    font-size: 9px;
    color: #687890;
    margin: 3px 0 0;
}

/* Schedule */
.ss-schedule {
    display: flex;
    gap: 12px;
    padding: 11px 0;
    border-bottom: 1px solid #1b283a;
    transition: .2s ease;
}

.ss-schedule:last-child {
    border-bottom: 0;
}

.ss-schedule:hover {
    padding-left: 5px;
}

.ss-time {
    width: 70px;
    flex-shrink: 0;
    color: #8fa0b7;
    font-size: 9px;
    font-weight: 850;
}

.ss-dot {
    width: 7px;
    height: 7px;
    flex-shrink: 0;
    border-radius: 50%;
    background: #a78bfa;
    margin-top: 4px;
    box-shadow: 0 0 8px rgba(167,139,250,.7);
}

.ss-schedule-title {
    font-size: 10px;
    color: #dbe4f2;
    font-weight: 800;
}

.ss-schedule-sub {
    font-size: 9px;
    color: #687890;
    margin-top: 2px;
}

.ss-empty {
    text-align: center;
    color: #65758c;
    font-size: 10px;
    padding: 30px 0;
}

/* Mobile */
@media(max-width:767px) {

    .ss-hero {
        align-items: flex-start;
    }

    .ss-title {
        font-size: 22px;
    }

    .ss-hero .ss-btn {
        display: none;
    }
}
</style>

<div class="student-subjects-page">

    {{-- HEADER --}}
    <div class="ss-hero">

        <div>

            <div class="ss-kicker">
                Personal academic cockpit
            </div>

            <h1 class="ss-title">
                My Subjects
            </h1>

            <p class="ss-sub">
                {{ $student->academyClass->name ?? 'Class not assigned' }}
                ·
                {{ $student->group->name ?? 'Group not assigned' }}
                ·
                {{ $subjects->count() }} active subjects
            </p>

        </div>

        <a
            href="{{ route('student.timetable') }}"
            class="ss-btn primary"
        >
            <i class="bi bi-calendar-week"></i>
            Open timetable
        </a>

    </div>


    {{-- SUBJECT COUNT --}}
    <div class="row g-3 mb-3">

        <div class="col-6 col-md-4">

            <div class="ss-card" style="min-height:105px;">

                <div class="d-flex justify-content-between align-items-start">

                    <span class="ss-name">
                        Total Subjects
                    </span>

                    <span class="ss-icon" style="margin:0;">
                        <i class="bi bi-book-half"></i>
                    </span>

                </div>

                <div style="
                    font-size:23px;
                    font-weight:900;
                    color:#f8fafc;
                    margin-top:10px;
                ">
                    {{ $subjects->count() }}
                </div>

            </div>

        </div>

    </div>


    {{-- SUBJECTS --}}
    <div class="ss-panel mb-3">

        <div class="ss-head">

            <div>

                <h3>
                    My subjects
                </h3>

                <p>
                    Subjects connected to your current class and group
                </p>

            </div>

            <span class="ss-status" style="margin:0;">
                {{ $subjects->count() }} Active
            </span>

        </div>


        <div style="padding:15px;">

            @if($subjects->count())

                <div class="row g-3">

                    @foreach($subjects as $subject)

                        <div class="col-md-6 col-xl-4">

                            <div class="ss-card">

                                <div class="ss-icon">
                                    <i class="bi bi-book"></i>
                                </div>

                                <div class="ss-name">
                                    {{ $subject->name }}
                                </div>

                                <div class="ss-info">
                                    <i class="bi bi-check-circle me-1"></i>
                                    Currently assigned to your timetable
                                </div>

                                <div class="ss-status">
                                    Active
                                </div>

                            </div>

                        </div>

                    @endforeach

                </div>

            @else

                <div class="ss-empty">

                    <i
                        class="bi bi-book"
                        style="font-size:25px;"
                    ></i>

                    <div class="mt-2">
                        No subjects assigned yet.
                    </div>

                </div>

            @endif

        </div>

    </div>


    {{-- CLASS SCHEDULE --}}
    <div class="ss-panel">

        <div class="ss-head">

            <div>

                <h3>
                    Subject schedule
                </h3>

                <p>
                    Classes related to your subjects
                </p>

            </div>

        </div>

        <div style="padding:15px;">

            @forelse($schedules as $schedule)

                @php
                    $assignment = $schedule->teacherAssignment;
                @endphp

                <div class="ss-schedule">

                    <div class="ss-time">

                        {{ ucfirst($schedule->day) }}

                        <div style="margin-top:3px;">
                            {{ \Carbon\Carbon::parse($schedule->start_time)->format('h:i A') }}
                        </div>

                    </div>

                    <div class="ss-dot"></div>

                    <div class="flex-grow-1">

                        <div class="ss-schedule-title">

                            {{ $assignment->subject->name ?? 'Subject' }}

                        </div>

                        <div class="ss-schedule-sub">

                            {{ $assignment->teacher->first_name ?? 'Teacher' }}
                            {{ $assignment->teacher->last_name ?? '' }}

                            ·

                            {{ $schedule->room ?: 'Room —' }}

                        </div>

                    </div>

                </div>

            @empty

                <div class="ss-empty">
                    No subject schedule available.
                </div>

            @endforelse

        </div>

    </div>

</div>

@endsection
