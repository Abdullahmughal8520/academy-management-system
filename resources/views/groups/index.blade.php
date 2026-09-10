@extends('layouts.app')

@section('title', 'Groups')

@section('content')

<style>
    /* =========================================================
       GROUPS PAGE — DARK ADMIN THEME
       ========================================================= */

    body:has(.groups-page){
        background:#080e17 !important;
    }

    body:has(.groups-page) .main-wrapper{
        background:#080e17 !important;
    }

    body:has(.groups-page) .page-content{
        background:#080e17 !important;
        padding:18px 20px 0 20px !important;
        margin:0 !important;
        min-height:calc(100vh - 76px) !important;
    }

    .groups-page{
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

    .groups-page *,
    .groups-page *::before,
    .groups-page *::after{
        box-sizing:border-box;
    }


    /* =========================================================
       HEADER
       ========================================================= */

    .groups-header{
        display:flex;
        align-items:center;
        justify-content:space-between;

        gap:18px;

        margin-bottom:20px;
    }

    .groups-kicker{
        font-size:10px;
        letter-spacing:1.7px;
        text-transform:uppercase;

        color:#a78bfa;

        font-weight:900;

        margin-bottom:4px;
    }

    .groups-title{
        font-size:27px;
        line-height:1.15;

        font-weight:850;

        color:#f8fafc;

        margin:0 0 5px;
    }

    .groups-subtitle{
        font-size:12px;

        color:#728197;

        margin:0;
    }


    /* =========================================================
       ADD GROUP BUTTON
       ========================================================= */

    .add-group-btn{
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
            0 8px 24px rgba(124,58,237,.20);

        transition:
            transform .25s ease,
            box-shadow .25s ease,
            border-color .25s ease;
    }

    .add-group-btn::before{
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

    .add-group-btn:hover{
        color:#fff !important;

        transform:translateY(-3px);

        border-color:rgba(196,181,253,.75) !important;

        box-shadow:
            0 12px 30px rgba(124,58,237,.32),
            0 0 20px rgba(139,92,246,.12);
    }

    .add-group-btn:hover::before{
        left:140%;
    }

    .add-group-btn i{
        transition:transform .25s ease;
    }

    .add-group-btn:hover i{
        transform:rotate(90deg) scale(1.08);
    }


    /* =========================================================
       SUCCESS ALERT
       ========================================================= */

    .groups-page .alert-success{
        background:rgba(34,197,94,.08) !important;

        border:1px solid rgba(34,197,94,.18) !important;

        color:#86efac !important;

        border-radius:11px !important;

        padding:11px 14px !important;

        font-size:10px;

        box-shadow:none !important;
    }


    /* =========================================================
       TABLE CARD
       ========================================================= */

    .group-table-card{
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

    .group-table-wrapper{
        width:100%;
        overflow-x:auto;
    }


    /* =========================================================
       TABLE
       ========================================================= */

    .group-table{
        width:100%;
        min-width:850px;

        margin:0 !important;

        --bs-table-bg:transparent !important;
        --bs-table-color:#cbd5e1 !important;
        --bs-table-border-color:#1a2637 !important;
        --bs-table-hover-bg:rgba(139,92,246,.035) !important;
        --bs-table-hover-color:#dbe4f2 !important;

        background:transparent !important;
        color:#cbd5e1 !important;

        border-collapse:collapse;
    }

    .group-table > :not(caption) > * > *{
        background-color:transparent !important;

        color:#cbd5e1 !important;

        border-bottom-color:#1a2637 !important;

        box-shadow:none !important;
    }


    /* =========================================================
       TABLE HEADER
       ========================================================= */

    .group-table thead th{
        background:#0d1725 !important;

        color:#607089 !important;

        border-bottom:1px solid #1e2b3e !important;

        border-top:none !important;

        padding:11px 13px !important;

        font-size:8px !important;

        font-weight:900 !important;

        text-transform:uppercase;

        letter-spacing:.7px;

        white-space:nowrap;
    }


    /* =========================================================
       TABLE BODY
       ========================================================= */

    .group-table tbody td{
        background:transparent !important;

        padding:12px 13px !important;

        border-bottom:1px solid #1a2637 !important;

        color:#cbd5e1 !important;

        font-size:10px !important;

        vertical-align:middle;
    }

    .group-table tbody tr{
        transition:background .2s ease;
    }

    .group-table tbody tr:hover{
        background:rgba(139,92,246,.035) !important;
    }

    .group-table tbody tr:last-child td{
        border-bottom:0 !important;
    }


    /* =========================================================
       ID
       ========================================================= */

    .group-id{
        color:#64758c !important;

        font-size:9px;

        font-weight:800;
    }


    /* =========================================================
       CLASS BADGE
       ========================================================= */

    .class-badge{
        display:inline-flex;

        align-items:center;

        gap:5px;

        padding:5px 8px;

        border-radius:7px;

        background:rgba(139,92,246,.09) !important;

        border:1px solid rgba(139,92,246,.15);

        color:#a78bfa !important;

        font-size:8px;

        font-weight:900;

        white-space:nowrap;
    }

    .class-badge i{
        font-size:9px;

        filter:
            drop-shadow(
                0 0 5px rgba(34,211,238,.45)
            );
    }


    /* =========================================================
       GROUP NAME
       ========================================================= */

    .group-name{
        color:#dbe4f2 !important;

        font-size:10px;

        font-weight:850;
    }


    /* =========================================================
       DESCRIPTION
       ========================================================= */

    .group-description{
        color:#718096 !important;

        max-width:320px;

        font-size:9px;

        line-height:1.5;
    }


    /* =========================================================
       STATUS
       ========================================================= */

    .status-badge{
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
        background:rgba(34,197,94,.09) !important;

        border:1px solid rgba(34,197,94,.15);

        color:#86efac !important;
    }

    .status-inactive{
        background:rgba(100,116,139,.10) !important;

        border:1px solid rgba(100,116,139,.15);

        color:#94a3b8 !important;
    }

    .status-active i{
        filter:
            drop-shadow(
                0 0 5px rgba(34,197,94,.55)
            );
    }


    /* =========================================================
       ACTION BUTTONS
       ========================================================= */

    .action-btn{
        display:inline-flex;

        align-items:center;

        justify-content:center;

        padding:7px 10px;

        border-radius:8px;

        font-size:9px;

        font-weight:850;

        text-decoration:none;

        transition:
            transform .2s ease,
            background .2s ease,
            border-color .2s ease,
            box-shadow .2s ease;
    }

    .edit-btn{
        background:rgba(139,92,246,.08) !important;

        color:#a78bfa !important;

        border:1px solid rgba(139,92,246,.18) !important;
    }

    .edit-btn:hover{
        background:rgba(139,92,246,.14) !important;

        color:#c4b5fd !important;

        border-color:rgba(139,92,246,.35) !important;

        transform:translateY(-2px);

        box-shadow:
            0 6px 15px rgba(139,92,246,.10);
    }

    .delete-btn{
        background:rgba(244,63,94,.07) !important;

        color:#fb7185 !important;

        border:1px solid rgba(244,63,94,.16) !important;
    }

    .delete-btn:hover{
        background:rgba(244,63,94,.13) !important;

        color:#fda4af !important;

        border-color:rgba(244,63,94,.30) !important;

        transform:translateY(-2px);

        box-shadow:
            0 6px 15px rgba(244,63,94,.10);
    }


    /* =========================================================
       EMPTY STATE
       ========================================================= */

    .empty-state{
        padding:55px 20px !important;

        text-align:center;

        background:transparent !important;
    }

    .empty-icon{
        width:52px;
        height:52px;

        margin:0 auto 14px;

        border-radius:13px;

        display:flex;

        align-items:center;
        justify-content:center;

        background:rgba(139,92,246,.09);

        border:1px solid rgba(139,92,246,.15);

        color:#a78bfa;

        font-size:21px;

        box-shadow:
            0 0 18px rgba(139,92,246,.06);
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

        margin:0;
    }


    /* =========================================================
       DELETE MODAL — SAME DARK THEME
       ========================================================= */

    body:has(.groups-page) .delete-modal-overlay{
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

    body:has(.groups-page) .delete-modal-overlay.show{
        display:flex !important;
    }


    /* MODAL */

    body:has(.groups-page) .delete-modal{
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

    body:has(.groups-page) .delete-modal::before{
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

    body:has(.groups-page) .delete-modal-icon{
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


    /* MODAL TITLE */

    body:has(.groups-page) .delete-modal h3{
        color:#f8fafc !important;

        font-size:16px !important;

        font-weight:850 !important;

        margin-bottom:8px !important;
    }


    /* MODAL TEXT */

    body:has(.groups-page) .delete-modal p{
        color:#718096 !important;

        font-size:10px !important;

        line-height:1.6 !important;

        margin-bottom:24px !important;
    }


    /* MODAL BUTTONS */

    body:has(.groups-page) .delete-modal-actions{
        display:flex;

        justify-content:center;

        gap:8px;
    }


    /* CANCEL */

    body:has(.groups-page) .modal-cancel-btn{
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

    body:has(.groups-page) .modal-cancel-btn:hover{
        background:#111c2c !important;

        color:#dbe4f2 !important;

        border-color:#3a4c65 !important;

        transform:translateY(-2px);
    }


    /* DELETE */

    body:has(.groups-page) .modal-delete-btn{
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

    body:has(.groups-page) .modal-delete-btn::before{
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

    body:has(.groups-page) .modal-delete-btn:hover{
        color:#fff !important;

        transform:translateY(-2px);

        border-color:rgba(253,164,175,.65) !important;

        box-shadow:
            0 10px 25px rgba(244,63,94,.28) !important;
    }

    body:has(.groups-page) .modal-delete-btn:hover::before{
        left:140%;
    }


    /* =========================================================
       MOBILE
       ========================================================= */

    @media(max-width:767px){

        body:has(.groups-page) .page-content{
            padding:15px 15px 0 15px !important;
        }

        .groups-page{
            min-height:calc(100vh - 80px);
        }

        .groups-header{
            align-items:flex-start;

            gap:12px;
        }

        .groups-kicker{
            font-size:8px;
        }

        .groups-title{
            font-size:22px;
        }

        .groups-subtitle{
            font-size:10px;
        }

        .add-group-btn{
            padding:9px 12px;

            white-space:nowrap;
        }

        .group-table-card{
            border-radius:12px;
        }

        .group-table{
            min-width:850px;
        }

        body:has(.groups-page) .delete-modal{
            padding:25px 20px !important;
        }
    }
</style>


<div class="groups-page">

    {{-- PAGE HEADER --}}
    <div class="groups-header">

        <div>

            <div class="groups-kicker">
                Academy Management
            </div>

            <h1 class="groups-title">
                Groups
            </h1>

            <p class="groups-subtitle">
                Manage groups within your academy classes.
            </p>

        </div>


        <a
            href="{{ route('groups.create') }}"
            class="add-group-btn"
        >
            <i class="bi bi-plus-lg"></i>
            Add Group
        </a>

    </div>


    {{-- SUCCESS MESSAGE --}}
    @if (session('success'))

        <div class="alert alert-success border-0 mb-4">

            <i class="bi bi-check-circle-fill me-1"></i>

            {{ session('success') }}

        </div>

    @endif


    {{-- TABLE --}}
    <div class="group-table-card">

        <div class="group-table-wrapper">

            <table class="table group-table align-middle">

                <thead>

                    <tr>
                        <th>ID</th>
                        <th>Class</th>
                        <th>Group Name</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>

                </thead>


                <tbody>

                    @forelse ($groups as $group)

                        <tr>

                            {{-- ID --}}
                            <td>

                                <span class="group-id">
                                    #{{ $group->id }}
                                </span>

                            </td>


                            {{-- CLASS --}}
                            <td>

                                <span class="class-badge">

                                    <i class="bi bi-mortarboard-fill"></i>

                                    {{ $group->academyClass->name }}

                                </span>

                            </td>


                            {{-- GROUP NAME --}}
                            <td>

                                <span class="group-name">
                                    {{ $group->name }}
                                </span>

                            </td>


                            {{-- DESCRIPTION --}}
                            <td>

                                <div class="group-description">
                                    {{ $group->description ?? '-' }}
                                </div>

                            </td>


                            {{-- STATUS --}}
                            <td>

                                @if ($group->status === 'active')

                                    <span class="status-badge status-active">

                                        <i class="bi bi-check-circle-fill"></i>

                                        Active

                                    </span>

                                @else

                                    <span class="status-badge status-inactive">

                                        <i class="bi bi-pause-circle-fill"></i>

                                        Inactive

                                    </span>

                                @endif

                            </td>


                            {{-- ACTIONS --}}
                            <td>

                                <div class="d-flex gap-2">

                                    <a
                                        href="{{ route('groups.edit', $group) }}"
                                        class="action-btn edit-btn"
                                    >
                                        <i class="bi bi-pencil-square me-1"></i>
                                        Edit
                                    </a>


                                    <form
                                        action="{{ route('groups.destroy', $group) }}"
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
                                colspan="6"
                                class="empty-state"
                            >

                                <div class="empty-icon">
                                    <i class="bi bi-people"></i>
                                </div>

                                <div class="empty-title">
                                    No groups found
                                </div>

                                <p class="empty-text">
                                    Add your first group to get started.
                                </p>

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