@extends('layouts.app')

@section('title', 'Add Teacher')

@section('content')

<style>
/* =========================================================
   ADD TEACHER PAGE — SAME ADMIN DASHBOARD DARK THEME
   ========================================================= */

:root{
    --at-bg:#080e17;
    --at-panel:#0f1826;
    --at-panel2:#111c2c;
    --at-input:#0b1420;
    --at-border:#223149;
    --at-border-soft:#1a2637;

    --at-text:#edf3fb;
    --at-text-light:#dbe4f2;

    --at-muted:#718096;
    --at-muted2:#64758c;

    --at-purple:#8b5cf6;
    --at-purple-light:#a78bfa;
    --at-cyan:#22d3ee;

    --at-green:#22c55e;
    --at-red:#f43f5e;
}


/* =========================================================
   PAGE BACKGROUND
   ========================================================= */

body:has(.add-teacher-page){
    background:var(--at-bg) !important;
}

body:has(.add-teacher-page) .main-wrapper{
    background:var(--at-bg) !important;
}

body:has(.add-teacher-page) .page-content{
    background:var(--at-bg) !important;
    min-height:calc(100vh - 76px) !important;
    padding:22px 24px 24px 24px !important;
    margin:0 !important;
}


/* =========================================================
   MAIN PAGE
   ========================================================= */

.add-teacher-page{
    width:100%;
    min-height:auto;
    margin:0 !important;
    padding:0 !important;

    color:var(--at-text);

    background:
        radial-gradient(
            circle at 85% 0%,
            rgba(139,92,246,.08),
            transparent 28%
        ),
        radial-gradient(
            circle at 5% 85%,
            rgba(34,211,238,.035),
            transparent 25%
        ),
        var(--at-bg);
}


/* =========================================================
   PAGE HEADER
   ========================================================= */

.add-teacher-heading{
    position:relative;

    display:flex;
    align-items:center;
    justify-content:space-between;

    gap:18px;
    width:100%;

    margin-bottom:20px;
    padding:18px 20px;

    background:
        linear-gradient(
            145deg,
            #111b2a,
            #0d1521
        );

    border:1px solid var(--at-border);
    border-radius:15px;

    box-shadow:
        0 12px 30px rgba(0,0,0,.12);

    overflow:hidden;
}

.add-teacher-heading::before{
    content:"";

    position:absolute;
    top:0;
    left:0;

    width:100%;
    height:1px;

    background:
        linear-gradient(
            90deg,
            transparent,
            rgba(139,92,246,.70),
            rgba(34,211,238,.45),
            transparent
        );
}

.add-teacher-heading::after{
    content:"";

    position:absolute;

    width:150px;
    height:150px;

    right:-80px;
    top:-80px;

    border-radius:50%;

    background:
        rgba(139,92,246,.06);

    pointer-events:none;
}

.add-teacher-heading h1{
    position:relative;
    z-index:2;

    margin:0 0 4px;

    color:#f8fafc;

    font-size:20px;
    line-height:1.15;
    font-weight:850;

    letter-spacing:-.3px;
}

.add-teacher-heading p{
    position:relative;
    z-index:2;

    margin:0;

    color:#728197;

    font-size:10px;
}


/* =========================================================
   BACK BUTTON
   ========================================================= */

.back-teachers-btn{
    position:relative;
    z-index:5;

    display:inline-flex;
    align-items:center;
    justify-content:center;

    gap:6px;

    padding:10px 15px;

    border-radius:10px;

    background:#0d1725;

    border:1px solid #26364d;

    color:#a78bfa;

    font-size:10px;
    font-weight:850;

    text-decoration:none;

    box-shadow:
        0 7px 18px rgba(0,0,0,.12);

    transition:
        transform .25s ease,
        background .25s ease,
        border-color .25s ease,
        color .25s ease,
        box-shadow .25s ease;
}

