<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Schedule;
use App\Models\Teacher;
use App\Models\TeacherAssignment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeacherDashboardController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Teacher Dashboard
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        $teacher = Teacher::where('user_id', Auth::id())->first();

        if (!$teacher) {
            abort(403, 'Teacher profile not found.');
        }

        /*
        |--------------------------------------------------------------------------
        | Teacher Assignments
        |--------------------------------------------------------------------------
        */

        $assignments = TeacherAssignment::with([
            'teacher',
            'academyClass',
            'group',
            'subject',
        ])
        ->where('teacher_id', $teacher->id)
        ->latest()
        ->get();

        /*
        |--------------------------------------------------------------------------
        | Classes
        |--------------------------------------------------------------------------
        */

        $classes = $assignments
            ->pluck('academyClass')
            ->filter()
            ->unique('id')
            ->values();

        /*
        |--------------------------------------------------------------------------
        | Subjects
        |--------------------------------------------------------------------------
        */

        $subjects = $assignments
            ->pluck('subject')
            ->filter()
            ->unique('id')
            ->values();

        /*
        |--------------------------------------------------------------------------
        | Groups
        |--------------------------------------------------------------------------
        */

        $groups = $assignments
            ->pluck('group')
            ->filter()
            ->unique('id')
            ->values();

        /*
        |--------------------------------------------------------------------------
        | Students Count
        |--------------------------------------------------------------------------
        */

        $studentsCount = 0;

        foreach ($groups as $group) {

            if (method_exists($group, 'students')) {
                $studentsCount += $group->students()->count();
            }
        }

        /*
        |--------------------------------------------------------------------------
        | Today's Schedules
        |--------------------------------------------------------------------------
        */

        $todayName = now()->format('l');

        $todaySchedules = Schedule::with([
            'teacherAssignment.teacher',
            'teacherAssignment.academyClass',
            'teacherAssignment.group',
            'teacherAssignment.subject',
        ])
        ->whereHas('teacherAssignment', function ($query) use ($teacher) {
            $query->where('teacher_id', $teacher->id);
        })
        ->where('status', 'active')
        ->where(function ($query) use ($todayName) {

            $query->whereRaw('LOWER(day) = ?', [
                strtolower($todayName)
            ])

            ->orWhereRaw('LOWER(day) = ?', [
                strtolower(substr($todayName, 0, 3))
            ]);

        })
        ->orderBy('start_time')
        ->get();

        /*
        |--------------------------------------------------------------------------
        | All Teacher Schedules
        |--------------------------------------------------------------------------
        */

        $schedules = Schedule::with([
            'teacherAssignment.teacher',
            'teacherAssignment.academyClass',
            'teacherAssignment.group',
            'teacherAssignment.subject',
        ])
        ->whereHas('teacherAssignment', function ($query) use ($teacher) {
            $query->where('teacher_id', $teacher->id);
        })
        ->where('status', 'active')
        ->orderBy('day')
        ->orderBy('start_time')
        ->get();

        /*
        |--------------------------------------------------------------------------
        | Today's Attendance
        |--------------------------------------------------------------------------
        */

        $todayAttendance = Attendance::whereDate(
            'attendance_date',
            now()->toDateString()
        )
        ->where('teacher_id', $teacher->id)
        ->get();

        /*
        |--------------------------------------------------------------------------
        | Attendance Counts
        |--------------------------------------------------------------------------
        */

        $attendanceTotal = $todayAttendance->count();

        $attendancePresent = $todayAttendance
            ->where('status', 'present')
            ->count();

        $attendanceAbsent = $todayAttendance
            ->where('status', 'absent')
            ->count();

        $attendanceLeave = $todayAttendance
            ->where('status', 'leave')
            ->count();

        /*
        |--------------------------------------------------------------------------
        | Attendance Rate
        |--------------------------------------------------------------------------
        */

        $attendanceRate = $attendanceTotal > 0
            ? round(($attendancePresent / $attendanceTotal) * 100)
            : 0;

        /*
        |--------------------------------------------------------------------------
        | Doughnut Chart Data
        |--------------------------------------------------------------------------
        */

        $attendanceChart = [
            'present' => $attendancePresent,
            'absent'  => $attendanceAbsent,
            'leave'   => $attendanceLeave,
        ];

        /*
        |--------------------------------------------------------------------------
        | Empty Trend
        |--------------------------------------------------------------------------
        */

        $attendanceTrend = collect();

        /*
        |--------------------------------------------------------------------------
        | Dashboard View
        |--------------------------------------------------------------------------
        */

        return view('teacher.dashboard', compact(
            'teacher',
            'assignments',
            'classes',
            'subjects',
            'groups',
            'studentsCount',
            'todaySchedules',
            'schedules',
            'attendanceTotal',
            'attendancePresent',
            'attendanceAbsent',
            'attendanceLeave',
            'attendanceRate',
            'attendanceChart',
            'attendanceTrend'
        ));
    }


    /*
    |--------------------------------------------------------------------------
    | Teacher Profile
    |--------------------------------------------------------------------------
    */

    public function profile()
    {
        $teacher = Teacher::where(
            'user_id',
            Auth::id()
        )->firstOrFail();

        return view(
            'teacher.profile',
            compact('teacher')
        );
    }


    /*
    |--------------------------------------------------------------------------
    | Teacher Classes
    |--------------------------------------------------------------------------
    */

    public function classes()
    {
        $teacher = Teacher::where(
            'user_id',
            Auth::id()
        )->firstOrFail();

        /*
        |--------------------------------------------------------------------------
        | Get Teacher Assignments
        |--------------------------------------------------------------------------
        */

        $assignments = TeacherAssignment::with([
            'academyClass',
            'group',
            'subject',
        ])
        ->where('teacher_id', $teacher->id)
        ->latest()
        ->get();

        /*
        |--------------------------------------------------------------------------
        | Get Unique Academy Classes
        |--------------------------------------------------------------------------
        */

        $classes = $assignments
            ->pluck('academyClass')
            ->filter()
            ->unique('id')
            ->values();

        /*
        |--------------------------------------------------------------------------
        | Send Everything To View
        |--------------------------------------------------------------------------
        */

        return view(
            'teacher.classes',
            compact(
                'teacher',
                'classes',
                'assignments'
            )
        );
    }


   /*
|--------------------------------------------------------------------------
| Teacher Subjects
|--------------------------------------------------------------------------
*/

