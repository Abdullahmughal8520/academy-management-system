@extends('layouts.app')

@section('title', 'Schedules')

@section('content')

<style>
    /* =========================================================
       SCHEDULES PAGE — DARK ADMIN THEME
       ========================================================= */

    body:has(.schedules-page) .main-wrapper,
    body:has(.schedules-page) .page-content {
        background: #080e17 !important;
    }

    body:has(.schedules-page) .page-content {
        padding: 22px 24px 0 24px !important;
        min-height: calc(100vh - 76px) !important;
    }

    .schedules-page {
        width: 100%;
        color: #edf3fb;
    }


    /* =========================================================
       PAGE HEADER
       ========================================================= */

    .schedule-page-header {
        margin-bottom: 20px;
    }

    .schedule-page-header h1 {
        font-size: 27px;
        line-height: 1.15;
        font-weight: 850;
        color: #f8fafc;
        margin: 4px 0;
        letter-spacing: -.3px;
    }

    .schedule-page-header p {
        color: #718096;
        font-size: 11px;
        margin: 0;
    }


    /* =========================================================
       ADD BUTTON
       ========================================================= */

    .add-schedule-btn {
        position: relative;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 6px;

        overflow: hidden;

        background: linear-gradient(
            135deg,
            #6848e8,
            #8b5cf6
        );

        color: #fff !important;

        border: 1px solid rgba(167,139,250,.45);

        padding: 10px 15px;

        border-radius: 10px;

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

    .add-schedule-btn::before {
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

    .add-schedule-btn:hover {
        color: #fff !important;

        transform: translateY(-3px);

        border-color: rgba(196,181,253,.75);

        box-shadow:
            0 12px 30px rgba(124,58,237,.32),
            0 0 20px rgba(139,92,246,.12);
    }

    .add-schedule-btn:hover::before {
        left: 140%;
    }

    .add-schedule-btn i {
        transition: transform .25s ease;
    }

    .add-schedule-btn:hover i {
        transform: rotate(90deg) scale(1.08);
    }


    /* =========================================================
       SUCCESS ALERT
       ========================================================= */

    .success-alert {
        background: rgba(34,197,94,.08) !important;

        color: #86efac !important;

        border: 1px solid rgba(34,197,94,.18) !important;

        border-radius: 10px;

        padding: 10px 13px;

        font-size: 10px;

        margin-bottom: 16px;

        box-shadow:
            0 8px 20px rgba(0,0,0,.10);
    }

    .success-alert i {
        color: #22c55e;
    }


    /* =========================================================
       TABLE CARD
       ========================================================= */

    .schedule-table-card {
        background: linear-gradient(
            145deg,
            #111b2a,
            #0d1521
        ) !important;

        border: 1px solid #223149 !important;

        border-radius: 15px;

        box-shadow:
            0 12px 30px rgba(0,0,0,.12);

        overflow: hidden;
    }


    /* =========================================================
       TABLE HEADER
       ========================================================= */

    .schedule-table-header {
        padding: 14px 16px;

        border-bottom: 1px solid #1e2b3e;

        display: flex;

        align-items: center;

        justify-content: space-between;
    }

    .schedule-table-title {
        font-size: 12px;

        font-weight: 850;

        color: #eef3fb;

        margin: 0;
    }

    .schedule-table-subtitle {
        color: #687890;

        font-size: 9px;

        margin: 3px 0 0;
    }


    /* =========================================================
       TABLE
       ========================================================= */

    .schedule-table {
        width: 100%;

        margin: 0;

        min-width: 1050px;

        --bs-table-bg: transparent !important;
        --bs-table-color: #cbd5e1 !important;
        --bs-table-border-color: #1a2637 !important;
        --bs-table-hover-bg: rgba(139,92,246,.035) !important;
        --bs-table-hover-color: #dbe4f2 !important;
    }

    .schedule-table > :not(caption) > * > * {
        background-color: transparent !important;

        color: #cbd5e1 !important;

        border-bottom-color: #1a2637 !important;

        box-shadow: none !important;
    }


    /* =========================================================
       TABLE HEAD
       ========================================================= */

    .schedule-table thead th {
        background: #0d1725 !important;

        color: #607089 !important;

        border-bottom: 1px solid #1e2b3e !important;

        border-top: none !important;

        font-size: 8px;

        font-weight: 900;

        text-transform: uppercase;

        letter-spacing: .65px;

        padding: 11px 12px;

        white-space: nowrap;
    }


    /* =========================================================
       TABLE BODY
       ========================================================= */

    .schedule-table tbody td {
        background: transparent !important;

        color: #cbd5e1 !important;

        font-size: 10px;

        padding: 11px 12px;

        border-color: #1a2637 !important;

        white-space: nowrap;
    }

    .schedule-table tbody tr {
        transition:
            background .2s ease;
    }

    .schedule-table tbody tr:hover {
        background: rgba(139,92,246,.035) !important;
    }

    .schedule-table tbody tr:hover td {
        color: #dbe4f2 !important;
    }


    /* =========================================================
       ID
       ========================================================= */

    .schedule-id {
        color: #64758c !important;

        font-weight: 850;

        font-size: 9px;
    }


    /* =========================================================
       TEACHER
       ========================================================= */

    .teacher-name {
        color: #dbe4f2 !important;

        font-weight: 800;

        font-size: 10px;
    }


    /* =========================================================
       SUBJECT
       ========================================================= */

    .subject-name {
        color: #a78bfa !important;

        font-weight: 800;

        font-size: 10px;
    }


    /* =========================================================
       DAY BADGE
       ========================================================= */

    .day-badge {
        display: inline-flex;

        align-items: center;

        padding: 4px 7px;

        border-radius: 7px;

        background: #162237 !important;

        border: 1px solid #27364b;

        color: #a78bfa !important;

        font-size: 8px;

        font-weight: 900;
    }

    .day-badge i {
        color: #22d3ee;

        font-size: 9px;
    }


    /* =========================================================
       STATUS
       ========================================================= */

    .status-badge {
        display: inline-flex;

        align-items: center;

        gap: 5px;

        padding: 4px 7px;

        border-radius: 7px;

        font-size: 8px;

        font-weight: 900;
    }

    .status-active {
        background: rgba(34,197,94,.09) !important;

        color: #86efac !important;

        border: 1px solid rgba(34,197,94,.16);
    }

    .status-active i {
        color: #22c55e;
    }

    .status-inactive {
        background: #16202e !important;

        color: #718096 !important;

        border: 1px solid #26364b;
    }

    .status-inactive i {
        color: #64748b;
    }


    /* =========================================================
       TIME
       ========================================================= */

    .time-text {
        color: #cbd5e1 !important;

        font-weight: 800;

        font-size: 9px;
    }


    /* =========================================================
       ROOM
       ========================================================= */

    .room-text {
        color: #718096 !important;

        font-size: 9px;
    }

    .room-text i {
        color: #22d3ee;
    }


    /* =========================================================
       ACTION BUTTONS
       ========================================================= */

    .action-buttons {
        display: flex;

        align-items: center;

        gap: 6px;
    }


    /* EDIT */

    .edit-btn {
        display: inline-flex;

        align-items: center;

        justify-content: center;

        background: rgba(245,158,11,.08) !important;

        color: #fbbf24 !important;

        border: 1px solid rgba(245,158,11,.20) !important;

        padding: 6px 9px;

        border-radius: 7px;

        font-size: 9px;

        font-weight: 850;

        text-decoration: none;

        transition:
            transform .2s ease,
            background .2s ease,
            border-color .2s ease;
    }

    .edit-btn:hover {
        background: rgba(245,158,11,.14) !important;

        color: #fcd34d !important;

        border-color: rgba(245,158,11,.35) !important;

        transform: translateY(-2px);
    }


    /* DELETE */

    .delete-btn {
        display: inline-flex;

        align-items: center;

        justify-content: center;

        background: rgba(244,63,94,.08) !important;

        color: #fb7185 !important;

        border: 1px solid rgba(244,63,94,.20) !important;

        padding: 6px 9px;

        border-radius: 7px;

        font-size: 9px;

        font-weight: 850;

        transition:
            transform .2s ease,
            background .2s ease,
            border-color .2s ease;

        cursor: pointer;
    }

    .delete-btn:hover {
        background: rgba(244,63,94,.14) !important;

        color: #fda4af !important;

        border-color: rgba(244,63,94,.38) !important;

        transform: translateY(-2px);
    }


    /* =========================================================
       EMPTY STATE
       ========================================================= */

    .empty-state {
        padding: 55px 20px;

        text-align: center;
    }

    .empty-icon {
        width: 48px;

        height: 48px;

        margin: 0 auto 12px;

        border-radius: 12px;

        display: flex;

        align-items: center;

        justify-content: center;

        background: #172237 !important;

        border: 1px solid #27364b;

        color: #a78bfa !important;

        font-size: 20px;

        box-shadow:
            0 0 18px rgba(139,92,246,.08);
    }

    .empty-state h6 {
        color: #dbe4f2 !important;

        font-size: 13px;

        font-weight: 850;

        margin-bottom: 4px;
    }

    .empty-state p {
        color: #64758c !important;

        font-size: 9px;

        margin: 0;
    }


    /* =========================================================
       DELETE MODAL — COMMON COMPONENT DARK OVERRIDE
       ========================================================= */

    body:has(.schedules-page) .delete-modal-overlay {
        background: rgba(4,8,15,.78) !important;

        backdrop-filter: blur(6px) !important;

        -webkit-backdrop-filter: blur(6px) !important;
    }

    body:has(.schedules-page) .delete-modal {
        background: linear-gradient(
            145deg,
            #111b2a,
            #0d1521
        ) !important;

        border: 1px solid #223149 !important;

        border-radius: 15px !important;

        box-shadow:
            0 25px 60px rgba(0,0,0,.45),
            0 0 35px rgba(139,92,246,.07) !important;

        color: #edf3fb !important;
    }

    body:has(.schedules-page) .delete-modal::before {
        background: linear-gradient(
            90deg,
            transparent,
            rgba(244,63,94,.65),
            rgba(139,92,246,.45),
            transparent
        ) !important;
    }

    body:has(.schedules-page) .delete-modal-icon {
        background: rgba(244,63,94,.10) !important;

        border: 1px solid rgba(244,63,94,.20) !important;

        color: #fb7185 !important;

        box-shadow:
            0 0 22px rgba(244,63,94,.08) !important;
    }

    body:has(.schedules-page) .delete-modal h3 {
        color: #f8fafc !important;

        font-size: 16px !important;

        font-weight: 850 !important;
    }

    body:has(.schedules-page) .delete-modal p {
        color: #718096 !important;

        font-size: 10px !important;
    }

    body:has(.schedules-page) .modal-cancel-btn {
        background: #0d1725 !important;

        color: #718096 !important;

        border: 1px solid #26364d !important;
    }

    body:has(.schedules-page) .modal-cancel-btn:hover {
        background: #111c2c !important;

        color: #dbe4f2 !important;

        border-color: #3a4c65 !important;
    }

    body:has(.schedules-page) .modal-delete-btn {
        background: linear-gradient(
            135deg,
            #be123c,
            #f43f5e
        ) !important;

        color: #fff !important;

        border: 1px solid rgba(251,113,133,.35) !important;

        box-shadow:
            0 7px 18px rgba(244,63,94,.18) !important;
    }


    /* =========================================================
       MOBILE
       ========================================================= */

    @media (max-width: 767px) {

        body:has(.schedules-page) .page-content {
            padding: 20px 15px !important;
        }

        .schedule-page-header {
            align-items: flex-start !important;

            gap: 15px;
        }

        .schedule-page-header h1 {
            font-size: 22px;
        }

        .schedule-page-header p {
            font-size: 10px;
        }

        .add-schedule-btn {
            padding: 9px 11px;

            font-size: 9px;

            white-space: nowrap;
        }

        .schedule-table-header {
            padding: 14px;
        }

        .schedule-table-title {
            font-size: 11px;
        }

        .schedule-table-subtitle {
            font-size: 8px;
        }
    }
</style>


<div class="schedules-page">


    {{-- PAGE HEADER --}}

    <div class="schedule-page-header d-flex justify-content-between align-items-center">

        <div>

            <h1>
                Schedules
            </h1>

            <p>
                Manage academy class schedules and teaching sessions.
            </p>

        </div>


        <a
            href="{{ url('/schedules/create') }}"
            class="add-schedule-btn"
        >
            <i class="bi bi-plus-lg me-1"></i>
            Add Schedule
        </a>

    </div>


    {{-- SUCCESS MESSAGE --}}

    @if (session('success'))

        <div class="success-alert">

            <i class="bi bi-check-circle-fill me-1"></i>

            {{ session('success') }}

        </div>

    @endif


    {{-- SCHEDULE TABLE --}}

    <div class="schedule-table-card">


        {{-- TABLE HEADER --}}

        <div class="schedule-table-header">

            <div>

                <h5 class="schedule-table-title">
                    Academy Schedules
                </h5>

                <p class="schedule-table-subtitle">
                    View and manage all scheduled classes.
                </p>

            </div>

        </div>


        <div class="table-responsive">

            <table class="table schedule-table align-middle">

                <thead>

                    <tr>
                        <th>#</th>
                        <th>Teacher</th>
                        <th>Subject</th>
                        <th>Class</th>
                        <th>Group</th>
                        <th>Day</th>
                        <th>Time</th>
                        <th>Room</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>

                </thead>


                <tbody>

                    @forelse ($schedules as $schedule)

                        @php
                            $assignment = $schedule->teacherAssignment;
                        @endphp


                        <tr>


                            {{-- ID --}}

                            <td>
                                <span class="schedule-id">
                                    {{ $schedule->id }}
                                </span>
                            </td>


                            {{-- TEACHER --}}

                            <td>

                                <span class="teacher-name">

                                    {{ $assignment?->teacher?->first_name ?? '-' }}

                                    {{ $assignment?->teacher?->last_name ?? '' }}

                                </span>

                            </td>


                            {{-- SUBJECT --}}

                            <td>

                                <span class="subject-name">
                                    {{ $assignment?->subject?->name ?? '-' }}
                                </span>

                            </td>


                            {{-- CLASS --}}

                            <td>
                                {{ $assignment?->academyClass?->name ?? '-' }}
                            </td>


                            {{-- GROUP --}}

                            <td>
                                {{ $assignment?->group?->name ?? '-' }}
                            </td>


                            {{-- DAY --}}

                            <td>

                                <span class="day-badge">

                                    <i class="bi bi-calendar3 me-1"></i>

                                    {{ $schedule->day }}

                                </span>

                            </td>


                            {{-- TIME --}}

                            <td>

                                <span class="time-text">

                                    {{ \Carbon\Carbon::parse($schedule->start_time)->format('h:i A') }}

                                    -

                                    {{ \Carbon\Carbon::parse($schedule->end_time)->format('h:i A') }}

                                </span>

                            </td>


                            {{-- ROOM --}}

                            <td>

                                <span class="room-text">

                                    @if ($schedule->room)

                                        <i class="bi bi-door-open me-1"></i>

                                        {{ $schedule->room }}

                                    @else

                                        -

                                    @endif

                                </span>

                            </td>


                            {{-- STATUS --}}

                            <td>

                                @if ($schedule->status === 'active')

                                    <span class="status-badge status-active">

                                        <i class="bi bi-check-circle-fill"></i>

                                        Active

                                    </span>

                                @else

                                    <span class="status-badge status-inactive">

                                        <i class="bi bi-dash-circle-fill"></i>

                                        Inactive

                                    </span>

                                @endif

                            </td>


                            {{-- ACTIONS --}}

                            <td>

                                <div class="action-buttons">


                                    <a
                                        href="{{ url('/schedules/' . $schedule->id . '/edit') }}"
                                        class="edit-btn"
                                    >
                                        <i class="bi bi-pencil-fill me-1"></i>
                                        Edit
                                    </a>


                                    <form
                                        action="{{ route('schedules.destroy', $schedule) }}"
                                        method="POST"
                                        class="d-inline delete-form"
                                    >

                                        @csrf

                                        @method('DELETE')

                                        <button
                                            type="button"
                                            class="delete-btn delete-trigger"
                                        >
                                            <i class="bi bi-trash3-fill me-1"></i>
                                            Delete
                                        </button>

                                    </form>


                                </div>

                            </td>

                        </tr>


                    @empty

                        <tr>

                            <td colspan="10">

                                <div class="empty-state">

                                    <div class="empty-icon">
                                        <i class="bi bi-calendar-x"></i>
                                    </div>

                                    <h6>
                                        No schedules found
                                    </h6>

                                    <p>
                                        Create your first schedule to start managing academy classes.
                                    </p>

                                </div>

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>


    {{-- DELETE MODAL --}}

    @include('components.delete-modal')

</div>

@endsection