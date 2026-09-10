@extends('layouts.app')

@section('title', 'Assign Teacher')

@section('content')

<style>
    /* =========================================================
       ASSIGN TEACHER — DARK ADMIN THEME
       ========================================================= */

    body:has(.add-assignment-page){
        background:#080e17 !important;
    }

    body:has(.add-assignment-page) .main-wrapper{
        background:#080e17 !important;
    }

    body:has(.add-assignment-page) .page-content{
        background:#080e17 !important;
        padding:18px 20px 0 20px !important;
        margin:0 !important;
        min-height:calc(100vh - 76px) !important;
    }

    .add-assignment-page{
        --ta-bg:#080e17;
        --ta-panel:#0f1826;
        --ta-panel2:#111c2c;
        --ta-border:#223149;
        --ta-border-soft:#1b293c;
        --ta-text:#edf3fb;
        --ta-muted:#718096;
        --ta-purple:#8b5cf6;
        --ta-purple-light:#a78bfa;
        --ta-cyan:#22d3ee;
        --ta-green:#22c55e;
        --ta-red:#f43f5e;
        --ta-orange:#f59e0b;

        width:100%;
        min-height:calc(100vh - 94px);

        margin:0 !important;
        padding:0 !important;

        color:var(--ta-text);

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

    .add-assignment-page *,
    .add-assignment-page *::before,
    .add-assignment-page *::after{
        box-sizing:border-box;
    }


    /* =========================================================
       PAGE HEADER
       ========================================================= */

    .assignment-form-header{
        display:flex;
        align-items:center;
        justify-content:space-between;
        gap:18px;

        margin-bottom:20px;
    }

    .assignment-form-kicker{
        font-size:10px;
        letter-spacing:1.7px;
        text-transform:uppercase;

        color:#a78bfa;

        font-weight:900;

        margin-bottom:4px;
    }

    .assignment-form-title{
        font-size:27px;
        line-height:1.15;

        font-weight:850;

        color:#f8fafc;

        margin:0 0 5px;
    }

    .assignment-form-subtitle{
        font-size:12px;

        color:#728197;

        margin:0;
    }


    /* =========================================================
       BACK BUTTON
       ========================================================= */

    .assignment-back-btn{
        display:inline-flex;
        align-items:center;
        justify-content:center;
        gap:6px;

        padding:9px 14px;

        border-radius:9px;

        background:#0d1725 !important;

        border:1px solid #26364d !important;

        color:#9aa9bd !important;

        font-size:10px;

        font-weight:850;

        text-decoration:none;

        transition:
            transform .2s ease,
            background .2s ease,
            border-color .2s ease,
            color .2s ease;
    }

    .assignment-back-btn:hover{
        color:#dbe4f2 !important;

        background:#111c2c !important;

        border-color:#3a4c65 !important;

        transform:translateY(-2px);
    }

    .assignment-back-btn i{
        transition:transform .2s ease;
    }

    .assignment-back-btn:hover i{
        transform:translateX(-3px);
    }


    /* =========================================================
       ERROR ALERT
       ========================================================= */

    .add-assignment-page .alert-danger{
        background:rgba(244,63,94,.07) !important;

        border:1px solid rgba(244,63,94,.18) !important;

        color:#fda4af !important;

        border-radius:10px;

        padding:12px 14px;

        font-size:10px;

        box-shadow:none !important;
    }

    .add-assignment-page .alert-danger strong{
        color:#fb7185 !important;

        font-size:10px;
    }

    .add-assignment-page .alert-danger ul{
        color:#cbd5e1 !important;

        padding-left:18px;

        font-size:9px;
    }

    .add-assignment-page .alert-danger li{
        margin-bottom:3px;
    }


    /* =========================================================
       FORM CARD
       ========================================================= */

    .assignment-form-card{
        width:100%;

        background:linear-gradient(
            145deg,
            #111b2a,
            #0d1521
        ) !important;

        border:1px solid #223149 !important;

        border-radius:15px;

        box-shadow:
            0 12px 30px rgba(0,0,0,.18);

        overflow:hidden;
    }


    /* =========================================================
       FORM SECTION
       ========================================================= */

    .assignment-form-section{
        padding:25px;

        border-bottom:1px solid #1e2b3e;
    }


    /* =========================================================
       SECTION HEADING
       ========================================================= */

    .assignment-section-heading{
        display:flex;

        align-items:center;

        gap:12px;

        margin-bottom:22px;
    }

    .assignment-section-icon{
        width:42px;
        height:42px;

        flex:0 0 42px;

        border-radius:11px;

        display:flex;
        align-items:center;
        justify-content:center;

        background:rgba(139,92,246,.10);

        border:1px solid rgba(139,92,246,.16);

        color:#a78bfa;

        font-size:17px;

        box-shadow:
            0 0 18px rgba(139,92,246,.05);
    }

    .assignment-section-icon i{
        filter:
            drop-shadow(
                0 0 6px rgba(34,211,238,.45)
            );
    }

    .assignment-section-title{
        font-size:14px;

        font-weight:850;

        color:#eef3fb;

        margin:0;
    }

    .assignment-section-subtitle{
        color:#64758c;

        font-size:9px;

        margin:3px 0 0;
    }


    /* =========================================================
       LABELS
       ========================================================= */

    .add-assignment-page .form-label{
        display:block;

        color:#aebbd0 !important;

        font-size:9px;

        font-weight:850;

        margin-bottom:7px;
    }

    .add-assignment-page .required-star{
        color:#fb7185 !important;
    }


    /* =========================================================
       SELECTS
       ========================================================= */

    .add-assignment-page .form-select{
        width:100%;

        min-height:43px;

        padding:8px 12px;

        background-color:#0d1725 !important;

        border:1px solid #27364b !important;

        border-radius:9px;

        color:#dbe4f2 !important;

        font-size:10px;

        font-weight:650;

        box-shadow:none !important;

        transition:
            border-color .2s ease,
            box-shadow .2s ease,
            background .2s ease;
    }

    .add-assignment-page .form-select:hover{
        border-color:#344861 !important;

        background-color:#101b2b !important;
    }

    .add-assignment-page .form-select:focus{
        background-color:#0d1725 !important;

        border-color:#8b5cf6 !important;

        color:#f1f5f9 !important;

        box-shadow:
            0 0 0 3px rgba(139,92,246,.10) !important;

        outline:none !important;
    }

    .add-assignment-page .form-select option{
        background:#0f1826 !important;

        color:#dbe4f2 !important;
    }


    /* =========================================================
       FORM HINT
       ========================================================= */

    .assignment-form-hint{
        color:#5f7089;

        font-size:8px;

        margin-top:5px;
    }


    /* =========================================================
       INFO BOX
       ========================================================= */

    .assignment-info-box{
        display:flex;

        align-items:flex-start;

        gap:7px;

        background:rgba(139,92,246,.055);

        border:1px solid rgba(139,92,246,.13);

        border-radius:10px;

        padding:11px 13px;

        color:#8494aa;

        font-size:9px;

        line-height:1.55;
    }

    .assignment-info-box i{
        flex:0 0 auto;

        color:#a78bfa;

        font-size:11px;

        margin-top:1px;

        filter:
            drop-shadow(
                0 0 5px rgba(139,92,246,.40)
            );
    }


    /* =========================================================
       FORM FOOTER
       ========================================================= */

    .assignment-form-footer{
        padding:18px 25px;

        background:#0d1623;

        border-top:1px solid #1e2b3e;

        display:flex;

        justify-content:flex-end;

        align-items:center;

        gap:9px;
    }


    /* =========================================================
       CANCEL BUTTON
       ========================================================= */

    .assignment-cancel-btn{
        display:inline-flex;

        align-items:center;
        justify-content:center;

        padding:9px 15px;

        border-radius:9px;

        background:#0d1725 !important;

        border:1px solid #26364d !important;

        color:#718096 !important;

        font-size:9px;

        font-weight:850;

        text-decoration:none;

        transition:
            transform .2s ease,
            background .2s ease,
            border-color .2s ease,
            color .2s ease;
    }

    .assignment-cancel-btn:hover{
        color:#dbe4f2 !important;

        background:#111c2c !important;

        border-color:#3a4c65 !important;

        transform:translateY(-2px);
    }


    /* =========================================================
       SUBMIT BUTTON
       ========================================================= */

    .assignment-submit-btn{
        position:relative;

        display:inline-flex;

        align-items:center;
        justify-content:center;

        gap:5px;

        overflow:hidden;

        padding:9px 15px;

        border-radius:9px;

        background:linear-gradient(
            135deg,
            #6848e8,
            #8b5cf6
        ) !important;

        border:1px solid rgba(167,139,250,.45) !important;

        color:#fff !important;

        font-size:9px;

        font-weight:850;

        cursor:pointer;

        box-shadow:
            0 7px 18px rgba(124,58,237,.20);

        transition:
            transform .25s ease,
            box-shadow .25s ease,
            border-color .25s ease;
    }

    .assignment-submit-btn::before{
        content:"";

        position:absolute;

        top:0;
        left:-120%;

        width:75%;
        height:100%;

        background:linear-gradient(
            90deg,
            transparent,
            rgba(255,255,255,.20),
            transparent
        );

        transform:skewX(-20deg);

        transition:left .55s ease;
    }

    .assignment-submit-btn:hover{
        color:#fff !important;

        transform:translateY(-3px);

        border-color:rgba(196,181,253,.75) !important;

        box-shadow:
            0 11px 26px rgba(124,58,237,.30),
            0 0 18px rgba(139,92,246,.10);
    }

    .assignment-submit-btn:hover::before{
        left:140%;
    }

    .assignment-submit-btn i{
        transition:transform .25s ease;
    }

    .assignment-submit-btn:hover i{
        transform:scale(1.08);

        filter:
            drop-shadow(
                0 0 5px rgba(255,255,255,.55)
            );
    }


    /* =========================================================
       MOBILE
       ========================================================= */

    @media(max-width:767px){

        body:has(.add-assignment-page) .page-content{
            padding:15px 15px 0 15px !important;
        }

        .assignment-form-header{
            align-items:flex-start;

            gap:12px;
        }

        .assignment-form-kicker{
            font-size:8px;
        }

        .assignment-form-title{
            font-size:22px;
        }

        .assignment-form-subtitle{
            font-size:10px;
        }

        .assignment-back-btn{
            padding:8px 10px;

            white-space:nowrap;

            font-size:8px;
        }

        .assignment-form-section{
            padding:20px;
        }

        .assignment-section-heading{
            margin-bottom:18px;
        }

        .assignment-section-icon{
            width:38px;
            height:38px;
            flex-basis:38px;
        }

        .assignment-form-footer{
            padding:16px 20px;
        }

        .assignment-cancel-btn,
        .assignment-submit-btn{
            padding:9px 12px;
        }
    }
</style>


<div class="add-assignment-page">

    {{-- =====================================================
         PAGE HEADER
         ===================================================== --}}

    <div class="assignment-form-header">

        <div>

            <div class="assignment-form-kicker">
                Academy Management
            </div>

            <h1 class="assignment-form-title">
                Assign Teacher
            </h1>

            <p class="assignment-form-subtitle">
                Assign a teacher to a class, group and subject.
            </p>

        </div>


        <a
            href="{{ route('teacher-assignments.index') }}"
            class="assignment-back-btn"
        >
            <i class="bi bi-arrow-left"></i>
            Back to Assignments
        </a>

    </div>


    {{-- =====================================================
         VALIDATION ERRORS
         ===================================================== --}}

    @if($errors->any())

        <div class="alert alert-danger border-0 shadow-sm mb-4">

            <strong>
                Please fix the following errors:
            </strong>

            <ul class="mb-0 mt-2">

                @foreach($errors->all() as $error)

                    <li>
                        {{ $error }}
                    </li>

                @endforeach

            </ul>

        </div>

    @endif


    {{-- =====================================================
         FORM CARD
         ===================================================== --}}

    <div class="assignment-form-card">

        <form
            action="{{ route('teacher-assignments.store') }}"
            method="POST"
        >

            @csrf


            {{-- =================================================
                 ASSIGNMENT INFORMATION
                 ================================================= --}}

            <div class="assignment-form-section">

                <div class="assignment-section-heading">

                    <div class="assignment-section-icon">

                        <i class="bi bi-person-workspace"></i>

                    </div>


                    <div>

                        <h5 class="assignment-section-title">
                            Assignment Information
                        </h5>

                        <p class="assignment-section-subtitle">
                            Select the teacher and academic details for this assignment
                        </p>

                    </div>

                </div>


                <div class="row g-3">


                    {{-- =========================================
                         TEACHER
                         ========================================= --}}

                    <div class="col-md-6">

                        <label class="form-label">

                            Teacher

                            <span class="required-star">
                                *
                            </span>

                        </label>


                        <select
                            name="teacher_id"
                            class="form-select"
                            required
                        >

                            <option value="">
                                Select Teacher
                            </option>


                            @foreach($teachers as $teacher)

                                <option
                                    value="{{ $teacher->id }}"
                                    {{ old('teacher_id') == $teacher->id ? 'selected' : '' }}
                                >
                                    {{ $teacher->first_name }}
                                    {{ $teacher->last_name }}
                                </option>

                            @endforeach

                        </select>


                        <div class="assignment-form-hint">
                            Select the teacher who will teach this subject.
                        </div>

                    </div>


                    {{-- =========================================
                         CLASS
                         ========================================= --}}

                    <div class="col-md-6">

                        <label class="form-label">

                            Class

                            <span class="required-star">
                                *
                            </span>

                        </label>


                        <select
                            name="academy_class_id"
                            class="form-select"
                            required
                        >

                            <option value="">
                                Select Class
                            </option>


                            @foreach($classes as $class)

                                <option
                                    value="{{ $class->id }}"
                                    {{ old('academy_class_id') == $class->id ? 'selected' : '' }}
                                >
                                    {{ $class->name }}
                                </option>

                            @endforeach

                        </select>


                        <div class="assignment-form-hint">
                            Choose the academy class for this assignment.
                        </div>

                    </div>


                    {{-- =========================================
                         GROUP
                         ========================================= --}}

                    <div class="col-md-6">

                        <label class="form-label">

                            Group

                            <span class="required-star">
                                *
                            </span>

                        </label>


                        <select
                            name="group_id"
                            class="form-select"
                            required
                        >

                            <option value="">
                                Select Group
                            </option>


                            @foreach($groups as $group)

                                <option
                                    value="{{ $group->id }}"
                                    {{ old('group_id') == $group->id ? 'selected' : '' }}
                                >
                                    {{ $group->name }}
                                </option>

                            @endforeach

                        </select>


                        <div class="assignment-form-hint">
                            Select the group this teacher will be assigned to.
                        </div>

                    </div>


                    {{-- =========================================
                         SUBJECT
                         ========================================= --}}

                    <div class="col-md-6">

                        <label class="form-label">

                            Subject

                            <span class="required-star">
                                *
                            </span>

                        </label>


                        <select
                            name="subject_id"
                            class="form-select"
                            required
                        >

                            <option value="">
                                Select Subject
                            </option>


                            @foreach($subjects as $subject)

                                <option
                                    value="{{ $subject->id }}"
                                    {{ old('subject_id') == $subject->id ? 'selected' : '' }}
                                >
                                    {{ $subject->name }}
                                </option>

                            @endforeach

                        </select>


                        <div class="assignment-form-hint">
                            Choose the subject that the teacher will teach.
                        </div>

                    </div>

                </div>


                {{-- =================================================
                     INFO
                     ================================================= --}}

                <div class="assignment-info-box mt-4">

                    <i class="bi bi-info-circle-fill"></i>

                    <span>
                        Make sure the selected teacher, class, group and subject
                        combination is correct before creating the assignment.
                    </span>

                </div>

            </div>


            {{-- =================================================
                 FOOTER
                 ================================================= --}}

            <div class="assignment-form-footer">

                <a
                    href="{{ route('teacher-assignments.index') }}"
                    class="assignment-cancel-btn"
                >
                    Cancel
                </a>


                <button
                    type="submit"
                    class="assignment-submit-btn"
                >

                    <i class="bi bi-person-check-fill"></i>

                    Assign Teacher

                </button>

            </div>

        </form>

    </div>

</div>

@endsection