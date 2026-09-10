@extends('layouts.app')

@section('title', 'Subjects')

@section('content')

<style>
    /* =========================================================
       SUBJECTS PAGE — DARK ADMIN THEME
       ========================================================= */

    body:has(.subjects-page){
        background:#080e17 !important;
    }

    body:has(.subjects-page) .main-wrapper{
        background:#080e17 !important;
    }

    body:has(.subjects-page) .page-content{
        background:#080e17 !important;
        padding:18px 20px 0 20px !important;
        margin:0 !important;
        min-height:calc(100vh - 76px) !important;
    }

    .subjects-page{
        --s-bg:#080e17;
        --s-panel:#0f1826;
        --s-panel2:#111c2c;
        --s-border:#223149;
        --s-border-soft:#1a2637;
        --s-text:#edf3fb;
        --s-muted:#718096;
        --s-purple:#8b5cf6;
        --s-purple-light:#a78bfa;
        --s-cyan:#22d3ee;
        --s-green:#22c55e;
        --s-red:#f43f5e;
        --s-orange:#f59e0b;

        width:100%;
        min-height:calc(100vh - 94px);

        margin:0 !important;
        padding:0 !important;

        color:var(--s-text);

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

    .subjects-page *,
    .subjects-page *::before,
    .subjects-page *::after{
        box-sizing:border-box;
    }


    /* =========================================================
       HEADER
       ========================================================= */

    .subjects-header{
        display:flex;
        align-items:center;
        justify-content:space-between;

        gap:18px;

        margin-bottom:20px;
    }

    .subjects-kicker{
        font-size:10px;
        letter-spacing:1.7px;
        text-transform:uppercase;

        color:#a78bfa;

        font-weight:900;

        margin-bottom:4px;
    }

    .subjects-title{
        font-size:27px;
        line-height:1.15;

        font-weight:850;

        color:#f8fafc;

        margin:0 0 5px;
    }

    .subjects-subtitle{
        font-size:12px;

        color:#728197;

        margin:0;
    }


    /* =========================================================
       ADD SUBJECT BUTTON
       ========================================================= */

    .add-subject-btn{
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

    .add-subject-btn::before{
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

    .add-subject-btn:hover{
        color:#fff !important;

        transform:translateY(-3px);

        border-color:rgba(196,181,253,.75) !important;

        box-shadow:
            0 12px 30px rgba(124,58,237,.32),
            0 0 20px rgba(139,92,246,.12);
    }

    .add-subject-btn:hover::before{
        left:140%;
    }

    .add-subject-btn i{
        transition:transform .25s ease;
    }

    .add-subject-btn:hover i{
        transform:rotate(90deg) scale(1.08);
    }


    /* =========================================================
       SUCCESS ALERT
       ========================================================= */

    .subjects-page .alert-success{
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

    .subject-table-card{
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

    .subject-table-wrapper{
        width:100%;

        overflow-x:auto;
    }


    /* =========================================================
       TABLE
       ========================================================= */

    .subject-table{
        width:100%;

        min-width:900px;

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

    .subject-table > :not(caption) > * > *{
        background-color:transparent !important;

        color:#cbd5e1 !important;

        border-bottom-color:#1a2637 !important;

        box-shadow:none !important;
    }


    /* =========================================================
       TABLE HEADER
       ========================================================= */

    .subject-table thead th{
        background:#0d1725 !important;

        color:#607089 !important;

        border-bottom:1px solid #1e2b3e !important;

        border-top:none !important;

        padding:11px 12px !important;

        font-size:8px !important;

        font-weight:900 !important;

        text-transform:uppercase;

        letter-spacing:.7px;

        white-space:nowrap;
    }


    /* =========================================================
       TABLE BODY
       ========================================================= */

    .subject-table tbody td{
        background:transparent !important;

        padding:12px 12px !important;

        border-bottom:1px solid #1a2637 !important;

        color:#cbd5e1 !important;

        font-size:10px !important;

        vertical-align:middle;
    }

    .subject-table tbody tr{
        transition:background .2s ease;
    }

    .subject-table tbody tr:hover{
        background:rgba(139,92,246,.035) !important;
    }

    .subject-table tbody tr:last-child td{
        border-bottom:0 !important;
    }


    /* =========================================================
       ID
       ========================================================= */

    .subject-id{
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
       GROUP BADGE
       ========================================================= */

    .group-badge{
        display:inline-flex;

        align-items:center;

        gap:5px;

        padding:5px 8px;

        border-radius:7px;

        background:rgba(34,197,94,.08) !important;

        border:1px solid rgba(34,197,94,.15);

        color:#86efac !important;

        font-size:8px;

        font-weight:900;

        white-space:nowrap;
    }

    .group-badge i{
        font-size:9px;

        filter:
            drop-shadow(
                0 0 5px rgba(34,197,94,.45)
            );
    }


    /* =========================================================
       SUBJECT NAME
       ========================================================= */

    .subject-name{
        color:#dbe4f2 !important;

        font-size:10px;

        font-weight:850;
    }


    /* =========================================================
       SUBJECT CODE
       ========================================================= */

    .subject-code{
        display:inline-block;

        background:#111d2d !important;

        border:1px solid #26364d;

        color:#94a3b8 !important;

        padding:5px 8px;

        border-radius:6px;

        font-size:8px;

        font-weight:850;

        letter-spacing:.4px;

        white-space:nowrap;
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

    body:has(.subjects-page) .delete-modal-overlay{
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

    body:has(.subjects-page) .delete-modal-overlay.show{
        display:flex !important;
    }


    body:has(.subjects-page) .delete-modal{
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

        animation:subjectDeleteModalIn .2s ease;
    }

    body:has(.subjects-page) .delete-modal::before{
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

    @keyframes subjectDeleteModalIn{

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

    body:has(.subjects-page) .delete-modal-icon{
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


    /* =========================================================
       MODAL TITLE
       ========================================================= */

    body:has(.subjects-page) .delete-modal h3{
        color:#f8fafc !important;

        font-size:16px !important;

        font-weight:850 !important;

        margin-bottom:8px !important;
    }


    /* =========================================================
       MODAL TEXT
       ========================================================= */

    body:has(.subjects-page) .delete-modal p{
        color:#718096 !important;

        font-size:10px !important;

        line-height:1.6 !important;

        margin-bottom:24px !important;
    }


    /* =========================================================
       MODAL ACTIONS
       ========================================================= */

    body:has(.subjects-page) .delete-modal-actions{
        display:flex;

        justify-content:center;

        gap:8px;
    }


    /* =========================================================
       MODAL CANCEL
       ========================================================= */

    body:has(.subjects-page) .modal-cancel-btn{
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

    body:has(.subjects-page) .modal-cancel-btn:hover{
        background:#111c2c !important;

        color:#dbe4f2 !important;

        border-color:#3a4c65 !important;

        transform:translateY(-2px);
    }


    /* =========================================================
       MODAL DELETE
       ========================================================= */

    body:has(.subjects-page) .modal-delete-btn{
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

    body:has(.subjects-page) .modal-delete-btn::before{
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

    body:has(.subjects-page) .modal-delete-btn:hover{
        color:#fff !important;

        transform:translateY(-2px);

        border-color:rgba(253,164,175,.65) !important;

        box-shadow:
            0 10px 25px rgba(244,63,94,.28) !important;
    }

    body:has(.subjects-page) .modal-delete-btn:hover::before{
        left:140%;
    }


    /* =========================================================
       MOBILE
       ========================================================= */

    @media(max-width:767px){

        body:has(.subjects-page) .page-content{
            padding:15px 15px 0 15px !important;
        }

        .subjects-page{
            min-height:calc(100vh - 80px);
        }

        .subjects-header{
            align-items:flex-start;

            gap:12px;
        }

        .subjects-kicker{
            font-size:8px;
        }

        .subjects-title{
            font-size:22px;
        }

        .subjects-subtitle{
            font-size:10px;
        }

        .add-subject-btn{
            padding:9px 12px;

            white-space:nowrap;
        }

        .subject-table-card{
            border-radius:12px;
        }

        .subject-table{
            min-width:900px;
        }

        body:has(.subjects-page) .delete-modal{
            padding:25px 20px !important;
        }
    }
</style>


<div class="subjects-page">

    {{-- PAGE HEADER --}}

    <div class="subjects-header">

        <div>

            <div class="subjects-kicker">
                Academy Management
            </div>

            <h1 class="subjects-title">
                Subjects
            </h1>

            <p class="subjects-subtitle">
                Manage subjects assigned to academy classes and groups.
            </p>

        </div>


        <a
            href="{{ route('subjects.create') }}"
            class="add-subject-btn"
        >
            <i class="bi bi-plus-lg"></i>
            Add Subject
        </a>

    </div>


    {{-- SUCCESS MESSAGE --}}

    @if (session('success'))

        <div class="alert alert-success border-0 mb-4">

            <i class="bi bi-check-circle-fill me-1"></i>

            {{ session('success') }}

        </div>

    @endif


    {{-- SUBJECTS TABLE --}}

    <div class="subject-table-card">

        <div class="subject-table-wrapper">

            <table class="table subject-table align-middle">

                <thead>

                    <tr>

                        <th>ID</th>

                        <th>Class</th>

                        <th>Group</th>

                        <th>Subject</th>

                        <th>Code</th>

                        <th>Status</th>

                        <th>Action</th>

                    </tr>

                </thead>


                <tbody>

                    @forelse ($subjects as $subject)

                        <tr>

                            {{-- ID --}}

                            <td>

                                <span class="subject-id">
                                    #{{ $subject->id }}
                                </span>

                            </td>


                            {{-- CLASS --}}

                            <td>

                                <span class="class-badge">

                                    <i class="bi bi-mortarboard-fill"></i>

                                    {{ $subject->academyClass->name }}

                                </span>

                            </td>


                            {{-- GROUP --}}

                            <td>

                                <span class="group-badge">

                                    <i class="bi bi-people-fill"></i>

                                    {{ $subject->group->name }}

                                </span>

                            </td>


                            {{-- SUBJECT --}}

                            <td>

                                <span class="subject-name">
                                    {{ $subject->name }}
                                </span>

                            </td>


                            {{-- CODE --}}

                            <td>

                                <span class="subject-code">
                                    {{ $subject->code ?? '-' }}
                                </span>

                            </td>


                            {{-- STATUS --}}

                            <td>

                                @if ($subject->status === 'active')

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

                                    {{-- EDIT --}}

                                    <a
                                        href="{{ route('subjects.edit', $subject) }}"
                                        class="action-btn edit-btn"
                                    >
                                        <i class="bi bi-pencil-square me-1"></i>
                                        Edit
                                    </a>


                                    {{-- DELETE --}}

                                    <form
                                        action="{{ route('subjects.destroy', $subject) }}"
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

                                <div class="empty-icon">

                                    <i class="bi bi-book"></i>

                                </div>

                                <div class="empty-title">
                                    No subjects found
                                </div>

                                <p class="empty-text">
                                    Add your first subject to get started.
                                </p>

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>


    {{-- DELETE CONFIRMATION MODAL --}}

    <div
        class="delete-modal-overlay"
        id="deleteModal"
    >

        <div class="delete-modal">

            <div class="delete-modal-icon">

                <i class="bi bi-trash3-fill"></i>

            </div>


            <h3>
                Delete Subject?
            </h3>


            <p>
                Are you sure you want to delete this subject?
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
                    <i class="bi bi-trash3 me-1"></i>
                    Yes, Delete
                </button>

            </div>

        </div>

    </div>

</div>


<script>

document.addEventListener('DOMContentLoaded', function () {

    const modal = document.getElementById('deleteModal');

    const cancelButton = document.getElementById('cancelDelete');

    const confirmButton = document.getElementById('confirmDelete');

    let deleteForm = null;


    /* =========================================================
       OPEN DELETE MODAL
       ========================================================= */

    document.addEventListener('click', function (event) {

        const deleteButton =
            event.target.closest('.delete-trigger');

        if (!deleteButton) {
            return;
        }

        const form =
            deleteButton.closest('.delete-form');

        if (!form) {
            return;
        }

        deleteForm = form;

        modal.classList.add('show');

    });


    /* =========================================================
       CANCEL DELETE
       ========================================================= */

    cancelButton.addEventListener('click', function () {

        modal.classList.remove('show');

        deleteForm = null;

    });


    /* =========================================================
       CONFIRM DELETE
       ========================================================= */

    confirmButton.addEventListener('click', function () {

        if (deleteForm) {

            deleteForm.submit();

        }

    });


    /* =========================================================
       CLOSE OUTSIDE MODAL
       ========================================================= */

    modal.addEventListener('click', function (event) {

        if (event.target === modal) {

            modal.classList.remove('show');

            deleteForm = null;

        }

    });


    /* =========================================================
       ESCAPE KEY
       ========================================================= */

    document.addEventListener('keydown', function (event) {

        if (event.key === 'Escape') {

            modal.classList.remove('show');

            deleteForm = null;

        }

    });

});

</script>

@endsection