public function subjects()
{
    $teacher = Teacher::where(
        'user_id',
        Auth::id()
    )->firstOrFail();

    /*
    |--------------------------------------------------------------------------
    | Get Teacher Assignments
    |--------------------------------------------------------------------------
    */

    $assignments = TeacherAssignment::with([
        'academyClass',
        'group',
        'subject',
    ])
    ->where('teacher_id', $teacher->id)
    ->latest()
    ->get();

    /*
    |--------------------------------------------------------------------------
    | Get Unique Subjects
    |--------------------------------------------------------------------------
    */

    $subjects = $assignments
        ->pluck('subject')
        ->filter()
        ->unique('id')
        ->values();

    /*
    |--------------------------------------------------------------------------
    | Send Subjects To View
    |--------------------------------------------------------------------------
    */

    return view(
        'teacher.subjects',
        compact(
            'teacher',
            'subjects'
        )
    );
}


    /*
    |--------------------------------------------------------------------------
    | Teacher Assignments
    |--------------------------------------------------------------------------
    */

    public function assignments()
    {
        $teacher = Teacher::where(
            'user_id',
            Auth::id()
        )->firstOrFail();

        $assignments = TeacherAssignment::with([
            'academyClass',
            'group',
            'subject',
        ])
        ->where('teacher_id', $teacher->id)
        ->latest()
        ->get();

        return view(
            'teacher.assignments',
            compact('assignments')
        );
    }


    /*
    |--------------------------------------------------------------------------
    | Teacher Timetable
    |--------------------------------------------------------------------------
    */

 public function timetable()
{
    $user = auth()->user();

    $teacher = $user->teacher;

    if (!$teacher) {
        abort(403, 'Teacher profile not found.');
    }

    $schedules = \App\Models\Schedule::with([
        'teacherAssignment.teacher',
        'teacherAssignment.academyClass',
        'teacherAssignment.group',
        'teacherAssignment.subject',
    ])
    ->whereHas('teacherAssignment', function ($query) use ($teacher) {
        $query->where('teacher_id', $teacher->id);
    })
    ->where('status', 'active')
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
        'Sunday',
    ];

    return view('teacher.timetable', compact(
        'schedules',
        'days'
    ));
}

    /*
    |--------------------------------------------------------------------------
    | Change Password
    |--------------------------------------------------------------------------
    */

    public function changePassword()
    {
        return view(
            'teacher.change-password'
        );
    }


    /*
    |--------------------------------------------------------------------------
    | Update Password
    |--------------------------------------------------------------------------
    */

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required'],
            'password' => [
                'required',
                'confirmed',
                'min:8'
            ],
        ]);

        $user = Auth::user();

        if (!password_verify(
            $request->current_password,
            $user->password
        )) {

            return back()->withErrors([
                'current_password' =>
                    'Current password is incorrect.',
            ]);
        }

        $user->password = bcrypt(
            $request->password
        );

        $user->save();

        return back()->with(
            'success',
            'Password updated successfully.'
        );
    }
}