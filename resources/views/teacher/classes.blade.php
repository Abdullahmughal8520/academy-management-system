@extends('layouts.app')

@section('title', 'My Classes')

@section('content')

<style>
    /* =========================
       TEACHER MY CLASSES
       ========================= */

    body:has(.my-classes-page) .main-wrapper,
    body:has(.my-classes-page) .page-content {
        background:#080e17 !important;
    }

    body:has(.my-classes-page) .page-content {
        padding:22px 24px 0 24px !important;
        min-height:calc(100vh - 76px) !important;
    }

    .my-classes-page {
        color:#edf3fb;
    }

    .my-classes-page * {
        box-sizing:border-box;
    }

    /* PAGE HEADER */

    .classes-header {
        display:flex;
        justify-content:space-between;
        align-items:center;
        margin-bottom:20px;
    }

    .classes-kicker {
        font-size:10px;
        letter-spacing:1.7px;
        text-transform:uppercase;
        color:#a78bfa;
        font-weight:900;
        margin-bottom:4px;
    }

    .classes-title {
        font-size:27px;
        line-height:1.15;
        font-weight:850;
        margin:0;
        color:#f8fafc;
    }

    .classes-subtitle {
        font-size:12px;
        color:#718096;
        margin:5px 0 0;
    }

    /* CLASS CARD */

    .class-card {
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

    .class-card::after {
        content:"";
        position:absolute;
        width:100px;
        height:100px;
        border-radius:50%;
        right:-55px;
        top:-55px;
        background:rgba(139,92,246,.07);
        transition:transform .35s ease, background .35s ease;
        pointer-events:none;
    }

    .class-card:hover {
        transform:translateY(-6px);
        border-color:rgba(139,92,246,.55);
        background:linear-gradient(145deg,#141f32,#0e1725);
        box-shadow:
            0 16px 38px rgba(0,0,0,.30),
            0 0 22px rgba(139,92,246,.10);
    }

    .class-card:hover::after {
        transform:scale(1.4);
        background:rgba(139,92,246,.12);
    }

    .class-card-body {
        padding:18px;
        position:relative;
        z-index:1;
    }

    /* ICON */

    .class-icon {
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

    .class-icon i {
        font-size:17px;
        filter:
            drop-shadow(0 0 5px rgba(167,139,250,.55));
        transition:.25s ease;
    }

    .class-card:hover .class-icon {
        transform:scale(1.08) rotate(-2deg);
        background:rgba(139,92,246,.13);
        color:#c4b5fd;
        border-color:rgba(139,92,246,.35);
        box-shadow:
            0 0 18px rgba(139,92,246,.20),
            inset 0 0 12px rgba(139,92,246,.05);
    }

    .class-card:hover .class-icon i {
        transform:scale(1.08);
        filter:
            drop-shadow(0 0 5px rgba(167,139,250,.85))
            drop-shadow(0 0 10px rgba(139,92,246,.40));
    }

    /* CLASS NAME */

    .class-name {
        font-size:14px;
        line-height:1.25;
        font-weight:850;
        color:#edf3fb;
        margin:0 0 3px;
    }

    .class-type {
        font-size:9px;
        color:#64758c;
        margin:0;
        letter-spacing:.2px;
    }

    /* DESCRIPTION */

    .class-description {
        font-size:10px;
        line-height:1.65;
        color:#718096;
        margin:15px 0 0;
        padding-top:13px;
        border-top:1px solid #1a2637;
    }

    /* EMPTY STATE */

    .classes-empty {
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

        body:has(.my-classes-page) .page-content {
            padding:20px 15px !important;
        }

        .classes-header {
            align-items:flex-start;
        }

        .classes-title {
            font-size:22px;
        }

        .classes-subtitle {
            font-size:10px;
        }

        .class-card-body {
            padding:16px;
        }
    }

    /* ASSIGNED SUBJECTS */

.class-assignments {
    margin-top:15px;
    padding-top:13px;
    border-top:1px solid #1a2637;
}

.assignments-title {
    display:flex;
    align-items:center;
    gap:7px;
    color:#a78bfa;
    font-size:9px;
    font-weight:900;
    text-transform:uppercase;
    letter-spacing:.6px;
    margin-bottom:9px;
}

.assignments-title i {
    font-size:11px;
    filter:drop-shadow(0 0 5px rgba(167,139,250,.55));
}

.assignment-item {
    display:flex;
    align-items:center;
    justify-content:space-between;
    gap:8px;
    padding:7px 0;
    border-bottom:1px solid #182538;
}

.assignment-item:last-child {
    border-bottom:0;
}

.assignment-subject {
    display:flex;
    align-items:center;
    gap:7px;
    min-width:0;
    color:#dbe4f2;
    font-size:10px;
    font-weight:750;
}

.subject-dot {
    width:6px;
    height:6px;
    flex-shrink:0;
    border-radius:50%;
    background:#8b5cf6;
    box-shadow:0 0 7px rgba(139,92,246,.65);
}

.assignment-group {
    flex-shrink:0;
    padding:4px 7px;
    border-radius:999px;
    background:#162437;
    border:1px solid #243750;
    color:#7dd3fc;
    font-size:8px;
    font-weight:850;
}
</style>


<div class="my-classes-page">

    {{-- PAGE HEADER --}}
    <div class="classes-header">

        <div>
            <div class="classes-kicker">
                Teacher Portal
            </div>

            <h1 class="classes-title">
                My Classes
            </h1>

            <p class="classes-subtitle">
                View the classes assigned to you.
            </p>
        </div>

    </div>


    {{-- CLASSES --}}
    @if(isset($classes) && $classes->count())

        <div class="row g-3">

            @foreach($classes as $class)

                <div class="col-md-6 col-lg-4">

                    <div class="class-card">

                        <div class="class-card-body">

                            <div class="d-flex align-items-center">

                                <div class="class-icon">
                                    <i class="bi bi-building"></i>
                                </div>

                                <div class="ms-3">

                                    <h5 class="class-name">
                                        {{ $class->name ?? 'Class' }}
                                    </h5>

                                    <p class="class-type">
                                        Academy Class
                                    </p>

                                </div>

                            </div>

@if(isset($class->description) && $class->description)
    <p class="class-description">
        {{ $class->description }}
    </p>
@endif


@php
    $classAssignments = $assignments->where(
        'academy_class_id',
        $class->id
    );
@endphp

@if($classAssignments->count())

    <div class="class-assignments">

        <div class="assignments-title">
            <i class="bi bi-journal-bookmark"></i>
            Assigned Subjects
        </div>

        @foreach($classAssignments as $assignment)

            <div class="assignment-item">

                <div class="assignment-subject">

                    <span class="subject-dot"></span>

                    <span>
                        {{ $assignment->subject?->name ?? 'Subject' }}
                    </span>

                </div>

                @if($assignment->group)
                    <span class="assignment-group">
                        {{ $assignment->group->name }}
                    </span>
                @endif

            </div>

        @endforeach

    </div>

@endif

                        </div>

                    </div>

                </div>

            @endforeach

        </div>

    @else

        {{-- EMPTY STATE --}}
        <div class="classes-empty">

            <div class="empty-icon">
                <i class="bi bi-building"></i>
            </div>

            <h5 class="empty-title">
                No Classes Assigned
            </h5>

            <p class="empty-text">
                You currently don't have any classes assigned to you.
            </p>

        </div>

    @endif

</div>

@endsection