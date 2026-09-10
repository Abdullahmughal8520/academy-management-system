@extends('layouts.app')

@section('title', 'Mark Attendance')

@section('content')

<style>
    /* =========================
       MARK ATTENDANCE PAGE
       ========================= */

    body:has(.mark-attendance-page) .main-wrapper,
    body:has(.mark-attendance-page) .page-content {
        background:#080e17 !important;
    }

    body:has(.mark-attendance-page) .page-content {
        padding:22px 24px 0 24px !important;
        min-height:calc(100vh - 76px) !important;
    }

    .mark-attendance-page {
        color:#edf3fb;
    }

    .mark-attendance-page * {
        box-sizing:border-box;
    }


    /* =========================
       PAGE HEADER
       ========================= */

    .attendance-page-header {
        display:flex;
        justify-content:space-between;
        align-items:center;
        margin-bottom:20px;
    }

    .attendance-kicker {
        font-size:10px;
        letter-spacing:1.7px;
        text-transform:uppercase;
        color:#a78bfa;
        font-weight:900;
        margin-bottom:4px;
    }

    .attendance-page-title {
        font-size:27px;
        line-height:1.15;
        font-weight:850;
        color:#f8fafc;
        margin:0;
    }

    .attendance-page-subtitle {
        font-size:12px;
        color:#718096;
        margin:5px 0 0;
    }


    /* =========================
       HISTORY BUTTON
       ========================= */

    .history-btn {
        display:inline-flex;
        align-items:center;
        justify-content:center;
        gap:5px;
        background:#0d1725;
        color:#9aa9bd;
        border:1px solid #26364d;
        padding:9px 14px;
        border-radius:9px;
        font-size:10px;
        font-weight:850;
        text-decoration:none;
        transition:
            transform .25s ease,
            background .25s ease,
            border-color .25s ease,
            color .25s ease,
            box-shadow .25s ease;
    }

    .history-btn:hover {
        color:#dbe4f2;
        background:#111c2c;
        border-color:#3a4c65;
        transform:translateY(-2px);
        box-shadow:0 8px 20px rgba(0,0,0,.18);
    }

    .history-btn i {
        transition:transform .25s ease;
    }

    .history-btn:hover i {
        transform:rotate(-12deg) scale(1.08);
        filter:drop-shadow(0 0 5px rgba(167,139,250,.55));
    }


    /* =========================
       MAIN ATTENDANCE CARD
       ========================= */

    .attendance-main-card {
        background:linear-gradient(145deg,#111b2a,#0d1521);
        border:1px solid #223149;
        border-radius:15px;
        box-shadow:0 12px 30px rgba(0,0,0,.12);
        overflow:hidden;
    }

    .card-section-header {
        padding:15px 17px;
        border-bottom:1px solid #1e2b3e;
    }

    .section-title {
        font-size:12px;
        font-weight:850;
        color:#eef3fb;
        margin:0;
    }

    .section-subtitle {
        font-size:9px;
        color:#687890;
        margin:3px 0 0;
    }

    .card-body-custom {
        padding:18px;
    }


    /* =========================
       FORM
       ========================= */

    .form-label-custom {
        display:block;
        font-size:9px;
        font-weight:850;
        color:#cbd5e1;
        margin-bottom:7px;
        text-transform:uppercase;
        letter-spacing:.45px;
    }

    .form-select-custom,
    .form-control-custom {
        min-height:42px;
        width:100%;
        background:#0d1725 !important;
        border:1px solid #26364d !important;
        border-radius:9px;
        padding:9px 11px;
        font-size:10px;
        color:#dbe4f2 !important;
        box-shadow:none !important;
        transition:
            border-color .2s ease,
            box-shadow .2s ease,
            background .2s ease;
    }

    .form-select-custom:focus,
    .form-control-custom:focus {
        background:#0e1929 !important;
        border-color:#8b5cf6 !important;
        color:#f1f5f9 !important;
        box-shadow:
            0 0 0 .18rem rgba(139,92,246,.10) !important;
        outline:none;
    }

    .form-select-custom:disabled {
        background:#0a111d !important;
        color:#56667c !important;
        border-color:#1d2a3d !important;
        cursor:not-allowed;
    }

    .form-select-custom option {
        background:#0d1725;
        color:#dbe4f2;
    }

    .form-control-custom::-webkit-calendar-picker-indicator {
        filter:invert(1) opacity(.55);
        cursor:pointer;
    }


    /* =========================
       INFO BOX
       ========================= */

    .attendance-info-box {
        background:rgba(139,92,246,.07);
        border:1px solid rgba(139,92,246,.16);
        border-radius:9px;
        padding:10px 12px;
        color:#a78bfa;
        font-size:9px;
    }

    .attendance-info-box i {
        color:#8b5cf6;
        filter:drop-shadow(0 0 5px rgba(139,92,246,.45));
    }


    /* =========================
       STUDENTS CARD
       ========================= */

    .students-card {
        margin-top:18px;
        border:1px solid #223149;
        border-radius:12px;
        overflow:hidden;
        background:linear-gradient(145deg,#111b2a,#0d1521);
    }

    .students-header {
        padding:13px 15px;
        background:#0d1725;
        border-bottom:1px solid #1e2b3e;
    }

    .students-title {
        font-size:11px;
        font-weight:850;
        color:#eef3fb;
        margin:0;
    }

    .students-title i {
        color:#a78bfa;
    }

    .students-subtitle {
        font-size:8px;
        color:#64758c;
        margin:3px 0 0;
    }


    /* =========================
       STUDENTS TABLE
       ========================= */

    .students-table {
        width:100%;
        margin:0;
        border-collapse:collapse;
        --bs-table-bg:transparent !important;
        --bs-table-color:#cbd5e1 !important;
        --bs-table-border-color:#1a2637 !important;
        --bs-table-hover-bg:rgba(139,92,246,.035) !important;
        --bs-table-hover-color:#dbe4f2 !important;
    }

    .students-table > :not(caption) > * > * {
        background-color:transparent !important;
        color:#cbd5e1 !important;
        border-bottom-color:#1a2637 !important;
        box-shadow:none !important;
    }

    .students-table thead th {
        background:#0d1725 !important;
        color:#607089 !important;
        font-size:8px;
        font-weight:900;
        text-transform:uppercase;
        letter-spacing:.6px;
        padding:10px 12px;
        border-bottom:1px solid #223149 !important;
        white-space:nowrap;
    }

    .students-table tbody td {
        padding:11px 12px;
        font-size:9px;
        color:#cbd5e1 !important;
        border-bottom:1px solid #1a2637 !important;
        vertical-align:middle;
    }

    .students-table tbody tr {
        transition:background .2s ease;
    }

    .students-table tbody tr:hover {
        background:rgba(139,92,246,.035) !important;
    }

    .students-table tbody tr:last-child td {
        border-bottom:0 !important;
    }


    /* =========================
       STUDENT NUMBER
       ========================= */

    .student-number {
        color:#64758c;
        font-weight:850;
        font-size:9px;
    }


    /* =========================
       STUDENT CODE
       ========================= */

    .student-code {
        display:inline-flex;
        align-items:center;
        background:#162437;
        border:1px solid #26364d;
        color:#7dd3fc;
        padding:4px 7px;
        border-radius:6px;
        font-size:8px;
        font-weight:850;
        letter-spacing:.25px;
    }


    /* =========================
       STUDENT NAME
       ========================= */

    .student-name {
        color:#dbe4f2;
        font-size:9px;
        font-weight:800;
    }


    /* =========================
       ATTENDANCE OPTIONS
       ========================= */

    .attendance-options {
        display:flex;
        align-items:center;
        gap:15px;
        flex-wrap:wrap;
    }

    .attendance-option {
        display:flex;
        align-items:center;
        gap:5px;
        cursor:pointer;
        font-size:8px;
        font-weight:850;
        transition:color .2s ease;
    }

    .attendance-option input {
        width:13px;
        height:13px;
        margin:0;
        cursor:pointer;
        accent-color:#8b5cf6;
        background:#0d1725;
        border-color:#334155;
    }

    .attendance-option.present {
        color:#4ade80;
    }

    .attendance-option.absent {
        color:#fb7185;
    }

    .attendance-option.leave {
        color:#fbbf24;
    }

    .attendance-option.present input {
        accent-color:#22c55e;
    }

    .attendance-option.absent input {
        accent-color:#f43f5e;
    }

    .attendance-option.leave input {
        accent-color:#f59e0b;
    }


    /* =========================
       SAVE BUTTON
       ========================= */

    .save-container {
        margin-top:18px;
        display:flex;
        justify-content:flex-end;
    }

    .save-btn {
        position:relative;
        overflow:hidden;
        display:inline-flex;
        align-items:center;
        justify-content:center;
        gap:5px;
        background:linear-gradient(135deg,#6848e8,#8b5cf6);
        border:1px solid rgba(167,139,250,.45);
        color:#fff;
        padding:10px 17px;
        border-radius:9px;
        font-size:10px;
        font-weight:850;
        box-shadow:0 8px 20px rgba(124,58,237,.20);
        transition:
            transform .25s ease,
            box-shadow .25s ease,
            border-color .25s ease;
    }

    .save-btn::before {
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

    .save-btn:hover {
        color:#fff;
        transform:translateY(-3px);
        border-color:rgba(196,181,253,.75);
        box-shadow:
            0 12px 28px rgba(124,58,237,.30),
            0 0 18px rgba(139,92,246,.10);
    }

    .save-btn:hover::before {
        left:140%;
    }

    .save-btn i {
        transition:transform .25s ease;
    }

    .save-btn:hover i {
        transform:scale(1.08);
        filter:drop-shadow(0 0 5px rgba(255,255,255,.55));
    }


    /* =========================
       LOADING BOX
       ========================= */

    .loading-box {
        background:#0d1725;
        color:#64758c;
        border:1px solid #1e2b3e;
        border-radius:9px;
        padding:14px;
        font-size:9px;
    }

    .loading-box i {
        color:#a78bfa;
    }


    /* =========================
       WARNING
       ========================= */

    .warning-box {
        background:rgba(245,158,11,.07);
        color:#fbbf24;
        border:1px solid rgba(245,158,11,.18);
        border-radius:10px;
        padding:15px;
        font-size:10px;
    }

    .warning-box i {
        color:#f59e0b;
        filter:drop-shadow(0 0 5px rgba(245,158,11,.40));
    }


    /* =========================
       ERROR
       ========================= */

    .error-box {
        background:rgba(244,63,94,.07);
        color:#fb7185;
        border:1px solid rgba(244,63,94,.18);
        border-radius:10px;
        padding:12px 14px;
        font-size:9px;
    }

    .error-box i {
        color:#f43f5e;
        filter:drop-shadow(0 0 5px rgba(244,63,94,.40));
    }

    .error-box ul {
        padding-left:18px;
        margin-top:6px !important;
    }


    /* =========================
       NO STUDENTS
       ========================= */

    .no-students-box {
        background:rgba(245,158,11,.07);
        color:#fbbf24;
        border:1px solid rgba(245,158,11,.18);
        border-radius:10px;
        padding:13px;
        font-size:9px;
    }

    .no-students-box i {
        color:#f59e0b;
    }


    /* =========================
       RESPONSIVE
       ========================= */

    @media(max-width:767px) {

        body:has(.mark-attendance-page) .page-content {
            padding:20px 15px !important;
        }

        .attendance-page-header {
            align-items:flex-start;
            gap:12px;
        }

        .attendance-page-title {
            font-size:22px;
        }

        .attendance-page-subtitle {
            font-size:10px;
        }

        .history-btn {
            white-space:nowrap;
            padding:8px 11px;
        }

        .card-body-custom {
            padding:15px;
        }

        .attendance-options {
            gap:10px;
        }

        .save-container {
            justify-content:stretch;
        }

        .save-btn {
            width:100%;
        }
    }
</style>


<div class="mark-attendance-page">

    {{-- PAGE HEADER --}}
    <div class="attendance-page-header">

        <div>

            <div class="attendance-kicker">
                Teacher Portal
            </div>

            <h1 class="attendance-page-title">
                Mark Attendance
            </h1>

            <p class="attendance-page-subtitle">
                Select a class and group to record student attendance.
            </p>

        </div>


        <a
            href="{{ route('teacher.attendance.index') }}"
            class="history-btn"
        >
            <i class="bi bi-clock-history"></i>
            Attendance History
        </a>

    </div>


    {{-- VALIDATION ERRORS --}}
    @if($errors->any())

        <div class="error-box mb-3">

            <div class="fw-bold mb-1">
                <i class="bi bi-exclamation-circle-fill me-1"></i>
                Please fix the following errors:
            </div>

            <ul class="mb-0">

                @foreach($errors->all() as $error)

                    <li>
                        {{ $error }}
                    </li>

                @endforeach

            </ul>

        </div>

    @endif


    @if($assignments->isEmpty())

        {{-- NO ASSIGNMENTS --}}
        <div class="warning-box">

            <div class="fw-bold mb-1">
                <i class="bi bi-exclamation-triangle-fill me-1"></i>
                No Teacher Assignments
            </div>

            <div>
                You have no teacher assignments yet.
                Please contact the administrator.
            </div>

        </div>

    @else

        @php
            $groupsByClass = $assignments
                ->groupBy('academy_class_id')
                ->map(function ($classAssignments) {
                    return $classAssignments
                        ->filter(fn ($assignment) => $assignment->group)
                        ->map(function ($assignment) {
                            return [
                                'id' => $assignment->group_id,
                                'name' => $assignment->group->name,
                            ];
                        })
                        ->unique('id')
                        ->values();
                });
        @endphp


        {{-- ATTENDANCE FORM --}}
        <div class="attendance-main-card">

            <div class="card-section-header">

                <h2 class="section-title">
                    Attendance Information
                </h2>

                <p class="section-subtitle">
                    Choose the class, group and date before loading students.
                </p>

            </div>


            <div class="card-body-custom">

                <form
                    action="{{ route('teacher.attendance.store') }}"
                    method="POST"
                    id="attendanceForm"
                >

                    @csrf


                    <div class="row g-3">

                        {{-- CLASS --}}
                        <div class="col-md-4">

                            <label
                                for="academy_class_id"
                                class="form-label-custom"
                            >
                                Class
                            </label>

                            <select
                                name="academy_class_id"
                                id="academy_class_id"
                                class="form-select form-select-custom"
                                required
                            >

                                <option value="">
                                    Select Class
                                </option>

                                @foreach($assignments->unique('academy_class_id') as $assignment)

                                    <option value="{{ $assignment->academy_class_id }}">

                                        {{ $assignment->academyClass->name ?? 'Class' }}

                                    </option>

                                @endforeach

                            </select>

                        </div>


                        {{-- GROUP --}}
                        <div class="col-md-4">

                            <label
                                for="group_id"
                                class="form-label-custom"
                            >
                                Group
                            </label>

                            <select
                                name="group_id"
                                id="group_id"
                                class="form-select form-select-custom"
                                required
                                disabled
                            >

                                <option value="">
                                    Select Class First
                                </option>

                            </select>

                        </div>


                        {{-- DATE --}}
                        <div class="col-md-4">

                            <label
                                for="attendance_date"
                                class="form-label-custom"
                            >
                                Attendance Date
                            </label>

                            <input
                                type="date"
                                name="attendance_date"
                                id="attendance_date"
                                class="form-control form-control-custom"
                                value="{{ old('attendance_date', date('Y-m-d')) }}"
                                required
                            >

                        </div>

                    </div>


                    {{-- INFO --}}
                    <div class="attendance-info-box mt-3">

                        <i class="bi bi-info-circle-fill me-1"></i>

                        Select a class and group to load the students assigned to you.

                    </div>


                    {{-- STUDENTS --}}
                    <div id="studentsContainer" class="mt-3">

                        <div class="loading-box">

                            <i class="bi bi-people me-1"></i>

                            Select a class and group to load students.

                        </div>

                    </div>


                    {{-- SUBMIT --}}
                    <div
                        id="submitContainer"
                        class="save-container"
                        style="display:none;"
                    >

                        <button
                            type="submit"
                            class="btn save-btn"
                        >

                            <i class="bi bi-check2-circle"></i>

                            Save Attendance

                        </button>

                    </div>

                </form>

            </div>

        </div>

    @endif

</div>

@endsection


@section('scripts')

<script>

document.addEventListener('DOMContentLoaded', function () {

    const classSelect = document.getElementById('academy_class_id');
    const groupSelect = document.getElementById('group_id');
    const studentsContainer = document.getElementById('studentsContainer');
    const submitContainer = document.getElementById('submitContainer');


    if (!classSelect) {
        return;
    }


    const groupsByClass = @json($groupsByClass ?? []);


    function resetStudents() {

        studentsContainer.innerHTML = `
            <div class="loading-box">
                <i class="bi bi-people me-1"></i>
                Select a class and group to load students.
            </div>
        `;

        submitContainer.style.display = 'none';

    }


    function loadGroups() {

        const classId = classSelect.value;


        groupSelect.innerHTML = `
            <option value="">
                Select Group
            </option>
        `;


        groupSelect.disabled = true;


        if (!classId) {

            resetStudents();

            groupSelect.innerHTML = `
                <option value="">
                    Select Class First
                </option>
            `;

            return;
        }


        const groups = groupsByClass[classId] || [];


        if (!groups.length) {

            groupSelect.innerHTML = `
                <option value="">
                    No Group Assigned
                </option>
            `;

            resetStudents();

            return;
        }


        groups.forEach(function (group) {

            const option = document.createElement('option');

            option.value = group.id;
            option.textContent = group.name;

            groupSelect.appendChild(option);

        });


        groupSelect.disabled = false;

        resetStudents();

    }


    function loadStudents() {

        const classId = classSelect.value;
        const groupId = groupSelect.value;


        if (!classId || !groupId) {

            resetStudents();

            return;
        }


        studentsContainer.innerHTML = `
            <div class="loading-box">
                <i class="bi bi-arrow-repeat me-1"></i>
                Loading students...
            </div>
        `;


        submitContainer.style.display = 'none';


        let url = "{{ route('teacher.attendance.students') }}";

        url += "?academy_class_id=" + encodeURIComponent(classId);
        url += "&group_id=" + encodeURIComponent(groupId);


        fetch(url)

            .then(response => {

                if (!response.ok) {
                    throw new Error('Unable to load students.');
                }

                return response.json();

            })

            .then(students => {

                if (!students.length) {

                    studentsContainer.innerHTML = `
                        <div class="no-students-box">
                            <i class="bi bi-person-x-fill me-1"></i>
                            No active students found for this class/group.
                        </div>
                    `;

                    submitContainer.style.display = 'none';

                    return;
                }


                let html = `

                    <div class="students-card">

                        <div class="students-header">

                            <h3 class="students-title">
                                <i class="bi bi-people-fill me-1"></i>
                                Students
                            </h3>

                            <p class="students-subtitle">
                                Mark the attendance status for each student.
                            </p>

                        </div>

                        <div class="table-responsive">

                            <table class="table students-table align-middle">

                                <thead>

                                    <tr>
                                        <th>#</th>
                                        <th>Student Code</th>
                                        <th>Student Name</th>
                                        <th>Attendance</th>
                                    </tr>

                                </thead>

                                <tbody>
                `;


                students.forEach(function (student, index) {

                    html += `

                        <tr>

                            <td>
                                <span class="student-number">
                                    ${index + 1}
                                </span>
                            </td>

                            <td>
                                <span class="student-code">
                                    ${student.student_code}
                                </span>
                            </td>

                            <td>
                                <span class="student-name">
                                    ${student.first_name}
                                    ${student.last_name ?? ''}
                                </span>
                            </td>

                            <td>

                                <div class="attendance-options">

                                    <label class="attendance-option present">

                                        <input
                                            class="form-check-input"
                                            type="radio"
                                            name="attendance[${student.id}]"
                                            value="present"
                                            id="present_${student.id}"
                                            checked
                                        >

                                        Present

                                    </label>


                                    <label class="attendance-option absent">

                                        <input
                                            class="form-check-input"
                                            type="radio"
                                            name="attendance[${student.id}]"
                                            value="absent"
                                            id="absent_${student.id}"
                                        >

                                        Absent

                                    </label>


                                    <label class="attendance-option leave">

                                        <input
                                            class="form-check-input"
                                            type="radio"
                                            name="attendance[${student.id}]"
                                            value="leave"
                                            id="leave_${student.id}"
                                        >

                                        Leave

                                    </label>

                                </div>

                            </td>

                        </tr>

                    `;

                });


                html += `

                                </tbody>

                            </table>

                        </div>

                    </div>

                `;


                studentsContainer.innerHTML = html;

                submitContainer.style.display = 'flex';

            })

            .catch(error => {

                studentsContainer.innerHTML = `

                    <div class="error-box">

                        <i class="bi bi-exclamation-circle-fill me-1"></i>

                        ${error.message}

                    </div>

                `;

                submitContainer.style.display = 'none';

            });

    }


    classSelect.addEventListener('change', loadGroups);

    groupSelect.addEventListener('change', loadStudents);

});

</script>

@endsection