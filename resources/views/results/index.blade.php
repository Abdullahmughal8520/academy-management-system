@extends('layouts.app')

@section('title', 'Results')

@section('content')

<style>

/* =========================================================
   RESULTS PAGE DARK THEME
========================================================= */

body:has(.results-page) {
    background: #080e17 !important;
    color: #dbe4f2;
}

body:has(.results-page) .main-wrapper {
    background: #080e17 !important;
}

body:has(.results-page) .page-content {
    background: #080e17 !important;
    color: #dbe4f2;
}

body:has(.results-page) .topbar {
    background: rgba(8, 14, 23, 0.95) !important;
    border-bottom-color: #1b2738 !important;
}

body:has(.results-page) .page-title {
    color: #f8fafc !important;
}

body:has(.results-page) .page-subtitle {
    color: #64748b !important;
}


/* =========================================================
   RESULTS PAGE
========================================================= */

.results-page {
    color: #dbe4f2;
    padding-bottom: 30px;
}


/* =========================================================
   HEADER
========================================================= */

.results-page .results-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 20px;
    margin-bottom: 24px;
}

.results-page .results-heading {
    min-width: 0;
}

.results-page .eyebrow {
    margin: 0 0 7px;
    color: #8b5cf6;
    font-size: 11px;
    font-weight: 700;
    letter-spacing: 1.5px;
    text-transform: uppercase;
}

.results-page h1 {
    margin: 0;
    color: #f8fafc;
    font-size: 28px;
    font-weight: 700;
    letter-spacing: -0.4px;
}

.results-page .subtitle {
    margin: 7px 0 0;
    color: #64748b;
    font-size: 13px;
}


/* =========================================================
   ADD RESULT BUTTON
========================================================= */

.results-page .add-result-btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 8px;

    padding: 11px 17px;

    border: 1px solid rgba(139, 92, 246, 0.45);
    border-radius: 9px;

    background: linear-gradient(
        135deg,
        #8b5cf6,
        #6d28d9
    );

    color: #fff;
    font-size: 13px;
    font-weight: 700;

    text-decoration: none;

    box-shadow:
        0 8px 25px rgba(109, 40, 217, 0.22);

    transition: 0.2s ease;
}

.results-page .add-result-btn:hover {
    color: #fff;
    transform: translateY(-1px);

    box-shadow:
        0 10px 30px rgba(109, 40, 217, 0.32);
}


/* =========================================================
   SUCCESS MESSAGE
========================================================= */

.results-page .success-message {
    display: flex;
    align-items: center;
    gap: 9px;

    margin-bottom: 18px;
    padding: 12px 15px;

    border: 1px solid rgba(34, 197, 94, 0.22);
    border-radius: 9px;

    background: rgba(34, 197, 94, 0.08);

    color: #86efac;
    font-size: 13px;
}


/* =========================================================
   TABLE CARD
========================================================= */

.results-page .table-card {
    overflow: hidden;

    border: 1px solid #1b2738;
    border-radius: 14px;

    background:
        linear-gradient(
            180deg,
            rgba(15, 23, 42, 0.96),
            rgba(10, 17, 28, 0.98)
        );

    box-shadow:
        0 15px 45px rgba(0, 0, 0, 0.18);
}

.results-page .table-wrapper {
    width: 100%;
    overflow-x: auto;
}

.results-page table {
    width: 100%;
    min-width: 900px;
    border-collapse: collapse;
}


/* =========================================================
   TABLE HEADER
========================================================= */

.results-page thead {
    background: rgba(255, 255, 255, 0.025);
}

.results-page th {
    padding: 14px 16px;

    border-bottom: 1px solid #1b2738;

    color: #718096;

    font-size: 10px;
    font-weight: 700;

    letter-spacing: 1px;
    text-align: left;
    text-transform: uppercase;

    white-space: nowrap;
}


/* =========================================================
   TABLE BODY
========================================================= */

.results-page td {
    padding: 15px 16px;

    border-bottom: 1px solid rgba(27, 39, 56, 0.72);

    color: #cbd5e1;
    font-size: 13px;

    vertical-align: middle;
}

