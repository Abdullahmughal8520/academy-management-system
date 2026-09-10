@extends('layouts.app')

@section('title', 'Fee Structures')

@section('content')

<style>

/* =========================================================
   FEE STRUCTURES PAGE — EXAMS DARK THEME
   ========================================================= */

body:has(.fee-structures-page) {
    background: #080e17 !important;
}

body:has(.fee-structures-page) .main-wrapper {
    background: #080e17 !important;
}

body:has(.fee-structures-page) .page-content {
    background: #080e17 !important;
    padding: 18px 20px 0 20px !important;
    margin: 0 !important;
    min-height: calc(100vh - 76px) !important;
}

.fee-structures-page {
    width: 100%;
    min-height: calc(100vh - 94px);
    margin: 0 !important;
    padding: 0 !important;
    color: #edf3fb;
    box-sizing: border-box;
}

.fee-structures-page *,
.delete-modal-overlay *,
.delete-modal-overlay *::before,
.delete-modal-overlay *::after {
    box-sizing: border-box;
}


/* =========================================================
   HEADER
   ========================================================= */

.fs-header {
    display: flex;
    align-items: flex-end;
    justify-content: space-between;
    gap: 20px;
    margin-bottom: 22px;
}

.fs-kicker {
    color: #8b5cf6;
    font-size: 12px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 1.4px;
    margin-bottom: 5px;
}

.fs-title {
    margin: 0;
    color: #f5f7fb;
    font-size: 30px;
    font-weight: 800;
    line-height: 1.2;
}

.fs-subtitle {
    margin: 7px 0 0;
    color: #718096;
    font-size: 14px;
    line-height: 1.5;
}


/* =========================================================
   PRIMARY BUTTON
   ========================================================= */

.fs-btn-primary {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 8px;

    border: 0;
    border-radius: 10px;

    padding: 11px 17px;

    color: #fff;
    background: linear-gradient(
        135deg,
        #6848e8,
        #8b5cf6
    );

    text-decoration: none;

    font-size: 13px;
    font-weight: 700;

    box-shadow:
        0 8px 20px rgba(104,72,232,.22);

    transition:
        transform .2s ease,
        box-shadow .2s ease;
}

.fs-btn-primary:hover {
    color: #fff;
    transform: translateY(-2px);

    box-shadow:
        0 12px 25px rgba(104,72,232,.30);
}


/* =========================================================
   ALERTS
   ========================================================= */

.fs-alert {
    display: flex;
    align-items: center;

    border-radius: 11px;

    padding: 13px 16px;

    margin-bottom: 18px;

    border: 1px solid;

    font-size: 13px;
}

.fs-alert-success {
    background: rgba(34,197,94,.08);
    border-color: rgba(34,197,94,.25);
    color: #86efac;
}

.fs-alert-error {
    background: rgba(239,68,68,.08);
    border-color: rgba(239,68,68,.25);
    color: #fca5a5;
}


/* =========================================================
   MAIN CARD
   ========================================================= */

.fs-card {
    width: 100%;

    background: linear-gradient(
        135deg,
        #111b2a,
        #0d1521
    );

    border: 1px solid #223149;

    border-radius: 15px;

    box-shadow:
        0 12px 30px rgba(0,0,0,.18);

    overflow: hidden;
}


/* =========================================================
   TABLE WRAPPER
   ========================================================= */

.fs-table-wrapper {
    width: 100%;
    overflow-x: auto;
    scrollbar-width: thin;
    scrollbar-color: #293950 #0d1521;
}


/* =========================================================
   TABLE
   ========================================================= */

.fs-table {
    width: 100%;
    min-width: 1050px;

    border-collapse: collapse;
    border-spacing: 0;
}

.fs-table thead {
    background: #0d1725;
}

.fs-table th {
    padding: 15px 16px;

    border-bottom: 1px solid #223149;

    color: #8291a8;

    font-size: 11px;
    font-weight: 700;

    text-transform: uppercase;
    letter-spacing: .7px;

    white-space: nowrap;
}

