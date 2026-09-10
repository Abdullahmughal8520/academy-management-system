@extends('layouts.app')

@section('title', 'Add Schedule')

@section('content')

<style>
    /* =========================================================
       ADD SCHEDULE — DARK ADMIN THEME
       ========================================================= */

    body:has(.add-schedule-page) .main-wrapper,
    body:has(.add-schedule-page) .page-content {
        background: #080e17 !important;
    }

    body:has(.add-schedule-page) .page-content {
        padding: 22px 24px 0 24px !important;
        min-height: calc(100vh - 76px) !important;
    }

    .add-schedule-page {
        width: 100%;
        color: #edf3fb;
    }


    /* =========================================================
       PAGE HEADER
       ========================================================= */

    .form-page-header {
        margin-bottom: 20px;
    }

    .form-page-header h1 {
        font-size: 27px;
        line-height: 1.15;
        font-weight: 850;
        color: #f8fafc;
        margin: 4px 0;
        letter-spacing: -.3px;
    }

    .form-page-header p {
        color: #718096;
        font-size: 11px;
        margin: 0;
    }


    /* =========================================================
       BACK BUTTON
       ========================================================= */

    .back-btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 5px;

        background: #0d1725 !important;

        color: #718096 !important;

        border: 1px solid #26364d !important;

        padding: 9px 13px;

        border-radius: 9px;

        font-size: 10px;

        font-weight: 850;

        text-decoration: none;

        transition:
            transform .2s ease,
            background .2s ease,
            border-color .2s ease,
            color .2s ease;
    }

    .back-btn:hover {
        color: #dbe4f2 !important;

        background: #111c2c !important;

        border-color: #3a4c65 !important;

        transform: translateY(-2px);
    }

    .back-btn i {
        transition: transform .2s ease;
    }

    .back-btn:hover i {
        transform: translateX(-3px);
    }


    /* =========================================================
       VALIDATION ERROR
       ========================================================= */

    .add-schedule-page .alert-danger {
        background: rgba(244,63,94,.08) !important;

        color: #fda4af !important;

        border: 1px solid rgba(244,63,94,.20) !important;

        border-radius: 10px !important;

        padding: 11px 14px !important;

        font-size: 10px;

        box-shadow:
            0 8px 20px rgba(0,0,0,.12) !important;
    }

    .add-schedule-page .alert-danger strong {
        color: #f8fafc;
    }

    .add-schedule-page .alert-danger ul {
        color: #fb7185;
    }


    /* =========================================================
       FORM CARD
       ========================================================= */

    .schedule-form-card {
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


    /* =========================================================
       FORM SECTION
       ========================================================= */

    .form-section {
        padding: 22px;

        border-bottom: 1px solid #1e2b3e;
    }

    .form-section:last-child {
        border-bottom: none;
    }


    /* =========================================================
       SECTION HEADING
       ========================================================= */

    .section-heading {
        display: flex;

        align-items: center;

        gap: 11px;

        margin-bottom: 20px;
    }

    .section-icon {
        width: 40px;
        height: 40px;

        border-radius: 11px;

        display: flex;

        align-items: center;

        justify-content: center;

        background: #172237 !important;

        border: 1px solid #27364b;

        color: #a78bfa !important;

        font-size: 16px;

        box-shadow:
            0 0 16px rgba(139,92,246,.07);
    }

    .section-icon i {
        filter:
            drop-shadow(
                0 0 5px rgba(167,139,250,.45)
            );
    }

    .section-title {
        font-size: 12px;

        font-weight: 850;

        color: #eef3fb !important;

        margin: 0;
    }

    .section-subtitle {
        color: #687890 !important;

        font-size: 9px;

        margin: 3px 0 0;
    }


    /* =========================================================
       LABELS
       ========================================================= */

    .form-label {
        color: #cbd5e1 !important;

        font-size: 10px;

        font-weight: 850;

        margin-bottom: 7px;
    }

    .required-star {
        color: #fb7185 !important;
    }


    /* =========================================================
       INPUTS / SELECTS
       ========================================================= */

    .add-schedule-page .form-control,
    .add-schedule-page .form-select {

        min-height: 42px;

        font-size: 10px;

        color: #dbe4f2 !important;

        background-color: #0d1725 !important;

        border: 1px solid #26364d !important;

        border-radius: 9px !important;

        box-shadow: none !important;

        transition:
            border-color .2s ease,
            box-shadow .2s ease,
            background .2s ease;
    }


    .add-schedule-page .form-control:hover,
    .add-schedule-page .form-select:hover {
        border-color: #344760 !important;

        background-color: #101b2b !important;
    }


    .add-schedule-page .form-control:focus,
    .add-schedule-page .form-select:focus {

        color: #edf3fb !important;

        background-color: #0f1a2a !important;

        border-color: rgba(139,92,246,.65) !important;

        box-shadow:
            0 0 0 .18rem rgba(139,92,246,.10) !important;

        outline: none !important;
    }


    .add-schedule-page .form-control::placeholder {
        color: #536278 !important;
    }


    /* SELECT OPTIONS */

    .add-schedule-page .form-select option {
        background: #0f1826;

        color: #dbe4f2;
    }


    /* TIME INPUT ICON */

    .add-schedule-page input[type="time"]::-webkit-calendar-picker-indicator {
        filter: invert(75%) sepia(15%) saturate(500%) hue-rotate(185deg);

        cursor: pointer;
    }


    /* =========================================================
       FORM HINT
       ========================================================= */

    .form-hint {
        color: #596a82 !important;

        font-size: 8.5px;

        margin-top: 5px;
    }


    /* =========================================================
       INFO BOX
       ========================================================= */

    .info-box {
        background: rgba(139,92,246,.07) !important;

        border: 1px solid rgba(139,92,246,.16) !important;

        border-radius: 10px;

        padding: 11px 13px;

        color: #9f8df2 !important;

        font-size: 9px;

        line-height: 1.5;
    }

    .info-box i {
        color: #a78bfa;
    }


    /* =========================================================
       FORM FOOTER
       ========================================================= */

    .form-footer {
        padding: 16px 22px;

        background: #0b1420 !important;

        border-top: 1px solid #1e2b3e !important;

        display: flex;

        justify-content: flex-end;

        gap: 8px;
    }


    /* =========================================================
       CANCEL BUTTON
       ========================================================= */

    .cancel-btn {
        display: inline-flex;

        align-items: center;

        justify-content: center;

        background: #0d1725 !important;

        color: #718096 !important;

        border: 1px solid #26364d !important;

        padding: 9px 14px;

        border-radius: 9px;

        font-size: 10px;

        font-weight: 850;

        text-decoration: none;

        transition:
            transform .2s ease,
            background .2s ease,
            border-color .2s ease,
            color .2s ease;
    }

    .cancel-btn:hover {
        color: #dbe4f2 !important;

        background: #111c2c !important;

        border-color: #3a4c65 !important;

        transform: translateY(-2px);
    }


    /* =========================================================
       SUBMIT BUTTON
       ========================================================= */

    .submit-btn {
        position: relative;

        display: inline-flex;

        align-items: center;

        justify-content: center;

        gap: 5px;

        overflow: hidden;

        background: linear-gradient(
            135deg,
            #6848e8,
            #8b5cf6
        ) !important;

        color: #fff !important;

        border: 1px solid rgba(167,139,250,.45) !important;

        padding: 9px 15px;

        border-radius: 9px;

        font-size: 10px;

        font-weight: 850;

        box-shadow:
            0 8px 20px rgba(124,58,237,.20);

        transition:
            transform .25s ease,
            box-shadow .25s ease,
            border-color .25s ease;
    }


    .submit-btn::before {
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


    .submit-btn:hover {
        color: #fff !important;

        transform: translateY(-3px);

        border-color: rgba(196,181,253,.75) !important;

        box-shadow:
            0 12px 28px rgba(124,58,237,.32),
            0 0 18px rgba(139,92,246,.10);
    }


    .submit-btn:hover::before {
        left: 140%;
    }


    .submit-btn i {
        transition: transform .25s ease;
    }


    .submit-btn:hover i {
        transform: scale(1.08);

        filter:
            drop-shadow(
                0 0 5px rgba(255,255,255,.50)
            );
    }


    /* =========================================================
       MOBILE
       ========================================================= */

    @media (max-width: 767px) {

        body:has(.add-schedule-page) .page-content {
            padding: 20px 15px !important;
        }

        .form-page-header {
            align-items: flex-start !important;

            gap: 15px;
        }

        .form-page-header h1 {
            font-size: 22px;
        }

        .form-page-header p {
            font-size: 10px;
        }

        .back-btn {
            padding: 8px 10px;

            font-size: 9px;

            white-space: nowrap;
        }

        .form-section {
            padding: 18px;
        }

        .section-heading {
            margin-bottom: 17px;
        }

        .section-icon {
            width: 37px;
            height: 37px;

            font-size: 15px;
        }

        .section-title {
            font-size: 11px;
        }

        .section-subtitle {
            font-size: 8px;
        }

        .form-footer {
            padding: 15px 18px;
        }

        .cancel-btn,
        .submit-btn {
            padding: 9px 11px;

            font-size: 9px;
        }

    }
</style>


<div class="add-schedule-page">


    {{-- PAGE HEADER --}}

    <div class="form-page-header d-flex justify-content-between align-items-center">

        <div>

            <h1>
                Add Schedule
            </h1>

            <p>
                Create a new schedule for an assigned teacher.
            </p>

        </div>


        <a
            href="{{ url('/schedules') }}"
            class="back-btn"
        >
            <i class="bi bi-arrow-left me-1"></i>
            Back to Schedules
        </a>

    </div>


    {{-- VALIDATION ERRORS --}}

    @if ($errors->any())

        <div class="alert alert-danger border-0 shadow-sm mb-4">

            <strong>
                Please fix the following errors:
            </strong>

            <ul class="mb-0 mt-2">

                @foreach ($errors->all() as $error)

                    <li>
                        {{ $error }}
                    </li>

                @endforeach

            </ul>

        </div>

    @endif


    {{-- SCHEDULE FORM --}}

    <div class="schedule-form-card">


        <form
            action="{{ url('/schedules') }}"
            method="POST"
        >

            @csrf


            {{-- ASSIGNMENT INFORMATION --}}

            <div class="form-section">

                <div class="section-heading">

                    <div class="section-icon">
                        <i class="bi bi-person-workspace"></i>
                    </div>

                    <div>

                        <h5 class="section-title">
                            Assignment Information
                        </h5>

                        <p class="section-subtitle">
                            Select the teacher assignment for this schedule
                        </p>

                    </div>

                </div>


                <div class="row g-3">


                    {{-- TEACHER ASSIGNMENT --}}

                    <div class="col-md-12">

                        <label class="form-label">

                            Teacher Assignment

                            <span class="required-star">
                                *
                            </span>

                        </label>


                        <select
                            name="teacher_assignment_id"
                            class="form-select"
                            required
                        >

                            <option value="">
                                Select Teacher Assignment
                            </option>


                            @foreach ($assignments as $assignment)

                                <option
                                    value="{{ $assignment->id }}"
                                    {{ old('teacher_assignment_id') == $assignment->id ? 'selected' : '' }}
                                >

                                    {{ $assignment->teacher->first_name ?? '' }}
                                    {{ $assignment->teacher->last_name ?? '' }}

                                    -

                                    {{ $assignment->subject->name ?? 'Subject' }}

                                    -

                                    {{ $assignment->academyClass->name ?? 'Class' }}

                                    -

                                    {{ $assignment->group->name ?? 'Group' }}

                                </option>

                            @endforeach

                        </select>


                        <div class="form-hint">

                            Choose the teacher, subject, class and group
                            combination for this schedule.

                        </div>

                    </div>

                </div>

            </div>


            {{-- TIMING & LOCATION --}}

            <div class="form-section">

                <div class="section-heading">

                    <div class="section-icon">
                        <i class="bi bi-calendar-week"></i>
                    </div>

                    <div>

                        <h5 class="section-title">
                            Timing & Location
                        </h5>

                        <p class="section-subtitle">
                            Set when and where the class will take place
                        </p>

                    </div>

                </div>


                <div class="row g-3">


                    {{-- DAY --}}

                    <div class="col-md-6">

                        <label class="form-label">

                            Day

                            <span class="required-star">
                                *
                            </span>

                        </label>


                        <select
                            name="day"
                            class="form-select"
                            required
                        >

                            <option value="">
                                Select Day
                            </option>


                            @foreach ([
                                'Monday',
                                'Tuesday',
                                'Wednesday',
                                'Thursday',
                                'Friday',
                                'Saturday',
                                'Sunday'
                            ] as $day)

                                <option
                                    value="{{ $day }}"
                                    {{ old('day') == $day ? 'selected' : '' }}
                                >
                                    {{ $day }}
                                </option>

                            @endforeach

                        </select>

                    </div>


                    {{-- ROOM --}}

                    <div class="col-md-6">

                        <label class="form-label">
                            Room
                        </label>


                        <input
                            type="text"
                            name="room"
                            class="form-control"
                            value="{{ old('room') }}"
                            placeholder="e.g. Room 101"
                        >


                        <div class="form-hint">
                            Enter the classroom or room number.
                        </div>

                    </div>


                    {{-- START TIME --}}

                    <div class="col-md-6">

                        <label class="form-label">

                            Start Time

                            <span class="required-star">
                                *
                            </span>

                        </label>


                        <input
                            type="time"
                            name="start_time"
                            class="form-control"
                            value="{{ old('start_time') }}"
                            required
                        >

                    </div>


                    {{-- END TIME --}}

                    <div class="col-md-6">

                        <label class="form-label">

                            End Time

                            <span class="required-star">
                                *
                            </span>

                        </label>


                        <input
                            type="time"
                            name="end_time"
                            class="form-control"
                            value="{{ old('end_time') }}"
                            required
                        >

                    </div>

                </div>


                {{-- INFO BOX --}}

                <div class="info-box mt-3">

                    <i class="bi bi-info-circle-fill me-1"></i>

                    Make sure the selected teacher assignment, day and timing
                    match the academy's class schedule.

                </div>

            </div>


            {{-- FOOTER --}}

            <div class="form-footer">

                <a
                    href="{{ url('/schedules') }}"
                    class="cancel-btn"
                >
                    Cancel
                </a>


                <button
                    type="submit"
                    class="submit-btn"
                >

                    <i class="bi bi-calendar-plus-fill me-1"></i>

                    Add Schedule

                </button>

            </div>

        </form>

    </div>

</div>

@endsection