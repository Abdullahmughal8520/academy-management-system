@extends('layouts.app')

@section('title', 'Students')

@section('content')

<style>


/* =========================================================
   STUDENTS PAGE — DARK ACADEMY THEME
========================================================= */


.students-page{
    min-height:100vh;
    margin-top: -24px;
    margin-left: -24px;
   
    margin-right: -24px;
    padding:24px;

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
        #080e17;
}


/* HEADER */

.sp-heading{
    position:relative;

    display:flex;
    justify-content:space-between;
    align-items:center;

    gap:18px;

    margin-bottom:22px;
    padding-bottom:18px;

    border-bottom:1px solid rgba(34,49,73,.65);
}


/* subtle glow line */

.sp-heading::after{
    content:"";

    position:absolute;

    left:0;
    bottom:-1px;

    width:105px;
    height:1px;

    background:
        linear-gradient(
            90deg,
            #8b5cf6,
            #22d3ee,
            transparent
        );

    box-shadow:
        0 0 10px rgba(139,92,246,.35);

    transition:
        width .35s ease;
}

.sp-heading:hover::after{
    width:180px;
}


/* KICKER */

.sp-kicker{
    display:inline-flex;
    align-items:center;
    gap:7px;

    font-size:9px;
    letter-spacing:1.7px;

    text-transform:uppercase;

    color:#22d3ee;

    font-weight:900;

    margin-bottom:3px;

    transition:
        color .25s ease,
        text-shadow .25s ease;
}

.sp-kicker::before{
    content:"";

    width:5px;
    height:5px;

    border-radius:50%;

    background:#22d3ee;

    box-shadow:
        0 0 7px rgba(34,211,238,.8);

    animation:
        headerPulse 2s ease-in-out infinite;
}

.sp-heading:hover .sp-kicker{
    color:#67e8f9;

    text-shadow:
        0 0 10px rgba(34,211,238,.22);
}


/* TITLE */

.sp-title{
    font-size:27px;
    line-height:1.15;

    font-weight:850;

    margin:4px 0;

    color:#f8fafc;

    letter-spacing:-.3px;

    transition:
        text-shadow .25s ease,
        transform .25s ease;
}

.sp-heading:hover .sp-title{
    text-shadow:
        0 0 18px rgba(255,255,255,.08);

    transform:translateX(2px);
}


/* DESCRIPTION */

.sp-subtitle{
    font-size:11px;

    color:#718096;

    margin:0;

    transition:
        color .25s ease;
}

.sp-heading:hover .sp-subtitle{
    color:#8494aa;
}


/* =========================================================
   ADD STUDENT BUTTON
========================================================= */

.add-student-btn{
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

    text-decoration:none;

    box-shadow:
        0 8px 24px rgba(124,58,237,.20);

    transition:
        transform .25s ease,
        box-shadow .25s ease,
        border-color .25s ease;
}


/* shine */

.add-student-btn::before{
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

    transition:
        left .55s ease;
}

.add-student-btn:hover{
    color:#fff;

    transform:
        translateY(-3px);

    border-color:
        rgba(196,181,253,.75);

    box-shadow:
        0 12px 30px rgba(124,58,237,.32),
        0 0 20px rgba(139,92,246,.12);
}

.add-student-btn:hover::before{
    left:140%;
}

.add-student-btn i{
    transition:
        transform .25s ease;
}

.add-student-btn:hover i{
    transform:
        rotate(90deg)
        scale(1.08);

    filter:
        drop-shadow(
            0 0 5px rgba(255,255,255,.55)
        );
}


/* =========================================================
   HEADER PULSE
========================================================= */

@keyframes headerPulse{

    0%,100%{
        opacity:.55;
        box-shadow:
            0 0 5px rgba(34,211,238,.45);
    }

    50%{
        opacity:1;
        box-shadow:
            0 0 11px rgba(34,211,238,.9);
    }

}


/* =========================================================
   MOBILE
========================================================= */

