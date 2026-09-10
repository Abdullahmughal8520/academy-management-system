@extends('layouts.app')

@section('title', 'Add Course')

@section('content')

<style>
    /* =========================================================
       ADD COURSE — DARK ADMIN DASHBOARD THEME
    ========================================================= */

    body:has(.add-course-page){
        background:#080e17 !important;
    }

    body:has(.add-course-page) .main-wrapper{
        background:#080e17 !important;
    }

    body:has(.add-course-page) .page-content{
        background:#080e17 !important;
        padding:18px 20px 0 20px !important;
        margin:0 !important;
        min-height:calc(100vh - 76px) !important;
    }

    .add-course-page{
        --ac-bg:#080e17;
        --ac-panel:#0f1826;
        --ac-panel2:#111c2c;
        --ac-border:#223149;
        --ac-border-soft:#1b293c;
        --ac-text:#edf3fb;
        --ac-muted:#718096;
        --ac-purple:#8b5cf6;
        --ac-purple-light:#a78bfa;
        --ac-cyan:#22d3ee;
        --ac-green:#22c55e;
        --ac-red:#f43f5e;
        --ac-orange:#f59e0b;

        width:100%;
        min-height:calc(100vh - 94px);
        margin:0 !important;
        padding:0 !important;
        color:var(--ac-text);

        background:
            radial-gradient(
                circle at 88% 0%,
                rgba(139,92,246,.08),
                transparent 30%
            ),
            radial-gradient(
                circle at 5% 85%,
                rgba(34,211,238,.035),
                transparent 25%
            ),
            #080e17;
    }

    .add-course-page *{
        box-sizing:border-box;
    }

    /* =========================
       PAGE HEADER
    ========================= */

    .add-course-header{
        display:flex;
        align-items:center;
        justify-content:space-between;
        gap:18px;
        margin-bottom:18px;
    }

    .add-course-kicker{
        color:#a78bfa;
        font-size:9px;
        font-weight:900;
        text-transform:uppercase;
        letter-spacing:1.6px;
        margin-bottom:5px;
    }

    .add-course-title{
        margin:0;
        color:#f8fafc;
        font-size:25px;
        line-height:1.15;
        font-weight:850;
        letter-spacing:-.3px;
    }

    .add-course-subtitle{
        margin:5px 0 0;
        color:#718096;
        font-size:11px;
    }

    .add-course-back{
        position:relative;
        display:inline-flex;
        align-items:center;
        justify-content:center;
        gap:6px;
        overflow:hidden;

        padding:9px 14px;
        border-radius:9px;

        background:#0f1826;
        border:1px solid #27364b;
        color:#aab7ca;

        font-size:10px;
        font-weight:800;
        text-decoration:none;

        transition:
            transform .25s ease,
            border-color .25s ease,
            background .25s ease,
            color .25s ease;
    }

    .add-course-back:hover{
        color:#fff;
        border-color:rgba(139,92,246,.55);
        background:#121e30;
        transform:translateY(-2px);
    }

    .add-course-back i{
        transition:transform .25s ease;
    }

    .add-course-back:hover i{
        transform:translateX(-3px);
    }

    /* =========================
       VALIDATION ERRORS
    ========================= */

    .add-course-errors{
        background:rgba(244,63,94,.07) !important;
        border:1px solid rgba(244,63,94,.25) !important;
        border-radius:12px !important;
        color:#fda4af !important;
        padding:13px 15px !important;
        margin-bottom:16px !important;
        box-shadow:none !important;
    }

    .add-course-errors strong{
        color:#fb7185;
        font-size:11px;
    }

    .add-course-errors ul{
        padding-left:18px;
    }

    .add-course-errors li{
        font-size:10px;
        color:#cbd5e1;
        margin-top:3px;
    }

    /* =========================
       MAIN FORM CARD
    ========================= */

    .add-course-card{
        background:
            linear-gradient(
                145deg,
                #111b2a,
                #0d1521
            );

        border:1px solid #223149;
        border-radius:15px;
        overflow:hidden;

        box-shadow:
            0 12px 30px rgba(0,0,0,.16);
    }

    /* =========================
       FORM SECTIONS
    ========================= */

    .add-course-section{
        padding:22px 23px;
        border-bottom:1px solid #1e2b3e;
    }

    .add-course-section:last-child{
        border-bottom:none;
    }

    .add-course-section-heading{
        display:flex;
        align-items:center;
        gap:11px;
        margin-bottom:20px;
    }

    .add-course-section-icon{
        width:39px;
        height:39px;
        flex:0 0 39px;

        display:grid;
        place-items:center;

        border-radius:11px;

        background:#172237;
        border:1px solid rgba(139,92,246,.16);

        color:#a78bfa;
        font-size:16px;

        box-shadow:
            inset 0 0 12px rgba(139,92,246,.035);
    }

    .add-course-section-icon i{
        filter:
            drop-shadow(0 0 5px rgba(34,211,238,.55));

        transition:.25s ease;
    }

    .add-course-section:hover
    .add-course-section-icon i{
        transform:scale(1.08);
        filter:
            drop-shadow(0 0 5px rgba(34,211,238,.75))
            drop-shadow(0 0 10px rgba(34,211,238,.30));
    }

    .add-course-section-title{
        margin:0;
        color:#eef3fb;
        font-size:12px;
        font-weight:850;
    }

    .add-course-section-subtitle{
        margin:3px 0 0;
        color:#687890;
        font-size:9px;
    }

    /* =========================
       LABELS
    ========================= */

    .add-course-page .form-label{
        display:block;
        margin-bottom:7px;

        color:#aebbd0 !important;
        font-size:10px !important;
        font-weight:800 !important;
    }

    .add-course-page .required-star{
        color:#f43f5e;
    }

    /* =========================
       INPUTS
    ========================= */

    .add-course-page .form-control{
        width:100%;
        min-height:42px;

        background:#0d1725 !important;
        border:1px solid #27364b !important;
        border-radius:9px !important;

        color:#dbe4f2 !important;

        font-size:11px !important;

        box-shadow:none !important;

        transition:
            border-color .25s ease,
            box-shadow .25s ease,
            background .25s ease;
    }

    .add-course-page textarea.form-control{
        min-height:105px;
        resize:vertical;
        line-height:1.55;
    }

    .add-course-page .form-control:hover{
        border-color:#35465e !important;
    }

    .add-course-page .form-control:focus{
        background:#0f1a2a !important;
        border-color:#8b5cf6 !important;

        color:#f1f5f9 !important;

        box-shadow:
            0 0 0 3px rgba(139,92,246,.10),
            0 0 18px rgba(139,92,246,.05) !important;

        outline:none !important;
    }

    .add-course-page .form-control::placeholder{
        color:#526176 !important;
        opacity:1;
    }

    /* Number input arrows */
    .add-course-page input[type="number"]{
        color-scheme:dark;
    }

    /* =========================
       HINT TEXT
    ========================= */

    .add-course-hint{
        margin-top:5px;
        color:#5f7089;
        font-size:8.5px;
        line-height:1.4;
    }

    /* =========================
       INFO BOX
    ========================= */

    .add-course-info{
        display:flex;
        align-items:flex-start;
        gap:8px;

        background:rgba(139,92,246,.055);
        border:1px solid rgba(139,92,246,.16);
        border-radius:10px;

        padding:11px 13px;

        color:#8f83c8;
        font-size:9px;
        line-height:1.5;
    }

    .add-course-info i{
        color:#a78bfa;
        font-size:11px;
        margin-top:1px;
        filter:
            drop-shadow(0 0 5px rgba(139,92,246,.45));
    }

    /* =========================
       FOOTER
    ========================= */

    .add-course-footer{
        display:flex;
        justify-content:flex-end;
        align-items:center;
        gap:9px;

        padding:17px 23px;

        background:#0c1420;
        border-top:1px solid #1e2b3e;
    }

    .add-course-cancel{
        display:inline-flex;
        align-items:center;
        justify-content:center;

        padding:9px 16px;

        border-radius:9px;

        background:#0f1826;
        border:1px solid #27364b;

        color:#7f8da2;

        font-size:10px;
        font-weight:800;
        text-decoration:none;

        transition:.25s ease;
    }

    .add-course-cancel:hover{
        color:#dbe4f2;
        background:#131f30;
        border-color:#3a4a61;
    }

    /* =========================
       SUBMIT BUTTON
    ========================= */

    .add-course-submit{
        position:relative;

        display:inline-flex;
        align-items:center;
        justify-content:center;
        gap:6px;

        overflow:hidden;

        padding:9px 17px;

        border-radius:9px;

        background:
            linear-gradient(
                135deg,
                #6848e8,
                #8b5cf6
            );

        border:1px solid rgba(167,139,250,.45);

        color:#fff;

        font-size:10px;
        font-weight:850;

        box-shadow:
            0 8px 22px rgba(124,58,237,.20);

        transition:
            transform .25s ease,
            box-shadow .25s ease,
            border-color .25s ease;
    }

    .add-course-submit::before{
        content:"";

        position:absolute;
        top:0;
        left:-120%;

        width:75%;
        height:100%;

        background:
            linear-gradient(
                90deg,
                transparent,
                rgba(255,255,255,.20),
                transparent
            );

        transform:skewX(-20deg);

        transition:left .55s ease;
    }

    .add-course-submit:hover{
        color:#fff;

        transform:translateY(-3px);

        border-color:rgba(196,181,253,.75);

        box-shadow:
            0 12px 30px rgba(124,58,237,.32),
            0 0 20px rgba(139,92,246,.12);
    }

    .add-course-submit:hover::before{
        left:140%;
    }

    .add-course-submit i{
        transition:transform .25s ease;
    }

    .add-course-submit:hover i{
        transform:rotate(90deg) scale(1.08);

        filter:
            drop-shadow(0 0 5px rgba(255,255,255,.55));
    }

    /* =========================
       BOOTSTRAP OVERRIDES
    ========================= */

    .add-course-page .row,
    .add-course-page .col-md-6,
    .add-course-page .col-12{
        background:transparent !important;
    }

    .add-course-page .alert{
        margin-bottom:16px;
    }

    /* =========================
       MOBILE
    ========================= */

    @media(max-width:767px){

        body:has(.add-course-page) .page-content{
            padding:18px 15px 0 15px !important;
        }

        .add-course-page{
            min-height:calc(100vh - 83px);
        }

        .add-course-header{
            align-items:flex-start;
            gap:12px;
        }

        .add-course-title{
            font-size:22px;
        }

        .add-course-subtitle{
            font-size:10px;
        }

        .add-course-back{
            padding:8px 11px;
            font-size:9px;
            white-space:nowrap;
        }

        .add-course-section{
            padding:19px;
        }

        .add-course-footer{
            padding:16px 19px;
        }

        .add-course-section-heading{
            margin-bottom:18px;
        }

        .add-course-page .row{
            --bs-gutter-y:14px;
        }
    }