.fs-table td {
    padding: 15px 16px;

    border-bottom: 1px solid #1b293b;

    color: #dbe4f2;

    font-size: 13px;

    vertical-align: middle;
}

.fs-table tbody tr {
    transition: background .18s ease;
}

.fs-table tbody tr:hover {
    background: rgba(139,92,246,.055);
}

.fs-table tbody tr:last-child td {
    border-bottom: 0;
}


/* =========================================================
   CLASS / GROUP
   ========================================================= */

.fs-class-name {
    color: #f1f5f9;

    font-size: 13px;
    font-weight: 700;

    white-space: nowrap;
}

.fs-group {
    margin-top: 4px;

    color: #718096;

    font-size: 11px;

    white-space: nowrap;
}


/* =========================================================
   AMOUNTS
   ========================================================= */

.fs-amount {
    color: #f1f5f9;
    font-weight: 700;
    white-space: nowrap;
}

.fs-muted {
    color: #718096;
}


/* =========================================================
   STATUS BADGES
   ========================================================= */

.fs-status {
    display: inline-flex;

    align-items: center;
    justify-content: center;

    gap: 6px;

    padding: 6px 10px;

    border-radius: 999px;

    font-size: 10px;
    font-weight: 700;

    white-space: nowrap;
}

.fs-status-active {
    color: #86efac;

    background: rgba(34,197,94,.10);

    border: 1px solid rgba(34,197,94,.18);
}

.fs-status-inactive {
    color: #fca5a5;

    background: rgba(239,68,68,.10);

    border: 1px solid rgba(239,68,68,.18);
}


/* =========================================================
   ACTIONS
   ========================================================= */

.fs-actions {
    display: flex;

    align-items: center;

    gap: 7px;
}

.fs-action {
    width: 34px;
    height: 34px;

    display: inline-flex;

    align-items: center;
    justify-content: center;

    border-radius: 9px;

    text-decoration: none;

    border: 1px solid #2a3a51;

    background: #101b2a;

    transition:
        transform .18s ease,
        background .18s ease,
        border-color .18s ease;
}


/* EDIT */

.fs-action-edit {
    color: #a78bfa;
}

.fs-action-edit:hover {
    color: #c4b5fd;

    border-color: #6d52d9;

    background: rgba(139,92,246,.10);

    transform: translateY(-2px);
}


/* DELETE */

.fs-action-delete {
    color: #f87171;

    cursor: pointer;
}

.fs-action-delete:hover {
    color: #fca5a5;

    border-color: #a33c3c;

    background: rgba(239,68,68,.08);

    transform: translateY(-2px);
}


/* =========================================================
   EMPTY STATE
   ========================================================= */

.fs-empty {
    padding: 65px 20px;

    text-align: center;
}

.fs-empty-icon {
    width: 64px;
    height: 64px;

    margin: 0 auto 15px;

    display: flex;

    align-items: center;
    justify-content: center;

    border-radius: 16px;

    background: rgba(139,92,246,.10);

    border: 1px solid rgba(139,92,246,.18);

    color: #a78bfa;

    font-size: 27px;
}

.fs-empty h4 {
    margin: 0 0 7px;

    color: #f1f5f9;

    font-size: 18px;
}

.fs-empty p {
    margin: 0 0 18px;

    color: #718096;

    font-size: 13px;
}


/* =========================================================
   GLOBAL DELETE MODAL — DARK ADMIN THEME
   ========================================================= */

.delete-modal-overlay {
    position: fixed !important;

    inset: 0 !important;

    background: rgba(4,8,15,.78) !important;

    backdrop-filter: blur(6px) !important;

    -webkit-backdrop-filter: blur(6px) !important;

    display: none;

    align-items: center;
    justify-content: center;

    z-index: 99999 !important;

    padding: 20px;
}

.delete-modal-overlay.show {
    display: flex !important;
}


/* =========================================================
   DELETE MODAL
   ========================================================= */