@media(max-width:767px){

    .students-page{
        margin:-16px;
        padding:16px;
    }

    .sp-heading{
        align-items:flex-start;
        margin-bottom:18px;
        padding-bottom:15px;
    }

    .sp-title{
        font-size:22px;
    }

    .sp-kicker{
        font-size:8px;
    }

    .sp-subtitle{
        font-size:9px;
    }

    .add-student-btn{
        padding:9px 11px;
        font-size:9px;
    }

}


/* =========================================================
   MAIN STUDENTS CARD
========================================================= */

.students-card{
    background:
        linear-gradient(
            145deg,
            #111b2a,
            #0d1521
        );

    border:1px solid #223149;

    box-shadow:
        0 12px 30px rgba(0,0,0,.18);


    overflow:hidden;

    transition:
        border-color .3s ease,
        box-shadow .3s ease,
        transform .3s ease;
}

.students-card::before{
    content:"";

    position:absolute;
    left:0;
    right:0;
    top:0;

    height:1px;

    background:
        linear-gradient(
            90deg,
            transparent,
            rgba(139,92,246,.65),
            rgba(34,211,238,.55),
            transparent
        );

    opacity:.8;
}

.students-card:hover{
    border-color:#2c3d57;

    box-shadow:
        0 18px 42px rgba(0,0,0,.24),
        0 0 24px rgba(139,92,246,.06);
}


/* =========================================================
   CARD HEADER
========================================================= */

.students-card-header{
    padding:16px 18px;

    border-bottom:1px solid #1e2b3e;

    display:flex;
    align-items:center;
    justify-content:space-between;

    gap:15px;
}

.card-heading-left{
    display:flex;
    align-items:center;
    gap:11px;
}

.card-heading-icon{
    width:38px;
    height:38px;

    border-radius:11px;

    display:grid;
    place-items:center;

    background:rgba(139,92,246,.10);

    border:1px solid rgba(139,92,246,.24);

    color:#a78bfa;

    box-shadow:
        0 0 14px rgba(139,92,246,.08),
        inset 0 0 12px rgba(139,92,246,.04);

    transition:
        transform .25s ease,
        box-shadow .25s ease,
        background .25s ease;
}

.students-card:hover .card-heading-icon{
    transform:scale(1.07);

    background:rgba(139,92,246,.15);

    box-shadow:
        0 0 20px rgba(139,92,246,.20);
}

.card-heading-icon i{
    font-size:16px;

    filter:
        drop-shadow(
            0 0 5px rgba(167,139,250,.65)
        );
}

.students-card-title{
    font-size:12px;
    font-weight:850;
    color:#eef3fb;
    margin:0;
}

.students-card-subtitle{
    color:#687890;
    font-size:9px;
    margin:3px 0 0;
}


/* =========================================================
   TABLE WRAPPER
========================================================= */

.students-table-wrapper{
    overflow-x:auto;
}

.students-table{
    width:100%;
    min-width:1050px;
    height: 100%;

    margin:0;

    border-collapse:collapse;
}


/* =========================================================
   TABLE HEADER
========================================================= */

.students-table thead th{
    background:#0c1523;

    color:#64758c;

    font-size:8px;

    font-weight:900;

    text-transform:uppercase;

    letter-spacing:.75px;

    padding:11px 13px;

    border-bottom:1px solid #1e2b3e;

    white-space:nowrap;
}


/* =========================================================
   TABLE BODY
========================================================= */

.students-table tbody td{
    padding:12px 13px;

    border-bottom:1px solid #172438;

    font-size:10px;

    color:#cbd5e1;

    white-space:nowrap;

    vertical-align:middle;
}

.students-table tbody tr{
    position:relative;

    transition:
        background .22s ease,
        transform .22s ease;
}

.students-table tbody tr:hover{
    background:
        linear-gradient(
            90deg,
            rgba(139,92,246,.055),
            rgba(34,211,238,.025),
            transparent
        );
}

.students-table tbody tr:last-child td{
    border-bottom:0;
}


/* =========================================================
   ID
========================================================= */

.student-id{
    color:#53647b;

    font-size:9px;

    font-weight:800;
}


