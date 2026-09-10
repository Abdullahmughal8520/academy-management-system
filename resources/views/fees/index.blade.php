@extends('layouts.app')

@section('title', 'Fee Management')

@section('content')

<style>

/* =========================================================
   FEE MANAGEMENT
   SAME THEME AS EXAMS PAGE
   ========================================================= */

body:has(.fees-page) {
    background:#080e17 !important;
}

body:has(.fees-page) .main-wrapper {
    background:#080e17 !important;
}

body:has(.fees-page) .page-content {
    background:#080e17 !important;
    padding:18px 20px 0 20px !important;
    margin:0 !important;
    min-height:calc(100vh - 76px) !important;
}

.fees-page {
    --f-text:#edf3fb;
    --f-muted:#718096;
    --f-purple:#8b5cf6;
    --f-green:#22c55e;
    --f-red:#f43f5e;
    --f-cyan:#22d3ee;

    width:100%;
    min-height:calc(100vh - 94px);
    margin:0 !important;
    padding:0 !important;

    color:var(--f-text);

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

.fees-page *,
.fees-page *::before,
.fees-page *::after {
    box-sizing:border-box;
}


/* =========================================================
   PAGE HEADER
   ========================================================= */

.fees-page .page-header {
    display:flex;
    justify-content:space-between;
    align-items:center;
    gap:18px;
    margin-bottom:20px;
}

.fees-page .page-title h1 {
    margin:0 0 5px;
    font-size:27px;
    line-height:1.15;
    font-weight:850;
    color:#f8fafc;
    letter-spacing:-.3px;
}

.fees-page .page-title p {
    margin:0;
    color:#728197;
    font-size:12px;
}

.fees-page .page-title h1::before {
    content:"Academy Management";
    display:block;
    margin-bottom:4px;
    color:#a78bfa;
    font-size:10px;
    font-weight:900;
    letter-spacing:1.7px;
    text-transform:uppercase;
}


/* =========================================================
   HEADER ACTIONS
   ========================================================= */

.fees-page .header-actions {
    display:flex;
    align-items:center;
    gap:8px;
    flex-wrap:wrap;
}

.fees-page .btn {
    position:relative;
    display:inline-flex;
    align-items:center;
    justify-content:center;
    gap:6px;
    overflow:hidden;

    padding:10px 15px;
    border-radius:10px;

    font-size:10px;
    font-weight:850;
    text-decoration:none;
    cursor:pointer;

    transition:
        transform .25s ease,
        box-shadow .25s ease,
        border-color .25s ease,
        background .25s ease;
}


/* =========================================================
   PRIMARY BUTTON
   ========================================================= */

.fees-page .btn-primary {
    background:linear-gradient(
        135deg,
        #6848e8,
        #8b5cf6
    ) !important;

    color:#fff !important;

    border:1px solid rgba(167,139,250,.45) !important;

    box-shadow:
        0 8px 24px rgba(124,58,237,.20);
}

.fees-page .btn-primary::before {
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

.fees-page .btn-primary:hover {
    color:#fff !important;
    transform:translateY(-3px);

    border-color:rgba(196,181,253,.75) !important;

    box-shadow:
        0 12px 30px rgba(124,58,237,.32),
        0 0 20px rgba(139,92,246,.12);
}

.fees-page .btn-primary:hover::before {
    left:140%;
}


/* =========================================================
   SECONDARY BUTTON
   ========================================================= */

.fees-page .btn-secondary {
    background:#0d1725 !important;
    color:#94a3b8 !important;
    border:1px solid #26364d !important;
}

.fees-page .btn-secondary:hover {
    background:#111c2c !important;
    color:#dbe4f2 !important;
    border-color:#3a4c65 !important;
    transform:translateY(-2px);
}


/* =========================================================
   ALERTS
   ========================================================= */

.fees-page .alert {
    padding:11px 14px !important;
    border-radius:11px !important;
    margin-bottom:18px;
    font-size:10px;
    font-weight:700;
}

.fees-page .alert-success {
    background:rgba(34,197,94,.08) !important;
    border:1px solid rgba(34,197,94,.18) !important;
    color:#86efac !important;
}

.fees-page .alert-danger {
    background:rgba(244,63,94,.08) !important;
    border:1px solid rgba(244,63,94,.18) !important;
    color:#fb7185 !important;
}


/* =========================================================
   STATISTICS
   ========================================================= */

.fees-page .stats-grid {
    display:grid;
    grid-template-columns:repeat(4,1fr);
    gap:12px;
    margin-bottom:18px;
}

.fees-page .stat-card {
    position:relative;
    overflow:hidden;

    min-height:112px;
    padding:15px;

    border-radius:14px;

    background:linear-gradient(
        145deg,
        #111b2a,
        #0d1521
    );

    border:1px solid #223149;

    box-shadow:
        0 10px 28px rgba(0,0,0,.16);

    transition:
        transform .25s ease,
        border-color .25s ease,
        box-shadow .25s ease;
}

.fees-page .stat-card::after {
    content:"";
    position:absolute;

    width:100px;
    height:100px;

    right:-55px;
    top:-55px;

    border-radius:50%;

    background:rgba(139,92,246,.07);

    transition:transform .3s ease;
}

.fees-page .stat-card:hover {
    transform:translateY(-4px);

    border-color:rgba(139,92,246,.45);

    box-shadow:
        0 15px 35px rgba(0,0,0,.28),
        0 0 18px rgba(139,92,246,.08);
}

.fees-page .stat-card:hover::after {
    transform:scale(1.35);
}

.fees-page .stat-top {
    display:flex;
    align-items:center;
    justify-content:space-between;

    margin-bottom:12px;
}

.fees-page .stat-label {
    color:#8291a6;

    font-size:9px;
    font-weight:900;

    text-transform:uppercase;
    letter-spacing:.7px;
}

.fees-page .stat-icon {
    width:34px;
    height:34px;

    border-radius:9px;

    display:flex;
    align-items:center;
    justify-content:center;

    background:rgba(139,92,246,.09);

    border:1px solid rgba(139,92,246,.15);

    color:#a78bfa;

    font-size:14px;

    transition:
        transform .25s ease,
        box-shadow .25s ease;
}

.fees-page .stat-card:hover .stat-icon {
    transform:scale(1.08);

    box-shadow:
        0 0 15px rgba(139,92,246,.16);
}

.fees-page .stat-value {
    color:#f8fafc;

    font-size:21px;
    font-weight:900;

    line-height:1;
}

.fees-page .stat-sub {
    color:#5f7088;

    font-size:9px;

    margin-top:6px;
}


/* =========================================================
   FILTER CARD
   ========================================================= */

.fees-page .filter-card {
    background:linear-gradient(
        145deg,
        #111b2a,
        #0d1521
    );

    border:1px solid #223149;

    border-radius:15px;

    padding:14px;

    margin-bottom:18px;

    box-shadow:
        0 10px 28px rgba(0,0,0,.14);
}

.fees-page .filter-form {
    display:grid;

    grid-template-columns:
        2fr 1fr 1fr auto;

    gap:10px;

    align-items:end;
}

.fees-page .form-group label {
    display:block;

    color:#607089;

    font-size:8px;
    font-weight:900;

    text-transform:uppercase;
    letter-spacing:.7px;

    margin-bottom:5px;
}

.fees-page .form-control {
    width:100%;
    height:38px;

    padding:0 11px;

    border-radius:8px;

    border:1px solid #26364d !important;

    background:#0d1725 !important;

    color:#dbe4f2 !important;

    outline:none;

    font-size:10px;

    transition:
        border-color .2s ease,
        box-shadow .2s ease,
        background .2s ease;
}

.fees-page .form-control:hover {
    border-color:#344760 !important;
}

.fees-page .form-control:focus {
    background:#0f1928 !important;

    border-color:#8b5cf6 !important;

    color:#fff !important;

    box-shadow:
        0 0 0 3px rgba(139,92,246,.10) !important;
}

.fees-page .form-control::placeholder {
    color:#53647c;
}

.fees-page select.form-control {
    appearance:auto;
}

.fees-page select.form-control option {
    background:#0f1826;
    color:#fff;
}


/* =========================================================
   TABLE CARD
   ========================================================= */

.fees-page .table-card {
    width:100%;

    background:linear-gradient(
        145deg,
        #111b2a,
        #0d1521
    );

    border:1px solid #223149;

    border-radius:15px;

    overflow:hidden;

    box-shadow:
        0 12px 30px rgba(0,0,0,.18);
}

.fees-page .table-header {
    min-height:60px;

    padding:13px 16px;

    border-bottom:1px solid #1e2b3e;

    display:flex;
    align-items:center;
    justify-content:space-between;

    gap:10px;
}

.fees-page .table-title {
    color:#f1f5f9;

    font-size:12px;
    font-weight:850;
}

.fees-page .record-count {
    color:#5f7088;

    font-size:9px;
}


/* =========================================================
   TABLE
   ========================================================= */

.fees-page .table-wrap {
    width:100%;
    overflow-x:auto;
}

.fees-page table {
    width:100%;

    min-width:1000px;

    border-collapse:collapse;

    margin:0;
}

.fees-page thead th {
    text-align:left;

    padding:11px 12px;

    background:#0d1725 !important;

    color:#607089;

    font-size:8px;

    text-transform:uppercase;
    letter-spacing:.7px;

    font-weight:900;

    white-space:nowrap;

    border-bottom:1px solid #1e2b3e;
}

.fees-page tbody td {
    padding:12px;

    border-top:1px solid #192638;

    color:#cbd5e1;

    font-size:10px;

    vertical-align:middle;
}

.fees-page tbody tr {
    transition:background .2s ease;
}

.fees-page tbody tr:hover {
    background:rgba(139,92,246,.035);
}


/* =========================================================
   STUDENT
   ========================================================= */

.fees-page .student-info {
    display:flex;
    flex-direction:column;
    gap:3px;
}

.fees-page .student-name {
    color:#dbe4f2;

    font-size:10px;
    font-weight:850;
}

.fees-page .student-code {
    color:#64758c;

    font-size:8px;
}


/* =========================================================
   AMOUNTS
   ========================================================= */

.fees-page .amount {
    color:#dbe4f2;

    font-size:10px;
    font-weight:850;
}

.fees-page .paid {
    color:#86efac;

    font-size:10px;
    font-weight:850;
}

.fees-page .remaining {
    color:#fbbf24;

    font-size:10px;
    font-weight:850;
}


/* =========================================================
   MONTH / DATE
   ========================================================= */

.fees-page .month-badge {
    display:inline-flex;

    align-items:center;

    gap:5px;

    padding:5px 8px;

    border-radius:7px;

    background:rgba(139,92,246,.09);

    border:1px solid rgba(139,92,246,.15);

    color:#a78bfa;

    font-size:8px;
    font-weight:900;

    white-space:nowrap;
}

.fees-page .date-badge {
    display:inline-flex;

    align-items:center;

    gap:5px;

    padding:5px 8px;

    border-radius:7px;

    background:rgba(34,211,238,.07);

    border:1px solid rgba(34,211,238,.14);

    color:#67e8f9;

    font-size:8px;
    font-weight:900;

    white-space:nowrap;
}


/* =========================================================
   STATUS
   ========================================================= */

.fees-page .badge {
    display:inline-flex;

    align-items:center;

    gap:5px;

    padding:5px 8px;

    border-radius:7px;

    font-size:8px;

    font-weight:900;

    text-transform:capitalize;

    white-space:nowrap;
}

.fees-page .badge::before {
    content:"";

    width:5px;
    height:5px;

    border-radius:50%;

    background:currentColor;

    box-shadow:0 0 5px currentColor;
}

.fees-page .badge-paid {
    color:#86efac;

    background:rgba(34,197,94,.09);

    border:1px solid rgba(34,197,94,.15);
}

.fees-page .badge-partial {
    color:#fcd34d;

    background:rgba(251,191,36,.08);

    border:1px solid rgba(251,191,36,.15);
}

.fees-page .badge-unpaid {
    color:#fb7185;

    background:rgba(244,63,94,.08);

    border:1px solid rgba(244,63,94,.15);
}

.fees-page .badge-overdue {
    color:#fb7185;

    background:rgba(244,63,94,.09);

    border:1px solid rgba(244,63,94,.16);
}


/* =========================================================
   ACTIONS
   ========================================================= */

.fees-page .actions {
    display:flex;

    gap:5px;

    align-items:center;
}

.fees-page .action-btn {
    width:30px;
    height:30px;

    border-radius:8px;

    display:inline-flex;

    align-items:center;
    justify-content:center;

    border:1px solid #2a3a51;

    background:#121e2f;

    color:#8494aa;

    text-decoration:none;

    cursor:pointer;

    font-size:11px;

    transition:
        transform .2s ease,
        background .2s ease,
        border-color .2s ease,
        color .2s ease,
        box-shadow .2s ease;
}

.fees-page .action-btn:hover {
    color:#fff;

    background:#1a2940;

    border-color:#40536d;

    transform:translateY(-2px);
}

.fees-page .action-btn.pay {
    color:#34d399;
}

.fees-page .action-btn.pay:hover {
    color:#6ee7b7;

    border-color:rgba(52,211,153,.35);

    box-shadow:
        0 0 12px rgba(52,211,153,.08);
}

.fees-page .action-btn.edit {
    color:#a78bfa;
}

.fees-page .action-btn.edit:hover {
    color:#c4b5fd;

    border-color:rgba(139,92,246,.35);

    box-shadow:
        0 0 12px rgba(139,92,246,.08);
}

.fees-page .action-btn.delete {
    color:#fb7185;
}

.fees-page .action-btn.delete:hover {
    color:#fda4af;

    border-color:rgba(244,63,94,.35);

    box-shadow:
        0 0 12px rgba(244,63,94,.08);
}

.fees-page .delete-form {
    display:inline;
}


/* =========================================================
   EMPTY STATE
   ========================================================= */

.fees-page .empty-state {
    text-align:center;

    padding:55px 20px;

    background:transparent;
}

.fees-page .empty-icon {
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

.fees-page .empty-state h3 {
    margin:0 0 5px;

    color:#dbe4f2;

    font-size:12px;

    font-weight:850;
}

.fees-page .empty-state p {
    margin:0;

    color:#64758c;

    font-size:9px;
}


/* =========================================================
   PAGINATION
   ========================================================= */

.fees-page .pagination-area {
    padding:13px 16px;

    border-top:1px solid #1e2b3e;

    display:flex;

    justify-content:space-between;

    align-items:center;

    gap:15px;

    background:#0d1623;
}

.fees-page .pagination-info {
    color:#5f7088;

    font-size:9px;
}

.fees-page .pagination {
    margin:0;
}

.fees-page .pagination nav {
    display:flex;
}

.fees-page .pagination ul {
    display:flex;

    gap:5px;

    margin:0;
    padding:0;

    list-style:none;
}

.fees-page .pagination li {
    list-style:none;
}

.fees-page .pagination a,
.fees-page .pagination span {
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

    transition:
        background .2s ease,
        border-color .2s ease,
        color .2s ease;
}

.fees-page .pagination a:hover {
    background:#1a2940;

    border-color:#40536d;

    color:#fff;
}

.fees-page .pagination .active span {
    background:linear-gradient(
        135deg,
        #6848e8,
        #8b5cf6
    );

    color:#fff;

    border-color:#8b5cf6;
}

.fees-page .pagination .disabled span {
    opacity:.45;
}


/* =========================================================
   DARK SCROLLBAR
   ========================================================= */

.fees-page .table-wrap::-webkit-scrollbar {
    height:7px;
}

.fees-page .table-wrap::-webkit-scrollbar-track {
    background:#0b1420;
}

.fees-page .table-wrap::-webkit-scrollbar-thumb {
    background:#26364d;
    border-radius:999px;
}

.fees-page .table-wrap::-webkit-scrollbar-thumb:hover {
    background:#3b4d68;
}


/* =========================================================
   MOBILE
   ========================================================= */

@media(max-width:1100px) {

    .fees-page .stats-grid {
        grid-template-columns:repeat(2,1fr);
    }

    .fees-page .filter-form {
        grid-template-columns:1fr 1fr;
    }
}


@media(max-width:767px) {

    body:has(.fees-page) .page-content {
        padding:15px 15px 0 15px !important;
    }

    .fees-page {
        min-height:calc(100vh - 80px);
    }

    .fees-page .page-header {
        align-items:flex-start;

        gap:12px;
    }

    .fees-page .page-title h1 {
        font-size:22px;
    }

    .fees-page .page-title p {
        font-size:10px;
    }

    .fees-page .page-title h1::before {
        font-size:8px;
    }

    .fees-page .header-actions {
        width:100%;
    }

    .fees-page .header-actions .btn {
        flex:1;
    }

    .fees-page .stats-grid {
        grid-template-columns:1fr 1fr;
    }

    .fees-page .filter-form {
        grid-template-columns:1fr;
    }

    .fees-page .table-card {
        border-radius:12px;
    }

    .fees-page .pagination-area {
        flex-direction:column;

        align-items:flex-start;
    }
}


@media(max-width:480px) {

    .fees-page .stats-grid {
        grid-template-columns:1fr;
    }
}

</style>


{{-- =========================================================
     MAIN FEE PAGE
     ========================================================= --}}

<div class="fees-page">


    {{-- =====================================================
         PAGE HEADER
    ====================================================== --}}

    <div class="page-header">

        <div class="page-title">

            <h1>
                Fee Management
            </h1>

            <p>
                Manage student fees, payments and outstanding balances.
            </p>

        </div>


        <div class="header-actions">

    {{-- FEE STRUCTURES --}}
    <a
        href="{{ route('fee-structures.index') }}"
        class="btn btn-secondary"
    >
        <i class="bi bi-wallet2"></i>
        Fee Structures
    </a>

{{-- RECEIVE PAYMENT --}}
<a
    href="{{ route('fee-payments.create') }}"
    class="btn btn-secondary"
    style="
        color:#34d399 !important;
        border-color:rgba(52,211,153,.25) !important;
    "
>
    <i class="bi bi-cash-coin"></i>
    Receive Payment
</a>

    {{-- GENERATE FEE --}}
    <a
        href="{{ route('fees.create') }}"
        class="btn btn-primary"
    >
        <i class="bi bi-plus-lg"></i>
        Generate Fee
    </a>

</div>

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
         STATISTICS
    ====================================================== --}}

    @php

        $totalPayable =
            \App\Models\Fee::sum('payable_amount');

        $totalPaid =
            \App\Models\Fee::sum('paid_amount');

        $totalRemaining =
            \App\Models\Fee::sum('remaining_amount');

        $paidCount =
            \App\Models\Fee::where(
                'status',
                'paid'
            )->count();

        $pendingCount =
            \App\Models\Fee::whereIn(
                'status',
                ['unpaid', 'partial']
            )->count();

        $overdueCount =
            \App\Models\Fee::where(
                'status',
                'overdue'
            )->count();

    @endphp


    <div class="stats-grid">


        {{-- TOTAL PAYABLE --}}

        <div class="stat-card">

            <div class="stat-top">

                <span class="stat-label">
                    Total Payable
                </span>

                <div class="stat-icon">
                    <i class="bi bi-cash-stack"></i>
                </div>

            </div>


            <div class="stat-value">

                Rs.
                {{ number_format($totalPayable, 0) }}

            </div>


            <div class="stat-sub">

                All generated fees

            </div>

        </div>


        {{-- TOTAL COLLECTED --}}

        <div class="stat-card">

            <div class="stat-top">

                <span class="stat-label">
                    Total Collected
                </span>

                <div class="stat-icon">
                    <i class="bi bi-check-circle"></i>
                </div>

            </div>


            <div class="stat-value">

                Rs.
                {{ number_format($totalPaid, 0) }}

            </div>


            <div class="stat-sub">

                {{ $paidCount }}
                fully paid

            </div>

        </div>


        {{-- OUTSTANDING --}}

        <div class="stat-card">

            <div class="stat-top">

                <span class="stat-label">
                    Outstanding
                </span>

                <div class="stat-icon">
                    <i class="bi bi-hourglass-split"></i>
                </div>

            </div>


            <div class="stat-value">

                Rs.
                {{ number_format($totalRemaining, 0) }}

            </div>


            <div class="stat-sub">

                {{ $pendingCount }}
                pending fees

            </div>

        </div>


        {{-- OVERDUE --}}

        <div class="stat-card">

            <div class="stat-top">

                <span class="stat-label">
                    Overdue
                </span>

                <div class="stat-icon">
                    <i class="bi bi-exclamation-triangle"></i>
                </div>

            </div>


            <div class="stat-value">

                {{ $overdueCount }}

            </div>


            <div class="stat-sub">

                Fees requiring attention

            </div>

        </div>

    </div>


    {{-- =====================================================
         FILTERS
    ====================================================== --}}

    <div class="filter-card">

        <form
            method="GET"
            action="{{ route('fees.index') }}"
            class="filter-form"
        >


            {{-- SEARCH --}}

            <div class="form-group">

                <label>
                    Search Student
                </label>

                <input
                    type="text"
                    name="search"
                    class="form-control"
                    placeholder="Name or student code..."
                    value="{{ request('search') }}"
                >

            </div>


            {{-- MONTH --}}

            <div class="form-group">

                <label>
                    Fee Month
                </label>

                <input
                    type="month"
                    name="month"
                    class="form-control"
                    value="{{ request('month') }}"
                >

            </div>


            {{-- STATUS --}}

            <div class="form-group">

                <label>
                    Status
                </label>

                <select
                    name="status"
                    class="form-control"
                >

                    <option value="">
                        All Status
                    </option>

                    <option
                        value="paid"
                        {{ request('status') === 'paid' ? 'selected' : '' }}
                    >
                        Paid
                    </option>

                    <option
                        value="partial"
                        {{ request('status') === 'partial' ? 'selected' : '' }}
                    >
                        Partial
                    </option>

                    <option
                        value="unpaid"
                        {{ request('status') === 'unpaid' ? 'selected' : '' }}
                    >
                        Unpaid
                    </option>

                    <option
                        value="overdue"
                        {{ request('status') === 'overdue' ? 'selected' : '' }}
                    >
                        Overdue
                    </option>

                </select>

            </div>


            {{-- FILTER BUTTON --}}

            <div class="form-group">

                <button
                    type="submit"
                    class="btn btn-primary"
                >

                    <i class="bi bi-search"></i>

                    Filter

                </button>

            </div>

        </form>

    </div>


    {{-- =====================================================
         FEES TABLE
    ====================================================== --}}

    <div class="table-card">


        {{-- TABLE HEADER --}}

        <div class="table-header">

            <div class="table-title">

                Student Fees

            </div>


            <div class="record-count">

                {{ $fees->total() }}
                records

            </div>

        </div>


        @if($fees->count())


            {{-- TABLE WRAPPER --}}

            <div class="table-wrap">

                <table>

                    <thead>

                        <tr>

                            <th>
                                Student
                            </th>

                            <th>
                                Month
                            </th>

                            <th>
                                Payable
                            </th>

                            <th>
                                Paid
                            </th>

                            <th>
                                Remaining
                            </th>

                            <th>
                                Due Date
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


                        @foreach($fees as $fee)

                            <tr>


                                {{-- STUDENT --}}

                                <td>

                                    <div class="student-info">

                                        <span class="student-name">

                                            {{ $fee->student->first_name ?? '' }}
                                            {{ $fee->student->last_name ?? '' }}

                                        </span>


                                        <span class="student-code">

                                            {{ $fee->student->student_code ?? 'N/A' }}

                                        </span>

                                    </div>

                                </td>


                                {{-- MONTH --}}

                                <td>

                                    <span class="month-badge">

                                        <i class="bi bi-calendar3"></i>

                                        {{ \Carbon\Carbon::createFromFormat(
                                            'Y-m',
                                            $fee->fee_month
                                        )->format('F Y') }}

                                    </span>

                                </td>


                                {{-- PAYABLE --}}

                                <td>

                                    <span class="amount">

                                        Rs.
                                        {{ number_format(
                                            $fee->payable_amount,
                                            0
                                        ) }}

                                    </span>

                                </td>


                                {{-- PAID --}}

                                <td>

                                    <span class="paid">

                                        Rs.
                                        {{ number_format(
                                            $fee->paid_amount,
                                            0
                                        ) }}

                                    </span>

                                </td>


                                {{-- REMAINING --}}

                                <td>

                                    <span class="remaining">

                                        Rs.
                                        {{ number_format(
                                            $fee->remaining_amount,
                                            0
                                        ) }}

                                    </span>

                                </td>


                                {{-- DUE DATE --}}

                                <td>

                                    @if($fee->due_date)

                                        <span class="date-badge">

                                            <i class="bi bi-calendar-event"></i>

                                            {{ $fee->due_date->format('d M Y') }}

                                        </span>

                                    @else

                                        <span style="color:#53647c;">
                                            —
                                        </span>

                                    @endif

                                </td>


                                {{-- STATUS --}}

                                <td>

                                    @php

                                        $statusClass = match(
                                            $fee->status
                                        ){

                                            'paid'
                                                => 'badge-paid',

                                            'partial'
                                                => 'badge-partial',

                                            'overdue'
                                                => 'badge-overdue',

                                            default
                                                => 'badge-unpaid',

                                        };

                                    @endphp


                                    <span
                                        class="badge {{ $statusClass }}"
                                    >

                                        {{ $fee->status }}

                                    </span>

                                </td>


                                {{-- ACTIONS --}}

                                <td>

                                    <div class="actions">


                                        {{-- VIEW --}}

                                        <a
                                            href="{{ route(
                                                'fees.show',
                                                $fee
                                            ) }}"

                                            class="action-btn"

                                            title="View Fee"
                                        >

                                            <i class="bi bi-eye-fill"></i>

                                        </a>


                                        {{-- PAYMENT --}}

                                        @if(
                                            $fee->remaining_amount > 0
                                        )

                                            <a
                                                href="{{ route(
                                                    'fees.payments.create',
                                                    $fee
                                                ) }}"

                                                class="action-btn pay"

                                                title="Receive Payment"
                                            >

                                                <i class="bi bi-cash-stack"></i>

                                            </a>

                                        @endif


                                        {{-- EDIT --}}

                                        <a
                                            href="{{ route(
                                                'fees.edit',
                                                $fee
                                            ) }}"

                                            class="action-btn edit"

                                            title="Edit Fee"
                                        >

                                            <i class="bi bi-pencil-square"></i>

                                        </a>


                                        {{-- DELETE --}}

                                        @if(
                                            !$fee->payments()->exists()
                                        )

                                            <form
                                                action="{{ route(
                                                    'fees.destroy',
                                                    $fee
                                                ) }}"

                                                method="POST"

                                                class="delete-form"

                                                onsubmit="return confirm(
                                                    'Are you sure you want to delete this fee?'
                                                );"
                                            >

                                                @csrf

                                                @method('DELETE')


                                                <button
                                                    type="submit"

                                                    class="action-btn delete"

                                                    title="Delete Fee"
                                                >

                                                    <i class="bi bi-trash3-fill"></i>

                                                </button>

                                            </form>

                                        @endif


                                    </div>

                                </td>


                            </tr>

                        @endforeach


                    </tbody>

                </table>

            </div>


            {{-- =================================================
                 PAGINATION
            ================================================== --}}

            <div class="pagination-area">

                <div class="pagination-info">

                    Showing

                    {{ $fees->firstItem() ?? 0 }}

                    -

                    {{ $fees->lastItem() ?? 0 }}

                    of

                    {{ $fees->total() }}

                </div>


                <div class="pagination">

                    {{ $fees->links() }}

                </div>

            </div>


        @else


            {{-- =================================================
                 EMPTY STATE
            ================================================== --}}

            <div class="empty-state">

                <div class="empty-icon">

                    <i class="bi bi-cash-stack"></i>

                </div>


                <h3>

                    No fees found

                </h3>


                <p>

                    No fee records match your current filters.

                </p>


                <div style="margin-top:18px;">

                    <a
                        href="{{ route('fees.create') }}"

                        class="btn btn-primary"
                    >

                        <i class="bi bi-plus-lg"></i>

                        Generate First Fee

                    </a>

                </div>

            </div>


        @endif


    </div>


</div>

@endsection