.delete-modal {
    position: relative !important;

    width: 100% !important;
    max-width: 390px !important;

    background: linear-gradient(
        145deg,
        #111b2a,
        #0d1521
    ) !important;

    border: 1px solid #223149 !important;

    border-radius: 15px !important;

    padding: 30px !important;

    text-align: center;

    box-shadow:
        0 25px 60px rgba(0,0,0,.45),
        0 0 35px rgba(139,92,246,.07) !important;

    animation: deleteModalIn .2s ease;

    overflow: hidden;

    color: #edf3fb !important;
}


/* =========================================================
   TOP GLOW LINE
   ========================================================= */

.delete-modal::before {
    content: "";

    position: absolute;

    top: 0;
    left: 0;

    width: 100%;
    height: 1px;

    background: linear-gradient(
        90deg,
        transparent,
        rgba(244,63,94,.65),
        rgba(139,92,246,.45),
        transparent
    );
}


/* =========================================================
   ANIMATION
   ========================================================= */

@keyframes deleteModalIn {

    from {
        opacity: 0;

        transform:
            translateY(10px)
            scale(.97);
    }

    to {
        opacity: 1;

        transform:
            translateY(0)
            scale(1);
    }

}


/* =========================================================
   DELETE ICON
   ========================================================= */

.delete-modal-icon {
    width: 58px !important;
    height: 58px !important;

    margin: 0 auto 18px !important;

    border-radius: 50% !important;

    display: flex !important;

    align-items: center;
    justify-content: center;

    background: rgba(244,63,94,.10) !important;

    border: 1px solid rgba(244,63,94,.20) !important;

    color: #fb7185 !important;

    font-size: 24px !important;

    box-shadow:
        0 0 22px rgba(244,63,94,.08) !important;

    filter:
        drop-shadow(
            0 0 6px rgba(244,63,94,.35)
        );
}

.delete-modal-icon i {
    filter:
        drop-shadow(
            0 0 5px rgba(244,63,94,.45)
        );
}


/* =========================================================
   TITLE
   ========================================================= */

.delete-modal h3 {
    color: #f8fafc !important;

    font-size: 16px !important;

    font-weight: 850 !important;

    margin: 0 0 8px !important;
}


/* =========================================================
   DESCRIPTION
   ========================================================= */

.delete-modal p {
    color: #718096 !important;

    font-size: 10px !important;

    line-height: 1.6 !important;

    margin: 0 0 24px !important;
}


/* =========================================================
   BUTTON AREA
   ========================================================= */

.delete-modal-actions {
    display: flex;

    justify-content: center;
    align-items: center;

    gap: 8px;
}


/* =========================================================
   CANCEL BUTTON
   ========================================================= */

.modal-cancel-btn {
    background: #0d1725 !important;

    color: #718096 !important;

    border: 1px solid #26364d !important;

    padding: 9px 15px !important;

    border-radius: 9px !important;

    font-size: 10px !important;

    font-weight: 850 !important;

    cursor: pointer;

    transition:
        transform .2s ease,
        background .2s ease,
        border-color .2s ease,
        color .2s ease;
}

.modal-cancel-btn:hover {
    background: #111c2c !important;

    color: #dbe4f2 !important;

    border-color: #3a4c65 !important;

    transform: translateY(-2px);
}


/* =========================================================
   DELETE BUTTON
   ========================================================= */

.modal-delete-btn {
    position: relative;

    overflow: hidden;

    background: linear-gradient(
        135deg,
        #be123c,
        #f43f5e
    ) !important;

    color: #fff !important;

    border: 1px solid rgba(251,113,133,.35) !important;

    padding: 9px 15px !important;

    border-radius: 9px !important;

    font-size: 10px !important;

    font-weight: 850 !important;

    cursor: pointer;

    box-shadow:
        0 7px 18px rgba(244,63,94,.18) !important;

    transition:
        transform .2s ease,
        box-shadow .2s ease,
        border-color .2s ease;
}


/* =========================================================
   SHINE
   ========================================================= */

.modal-delete-btn::before {
    content: "";

    position: absolute;

    top: 0;
    left: -120%;

    width: 75%;
    height: 100%;

    background: linear-gradient(
        90deg,
        transparent,
        rgba(255,255,255,.20),
        transparent
    );

    transform: skewX(-20deg);

    transition: left .5s ease;
}