/* =========================================================
   STUDENT CODE
========================================================= */

.student-code{
    display:inline-flex;
    align-items:center;

    padding:5px 8px;

    border-radius:7px;

    background:rgba(139,92,246,.09);

    border:1px solid rgba(139,92,246,.18);

    color:#b6a3ff;

    font-size:9px;

    font-weight:850;

    box-shadow:
        inset 0 0 10px rgba(139,92,246,.025);

    transition:
        background .2s ease,
        border-color .2s ease,
        box-shadow .2s ease,
        transform .2s ease;
}

.students-table tbody tr:hover .student-code{
    background:rgba(139,92,246,.14);

    border-color:rgba(139,92,246,.32);

    box-shadow:
        0 0 12px rgba(139,92,246,.10);

    transform:translateY(-1px);
}


/* =========================================================
   STUDENT NAME
========================================================= */

.student-name{
    color:#e7edf6;

    font-weight:800;

    transition:
        color .2s ease,
        text-shadow .2s ease;
}

.students-table tbody tr:hover .student-name{
    color:#fff;

    text-shadow:
        0 0 10px rgba(255,255,255,.08);
}


/* =========================================================
   EMAIL
========================================================= */

.email-text{
    color:#718096;

    font-size:9px;
}


/* =========================================================
   STATUS BADGES
========================================================= */

.status-badge{
    display:inline-flex;

    align-items:center;

    gap:5px;

    padding:5px 8px;

    border-radius:999px;

    font-size:8px;

    font-weight:900;

    transition:
        transform .2s ease,
        box-shadow .2s ease;
}

.students-table tbody tr:hover .status-badge{
    transform:translateY(-1px);
}

.status-active{
    background:rgba(34,197,94,.09);

    border:1px solid rgba(34,197,94,.18);

    color:#4ade80;

    box-shadow:
        0 0 10px rgba(34,197,94,.04);
}

.status-inactive{
    background:rgba(100,116,139,.08);

    border:1px solid rgba(100,116,139,.16);

    color:#94a3b8;
}

.status-active i{
    filter:
        drop-shadow(
            0 0 5px rgba(34,197,94,.65)
        );
}


/* =========================================================
   ACTION GROUP
========================================================= */

.action-group{
    display:flex;

    align-items:center;

    gap:5px;
}


/* =========================================================
   ACTION BUTTON BASE
========================================================= */

.action-btn{
    position:relative;

    display:inline-flex;

    align-items:center;

    justify-content:center;

    gap:3px;

    border:1px solid transparent;

    border-radius:7px;

    padding:6px 8px;

    font-size:8px;

    font-weight:850;

    text-decoration:none;

    white-space:nowrap;

    transition:
        transform .2s ease,
        background .2s ease,
        border-color .2s ease,
        box-shadow .2s ease,
        color .2s ease;
}

.action-btn:hover{
    transform:translateY(-2px);
}

.action-btn i{
    font-size:9px;

    transition:
        transform .2s ease,
        filter .2s ease;
}


/* =========================================================
   EDIT
========================================================= */

.edit-btn{
    background:rgba(245,158,11,.08);

    border-color:rgba(245,158,11,.16);

    color:#fbbf24;
}

.edit-btn:hover{
    background:rgba(245,158,11,.14);

    border-color:rgba(245,158,11,.32);

    color:#fcd34d;

    box-shadow:
        0 0 14px rgba(245,158,11,.10);
}

.edit-btn:hover i{
    transform:rotate(-8deg) scale(1.08);

    filter:
        drop-shadow(
            0 0 5px rgba(245,158,11,.55)
        );
}


/* =========================================================
   LOGIN
========================================================= */

.login-btn{
    background:rgba(34,211,238,.07);

    border-color:rgba(34,211,238,.17);

    color:#67e8f9;
}

.login-btn:hover{
    background:rgba(34,211,238,.13);

    border-color:rgba(34,211,238,.35);

    color:#a5f3fc;

    box-shadow:
        0 0 14px rgba(34,211,238,.10);
}

