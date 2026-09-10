<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use App\Models\Attendance;
use App\Models\Result;
use App\Models\Fee;
use Carbon\Carbon;

class StudentDashboardController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Student Dashboard
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        $student = auth()->user()->student;

        if (!$student) {
            abort(404, 'Student profile not found.');
        }

        /*
        |--------------------------------------------------------------------------
        | Attendance
        |--------------------------------------------------------------------------
        */

        $attendances = Attendance::where(
            'student_id',
            $student->id
        );

        $attendanceTotal = (clone $attendances)->count();

        $attendancePresent = (clone $attendances)
            ->whereIn('status', ['present', 'late'])
            ->count();

        $attendanceAbsent = (clone $attendances)
            ->where('status', 'absent')
            ->count();

        $attendanceLeave = (clone $attendances)
            ->where('status', 'leave')
            ->count();

        $attendanceRate = $attendanceTotal
            ? round(
                ($attendancePresent / $attendanceTotal) * 100,
                1
            )
            : 0;


        /*
        |--------------------------------------------------------------------------
        | Attendance Trend
        |--------------------------------------------------------------------------
        */

        $attendanceTrend = collect(range(6, 0))
            ->map(function ($daysAgo) use ($student) {

                $date = Carbon::today()->subDays($daysAgo);

                $total = Attendance::where(
                    'student_id',
                    $student->id
                )
                ->whereDate(
                    'attendance_date',
                    $date
                )
                ->count();

                $present = Attendance::where(
                    'student_id',
                    $student->id
                )
                ->whereDate(
                    'attendance_date',
                    $date
                )
                ->whereIn(
                    'status',
                    ['present', 'late']
                )
                ->count();

                return [
                    'label' => $date->format('D'),
                    'rate' => $total
                        ? round(
                            ($present / $total) * 100,
                            1
                        )
                        : 0,
                ];
            })
            ->values();


        /*
        |--------------------------------------------------------------------------
        | Schedules
        |--------------------------------------------------------------------------
        */

        $schedules = Schedule::with([
            'teacherAssignment.teacher',
            'teacherAssignment.academyClass',
            'teacherAssignment.group',
            'teacherAssignment.subject',
        ])
        ->where('status', 'active')
        ->whereHas(
            'teacherAssignment',
            function ($query) use ($student) {

                $query
                    ->where(
                        'academy_class_id',
                        $student->academy_class_id
                    )
                    ->where(
                        'group_id',
                        $student->group_id
                    );
            }
        )
        ->orderBy('start_time')
        ->get();


        /*
        |--------------------------------------------------------------------------
        | Today's Schedule
        |--------------------------------------------------------------------------
        */

        $today = now()->format('l');

        $todaySchedules = $schedules
            ->filter(
                fn ($schedule) =>
                    strtolower($schedule->day) ===
                    strtolower($today)
            )
            ->values();


        /*
        |--------------------------------------------------------------------------
        | Subjects
        |--------------------------------------------------------------------------
        */

        $subjects = $schedules
            ->pluck('teacherAssignment.subject')
            ->filter()
            ->unique('id')
            ->values();


        /*
        |--------------------------------------------------------------------------
        | Current Fee
        |--------------------------------------------------------------------------
        */

        $currentFee = Fee::with([
            'feeStructure'
        ])
        ->where(
            'student_id',
            $student->id
        )
        ->latest('fee_month')
        ->first();


        /*
        |--------------------------------------------------------------------------
        | Pending Fees
        |--------------------------------------------------------------------------
        */

        $pendingFees = Fee::where(
            'student_id',
            $student->id
        )
        ->where(
            'remaining_amount',
            '>',
            0
        )
        ->orderByDesc('fee_month')
        ->get();


        $totalPendingFee = $pendingFees->sum(
            'remaining_amount'
        );


        return view(
            'students.dashboard',
            compact(
                'student',
                'attendanceRate',
                'attendanceTotal',
                'attendancePresent',
                'attendanceAbsent',
                'attendanceLeave',
                'attendanceTrend',
                'schedules',
                'todaySchedules',
                'subjects',
                'currentFee',
                'pendingFees',
                'totalPendingFee'
            )
        );
    }


    /*
    |--------------------------------------------------------------------------
    | Academic Overview
    |--------------------------------------------------------------------------
    */

    public function academicOverview()
    {
        $student = auth()->user()->student;

        if (!$student) {
            abort(404, 'Student profile not found.');
        }


        /*
        |--------------------------------------------------------------------------
        | Schedules
        |--------------------------------------------------------------------------
        */

        $schedules = Schedule::with([
            'teacherAssignment.teacher',
            'teacherAssignment.academyClass',
            'teacherAssignment.group',
            'teacherAssignment.subject',
        ])
        ->where('status', 'active')
        ->whereHas(
            'teacherAssignment',
            function ($query) use ($student) {

                $query
                    ->where(
                        'academy_class_id',
                        $student->academy_class_id
                    )
                    ->where(
                        'group_id',
                        $student->group_id
                    );
            }
        )
        ->orderBy('start_time')
        ->get();


        /*
        |--------------------------------------------------------------------------
        | Subjects
        |--------------------------------------------------------------------------
        */

        $subjects = $schedules
            ->pluck('teacherAssignment.subject')
            ->filter()
            ->unique('id')
            ->values();


        /*
        |--------------------------------------------------------------------------
        | Teachers
        |--------------------------------------------------------------------------
        */

        $teachers = $schedules
            ->pluck('teacherAssignment.teacher')
            ->filter()
            ->unique('id')
            ->values();


        /*
        |--------------------------------------------------------------------------
        | Attendance
        |--------------------------------------------------------------------------
        */

        $attendances = Attendance::where(
            'student_id',
            $student->id
        )->get();

        $attendanceTotal = $attendances->count();

        $attendancePresent = $attendances
            ->whereIn(
                'status',
                ['present', 'late']
            )
            ->count();

        $attendanceAbsent = $attendances
            ->where(
                'status',
                'absent'
            )
            ->count();

        $attendanceLeave = $attendances
            ->where(
                'status',
                'leave'
            )
            ->count();

        $attendanceRate = $attendanceTotal
            ? round(
                ($attendancePresent / $attendanceTotal) * 100,
                1
            )
            : 0;


        /*
        |--------------------------------------------------------------------------
        | Results
        |--------------------------------------------------------------------------
        */

        $results = Result::with([
            'exam',
            'items.subject'
        ])
        ->where(
            'student_id',
            $student->id
        )
        ->latest()
        ->get();


        /*
        |--------------------------------------------------------------------------
        | Today's Classes
        |--------------------------------------------------------------------------
        */

        $today = now()->format('l');

        $todaySchedules = $schedules
            ->filter(
                fn ($schedule) =>
                    strtolower($schedule->day) ===
                    strtolower($today)
            )
            ->values();


        /*
        |--------------------------------------------------------------------------
        | Return View
        |--------------------------------------------------------------------------
        */

        return view(
            'students.academic-overview',
            compact(
                'student',
                'schedules',
                'subjects',
                'teachers',
                'attendances',
                'attendanceTotal',
                'attendancePresent',
                'attendanceAbsent',
                'attendanceLeave',
                'attendanceRate',
                'results',
                'todaySchedules'
            )
        );
    }


    /*
    |--------------------------------------------------------------------------
    | Student Fees
    |--------------------------------------------------------------------------
    */

    public function fees()
    {
        $student = auth()->user()->student;

        if (!$student) {
            abort(404, 'Student profile not found.');
        }

        $fees = Fee::with([
            'feeStructure',
            'payments'
        ])
        ->where(
            'student_id',
            $student->id
        )
        ->orderByDesc('fee_month')
        ->get();

        $currentFee = $fees->first();

        $totalPayable = $fees->sum(
            'payable_amount'
        );

        $totalPaid = $fees->sum(
            'paid_amount'
        );

        $totalPending = $fees->sum(
            'remaining_amount'
        );

        $pendingFees = $fees->where(
            'remaining_amount',
            '>',
            0
        );

        return view(
            'students.fees',
            compact(
                'student',
                'fees',
                'currentFee',
                'totalPayable',
                'totalPaid',
                'totalPending',
                'pendingFees'
            )
        );
    }


    /*
    |--------------------------------------------------------------------------
    | Student Timetable
    |--------------------------------------------------------------------------
    */

    public function timetable()
    {
        $student = auth()->user()->student;

        if (!$student) {
            abort(404, 'Student profile not found.');
        }

        $schedules = Schedule::with([
            'teacherAssignment.teacher',
            'teacherAssignment.academyClass',
            'teacherAssignment.group',
            'teacherAssignment.subject',
        ])
        ->where('status', 'active')
        ->whereHas(
            'teacherAssignment',
            function ($query) use ($student) {

                $query
                    ->where(
                        'academy_class_id',
                        $student->academy_class_id
                    )
                    ->where(
                        'group_id',
                        $student->group_id
                    );
            }
        )
        ->orderBy('start_time')
        ->get()
        ->groupBy('day');

        $days = [
            'Monday',
            'Tuesday',
            'Wednesday',
            'Thursday',
            'Friday',
            'Saturday',
            'Sunday'
        ];

        return view(
            'students.timetable',
            compact(
                'student',
                'schedules',
                'days'
            )
        );
    }


    /*
    |--------------------------------------------------------------------------
    | Student Attendance
    |--------------------------------------------------------------------------
    */

    public function attendance()
    {
        $student = auth()->user()->student;

        if (!$student) {
            abort(404, 'Student profile not found.');
        }

        $attendances = Attendance::where(
            'student_id',
            $student->id
        )
        ->orderByDesc('attendance_date')
        ->get();

        $attendanceTotal = $attendances->count();

        $attendancePresent = $attendances
            ->whereIn(
                'status',
                ['present', 'late']
            )
            ->count();

        $attendanceAbsent = $attendances
            ->where(
                'status',
                'absent'
            )
            ->count();

        $attendanceLeave = $attendances
            ->where(
                'status',
                'leave'
            )
            ->count();

        $attendanceRate = $attendanceTotal
            ? round(
                ($attendancePresent / $attendanceTotal) * 100,
                1
            )
            : 0;

        return view(
            'students.attendance',
            compact(
                'student',
                'attendances',
                'attendanceRate',
                'attendanceTotal',
                'attendancePresent',
                'attendanceAbsent',
                'attendanceLeave'
            )
        );
    }


    /*
    |--------------------------------------------------------------------------
    | Student Subjects
    |--------------------------------------------------------------------------
    */

    public function subjects()
    {
        $student = auth()->user()->student;

        if (!$student) {
            abort(404, 'Student profile not found.');
        }

        $schedules = Schedule::with([
            'teacherAssignment.teacher',
            'teacherAssignment.academyClass',
            'teacherAssignment.group',
            'teacherAssignment.subject',
        ])
        ->where('status', 'active')
        ->whereHas(
            'teacherAssignment',
            function ($query) use ($student) {

                $query
                    ->where(
                        'academy_class_id',
                        $student->academy_class_id
                    )
                    ->where(
                        'group_id',
                        $student->group_id
                    );
            }
        )
        ->orderBy('start_time')
        ->get();

        $subjects = $schedules
            ->pluck('teacherAssignment.subject')
            ->filter()
            ->unique('id')
            ->values();

        return view(
            'students.subjects',
            compact(
                'student',
                'subjects',
                'schedules'
            )
        );
    }


    /*
    |--------------------------------------------------------------------------
    | Student Results
    |--------------------------------------------------------------------------
    */

    public function results()
    {
        $student = auth()->user()->student;

        if (!$student) {
            abort(404, 'Student profile not found.');
        }

        $results = Result::with([
            'exam',
            'items.subject'
        ])
        ->where(
            'student_id',
            $student->id
        )
        ->latest()
        ->get();

        return view(
            'students.results',
            compact(
                'student',
                'results'
            )
        );
    }
}