@extends('layouts.app')

@section('title', 'My Profile')

@section('content')

<style>
    /* ================================
       TEACHER PROFILE - DARK THEME
       ================================ */

    body:has(.teacher-profile-page) .main-wrapper,
    body:has(.teacher-profile-page) .page-content {
        background:#080e17 !important;
    }

    body:has(.teacher-profile-page) .page-content {
        padding:22px 24px 0 24px !important;
        min-height:calc(100vh - 76px) !important;
    }

    .teacher-profile-page {
        color:#edf3fb;
    }

    .teacher-profile-page * {
        box-sizing:border-box;
    }

    /* PAGE HEADER */
    .profile-page-header {
        display:flex;
        justify-content:space-between;
        align-items:center;
        gap:18px;
        margin-bottom:20px;
    }

    .profile-kicker {
        font-size:10px;
        letter-spacing:1.7px;
        text-transform:uppercase;
        color:#a78bfa;
        font-weight:900;
    }

    .profile-page-header h1 {
        font-size:27px;
        line-height:1.15;
        font-weight:850;
        margin:4px 0;
        color:#f8fafc;
    }

    .profile-page-header p {
        font-size:12px;
        color:#64758c;
        margin:0;
    }

    /* BACK BUTTON */
    .profile-back-btn {
        display:inline-flex;
        align-items:center;
        gap:7px;
        padding:10px 15px;
        border-radius:10px;
        background:#0d1725;
        border:1px solid #26364d;
        color:#9aa9bc;
        font-size:10px;
        font-weight:850;
        text-decoration:none;
        transition:.25s ease;
    }

    .profile-back-btn:hover {
        color:#fff;
        border-color:#8b5cf6;
        background:#111c2c;
        transform:translateY(-2px);
        box-shadow:0 8px 20px rgba(139,92,246,.12);
    }

    .profile-back-btn i {
        transition:transform .25s ease;
    }

    .profile-back-btn:hover i {
        transform:translateX(-3px);
    }

    /* MAIN PROFILE CARD */
    .profile-card {
        background:linear-gradient(145deg,#111b2a,#0d1521);
        border:1px solid #223149;
        border-radius:15px;
        box-shadow:0 12px 30px rgba(0,0,0,.18);
        overflow:hidden;
    }

    /* CARD HEADER */
    .profile-card-header {
        display:flex;
        align-items:center;
        gap:14px;
        padding:17px 20px;
        border-bottom:1px solid #1e2b3e;
        background:rgba(17,28,44,.45);
    }

    .profile-avatar {
        width:46px;
        height:46px;
        border-radius:13px;
        display:grid;
        place-items:center;
        background:linear-gradient(135deg,#312e81,#7c3aed);
        color:#fff;
        font-size:17px;
        font-weight:900;
        box-shadow:
            0 8px 20px rgba(124,58,237,.18),
            0 0 15px rgba(139,92,246,.10);
    }

    .profile-card-header h3 {
        margin:0;
        color:#f1f5f9;
        font-size:13px;
        font-weight:850;
    }

    .profile-card-header p {
        margin:3px 0 0;
        color:#64758c;
        font-size:9px;
    }

    /* PROFILE BODY */
    .profile-card-body {
        padding:22px;
    }

    .profile-info-box {
        height:100%;
        padding:15px;
        border-radius:11px;
        background:#0d1725;
        border:1px solid #1f2e43;
        transition:
            transform .25s ease,
            border-color .25s ease,
            background .25s ease,
            box-shadow .25s ease;
    }

    .profile-info-box:hover {
        transform:translateY(-3px);
        border-color:rgba(139,92,246,.45);
        background:#101a2a;
        box-shadow:0 10px 25px rgba(0,0,0,.20);
    }

    .profile-info-top {
        display:flex;
        align-items:center;
        gap:9px;
        margin-bottom:8px;
    }

    .profile-info-icon {
        width:29px;
        height:29px;
        border-radius:8px;
        display:grid;
        place-items:center;
        background:#172237;
        color:#a78bfa;
        font-size:11px;
        transition:.25s ease;
    }

    .profile-info-box:hover .profile-info-icon {
        background:rgba(139,92,246,.13);
        color:#c4b5fd;
        transform:scale(1.08);
        box-shadow:0 0 15px rgba(139,92,246,.15);
    }

    .profile-info-label {
        font-size:8px;
        text-transform:uppercase;
        letter-spacing:.75px;
        color:#64758c;
        font-weight:900;
    }

    .profile-info-value {
        font-size:11px;
        font-weight:800;
        color:#dbe4f2;
        margin-left:38px;
        word-break:break-word;
    }

    .profile-info-value.highlight {
        color:#a78bfa;
    }

    .profile-info-value.cyan {
        color:#67e8f9;
    }

    /* RESPONSIVE */
    @media(max-width:767px) {

        body:has(.teacher-profile-page) .page-content {
            padding:20px 15px !important;
        }

        .profile-page-header {
            align-items:flex-start;
        }

        .profile-page-header h1 {
            font-size:22px;
        }

        .profile-page-header p {
            font-size:10px;
        }

        .profile-back-btn {
            padding:9px 11px;
        }

        .profile-card-body {
            padding:15px;
        }

        .profile-card-header {
            padding:15px;
        }
    }
</style>


<div class="teacher-profile-page">

    {{-- PAGE HEADER --}}
    <div class="profile-page-header">

        <div>
            <div class="profile-kicker">
                Teacher Portal
            </div>

            <h1>
                My Profile
            </h1>

            <p>
                View your teacher information.
            </p>
        </div>

        <a href="{{ route('teacher.dashboard') }}" class="profile-back-btn">
            <i class="bi bi-arrow-left"></i>
            Back to Dashboard
        </a>

    </div>


    {{-- PROFILE CARD --}}
    <div class="profile-card">

        {{-- CARD HEADER --}}
        <div class="profile-card-header">

            <div class="profile-avatar">
                <i class="bi bi-person"></i>
            </div>

            <div>
                <h3>
                    Teacher Information
                </h3>

                <p>
                    Your academy profile details
                </p>
            </div>

        </div>


        {{-- CARD BODY --}}
        <div class="profile-card-body">

            <div class="row g-3">

                {{-- TEACHER CODE --}}
                <div class="col-md-6">

                    <div class="profile-info-box">

                        <div class="profile-info-top">

                            <div class="profile-info-icon">
                                <i class="bi bi-person-badge"></i>
                            </div>

                            <div class="profile-info-label">
                                Teacher Code
                            </div>

                        </div>

                        <div class="profile-info-value highlight">
                            {{ $teacher->teacher_code }}
                        </div>

                    </div>

                </div>


                {{-- NAME --}}
                <div class="col-md-6">

                    <div class="profile-info-box">

                        <div class="profile-info-top">

                            <div class="profile-info-icon">
                                <i class="bi bi-person"></i>
                            </div>

                            <div class="profile-info-label">
                                Name
                            </div>

                        </div>

                        <div class="profile-info-value">
                            {{ $teacher->first_name }}
                            {{ $teacher->last_name }}
                        </div>

                    </div>

                </div>


                {{-- PHONE --}}
                <div class="col-md-6">

                    <div class="profile-info-box">

                        <div class="profile-info-top">

                            <div class="profile-info-icon">
                                <i class="bi bi-telephone"></i>
                            </div>

                            <div class="profile-info-label">
                                Phone
                            </div>

                        </div>

                        <div class="profile-info-value cyan">
                            {{ $teacher->phone ?? '-' }}
                        </div>

                    </div>

                </div>


                {{-- EMAIL --}}
                <div class="col-md-6">

                    <div class="profile-info-box">

                        <div class="profile-info-top">

                            <div class="profile-info-icon">
                                <i class="bi bi-envelope"></i>
                            </div>

                            <div class="profile-info-label">
                                Email
                            </div>

                        </div>

                        <div class="profile-info-value">
                            {{ $teacher->email ?? '-' }}
                        </div>

                    </div>

                </div>


                {{-- QUALIFICATION --}}
                <div class="col-md-6">

                    <div class="profile-info-box">

                        <div class="profile-info-top">

                            <div class="profile-info-icon">
                                <i class="bi bi-mortarboard"></i>
                            </div>

                            <div class="profile-info-label">
                                Qualification
                            </div>

                        </div>

                        <div class="profile-info-value">
                            {{ $teacher->qualification ?? '-' }}
                        </div>

                    </div>

                </div>


                {{-- JOINING DATE --}}
                <div class="col-md-6">

                    <div class="profile-info-box">

                        <div class="profile-info-top">

                            <div class="profile-info-icon">
                                <i class="bi bi-calendar-event"></i>
                            </div>

                            <div class="profile-info-label">
                                Joining Date
                            </div>

                        </div>

                        <div class="profile-info-value">
                            {{ $teacher->joining_date ?? '-' }}
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection