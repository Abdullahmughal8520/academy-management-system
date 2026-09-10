@extends('layouts.app')

@section('title', 'Add Class')

@section('content')

<style>
    /* =========================================================
       ADD CLASS PAGE — DARK ADMIN THEME
       ========================================================= */

    body:has(.add-class-page){
        background:#080e17 !important;
    }

    body:has(.add-class-page) .main-wrapper{
        background:#080e17 !important;
    }

    body:has(.add-class-page) .page-content{
        background:#080e17 !important;
        padding:18px 20px 0 20px !important;
        margin:0 !important;
        min-height:calc(100vh - 76px) !important;
    }

    .add-class-page{
        --c-bg:#080e17;
        --c-panel:#0f1826;
        --c-panel2:#111c2c;
        --c-border:#223149;
        --c-border-soft:#1a2637;
        --c-text:#edf3fb;
        --c-muted:#718096;
        --c-purple:#8b5cf6;
        --c-purple-light:#a78bfa;
        --c-cyan:#22d3ee;
        --c-green:#22c55e;
        --c-red:#f43f5e;
        --c-orange:#f59e0b;

        width:100%;
        min-height:calc(100vh - 94px);

        margin:0 !important;
        padding:0 !important;

        color:var(--c-text);

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

    .add-class-page *,
    .add-class-page *::before,
    .add-class-page *::after{
        box-sizing:border-box;
    }


    /* =========================================================
       PAGE HEADER
       ========================================================= */

    .form-page-header{
        display:flex;
        align-items:center;
        justify-content:space-between;

        gap:18px;

        margin-bottom:20px;
    }

    .form-page-kicker{
        font-size:10px;
        letter-spacing:1.7px;
        text-transform:uppercase;

        color:#a78bfa;

        font-weight:900;

        margin-bottom:4px;
    }

    .form-page-title{
        font-size:27px;
        line-height:1.15;

        font-weight:850;

        color:#f8fafc;

        margin:0 0 5px;
    }

    .form-page-subtitle{
        font-size:12px;

        color:#728197;

        margin:0;
    }


    /* =========================================================
       BACK BUTTON
       ========================================================= */

    .back-btn{
        position:relative;

        display:inline-flex;
        align-items:center;
        justify-content:center;

        gap:6px;

        padding:9px 14px;

        border-radius:9px;

        background:#0d1725 !important;

        color:#9aa9bd !important;

        border:1px solid #26364d !important;

        font-size:10px;
        font-weight:850;

        text-decoration:none;

        transition:
            transform .2s ease,
            background .2s ease,
            border-color .2s ease,
            color .2s ease;
    }

    .back-btn:hover{
        background:#111c2c !important;

        color:#dbe4f2 !important;

        border-color:#3a4c65 !important;

        transform:translateY(-2px);
    }

    .back-btn i{
        transition:transform .2s ease;
    }

    .back-btn:hover i{
        transform:translateX(-3px);
    }


    /* =========================================================
       VALIDATION / ALERTS
       ========================================================= */

    .add-class-page .alert-danger{
        background:rgba(244,63,94,.07) !important;

        border:1px solid rgba(244,63,94,.18) !important;

        color:#fda4af !important;

        border-radius:11px !important;

        padding:12px 14px !important;

        font-size:10px;

        box-shadow:none !important;
    }

    .add-class-page .alert-danger strong{
        color:#fda4af !important;

        font-size:10px;
    }

    .add-class-page .alert-danger ul{
        color:#9f7a85 !important;

        font-size:9px;
    }

    .add-class-page .alert-success{
        background:rgba(34,197,94,.08) !important;

        border:1px solid rgba(34,197,94,.18) !important;

        color:#86efac !important;

        border-radius:11px !important;

        padding:11px 14px !important;

        font-size:10px;

        box-shadow:none !important;
    }


    /* =========================================================
       FORM CARD
       ========================================================= */

    .class-form-card{
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
       FORM SECTION
       ========================================================= */

    .form-section{
        padding:22px 24px;

        border-bottom:1px solid #1e2b3e;
    }

    .section-heading{
        display:flex;
        align-items:center;

        gap:11px;

        margin-bottom:21px;
    }

    .section-icon{
        width:40px;
        height:40px;

        flex-shrink:0;

        border-radius:11px;

        display:flex;
        align-items:center;
        justify-content:center;

        background:rgba(139,92,246,.10);

        border:1px solid rgba(139,92,246,.15);

        color:#a78bfa;

        font-size:17px;

        box-shadow:
            0 0 18px rgba(139,92,246,.06);

        transition:
            transform .25s ease,
            box-shadow .25s ease;
    }

    .section-icon i{
        filter:
            drop-shadow(
                0 0 5px rgba(34,211,238,.55)
            );
    }

    .section-heading:hover .section-icon{
        transform:scale(1.06);

        box-shadow:
            0 0 20px rgba(139,92,246,.14);
    }

    .section-title{
        font-size:13px;

        font-weight:850;

        color:#eef3fb;

        margin:0;
    }

    .section-subtitle{
        color:#64758c;

        font-size:9px;

        margin:3px 0 0;
    }


    /* =========================================================
       LABELS
       ========================================================= */

    .add-class-page .form-label{
        color:#aab7ca !important;

        font-size:9px !important;

        font-weight:850 !important;

        margin-bottom:7px !important;

        text-transform:uppercase;

        letter-spacing:.45px;
    }


    /* =========================================================
       INPUTS
       ========================================================= */

    .add-class-page .form-control{
        min-height:42px;

        background:#0d1725 !important;

        border:1px solid #27364b !important;

        border-radius:9px !important;

        color:#dbe4f2 !important;

        font-size:10px !important;

        box-shadow:none !important;

        transition:
            border-color .2s ease,
            box-shadow .2s ease,
            background .2s ease;
    }

    .add-class-page textarea.form-control{
        min-height:110px;

        resize:vertical;
    }

    .add-class-page .form-control:focus{
        background:#0e1928 !important;

        color:#edf3fb !important;

        border-color:#8b5cf6 !important;

        box-shadow:
            0 0 0 3px rgba(139,92,246,.10),
            0 0 18px rgba(139,92,246,.05) !important;

        outline:none !important;
    }

    .add-class-page .form-control::placeholder{
        color:#4f6077 !important;
    }


    /* =========================================================
       HINT
       ========================================================= */

    .form-hint{
        color:#586a82;

        font-size:8px;

        margin-top:5px;
    }


    /* =========================================================
       INFO BOX
       ========================================================= */

    .info-box{
        background:rgba(139,92,246,.055);

        border:1px solid rgba(139,92,246,.14);

        border-radius:10px;

        padding:11px 13px;

        color:#8794aa;

        font-size:9px;

        line-height:1.55;
    }

    .info-box i{
        color:#a78bfa;

        filter:
            drop-shadow(
                0 0 5px rgba(139,92,246,.45)
            );
    }


    /* =========================================================
       FORM FOOTER
       ========================================================= */

    .form-footer{
        padding:16px 24px;

        background:#0d1725;

        border-top:1px solid #1a2637;

        display:flex;

        justify-content:flex-end;

        gap:8px;
    }


    /* =========================================================
       CANCEL BUTTON
       ========================================================= */

    .cancel-btn{
        display:inline-flex;
        align-items:center;
        justify-content:center;

        background:#0b1420 !important;

        color:#718096 !important;

        border:1px solid #26364d !important;

        padding:9px 15px;

        border-radius:9px;

        font-size:10px;

        font-weight:850;

        text-decoration:none;

        transition:
            transform .2s ease,
            background .2s ease,
            border-color .2s ease,
            color .2s ease;
    }

    .cancel-btn:hover{
        color:#dbe4f2 !important;

        background:#111c2c !important;

        border-color:#3a4c65 !important;

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

        background:linear-gradient(
            135deg,
            #6848e8,
            #8b5cf6
        ) !important;

        color:#fff !important;

        border:1px solid rgba(167,139,250,.45) !important;

        padding:9px 16px;

        border-radius:9px;

        font-size:10px;

        font-weight:850;

        box-shadow:
            0 7px 18px rgba(124,58,237,.18);

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

        background:linear-gradient(
            90deg,
            transparent,
            rgba(255,255,255,.20),
            transparent
        );

        transform:skewX(-20deg);

        transition:left .5s ease;
    }

    .submit-btn:hover{
        color:#fff !important;

        transform:translateY(-2px);

        border-color:rgba(196,181,253,.75) !important;

        box-shadow:
            0 10px 25px rgba(124,58,237,.30),
            0 0 18px rgba(139,92,246,.10);
    }

    .submit-btn:hover::before{
        left:140%;
    }

    .submit-btn i{
        transition:transform .2s ease;
    }

    .submit-btn:hover i{
        transform:scale(1.12);
    }


    /* =========================================================
       MOBILE
       ========================================================= */

    @media(max-width:767px){

        body:has(.add-class-page) .page-content{
            padding:15px 15px 0 15px !important;
        }

        .add-class-page{
            min-height:calc(100vh - 80px);
        }

        .form-page-header{
            align-items:flex-start;

            gap:12px;
        }

        .form-page-kicker{
            font-size:8px;
        }

        .form-page-title{
            font-size:22px;
        }

        .form-page-subtitle{
            font-size:10px;
        }

        .back-btn{
            padding:8px 10px;

            white-space:nowrap;

            font-size:9px;
        }

        .form-section{
            padding:20px;
        }

        .form-footer{
            padding:16px 20px;
        }

        .class-form-card{
            border-radius:12px;
        }
    }
</style>


<div class="add-class-page">

    {{-- PAGE HEADER --}}
    <div class="form-page-header">

        <div>

            <div class="form-page-kicker">
                Academy Management
            </div>

            <h1 class="form-page-title">
                Add Class
            </h1>

            <p class="form-page-subtitle">
                Create a new class for your academy.
            </p>

        </div>


        <a
            href="{{ route('classes.index') }}"
            class="back-btn"
        >
            <i class="bi bi-arrow-left"></i>
            Back to Classes
        </a>

    </div>


    {{-- VALIDATION ERRORS --}}
    @if ($errors->any())

        <div class="alert alert-danger border-0 mb-4">

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


    {{-- SUCCESS --}}
    @if (session('success'))

        <div class="alert alert-success border-0 mb-4">

            <i class="bi bi-check-circle-fill me-1"></i>

            {{ session('success') }}

        </div>

    @endif


    {{-- FORM CARD --}}
    <div class="class-form-card">

        <form
            action="{{ route('classes.store') }}"
            method="POST"
        >

            @csrf


            {{-- CLASS INFORMATION --}}
            <div class="form-section">

                <div class="section-heading">

                    <div class="section-icon">
                        <i class="bi bi-mortarboard"></i>
                    </div>

                    <div>

                        <h5 class="section-title">
                            Class Information
                        </h5>

                        <p class="section-subtitle">
                            Enter the basic information about the class
                        </p>

                    </div>

                </div>


                <div class="row g-3">

                    {{-- CLASS NAME --}}
                    <div class="col-md-6">

                        <label class="form-label">
                            Class Name
                        </label>

                        <input
                            type="text"
                            name="name"
                            class="form-control"
                            value="{{ old('name') }}"
                            placeholder="e.g. 9th"
                        >

                        <div class="form-hint">
                            Enter the name or grade of the class.
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
                            placeholder="Write a short description about this class..."
                        >{{ old('description') }}</textarea>

                        <div class="form-hint">
                            Add any useful information about this class.
                        </div>

                    </div>

                </div>


                {{-- INFO BOX --}}
                <div class="info-box mt-4">

                    <i class="bi bi-info-circle-fill me-1"></i>

                    Make sure the class name is clear and easy to identify
                    when assigning students and teachers.

                </div>

            </div>


            {{-- FORM FOOTER --}}
            <div class="form-footer">

                <a
                    href="{{ route('classes.index') }}"
                    class="cancel-btn"
                >
                    Cancel
                </a>

                <button
                    type="submit"
                    class="submit-btn"
                >
                    <i class="bi bi-check-lg"></i>
                    Add Class
                </button>

            </div>

        </form>

    </div>

</div>

@endsection