.back-teachers-btn:hover{
    color:#c4b5fd;

    background:#111c2c;

    border-color:
        rgba(139,92,246,.35);

    transform:translateY(-2px);

    box-shadow:
        0 10px 24px rgba(0,0,0,.18),
        0 0 18px rgba(139,92,246,.07);
}

.back-teachers-btn i{
    transition:
        transform .25s ease;
}

.back-teachers-btn:hover i{
    transform:
        translateX(-3px);
}


/* =========================================================
   FORM CARD
   ========================================================= */

.teacher-form-card{
    position:relative;

    width:100%;

    background:
        linear-gradient(
            145deg,
            #111b2a,
            #0d1521
        );

    border:1px solid var(--at-border);
    border-radius:15px;

    box-shadow:
        0 12px 30px rgba(0,0,0,.12);

    overflow:hidden;
}

.teacher-form-card::before{
    content:"";

    position:absolute;

    top:0;
    left:0;

    width:100%;
    height:1px;

    background:
        linear-gradient(
            90deg,
            transparent,
            rgba(139,92,246,.55),
            rgba(34,211,238,.35),
            transparent
        );

    z-index:3;
}


/* =========================================================
   FORM SECTION
   ========================================================= */

.form-section{
    padding:22px 24px;

    border-bottom:
        1px solid #1e2b3e;
}

.form-section:last-child{
    border-bottom:none;
}


/* =========================================================
   SECTION HEADING
   ========================================================= */

.section-heading{
    display:flex;
    align-items:center;

    gap:12px;

    margin-bottom:20px;
}

.section-icon{
    width:40px;
    height:40px;

    flex-shrink:0;

    display:flex;
    align-items:center;
    justify-content:center;

    border-radius:11px;

    background:
        rgba(139,92,246,.10);

    border:
        1px solid
        rgba(139,92,246,.15);

    color:#a78bfa;

    font-size:17px;

    box-shadow:
        inset 0 0 15px
        rgba(139,92,246,.035);

    filter:
        drop-shadow(
            0 0 5px
            rgba(34,211,238,.12)
        );
}

.section-title{
    font-size:12px;

    font-weight:850;

    color:#eef3fb;

    margin:0;
}

.section-subtitle{
    color:#687890;

    font-size:9px;

    margin:3px 0 0;
}


/* =========================================================
   FORM LABEL
   ========================================================= */

.form-label{
    display:block;

    color:#9aa9bd;

    font-size:9px;

    font-weight:850;

    margin-bottom:7px;

    text-transform:uppercase;

    letter-spacing:.35px;
}

.required-star{
    color:#fb7185;
}


/* =========================================================
   FORM INPUTS
   ========================================================= */

.form-control,
.form-select{
    min-height:41px;

    background:#0b1420 !important;

    border:
        1px solid #26364d !important;

    border-radius:9px !important;

    color:#dbe4f2 !important;

    font-size:10px !important;

    box-shadow:
        inset 0 1px 0
        rgba(255,255,255,.015);

    transition:
        border-color .2s ease,
        box-shadow .2s ease,
        background .2s ease;
}

.form-control::placeholder{
    color:#52647b !important;

    opacity:1;
}

.form-control:focus,
.form-select:focus{
    background:#0d1725 !important;

    border-color:
        rgba(139,92,246,.55) !important;

    color:#edf3fb !important;

    box-shadow:
        0 0 0 .18rem
        rgba(139,92,246,.08),
        0 0 18px
        rgba(139,92,246,.05) !important;

    outline:none !important;
}


/* =========================================================
   DATE INPUT
   ========================================================= */

input[type="date"]{
    color-scheme:dark;
}

input[type="date"]::-webkit-calendar-picker-indicator{
    filter:
        invert(72%)
        sepia(45%)
        saturate(1100%)
        hue-rotate(215deg);

    opacity:.8;

    cursor:pointer;
}


/* =========================================================
   FORM HINT
   ========================================================= */

.form-hint{
    color:#64758c;

    font-size:8px;

    margin-top:5px;

    line-height:1.5;
}


