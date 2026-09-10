@extends('layouts.app')

@section('title', 'Teachers')

@section('content')

<style>

/* =========================================================
   TEACHERS PAGE — SAME ADMIN DASHBOARD THEME
   ========================================================= */

:root{
    --tp-bg:#080e17;
    --tp-panel:#0f1826;
    --tp-panel2:#111c2c;
    --tp-input:#0b1420;
    --tp-border:#223149;
    --tp-border-soft:#1a2637;
    --tp-text:#edf3fb;
    --tp-text-light:#dbe4f2;
    --tp-muted:#718096;
    --tp-muted2:#64758c;
    --tp-purple:#8b5cf6;
    --tp-purple-light:#a78bfa;
    --tp-cyan:#22d3ee;
    --tp-green:#22c55e;
    --tp-red:#f43f5e;
    --tp-orange:#f59e0b;
}


/* =========================================================
   PAGE BACKGROUND
   ========================================================= */

body:has(.teachers-page){
    background:var(--tp-bg) !important;
}

body:has(.teachers-page) .main-wrapper{
    background:var(--tp-bg) !important;
}

body:has(.teachers-page) .page-content{
    background:var(--tp-bg) !important;
    min-height:calc(100vh - 76px) !important;
    padding:22px 24px 24px 24px !important;
    margin:0 !important;
}


/* =========================================================
   MAIN PAGE
   ========================================================= */

.teachers-page{
    width:100%;
    min-height:auto;
    margin:0 !important;
    padding:0 !important;
    color:var(--tp-text);

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
        var(--tp-bg);
}


/* =========================================================
   PAGE HEADER
   ========================================================= */

.teachers-page-heading{
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

    border:1px solid var(--tp-border);

    border-radius:15px;

    box-shadow:
        0 12px 30px rgba(0,0,0,.12);

    overflow:hidden;
}

