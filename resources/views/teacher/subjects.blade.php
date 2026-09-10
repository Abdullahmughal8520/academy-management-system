@extends('layouts.app')

@section('title', 'My Subjects')

@section('content')

<style>
    /* =========================
       TEACHER MY SUBJECTS
       ========================= */

    body:has(.my-subjects-page) .main-wrapper,
    body:has(.my-subjects-page) .page-content {
        background:#080e17 !important;
    }

    body:has(.my-subjects-page) .page-content {
        padding:22px 24px 0 24px !important;
        min-height:calc(100vh - 76px) !important;
    }

    .my-subjects-page {
        color:#edf3fb;
    }

    .my-subjects-page * {
        box-sizing:border-box;
    }

    /* PAGE HEADER */

    .subjects-header {
        display:flex;
        justify-content:space-between;
        align-items:center;
        margin-bottom:20px;
    }

    .subjects-kicker {
        font-size:10px;
        letter-spacing:1.7px;
        text-transform:uppercase;
        color:#a78bfa;
        font-weight:900;
        margin-bottom:4px;
    }

    .subjects-title {
        font-size:27px;
        line-height:1.15;
        font-weight:850;
        margin:0;
        color:#f8fafc;
    }

    .subjects-subtitle {
        font-size:12px;
        color:#718096;
        margin:5px 0 0;
    }

    /* SUBJECT CARD */

    .subject-card {
        position:relative;
        height:100%;
        overflow:hidden;
        background:linear-gradient(145deg,#111b2a,#0d1521);
        border:1px solid #223149;
        border-radius:15px;
        box-shadow:0 12px 30px rgba(0,0,0,.12);
        transition:
            transform .25s ease,
            border-color .25s ease,
            box-shadow .25s ease,
            background .25s ease;
    }

    .subject-card::after {
        content:"";
        position:absolute;
        width:100px;
        height:100px;
        border-radius:50%;
        right:-55px;
        top:-55px;
        background:rgba(34,211,238,.055);
        transition:transform .35s ease, background .35s ease;
        pointer-events:none;
    }

    .subject-card:hover {
        transform:translateY(-6px);
        border-color:rgba(139,92,246,.55);
        background:linear-gradient(145deg,#141f32,#0e1725);
        box-shadow:
            0 16px 38px rgba(0,0,0,.30),
            0 0 22px rgba(139,92,246,.10);
    }

    .subject-card:hover::after {
        transform:scale(1.4);
        background:rgba(34,211,238,.09);
    }

    .subject-card-body {
        padding:18px;
        position:relative;
        z-index:1;
    }

    /* ICON */

    .subject-icon {
        width:45px;
        height:45px;
        border-radius:11px;
        display:grid;
        place-items:center;
        flex-shrink:0;
        background:#172237;
        border:1px solid #253550;
        color:#a78bfa;
        transition:
            transform .25s ease,
            background .25s ease,
            box-shadow .25s ease,
            color .25s ease;
    }

    .subject-icon i {
        font-size:17px;
        filter:
            drop-shadow(0 0 5px rgba(167,139,250,.55));
        transition:.25s ease;
    }

    .subject-card:hover .subject-icon {
        transform:scale(1.08) rotate(-2deg);
        background:rgba(139,92,246,.13);
        color:#c4b5fd;
        border-color:rgba(139,92,246,.35);
        box-shadow:
            0 0 18px rgba(139,92,246,.20),
            inset 0 0 12px rgba(139,92,246,.05);
    }

    .subject-card:hover .subject-icon i {
        transform:scale(1.08);
        filter:
            drop-shadow(0 0 5px rgba(167,139,250,.85))
            drop-shadow(0 0 10px rgba(139,92,246,.40));
    }

    /* SUBJECT NAME */

    .subject-name {
        font-size:14px;
        line-height:1.25;
        font-weight:850;
        color:#edf3fb;
        margin:0 0 3px;
    }

    .subject-type {
        font-size:9px;
        color:#64758c;
        margin:0;
        letter-spacing:.2px;
    }

    /* SUBJECT CODE */

    .subject-code-box {
        margin-top:15px;
        padding-top:13px;
        border-top:1px solid #1a2637;
    }

    .subject-code-label {
        font-size:8px;
        text-transform:uppercase;
        letter-spacing:.65px;
        color:#64758c;
        font-weight:900;
        margin-bottom:4px;
    }

    .subject-code {
        display:inline-flex;
        align-items:center;
        padding:5px 8px;
        border-radius:7px;
        background:#162437;
        border:1px solid #26364d;
        color:#7dd3fc;
        font-size:9px;
        font-weight:850;
        letter-spacing:.3px;
    }

    /* DESCRIPTION */

    .subject-description {
        font-size:10px;
        line-height:1.65;
        color:#718096;
        margin:13px 0 0;
    }

    /* EMPTY STATE */

    .subjects-empty {
        background:linear-gradient(145deg,#111b2a,#0d1521);
        border:1px solid #223149;
        border-radius:15px;
        box-shadow:0 12px 30px rgba(0,0,0,.12);
        padding:45px 20px;
        text-align:center;
    }

    .empty-icon {
        width:58px;
        height:58px;
        margin:0 auto 16px;
        border-radius:15px;
        display:grid;
        place-items:center;
        background:#172237;
        border:1px solid #26364d;
        color:#718096;
    }

    .empty-icon i {
        font-size:24px;
        filter:drop-shadow(0 0 5px rgba(113,128,150,.35));
    }

    .empty-title {
        color:#f8fafc;
        font-size:15px;
        font-weight:850;
        margin:0 0 6px;
    }

    .empty-text {
        color:#64758c;
        font-size:10px;
        margin:0;
    }

    /* RESPONSIVE */

    @media(max-width:767px) {

        body:has(.my-subjects-page) .page-content {
            padding:20px 15px !important;
        }

        .subjects-header {
            align-items:flex-start;
        }

        .subjects-title {
            font-size:22px;
        }

        .subjects-subtitle {
            font-size:10px;
        }

        .subject-card-body {
            padding:16px;
        }
    }
</style>


<div class="my-subjects-page">

    {{-- PAGE HEADER --}}
    <div class="subjects-header">

        <div>

            <div class="subjects-kicker">
                Teacher Portal
            </div>

            <h1 class="subjects-title">
                My Subjects
            </h1>

            <p class="subjects-subtitle">
                View the subjects assigned to you.
            </p>

        </div>

    </div>


    {{-- SUBJECTS --}}
    @if(isset($subjects) && $subjects->count())

        <div class="row g-3">

            @foreach($subjects as $subject)

                <div class="col-md-6 col-lg-4">

                    <div class="subject-card">

                        <div class="subject-card-body">

                            <div class="d-flex align-items-center">

                                <div class="subject-icon">
                                    <i class="bi bi-book-fill"></i>
                                </div>

                                <div class="ms-3">

                                    <h5 class="subject-name">
                                        {{ $subject->name ?? 'Subject' }}
                                    </h5>

                                    <p class="subject-type">
                                        Subject
                                    </p>

                                </div>

                            </div>


                            @if(isset($subject->code))

                                <div class="subject-code-box">

                                    <div class="subject-code-label">
                                        Subject Code
                                    </div>

                                    <span class="subject-code">
                                        {{ $subject->code }}
                                    </span>

                                </div>

                            @endif


                            @if(isset($subject->description))

                                <p class="subject-description">
                                    {{ $subject->description }}
                                </p>

                            @endif

                        </div>

                    </div>

                </div>

            @endforeach

        </div>

    @else

        {{-- EMPTY STATE --}}
        <div class="subjects-empty">

            <div class="empty-icon">
                <i class="bi bi-journal-x"></i>
            </div>

            <h5 class="empty-title">
                No Subjects Assigned
            </h5>

            <p class="empty-text">
                You currently don't have any subjects assigned to you.
            </p>

        </div>

    @endif

</div>

@endsection