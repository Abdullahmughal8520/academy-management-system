@extends('layouts.app')

@section('title', 'Edit Course')

@section('content')

<style>
    /* =========================================================
       EDIT COURSE — FULL DARK ADMIN THEME
    ========================================================= */

    body:has(.edit-course-page){
        background:#080e17 !important;
    }

    body:has(.edit-course-page) .main-wrapper{
        background:#080e17 !important;
    }

    body:has(.edit-course-page) .page-content{
        background:#080e17 !important;
        padding:18px 20px 0 20px !important;
        margin:0 !important;
        min-height:calc(100vh - 76px) !important;
    }

    .edit-course-page{
        --ec-bg:#080e17;
        --ec-panel:#0f1826;
        --ec-panel2:#111c2c;
        --ec-border:#223149;
        --ec-border-soft:#1b293c;
        --ec-text:#edf3fb;
        --ec-muted:#718096;
        --ec-purple:#8b5cf6;
        --ec-purple-light:#a78bfa;
        --ec-cyan:#22d3ee;
        --ec-green:#22c55e;
        --ec-red:#f43f5e;
        --ec-orange:#f59e0b;

        width:100%;
        min-height:calc(100vh - 94px);
        margin:0 !important;
        padding:0 !important;

        color:var(--ec-text);

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

    /* ================= PAGE HEADER ================= */

    .edit-course-header{
        display:flex;
        align-items:center;
        justify-content:space-between;
        gap:18px;
        margin-bottom:20px;
    }

    .edit-course-kicker{
        color:#a78bfa;
        font-size:10px;
        font-weight:900;
        letter-spacing:1.7px;
        text-transform:uppercase;
        margin-bottom:5px;
    }

    .edit-course-title{
        margin:0;
        color:#f8fafc;
        font-size:27px;
        line-height:1.15;
        font-weight:850;
        letter-spacing:-.3px;
    }

    .edit-course-subtitle{
        margin:5px 0 0;
        color:#728197;
        font-size:11px;
    }

    /* ================= BACK BUTTON ================= */

    .edit-course-back{
        position:relative;
        display:inline-flex;
        align-items:center;
        justify-content:center;
        gap:7px;

        padding:10px 14px;

        background:#111d2d;
        border:1px solid #27364b;
        border-radius:10px;

        color:#aab7ca;

        font-size:10px;
        font-weight:850;
        text-decoration:none;

        transition:
            transform .25s ease,
            color .25s ease,
            border-color .25s ease,
            background .25s ease;
    }

    .edit-course-back:hover{
        color:#fff;
        background:#162237;
        border-color:rgba(139,92,246,.55);
        transform:translateY(-2px);
    }

    .edit-course-back i{
        transition:transform .25s ease;
    }

    .edit-course-back:hover i{
        transform:translateX(-3px);
    }

    /* ================= ERROR ================= */

    .edit-course-errors{
        margin-bottom:16px;

        background:rgba(244,63,94,.07) !important;
        border:1px solid rgba(244,63,94,.20) !important;
        border-radius:10px;

        color:#fda4af !important;

        padding:12px 15px;
        font-size:9px;
    }

    .edit-course-errors strong{
        color:#fb7185;
        font-size:10px;
    }

    .edit-course-errors ul{
        padding-left:18px;
    }

    .edit-course-errors li{
        margin:3px 0;
    }

    /* ================= FORM CARD ================= */

    .edit-course-card{
        width:100%;
        overflow:hidden;

        background:
            linear-gradient(
                145deg,
                #111b2a,
                #0d1521
            );

        border:1px solid #223149;
        border-radius:15px;

        box-shadow:
            0 12px 30px rgba(0,0,0,.18);
    }

    /* ================= FORM SECTION ================= */

    .edit-course-section{
        padding:20px 22px;
        border-bottom:1px solid #1b293c;
    }

    .edit-course-section:last-child{
        border-bottom:none;
    }

    /* ================= SECTION HEADING ================= */

    .edit-course-section-heading{
        display:flex;
        align-items:center;
        gap:11px;
        margin-bottom:18px;
    }

    .edit-course-section-icon{
        width:39px;
        height:39px;
        flex-shrink:0;

        display:grid;
        place-items:center;

        border-radius:11px;

        background:#172237;
        border:1px solid #26364d;

        color:#a78bfa;
        font-size:16px;

        box-shadow:
            inset 0 0 12px rgba(139,92,246,.035);

        transition:
            transform .25s ease,
            background .25s ease,
            box-shadow .25s ease;
    }

    .edit-course-section-heading:hover .edit-course-section-icon{
        transform:scale(1.06);

        background:rgba(139,92,246,.11);

        box-shadow:
            0 0 18px rgba(139,92,246,.18);
    }

    .edit-course-section-icon i{
        filter:
            drop-shadow(0 0 5px rgba(34,211,238,.55));
    }

    .edit-course-section-title{
        margin:0;
        color:#eef3fb;
        font-size:12px;
        font-weight:850;
    }

    .edit-course-section-subtitle{
        margin:3px 0 0;
        color:#687890;
        font-size:9px;
    }

    /* ================= LABEL ================= */

    .edit-course-page .form-label{
        display:block;

        margin-bottom:7px;

        color:#aab7ca;

        font-size:9px;
        font-weight:850;
        letter-spacing:.2px;
    }

    /* ================= INPUTS ================= */

    .edit-course-page .form-control,
    .edit-course-page .form-select{

        min-height:42px;

        background:#0d1725 !important;
        color:#dbe4f2 !important;

        border:1px solid #27364b !important;
        border-radius:9px;

        font-size:11px;

        box-shadow:none !important;

        transition:
            border-color .25s ease,
            box-shadow .25s ease,
            background .25s ease;
    }

    .edit-course-page .form-control:hover,
    .edit-course-page .form-select:hover{
        border-color:#34465f !important;
    }

    .edit-course-page .form-control:focus,
    .edit-course-page .form-select:focus{

        background:#101b2b !important;
        color:#f1f5f9 !important;

        border-color:rgba(139,92,246,.72) !important;

        box-shadow:
            0 0 0 3px rgba(139,92,246,.10),
            0 0 18px rgba(139,92,246,.06) !important;

        outline:none;
    }

    .edit-course-page .form-control::placeholder{
        color:#526176 !important;
    }

    .edit-course-page textarea.form-control{
        min-height:105px;
        resize:vertical;
        line-height:1.6;
    }

    .edit-course-page .form-select{
        color:#cbd5e1 !important;
        color-scheme:dark;
    }

    .edit-course-page .form-select option{
        background:#111c2c;
        color:#dbe4f2;
    }

    .edit-course-page input[type="number"]{
        color-scheme:dark;
    }

    /* ================= HINT ================= */

    .edit-course-hint{
        margin-top:5px;
        color:#5f7089;
        font-size:8px;
    }

    /* ================= INFO BOX ================= */

    .edit-course-info{
        display:flex;
        align-items:flex-start;
        gap:8px;

        padding:11px 13px;

        background:
            linear-gradient(
                135deg,
                rgba(139,92,246,.08),
                rgba(34,211,238,.025)
            );

        border:1px solid rgba(139,92,246,.18);
        border-radius:10px;

        color:#9daac0;

        font-size:9px;
        line-height:1.6;
    }

    .edit-course-info i{
        color:#22d3ee;
        font-size:11px;
        margin-top:1px;

        filter:
            drop-shadow(0 0 5px rgba(34,211,238,.55));
    }

    /* ================= FOOTER ================= */

    .edit-course-footer{
        display:flex;
        align-items:center;
        justify-content:flex-end;
        gap:9px;

        padding:16px 22px;

        background:#0b1420;
        border-top:1px solid #1b293c;
    }

    /* ================= CANCEL ================= */

    .edit-course-cancel{
        display:inline-flex;
        align-items:center;
        justify-content:center;

        padding:9px 15px;

        background:#111d2d;
        border:1px solid #27364b;
        border-radius:9px;

        color:#7f8da2;

        font-size:10px;
        font-weight:850;
        text-decoration:none;

        transition:
            transform .25s ease,
            color .25s ease,
            background .25s ease,
            border-color .25s ease;
    }

    .edit-course-cancel:hover{
        color:#dbe4f2;
        background:#162237;
        border-color:#3a4b65;
        transform:translateY(-2px);
    }

    /* ================= UPDATE BUTTON ================= */

    .edit-course-submit{
        position:relative;

        display:inline-flex;
        align-items:center;
        justify-content:center;
        gap:6px;

        overflow:hidden;

        padding:9px 16px;

        border-radius:9px;
        border:1px solid rgba(167,139,250,.45);

        background:
            linear-gradient(
                135deg,
                #6848e8,
                #8b5cf6
            );

        color:#fff;

        font-size:10px;
        font-weight:850;

        box-shadow:
            0 8px 24px rgba(124,58,237,.20);

        transition:
            transform .25s ease,
            box-shadow .25s ease,
            border-color .25s ease;
    }

    .edit-course-submit::before{
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

    .edit-course-submit:hover{
        color:#fff;

        transform:translateY(-3px);

        border-color:rgba(196,181,253,.75);

        box-shadow:
            0 12px 30px rgba(124,58,237,.32),
            0 0 20px rgba(139,92,246,.12);
    }

    .edit-course-submit:hover::before{
        left:140%;
    }

    .edit-course-submit i{
        transition:transform .25s ease;
    }

    .edit-course-submit:hover i{
        transform:scale(1.12);

        filter:
            drop-shadow(0 0 5px rgba(255,255,255,.55));
    }

    /* ================= MOBILE ================= */

    @media(max-width:767px){

        body:has(.edit-course-page) .page-content{
            padding:18px 15px 0 15px !important;
        }

        .edit-course-header{
            align-items:flex-start;
            gap:12px;
        }

        .edit-course-title{
            font-size:22px;
        }

        .edit-course-subtitle{
            font-size:10px;
        }

        .edit-course-back{
            padding:8px 10px;
            font-size:9px;
            white-space:nowrap;
        }

        .edit-course-section{
            padding:18px 16px;
        }

        .edit-course-footer{
            padding:15px 16px;
        }

    }
</style>


<div class="edit-course-page">

    {{-- ================= PAGE HEADER ================= --}}

    <div class="edit-course-header">

        <div>

            <div class="edit-course-kicker">
                Course Management
            </div>

            <h1 class="edit-course-title">
                Edit Course
            </h1>

            <p class="edit-course-subtitle">
                Update the course information, duration, fee and status.
            </p>

        </div>


        <a
            href="{{ route('courses.index') }}"
            class="edit-course-back"
        >
            <i class="bi bi-arrow-left"></i>
            Back to Courses
        </a>

    </div>


    {{-- ================= VALIDATION ERRORS ================= --}}

    @if ($errors->any())

        <div class="edit-course-errors">

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


    {{-- ================= COURSE FORM ================= --}}

    <div class="edit-course-card">

        <form
            action="{{ route('courses.update', $course->id) }}"
            method="POST"
        >

            @csrf
            @method('PUT')


            {{-- ================= COURSE INFORMATION ================= --}}

            <div class="edit-course-section">

                <div class="edit-course-section-heading">

                    <div class="edit-course-section-icon">
                        <i class="bi bi-book"></i>
                    </div>

                    <div>

                        <h5 class="edit-course-section-title">
                            Course Information
                        </h5>

                        <p class="edit-course-section-subtitle">
                            Update the basic information about the course
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
                            value="{{ old('course_code', $course->course_code) }}"
                            placeholder="e.g. CS-001"
                        >

                        <div class="edit-course-hint">
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
                            value="{{ old('name', $course->name) }}"
                            placeholder="e.g. Web Development"
                        >

                        <div class="edit-course-hint">
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
                        >{{ old('description', $course->description) }}</textarea>

                        <div class="edit-course-hint">
                            Briefly describe what students will learn in this course.
                        </div>

                    </div>

                </div>

            </div>


            {{-- ================= COURSE DETAILS ================= --}}

            <div class="edit-course-section">

                <div class="edit-course-section-heading">

                    <div class="edit-course-section-icon">
                        <i class="bi bi-clipboard-data"></i>
                    </div>

                    <div>

                        <h5 class="edit-course-section-title">
                            Course Details
                        </h5>

                        <p class="edit-course-section-subtitle">
                            Update duration, fee and course status
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
                            value="{{ old('duration', $course->duration) }}"
                            placeholder="e.g. 6 Months"
                        >

                        <div class="edit-course-hint">
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
                            value="{{ old('fee', $course->fee) }}"
                            min="0"
                            step="0.01"
                            placeholder="e.g. 25000"
                        >

                        <div class="edit-course-hint">
                            Enter the total course fee.
                        </div>

                    </div>


                    {{-- Status --}}

                    <div class="col-md-6">

                        <label class="form-label">
                            Status
                        </label>

                        <select
                            name="status"
                            class="form-select"
                        >

                            <option
                                value="active"
                                {{ old('status', $course->status) === 'active' ? 'selected' : '' }}
                            >
                                Active
                            </option>

                            <option
                                value="inactive"
                                {{ old('status', $course->status) === 'inactive' ? 'selected' : '' }}
                            >
                                Inactive
                            </option>

                        </select>

                        <div class="edit-course-hint">
                            Set whether this course is currently available.
                        </div>

                    </div>

                </div>


                <div class="edit-course-info mt-4">

                    <i class="bi bi-info-circle-fill"></i>

                    <div>
                        Review the course details and status before saving
                        the changes.
                    </div>

                </div>

            </div>


            {{-- ================= FOOTER ================= --}}

            <div class="edit-course-footer">

                <a
                    href="{{ route('courses.index') }}"
                    class="edit-course-cancel"
                >
                    Cancel
                </a>


                <button
                    type="submit"
                    class="edit-course-submit"
                >
                    <i class="bi bi-check-lg"></i>
                    Update Course
                </button>

            </div>

        </form>

    </div>

</div>

@endsection