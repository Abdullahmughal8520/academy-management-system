<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Teacher;
use App\Models\Course;
use App\Models\AcademyClass;
use App\Models\Group;
use App\Models\Subject;
use App\Models\TeacherAssignment;
use App\Models\Schedule;
use App\Models\Attendance;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $studentsCount = Student::where('status', 'active')->count();
        $teachersCount = Teacher::where('status', 'active')->count();
        $classesCount = AcademyClass::where('status', 'active')->count();
        $groupsCount = Group::where('status', 'active')->count();
        $subjectsCount = Subject::where('status', 'active')->count();
        $coursesCount = Course::count();
        $assignmentsCount = TeacherAssignment::count();
        $schedulesCount = Schedule::where('status', 'active')->count();

        $todayAttendance = Attendance::whereDate('attendance_date', today());
        $attendanceTotal = (clone $todayAttendance)->count();
        $attendancePresent = (clone $todayAttendance)->where('status', 'present')->count();
        $attendanceLate = (clone $todayAttendance)->where('status', 'late')->count();
        $attendanceAbsent = (clone $todayAttendance)->where('status', 'absent')->count();
        $attendanceRate = $attendanceTotal
            ? round((($attendancePresent + $attendanceLate) / $attendanceTotal) * 100, 1)
            : 0;

        $months = collect(range(5, 0))->map(function ($monthsAgo) {
            $date = Carbon::now()->subMonths($monthsAgo);
            return [
                'label' => $date->format('M'),
                'start' => $date->copy()->startOfMonth(),
                'end' => $date->copy()->endOfMonth(),
            ];
        });

        $enrollmentTrend = $months->map(function ($month) {
            return [
                'label' => $month['label'],
                'admissions' => Student::whereBetween('admission_date', [$month['start'], $month['end']])->count(),
                'students' => Student::where('admission_date', '<=', $month['end'])->count(),
            ];
        })->values();

        $attendanceTrend = collect(range(6, 0))->map(function ($daysAgo) {
            $date = Carbon::today()->subDays($daysAgo);
            $total = Attendance::whereDate('attendance_date', $date)->count();
            $present = Attendance::whereDate('attendance_date', $date)
                ->whereIn('status', ['present', 'late'])
                ->count();

            return [
                'label' => $date->format('D'),
                'rate' => $total ? round(($present / $total) * 100, 1) : 0,
            ];
        })->values();

        $recentStudents = Student::with(['academyClass', 'group'])
            ->latest()
            ->take(6)
            ->get();

        $topClasses = AcademyClass::withCount([
            'students as active_students_count' => function ($query) {
                $query->where('status', 'active');
            }
        ])->where('status', 'active')->orderByDesc('active_students_count')->take(5)->get();

        $today = now()->format('l');
        $todaySchedules = Schedule::with([
            'teacherAssignment.teacher',
            'teacherAssignment.academyClass',
            'teacherAssignment.group',
            'teacherAssignment.subject',
        ])
        ->where('status', 'active')
        ->where('day', $today)
        ->orderBy('start_time')
        ->take(8)
        ->get();

        return view('dashboard', compact(
            'studentsCount',
            'teachersCount',
            'classesCount',
            'groupsCount',
            'subjectsCount',
            'coursesCount',
            'assignmentsCount',
            'schedulesCount',
            'attendanceRate',
            'attendanceTotal',
            'attendancePresent',
            'attendanceLate',
            'attendanceAbsent',
            'enrollmentTrend',
            'attendanceTrend',
            'recentStudents',
            'topClasses',
            'todaySchedules'
        ));
    }
}
