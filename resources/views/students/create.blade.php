@extends('layouts.app')

@section('title', 'Add Student')

@section('content')

<style>

/* =========================================================
   ADD STUDENT — SAME ADMIN DASHBOARD THEME
   ========================================================= */

:root{
    --as-bg:#080e17;
    --as-panel:#0f1826;
    --as-panel2:#111c2c;
    --as-input:#0b1420;
    --as-border:#223149;
    --as-border-soft:#1a2637;
    --as-text:#edf3fb;
    --as-text-light:#dbe4f2;
    --as-muted:#718096;
    --as-muted2:#64758c;
    --as-purple:#8b5cf6;
    --as-purple-light:#a78bfa;
    --as-cyan:#22d3ee;
    --as-green:#22c55e;
    --as-red:#f43f5e;
}


/* =========================================================
   PAGE BACKGROUND
   ========================================================= */

body:has(.student-form-page){
    background:var(--as-bg) !important;
}

body:has(.student-form-page) .main-wrapper{
    background:var(--as-bg) !important;
}

body:has(.student-form-page) .page-content{
    background:var(--as-bg) !important;
    min-height:calc(100vh - 76px) !important;
    padding:22px 24px 24px 24px !important;
    margin:0 !important;
}


/* =========================================================
   MAIN PAGE
   ========================================================= */

.student-form-page{
    width:100%;
    min-height:auto;
    margin:0 !important;
    padding:0 !important;
    color:var(--as-text);

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
        var(--as-bg);
}


/* =========================================================
   PAGE HEADER
   ========================================================= */

.form-page-header{
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

    border:1px solid var(--as-border);
    border-radius:15px;

    box-shadow:
        0 12px 30px rgba(0,0,0,.12);

    overflow:hidden;
}

