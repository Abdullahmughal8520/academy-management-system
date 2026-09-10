@extends('layouts.app')

@section('title', 'My Assignments')

@section('content')

<style>
    /* ================================
       MY ASSIGNMENTS — DARK THEME
       ================================ */

    .teacher-page {
        color: #dbe4f2;
        width: 100%;
    }

    /* Full right-side dark background */
    body:has(.teacher-page) .main-wrapper,
    body:has(.teacher-page) .page-content {
        background: #080e17 !important;
    }

    body:has(.teacher-page) .page-content {
        padding: 22px 24px 0 24px !important;
        min-height: calc(100vh - 76px) !important;
    }

    /* ================================
       PAGE HEADER
       ================================ */

    .teacher-page .page-header {
        background: linear-gradient(145deg, #111b2a, #0d1521);
        border: 1px solid #223149;
        border-radius: 15px;
        padding: 20px 22px;
        color: #edf3fb;
        margin-bottom: 18px;
        box-shadow: 0 12px 30px rgba(0,0,0,.16);
        position: relative;
        overflow: hidden;
    }

    .teacher-page .page-header::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 1px;
        background: linear-gradient(
            90deg,
            transparent,
            rgba(139,92,246,.65),
            rgba(34,211,238,.45),
            transparent
        );
    }

    .teacher-page .page-header::after {
        content: "";
        position: absolute;
        width: 120px;
        height: 120px;
        border-radius: 50%;
        right: -60px;
        top: -65px;
        background: rgba(139,92,246,.06);
        pointer-events: none;
    }

    .teacher-page .page-title {
        font-size: 22px;
        line-height: 1.2;
        font-weight: 850;
        color: #f8fafc;
        margin-bottom: 5px;
        letter-spacing: -.2px;
    }

    .teacher-page .page-subtitle {
        font-size: 10px;
        color: #64758c;
        margin: 0;
        letter-spacing: .2px;
    }

    /* ================================
       BACK BUTTON
       ================================ */

    .teacher-page .back-button {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 7px;
        background: #0d1725;
        color: #aab7ca;
        border: 1px solid #26364d;
        padding: 9px 13px;
        border-radius: 9px;
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
    }

    .teacher-page .back-button:hover {
        background: #151f31;
        color: #f8fafc;
        border-color: rgba(139,92,246,.55);
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(0,0,0,.25);
    }

    .teacher-page .back-button i {
        color: #a78bfa;
        transition: transform .22s ease;
    }

    .teacher-page .back-button:hover i {
        transform: translateX(-3px);
        filter: drop-shadow(0 0 5px rgba(167,139,250,.65));
    }

    /* ================================
       ASSIGNMENT CARD
       ================================ */

    .teacher-page .assignment-card {
        height: 100%;
        background: linear-gradient(145deg, #111b2a, #0d1521);
        border: 1px solid #223149;
        border-radius: 15px;
        box-shadow: 0 12px 30px rgba(0,0,0,.12);
        overflow: hidden;
        transition:
            transform .25s ease,
            border-color .25s ease,
            box-shadow .25s ease,
            background .25s ease;
        position: relative;
    }

    .teacher-page .assignment-card::after {
        content: "";
        position: absolute;
        width: 85px;
        height: 85px;
        border-radius: 50%;
        right: -45px;
        top: -45px;
        background: rgba(139,92,246,.055);
        transition: transform .35s ease, background .35s ease;
        pointer-events: none;
    }

    .teacher-page .assignment-card:hover {
        transform: translateY(-5px);
        border-color: rgba(139,92,246,.55);
        background: linear-gradient(145deg, #141f32, #0e1725);
        box-shadow:
            0 16px 35px rgba(0,0,0,.30),
            0 0 22px rgba(139,92,246,.10);
    }

    .teacher-page .assignment-card:hover::after {
        transform: scale(1.35);
        background: rgba(139,92,246,.11);
    }

    /* ================================
       CARD HEADER
       ================================ */

    .teacher-page .assignment-header {
        padding: 16px 17px;
        border-bottom: 1px solid #1e2b3e;
        display: flex;
        align-items: center;
        gap: 11px;
        position: relative;
        z-index: 1;
    }

    .teacher-page .assignment-icon {
        width: 40px;
        height: 40px;
        border-radius: 11px;
        display: grid;
        place-items: center;
        background: #172237;
        border: 1px solid rgba(139,92,246,.12);
        color: #a78bfa;
        font-size: 16px;
        flex-shrink: 0;
        transition:
            transform .25s ease,
            background .25s ease,
            color .25s ease,
            box-shadow .25s ease;
    }

    .teacher-page .assignment-card:hover .assignment-icon {
        transform: scale(1.08) rotate(-2deg);
        background: rgba(139,92,246,.13);
        color: #c4b5fd;
        box-shadow:
            0 0 18px rgba(139,92,246,.22),
            inset 0 0 12px rgba(139,92,246,.05);
    }

    .teacher-page .assignment-icon i {
        filter: drop-shadow(0 0 5px rgba(167,139,250,.55));
        transition: transform .25s ease, filter .25s ease;
    }

    .teacher-page .assignment-card:hover .assignment-icon i {
        transform: scale(1.08);
        filter:
            drop-shadow(0 0 5px rgba(167,139,250,.85))
            drop-shadow(0 0 10px rgba(139,92,246,.40));
    }

    .teacher-page .assignment-number {
        color: #64758c;
        font-size: 8px;
        font-weight: 900;
        text-transform: uppercase;
        letter-spacing: .8px;
        margin-bottom: 3px;
    }

    .teacher-page .assignment-subject {
        color: #edf3fb;
        font-size: 13px;
        font-weight: 850;
    }

    /* ================================
       CARD BODY
       ================================ */

    .teacher-page .assignment-body {
        padding: 13px 17px 15px;
        position: relative;
        z-index: 1;
    }

    .teacher-page .assignment-row {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 15px;
        padding: 10px 0;
        border-bottom: 1px solid #1a2637;
    }

    .teacher-page .assignment-row:last-child {
        border-bottom: none;
    }

    .teacher-page .assignment-label {
        color: #64758c;
        font-size: 8px;
        font-weight: 900;
        text-transform: uppercase;
        letter-spacing: .65px;
    }

    .teacher-page .assignment-value {
        color: #cbd5e1;
        font-size: 9px;
        font-weight: 700;
        text-align: right;
    }

    /* ================================
       BADGES
       ================================ */

    .teacher-page .class-badge,
    .teacher-page .group-badge,
    .teacher-page .subject-code {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        padding: 5px 8px;
        border-radius: 7px;
        font-size: 8px;
        font-weight: 850;
        white-space: nowrap;
    }

    .teacher-page .class-badge {
        background: rgba(34,211,238,.08);
        color: #7dd3fc;
        border: 1px solid rgba(34,211,238,.12);
    }

    .teacher-page .group-badge {
        background: rgba(139,92,246,.09);
        color: #c4b5fd;
        border: 1px solid rgba(139,92,246,.13);
    }

    .teacher-page .subject-code {
        background: rgba(34,197,94,.08);
        color: #86efac;
        border: 1px solid rgba(34,197,94,.12);
    }

    .teacher-page .class-badge i,
    .teacher-page .group-badge i,
    .teacher-page .subject-code i {
        font-size: 9px;
    }

    .teacher-page .text-muted {
        color: #56667c !important;
    }

    /* ================================
       EMPTY STATE
       ================================ */

    .teacher-page .empty-state {
        background: linear-gradient(145deg, #111b2a, #0d1521);
        border: 1px solid #223149;
        border-radius: 15px;
        padding: 55px 20px;
        text-align: center;
        box-shadow: 0 12px 30px rgba(0,0,0,.12);
        position: relative;
        overflow: hidden;
    }

    .teacher-page .empty-state::before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 1px;
        background: linear-gradient(
            90deg,
            transparent,
            rgba(139,92,246,.45),
            transparent
        );
    }

    .teacher-page .empty-icon {
        width: 58px;
        height: 58px;
        margin: 0 auto 15px;
        border-radius: 15px;
        background: #172237;
        border: 1px solid rgba(139,92,246,.12);
        color: #718096;
        display: grid;
        place-items: center;
        font-size: 23px;
        box-shadow: inset 0 0 15px rgba(139,92,246,.035);
    }

    .teacher-page .empty-icon i {
        filter: drop-shadow(0 0 5px rgba(139,92,246,.35));
    }

    .teacher-page .empty-title {
        color: #dbe4f2;
        font-size: 13px;
        font-weight: 850;
        margin-bottom: 5px;
    }

    .teacher-page .empty-text {
        color: #64758c;
        font-size: 9px;
        margin-bottom: 0;
    }

    /* ================================
       RESPONSIVE
       ================================ */

    @media (max-width: 767px) {

        body:has(.teacher-page) .page-content {
            padding: 20px 15px !important;
        }

        .teacher-page .page-header {
            padding: 18px;
            margin-bottom: 15px;
        }

        .teacher-page .page-title {
            font-size: 19px;
        }

        .teacher-page .page-subtitle {
            font-size: 9px;
        }

        .teacher-page .back-button {
            padding: 8px 10px;
            font-size: 9px;
        }

        .teacher-page .assignment-header {
            padding: 15px;
        }

        .teacher-page .assignment-body {
            padding: 12px 15px 14px;
        }

        .teacher-page .assignment-row {
            padding: 9px 0;
        }
    }
</style>


<div class="teacher-page">

    {{-- Page Header --}}
    <div class="page-header">

        <div class="d-flex justify-content-between align-items-center gap-3">

            <div>

                <div class="page-title">
                    My Assignments
                </div>

                <p class="page-subtitle">
                    View the classes, groups and subjects assigned to you.
                </p>

            </div>

            <a href="{{ route('teacher.dashboard') }}" class="back-button">
                <i class="bi bi-arrow-left"></i>
                Dashboard
            </a>

        </div>

    </div>


    {{-- Assignments --}}
    @if($assignments->count())

        <div class="row g-3">

            @foreach($assignments as $assignment)

                <div class="col-md-6 col-xl-4">

                    <div class="assignment-card">

                        {{-- Card Header --}}
                        <div class="assignment-header">

                            <div class="assignment-icon">
                                <i class="bi bi-person-workspace"></i>
                            </div>

                            <div>

                                <div class="assignment-number">
                                    Assignment #{{ $loop->iteration }}
                                </div>

                                <div class="assignment-subject">
                                    {{ $assignment->subject?->name ?? 'Subject Not Assigned' }}
                                </div>

                            </div>

                        </div>


                        {{-- Card Body --}}
                        <div class="assignment-body">

                            {{-- Subject Code --}}
                            <div class="assignment-row">

                                <div class="assignment-label">
                                    Subject Code
                                </div>

                                <div class="assignment-value">

                                    @if($assignment->subject?->code)

                                        <span class="subject-code">
                                            <i class="bi bi-bookmark"></i>
                                            {{ $assignment->subject->code }}
                                        </span>

                                    @else

                                        <span class="text-muted">
                                            -
                                        </span>

                                    @endif

                                </div>

                            </div>


                            {{-- Class --}}
                            <div class="assignment-row">

                                <div class="assignment-label">
                                    Class
                                </div>

                                <div class="assignment-value">

                                    @if($assignment->academyClass)

                                        <span class="class-badge">
                                            <i class="bi bi-building"></i>
                                            {{ $assignment->academyClass->name }}
                                        </span>

                                    @else

                                        <span class="text-muted">
                                            -
                                        </span>

                                    @endif

                                </div>

                            </div>


                            {{-- Group --}}
                            <div class="assignment-row">

                                <div class="assignment-label">
                                    Group
                                </div>

                                <div class="assignment-value">

                                    @if($assignment->group)

                                        <span class="group-badge">
                                            <i class="bi bi-diagram-3"></i>
                                            {{ $assignment->group->name }}
                                        </span>

                                    @else

                                        <span class="text-muted">
                                            All Groups
                                        </span>

                                    @endif

                                </div>

                            </div>


                        </div>

                    </div>

                </div>

            @endforeach

        </div>

    @else

        {{-- Empty State --}}
        <div class="empty-state">

            <div class="empty-icon">
                <i class="bi bi-person-workspace"></i>
            </div>

            <div class="empty-title">
                No Assignments Yet
            </div>

            <p class="empty-text">
                No teaching assignments have been assigned to you yet.
            </p>

        </div>

    @endif

</div>

@endsection