.modal-delete-btn:hover {
    color: #fff !important;

    transform: translateY(-2px);

    border-color:
        rgba(253,164,175,.65) !important;

    box-shadow:
        0 10px 25px rgba(244,63,94,.28) !important;
}

.modal-delete-btn:hover::before {
    left: 140%;
}

.modal-delete-btn i {
    transition: transform .2s ease;
}

.modal-delete-btn:hover i {
    transform: scale(1.08);

    filter:
        drop-shadow(
            0 0 5px rgba(255,255,255,.45)
        );
}


/* =========================================================
   MOBILE
   ========================================================= */

@media (max-width: 767px) {

    body:has(.fee-structures-page) .page-content {
        padding: 15px 14px 0 14px !important;
    }

    .fs-header {
        align-items: flex-start;
        flex-direction: column;
    }

    .fs-title {
        font-size: 25px;
    }

    .fs-btn-primary {
        width: 100%;
    }

    .delete-modal {
        max-width: 390px !important;

        padding: 25px 20px !important;
    }

    .delete-modal h3 {
        font-size: 15px !important;
    }

    .delete-modal p {
        font-size: 9px !important;
    }

}


/* =========================================================
   SMALL MOBILE
   ========================================================= */

@media (max-width: 420px) {

    .delete-modal-actions {
        width: 100%;
    }

    .modal-cancel-btn,
    .modal-delete-btn {
        flex: 1;
    }

}

</style>