.login-btn:hover i{
    transform:scale(1.12);

    filter:
        drop-shadow(
            0 0 5px rgba(34,211,238,.7)
        );
}


/* =========================================================
   DELETE
========================================================= */

.delete-btn{
    background:rgba(244,63,94,.07);

    border-color:rgba(244,63,94,.16);

    color:#fb7185;
}

.delete-btn:hover{
    background:rgba(244,63,94,.13);

    border-color:rgba(244,63,94,.34);

    color:#fda4af;

    box-shadow:
        0 0 14px rgba(244,63,94,.10);
}

.delete-btn:hover i{
    transform:scale(1.12);

    filter:
        drop-shadow(
            0 0 5px rgba(244,63,94,.65)
        );
}


/* =========================================================
   ACCOUNT CREATED
========================================================= */

.account-badge{
    display:inline-flex;

    align-items:center;

    gap:5px;

    background:rgba(34,197,94,.07);

    border:1px solid rgba(34,197,94,.16);

    color:#4ade80;

    padding:6px 8px;

    border-radius:7px;

    font-size:8px;

    font-weight:850;

    transition:
        background .2s ease,
        border-color .2s ease,
        box-shadow .2s ease;
}

.students-table tbody tr:hover .account-badge{
    background:rgba(34,197,94,.11);

    border-color:rgba(34,197,94,.28);

    box-shadow:
        0 0 12px rgba(34,197,94,.07);
}

.account-badge i{
    filter:
        drop-shadow(
            0 0 5px rgba(34,197,94,.55)
        );
}


/* =========================================================
   EMPTY STATE
========================================================= */

.empty-students{
    padding:55px 20px;

    text-align:center;

    color:#64758c;
}

.empty-icon{
    width:58px;
    height:58px;

    margin:0 auto 14px;

    border-radius:16px;

    display:grid;
    place-items:center;

    background:rgba(139,92,246,.08);

    border:1px solid rgba(139,92,246,.18);

    color:#a78bfa;

    font-size:21px;

    box-shadow:
        0 0 22px rgba(139,92,246,.07);

    animation:
        emptyFloat 3s ease-in-out infinite;
}

.empty-title{
    color:#dbe4f2;

    font-size:12px;

    font-weight:850;

    margin-bottom:4px;
}

.empty-text{
    color:#64758c;

    font-size:9px;
}

@keyframes emptyFloat{
    0%,100%{
        transform:translateY(0);
    }

    50%{
        transform:translateY(-5px);
    }
}


/* =========================================================
   MOBILE
========================================================= */

@media(max-width:767px){

    .sp-heading{
        align-items:flex-start;
    }

    .sp-title{
        font-size:22px;
    }

    .sp-subtitle{
        font-size:10px;
    }

    .add-student-btn{
        padding:9px 11px;
        font-size:10px;
    }

    .students-card-header{
        padding:13px 14px;
    }

}

/* =========================================================
   STUDENTS DELETE MODAL — SAME DARK TEACHERS THEME
   ========================================================= */

body:has(.students-page) .delete-modal-overlay{
    position:fixed !important;
    inset:0 !important;
    background:rgba(4,8,15,.78) !important;
    backdrop-filter:blur(6px) !important;
    -webkit-backdrop-filter:blur(6px) !important;
    display:none;
    align-items:center;
    justify-content:center;
    z-index:99999 !important;
    padding:20px;
}

body:has(.students-page) .delete-modal-overlay.show{
    display:flex !important;
}

body:has(.students-page) .delete-modal{
    position:relative !important;
    width:100% !important;
    max-width:390px !important;

    background:linear-gradient(
        145deg,
        #111b2a,
        #0d1521
    ) !important;

    border:1px solid #223149 !important;
    border-radius:15px !important;
    padding:30px !important;

    text-align:center;

    box-shadow:
        0 25px 60px rgba(0,0,0,.45),
        0 0 35px rgba(139,92,246,.07) !important;

    overflow:hidden;
    color:#edf3fb !important;
}

