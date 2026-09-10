@extends('layouts.app')

@section('title', 'Courses')

@section('content')

<style>
    /* =========================================================
       COURSES — DARK ADMIN THEME
    ========================================================= */

    .courses-page{
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
        min-height:auto;
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
            var(--c-bg);
    }

    /* ================= PAGE HEADER ================= */

    .courses-page-header{
        display:flex;
        align-items:center;
        justify-content:space-between;
        gap:18px;
        margin-bottom:20px;
    }

    .courses-kicker{
        font-size:10px;
        text-transform:uppercase;
        letter-spacing:1.7px;
        color:var(--c-purple-light);
        font-weight:900;
        margin-bottom:5px;
    }

    .courses-title{
        margin:0;
        color:#f8fafc;
        font-size:27px;
        line-height:1.15;
        font-weight:850;
        letter-spacing:-.3px;
    }

    .courses-subtitle{
        margin:5px 0 0;
        color:#728197;
        font-size:11px;
    }

    /* ================= ADD BUTTON ================= */

    .add-course-btn{
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

    .add-course-btn::before{
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

    .add-course-btn:hover{
        color:#fff;
        transform:translateY(-3px);

        border-color:rgba(196,181,253,.75);

        box-shadow:
            0 12px 30px rgba(124,58,237,.32),
            0 0 20px rgba(139,92,246,.12);
    }

    .add-course-btn:hover::before{
        left:140%;
    }

    .add-course-btn i{
        transition:transform .25s ease;
    }

    .add-course-btn:hover i{
        transform:rotate(90deg) scale(1.08);

        filter:
            drop-shadow(0 0 5px rgba(255,255,255,.55));
    }

    /* ================= TABLE CARD ================= */

    .course-table-card{
        width:100%;
        overflow:hidden;

        background:
            linear-gradient(
                145deg,
                #111b2a,
                #0d1521
            );

        border:1px solid var(--c-border);
        border-radius:15px;

        box-shadow:
            0 12px 30px rgba(0,0,0,.18);
    }

    .course-table-wrapper{
        width:100%;
        overflow-x:auto;
        overflow-y:hidden;
    }

    /* ================= TABLE ================= */

    .courses-page .course-table{
        width:100%;
        min-width:850px;

        margin:0;

        border-collapse:collapse;

        --bs-table-bg:transparent !important;
        --bs-table-color:#cbd5e1 !important;
        --bs-table-border-color:#1a2637 !important;
        --bs-table-hover-bg:rgba(139,92,246,.035) !important;
        --bs-table-hover-color:#dbe4f2 !important;
    }

    .courses-page .course-table > :not(caption) > * > *{
        background-color:transparent !important;
        border-bottom-color:#1a2637 !important;
        box-shadow:none !important;
    }

    /* ================= TABLE HEADER ================= */

    .courses-page .course-table thead th{
        padding:11px 14px;

        background:#0d1725 !important;

        color:#607089 !important;

        border-bottom:1px solid #1e2b3e !important;
        border-top:none;

        font-size:8px;
        font-weight:900;

        text-transform:uppercase;
        letter-spacing:.7px;

        white-space:nowrap;
    }

    /* ================= TABLE RECORDS ================= */

    .courses-page .course-table tbody td{
        padding:12px 14px;

        background:transparent !important;

        color:#9aa8bb !important;

        border-bottom:1px solid #1a2637 !important;

        font-size:10px;

        vertical-align:middle;

        transition:
            background .2s ease,
            color .2s ease;
    }

    .courses-page .course-table tbody tr{
        transition:background .2s ease;
    }

    .courses-page .course-table tbody tr:hover{
        background:rgba(139,92,246,.035) !important;
    }

    .courses-page .course-table tbody tr:last-child td{
        border-bottom:none !important;
    }

    /* ================= RECORD TEXT ================= */

    .courses-page .course-id{
        color:#64758c !important;
        font-size:9px;
        font-weight:800;
    }

    .courses-page .course-code{
        display:inline-flex;
        align-items:center;

        padding:5px 8px;

        background:rgba(139,92,246,.10) !important;
        border:1px solid rgba(139,92,246,.18);

        color:#a78bfa !important;

        border-radius:7px;

        font-size:8px;
        font-weight:900;

        letter-spacing:.3px;
    }

    .courses-page .course-name{
        color:#dbe4f2 !important;
        font-size:10px;
        font-weight:850;
    }

    .courses-page .course-duration{
        color:#8494aa !important;
    }

    .courses-page .course-fee{
        color:#cbd5e1 !important;
        font-weight:850;
    }

    /* ================= STATUS ================= */

    .courses-page .status-badge{
        display:inline-flex;
        align-items:center;
        gap:5px;

        padding:5px 8px;

        border-radius:999px;

        font-size:8px;
        font-weight:900;

        white-space:nowrap;
    }

    .courses-page .status-active{
        background:rgba(34,197,94,.10) !important;
        border:1px solid rgba(34,197,94,.16);
        color:#86efac !important;
    }

    .courses-page .status-inactive{
        background:rgba(100,116,139,.10) !important;
        border:1px solid rgba(100,116,139,.15);
        color:#94a3b8 !important;
    }

    .courses-page .status-dot{
        width:5px;
        height:5px;

        flex-shrink:0;

        border-radius:50%;

        background:currentColor;

        box-shadow:
            0 0 7px currentColor;
    }

    /* ================= ACTIONS ================= */

    .courses-page .action-buttons{
        display:flex;
        align-items:center;
        gap:6px;
        flex-wrap:wrap;
    }

    .courses-page .edit-btn,
    .courses-page .delete-btn{
        display:inline-flex;
        align-items:center;
        justify-content:center;

        padding:6px 9px;

        border-radius:8px;

        font-size:8px;
        font-weight:850;

        text-decoration:none;

        transition:
            transform .2s ease,
            background .2s ease,
            border-color .2s ease,
            box-shadow .2s ease;
    }

    /* Edit */

    .courses-page .edit-btn{
        background:rgba(245,158,11,.08) !important;
        border:1px solid rgba(245,158,11,.20);

        color:#fbbf24 !important;
    }

    .courses-page .edit-btn:hover{
        background:rgba(245,158,11,.15) !important;
        border-color:rgba(245,158,11,.35);

        color:#fcd34d !important;

        transform:translateY(-2px);

        box-shadow:
            0 5px 15px rgba(245,158,11,.10);
    }

    /* Delete */

    .courses-page .delete-btn{
        background:rgba(244,63,94,.07) !important;
        border:1px solid rgba(244,63,94,.18);

        color:#fb7185 !important;
    }

    .courses-page .delete-btn:hover{
        background:rgba(244,63,94,.14) !important;
        border-color:rgba(244,63,94,.35);

        color:#fda4af !important;

        transform:translateY(-2px);

        box-shadow:
            0 5px 15px rgba(244,63,94,.10);
    }
/* =========================================================
   COURSES DELETE MODAL — SAME DARK TEACHERS THEME
========================================================= */

body:has(.courses-page) .delete-modal-overlay{
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

body:has(.courses-page) .delete-modal-overlay.show{
    display:flex !important;
}

body:has(.courses-page) .delete-modal{
    position:relative !important;

    width:100% !important;
    max-width:390px !important;

    background:
        linear-gradient(
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

body:has(.courses-page) .delete-modal::before{
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

body:has(.courses-page) .delete-modal-icon{
    width:58px !important;
    height:58px !important;

    margin:0 auto 18px !important;

    border-radius:50% !important;

    display:flex !important;
    align-items:center;
    justify-content:center;

    background:rgba(244,63,94,.10) !important;

    border:
        1px solid
        rgba(244,63,94,.20) !important;

    color:#fb7185 !important;

    font-size:24px !important;

    box-shadow:
        0 0 22px
        rgba(244,63,94,.08) !important;

    filter:
        drop-shadow(
            0 0 6px
            rgba(244,63,94,.35)
        );
}

body:has(.courses-page) .delete-modal h3{
    color:#f8fafc !important;
    font-size:16px !important;
    font-weight:850 !important;
    margin-bottom:8px !important;
}

body:has(.courses-page) .delete-modal p{
    color:#718096 !important;
    font-size:10px !important;
    line-height:1.6 !important;
    margin-bottom:24px !important;
}

body:has(.courses-page) .delete-modal-actions{
    display:flex;
    justify-content:center;
    gap:8px;
}

/* CANCEL */

body:has(.courses-page) .modal-cancel-btn{
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

body:has(.courses-page) .modal-cancel-btn:hover{
    background:#111c2c !important;
    color:#dbe4f2 !important;
    border-color:#3a4c65 !important;

    transform:translateY(-2px);
}

/* DELETE */

body:has(.courses-page) .modal-delete-btn{
    position:relative;

    overflow:hidden;

    background:
        linear-gradient(
            135deg,
            #be123c,
            #f43f5e
        ) !important;

    color:#fff !important;

    border:
        1px solid
        rgba(251,113,133,.35) !important;

    padding:9px 15px !important;
    border-radius:9px !important;

    font-size:10px !important;
    font-weight:850 !important;

    cursor:pointer;

    box-shadow:
        0 7px 18px
        rgba(244,63,94,.18) !important;

    transition:
        transform .2s ease,
        box-shadow .2s ease,
        border-color .2s ease;
}

body:has(.courses-page) .modal-delete-btn::before{
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

body:has(.courses-page) .modal-delete-btn:hover{
    color:#fff !important;

    transform:translateY(-2px);

    border-color:
        rgba(253,164,175,.65) !important;

    box-shadow:
        0 10px 25px
        rgba(244,63,94,.28) !important;
}

body:has(.courses-page) .modal-delete-btn:hover::before{
    left:140%;
}

/* MOBILE */

@media(max-width:767px){

    body:has(.courses-page) .delete-modal{
        padding:25px 20px !important;
    }

}
    /* ================= EMPTY STATE ================= */

    .courses-page .empty-state{
        padding:55px 20px !important;
        text-align:center;

        color:#64758c !important;
    }

    .courses-page .empty-state-icon{
        width:55px;
        height:55px;

        margin:0 auto 14px;

        border-radius:14px;

        background:rgba(139,92,246,.09);
        border:1px solid rgba(139,92,246,.16);

        color:#a78bfa;

        display:flex;
        align-items:center;
        justify-content:center;

        font-size:22px;

        box-shadow:
            0 0 20px rgba(139,92,246,.08);
    }

    .courses-page .empty-state-icon i{
        filter:
            drop-shadow(0 0 6px rgba(139,92,246,.55));
    }

    .courses-page .empty-state h5{
        color:#dbe4f2 !important;

        font-size:12px;
        font-weight:850;

        margin-bottom:5px;
    }

    .courses-page .empty-state p{
        color:#64758c !important;

        font-size:9px;

        margin:0;
    }

    /* ================= MOBILE ================= */

    @media(max-width:767px){

        .courses-page-header{
            align-items:flex-start;
            gap:12px;
        }

        .courses-title{
            font-size:22px;
        }

        .courses-subtitle{
            font-size:10px;
        }

        .add-course-btn{
            padding:9px 11px;
            white-space:nowrap;
            font-size:9px;
        }

        .courses-page .course-table{
            min-width:800px;
        }

    }

    /* =========================================================
   FULL PAGE DARK BACKGROUND — COURSES
========================================================= */

body:has(.courses-page){
    background:#080e17 !important;
}

body:has(.courses-page) .main-wrapper{
    background:#080e17 !important;
}

body:has(.courses-page) .page-content{
    background:#080e17 !important;

    /* balanced spacing */
    padding:18px 20px 0 20px !important;

    margin:0 !important;
    min-height:calc(100vh - 76px) !important;
}

/* Full courses area */
.courses-page{
    width:100% !important;
    min-height:calc(100vh - 94px) !important;

    margin:0 !important;
    padding:0 !important;

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
        #080e17 !important;
}

/* Prevent Bootstrap/light backgrounds */
.courses-page .container,
.courses-page .row,
.courses-page .col,
.courses-page .table-responsive{
    background:transparent !important;
}

/* Course card */
.courses-page .course-table-card{
    background:
        linear-gradient(
            145deg,
            #111b2a,
            #0d1521
        ) !important;

    border-color:#223149 !important;
}

/* Mobile */
@media(max-width:767px){

    body:has(.courses-page) .page-content{
        padding:18px 15px 0 15px !important;
    }

}

</style>


<div class="courses-page">

    {{-- ================= PAGE HEADER ================= --}}

    <div class="courses-page-header">

        <div>

            <div class="courses-kicker">
                Academy Management
            </div>

            <h1 class="courses-title">
                Courses
            </h1>

            <p class="courses-subtitle">
                Manage academy courses, duration, fees and availability.
            </p>

        </div>


        <a
            href="{{ route('courses.create') }}"
            class="add-course-btn"
        >
            <i class="bi bi-plus-lg"></i>
            Add New Course
        </a>

    </div>


    {{-- ================= COURSE TABLE ================= --}}

    <div class="course-table-card">

        <div class="course-table-wrapper">

            <table class="table course-table align-middle">

                <thead>

                    <tr>

                        <th>ID</th>
                        <th>Course Code</th>
                        <th>Course Name</th>
                        <th>Duration</th>
                        <th>Fee</th>
                        <th>Status</th>
                        <th>Action</th>

                    </tr>

                </thead>


                <tbody>

                    @forelse ($courses as $course)

                        <tr>

                            {{-- ID --}}

                            <td>

                                <span class="course-id">
                                    #{{ $course->id }}
                                </span>

                            </td>


                            {{-- Course Code --}}

                            <td>

                                <span class="course-code">
                                    {{ $course->course_code }}
                                </span>

                            </td>


                            {{-- Course Name --}}

                            <td>

                                <span class="course-name">
                                    {{ $course->name }}
                                </span>

                            </td>


                            {{-- Duration --}}

                            <td>

                                <span class="course-duration">
                                    {{ $course->duration ?? '-' }}
                                </span>

                            </td>


                            {{-- Fee --}}

                            <td>

                                <span class="course-fee">
                                    {{ number_format($course->fee, 2) }}
                                </span>

                            </td>


                            {{-- Status --}}

                            <td>

                                @if ($course->status === 'active')

                                    <span class="status-badge status-active">

                                        <span class="status-dot"></span>

                                        Active

                                    </span>

                                @else

                                    <span class="status-badge status-inactive">

                                        <span class="status-dot"></span>

                                        Inactive

                                    </span>

                                @endif

                            </td>


                            {{-- Actions --}}

                            <td>

                                <div class="action-buttons">

                                    <a
                                        href="{{ route('courses.edit', $course->id) }}"
                                        class="edit-btn"
                                    >
                                        <i class="bi bi-pencil-square me-1"></i>
                                        Edit
                                    </a>


                                    <form
                                        action="{{ route('courses.destroy', $course) }}"
                                        method="POST"
                                        class="d-inline delete-form"
                                    >

                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="button"
                                            class="action-btn delete-btn delete-trigger"
                                        >
                                            <i class="bi bi-trash3-fill me-1"></i>
                                            Delete
                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td
                                colspan="7"
                                class="empty-state"
                            >

                                <div class="empty-state-icon">
                                    <i class="bi bi-book"></i>
                                </div>

                                <h5>
                                    No Courses Found
                                </h5>

                                <p>
                                    Add a new course to start managing academy courses.
                                </p>

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>


@include('components.delete-modal')

@endsection