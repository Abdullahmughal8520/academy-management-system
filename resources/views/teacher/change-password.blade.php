@extends('layouts.app')

@section('title', 'Change Password')

@section('content')

<style>
    /* =================================
       CHANGE PASSWORD - DARK THEME
       ================================= */

    body:has(.change-password-page) .main-wrapper,
    body:has(.change-password-page) .page-content {
        background:#080e17 !important;
    }

    body:has(.change-password-page) .page-content {
        padding:22px 24px 0 24px !important;
        min-height:calc(100vh - 76px) !important;
    }

    .change-password-page {
        color:#edf3fb;
    }

    .change-password-page * {
        box-sizing:border-box;
    }

    /* PAGE HEADER */
    .security-header {
        display:flex;
        justify-content:space-between;
        align-items:center;
        gap:18px;
        margin-bottom:20px;
    }

    .security-kicker {
        font-size:10px;
        letter-spacing:1.7px;
        text-transform:uppercase;
        color:#a78bfa;
        font-weight:900;
    }

    .security-header h1 {
        font-size:27px;
        line-height:1.15;
        font-weight:850;
        margin:4px 0;
        color:#f8fafc;
    }

    .security-header p {
        font-size:12px;
        color:#64758c;
        margin:0;
    }

    /* BACK BUTTON */
    .security-back-btn {
        display:inline-flex;
        align-items:center;
        gap:7px;
        padding:10px 15px;
        border-radius:10px;
        background:#0d1725;
        border:1px solid #26364d;
        color:#9aa9bc;
        font-size:10px;
        font-weight:850;
        text-decoration:none;
        transition:.25s ease;
    }

    .security-back-btn:hover {
        color:#fff;
        border-color:#8b5cf6;
        background:#111c2c;
        transform:translateY(-2px);
        box-shadow:0 8px 20px rgba(139,92,246,.12);
    }

    .security-back-btn i {
        transition:transform .25s ease;
    }

    .security-back-btn:hover i {
        transform:translateX(-3px);
    }

    /* ERROR BOX */
    .security-error {
        background:rgba(244,63,94,.08) !important;
        border:1px solid rgba(244,63,94,.25) !important;
        border-radius:11px !important;
        color:#fda4af !important;
        padding:13px 16px !important;
        margin-bottom:18px;
        font-size:10px;
    }

    .security-error ul {
        padding-left:18px;
    }

    .security-error li {
        margin:3px 0;
    }

    /* MAIN CARD */
    .security-card {
        max-width:720px;
        background:linear-gradient(145deg,#111b2a,#0d1521);
        border:1px solid #223149;
        border-radius:15px;
        box-shadow:0 12px 30px rgba(0,0,0,.18);
        overflow:hidden;
    }

    /* CARD HEADER */
    .security-card-header {
        display:flex;
        align-items:center;
        gap:14px;
        padding:17px 20px;
        border-bottom:1px solid #1e2b3e;
        background:rgba(17,28,44,.45);
    }

    .security-icon {
        width:46px;
        height:46px;
        border-radius:13px;
        display:grid;
        place-items:center;
        background:linear-gradient(
            135deg,
            rgba(139,92,246,.16),
            rgba(34,211,238,.07)
        );
        border:1px solid rgba(139,92,246,.25);
        color:#a78bfa;
        font-size:18px;
        box-shadow:0 0 18px rgba(139,92,246,.08);
        transition:.25s ease;
    }

    .security-card-header:hover .security-icon {
        transform:scale(1.06);
        border-color:rgba(139,92,246,.45);
        box-shadow:0 0 22px rgba(139,92,246,.15);
    }

    .security-icon i {
        filter:drop-shadow(0 0 5px rgba(167,139,250,.55));
    }

    .security-card-header h3 {
        margin:0;
        color:#f1f5f9;
        font-size:13px;
        font-weight:850;
    }

    .security-card-header p {
        margin:3px 0 0;
        color:#64758c;
        font-size:9px;
    }

    /* CARD BODY */
    .security-card-body {
        padding:22px;
    }

    /* FORM GROUP */
    .security-field {
        margin-bottom:18px;
    }

    .security-field:last-of-type {
        margin-bottom:22px;
    }

    .security-field label {
        display:block;
        font-size:9px;
        text-transform:uppercase;
        letter-spacing:.7px;
        color:#cbd5e1;
        font-weight:850;
        margin-bottom:7px;
    }

    .security-input-wrap {
        position:relative;
    }

    .security-input-icon {
        position:absolute;
        left:13px;
        top:50%;
        transform:translateY(-50%);
        color:#64758c;
        font-size:12px;
        pointer-events:none;
        transition:.25s ease;
    }

    .security-input {
        width:100%;
        height:43px;
        padding:0 13px 0 38px;
        background:#0d1725 !important;
        border:1px solid #26364d !important;
        border-radius:9px !important;
        color:#dbe4f2 !important;
        font-size:11px !important;
        outline:none;
        box-shadow:none !important;
        transition:
            border-color .25s ease,
            box-shadow .25s ease,
            background .25s ease;
    }

    .security-input::placeholder {
        color:#56667c !important;
    }

    .security-input:focus {
        background:#101a2a !important;
        border-color:#8b5cf6 !important;
        box-shadow:
            0 0 0 3px rgba(139,92,246,.09),
            0 0 18px rgba(139,92,246,.06) !important;
    }

    .security-input:focus + .security-input-icon {
        color:#a78bfa;
    }

    /* SUBMIT BUTTON */
    .security-submit {
        position:relative;
        overflow:hidden;
        display:inline-flex;
        align-items:center;
        justify-content:center;
        gap:7px;
        padding:10px 17px;
        border-radius:10px;
        background:linear-gradient(135deg,#6848e8,#8b5cf6);
        border:1px solid rgba(167,139,250,.45);
        color:#fff;
        font-size:10px;
        font-weight:850;
        cursor:pointer;
        box-shadow:0 8px 24px rgba(124,58,237,.20);
        transition:
            transform .25s ease,
            box-shadow .25s ease,
            border-color .25s ease;
    }

    .security-submit::before {
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

    .security-submit:hover {
        color:#fff;
        transform:translateY(-3px);
        border-color:rgba(196,181,253,.75);
        box-shadow:
            0 12px 30px rgba(124,58,237,.32),
            0 0 20px rgba(139,92,246,.12);
    }

    .security-submit:hover::before {
        left:140%;
    }

    .security-submit i {
        transition:transform .25s ease;
    }

    .security-submit:hover i {
        transform:scale(1.08);
        filter:drop-shadow(0 0 5px rgba(255,255,255,.55));
    }

    /* SECURITY NOTE */
    .security-note {
        margin-top:20px;
        padding:11px 13px;
        border-radius:9px;
        background:rgba(34,211,238,.045);
        border:1px solid rgba(34,211,238,.10);
        color:#64758c;
        font-size:9px;
        line-height:1.6;
    }

    .security-note i {
        color:#22d3ee;
        margin-right:5px;
    }

    /* RESPONSIVE */
    @media(max-width:767px) {

        body:has(.change-password-page) .page-content {
            padding:20px 15px !important;
        }

        .security-header {
            align-items:flex-start;
        }

        .security-header h1 {
            font-size:22px;
        }

        .security-header p {
            font-size:10px;
        }

        .security-back-btn {
            padding:9px 11px;
        }

        .security-card-body {
            padding:16px;
        }

        .security-card-header {
            padding:15px;
        }

        .security-submit {
            width:100%;
        }
    }
</style>


<div class="change-password-page">

    {{-- PAGE HEADER --}}
    <div class="security-header">

        <div>

            <div class="security-kicker">
                Teacher Portal
            </div>

            <h1>
                Change Password
            </h1>

            <p>
                Update your teacher portal password.
            </p>

        </div>

        <a
            href="{{ route('teacher.profile') }}"
            class="security-back-btn"
        >
            <i class="bi bi-arrow-left"></i>
            Back to Profile
        </a>

    </div>


    {{-- VALIDATION ERRORS --}}
    @if ($errors->any())

        <div class="security-error">

            <ul class="mb-0">

                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach

            </ul>

        </div>

    @endif


    {{-- PASSWORD CARD --}}
    <div class="security-card">

        {{-- CARD HEADER --}}
        <div class="security-card-header">

            <div class="security-icon">
                <i class="bi bi-shield-lock"></i>
            </div>

            <div>

                <h3>
                    Account Security
                </h3>

                <p>
                    Keep your teacher account secure
                </p>

            </div>

        </div>


        {{-- CARD BODY --}}
        <div class="security-card-body">

            <form
                action="{{ route('teacher.update-password') }}"
                method="POST"
            >

                @csrf


                {{-- CURRENT PASSWORD --}}
                <div class="security-field">

                    <label>
                        Current Password
                    </label>

                    <div class="security-input-wrap">

                        <i class="bi bi-lock security-input-icon"></i>

                        <input
                            type="password"
                            name="current_password"
                            class="security-input"
                            placeholder="Enter your current password"
                            required
                        >

                    </div>

                </div>


                {{-- NEW PASSWORD --}}
                <div class="security-field">

                    <label>
                        New Password
                    </label>

                    <div class="security-input-wrap">

                        <i class="bi bi-key security-input-icon"></i>

                        <input
                            type="password"
                            name="password"
                            class="security-input"
                            placeholder="Enter your new password"
                            required
                        >

                    </div>

                </div>


                {{-- CONFIRM PASSWORD --}}
                <div class="security-field">

                    <label>
                        Confirm New Password
                    </label>

                    <div class="security-input-wrap">

                        <i class="bi bi-check2-circle security-input-icon"></i>

                        <input
                            type="password"
                            name="password_confirmation"
                            class="security-input"
                            placeholder="Confirm your new password"
                            required
                        >

                    </div>

                </div>


                <button
                    type="submit"
                    class="security-submit"
                >
                    <i class="bi bi-shield-check"></i>
                    Change Password
                </button>


                <div class="security-note">
                    <i class="bi bi-info-circle"></i>
                    Use a strong password that you don't reuse on other accounts.
                </div>

            </form>

        </div>

    </div>

</div>

@endsection