body:has(.students-page) .delete-modal::before{
    content:"";
    position:absolute;
    top:0;
    left:0;
    width:100%;
    height:1px;

    background:linear-gradient(
        90deg,
        transparent,
        rgba(244,63,94,.65),
        rgba(139,92,246,.45),
        transparent
    );
}


/* DELETE ICON */

body:has(.students-page) .delete-modal-icon{
    width:58px !important;
    height:58px !important;

    margin:0 auto 18px !important;

    border-radius:50% !important;

    display:flex !important;
    align-items:center;
    justify-content:center;

    background:rgba(244,63,94,.10) !important;
    border:1px solid rgba(244,63,94,.20) !important;

    color:#fb7185 !important;

    font-size:24px !important;

    box-shadow:
        0 0 22px rgba(244,63,94,.08) !important;

    filter:
        drop-shadow(0 0 6px rgba(244,63,94,.35));
}


/* TITLE */

body:has(.students-page) .delete-modal h3{
    color:#f8fafc !important;
    font-size:16px !important;
    font-weight:850 !important;

    margin-bottom:8px !important;
}


/* DESCRIPTION */

body:has(.students-page) .delete-modal p{
    color:#718096 !important;
    font-size:10px !important;
    line-height:1.6 !important;

    margin-bottom:24px !important;
}


/* BUTTON AREA */

body:has(.students-page) .delete-modal-actions{
    display:flex;
    justify-content:center;
    gap:8px;
}


/* CANCEL BUTTON */

body:has(.students-page) .modal-cancel-btn{
    background:#0d1725 !important;
    color:#718096 !important;

    border:1px solid #26364d !important;

    padding:9px 15px !important;

    border-radius:9px !important;

    font-size:10px !important;
    font-weight:850 !important;

    cursor:pointer;

    transition:
        transform .2s ease,
        background .2s ease,
        border-color .2s ease,
        color .2s ease;
}

body:has(.students-page) .modal-cancel-btn:hover{
    background:#111c2c !important;
    color:#dbe4f2 !important;
    border-color:#3a4c65 !important;

    transform:translateY(-2px);
}


/* DELETE BUTTON */

body:has(.students-page) .modal-delete-btn{
    position:relative;
    overflow:hidden;

    background:linear-gradient(
        135deg,
        #be123c,
        #f43f5e
    ) !important;

    color:#fff !important;

    border:1px solid rgba(251,113,133,.35) !important;

    padding:9px 15px !important;

    border-radius:9px !important;

    font-size:10px !important;
    font-weight:850 !important;

    cursor:pointer;

    box-shadow:
        0 7px 18px rgba(244,63,94,.18) !important;

    transition:
        transform .2s ease,
        box-shadow .2s ease,
        border-color .2s ease;
}


/* BUTTON SHINE */