.results-page tbody tr {
    transition: background 0.18s ease;
}

.results-page tbody tr:hover {
    background: rgba(139, 92, 246, 0.035);
}

.results-page tbody tr:last-child td {
    border-bottom: none;
}


/* =========================================================
   ID
========================================================= */

.results-page .result-id {
    color: #64748b;
    font-size: 12px;
    font-weight: 600;
}


/* =========================================================
   STUDENT / EXAM
========================================================= */

.results-page .student-name {
    color: #f1f5f9;
    font-weight: 600;
}

.results-page .exam-name {
    color: #c4b5fd;
    font-weight: 600;
}

.results-page .marks {
    color: #dbe4f2;
    font-weight: 600;
}

.results-page .percentage {
    color: #22d3ee;
    font-weight: 700;
}


/* =========================================================
   GRADE BADGES
========================================================= */

.results-page .grade-badge {
    display: inline-flex;
    align-items: center;
    justify-content: center;

    min-width: 38px;
    padding: 5px 9px;

    border-radius: 6px;

    font-size: 11px;
    font-weight: 800;
}

.results-page .grade-a-plus,
.results-page .grade-a {
    background: rgba(34, 197, 94, 0.11);
    border: 1px solid rgba(34, 197, 94, 0.22);
    color: #86efac;
}

.results-page .grade-b {
    background: rgba(34, 211, 238, 0.10);
    border: 1px solid rgba(34, 211, 238, 0.20);
    color: #67e8f9;
}

.results-page .grade-c {
    background: rgba(250, 204, 21, 0.09);
    border: 1px solid rgba(250, 204, 21, 0.20);
    color: #fde047;
}

.results-page .grade-d {
    background: rgba(249, 115, 22, 0.10);
    border: 1px solid rgba(249, 115, 22, 0.20);
    color: #fdba74;
}

.results-page .grade-f {
    background: rgba(244, 63, 94, 0.10);
    border: 1px solid rgba(244, 63, 94, 0.22);
    color: #fb7185;
}


/* =========================================================
   ACTION BUTTONS
========================================================= */

.results-page .actions {
    display: flex;
    align-items: center;
    gap: 7px;

    white-space: nowrap;
}

.results-page .action-btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    gap: 5px;

    padding: 7px 10px;

    border-radius: 7px;

    font-size: 11px;
    font-weight: 700;

    text-decoration: none;

    transition: 0.18s ease;
}

.results-page .view-btn {
    border: 1px solid rgba(34, 211, 238, 0.20);
    background: rgba(34, 211, 238, 0.07);
    color: #67e8f9;
}

.results-page .view-btn:hover {
    background: rgba(34, 211, 238, 0.13);
    color: #a5f3fc;
}

.results-page .edit-btn {
    border: 1px solid rgba(139, 92, 246, 0.22);
    background: rgba(139, 92, 246, 0.08);
    color: #a78bfa;
}

.results-page .edit-btn:hover {
    background: rgba(139, 92, 246, 0.14);
    color: #c4b5fd;
}

.results-page .delete-btn {
    border: 1px solid rgba(244, 63, 94, 0.20);
    background: rgba(244, 63, 94, 0.07);
    color: #fb7185;
    cursor: pointer;
}

.results-page .delete-btn:hover {
    background: rgba(244, 63, 94, 0.13);
    color: #fda4af;
}


/* =========================================================
   EMPTY STATE
========================================================= */

.results-page .empty-state {
    padding: 60px 20px;
    text-align: center;
}

.results-page .empty-icon {
    width: 52px;
    height: 52px;

    display: inline-flex;
    align-items: center;
    justify-content: center;

    margin-bottom: 15px;

    border: 1px solid #1b2738;
    border-radius: 12px;

    background: #0d1521;

    color: #8b5cf6;
    font-size: 21px;
}

.results-page .empty-state h3 {
    margin: 0 0 6px;

    color: #e2e8f0;
    font-size: 15px;
}

.results-page .empty-state p {
    margin: 0;

    color: #64748b;
    font-size: 12px;
}


/* =========================================================
   DELETE MODAL
========================================================= */

