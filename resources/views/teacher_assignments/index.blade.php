@extends('layouts.app')

@section('title', 'Teacher Assignments')

@section('content')

<style>
    /* =========================================================
       TEACHER ASSIGNMENTS — DARK ADMIN THEME
       ========================================================= */

    body:has(.teacher-assignments-page){
        background:#080e17 !important;
    }

    body:has(.teacher-assignments-page) .main-wrapper{
        background:#080e17 !important;
    }

    body:has(.teacher-assignments-page) .page-content{
        background:#080e17 !important;
        padding:18px 20px 0 20px !important;
        margin:0 !important;
        min-height:calc(100vh - 76px) !important;
    }

    .teacher-assignments-page{
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

    .teacher-assignments-page *,
    .teacher-assignments-page *::before,
    .teacher-assignments-page *::after{
        box-sizing:border-box;
    }


    /* =========================================================
       PAGE HEADER
       ========================================================= */

    .ta-header{
        display:flex;
        align-items:center;
        justify-content:space-between;
        gap:18px;
        margin-bottom:20px;
    }

    .ta-kicker{
        font-size:10px;
        letter-spacing:1.7px;
        text-transform:uppercase;
        color:#a78bfa;
        font-weight:900;
        margin-bottom:4px;
    }

    .ta-title{
        font-size:27px;
        line-height:1.15;
        font-weight:850;
        color:#f8fafc;
        margin:0 0 5px;
    }

    .ta-subtitle{
        font-size:12px;
        color:#728197;
        margin:0;
    }


    /* =========================================================
       ASSIGN TEACHER BUTTON
       ========================================================= */

    .add-assignment-btn{
        position:relative;

        display:inline-flex;
        align-items:center;
        justify-content:center;
        gap:6px;

        overflow:hidden;

        padding:10px 15px;

        border-radius:10px;

        background:linear-gradient(
            135deg,
            #6848e8,
            #8b5cf6
        ) !important;

        border:1px solid rgba(167,139,250,.45) !important;

        color:#fff !important;

        font-size:10px;
        font-weight:850;

        text-decoration:none;

        box-shadow:
            0 8px 22px rgba(124,58,237,.20);

        transition:
            transform .25s ease,
            box-shadow .25s ease,
            border-color .25s ease;
    }

    .add-assignment-btn::before{
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

    .add-assignment-btn:hover{
        color:#fff !important;

        transform:translateY(-3px);

        border-color:rgba(196,181,253,.75) !important;

        box-shadow:
            0 12px 30px rgba(124,58,237,.32),
            0 0 20px rgba(139,92,246,.12);
    }

    .add-assignment-btn:hover::before{
        left:140%;
    }

    .add-assignment-btn i{
        transition:transform .25s ease;
    }

    .add-assignment-btn:hover i{
        transform:rotate(90deg) scale(1.08);

        filter:
            drop-shadow(
                0 0 5px rgba(255,255,255,.55)
            );
    }


    /* =========================================================
       SUCCESS ALERT
       ========================================================= */

    .teacher-assignments-page .success-alert{
        display:flex;
        align-items:center;

        background:rgba(34,197,94,.07) !important;

        border:1px solid rgba(34,197,94,.17) !important;

        color:#86efac !important;

        border-radius:10px;

        font-size:10px;

        padding:10px 13px;

        box-shadow:none !important;
    }

    .teacher-assignments-page .success-alert i{
        color:#22c55e;

        filter:
            drop-shadow(
                0 0 5px rgba(34,197,94,.45)
            );
    }


    /* =========================================================
       TABLE CARD
       ========================================================= */

    .assignment-table-card{
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
       TABLE WRAPPER
       ========================================================= */

    .teacher-assignments-page .table-responsive{
        width:100%;
        overflow-x:auto;
        overflow-y:hidden;

        scrollbar-width:thin;
        scrollbar-color:#293952 #0d1725;
    }

    .teacher-assignments-page .table-responsive::-webkit-scrollbar{
        height:6px;
    }

    .teacher-assignments-page .table-responsive::-webkit-scrollbar-track{
        background:#0d1725;
    }

    .teacher-assignments-page .table-responsive::-webkit-scrollbar-thumb{
        background:#293952;
        border-radius:999px;
    }


    /* =========================================================
       BOOTSTRAP TABLE OVERRIDES
       ========================================================= */

    .teacher-assignments-page .assignment-table{
        --bs-table-bg:transparent !important;
        --bs-table-color:#cbd5e1 !important;
        --bs-table-border-color:#1a2637 !important;
        --bs-table-hover-bg:rgba(139,92,246,.035) !important;
        --bs-table-hover-color:#dbe4f2 !important;

        width:100%;

        min-width:900px;

        margin:0 !important;

        background:transparent !important;
    }

    .teacher-assignments-page .assignment-table > :not(caption) > * > *{
        background-color:transparent !important;

        color:#cbd5e1 !important;

        border-bottom-color:#1a2637 !important;

        box-shadow:none !important;
    }


    /* =========================================================
       TABLE HEADER
       ========================================================= */

    .assignment-table thead th{
        background:#0f1928 !important;

        color:#64758c !important;

        border-bottom:1px solid #1f2d42 !important;

        border-top:none !important;

        padding:12px 15px;

        font-size:8px;

        font-weight:900;

        text-transform:uppercase;

        letter-spacing:.7px;

        white-space:nowrap;
    }


    /* =========================================================
       TABLE BODY
       ========================================================= */

    .assignment-table tbody td{
        padding:12px 15px;

        color:#cbd5e1 !important;

        font-size:10px;

        border-color:#1a2637 !important;

        vertical-align:middle;

        white-space:nowrap;
    }

    .assignment-table tbody tr{
        transition:
            background .2s ease,
            transform .2s ease;
    }

    .assignment-table tbody tr:hover{
        background:rgba(139,92,246,.025) !important;
    }

    .assignment-table tbody tr:last-child td{
        border-bottom:none !important;
    }


    /* =========================================================
       ID
       ========================================================= */

    .assignment-id{
        color:#64758c !important;

        font-size:9px;

        font-weight:850;
    }


    /* =========================================================
       TEACHER
       ========================================================= */

    .teacher-name{
        color:#dbe4f2 !important;

        font-size:10px;

        font-weight:850;
    }


    /* =========================================================
       CLASS
       ========================================================= */

    .class-name{
        color:#aebbd0 !important;

        font-size:10px;

        font-weight:750;
    }


    /* =========================================================
       GROUP BADGE
       ========================================================= */

    .group-badge{
        display:inline-flex;

        align-items:center;

        gap:5px;

        padding:5px 9px;

        border-radius:7px;

        background:#162437 !important;

        border:1px solid #223149;

        color:#7dd3fc !important;

        font-size:8px;

        font-weight:850;

        white-space:nowrap;
    }

    .group-badge i{
        font-size:8px;

        color:#22d3ee;
    }


    /* =========================================================
       SUBJECT
       ========================================================= */

    .subject-name{
        color:#a78bfa !important;

        font-size:10px;

        font-weight:800;
    }


    /* =========================================================
       ACTION BUTTON
       ========================================================= */

    .action-btn{
        display:inline-flex;

        align-items:center;
        justify-content:center;

        gap:4px;

        padding:7px 10px;

        border-radius:8px;

        font-size:9px;

        font-weight:850;

        cursor:pointer;

        transition:
            transform .2s ease,
            background .2s ease,
            border-color .2s ease,
            color .2s ease,
            box-shadow .2s ease;
    }

    .delete-btn{
        background:rgba(244,63,94,.07) !important;

        color:#fb7185 !important;

        border:1px solid rgba(244,63,94,.16) !important;
    }

    .delete-btn:hover{
        background:rgba(244,63,94,.13) !important;

        color:#fda4af !important;

        border-color:rgba(244,63,94,.28) !important;

        transform:translateY(-2px);

        box-shadow:
            0 6px 16px rgba(244,63,94,.10);
    }

    .delete-btn i{
        transition:transform .2s ease;
    }

    .delete-btn:hover i{
        transform:scale(1.08);
    }


    /* =========================================================
       EMPTY STATE
       ========================================================= */

    .empty-state{
        padding:55px 20px !important;

        text-align:center;

        border-bottom:none !important;
    }

    .empty-state-icon{
        width:55px;
        height:55px;

        margin:0 auto 14px;

        border-radius:14px;

        display:flex;

        align-items:center;

        justify-content:center;

        background:rgba(139,92,246,.09);

        border:1px solid rgba(139,92,246,.15);

        color:#a78bfa;

        font-size:21px;

        box-shadow:
            0 0 20px rgba(139,92,246,.06);
    }

    .empty-state-icon i{
        filter:
            drop-shadow(
                0 0 6px rgba(34,211,238,.45)
            );
    }

    .empty-state h5{
        color:#dbe4f2 !important;

        font-size:13px;

        font-weight:850;

        margin-bottom:5px;
    }

    .empty-state p{
        color:#64758c !important;

        font-size:9px;

        margin:0;
    }


    /* =========================================================
       MOBILE
       ========================================================= */

    @media(max-width:767px){

        body:has(.teacher-assignments-page) .page-content{
            padding:15px 15px 0 15px !important;
        }

        .teacher-assignments-page{
            min-height:calc(100vh - 80px);
        }

        .ta-header{
            align-items:flex-start;
            gap:12px;
        }

        .ta-kicker{
            font-size:8px;
        }

        .ta-title{
            font-size:22px;
        }

        .ta-subtitle{
            font-size:10px;
        }

        .add-assignment-btn{
            padding:9px 11px;

            white-space:nowrap;
        }

        .assignment-table-card{
            border-radius:13px;
        }
    }

    /* =========================================================
   DELETE MODAL — DARK ADMIN THEME
   ========================================================= */

body:has(.add-assignment-page) .delete-modal-overlay{
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

body:has(.add-assignment-page) .delete-modal-overlay.show{
    display:flex !important;
}

body:has(.add-assignment-page) .delete-modal{
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

body:has(.add-assignment-page) .delete-modal::before{
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


/* ICON */

body:has(.add-assignment-page) .delete-modal-icon{
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
        drop-shadow(
            0 0 6px rgba(244,63,94,.35)
        );
}


/* TITLE */

body:has(.add-assignment-page) .delete-modal h3{
    color:#f8fafc !important;

    font-size:16px !important;

    font-weight:850 !important;

    margin-bottom:8px !important;
}


/* TEXT */

body:has(.add-assignment-page) .delete-modal p{
    color:#718096 !important;

    font-size:10px !important;

    line-height:1.6 !important;

    margin-bottom:24px !important;
}


/* BUTTON AREA */

body:has(.add-assignment-page) .delete-modal-actions{
    display:flex;

    justify-content:center;

    gap:8px;
}


/* CANCEL */

body:has(.add-assignment-page) .modal-cancel-btn{
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

body:has(.add-assignment-page) .modal-cancel-btn:hover{
    background:#111c2c !important;

    color:#dbe4f2 !important;

    border-color:#3a4c65 !important;

    transform:translateY(-2px);
}


/* DELETE */

body:has(.add-assignment-page) .modal-delete-btn{
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

body:has(.add-assignment-page) .modal-delete-btn::before{
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

body:has(.add-assignment-page) .modal-delete-btn:hover{
    color:#fff !important;

    transform:translateY(-2px);

    border-color:rgba(253,164,175,.65) !important;

    box-shadow:
        0 10px 25px rgba(244,63,94,.28) !important;
}

body:has(.add-assignment-page) .modal-delete-btn:hover::before{
    left:140%;
}


@media(max-width:767px){

    body:has(.add-assignment-page) .delete-modal{
        padding:25px 20px !important;
    }

}

</style>


<div class="teacher-assignments-page">

    {{-- =====================================================
         PAGE HEADER
         ===================================================== --}}

    <div class="ta-header">

        <div>

            <div class="ta-kicker">
                Academy Management
            </div>

            <h1 class="ta-title">
                Teacher Assignments
            </h1>

            <p class="ta-subtitle">
                Manage teacher assignments for classes, groups and subjects.
            </p>

        </div>


        <a
            href="{{ route('teacher-assignments.create') }}"
            class="add-assignment-btn"
        >
            <i class="bi bi-plus-lg"></i>
            Assign Teacher
        </a>

    </div>


    {{-- =====================================================
         SUCCESS MESSAGE
         ===================================================== --}}

    @if(session('success'))

        <div class="success-alert mb-4">

            <i class="bi bi-check-circle-fill me-1"></i>

            {{ session('success') }}

        </div>

    @endif


    {{-- =====================================================
         ASSIGNMENTS TABLE
         ===================================================== --}}

    <div class="assignment-table-card">

        <div class="table-responsive">

            <table class="table assignment-table align-middle">

                <thead>

                    <tr>

                        <th>ID</th>

                        <th>Teacher</th>

                        <th>Class</th>

                        <th>Group</th>

                        <th>Subject</th>

                        <th>Action</th>

                    </tr>

                </thead>


                <tbody>

                    @forelse ($assignments as $assignment)

                        <tr>

                            {{-- ID --}}

                            <td>

                                <span class="assignment-id">

                                    #{{ $assignment->id }}

                                </span>

                            </td>


                            {{-- TEACHER --}}

                            <td>

                                <span class="teacher-name">

                                    {{ $assignment->teacher->first_name }}
                                    {{ $assignment->teacher->last_name }}

                                </span>

                            </td>


                            {{-- CLASS --}}

                            <td>

                                <span class="class-name">

                                    {{ $assignment->academyClass->name }}

                                </span>

                            </td>


                            {{-- GROUP --}}

                            <td>

                                <span class="group-badge">

                                    <i class="bi bi-people-fill"></i>

                                    {{ $assignment->group->name }}

                                </span>

                            </td>


                            {{-- SUBJECT --}}

                            <td>

                                <span class="subject-name">

                                    {{ $assignment->subject->name }}

                                </span>

                            </td>


                            {{-- ACTION --}}

                            <td>

                                <form
                                    action="{{ route('teacher-assignments.destroy', $assignment) }}"
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

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td
                                colspan="6"
                                class="empty-state"
                            >

                                <div class="empty-state-icon">

                                    <i class="bi bi-person-workspace"></i>

                                </div>

                                <h5>
                                    No Teacher Assignments Found
                                </h5>

                                <p>
                                    Assign a teacher to a class, group and subject to get started.
                                </p>

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>


    {{-- =====================================================
         DELETE CONFIRMATION MODAL
         ===================================================== --}}

    @include('components.delete-modal')

</div>

@endsection