.form-page-header::before{
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

.form-page-header::after{
    content:"";
    position:absolute;

    width:150px;
    height:150px;

    right:-80px;
    top:-80px;

    border-radius:50%;

    background:rgba(139,92,246,.06);

    pointer-events:none;
}

.form-page-header h1{
    position:relative;
    z-index:2;

    margin:0 0 4px;

    color:#f8fafc;

    font-size:20px;
    line-height:1.15;
    font-weight:850;

    letter-spacing:-.3px;
}

.form-page-header p{
    position:relative;
    z-index:2;

    margin:0;

    color:#728197;

    font-size:10px;
}


/* =========================================================
   BACK BUTTON
   ========================================================= */

.back-btn{
    position:relative;
    z-index:5;

    display:inline-flex;
    align-items:center;
    justify-content:center;
    gap:6px;

    padding:10px 14px;

    border-radius:10px;

    background:#0d1725;

    border:1px solid #26364d;

    color:#8b9bb0;

    font-size:10px;
    font-weight:850;

    text-decoration:none;

    transition:
        transform .25s ease,
        box-shadow .25s ease,
        border-color .25s ease,
        color .25s ease,
        background .25s ease;
}

.back-btn:hover{
    color:#fff;

    background:#111c2c;

    border-color:rgba(139,92,246,.55);

    transform:translateY(-3px);

    box-shadow:
        0 10px 24px rgba(0,0,0,.22),
        0 0 15px rgba(139,92,246,.08);
}

.back-btn i{
    transition:transform .25s ease;
}

.back-btn:hover i{
    transform:translateX(-3px);
}


/* =========================================================
   FORM CARD
   ========================================================= */

.student-form-card{
    position:relative;

    width:100%;

    background:
        linear-gradient(
            145deg,
            #111b2a,
            #0d1521
        );

    border:1px solid var(--as-border);

    border-radius:15px;

    box-shadow:
        0 12px 30px rgba(0,0,0,.12);

    overflow:hidden;
}

.student-form-card::before{
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
   FORM SECTIONS
   ========================================================= */

.form-section{
    padding:22px 24px;

    background:transparent;

    border-bottom:1px solid var(--as-border-soft);
}

.form-section:last-child{
    border-bottom:0;
}


/* =========================================================
   SECTION HEADER
   ========================================================= */

.section-heading{
    display:flex;
    align-items:center;
    gap:11px;

    margin-bottom:19px;
}

.section-icon{
    width:39px;
    height:39px;

    flex-shrink:0;

    display:grid;
    place-items:center;

    border-radius:11px;

    background:#172237;

    color:#a78bfa;

    font-size:16px;

    transition:
        transform .25s ease,
        box-shadow .25s ease,
        background .25s ease,
        color .25s ease,
        border-color .25s ease;

    border:1px solid transparent;
}

.section-heading:hover .section-icon{
    transform:scale(1.08) rotate(-2deg);

    background:rgba(139,92,246,.13);

    color:#c4b5fd;

    border-color:rgba(139,92,246,.30);

    box-shadow:
        0 0 18px rgba(139,92,246,.20),
        inset 0 0 12px rgba(139,92,246,.06);
}

.section-icon i{
    filter:
        drop-shadow(
            0 0 5px rgba(34,211,238,.55)
        );

    transition:.25s ease;
}

.section-heading:hover .section-icon i{
    filter:
        drop-shadow(0 0 5px rgba(167,139,250,.85))
        drop-shadow(0 0 10px rgba(139,92,246,.45));

    transform:scale(1.08);
}

.section-title{
    margin:0;

    color:#eef3fb;

    font-size:12px;

    font-weight:850;
}

.section-subtitle{
    margin:3px 0 0;

    color:#687890;

    font-size:9px;
}


/* =========================================================
   FORM GRID
   ========================================================= */

.student-form-card .row{
    --bs-gutter-x:18px;
    --bs-gutter-y:15px;
}


/* =========================================================
   LABELS
   ========================================================= */

.student-form-card .form-label{
    display:block;

    margin-bottom:6px;

    color:#aab7ca;

    font-size:9px;

    font-weight:900;

    letter-spacing:.45px;
}

.required-star{
    color:var(--as-red);
}


/* =========================================================
   INPUTS
   ========================================================= */

.student-form-card .form-control,
.student-form-card .form-select{
    width:100%;

    min-height:40px;

    background:var(--as-input);

    color:var(--as-text-light);

    border:1px solid #27364b;

    border-radius:8px;

    font-size:10px;

    box-shadow:none;

    outline:none;

    transition:
        background .22s ease,
        border-color .22s ease,
        color .22s ease,
        box-shadow .22s ease,
        transform .22s ease;
}


/* Hover */

.student-form-card .form-control:hover,
.student-form-card .form-select:hover{
    background:#0d1725;

    border-color:#354963;

    color:#edf3fb;
}


/* Focus */

.student-form-card .form-control:focus,
.student-form-card .form-select:focus{
    background:#0d1725;

    color:#edf3fb;

    border-color:rgba(139,92,246,.65);

    box-shadow:
        0 0 0 3px rgba(139,92,246,.09),
        0 7px 18px rgba(0,0,0,.12);

    outline:none;
}


/* Placeholder */

.student-form-card .form-control::placeholder{
    color:#4f6075;

    opacity:1;
}


/* Select */

.student-form-card .form-select{
    cursor:pointer;
}

.student-form-card .form-select option{
    background:#111b2a;
    color:#edf3fb;
}


/* Date icon */

.student-form-card input[type="date"]{
    color-scheme:dark;
}


/* Textarea */

.student-form-card textarea.form-control{
    min-height:88px;

    resize:vertical;
}


/* =========================================================
   HINT
   ========================================================= */

.form-hint{
    margin-top:5px;

    color:#586a80;

    font-size:8px;

    line-height:1.5;
}


/* =========================================================
   ACCOUNT INFO
   ========================================================= */

.account-info{
    display:flex;
    align-items:flex-start;
    gap:4px;

    padding:11px 13px;

    background:rgba(139,92,246,.07);

    border:1px solid rgba(139,92,246,.18);

    border-radius:9px;

    color:#9187cc;

    font-size:9px;

    line-height:1.5;

    transition:
        background .22s ease,
        border-color .22s ease,
        box-shadow .22s ease;
}

.account-info:hover{
    background:rgba(139,92,246,.10);

    border-color:rgba(139,92,246,.30);

    box-shadow:
        0 7px 18px rgba(0,0,0,.10);
}

.account-info i{
    color:#a78bfa;

    margin-top:1px;

    filter:
        drop-shadow(
            0 0 5px rgba(167,139,250,.45)
        );
}


/* =========================================================
   FORM FOOTER
   ========================================================= */

.form-footer{
    display:flex;
    align-items:center;
    justify-content:flex-end;

    gap:8px;

    padding:17px 24px;

    background:#0b1420;

    border-top:1px solid var(--as-border-soft);
}


/* =========================================================
   CANCEL
   ========================================================= */

.cancel-btn{
    display:inline-flex;
    align-items:center;
    justify-content:center;

    padding:9px 15px;

    background:#0d1725;

    border:1px solid #26364d;

    border-radius:8px;

    color:#718096;

    font-size:10px;
    font-weight:850;

    text-decoration:none;

    transition:
        transform .25s ease,
        box-shadow .25s ease,
        border-color .25s ease,
        color .25s ease,
        background .25s ease;
}

.cancel-btn:hover{
    color:#dbe5f2;

    background:#111c2c;

    border-color:#3a4c65;

    transform:translateY(-2px);

    box-shadow:
        0 7px 17px rgba(0,0,0,.18);
}


/* =========================================================
   ADD STUDENT BUTTON
   SAME ADMIN .ad-btn STYLE
   ========================================================= */

.submit-btn{
    position:relative;

    display:inline-flex;
    align-items:center;
    justify-content:center;

    gap:6px;

    overflow:hidden;

    padding:10px 15px;

    border-radius:10px;

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
        0 8px 24px rgba(124,58,237,.20);

    transition:
        transform .25s ease,
        box-shadow .25s ease,
        border-color .25s ease;
}


/* Shine */

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

    transform:translateY(-3px);

    border-color:rgba(196,181,253,.75);

    box-shadow:
        0 12px 30px rgba(124,58,237,.32),
        0 0 20px rgba(139,92,246,.12);
}

.submit-btn:hover::before{
    left:140%;
}

.submit-btn i{
    transition:transform .25s ease;
}

.submit-btn:hover i{
    transform:
        rotate(90deg)
        scale(1.08);

    filter:
        drop-shadow(
            0 0 5px rgba(255,255,255,.55)
        );
}

.submit-btn:active{
    transform:translateY(0);

    box-shadow:
        0 5px 12px rgba(124,58,237,.20);
}


/* =========================================================
   VALIDATION
   ========================================================= */

.student-form-card .form-control.is-invalid,
.student-form-card .form-select.is-invalid{
    border-color:rgba(244,63,94,.65);

    box-shadow:
        0 0 0 3px rgba(244,63,94,.07);
}

.student-form-card .form-control.is-valid,
.student-form-card .form-select.is-valid{
    border-color:rgba(34,197,94,.50);

    box-shadow:
        0 0 0 3px rgba(34,197,94,.06);
}


/* =========================================================
   AUTOFILL
   ========================================================= */

.student-form-card .form-control:-webkit-autofill,
.student-form-card .form-control:-webkit-autofill:hover,
.student-form-card .form-control:-webkit-autofill:focus{
    -webkit-text-fill-color:#edf3fb;

    -webkit-box-shadow:
        0 0 0 1000px #0b1420 inset;

    transition:
        background-color 5000s ease-in-out 0s;
}


/* =========================================================
   MOBILE
   ========================================================= */

@media(max-width:767px){

    body:has(.student-form-page) .page-content{
        padding:16px 15px 20px 15px !important;
    }

    .student-form-page{
        min-height:auto;
    }

    .form-page-header{
        padding:15px;

        margin-bottom:15px;

        gap:12px;

        align-items:flex-start !important;
    }

    .form-page-header h1{
        font-size:17px;
    }

    .form-page-header p{
        font-size:8px;
    }

    .back-btn{
        padding:8px 10px;

        font-size:9px;

        white-space:nowrap;
    }

    .student-form-card{
        border-radius:13px;
    }

    .form-section{
        padding:18px 16px;
    }

    .section-heading{
        gap:9px;

        margin-bottom:16px;
    }

    .section-icon{
        width:35px;
        height:35px;

        font-size:14px;
    }

    .section-title{
        font-size:12px;
    }

    .section-subtitle{
        font-size:8px;
    }

    .student-form-card .form-control,
    .student-form-card .form-select{
        min-height:39px;

        font-size:10px;
    }

    .student-form-card textarea.form-control{
        min-height:80px;
    }

    .form-footer{
        padding:15px 16px;
    }

    .submit-btn,
    .cancel-btn{
        padding:8px 12px;

        font-size:9px;
    }
}

</style>

<div class="student-form-page">

{{-- Page Header --}}
<div class="form-page-header">

    <div>
        <h1>Add Student</h1>

        <p>
            Create a new student record and login account.
        </p>
    </div>

    <a href="{{ url('/students') }}" class="back-btn">
        <i class="bi bi-arrow-left"></i>
        Back to Students
    </a>

</div>


{{-- Student Form --}}
<div class="student-form-card">

    <form action="{{ url('/students') }}" method="POST">

        @csrf


        {{-- Personal Information --}}
        <div class="form-section">

            <div class="section-heading">

                <div class="section-icon">
                    <i class="bi bi-person-fill"></i>
                </div>

                <div>

                    <h5 class="section-title">
                        Personal Information
                    </h5>

                    <p class="section-subtitle">
                        Basic information about the student
                    </p>

                </div>

            </div>


            <div class="row g-3">

                {{-- Student Code --}}
                <div class="col-md-6">

                    <label class="form-label">
                        Student Code
                        <span class="required-star">*</span>
                    </label>

                    <input
                        type="text"
                        name="student_code"
                        class="form-control"
                        value="{{ old('student_code') }}"
                        placeholder="e.g. STU-001"
                        required
                    >

                    <div class="form-hint">
                        This will also be used as the initial login password.
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
                        value="{{ old('first_name') }}"
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
                        value="{{ old('last_name') }}"
                        placeholder="Enter last name"
                    >

                </div>


                {{-- Father Name --}}
                <div class="col-md-6">

                    <label class="form-label">
                        Father Name
                        <span class="required-star">*</span>
                    </label>

                    <input
                        type="text"
                        name="father_name"
                        class="form-control"
                        value="{{ old('father_name') }}"
                        placeholder="Enter father's name"
                        required
                    >

                </div>


                {{-- Date of Birth --}}
                <div class="col-md-6">

                    <label class="form-label">
                        Date of Birth
                    </label>

                    <input
                        type="date"
                        name="date_of_birth"
                        class="form-control"
                        value="{{ old('date_of_birth') }}"
                    >

                </div>


                {{-- Gender --}}
                <div class="col-md-6">

                    <label class="form-label">
                        Gender
                    </label>

                    <select name="gender" class="form-select">

                        <option value="">
                            Select Gender
                        </option>

                        <option
                            value="male"
                            {{ old('gender') == 'male' ? 'selected' : '' }}
                        >
                            Male
                        </option>

                        <option
                            value="female"
                            {{ old('gender') == 'female' ? 'selected' : '' }}
                        >
                            Female
                        </option>

                        <option
                            value="other"
                            {{ old('gender') == 'other' ? 'selected' : '' }}
                        >
                            Other
                        </option>

                    </select>

                </div>

            </div>

        </div>


        {{-- Academic Information --}}
        <div class="form-section">

            <div class="section-heading">

                <div class="section-icon">
                    <i class="bi bi-mortarboard-fill"></i>
                </div>

                <div>

                    <h5 class="section-title">
                        Academic Information
                    </h5>

                    <p class="section-subtitle">
                        Assign the student to a class and group
                    </p>

                </div>

            </div>


            <div class="row g-3">

                {{-- Class --}}
                <div class="col-md-6">

                    <label class="form-label">
                        Class
                        <span class="required-star">*</span>
                    </label>

                    <select
                        name="academy_class_id"
                        id="academy_class_id"
                        class="form-select"
                        required
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

                </div>


                {{-- Group --}}
                <div class="col-md-6">

                    <label class="form-label">
                        Group
                        <span class="required-star">*</span>
                    </label>

                    <select
                        name="group_id"
                        id="group_id"
                        class="form-select"
                        required
                    >

                        <option value="">
                            Select Group
                        </option>

                        @foreach ($groups as $group)

                            <option
                                value="{{ $group->id }}"
                                data-class="{{ $group->academy_class_id }}"
                                {{ old('group_id') == $group->id ? 'selected' : '' }}
                            >
                                {{ $group->name }}
                            </option>

                        @endforeach

                    </select>

                    <div class="form-hint">
                        Only groups belonging to the selected class will be available.
                    </div>

                </div>


                {{-- Admission Date --}}
                <div class="col-md-6">

                    <label class="form-label">
                        Admission Date
                        <span class="required-star">*</span>
                    </label>

                    <input
                        type="date"
                        name="admission_date"
                        class="form-control"
                        value="{{ old('admission_date') }}"
                        required
                    >

                </div>

            </div>

        </div>


        {{-- Contact Information --}}
        <div class="form-section">

            <div class="section-heading">

                <div class="section-icon">
                    <i class="bi bi-telephone-fill"></i>
                </div>

                <div>

                    <h5 class="section-title">
                        Contact Information
                    </h5>

                    <p class="section-subtitle">
                        Student contact and login details
                    </p>

                </div>

            </div>


            <div class="row g-3">

                {{-- Phone --}}
                <div class="col-md-6">

                    <label class="form-label">
                        Phone
                    </label>

                    <input
                        type="text"
                        name="phone"
                        class="form-control"
                        value="{{ old('phone') }}"
                        placeholder="03XXXXXXXXX"
                    >

                </div>


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
                        value="{{ old('email') }}"
                        placeholder="student@example.com"
                        required
                    >

                    <div class="form-hint">
                        This email will be used for student login.
                    </div>

                </div>


                {{-- Address --}}
                <div class="col-12">

                    <label class="form-label">
                        Address
                    </label>

                    <textarea
                        name="address"
                        class="form-control"
                        rows="3"
                        placeholder="Enter student's complete address"
                    >{{ old('address') }}</textarea>

                </div>

            </div>


            <div class="account-info mt-3">

                <i class="bi bi-info-circle-fill"></i>

                <span>
                    A student login account will be created automatically.
                    The initial password will be the student's code.
                </span>

            </div>

        </div>


        {{-- Form Footer --}}
        <div class="form-footer">

            <a href="{{ url('/students') }}" class="cancel-btn">
                Cancel
            </a>

            <button type="submit" class="submit-btn">

                <i class="bi bi-person-plus-fill"></i>

                Add Student

            </button>

        </div>

    </form>

</div>


</div>

<script>

const classSelect = document.getElementById('academy_class_id');
const groupSelect = document.getElementById('group_id');

function filterGroups(){

    const selectedClass = classSelect.value;

    Array.from(groupSelect.options).forEach(option => {

        if(!option.value){
            return;
        }

        if(option.dataset.class === selectedClass){

            option.hidden = false;

        }else{

            option.hidden = true;

        }

    });


    const selectedOption =
        groupSelect.options[groupSelect.selectedIndex];


    if(
        selectedOption &&
        selectedOption.value &&
        selectedOption.dataset.class !== selectedClass
    ){

        groupSelect.value = '';

    }

}

classSelect.addEventListener('change', filterGroups);

filterGroups();

</script>

@endsection