</style>


<div class="add-course-page">

    {{-- =========================
         PAGE HEADER
    ========================== --}}

    <div class="add-course-header">

        <div>

            <div class="add-course-kicker">
                Course Management
            </div>

            <h1 class="add-course-title">
                Add Course
            </h1>

            <p class="add-course-subtitle">
                Create a new course for the academy.
            </p>

        </div>


        <a
            href="{{ route('courses.index') }}"
            class="add-course-back"
        >
            <i class="bi bi-arrow-left"></i>
            Back to Courses
        </a>

    </div>


    {{-- =========================
         VALIDATION ERRORS
    ========================== --}}

    @if ($errors->any())

        <div class="add-course-errors">

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


    {{-- =========================
         FORM CARD
    ========================== --}}

    <div class="add-course-card">

        <form
            action="{{ route('courses.store') }}"
            method="POST"
        >

            @csrf


            {{-- =========================
                 COURSE INFORMATION
            ========================== --}}

            <div class="add-course-section">

                <div class="add-course-section-heading">

                    <div class="add-course-section-icon">
                        <i class="bi bi-book"></i>
                    </div>

                    <div>

                        <h5 class="add-course-section-title">
                            Course Information
                        </h5>

                        <p class="add-course-section-subtitle">
                            Enter the basic information about the course
                        </p>

                    </div>

                </div>


                <div class="row g-3">


                    {{-- Course Code --}}

                    <div class="col-md-6">

                        <label class="form-label">
                            Course Code
                        </label>

                        <input
                            type="text"
                            name="course_code"
                            class="form-control"
                            value="{{ old('course_code') }}"
                            placeholder="e.g. CS-001"
                        >

                        <div class="add-course-hint">
                            Use a unique code to identify the course.
                        </div>

                    </div>


                    {{-- Course Name --}}

                    <div class="col-md-6">

                        <label class="form-label">
                            Course Name
                        </label>

                        <input
                            type="text"
                            name="name"
                            class="form-control"
                            value="{{ old('name') }}"
                            placeholder="e.g. Web Development"
                        >

                        <div class="add-course-hint">
                            Enter the name students will see.
                        </div>

                    </div>


                    {{-- Description --}}

                    <div class="col-12">

                        <label class="form-label">
                            Description
                        </label>

                        <textarea
                            name="description"
                            class="form-control"
                            rows="4"
                            placeholder="Write a short description about this course..."
                        >{{ old('description') }}</textarea>

                        <div class="add-course-hint">
                            Briefly describe what students will learn in this course.
                        </div>

                    </div>

                </div>

            </div>


            {{-- =========================
                 COURSE DETAILS
            ========================== --}}

            <div class="add-course-section">

                <div class="add-course-section-heading">

                    <div class="add-course-section-icon">
                        <i class="bi bi-clipboard-data"></i>
                    </div>

                    <div>

                        <h5 class="add-course-section-title">
                            Course Details
                        </h5>

                        <p class="add-course-section-subtitle">
                            Set the duration and fee for the course
                        </p>

                    </div>

                </div>


                <div class="row g-3">


                    {{-- Duration --}}

                    <div class="col-md-6">

                        <label class="form-label">
                            Duration
                        </label>

                        <input
                            type="text"
                            name="duration"
                            class="form-control"
                            value="{{ old('duration') }}"
                            placeholder="e.g. 6 Months"
                        >

                        <div class="add-course-hint">
                            Enter the expected course duration.
                        </div>

                    </div>


                    {{-- Fee --}}

                    <div class="col-md-6">

                        <label class="form-label">
                            Course Fee
                        </label>

                        <input
                            type="number"
                            name="fee"
                            class="form-control"
                            value="{{ old('fee') }}"
                            min="0"
                            step="0.01"
                            placeholder="e.g. 25000"
                        >

                        <div class="add-course-hint">
                            Enter the total course fee.
                        </div>

                    </div>

                </div>


                {{-- Info --}}

                <div class="add-course-info mt-4">

                    <i class="bi bi-info-circle-fill"></i>

                    <span>
                        Make sure the course code, name, duration and fee
                        are correct before creating the course.
                    </span>

                </div>

            </div>


            {{-- =========================
                 FORM FOOTER
            ========================== --}}

            <div class="add-course-footer">

                <a
                    href="{{ route('courses.index') }}"
                    class="add-course-cancel"
                >
                    Cancel
                </a>


                <button
                    type="submit"
                    class="add-course-submit"
                >
                    <i class="bi bi-plus-lg"></i>
                    Add Course
                </button>

            </div>

        </form>

    </div>

</div>

@endsection