/* =========================================================
   INFO BOX
   ========================================================= */

.info-box{
    display:flex;
    align-items:flex-start;

    gap:7px;

    background:
        rgba(139,92,246,.055);

    border:
        1px solid
        rgba(139,92,246,.13);

    border-radius:10px;

    padding:11px 13px;

    color:#8d7ce4;

    font-size:9px;

    line-height:1.55;
}

.info-box i{
    color:#a78bfa;

    font-size:10px;

    margin-top:1px;
}


/* =========================================================
   VALIDATION ERRORS
   ========================================================= */

.invalid-feedback{
    color:#fb7185 !important;

    font-size:8px !important;

    margin-top:5px;
}

.form-control.is-invalid{
    border-color:
        rgba(244,63,94,.55) !important;

    background:#120f18 !important;

    box-shadow:
        0 0 0 .15rem
        rgba(244,63,94,.06) !important;
}


/* =========================================================
   FORM FOOTER
   ========================================================= */

.form-footer{
    padding:16px 24px;

    background:#0b1420;

    border-top:
        1px solid #1e2b3e;

    display:flex;

    justify-content:flex-end;

    align-items:center;

    gap:8px;
}


/* =========================================================
   CANCEL BUTTON
   ========================================================= */

.cancel-btn{
    display:inline-flex;
    align-items:center;
    justify-content:center;

    gap:5px;

    background:#0d1725;

    color:#718096;

    border:
        1px solid #26364d;

    padding:9px 14px;

    border-radius:9px;

    font-size:9px;

    font-weight:850;

    text-decoration:none;

    transition:
        transform .2s ease,
        background .2s ease,
        border-color .2s ease,
        color .2s ease;
}

.cancel-btn:hover{
    color:#dbe4f2;

    background:#111c2c;

    border-color:#3a4c65;

    transform:translateY(-2px);
}


/* =========================================================
   SUBMIT BUTTON
   ========================================================= */

.submit-btn{
    position:relative;

    display:inline-flex;
    align-items:center;
    justify-content:center;

    gap:5px;

    overflow:hidden;

    background:
        linear-gradient(
            135deg,
            #6848e8,
            #8b5cf6
        );

    color:white;

    border:
        1px solid
        rgba(167,139,250,.45);

    padding:9px 15px;

    border-radius:9px;

    font-size:9px;

    font-weight:850;

    box-shadow:
        0 8px 20px
        rgba(124,58,237,.20);

    transition:
        transform .25s ease,
        box-shadow .25s ease,
        border-color .25s ease;
}