.delete-modal-overlay {
    position: fixed;
    inset: 0;

    z-index: 99999;

    display: none;

    align-items: center;
    justify-content: center;

    padding: 20px;

    background: rgba(2, 6, 23, 0.76);

    backdrop-filter: blur(6px);
}

.delete-modal-overlay.show {
    display: flex;
}

.delete-modal {
    width: 100%;
    max-width: 410px;

    padding: 24px;

    border: 1px solid #293548;
    border-radius: 14px;

    background:
        linear-gradient(
            180deg,
            #111827,
            #0b1220
        );

    box-shadow:
        0 25px 70px rgba(0, 0, 0, 0.5);

    animation: resultModalIn 0.18s ease;
}

@keyframes resultModalIn {

    from {
        opacity: 0;
        transform: translateY(8px) scale(0.98);
    }

    to {
        opacity: 1;
        transform: translateY(0) scale(1);
    }

}

.delete-modal-icon {
    width: 44px;
    height: 44px;

    display: flex;
    align-items: center;
    justify-content: center;

    margin-bottom: 15px;

    border-radius: 10px;

    background: rgba(244, 63, 94, 0.10);
    border: 1px solid rgba(244, 63, 94, 0.20);

    color: #fb7185;
    font-size: 18px;
}

.delete-modal h3 {
    margin: 0 0 7px;

    color: #f8fafc;
    font-size: 17px;
}

.delete-modal p {
    margin: 0;

    color: #94a3b8;
    font-size: 13px;
    line-height: 1.6;
}

.modal-actions {
    display: flex;
    justify-content: flex-end;
    gap: 9px;

    margin-top: 22px;
}

.modal-cancel,
.modal-delete {
    padding: 9px 14px;

    border-radius: 8px;

    font-size: 12px;
    font-weight: 700;

    cursor: pointer;
}

.modal-cancel {
    border: 1px solid #293548;
    background: #0d1521;
    color: #94a3b8;
}

.modal-cancel:hover {
    color: #e2e8f0;
}

.modal-delete {
    border: 1px solid rgba(244, 63, 94, 0.28);
    background: #be123c;
    color: #fff;
}

.modal-delete:hover {
    background: #e11d48;
}


/* =========================================================
   MOBILE
========================================================= */

@media (max-width: 768px) {

    .results-page .results-header {
        align-items: flex-start;
        flex-direction: column;
    }

    .results-page .add-result-btn {
        width: 100%;
    }

    .results-page h1 {
        font-size: 24px;
    }

    .results-page .table-card {
        border-radius: 11px;
    }

    .results-page th,
    .results-page td {
        padding: 12px;
    }

}

</style>