body:has(.students-page) .modal-delete-btn::before{
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

body:has(.students-page) .modal-delete-btn:hover{
    color:#fff !important;

    transform:translateY(-2px);

    border-color:rgba(253,164,175,.65) !important;

    box-shadow:
        0 10px 25px rgba(244,63,94,.28) !important;
}

body:has(.students-page) .modal-delete-btn:hover::before{
    left:140%;
}


/* MOBILE */

@media(max-width:767px){

    body:has(.students-page) .delete-modal{
        padding:25px 20px !important;
    }

}

</style>


<div class="students-page">

    {{-- =====================================================
         PAGE HEADING
    ====================================================== --}}

    <div class="sp-heading">

        <div>

            <div class="sp-kicker">
                Smart Academy Management
            </div>

            <h1 class="sp-title">
                Students
            </h1>

            <p class="sp-subtitle">
                Manage academy students and their login accounts.
            </p>

        </div>


        <a
            href="{{ url('/students/create') }}"
            class="add-student-btn"
        >
            <i class="bi bi-plus-lg"></i>
            Add Student
        </a>

    </div>


    {{-- =====================================================
         STUDENTS CARD
    ====================================================== --}}

    <div class="students-card">

        <div class="students-card-header">

            <div class="card-heading-left">

                <div class="card-heading-icon">
                    <i class="bi bi-people-fill"></i>
                </div>

                <div>

                    <h5 class="students-card-title">
                        All Students
                    </h5>

                    <p class="students-card-subtitle">
                        Student records and account information
                    </p>

                </div>

            </div>

        </div>


        {{-- =================================================
             TABLE
        ================================================== --}}

        <div class="students-table-wrapper">

            <table class="students-table align-middle">

                <thead>

                    <tr>

                        <th>ID</th>

                        <th>Student Code</th>

                        <th>Name</th>

                        <th>Father Name</th>

                        <th>Phone</th>

                        <th>Email</th>

                        <th>Admission Date</th>

                        <th>Status</th>

                        <th>Actions</th>

                    </tr>

                </thead>


                <tbody>

                    @forelse ($students as $student)

                        <tr>

                            {{-- ID --}}

                            <td>

                                <span class="student-id">
                                    #{{ $student->id }}
                                </span>

                            </td>


                            {{-- Student Code --}}

                            <td>

                                <span class="student-code">
                                    {{ $student->student_code }}
                                </span>

                            </td>


                            {{-- Name --}}

                            <td>

                                <span class="student-name">

                                    {{ $student->first_name }}
                                    {{ $student->last_name }}

                                </span>

                            </td>


                            {{-- Father Name --}}

                            <td>
                                {{ $student->father_name }}
                            </td>


                            {{-- Phone --}}

                            <td>
                                {{ $student->phone ?? '-' }}
                            </td>


                            {{-- Email --}}

                            <td>

                                <span class="email-text">
                                    {{ $student->email ?? '-' }}
                                </span>

                            </td>


                            {{-- Admission Date --}}

                            <td>
                                {{ $student->admission_date }}
                            </td>


                            {{-- Status --}}

                            <td>

                                @if ($student->status === 'active')

                                    <span class="status-badge status-active">

                                        <i class="bi bi-check-circle-fill"></i>

                                        Active

                                    </span>

                                @else

                                    <span class="status-badge status-inactive">

                                        <i class="bi bi-dash-circle-fill"></i>

                                        Inactive

                                    </span>

                                @endif

                            </td>


                            {{-- Actions --}}

                            <td>

                                <div class="action-group">

                                    {{-- Edit --}}

                                    <a
                                        href="{{ url('/students/' . $student->id . '/edit') }}"
                                        class="action-btn edit-btn"
                                    >

                                        <i class="bi bi-pencil-fill"></i>

                                        Edit

                                    </a>


                                    {{-- Login Account --}}

                                    @if ($student->user_id)

                                        <span class="account-badge">

                                            <i class="bi bi-check-circle-fill"></i>

                                            Account Created

                                        </span>

                                    @else

                                        <form
                                            action="{{ route('students.create-account', $student->id) }}"
                                            method="POST"
                                            class="d-inline"
                                        >

                                            @csrf

                                            <button
                                                type="submit"
                                                class="action-btn login-btn"
                                            >

                                                <i class="bi bi-person-plus-fill"></i>

                                                Create Login

                                            </button>

                                        </form>

                                    @endif


                                    {{-- Delete --}}

                                    <form
                                        action="{{ route('students.destroy', $student) }}"
                                        method="POST"
                                        class="d-inline delete-form"
                                    >

                                        @csrf

                                        @method('DELETE')

                                        <button
                                            type="button"
                                            class="action-btn delete-btn delete-trigger"
                                        >

                                            <i class="bi bi-trash3-fill"></i>

                                            Delete

                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="9">

                                <div class="empty-students">

                                    <div class="empty-icon">
                                        <i class="bi bi-people"></i>
                                    </div>

                                    <div class="empty-title">
                                        No Students Found
                                    </div>

                                    <div class="empty-text">
                                        There are currently no students in the academy.
                                    </div>

                                </div>

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>


{{-- DELETE MODAL --}}

@include('components.delete-modal')

@endsection