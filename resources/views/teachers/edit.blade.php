@extends('layouts.app')

@section('title', 'Edit Teacher')

@section('content')

<style>
    /* =========================================================
       EDIT TEACHER — DARK ADMIN THEME
    ========================================================= */

    .teacher-edit-page{
        --te-bg:#080e17;
        --te-panel:#0f1826;
        --te-panel2:#111c2c;
        --te-border:#223149;
        --te-border-soft:#1b293c;
        --te-text:#edf3fb;
        --te-muted:#718096;
        --te-purple:#8b5cf6;
        --te-purple-light:#a78bfa;
        --te-cyan:#22d3ee;
        --te-green:#22c55e;
        --te-red:#f43f5e;

        width:100%;
        min-height:auto;
        margin:0 !important;
        padding:0 !important;
        color:var(--te-text);

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
            var(--te-bg);
    }

    /* ================= HEADER ================= */

    .teacher-edit-header{
        display:flex;
        align-items:center;
        justify-content:space-between;
        gap:18px;
        margin-bottom:20px;
    }

    .teacher-edit-kicker{
        font-size:10px;
        text-transform:uppercase;
        letter-spacing:1.7px;
        color:var(--te-purple-light);
        font-weight:900;
        margin-bottom:5px;
    }

    .teacher-edit-title{
        margin:0;
        color:#f8fafc;
        font-size:27px;
        line-height:1.15;
        font-weight:850;
        letter-spacing:-.3px;
    }

    .teacher-edit-subtitle{
        margin:5px 0 0;
        color:#728197;
        font-size:11px;
    }

    /* ================= BACK BUTTON ================= */

    .teacher-back-btn{
        position:relative;
        display:inline-flex;
        align-items:center;
        justify-content:center;
        gap:7px;
        overflow:hidden;

        padding:10px 14px;
        border-radius:10px;

        background:#111d2d;
        border:1px solid #27364b;
        color:#aab7ca;

        font-size:10px;
        font-weight:850;
        text-decoration:none;

        transition:
            transform .25s ease,
            border-color .25s ease,
            color .25s ease,
            background .25s ease;
    }

    .teacher-back-btn:hover{
        color:#fff;
        background:#162237;
        border-color:rgba(139,92,246,.55);
        transform:translateY(-2px);
    }

    .teacher-back-btn i{
        transition:transform .25s ease;
    }

    .teacher-back-btn:hover i{
        transform:translateX(-3px);
    }

    /* ================= MAIN CARD ================= */

    .teacher-form-card{
        width:100%;
        overflow:hidden;

        background:
            linear-gradient(
                145deg,
                #111b2a,
                #0d1521
            );

        border:1px solid var(--te-border);
        border-radius:15px;

        box-shadow:
            0 12px 30px rgba(0,0,0,.18);
    }

    /* ================= FORM SECTION ================= */

    .teacher-form-section{
        padding:20px 22px;
        border-bottom:1px solid var(--te-border-soft);
    }

    .teacher-form-section:last-child{
        border-bottom:none;
    }

    /* ================= SECTION HEADING ================= */

    .teacher-section-heading{
        display:flex;
        align-items:center;
        gap:11px;
        margin-bottom:18px;
    }

    .teacher-section-icon{
        width:39px;
        height:39px;
        flex-shrink:0;

        display:grid;
        place-items:center;

        border-radius:11px;

        background:#172237;
        border:1px solid #26364d;

        color:var(--te-purple-light);
        font-size:16px;

        box-shadow:
            inset 0 0 12px rgba(139,92,246,.035);

        transition:
            transform .25s ease,
            box-shadow .25s ease,
            background .25s ease;
    }

    .teacher-section-heading:hover .teacher-section-icon{
        transform:scale(1.06);

        background:rgba(139,92,246,.11);

        box-shadow:
            0 0 18px rgba(139,92,246,.18),
            inset 0 0 12px rgba(139,92,246,.05);
    }

    .teacher-section-icon i{
        filter:
            drop-shadow(0 0 5px rgba(34,211,238,.55));
    }

    .teacher-section-title{
        margin:0;
        color:#eef3fb;
        font-size:12px;
        font-weight:850;
    }

    .teacher-section-subtitle{
        margin:3px 0 0;
        color:#687890;
        font-size:9px;
    }

    /* ================= FORM LABEL ================= */

    .teacher-edit-page .form-label{
        display:block;
        color:#aab7ca;
        font-size:9px;
        font-weight:850;
        letter-spacing:.2px;
        margin-bottom:7px;
    }

    .teacher-edit-page .required-star{
        color:#f43f5e;
    }

    /* ================= INPUTS ================= */

    .teacher-edit-page .form-control{
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

    .teacher-edit-page .form-control:hover{
        border-color:#34465f !important;
    }

    .teacher-edit-page .form-control:focus{
        background:#101b2b !important;
        color:#f1f5f9 !important;

        border-color:rgba(139,92,246,.72) !important;

        box-shadow:
            0 0 0 3px rgba(139,92,246,.10),
            0 0 18px rgba(139,92,246,.06) !important;

        outline:none;
    }

    .teacher-edit-page .form-control::placeholder{
        color:#526176 !important;
    }

    /* Date input icon */

    .teacher-edit-page input[type="date"]{
        color-scheme:dark;
    }

    /* ================= HINT ================= */

    .teacher-form-hint{
        margin-top:5px;
        color:#5f7089;
        font-size:8px;
    }

    /* ================= INFO BOX ================= */

    .teacher-info-box{
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

    .teacher-info-box i{
        color:var(--te-cyan);
        font-size:11px;
        margin-top:1px;
        filter:
            drop-shadow(0 0 5px rgba(34,211,238,.55));
    }

    /* ================= FOOTER ================= */

    .teacher-form-footer{
        display:flex;
        align-items:center;
        justify-content:flex-end;
        gap:9px;

        padding:16px 22px;

        background:#0b1420;
        border-top:1px solid var(--te-border-soft);
    }

    /* ================= CANCEL ================= */

    .teacher-cancel-btn{
        display:inline-flex;
        align-items:center;
        justify-content:center;

        padding:9px 15px;

        border-radius:9px;

        background:#111d2d;
        border:1px solid #27364b;
        color:#7f8da2;

        font-size:10px;
        font-weight:850;
        text-decoration:none;

        transition:
            transform .25s ease,
            border-color .25s ease,
            color .25s ease,
            background .25s ease;
    }

    .teacher-cancel-btn:hover{
        color:#dbe4f2;
        background:#162237;
        border-color:#3a4b65;
        transform:translateY(-2px);
    }

    /* ================= UPDATE BUTTON ================= */

    .teacher-submit-btn{
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

    .teacher-submit-btn::before{
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

    .teacher-submit-btn:hover{
        color:#fff;

        transform:translateY(-3px);

        border-color:rgba(196,181,253,.75);

        box-shadow:
            0 12px 30px rgba(124,58,237,.32),
            0 0 20px rgba(139,92,246,.12);
    }

    .teacher-submit-btn:hover::before{
        left:140%;
    }

    .teacher-submit-btn i{
        transition:transform .25s ease;
    }

    .teacher-submit-btn:hover i{
        transform:scale(1.12);

        filter:
            drop-shadow(0 0 5px rgba(255,255,255,.55));
    }

    /* ================= VALIDATION ================= */

    .teacher-edit-page .is-invalid{
        border-color:rgba(244,63,94,.65) !important;
    }

    .teacher-edit-page .invalid-feedback{
        color:#fb7185;
        font-size:9px;
    }

    /* ================= RESPONSIVE ================= */

    @media(max-width:767px){

        .teacher-edit-header{
            align-items:flex-start;
        }

        .teacher-edit-title{
            font-size:22px;
        }

        .teacher-edit-subtitle{
            font-size:10px;
        }

        .teacher-back-btn{
            padding:8px 10px;
            font-size:9px;
            white-space:nowrap;
        }

        .teacher-form-section{
            padding:18px 16px;
        }

        .teacher-form-footer{
            padding:15px 16px;
        }

    }

/* BALANCED PAGE SPACING */
body:has(.teacher-edit-page) .page-content{
    padding:0 !important;
    margin:0 !important;
}

.teacher-edit-page{
    margin:0 !important;
    padding:20px !important;
}  

</style>


<div class="teacher-edit-page">

    {{-- ================= PAGE HEADER ================= --}}

    <div class="teacher-edit-header">

        <div>

            <div class="teacher-edit-kicker">
                Teacher Management
            </div>

            <h1 class="teacher-edit-title">
                Edit Teacher
            </h1>

            <p class="teacher-edit-subtitle">
                Update the teacher's information and professional details.
            </p>

        </div>


        <a
            href="{{ url('/teachers') }}"
            class="teacher-back-btn"
        >
            <i class="bi bi-arrow-left"></i>
            Back to Teachers
        </a>

    </div>


    {{-- ================= TEACHER FORM ================= --}}

    <div class="teacher-form-card">

        <form
            action="{{ url('/teachers/' . $teacher->id) }}"
            method="POST"
        >

            @csrf
            @method('PUT')


            {{-- ================= PERSONAL INFORMATION ================= --}}

            <div class="teacher-form-section">

                <div class="teacher-section-heading">

                    <div class="teacher-section-icon">
                        <i class="bi bi-person-video3"></i>
                    </div>

                    <div>

                        <h5 class="teacher-section-title">
                            Personal Information
                        </h5>

                        <p class="teacher-section-subtitle">
                            Basic information about the teacher
                        </p>

                    </div>

                </div>


                <div class="row g-3">


                    {{-- Teacher Code --}}

                    <div class="col-md-6">

                        <label class="form-label">
                            Teacher Code
                            <span class="required-star">*</span>
                        </label>

                        <input
                            type="text"
                            name="teacher_code"
                            class="form-control"
                            value="{{ old('teacher_code', $teacher->teacher_code) }}"
                            placeholder="e.g. TCH-001"
                            required
                        >

                        <div class="teacher-form-hint">
                            A unique identification code for the teacher.
                        </div>

                    </div>


                    {{-- First Name --}}

                    <div class="col-md-6">

                        <label class="form-label">
                            First Name
                            <span class="required-star">*</span>
                        </label>

                        <input
                            type="text"
                            name="first_name"
                            class="form-control"
                            value="{{ old('first_name', $teacher->first_name) }}"
                            placeholder="Enter first name"
                            required
                        >

                    </div>


                    {{-- Last Name --}}

                    <div class="col-md-6">

                        <label class="form-label">
                            Last Name
                        </label>

                        <input
                            type="text"
                            name="last_name"
                            class="form-control"
                            value="{{ old('last_name', $teacher->last_name) }}"
                            placeholder="Enter last name"
                        >

                    </div>


                    {{-- Phone --}}

                    <div class="col-md-6">

                        <label class="form-label">
                            Phone
                        </label>

                        <input
                            type="text"
                            name="phone"
                            class="form-control"
                            value="{{ old('phone', $teacher->phone) }}"
                            placeholder="03XXXXXXXXX"
                        >

                    </div>

                </div>

            </div>


            {{-- ================= PROFESSIONAL INFORMATION ================= --}}

            <div class="teacher-form-section">

                <div class="teacher-section-heading">

                    <div class="teacher-section-icon">
                        <i class="bi bi-mortarboard-fill"></i>
                    </div>

                    <div>

                        <h5 class="teacher-section-title">
                            Professional Information
                        </h5>

                        <p class="teacher-section-subtitle">
                            Teacher qualification and joining details
                        </p>

                    </div>

                </div>


                <div class="row g-3">


                    {{-- Qualification --}}

                    <div class="col-md-6">

                        <label class="form-label">
                            Qualification
                        </label>

                        <input
                            type="text"
                            name="qualification"
                            class="form-control"
                            value="{{ old('qualification', $teacher->qualification) }}"
                            placeholder="e.g. BSCS, MSc, MPhil"
                        >

                    </div>


                    {{-- Joining Date --}}

                    <div class="col-md-6">

                        <label class="form-label">
                            Joining Date
                        </label>

                        <input
                            type="date"
                            name="joining_date"
                            class="form-control"
                            value="{{ old('joining_date', $teacher->joining_date) }}"
                        >

                    </div>

                </div>

            </div>


            {{-- ================= ACCOUNT INFORMATION ================= --}}

            <div class="teacher-form-section">

                <div class="teacher-section-heading">

                    <div class="teacher-section-icon">
                        <i class="bi bi-envelope-fill"></i>
                    </div>

                    <div>

                        <h5 class="teacher-section-title">
                            Account Information
                        </h5>

                        <p class="teacher-section-subtitle">
                            Email address for teacher login
                        </p>

                    </div>

                </div>


                <div class="row g-3">

                    {{-- Email --}}

                    <div class="col-md-6">

                        <label class="form-label">
                            Email
                            <span class="required-star">*</span>
                        </label>

                        <input
                            type="email"
                            name="email"
                            class="form-control"
                            value="{{ old('email', $teacher->email) }}"
                            placeholder="teacher@example.com"
                            required
                        >

                        <div class="teacher-form-hint">
                            This email can be used for the teacher's login account.
                        </div>

                    </div>

                </div>


                <div class="teacher-info-box mt-3">

                    <i class="bi bi-info-circle-fill"></i>

                    <div>
                        Changes made here will update the teacher's existing
                        information. The teacher's login account can be managed
                        separately from the Teachers page.
                    </div>

                </div>

            </div>


            {{-- ================= FOOTER ================= --}}

            <div class="teacher-form-footer">

                <a
                    href="{{ url('/teachers') }}"
                    class="teacher-cancel-btn"
                >
                    Cancel
                </a>

                <button
                    type="submit"
                    class="teacher-submit-btn"
                >
                    <i class="bi bi-check-lg"></i>
                    Update Teacher
                </button>

            </div>

        </form>

    </div>

</div>

@endsection