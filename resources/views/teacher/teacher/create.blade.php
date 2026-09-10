
@extends('layouts.app')

@section('title', 'Mark Attendance')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <div>
        <h1 class="fw-bold mb-1">Mark Attendance</h1>

        <p class="text-muted mb-0">
            Select your assigned class and mark student attendance.
        </p>
    </div>

    <a href="{{ route('teacher.attendance.index') }}"
       class="btn btn-secondary">
        Attendance History
    </a>

</div>


@if ($errors->any())

    <div class="alert alert-danger">

        <ul class="mb-0">

            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach

        </ul>

    </div>

@endif


<div class="card shadow-sm border-0">

    <div class="card-body p-4">

        <form id="attendanceForm"
              action="{{ route('teacher.attendance.store') }}"
              method="POST">

            @csrf

            <div class="row">

{{-- Class --}}

<div class="col-md-4 mb-3">

    <label class="form-label">
        Class
    </label>

    <select
        name="academy_class_id"
        id="academy_class_id"
        class="form-select"
        required
    >

        <option value="">
            Select Class
        </option>

        @forelse ($assignments->unique('academy_class_id') as $assignment)

            @if ($assignment->academyClass)

                <option value="{{ $assignment->academy_class_id }}">
                    {{ $assignment->academyClass->name }}
                </option>

            @endif

        @empty

            <option value="" disabled>
                No class assigned
            </option>

        @endforelse

    </select>

</div>


{{-- Group --}}

<div class="col-md-4 mb-3">

    <label class="form-label">
        Group
    </label>

    <select
        name="group_id"
        id="group_id"
        class="form-select"
    >

        <option value="">
            Select Group
        </option>

        @foreach ($assignments->unique('group_id') as $assignment)

            @if ($assignment->group)

                <option value="{{ $assignment->group_id }}">
                    {{ $assignment->group->name }}
                </option>

            @endif

        @endforeach

    </select>

</div>




                {{-- Date --}}

                <div class="col-md-4 mb-3">

                    <label class="form-label">
                        Attendance Date
                    </label>

                    <input
                        type="date"
                        name="attendance_date"
                        class="form-control"
                        value="{{ date('Y-m-d') }}"
                        required
                    >

                </div>

            </div>


            <hr class="my-4">


            <div id="studentsArea">

                <div class="text-center text-muted py-5">

                    Select a class to load students.

                </div>

            </div>


            <div id="submitArea" class="d-none">

                <button
                    type="submit"
                    class="btn btn-primary"
                >
                    Save Attendance
                </button>

            </div>

        </form>

    </div>

</div>


<script>

const classSelect = document.getElementById('academy_class_id');
const groupSelect = document.getElementById('group_id');
const studentsArea = document.getElementById('studentsArea');
const submitArea = document.getElementById('submitArea');

function loadStudents() {

    const classId = classSelect.value;
    const groupId = groupSelect.value;

    if (!classId) {

        studentsArea.innerHTML = `
            <div class="text-center text-muted py-5">
                Select a class to load students.
            </div>
        `;

        submitArea.classList.add('d-none');

        return;
    }


    studentsArea.innerHTML = `
        <div class="text-center py-5">
            Loading students...
        </div>
    `;


    let url = "{{ route('teacher.attendance.students') }}";
    url += "?academy_class_id=" + classId;

    if (groupId) {
        url += "&group_id=" + groupId;
    }


    fetch(url, {
        headers: {
            'Accept': 'application/json'
        }
    })

    .then(response => response.json())

    .then(students => {

        if (students.length === 0) {

            studentsArea.innerHTML = `
                <div class="alert alert-warning">
                    No active students found for this class/group.
                </div>
            `;

            submitArea.classList.add('d-none');

            return;
        }


        let html = `

            <h5 class="fw-bold mb-3">
                Students
            </h5>

            <div class="table-responsive">

                <table class="table table-bordered align-middle">

                    <thead class="table-dark">

                        <tr>
                            <th>#</th>
                            <th>Student</th>
                            <th>Status</th>
                        </tr>

                    </thead>

                    <tbody>
        `;


        students.forEach((student, index) => {

            html += `

                <tr>

                    <td>
                        ${index + 1}
                    </td>

                    <td>
                        ${student.first_name ?? ''}
                        ${student.last_name ?? ''}
                    </td>

                    <td>

                        <div class="btn-group">

                            <input
                                type="radio"
                                class="btn-check"
                                name="attendance[${student.id}]"
                                id="present_${student.id}"
                                value="present"
                                checked
                            >

                            <label
                                class="btn btn-outline-success"
                                for="present_${student.id}"
                            >
                                Present
                            </label>


                            <input
                                type="radio"
                                class="btn-check"
                                name="attendance[${student.id}]"
                                id="absent_${student.id}"
                                value="absent"
                            >

                            <label
                                class="btn btn-outline-danger"
                                for="absent_${student.id}"
                            >
                                Absent
                            </label>


                            <input
                                type="radio"
                                class="btn-check"
                                name="attendance[${student.id}]"
                                id="leave_${student.id}"
                                value="leave"
                            >

                            <label
                                class="btn btn-outline-warning"
                                for="leave_${student.id}"
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

        `;


        studentsArea.innerHTML = html;

        submitArea.classList.remove('d-none');

    })

    .catch(error => {

        console.error(error);

        studentsArea.innerHTML = `
            <div class="alert alert-danger">
                Unable to load students.
            </div>
        `;

        submitArea.classList.add('d-none');

    });

}


classSelect.addEventListener('change', loadStudents);
groupSelect.addEventListener('change', loadStudents);

</script>

@endsection
