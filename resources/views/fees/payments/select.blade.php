@extends('layouts.app')

@section('title', 'Receive Payment')

@section('content')

<style>

/* =========================================================
   RECEIVE PAYMENT - SELECT STUDENT
   SAME DARK EXAMS THEME
   ========================================================= */

body:has(.payment-select-page) {
    background:#080e17 !important;
}

body:has(.payment-select-page) .main-wrapper {
    background:#080e17 !important;
}

body:has(.payment-select-page) .page-content {
    background:#080e17 !important;
    padding:18px 20px 0 20px !important;
    margin:0 !important;
    min-height:calc(100vh - 76px) !important;
}

.payment-select-page {

    --text:#edf3fb;
    --muted:#718096;
    --purple:#8b5cf6;
    --green:#22c55e;
    --red:#f43f5e;
    --yellow:#fbbf24;

    width:100%;
    min-height:calc(100vh - 94px);

    color:var(--text);

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

.payment-select-page *,
.payment-select-page *::before,
.payment-select-page *::after {
    box-sizing:border-box;
}


/* =========================================================
   HEADER
   ========================================================= */

.payment-select-page .page-header {

    display:flex;
    align-items:center;
    justify-content:space-between;

    gap:15px;

    margin-bottom:20px;
}

.payment-select-page .heading h1 {

    margin:0 0 5px;

    color:#f8fafc;

    font-size:27px;

    line-height:1.15;

    font-weight:850;

    letter-spacing:-.3px;
}

.payment-select-page .heading h1::before {

    content:"Academy Management";

    display:block;

    margin-bottom:4px;

    color:#a78bfa;

    font-size:10px;

    font-weight:900;

    letter-spacing:1.7px;

    text-transform:uppercase;
}

.payment-select-page .heading p {

    margin:0;

    color:#728197;

    font-size:12px;
}


/* =========================================================
   BUTTON
   ========================================================= */

.payment-select-page .btn {

    display:inline-flex;

    align-items:center;

    justify-content:center;

    gap:7px;

    min-height:38px;

    padding:9px 14px;

    border-radius:9px;

    font-size:10px;

    font-weight:850;

    text-decoration:none;

    cursor:pointer;

    transition:
        .25s ease;

    border:1px solid transparent;
}

.payment-select-page .btn-back {

    background:#0d1725 !important;

    color:#94a3b8 !important;

    border-color:#26364d !important;
}

.payment-select-page .btn-back:hover {

    background:#111c2c !important;

    color:#fff !important;

    border-color:#3a4c65 !important;

    transform:translateY(-2px);
}


/* =========================================================
   ALERTS
   ========================================================= */

.payment-select-page .alert {

    padding:11px 14px;

    border-radius:10px;

    margin-bottom:18px;

    font-size:10px;

    font-weight:700;
}

.payment-select-page .alert-success {

    background:rgba(34,197,94,.08);

    border:1px solid rgba(34,197,94,.18);

    color:#86efac;
}

.payment-select-page .alert-danger {

    background:rgba(244,63,94,.08);

    border:1px solid rgba(244,63,94,.18);

    color:#fb7185;
}


/* =========================================================
   SEARCH CARD
   ========================================================= */

.payment-select-page .search-card {

    background:
        linear-gradient(
            145deg,
            #111b2a,
            #0d1521
        );

    border:1px solid #223149;

    border-radius:15px;

    padding:16px;

    margin-bottom:18px;

    box-shadow:
        0 10px 28px rgba(0,0,0,.15);
}

.payment-select-page .search-form {

    display:grid;

    grid-template-columns:1fr auto;

    gap:10px;

    align-items:end;
}

.payment-select-page .form-label {

    display:block;

    margin-bottom:6px;

    color:#607089;

    font-size:8px;

    font-weight:900;

    text-transform:uppercase;

    letter-spacing:.7px;
}

.payment-select-page .form-control {

    width:100%;

    height:40px;

    padding:0 12px;

    border-radius:8px;

    border:1px solid #26364d !important;

    background:#0d1725 !important;

    color:#dbe4f2 !important;

    outline:none;

    font-size:10px;

    transition:.2s ease;
}

.payment-select-page .form-control::placeholder {

    color:#53647c;
}

.payment-select-page .form-control:focus {

    border-color:#8b5cf6 !important;

    box-shadow:
        0 0 0 3px rgba(139,92,246,.10) !important;

    color:#fff !important;
}

.payment-select-page .search-btn {

    height:40px;

    padding:0 18px;

    border:1px solid rgba(139,92,246,.45);

    border-radius:8px;

    background:
        linear-gradient(
            135deg,
            #6848e8,
            #8b5cf6
        );

    color:#fff;

    font-size:10px;

    font-weight:850;

    cursor:pointer;

    box-shadow:
        0 8px 20px rgba(124,58,237,.18);

    transition:.25s ease;
}

.payment-select-page .search-btn:hover {

    transform:translateY(-2px);

    box-shadow:
        0 12px 26px rgba(124,58,237,.28);
}


/* =========================================================
   STUDENTS CARD
   ========================================================= */

.payment-select-page .students-card {

    width:100%;

    overflow:hidden;

    background:
        linear-gradient(
            145deg,
            #111b2a,
            #0d1521
        );

    border:1px solid #223149;

    border-radius:15px;

    box-shadow:
        0 12px 30px rgba(0,0,0,.18);
}

.payment-select-page .card-header {

    min-height:58px;

    padding:13px 16px;

    display:flex;

    align-items:center;

    justify-content:space-between;

    gap:10px;

    border-bottom:1px solid #1e2b3e;
}

.payment-select-page .card-title {

    color:#f1f5f9;

    font-size:12px;

    font-weight:850;
}

.payment-select-page .record-count {

    color:#5f7088;

    font-size:9px;
}


/* =========================================================
   STUDENT GRID
   ========================================================= */

.payment-select-page .students-grid {

    display:grid;

    grid-template-columns:
        repeat(2, minmax(0,1fr));

    gap:12px;

    padding:15px;
}


/* =========================================================
   STUDENT CARD
   ========================================================= */

.payment-select-page .student-card {

    position:relative;

    overflow:hidden;

    padding:15px;

    border-radius:13px;

    background:#0d1725;

    border:1px solid #223149;

    transition:
        transform .25s ease,
        border-color .25s ease,
        box-shadow .25s ease;
}

.payment-select-page .student-card::after {

    content:"";

    position:absolute;

    width:90px;

    height:90px;

    right:-45px;

    top:-45px;

    border-radius:50%;

    background:rgba(139,92,246,.06);

    pointer-events:none;
}

.payment-select-page .student-card:hover {

    transform:translateY(-3px);

    border-color:rgba(139,92,246,.42);

    box-shadow:
        0 12px 28px rgba(0,0,0,.24),
        0 0 18px rgba(139,92,246,.06);
}


/* =========================================================
   STUDENT TOP
   ========================================================= */

.payment-select-page .student-top {

    display:flex;

    align-items:center;

    justify-content:space-between;

    gap:10px;

    margin-bottom:13px;
}

.payment-select-page .student-profile {

    display:flex;

    align-items:center;

    gap:10px;

    min-width:0;
}

.payment-select-page .student-avatar {

    width:39px;

    height:39px;

    flex:0 0 39px;

    display:flex;

    align-items:center;

    justify-content:center;

    border-radius:10px;

    background:
        rgba(139,92,246,.10);

    border:1px solid
        rgba(139,92,246,.18);

    color:#a78bfa;

    font-size:15px;
}

.payment-select-page .student-name {

    color:#e2e8f0;

    font-size:11px;

    font-weight:850;

    white-space:nowrap;

    overflow:hidden;

    text-overflow:ellipsis;
}

.payment-select-page .student-code {

    margin-top:3px;

    color:#64758c;

    font-size:8px;
}

.payment-select-page .pending-badge {

    display:inline-flex;

    align-items:center;

    gap:5px;

    padding:5px 8px;

    border-radius:7px;

    color:#fcd34d;

    background:rgba(251,191,36,.08);

    border:1px solid rgba(251,191,36,.15);

    font-size:8px;

    font-weight:900;

    white-space:nowrap;
}


/* =========================================================
   STUDENT META
   ========================================================= */

.payment-select-page .student-meta {

    display:grid;

    grid-template-columns:1fr 1fr;

    gap:8px;

    margin-bottom:12px;
}

.payment-select-page .meta-box {

    padding:9px;

    border-radius:8px;

    background:#111c2c;

    border:1px solid #1d2b40;
}

.payment-select-page .meta-label {

    display:block;

    margin-bottom:3px;

    color:#53647c;

    font-size:7px;

    font-weight:900;

    text-transform:uppercase;

    letter-spacing:.6px;
}

.payment-select-page .meta-value {

    color:#cbd5e1;

    font-size:9px;

    font-weight:750;
}


/* =========================================================
   OUTSTANDING
   ========================================================= */

.payment-select-page .outstanding {

    display:flex;

    align-items:center;

    justify-content:space-between;

    gap:10px;

    margin-bottom:12px;

    padding:10px;

    border-radius:9px;

    background:rgba(34,197,94,.045);

    border:1px solid rgba(34,197,94,.12);
}

.payment-select-page .outstanding-label {

    color:#64758c;

    font-size:8px;

    font-weight:800;
}

.payment-select-page .outstanding-value {

    color:#86efac;

    font-size:12px;

    font-weight:900;
}


/* =========================================================
   FEES
   ========================================================= */

.payment-select-page .fees-list {

    display:flex;

    flex-direction:column;

    gap:7px;

    margin-bottom:12px;
}

.payment-select-page .fee-row {

    display:flex;

    align-items:center;

    justify-content:space-between;

    gap:10px;

    padding:8px 9px;

    border-radius:8px;

    background:#111c2c;

    border:1px solid #1d2b40;
}

.payment-select-page .fee-month {

    display:flex;

    align-items:center;

    gap:6px;

    color:#a78bfa;

    font-size:8px;

    font-weight:850;
}

.payment-select-page .fee-month i {

    font-size:10px;
}

.payment-select-page .fee-remaining {

    color:#fbbf24;

    font-size:8px;

    font-weight:900;
}


/* =========================================================
   RECEIVE BUTTON
   ========================================================= */

.payment-select-page .receive-btn {

    width:100%;

    min-height:37px;

    display:flex;

    align-items:center;

    justify-content:center;

    gap:7px;

    border-radius:8px;

    background:
        linear-gradient(
            135deg,
            #059669,
            #22c55e
        );

    border:1px solid
        rgba(74,222,128,.35);

    color:#fff;

    text-decoration:none;

    font-size:9px;

    font-weight:900;

    box-shadow:
        0 7px 18px rgba(16,185,129,.12);

    transition:.25s ease;
}

.payment-select-page .receive-btn:hover {

    color:#fff;

    transform:translateY(-2px);

    box-shadow:
        0 11px 24px rgba(16,185,129,.22);
}


/* =========================================================
   EMPTY
   ========================================================= */

.payment-select-page .empty-state {

    padding:60px 20px;

    text-align:center;
}

.payment-select-page .empty-icon {

    width:55px;

    height:55px;

    margin:0 auto 14px;

    display:flex;

    align-items:center;

    justify-content:center;

    border-radius:13px;

    background:rgba(139,92,246,.09);

    border:1px solid rgba(139,92,246,.15);

    color:#a78bfa;

    font-size:21px;
}

.payment-select-page .empty-state h3 {

    margin:0 0 5px;

    color:#dbe4f2;

    font-size:12px;

    font-weight:850;
}

.payment-select-page .empty-state p {

    margin:0;

    color:#64758c;

    font-size:9px;
}


/* =========================================================
   PAGINATION
   ========================================================= */

.payment-select-page .pagination-area {

    padding:13px 16px;

    display:flex;

    align-items:center;

    justify-content:space-between;

    gap:15px;

    border-top:1px solid #1e2b3e;

    background:#0d1623;
}

.payment-select-page .pagination-info {

    color:#5f7088;

    font-size:9px;
}

.payment-select-page .pagination nav {

    display:flex;
}

.payment-select-page .pagination ul {

    display:flex;

    gap:5px;

    margin:0;

    padding:0;

    list-style:none;
}

.payment-select-page .pagination li {

    list-style:none;
}

.payment-select-page .pagination a,
.payment-select-page .pagination span {

    min-width:30px;

    height:30px;

    padding:0 8px;

    display:inline-flex;

    align-items:center;

    justify-content:center;

    border-radius:7px;

    border:1px solid #2a3a51;

    background:#121e2f;

    color:#8494aa;

    text-decoration:none;

    font-size:9px;

    transition:.2s ease;
}

.payment-select-page .pagination a:hover {

    background:#1a2940;

    border-color:#40536d;

    color:#fff;
}

.payment-select-page .pagination .active span {

    background:
        linear-gradient(
            135deg,
            #6848e8,
            #8b5cf6
        );

    color:#fff;

    border-color:#8b5cf6;
}

.payment-select-page .pagination .disabled span {

    opacity:.45;
}


/* =========================================================
   MOBILE
   ========================================================= */

@media(max-width:900px) {

    .payment-select-page .students-grid {

        grid-template-columns:1fr;
    }
}

@media(max-width:767px) {

    body:has(.payment-select-page) .page-content {

        padding:15px 15px 0 15px !important;
    }

    .payment-select-page .page-header {

        align-items:flex-start;

        flex-direction:column;
    }

    .payment-select-page .heading h1 {

        font-size:22px;
    }

    .payment-select-page .heading p {

        font-size:10px;
    }

    .payment-select-page .heading h1::before {

        font-size:8px;
    }

    .payment-select-page .search-form {

        grid-template-columns:1fr;
    }

    .payment-select-page .search-btn {

        width:100%;
    }

    .payment-select-page .pagination-area {

        flex-direction:column;

        align-items:flex-start;
    }
}

@media(max-width:480px) {

    .payment-select-page .student-meta {

        grid-template-columns:1fr;
    }
}

</style>


<div class="payment-select-page">


    {{-- =====================================================
         PAGE HEADER
    ====================================================== --}}

    <div class="page-header">

        <div class="heading">

            <h1>
                Receive Payment
            </h1>

            <p>
                Select a student to view and receive their pending fees.
            </p>

        </div>


        <a
            href="{{ route('fees.index') }}"
            class="btn btn-back"
        >
            <i class="bi bi-arrow-left"></i>
            Back to Fee Management
        </a>

    </div>


    {{-- =====================================================
         ALERTS
    ====================================================== --}}

    @if(session('success'))

        <div class="alert alert-success">

            <i class="bi bi-check-circle-fill me-1"></i>

            {{ session('success') }}

        </div>

    @endif


    @if(session('error'))

        <div class="alert alert-danger">

            <i class="bi bi-exclamation-triangle-fill me-1"></i>

            {{ session('error') }}

        </div>

    @endif


    {{-- =====================================================
         SEARCH
    ====================================================== --}}

    <div class="search-card">

       <form
    method="GET"
    action="{{ route('fee-payments.create') }}"
    class="search-form"
>

    <div>

        <label class="form-label">
            Search Student
        </label>

        <input
            type="text"
            name="search"
            class="form-control"
            placeholder="Search by student name or student code..."
            value="{{ request('search') }}"
        >

    </div>

    <button
        type="submit"
        class="search-btn"
    >
        <i class="bi bi-search"></i>
        Search Student
    </button>

</form>

    </div>


    {{-- =====================================================
         STUDENTS
    ====================================================== --}}

    <div class="students-card">


        <div class="card-header">

            <div class="card-title">

                Students with Outstanding Fees

            </div>

            <div class="record-count">

                {{ $students->total() }}

                students

            </div>

        </div>


        @if($students->count())


            <div class="students-grid">


                @foreach($students as $student)

                    @php

                        $pendingFees =
                            $student->fees;

                        $totalOutstanding =
                            $pendingFees->sum(
                                'remaining_amount'
                            );

                        $studentName =
                            trim(
                                ($student->first_name ?? '') .
                                ' ' .
                                ($student->last_name ?? '')
                            );

                    @endphp


                    <div class="student-card">


                        {{-- STUDENT TOP --}}

                        <div class="student-top">


                            <div class="student-profile">

                                <div class="student-avatar">

                                    <i class="bi bi-person-fill"></i>

                                </div>


                                <div>

                                    <div class="student-name">

                                        {{ $studentName ?: 'Unknown Student' }}

                                    </div>

                                    <div class="student-code">

                                        {{ $student->student_code ?? 'N/A' }}

                                    </div>

                                </div>

                            </div>


                            <div class="pending-badge">

                                <i class="bi bi-clock-history"></i>

                                {{ $pendingFees->count() }}

                                {{ $pendingFees->count() === 1 ? 'Fee' : 'Fees' }}

                            </div>

                        </div>


                        {{-- STUDENT META --}}

                        <div class="student-meta">


                            <div class="meta-box">

                                <span class="meta-label">
                                    Class
                                </span>

                                <span class="meta-value">

                                    {{ $student->academyClass->name ?? 'N/A' }}

                                </span>

                            </div>


                            <div class="meta-box">

                                <span class="meta-label">
                                    Group
                                </span>

                                <span class="meta-value">

                                    {{ $student->group->name ?? 'N/A' }}

                                </span>

                            </div>


                        </div>


                        {{-- OUTSTANDING --}}

                        <div class="outstanding">

                            <span class="outstanding-label">

                                Total Outstanding

                            </span>

                            <span class="outstanding-value">

                                Rs.
                                {{ number_format(
                                    $totalOutstanding,
                                    0
                                ) }}

                            </span>

                        </div>


                        {{-- PENDING FEES --}}

                        <div class="fees-list">


                            @foreach(
                                $pendingFees->take(3)
                                as $pendingFee
                            )

                                <div class="fee-row">


                                    <span class="fee-month">

                                        <i class="bi bi-calendar3"></i>

                                        {{ \Carbon\Carbon::createFromFormat(
                                            'Y-m',
                                            $pendingFee->fee_month
                                        )->format('F Y') }}

                                    </span>


                                    <span class="fee-remaining">

                                        Rs.
                                        {{ number_format(
                                            $pendingFee->remaining_amount,
                                            0
                                        ) }}

                                    </span>

                                </div>

                            @endforeach


                        </div>


                        {{-- RECEIVE PAYMENT --}}

                        @if($pendingFees->first())

                            <a
                                href="{{ route(
                                    'fees.payments.create',
                                    $pendingFees->first()
                                ) }}"
                                class="receive-btn"
                            >

                                <i class="bi bi-cash-coin"></i>

                                Receive Payment

                            </a>

                        @endif


                    </div>

                @endforeach


            </div>


            {{-- =================================================
                 PAGINATION
            ================================================== --}}

            <div class="pagination-area">

                <div class="pagination-info">

                    Showing

                    {{ $students->firstItem() ?? 0 }}

                    -

                    {{ $students->lastItem() ?? 0 }}

                    of

                    {{ $students->total() }}

                    students

                </div>


                <div class="pagination">

                    {{ $students->links() }}

                </div>

            </div>


        @else


            {{-- =================================================
                 EMPTY STATE
            ================================================== --}}

            <div class="empty-state">

                <div class="empty-icon">

                    <i class="bi bi-check-circle-fill"></i>

                </div>


                <h3>

                    No Outstanding Fees

                </h3>


                <p>

                    There are currently no students with pending fees.

                </p>

            </div>

        @endif


    </div>


</div>

@endsection