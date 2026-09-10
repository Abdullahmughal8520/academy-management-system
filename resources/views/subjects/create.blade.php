@extends('layouts.app')

@section('title', 'Add Subject')

@section('content')

<style>
    /* =========================================================
       ADD SUBJECT PAGE — DARK ADMIN THEME
       ========================================================= */

    body:has(.add-subject-page){
        background:#080e17 !important;
    }

    body:has(.add-subject-page) .main-wrapper{
        background:#080e17 !important;
    }

    body:has(.add-subject-page) .page-content{
        background:#080e17 !important;
        padding:18px 20px 0 20px !important;
        margin:0 !important;
        min-height:calc(100vh - 76px) !important;
    }

    .add-subject-page{
        --sp-bg:#080e17;
        --sp-panel:#0f1826;
        --sp-panel2:#111c2c;
        --sp-border:#223149;
        --sp-border-soft:#1b293c;
        --sp-text:#edf3fb;
        --sp-muted:#718096;
        --sp-purple:#8b5cf6;
        --sp-purple-light:#a78bfa;
        --sp-cyan:#22d3ee;
        --sp-green:#22c55e;
        --sp-red:#f43f5e;
        --sp-orange:#f59e0b;

        width:100%;
        min-height:calc(100vh - 94px);

        margin:0 !important;
        padding:0 !important;

        color:var(--sp-text);

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

    .add-subject-page *,
    .add-subject-page *::before,
    .add-subject-page *::after{
        box-sizing:border-box;
    }


    /* =========================================================
       PAGE HEADER
       ========================================================= */

    .subject-form-header{
        display:flex;
        align-items:center;
        justify-content:space-between;

        gap:18px;

        margin-bottom:20px;
    }

    .subject-form-kicker{
        font-size:10px;
        letter-spacing:1.7px;
        text-transform:uppercase;

        color:#a78bfa;

        font-weight:900;

        margin-bottom:4px;
    }

    .subject-form-title{
        font-size:27px;
        line-height:1.15;

        font-weight:850;

        color:#f8fafc;

        margin:0 0 5px;
    }

    .subject-form-subtitle{
        font-size:12px;

        color:#728197;

        margin:0;
    }


    /* =========================================================
       BACK BUTTON
       ========================================================= */

    .subject-back-btn{
        display:inline-flex;

        align-items:center;
        justify-content:center;

        gap:6px;

        padding:9px 13px;

        border-radius:9px;

        background:#0d1725 !important;

        border:1px solid #26364d !important;

        color:#8b9ab0 !important;

        font-size:10px;

        font-weight:850;

        text-decoration:none;

        transition:
            transform .2s ease,
            background .2s ease,
            border-color .2s ease,
            color .2s ease;
    }

    .subject-back-btn:hover{
        background:#111c2c !important;

        border-color:#3a4c65 !important;

        color:#dbe4f2 !important;

        transform:translateY(-2px);
    }

    .subject-back-btn i{
        transition:transform .2s ease;
    }

    .subject-back-btn:hover i{
        transform:translateX(-3px);
    }


    /* =========================================================
       ALERTS
       ========================================================= */

    .add-subject-page .alert{
        border-radius:11px !important;

        font-size:10px !important;

        box-shadow:none !important;
    }

    .add-subject-page .alert-danger{
        background:rgba(244,63,94,.07) !important;

        border:1px solid rgba(244,63,94,.18) !important;

        color:#fda4af !important;

        padding:12px 14px !important;
    }

    .add-subject-page .alert-success{
        background:rgba(34,197,94,.08) !important;

        border:1px solid rgba(34,197,94,.18) !important;

        color:#86efac !important;

        padding:12px 14px !important;
    }

    .add-subject-page .alert strong{
        color:#fda4af !important;
    }

    .add-subject-page .alert ul{
        padding-left:20px;
    }


    /* =========================================================
       FORM CARD
       ========================================================= */

    .subject-form-card{
        width:100%;

        background:linear-gradient(
            145deg,
            #111b2a,
            #0d1521
        );

        border:1px solid #223149;

        border-radius:15px;

        box-shadow:
            0 12px 30px rgba(0,0,0,.18);

        overflow:hidden;
    }


    /* =========================================================
       FORM SECTIONS
       ========================================================= */

    .subject-form-section{
        padding:24px;

        border-bottom:1px solid #1b293c;
    }

    .subject-form-section:last-child{
        border-bottom:none;
    }


    /* =========================================================
       SECTION HEADING
       ========================================================= */

    .subject-section-heading{
        display:flex;

        align-items:center;

        gap:12px;

        margin-bottom:22px;
    }

    .subject-section-icon{
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
            0 0 18px rgba(139,92,246,.06);
    }

    .subject-section-icon i{
        filter:
            drop-shadow(
                0 0 5px rgba(34,211,238,.45)
            );
    }

    .subject-section-title{
        font-size:14px;

        font-weight:850;

        color:#edf3fb;

        margin:0;
    }

    .subject-section-subtitle{
        color:#64758c;

        font-size:9px;

        margin:4px 0 0;
    }


    /* =========================================================
       FORM LABELS
       ========================================================= */

    .add-subject-page .form-label{
        color:#aebbd0 !important;

        font-size:9px !important;

        font-weight:850 !important;

        margin-bottom:7px !important;
    }

    .required-star{
        color:#fb7185 !important;
    }


    /* =========================================================
       INPUTS
       ========================================================= */

    .add-subject-page .form-control,
    .add-subject-page .form-select{
        min-height:43px;

        background:#0d1725 !important;

        border:1px solid #27364b !important;

        color:#dbe4f2 !important;

        border-radius:8px;

        font-size:10px;

        box-shadow:none !important;

        transition:
            border-color .2s ease,
            box-shadow .2s ease,
            background .2s ease;
    }

    .add-subject-page .form-control{
        padding:10px 12px;
    }

    .add-subject-page .form-select{
        padding:10px 34px 10px 12px;
    }

    .add-subject-page .form-control::placeholder{
        color:#53647a !important;

        opacity:1;
    }

    .add-subject-page .form-control:focus,
    .add-subject-page .form-select:focus{
        background:#0f1a2a !important;

        border-color:#7c5ce6 !important;

        color:#edf3fb !important;

        box-shadow:
            0 0 0 3px rgba(139,92,246,.09),
            0 0 18px rgba(139,92,246,.06) !important;
    }

    .add-subject-page .form-select option{
        background:#0d1725;

        color:#dbe4f2;
    }

    .add-subject-page textarea.form-control{
        min-height:105px;

        resize:vertical;

        line-height:1.6;
    }


    /* =========================================================
       FORM HINT
       ========================================================= */

    .subject-form-hint{
        color:#596b82;

        font-size:8px;

        margin-top:5px;

        line-height:1.5;
    }


    /* =========================================================
       INFO BOX
       ========================================================= */

    .subject-info-box{
        background:rgba(139,92,246,.07);

        border:1px solid rgba(139,92,246,.16);

        border-radius:10px;

        padding:12px 14px;

        color:#a78bfa;

        font-size:9px;

        line-height:1.6;
    }

    .subject-info-box i{
        color:#22d3ee;

        filter:
            drop-shadow(
                0 0 5px rgba(34,211,238,.50)
            );
    }


    /* =========================================================
       FORM FOOTER
       ========================================================= */

    .subject-form-footer{
        padding:18px 24px;

        background:#0c1522;

        border-top:1px solid #1b293c;

        display:flex;

        justify-content:flex-end;

        align-items:center;

        gap:8px;
    }


    /* =========================================================
       CANCEL BUTTON
       ========================================================= */

    .subject-cancel-btn{
        display:inline-flex;

        align-items:center;
        justify-content:center;

        padding:9px 14px;

        border-radius:9px;

        background:#0d1725 !important;

        border:1px solid #26364d !important;

        color:#718096 !important;

        font-size:10px;

        font-weight:850;

        text-decoration:none;

        transition:
            transform .2s ease,
            background .2s ease,
            border-color .2s ease,
            color .2s ease;
    }

    .subject-cancel-btn:hover{
        background:#111c2c !important;

        border-color:#3a4c65 !important;

        color:#dbe4f2 !important;

        transform:translateY(-2px);
    }


    /* =========================================================
       SUBMIT BUTTON
       ========================================================= */

    .subject-submit-btn{
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

        font-size:10px;

        font-weight:850;

        box-shadow:
            0 8px 20px rgba(124,58,237,.20);

        transition:
            transform .25s ease,
            box-shadow .25s ease,
            border-color .25s ease;
    }

    .subject-submit-btn::before{
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

    .subject-submit-btn:hover{
        color:#fff !important;

        transform:translateY(-3px);

        border-color:rgba(196,181,253,.75) !important;

        box-shadow:
            0 12px 28px rgba(124,58,237,.30),
            0 0 18px rgba(139,92,246,.10);
    }

    .subject-submit-btn:hover::before{
        left:140%;
    }

    .subject-submit-btn i{
        transition:transform .25s ease;
    }

    .subject-submit-btn:hover i{
        transform:scale(1.12) rotate(90deg);

        filter:
            drop-shadow(
                0 0 5px rgba(255,255,255,.50)
            );
    }


    /* =========================================================
       MOBILE
       ========================================================= */

    @media(max-width:767px){

        body:has(.add-subject-page) .page-content{
            padding:15px 15px 0 15px !important;
        }

        .add-subject-page{
            min-height:calc(100vh - 80px);
        }

        .subject-form-header{
            align-items:flex-start;

            gap:12px;
        }

        .subject-form-kicker{
            font-size:8px;
        }

        .subject-form-title{
            font-size:22px;
        }

        .subject-form-subtitle{
            font-size:10px;
        }

        .subject-back-btn{
            padding:8px 10px;

            white-space:nowrap;
        }

        .subject-form-section{
            padding:20px;
        }

        .subject-form-footer{
            padding:17px 20px;
        }

        .subject-section-heading{
            margin-bottom:18px;
        }

        .subject-section-icon{
            width:38px;
            height:38px;
            flex-basis:38px;

            font-size:15px;
        }

        .subject-section-title{
            font-size:13px;
        }

        .subject-section-subtitle{
            font-size:8px;
        }
    }
</style>


<div class="add-subject-page">

    {{-- =====================================================
         PAGE HEADER
         ===================================================== --}}

    <div class="subject-form-header">

        <div>

            <div class="subject-form-kicker">
                Academy Management
            </div>

            <h1 class="subject-form-title">
                Add Subject
            </h1>

            <p class="subject-form-subtitle">
                Add a new subject and assign it to a class and group.
            </p>

        </div>


        <a
            href="{{ route('subjects.index') }}"
            class="subject-back-btn"
        >
            <i class="bi bi-arrow-left"></i>
            Back to Subjects
        </a>

    </div>


    {{-- =====================================================
         VALIDATION ERRORS
         ===================================================== --}}

    @if ($errors->any())

        <div class="alert alert-danger border-0 mb-4">

            <strong>
                <i class="bi bi-exclamation-circle-fill me-1"></i>
                Please fix the following errors:
            </strong>

            <ul class="mb-0 mt-2">

                @foreach ($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif


    {{-- =====================================================
         SUCCESS MESSAGE
         ===================================================== --}}

    @if (session('success'))

        <div class="alert alert-success border-0 mb-4">

            <i class="bi bi-check-circle-fill me-1"></i>

            {{ session('success') }}

        </div>

    @endif


    {{-- =====================================================
         FORM CARD
         ===================================================== --}}

    <div class="subject-form-card">

        <form
            action="{{ route('subjects.store') }}"
            method="POST"
        >

            @csrf


            {{-- =================================================
                 ASSIGNMENT INFORMATION
                 ================================================= --}}

            <div class="subject-form-section">

                <div class="subject-section-heading">

                    <div class="subject-section-icon">

                        <i class="bi bi-diagram-3-fill"></i>

                    </div>

                    <div>

                        <h2 class="subject-section-title">
                            Assignment Information
                        </h2>

                        <p class="subject-section-subtitle">
                            Select the class and group for this subject.
                        </p>

                    </div>

                </div>


                <div class="row g-4">

                    {{-- CLASS --}}

                    <div class="col-md-6">

                        <label class="form-label">

                            Class

                            <span class="required-star">*</span>

                        </label>


                        <select
                            name="academy_class_id"
                            class="form-select"
                        >

                            <option value="">
                                Select Class
                            </option>

                            @foreach ($classes as $class)

                                <option
                                    value="{{ $class->id }}"
                                    {{ old('academy_class_id') == $class->id ? 'selected' : '' }}
                                >
                                    {{ $class->name }}
                                </option>

                            @endforeach

                        </select>


                        <div class="subject-form-hint">

                            Select the academy class this subject belongs to.

                        </div>

                    </div>


                    {{-- GROUP --}}

                    <div class="col-md-6">

                        <label class="form-label">

                            Group

                            <span class="required-star">*</span>

                        </label>


                        <select
                            name="group_id"
                            class="form-select"
                        >

                            <option value="">
                                Select Group
                            </option>

                            @foreach ($groups as $group)

                                <option
                                    value="{{ $group->id }}"
                                    {{ old('group_id') == $group->id ? 'selected' : '' }}
                                >
                                    {{ $group->academyClass->name }}
                                    -
                                    {{ $group->name }}
                                </option>

                            @endforeach

                        </select>


                        <div class="subject-form-hint">

                            Select the group where this subject will be taught.

                        </div>

                    </div>

                </div>

            </div>


            {{-- =================================================
                 SUBJECT INFORMATION
                 ================================================= --}}

            <div class="subject-form-section">

                <div class="subject-section-heading">

                    <div class="subject-section-icon">

                        <i class="bi bi-book-fill"></i>

                    </div>

                    <div>

                        <h2 class="subject-section-title">
                            Subject Information
                        </h2>

                        <p class="subject-section-subtitle">
                            Enter the basic details of the subject.
                        </p>

                    </div>

                </div>


                <div class="row g-4">

                    {{-- SUBJECT NAME --}}

                    <div class="col-md-6">

                        <label class="form-label">

                            Subject Name

                            <span class="required-star">*</span>

                        </label>


                        <input
                            type="text"
                            name="name"
                            class="form-control"
                            value="{{ old('name') }}"
                            placeholder="e.g. Mathematics"
                        >


                        <div class="subject-form-hint">

                            Enter the full name of the subject.

                        </div>

                    </div>


                    {{-- SUBJECT CODE --}}

                    <div class="col-md-6">

                        <label class="form-label">
                            Subject Code
                        </label>


                        <input
                            type="text"
                            name="code"
                            class="form-control"
                            value="{{ old('code') }}"
                            placeholder="e.g. MATH-101"
                        >


                        <div class="subject-form-hint">

                            Optional code used to identify the subject.

                        </div>

                    </div>


                    {{-- DESCRIPTION --}}

                    <div class="col-12">

                        <label class="form-label">
                            Description
                        </label>


                        <textarea
                            name="description"
                            class="form-control"
                            rows="4"
                            placeholder="Subject description"
                        >{{ old('description') }}</textarea>


                        <div class="subject-form-hint">

                            Add a short description of what this subject covers.

                        </div>

                    </div>

                </div>

            </div>


            {{-- =================================================
                 INFORMATION BOX
                 ================================================= --}}

            <div class="subject-form-section">

                <div class="subject-info-box">

                    <i class="bi bi-info-circle-fill me-1"></i>

                    Make sure the selected class and group are correct
                    before adding the subject.

                </div>

            </div>


            {{-- =================================================
                 FORM FOOTER
                 ================================================= --}}

            <div class="subject-form-footer">

                <a
                    href="{{ route('subjects.index') }}"
                    class="subject-cancel-btn"
                >
                    Cancel
                </a>


                <button
                    type="submit"
                    class="subject-submit-btn"
                >

                    <i class="bi bi-plus-lg"></i>

                    Add Subject

                </button>

            </div>

        </form>

    </div>

</div>

@endsection