.submit-btn::before{
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

.submit-btn:hover{
    color:#fff;

    transform:translateY(-2px);

    border-color:
        rgba(196,181,253,.75);

    box-shadow:
        0 11px 27px
        rgba(124,58,237,.30),
        0 0 18px
        rgba(139,92,246,.10);
}

.submit-btn:hover::before{
    left:140%;
}

.submit-btn i{
    transition:
        transform .25s ease;
}

.submit-btn:hover i{
    transform:
        scale(1.08);

    filter:
        drop-shadow(
            0 0 5px
            rgba(255,255,255,.5)
        );
}


/* =========================================================
   ROW / COLUMN SPACING
   ========================================================= */

.teacher-form-card .row{
    --bs-gutter-x:18px;
    --bs-gutter-y:16px;
}


/* =========================================================
   MOBILE
   ========================================================= */

@media(max-width:767px){

    body:has(.add-teacher-page) .page-content{
        padding:
            16px 15px 20px 15px !important;
    }

    .add-teacher-heading{
        padding:15px;

        margin-bottom:15px;

        gap:12px;

        align-items:flex-start !important;
    }

    .add-teacher-heading h1{
        font-size:17px;
    }

    .add-teacher-heading p{
        font-size:8px;
    }

    .back-teachers-btn{
        padding:8px 10px;

        font-size:8px;

        white-space:nowrap;
    }

    .teacher-form-card{
        border-radius:13px;
    }

    .form-section{
        padding:18px 16px;
    }

    .section-heading{
        margin-bottom:17px;
    }

    .section-icon{
        width:37px;
        height:37px;

        font-size:15px;
    }

    .section-title{
        font-size:11px;
    }

    .section-subtitle{
        font-size:8px;
    }

    .form-label{
        font-size:8px;
    }

    .form-control,
    .form-select{
        min-height:39px;

        font-size:9px !important;
    }

    .form-hint{
        font-size:7px;
    }

    .info-box{
        font-size:8px;
    }

    .form-footer{
        padding:14px 16px;

        gap:7px;
    }

    .cancel-btn,
    .submit-btn{
        padding:8px 11px;

        font-size:8px;
    }
}


/* =========================================================
   EXTRA DARK THEME OVERRIDES
   ========================================================= */

.add-teacher-page input,
.add-teacher-page textarea,
.add-teacher-page select{
    color:#dbe4f2 !important;
}

.add-teacher-page input:autofill,
.add-teacher-page input:-webkit-autofill{
    -webkit-text-fill-color:#dbe4f2 !important;

    -webkit-box-shadow:
        0 0 0 1000px #0b1420 inset !important;

    transition:
        background-color 9999s ease-out;
}

.add-teacher-page .text-danger{
    color:#fb7185 !important;
}
</style>

<div class="add-teacher-page">


{{-- =====================================================
     PAGE HEADER
====================================================== --}}

<div class="add-teacher-heading">

    <div>

        <h1>
            Add Teacher
        </h1>

        <p>
            Create a new teacher record for the academy.
        </p>

    </div>


    <a
        href="{{ url('/teachers') }}"
        class="back-teachers-btn"
    >
        <i class="bi bi-arrow-left"></i>
        Back to Teachers
    </a>

</div>



{{-- =====================================================
     TEACHER FORM CARD
====================================================== --}}

<div class="teacher-form-card">

    <form
        action="{{ url('/teachers') }}"
        method="POST"
    >

        @csrf


        {{-- =================================================
             PERSONAL INFORMATION
        ================================================== --}}

        <div class="form-section">

            <div class="section-heading">

                <div class="section-icon">

                    <i class="bi bi-person-video3"></i>

                </div>

                <div>

                    <h5 class="section-title">
                        Personal Information
                    </h5>

                    <p class="section-subtitle">
                        Basic information about the teacher
                    </p>

                </div>

            </div>


            <div class="row">


                {{-- Teacher Code --}}

                <div class="col-md-6">

                    <label class="form-label">

                        Teacher Code

                        <span class="required-star">
                            *
                        </span>

                    </label>

                    <input
                        type="text"
                        name="teacher_code"
                        class="form-control @error('teacher_code') is-invalid @enderror"
                        value="{{ old('teacher_code') }}"
                        placeholder="e.g. TCH-001"
                        required
                    >

                    <div class="form-hint">
                        A unique identification code for the teacher.
                    </div>

                    @error('teacher_code')
                        <div class="invalid-feedback d-block">
                            {{ $message }}
                        </div>
                    @enderror

                </div>


                {{-- First Name --}}

                <div class="col-md-6">

                    <label class="form-label">

                        First Name

                        <span class="required-star">
                            *
                        </span>

                    </label>

                    <input
                        type="text"
                        name="first_name"
                        class="form-control @error('first_name') is-invalid @enderror"
                        value="{{ old('first_name') }}"
                        placeholder="Enter first name"
                        required
                    >

                    @error('first_name')
                        <div class="invalid-feedback d-block">
                            {{ $message }}
                        </div>
                    @enderror

                </div>


                {{-- Last Name --}}

                <div class="col-md-6">

                    <label class="form-label">
                        Last Name
                    </label>

                    <input
                        type="text"
                        name="last_name"
                        class="form-control @error('last_name') is-invalid @enderror"
                        value="{{ old('last_name') }}"
                        placeholder="Enter last name"
                    >

                    @error('last_name')
                        <div class="invalid-feedback d-block">
                            {{ $message }}
                        </div>
                    @enderror

                </div>


                {{-- Phone --}}

                <div class="col-md-6">

                    <label class="form-label">
                        Phone
                    </label>

                    <input
                        type="text"
                        name="phone"
                        class="form-control @error('phone') is-invalid @enderror"
                        value="{{ old('phone') }}"
                        placeholder="03XXXXXXXXX"
                    >

                    @error('phone')
                        <div class="invalid-feedback d-block">
                            {{ $message }}
                        </div>
                    @enderror

                </div>


            </div>

        </div>



        {{-- =================================================
             PROFESSIONAL INFORMATION
        ================================================== --}}

        <div class="form-section">

            <div class="section-heading">

                <div class="section-icon">

                    <i class="bi bi-mortarboard-fill"></i>

                </div>

                <div>

                    <h5 class="section-title">
                        Professional Information
                    </h5>

                    <p class="section-subtitle">
                        Teacher qualification and joining details
                    </p>

                </div>

            </div>


            <div class="row">


                {{-- Qualification --}}

                <div class="col-md-6">

                    <label class="form-label">
                        Qualification
                    </label>

                    <input
                        type="text"
                        name="qualification"
                        class="form-control @error('qualification') is-invalid @enderror"
                        value="{{ old('qualification') }}"
                        placeholder="e.g. BSCS, MSc, MPhil"
                    >

                    @error('qualification')
                        <div class="invalid-feedback d-block">
                            {{ $message }}
                        </div>
                    @enderror

                </div>


                {{-- Joining Date --}}

                <div class="col-md-6">

                    <label class="form-label">
                        Joining Date
                    </label>

                    <input
                        type="date"
                        name="joining_date"
                        class="form-control @error('joining_date') is-invalid @enderror"
                        value="{{ old('joining_date') }}"
                    >

                    @error('joining_date')
                        <div class="invalid-feedback d-block">
                            {{ $message }}
                        </div>
                    @enderror

                </div>


            </div>

        </div>



        {{-- =================================================
             ACCOUNT INFORMATION
        ================================================== --}}

        <div class="form-section">

            <div class="section-heading">

                <div class="section-icon">

                    <i class="bi bi-envelope-fill"></i>

                </div>

                <div>

                    <h5 class="section-title">
                        Account Information
                    </h5>

                    <p class="section-subtitle">
                        Email address for teacher login
                    </p>

                </div>

            </div>


            <div class="row">


                {{-- Email --}}

                <div class="col-md-6">

                    <label class="form-label">

                        Email

                        <span class="required-star">
                            *
                        </span>

                    </label>

                    <input
                        type="email"
                        name="email"
                        class="form-control @error('email') is-invalid @enderror"
                        value="{{ old('email') }}"
                        placeholder="teacher@example.com"
                        required
                    >

                    <div class="form-hint">
                        This email can be used to create the teacher's login account.
                    </div>

                    @error('email')
                        <div class="invalid-feedback d-block">
                            {{ $message }}
                        </div>
                    @enderror

                </div>


            </div>


            <div class="info-box mt-3">

                <i class="bi bi-info-circle-fill"></i>

                <span>
                    After creating the teacher, you can create their login
                    account from the Teachers page.
                </span>

            </div>

        </div>



        {{-- =================================================
             FORM FOOTER
        ================================================== --}}

        <div class="form-footer">

            <a
                href="{{ url('/teachers') }}"
                class="cancel-btn"
            >
                <i class="bi bi-x-lg"></i>
                Cancel
            </a>


            <button
                type="submit"
                class="submit-btn"
            >
                <i class="bi bi-person-plus-fill"></i>
                Add Teacher
            </button>

        </div>


    </form>

</div>


</div>

@endsection
