@extends('layouts.app')

@section('title', 'Edit Group')

@section('content')

<style>
    /* =========================================================
       EDIT GROUP PAGE — DARK ADMIN THEME
       ========================================================= */

    body:has(.edit-group-page){
        background:#080e17 !important;
    }

    body:has(.edit-group-page) .main-wrapper{
        background:#080e17 !important;
    }

    body:has(.edit-group-page) .page-content{
        background:#080e17 !important;
        padding:18px 20px 0 20px !important;
        margin:0 !important;
        min-height:calc(100vh - 76px) !important;
    }

    .edit-group-page{
        --g-bg:#080e17;
        --g-panel:#0f1826;
        --g-panel2:#111c2c;
        --g-border:#223149;
        --g-border-soft:#1a2637;
        --g-text:#edf3fb;
        --g-muted:#718096;
        --g-purple:#8b5cf6;
        --g-purple-light:#a78bfa;
        --g-cyan:#22d3ee;
        --g-green:#22c55e;
        --g-red:#f43f5e;
        --g-orange:#f59e0b;

        width:100%;
        min-height:calc(100vh - 94px);

        margin:0 !important;
        padding:0 !important;

        color:var(--g-text);

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

    .edit-group-page *,
    .edit-group-page *::before,
    .edit-group-page *::after{
        box-sizing:border-box;
    }


    /* =========================================================
       HEADER
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
        color:#728197;

        font-size:12px;

        margin:0;
    }


    /* =========================================================
       BACK BUTTON
       ========================================================= */

    .back-btn{
        display:inline-flex;

        align-items:center;
        justify-content:center;

        gap:6px;

        padding:10px 15px;

        border-radius:10px;

        background:#0d1725 !important;

        border:1px solid #26364d !important;

        color:#94a3b8 !important;

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
       VALIDATION ERRORS
       ========================================================= */

    .edit-group-page .alert-danger{
        background:rgba(244,63,94,.08) !important;

        border:1px solid rgba(244,63,94,.18) !important;

        color:#fda4af !important;

        border-radius:11px !important;

        padding:12px 14px !important;

        font-size:10px;

        box-shadow:none !important;
    }

    .edit-group-page .alert-danger strong{
        color:#fb7185 !important;

        font-weight:850;
    }

    .edit-group-page .alert-danger ul{
        color:#94a3b8 !important;

        padding-left:18px;
    }


    /* =========================================================
       FORM CARD
       ========================================================= */

    .group-form-card{
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

    .form-section{
        padding:24px;

        border-bottom:1px solid #1e2b3e;
    }

    .form-section:last-of-type{
        border-bottom:0;
    }

    .section-heading{
        display:flex;

        align-items:center;

        gap:12px;

        margin-bottom:22px;
    }

    .section-icon{
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

        transition:
            transform .25s ease,
            box-shadow .25s ease;
    }

    .section-heading:hover .section-icon{
        transform:scale(1.06);

        box-shadow:
            0 0 20px rgba(139,92,246,.14);
    }

    .section-icon i{
        filter:
            drop-shadow(
                0 0 5px rgba(34,211,238,.55)
            );
    }

    .section-title{
        font-size:14px;

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

    .edit-group-page .form-label{
        display:block;

        color:#aab7ca !important;

        font-size:9px !important;

        font-weight:850 !important;

        margin-bottom:7px !important;

        letter-spacing:.15px;
    }


    /* =========================================================
       INPUTS / SELECT
       ========================================================= */

    .edit-group-page .form-control,
    .edit-group-page .form-select{
        min-height:42px;

        background:#0d1725 !important;

        border:1px solid #27364b !important;

        color:#dbe4f2 !important;

        border-radius:9px !important;

        font-size:10px !important;

        padding:9px 11px !important;

        box-shadow:none !important;

        transition:
            border-color .2s ease,
            box-shadow .2s ease,
            background .2s ease;
    }

    .edit-group-page .form-control:hover,
    .edit-group-page .form-select:hover{
        border-color:#33465f !important;
    }

    .edit-group-page .form-control:focus,
    .edit-group-page .form-select:focus{
        background:#0e1928 !important;

        border-color:#8b5cf6 !important;

        color:#f1f5f9 !important;

        box-shadow:
            0 0 0 .18rem rgba(139,92,246,.10),
            0 0 18px rgba(139,92,246,.05) !important;

        outline:none !important;
    }

    .edit-group-page .form-control::placeholder{
        color:#4f6076 !important;

        opacity:1;
    }

    .edit-group-page textarea.form-control{
        min-height:105px;

        resize:vertical;

        line-height:1.55;
    }

    .edit-group-page .form-select{
        cursor:pointer;
    }

    .edit-group-page .form-select option{
        background:#0f1826;

        color:#dbe4f2;
    }


    /* =========================================================
       HINT
       ========================================================= */

    .form-hint{
        color:#596a80;

        font-size:8px;

        margin-top:5px;

        line-height:1.4;
    }


    /* =========================================================
       INFO BOX
       ========================================================= */

    .info-box{
        background:rgba(139,92,246,.06) !important;

        border:1px solid rgba(139,92,246,.16) !important;

        border-radius:10px;

        padding:11px 13px;

        color:#9f8ee8 !important;

        font-size:9px;

        line-height:1.5;
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
        padding:17px 24px;

        background:#0b1420;

        border-top:1px solid #1a2637;

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

        padding:9px 15px;

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

    .cancel-btn:hover{
        background:#111c2c !important;

        color:#dbe4f2 !important;

        border-color:#3a4c65 !important;

        transform:translateY(-2px);
    }


    /* =========================================================
       UPDATE BUTTON
       ========================================================= */

    .submit-btn{
        position:relative;

        overflow:hidden;

        display:inline-flex;

        align-items:center;
        justify-content:center;

        gap:5px;

        padding:9px 16px;

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

        cursor:pointer;

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

        transition:left .55s ease;
    }

    .submit-btn:hover{
        color:#fff !important;

        transform:translateY(-2px);

        border-color:rgba(196,181,253,.75) !important;

        box-shadow:
            0 11px 27px rgba(124,58,237,.30),
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

        body:has(.edit-group-page) .page-content{
            padding:15px 15px 0 15px !important;
        }

        .edit-group-page{
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
            padding:9px 11px;

            white-space:nowrap;
        }

        .form-section{
            padding:20px;
        }

        .form-footer{
            padding:16px 20px;
        }

        .group-form-card{
            border-radius:12px;
        }
    }
</style>


<div class="edit-group-page">

    {{-- PAGE HEADER --}}
    <div class="form-page-header">

        <div>

            <div class="form-page-kicker">
                Academy Management
            </div>

            <h1 class="form-page-title">
                Edit Group
            </h1>

            <p class="form-page-subtitle">
                Update the group information, class and current status.
            </p>

        </div>


        <a
            href="{{ route('groups.index') }}"
            class="back-btn"
        >
            <i class="bi bi-arrow-left"></i>
            Back to Groups
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


    {{-- FORM CARD --}}
    <div class="group-form-card">

        <form
            action="{{ route('groups.update', $group) }}"
            method="POST"
        >

            @csrf

            @method('PUT')


            {{-- GROUP INFORMATION --}}
            <div class="form-section">

                <div class="section-heading">

                    <div class="section-icon">
                        <i class="bi bi-people"></i>
                    </div>

                    <div>

                        <h5 class="section-title">
                            Group Information
                        </h5>

                        <p class="section-subtitle">
                            Update the class and basic group information
                        </p>

                    </div>

                </div>


                <div class="row g-3">


                    {{-- CLASS --}}
                    <div class="col-md-6">

                        <label class="form-label">
                            Class
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
                                    {{ old('academy_class_id', $group->academy_class_id) == $class->id ? 'selected' : '' }}
                                >
                                    {{ $class->name }}
                                </option>

                            @endforeach

                        </select>

                        <div class="form-hint">
                            Select the class this group belongs to.
                        </div>

                    </div>


                    {{-- GROUP NAME --}}
                    <div class="col-md-6">

                        <label class="form-label">
                            Group Name
                        </label>

                        <input
                            type="text"
                            name="name"
                            class="form-control"
                            value="{{ old('name', $group->name) }}"
                            placeholder="e.g. ICS"
                        >

                        <div class="form-hint">
                            Enter a clear name for the group.
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
                            placeholder="Write a short description about this group..."
                        >{{ old('description', $group->description) }}</textarea>

                        <div class="form-hint">
                            Add any useful information about the group.
                        </div>

                    </div>

                </div>

            </div>


            {{-- GROUP STATUS --}}
            <div class="form-section">

                <div class="section-heading">

                    <div class="section-icon">
                        <i class="bi bi-toggle-on"></i>
                    </div>

                    <div>

                        <h5 class="section-title">
                            Group Status
                        </h5>

                        <p class="section-subtitle">
                            Control whether this group is currently active
                        </p>

                    </div>

                </div>


                <div class="row g-3">

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
                                {{ old('status', $group->status) === 'active' ? 'selected' : '' }}
                            >
                                Active
                            </option>

                            <option
                                value="inactive"
                                {{ old('status', $group->status) === 'inactive' ? 'selected' : '' }}
                            >
                                Inactive
                            </option>

                        </select>

                        <div class="form-hint">
                            Inactive groups can remain in the system without
                            being currently used.
                        </div>

                    </div>

                </div>


                <div class="info-box mt-4">

                    <i class="bi bi-info-circle-fill me-1"></i>

                    Review the group details and status before saving
                    your changes.

                </div>

            </div>


            {{-- FORM FOOTER --}}
            <div class="form-footer">

                <a
                    href="{{ route('groups.index') }}"
                    class="cancel-btn"
                >
                    Cancel
                </a>

                <button
                    type="submit"
                    class="submit-btn"
                >
                    <i class="bi bi-check-lg"></i>
                    Update Group
                </button>

            </div>

        </form>

    </div>

</div>

@endsection