<div class="results-page">

    {{-- ================= HEADER ================= --}}

    <div class="results-header">

        <div class="results-heading">

            <p class="eyebrow">
                Academy Management
            </p>

            <h1>
                Results
            </h1>

            <p class="subtitle">
                Manage student examination results and academic performance.
            </p>

        </div>


        <a href="{{ route('results.create') }}"
           class="add-result-btn">

            <i class="bi bi-plus-lg"></i>

            Add Result

        </a>

    </div>


    {{-- ================= SUCCESS MESSAGE ================= --}}

    @if(session('success'))

        <div class="success-message">

            <i class="bi bi-check-circle-fill"></i>

            <span>
                {{ session('success') }}
            </span>

        </div>

    @endif


    {{-- ================= RESULTS TABLE ================= --}}

    <div class="table-card">

        @if($results->count())

            <div class="table-wrapper">

                <table>

                    <thead>

                        <tr>

                            <th>ID</th>

                            <th>Student</th>

                            <th>Exam</th>

                            <th>Total Marks</th>

                            <th>Obtained</th>

                            <th>Percentage</th>

                            <th>Grade</th>

                            <th>Action</th>

                        </tr>

                    </thead>


                    <tbody>

                        @foreach($results as $result)

                            @php

                                $gradeClass = match($result->grade) {

                                    'A+' => 'grade-a-plus',

                                    'A' => 'grade-a',

                                    'B' => 'grade-b',

                                    'C' => 'grade-c',

                                    'D' => 'grade-d',

                                    default => 'grade-f',

                                };

                            @endphp


                            <tr>

                                {{-- ID --}}

                                <td>

                                    <span class="result-id">
                                        #{{ $result->id }}
                                    </span>

                                </td>


                                {{-- STUDENT --}}

                                <td>

                                    <div class="student-name">
                                        {{ $result->student->name ?? 'N/A' }}
                                    </div>

                                </td>


                                {{-- EXAM --}}

                                <td>

                                    <div class="exam-name">
                                        {{ $result->exam->name ?? 'N/A' }}
                                    </div>

                                </td>


                                {{-- TOTAL MARKS --}}

                                <td>

                                    <span class="marks">
                                        {{ number_format($result->total_marks, 0) }}
                                    </span>

                                </td>


                                {{-- OBTAINED MARKS --}}

                                <td>

                                    <span class="marks">
                                        {{ number_format($result->obtained_marks, 0) }}
                                    </span>

                                </td>


                                {{-- PERCENTAGE --}}

                                <td>

                                    <span class="percentage">
                                        {{ number_format($result->percentage, 2) }}%
                                    </span>

                                </td>


                                {{-- GRADE --}}

                                <td>

                                    <span class="grade-badge {{ $gradeClass }}">
                                        {{ $result->grade ?? 'N/A' }}
                                    </span>

                                </td>


                                {{-- ACTIONS --}}

                                <td>

                                    <div class="actions">

                                        <a href="{{ route('results.show', $result) }}"
                                           class="action-btn view-btn">

                                            <i class="bi bi-eye-fill"></i>

                                            View

                                        </a>


                                        <a href="{{ route('results.edit', $result) }}"
                                           class="action-btn edit-btn">

                                            <i class="bi bi-pencil-fill"></i>

                                            Edit

                                        </a>


                                        <button type="button"
                                                class="action-btn delete-btn"
                                                onclick="openResultDeleteModal({{ $result->id }})">

                                            <i class="bi bi-trash-fill"></i>

                                            Delete

                                        </button>


                                        <form
                                            id="delete-result-form-{{ $result->id }}"
                                            action="{{ route('results.destroy', $result) }}"
                                            method="POST"
                                            style="display: none;">

                                            @csrf

                                            @method('DELETE')

                                        </form>

                                    </div>

                                </td>

                            </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>

        @else

            <div class="empty-state">

                <div class="empty-icon">

                    <i class="bi bi-award-fill"></i>

                </div>


                <h3>
                    No Results Found
                </h3>


                <p>
                    No examination results have been added yet.
                </p>

            </div>

        @endif

    </div>

</div>


{{-- =========================================================
     DELETE MODAL
========================================================= --}}

<div id="resultDeleteModal"
     class="delete-modal-overlay">

    <div class="delete-modal">

        <div class="delete-modal-icon">

            <i class="bi bi-trash-fill"></i>

        </div>


        <h3>
            Delete Result?
        </h3>


        <p>
            Are you sure you want to delete this result?
            This action cannot be undone.
        </p>


        <div class="modal-actions">

            <button type="button"
                    class="modal-cancel"
                    onclick="closeResultDeleteModal()">

                Cancel

            </button>


            <button type="button"
                    class="modal-delete"
                    onclick="confirmResultDelete()">

                Delete Result

            </button>

        </div>

    </div>

</div>


<script>

let selectedResultId = null;


function openResultDeleteModal(id)
{
    selectedResultId = id;

    document
        .getElementById('resultDeleteModal')
        .classList.add('show');
}


function closeResultDeleteModal()
{
    selectedResultId = null;

    document
        .getElementById('resultDeleteModal')
        .classList.remove('show');
}


function confirmResultDelete()
{
    if (!selectedResultId) {
        return;
    }

    const form = document.getElementById(
        'delete-result-form-' + selectedResultId
    );

    if (form) {
        form.submit();
    }
}


document
    .getElementById('resultDeleteModal')
    .addEventListener('click', function(event) {

        if (event.target === this) {
            closeResultDeleteModal();
        }

    });


document.addEventListener('keydown', function(event) {

    if (event.key === 'Escape') {
        closeResultDeleteModal();
    }

});

</script>

@endsection