.teachers-page-heading::before{
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

.teachers-page-heading::after{
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

.teachers-page-heading h1{
    position:relative;
    z-index:2;

    margin:0 0 4px;

    color:#f8fafc;

    font-size:20px;
    line-height:1.15;

    font-weight:850;

    letter-spacing:-.3px;
}

.teachers-page-heading p{
    position:relative;
    z-index:2;

    margin:0;

    color:#728197;

    font-size:10px;
}


/* =========================================================
   ADD TEACHER BUTTON
   SAME AS ADMIN DASHBOARD BUTTON
   ========================================================= */

.add-teacher-btn{
    position:relative;
    z-index:5;

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

.add-teacher-btn::before{
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

.add-teacher-btn:hover{
    color:#fff;

    transform:translateY(-3px);

    border-color:
        rgba(196,181,253,.75);

    box-shadow:
        0 12px 30px rgba(124,58,237,.32),
        0 0 20px rgba(139,92,246,.12);
}

.add-teacher-btn:hover::before{
    left:140%;
}

.add-teacher-btn i{
    transition:transform .25s ease;
}

.add-teacher-btn:hover i{
    transform:rotate(90deg) scale(1.08);

    filter:
        drop-shadow(
            0 0 5px
            rgba(255,255,255,.55)
        );
}


/* =========================================================
   TEACHERS CARD
   ========================================================= */

.teachers-card{
    position:relative;

    width:100%;

    background:
        linear-gradient(
            145deg,
            #111b2a,
            #0d1521
        );

    border:1px solid var(--tp-border);

    border-radius:15px;

    box-shadow:
        0 12px 30px rgba(0,0,0,.12);

    overflow:hidden;
}

.teachers-card::before{
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
   CARD HEADER
   ========================================================= */

.teachers-card-header{
    display:flex;

    align-items:center;
    justify-content:space-between;

    gap:12px;

    padding:14px 16px;

    border-bottom:
        1px solid #1e2b3e;
}

.teachers-card-title{
    font-size:12px;

    font-weight:850;

    color:#eef3fb;

    margin:0;
}

.teachers-card-subtitle{
    font-size:9px;

    color:#687890;

    margin:3px 0 0;
}


/* =========================================================
   TABLE WRAPPER
   ========================================================= */

.teachers-table-wrapper{
    width:100%;

    overflow-x:auto;

    scrollbar-width:thin;

    scrollbar-color:
        #26364d
        #0b1420;
}

.teachers-table-wrapper::-webkit-scrollbar{
    height:7px;
}

.teachers-table-wrapper::-webkit-scrollbar-track{
    background:#0b1420;
}

.teachers-table-wrapper::-webkit-scrollbar-thumb{
    background:#26364d;

    border-radius:999px;
}

.teachers-table-wrapper::-webkit-scrollbar-thumb:hover{
    background:#344963;
}


/* =========================================================
   TABLE
   ========================================================= */

.teachers-table{
    width:100%;

    min-width:1050px;

    margin:0;

    border-collapse:collapse;

    background:transparent;
}

.teachers-table thead th{
    background:#0b1420;

    color:#607089;

    font-size:8px;

    font-weight:900;

    text-transform:uppercase;

    letter-spacing:.6px;

    padding:10px 9px;

    border-bottom:
        1px solid #1c293b;

    white-space:nowrap;
}

.teachers-table tbody td{
    padding:11px 9px;

    border-bottom:
        1px solid #1a2637;

    font-size:10px;

    color:#cbd5e1;

    white-space:nowrap;

    vertical-align:middle;
}

.teachers-table tbody tr{
    transition:
        background .2s ease;
}

.teachers-table tbody tr:hover{
    background:
        rgba(139,92,246,.035);
}

.teachers-table tbody tr:last-child td{
    border-bottom:0;
}


/* =========================================================
   ID
   ========================================================= */

.teacher-id{
    color:#64758c;

    font-size:9px;

    font-weight:850;
}


/* =========================================================
   TEACHER CODE
   ========================================================= */

.teacher-code{
    display:inline-flex;

    align-items:center;

    padding:5px 8px;

    border-radius:7px;

    background:#172237;

    border:1px solid
        rgba(139,92,246,.12);

    color:#a78bfa;

    font-size:9px;

    font-weight:900;
}


/* =========================================================
   TEACHER NAME
   ========================================================= */

.teacher-name{
    color:#dbe4f2;

    font-weight:850;

    font-size:10px;
}


/* =========================================================
   EMAIL
   ========================================================= */

.email-text{
    color:#718096;

    font-size:9px;
}


/* =========================================================
   QUALIFICATION
   ========================================================= */

.qualification-text{
    color:#8494aa;

    font-size:9px;
}


/* =========================================================
   STATUS / ACCOUNT BADGES
   ========================================================= */

.status-badge,
.account-badge{
    display:inline-flex;

    align-items:center;

    gap:5px;

    padding:5px 8px;

    border-radius:7px;

    font-size:8px;

    font-weight:900;

    white-space:nowrap;
}

.status-active{
    background:
        rgba(34,197,94,.10);

    border:
        1px solid
        rgba(34,197,94,.16);

    color:#86efac;
}

.status-inactive{
    background:
        rgba(100,116,139,.10);

    border:
        1px solid
        rgba(100,116,139,.15);

    color:#94a3b8;
}

.account-created{
    background:
        rgba(34,197,94,.10);

    border:
        1px solid
        rgba(34,197,94,.16);

    color:#86efac;
}

.account-warning{
    background:
        rgba(245,158,11,.09);

    border:
        1px solid
        rgba(245,158,11,.16);

    color:#fbbf24;
}

.status-badge i,
.account-badge i{
    font-size:8px;
}


/* =========================================================
   ACTIONS
   ========================================================= */

.action-group{
    display:flex;

    align-items:center;

    gap:5px;

    flex-wrap:nowrap;
}

.action-btn{
    position:relative;

    display:inline-flex;

    align-items:center;
    justify-content:center;

    gap:4px;

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


/* =========================================================
   EDIT
   ========================================================= */

.edit-btn{
    background:
        rgba(245,158,11,.09);

    border-color:
        rgba(245,158,11,.15);

    color:#fbbf24;
}

.edit-btn:hover{
    background:
        rgba(245,158,11,.15);

    border-color:
        rgba(245,158,11,.30);

    color:#fcd34d;

    box-shadow:
        0 7px 16px rgba(245,158,11,.10);
}


/* =========================================================
   LOGIN
   ========================================================= */

.login-btn{
    background:
        rgba(139,92,246,.10);

    border-color:
        rgba(139,92,246,.16);

    color:#a78bfa;
}

.login-btn:hover{
    background:
        rgba(139,92,246,.16);

    border-color:
        rgba(139,92,246,.30);

    color:#c4b5fd;

    box-shadow:
        0 7px 16px rgba(139,92,246,.10);
}


/* =========================================================
   DELETE
   ========================================================= */

.delete-btn{
    background:
        rgba(244,63,94,.09);

    border-color:
        rgba(244,63,94,.15);

    color:#fb7185;
}

.delete-btn:hover{
    background:
        rgba(244,63,94,.15);

    border-color:
        rgba(244,63,94,.30);

    color:#fda4af;

    box-shadow:
        0 7px 16px rgba(244,63,94,.10);
}


/* =========================================================
   EMPTY STATE
   ========================================================= */

.empty-teachers{
    padding:50px 20px;

    text-align:center;

    color:#64758c;
}

.empty-icon{
    width:55px;
    height:55px;

    margin:0 auto 12px;

    border-radius:15px;

    background:#172237;

    border:1px solid
        rgba(139,92,246,.12);

    display:flex;

    align-items:center;
    justify-content:center;

    font-size:23px;

    color:#a78bfa;

    box-shadow:
        inset 0 0 15px
        rgba(139,92,246,.04);

    filter:
        drop-shadow(
            0 0 5px
            rgba(34,211,238,.25)
        );
}

.empty-title{
    color:#dbe4f2;

    font-size:11px;

    font-weight:850;

    margin-bottom:4px;
}

.empty-text{
    color:#64758c;

    font-size:9px;
}


/* =========================================================
   DELETE MODAL OVERLAY
   ========================================================= */

.delete-modal-overlay{
    position:fixed;

    inset:0;

    background:
        rgba(4,8,15,.78);

    backdrop-filter:blur(6px);

    -webkit-backdrop-filter:blur(6px);

    display:none;

    align-items:center;
    justify-content:center;

    z-index:99999;

    padding:20px;
}

.delete-modal-overlay.show{
    display:flex;
}


/* =========================================================
   DELETE MODAL
   ========================================================= */

.delete-modal{
    position:relative;

    width:100%;

    max-width:390px;

    background:
        linear-gradient(
            145deg,
            #111b2a,
            #0d1521
        );

    border:1px solid var(--tp-border);

    border-radius:15px;

    padding:30px;

    text-align:center;

    box-shadow:
        0 25px 60px rgba(0,0,0,.45),
        0 0 35px rgba(139,92,246,.07);

    animation:
        deleteModalIn .2s ease;

    overflow:hidden;
}

.delete-modal::before{
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
            rgba(244,63,94,.65),
            rgba(139,92,246,.45),
            transparent
        );
}

@keyframes deleteModalIn{

    from{
        opacity:0;

        transform:
            translateY(10px)
            scale(.97);
    }

    to{
        opacity:1;

        transform:
            translateY(0)
            scale(1);
    }

}


/* =========================================================
   MODAL ICON
   ========================================================= */

.delete-modal-icon{
    width:58px;
    height:58px;

    margin:0 auto 18px;

    border-radius:50%;

    display:flex;

    align-items:center;
    justify-content:center;

    background:
        rgba(244,63,94,.10);

    border:
        1px solid
        rgba(244,63,94,.20);

    color:#fb7185;

    font-size:24px;

    box-shadow:
        0 0 22px
        rgba(244,63,94,.08);

    filter:
        drop-shadow(
            0 0 6px
            rgba(244,63,94,.35)
        );
}

.delete-modal h3{
    color:#f8fafc;

    font-size:16px;

    font-weight:850;

    margin-bottom:8px;
}

.delete-modal p{
    color:#718096;

    font-size:10px;

    line-height:1.6;

    margin-bottom:24px;
}


/* =========================================================
   MODAL BUTTONS
   ========================================================= */

.delete-modal-actions{
    display:flex;

    justify-content:center;

    gap:8px;
}

.modal-cancel-btn{
    background:#0d1725;

    color:#718096;

    border:
        1px solid #26364d;

    padding:9px 15px;

    border-radius:9px;

    font-size:10px;

    font-weight:850;

    cursor:pointer;

    transition:
        transform .2s ease,
        background .2s ease,
        border-color .2s ease,
        color .2s ease;
}

.modal-cancel-btn:hover{
    background:#111c2c;

    color:#dbe4f2;

    border-color:#3a4c65;

    transform:translateY(-2px);
}

.modal-delete-btn{
    position:relative;

    overflow:hidden;

    background:
        linear-gradient(
            135deg,
            #be123c,
            #f43f5e
        );

    color:white;

    border:
        1px solid
        rgba(251,113,133,.35);

    padding:9px 15px;

    border-radius:9px;

    font-size:10px;

    font-weight:850;

    cursor:pointer;

    box-shadow:
        0 7px 18px
        rgba(244,63,94,.18);

    transition:
        transform .2s ease,
        box-shadow .2s ease,
        border-color .2s ease;
}

.modal-delete-btn::before{
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

    transition:left .5s ease;
}

.modal-delete-btn:hover{
    color:#fff;

    transform:translateY(-2px);

    border-color:
        rgba(253,164,175,.65);

    box-shadow:
        0 10px 25px
        rgba(244,63,94,.28);
}

.modal-delete-btn:hover::before{
    left:140%;
}


/* =========================================================
   MOBILE
   ========================================================= */

@media(max-width:767px){

    body:has(.teachers-page) .page-content{
        padding:
            16px 15px 20px 15px !important;
    }

    .teachers-page-heading{
        padding:15px;

        margin-bottom:15px;

        gap:12px;

        align-items:flex-start !important;
    }

    .teachers-page-heading h1{
        font-size:17px;
    }

    .teachers-page-heading p{
        font-size:8px;
    }

    .add-teacher-btn{
        padding:8px 11px;

        font-size:9px;

        white-space:nowrap;
    }

    .teachers-card{
        border-radius:13px;
    }

    .teachers-card-header{
        padding:13px 14px;
    }

    .teachers-card-title{
        font-size:11px;
    }

    .teachers-card-subtitle{
        font-size:8px;
    }

    .teachers-table{
        min-width:1000px;
    }

    .teachers-table thead th{
        padding:9px 8px;
    }

    .teachers-table tbody td{
        padding:10px 8px;
    }

    .delete-modal{
        padding:25px 20px;
    }

}
/* =========================================================
   FORCE TABLE RECORD TEXT DARK THEME
   ========================================================= */

.teachers-page .teachers-table,
.teachers-page .teachers-table tbody,
.teachers-page .teachers-table tr,
.teachers-page .teachers-table td,
.teachers-page .teachers-table th{
    background-color:transparent !important;
}

.teachers-page .teachers-table tbody td{
    color:#cbd5e1 !important;
}

.teachers-page .teachers-table tbody td span{
    color:inherit;
}

/* Individual text colors */
.teachers-page .teachers-table .teacher-id{
    color:#64758c !important;
}

.teachers-page .teachers-table .teacher-code{
    color:#a78bfa !important;
}

.teachers-page .teachers-table .teacher-name{
    color:#dbe4f2 !important;
}

.teachers-page .teachers-table .email-text{
    color:#718096 !important;
}

.teachers-page .teachers-table .qualification-text{
    color:#8494aa !important;
}

/* Status */
.teachers-page .teachers-table .status-active{
    color:#86efac !important;
}

.teachers-page .teachers-table .status-inactive{
    color:#94a3b8 !important;
}

/* Account */
.teachers-page .teachers-table .account-created{
    color:#86efac !important;
}

.teachers-page .teachers-table .account-warning{
    color:#fbbf24 !important;
}

/* Action buttons */
.teachers-page .teachers-table .edit-btn{
    color:#fbbf24 !important;
}

.teachers-page .teachers-table .login-btn{
    color:#a78bfa !important;
}

.teachers-page .teachers-table .delete-btn{
    color:#fb7185 !important;
}
</style>


<div class="teachers-page">


    {{-- =====================================================
         PAGE HEADER
    ====================================================== --}}

    <div class="teachers-page-heading">

        <div>

            <h1>
                Teachers
            </h1>

            <p>
                Manage academy teachers and their login accounts.
            </p>

        </div>


        <a
            href="{{ route('teachers.create') }}"
            class="add-teacher-btn"
        >

            <i class="bi bi-plus-lg"></i>

            Add Teacher

        </a>

    </div>



    {{-- =====================================================
         TEACHERS CARD
    ====================================================== --}}

    <div class="teachers-card">


        <div class="teachers-card-header">

            <div>

                <h5 class="teachers-card-title">
                    All Teachers
                </h5>

                <p class="teachers-card-subtitle">
                    Teacher records and account information
                </p>

            </div>

        </div>



        {{-- TABLE --}}

        <div class="teachers-table-wrapper">

            <table class="table teachers-table align-middle">


                <thead>

                    <tr>

                        <th>
                            ID
                        </th>

                        <th>
                            Teacher Code
                        </th>

                        <th>
                            Name
                        </th>

                        <th>
                            Phone
                        </th>

                        <th>
                            Email
                        </th>

                        <th>
                            Qualification
                        </th>

                        <th>
                            Joining Date
                        </th>

                        <th>
                            Status
                        </th>

                        <th>
                            Account
                        </th>

                        <th>
                            Actions
                        </th>

                    </tr>

                </thead>



                <tbody>


                    @forelse ($teachers as $teacher)


                        <tr>


                            {{-- ID --}}

                            <td>

                                <span class="teacher-id">
                                    #{{ $teacher->id }}
                                </span>

                            </td>



                            {{-- Teacher Code --}}

                            <td>

                                <span class="teacher-code">
                                    {{ $teacher->teacher_code }}
                                </span>

                            </td>



                            {{-- Name --}}

                            <td>

                                <span class="teacher-name">

                                    {{ $teacher->first_name }}

                                    {{ $teacher->last_name }}

                                </span>

                            </td>



                            {{-- Phone --}}

                            <td>

                                {{ $teacher->phone ?? '-' }}

                            </td>



                            {{-- Email --}}

                            <td>

                                <span class="email-text">

                                    {{ $teacher->email ?? '-' }}

                                </span>

                            </td>



                            {{-- Qualification --}}

                            <td>

                                <span class="qualification-text">

                                    {{ $teacher->qualification ?? '-' }}

                                </span>

                            </td>



                            {{-- Joining Date --}}

                            <td>

                                {{ $teacher->joining_date ?? '-' }}

                            </td>



                            {{-- Status --}}

                            <td>


                                @if ($teacher->status === 'active')


                                    <span
                                        class="status-badge status-active"
                                    >

                                        <i class="bi bi-check-circle-fill"></i>

                                        Active

                                    </span>


                                @else


                                    <span
                                        class="status-badge status-inactive"
                                    >

                                        <i class="bi bi-dash-circle-fill"></i>

                                        Inactive

                                    </span>


                                @endif


                            </td>



                            {{-- Account --}}

                            <td>


                                @if ($teacher->user_id)


                                    <span
                                        class="account-badge account-created"
                                    >

                                        <i class="bi bi-check-circle-fill"></i>

                                        Created

                                    </span>


                                @else


                                    @if ($teacher->email)


                                        <form
                                            action="{{ route('teachers.create-account', $teacher) }}"
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


                                    @else


                                        <span
                                            class="account-badge account-warning"
                                        >

                                            <i class="bi bi-exclamation-circle-fill"></i>

                                            Add Email First

                                        </span>


                                    @endif


                                @endif


                            </td>



                            {{-- Actions --}}

                            <td>


                                <div class="action-group">


                                    {{-- Edit --}}

                                    <a
                                        href="{{ route('teachers.edit', $teacher) }}"
                                        class="action-btn edit-btn"
                                    >

                                        <i class="bi bi-pencil-fill"></i>

                                        Edit

                                    </a>



                                    {{-- Delete --}}

                                    <form
                                        action="{{ route('teachers.destroy', $teacher) }}"
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

                            <td colspan="10">

                                <div class="empty-teachers">


                                    <div class="empty-icon">

                                        <i class="bi bi-person-video3"></i>

                                    </div>


                                    <div class="empty-title">

                                        No Teachers Found

                                    </div>


                                    <div class="empty-text">

                                        There are currently no teachers
                                        in the academy.

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



{{-- =========================================================
     DELETE CONFIRMATION MODAL
========================================================= --}}

<div
    class="delete-modal-overlay"
    id="deleteModal"
>


    <div class="delete-modal">


        <div class="delete-modal-icon">

            <i class="bi bi-trash3-fill"></i>

        </div>


        <h3>
            Delete Teacher?
        </h3>


        <p>

            Are you sure you want to delete this teacher?
            This action cannot be undone.

        </p>


        <div class="delete-modal-actions">


            <button
                type="button"
                class="modal-cancel-btn"
                id="cancelDelete"
            >

                Cancel

            </button>


            <button
                type="button"
                class="modal-delete-btn"
                id="confirmDelete"
            >

                <i class="bi bi-trash3"></i>

                Yes, Delete

            </button>


        </div>


    </div>

</div>



<script>

document.addEventListener(
    'DOMContentLoaded',
    function(){

        const modal =
            document.getElementById('deleteModal');

        const cancelButton =
            document.getElementById('cancelDelete');

        const confirmButton =
            document.getElementById('confirmDelete');

        let deleteForm = null;



        /* =====================================================
           OPEN MODAL
        ====================================================== */

        document.addEventListener(
            'click',
            function(event){

                const deleteButton =
                    event.target.closest(
                        '.delete-trigger'
                    );

                if(!deleteButton){
                    return;
                }


                const form =
                    deleteButton.closest(
                        '.delete-form'
                    );

                if(!form){
                    return;
                }


                deleteForm = form;

                modal.classList.add('show');

            }
        );



        /* =====================================================
           CANCEL
        ====================================================== */

        cancelButton.addEventListener(
            'click',
            function(){

                modal.classList.remove('show');

                deleteForm = null;

            }
        );



        /* =====================================================
           CONFIRM DELETE
        ====================================================== */

        confirmButton.addEventListener(
            'click',
            function(){

                if(deleteForm){

                    deleteForm.submit();

                }

            }
        );



        /* =====================================================
           CLICK OUTSIDE
        ====================================================== */

        modal.addEventListener(
            'click',
            function(event){

                if(event.target === modal){

                    modal.classList.remove('show');

                    deleteForm = null;

                }

            }
        );



        /* =====================================================
           ESCAPE KEY
        ====================================================== */

        document.addEventListener(
            'keydown',
            function(event){

                if(event.key === 'Escape'){

                    modal.classList.remove('show');

                    deleteForm = null;

                }

            }
        );

    }
);

</script>

@endsection