<div class="fee-structures-page">


    {{-- =====================================================
         HEADER
         ====================================================== --}}

    <div class="fs-header">

        <div>

            <div class="fs-kicker">
                Finance Management
            </div>

            <h1 class="fs-title">
                Fee Structures
            </h1>

            <p class="fs-subtitle">
                Manage monthly, admission and other fee structures for academy classes.
            </p>

        </div>


        <a href="{{ route('fee-structures.create') }}"
           class="fs-btn-primary">

            <i class="bi bi-plus-lg"></i>

            Add Fee Structure

        </a>

    </div>


    {{-- =====================================================
         SUCCESS MESSAGE
         ====================================================== --}}

    @if(session('success'))

        <div class="fs-alert fs-alert-success">

            <i class="bi bi-check-circle me-2"></i>

            {{ session('success') }}

        </div>

    @endif


    {{-- =====================================================
         ERROR MESSAGE
         ====================================================== --}}

    @if(session('error'))

        <div class="fs-alert fs-alert-error">

            <i class="bi bi-exclamation-circle me-2"></i>

            {{ session('error') }}

        </div>

    @endif


    {{-- =====================================================
         TABLE CARD
         ====================================================== --}}

    <div class="fs-card">

        @if($feeStructures->count())

            <div class="fs-table-wrapper">

                <table class="fs-table">

                    <thead>

                        <tr>

                            <th>
                                #
                            </th>

                            <th>
                                Class / Group
                            </th>

                            <th>
                                Monthly Fee
                            </th>

                            <th>
                                Admission
                            </th>

                            <th>
                                Exam Fee
                            </th>

                            <th>
                                Other Fee
                            </th>

                            <th>
                                Discount
                            </th>

                            <th>
                                Effective From
                            </th>

                            <th>
                                Status
                            </th>

                            <th>
                                Actions
                            </th>

                        </tr>

                    </thead>


                    <tbody>

                        @foreach($feeStructures as $structure)

                            <tr>

                                {{-- NUMBER --}}

                                <td class="fs-muted">

                                    {{ $loop->iteration }}

                                </td>


                                {{-- CLASS / GROUP --}}

                                <td>

                                    <div class="fs-class-name">

                                        {{ $structure->academyClass->name ?? 'N/A' }}

                                    </div>

                                    <div class="fs-group">

                                        Group:

                                        {{ $structure->group->name ?? 'All Groups' }}

                                    </div>

                                </td>


                                {{-- MONTHLY --}}

                                <td>

                                    <span class="fs-amount">

                                        Rs.
                                        {{ number_format($structure->monthly_fee, 2) }}

                                    </span>

                                </td>


                                {{-- ADMISSION --}}

                                <td>

                                    <span class="fs-amount">

                                        Rs.
                                        {{ number_format($structure->admission_fee, 2) }}

                                    </span>

                                </td>


                                {{-- EXAM --}}

                                <td>

                                    <span class="fs-amount">

                                        Rs.
                                        {{ number_format($structure->exam_fee, 2) }}

                                    </span>

                                </td>


                                {{-- OTHER --}}

                                <td>

                                    <span class="fs-amount">

                                        Rs.
                                        {{ number_format($structure->other_fee, 2) }}

                                    </span>

                                </td>


                                {{-- DISCOUNT --}}

                                <td>

                                    <span class="fs-muted">

                                        Rs.
                                        {{ number_format($structure->default_discount, 2) }}

                                    </span>

                                </td>


                                {{-- EFFECTIVE DATE --}}

                                <td>

                                    @if($structure->effective_from)

                                        {{ $structure->effective_from->format('d M Y') }}

                                    @else

                                        <span class="fs-muted">
                                            —
                                        </span>

                                    @endif

                                </td>


                                {{-- STATUS --}}

                                <td>

                                    @if($structure->status)

                                        <span class="fs-status fs-status-active">

                                            <i class="bi bi-check-circle-fill"></i>

                                            Active

                                        </span>

                                    @else

                                        <span class="fs-status fs-status-inactive">

                                            <i class="bi bi-x-circle-fill"></i>

                                            Inactive

                                        </span>

                                    @endif

                                </td>


                                {{-- ACTIONS --}}

                                <td>

                                    <div class="fs-actions">


                                        {{-- EDIT --}}

                                        <a href="{{ route('fee-structures.edit', $structure) }}"
                                           class="fs-action fs-action-edit"
                                           title="Edit">

                                            <i class="bi bi-pencil"></i>

                                        </a>


                                        {{-- DELETE --}}

                                        <form action="{{ route('fee-structures.destroy', $structure) }}"
                                              method="POST"
                                              class="delete-form"
                                              style="margin:0;">

                                            @csrf

                                            @method('DELETE')

                                            <button type="button"
                                                    class="fs-action fs-action-delete delete-trigger"
                                                    title="Delete">

                                                <i class="bi bi-trash"></i>

                                            </button>

                                        </form>


                                    </div>

                                </td>

                            </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>

        @else


            {{-- =================================================
                 EMPTY STATE
                 ================================================== --}}

            <div class="fs-empty">

                <div class="fs-empty-icon">

                    <i class="bi bi-wallet2"></i>

                </div>


                <h4>
                    No Fee Structures Found
                </h4>


                <p>
                    Create your first fee structure to start managing academy fees.
                </p>


                <a href="{{ route('fee-structures.create') }}"
                   class="fs-btn-primary">

                    <i class="bi bi-plus-lg"></i>

                    Create Fee Structure

                </a>

            </div>

        @endif

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


        {{-- DELETE ICON --}}

        <div class="delete-modal-icon">

            <i class="bi bi-trash3-fill"></i>

        </div>


        {{-- TITLE --}}

        <h3>
            Delete Item?
        </h3>


        {{-- DESCRIPTION --}}

        <p>
            Are you sure you want to delete this item?
            This action cannot be undone.
        </p>


        {{-- BUTTONS --}}

        <div class="delete-modal-actions">


            {{-- CANCEL --}}

            <button
                type="button"
                class="modal-cancel-btn"
                id="cancelDelete"
            >

                Cancel

            </button>


            {{-- CONFIRM DELETE --}}

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



<script>

document.addEventListener('DOMContentLoaded', function () {


    /* =========================================================
       ELEMENTS
       ========================================================= */

    const modal =
        document.getElementById('deleteModal');

    const cancelButton =
        document.getElementById('cancelDelete');

    const confirmButton =
        document.getElementById('confirmDelete');


    if (
        !modal ||
        !cancelButton ||
        !confirmButton
    ) {
        return;
    }


    /* =========================================================
       DELETE FORM STORAGE
       ========================================================= */

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
       CLICK OUTSIDE MODAL
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