<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use App\Models\TeacherAssignment;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Admin - All Schedules
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        $schedules = Schedule::with([
            'teacherAssignment.teacher',
            'teacherAssignment.academyClass',
            'teacherAssignment.group',
            'teacherAssignment.subject',
        ])
        ->latest()
        ->get();

        return view('schedules.index', compact('schedules'));
    }


    /*
    |--------------------------------------------------------------------------
    | Admin - Weekly Timetable
    |--------------------------------------------------------------------------
    |
    | Admin can see the complete academy timetable.
    | No teacher filter is applied here.
    |
    */

    public function weeklyTimetable()
    {
        $schedules = Schedule::with([
            'teacherAssignment.teacher',
            'teacherAssignment.academyClass',
            'teacherAssignment.group',
            'teacherAssignment.subject',
        ])
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

        return view(
            'schedules.weekly-timetable',
            compact('schedules', 'days')
        );
    }


    /*
    |--------------------------------------------------------------------------
    | Teacher - My Weekly Timetable
    |--------------------------------------------------------------------------
    |
    | Teacher can see only his/her own timetable.
    |
    */

    public function timetable()
    {
        $user = auth()->user();

        /*
        |----------------------------------------------------------------------
        | Check logged-in user
        |----------------------------------------------------------------------
        */

        if (!$user) {
            abort(403, 'You are not authorized to view this timetable.');
        }

        /*
        |----------------------------------------------------------------------
        | Check teacher profile
        |----------------------------------------------------------------------
        */

        $teacher = $user->teacher;

        if (!$teacher) {
            abort(
                403,
                'Your account is not linked with a teacher profile.'
            );
        }

        /*
        |----------------------------------------------------------------------
        | Get teacher schedules
        |----------------------------------------------------------------------
        */

        $schedules = Schedule::with([
            'teacherAssignment.teacher',
            'teacherAssignment.academyClass',
            'teacherAssignment.group',
            'teacherAssignment.subject',
        ])
        ->where('status', 'active')
        ->whereHas('teacherAssignment', function ($query) use ($teacher) {
            $query->where('teacher_id', $teacher->id);
        })
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

        return view(
            'teacher.timetable',
            compact('schedules', 'days', 'teacher')
        );
    }


    /*
    |--------------------------------------------------------------------------
    | Create Schedule
    |--------------------------------------------------------------------------
    */

    public function create()
    {
        $assignments = TeacherAssignment::with([
            'teacher',
            'academyClass',
            'group',
            'subject',
        ])
        ->get();

        return view(
            'schedules.create',
            compact('assignments')
        );
    }


    /*
    |--------------------------------------------------------------------------
    | Edit Schedule
    |--------------------------------------------------------------------------
    */

    public function edit(Schedule $schedule)
    {
        $assignments = TeacherAssignment::with([
            'teacher',
            'academyClass',
            'group',
            'subject',
        ])
        ->get();

        return view(
            'schedules.edit',
            compact('schedule', 'assignments')
        );
    }


    /*
    |--------------------------------------------------------------------------
    | Store Schedule
    |--------------------------------------------------------------------------
    */

    public function store(Request $request)
    {
        $validated = $request->validate([
            'teacher_assignment_id' => 'required|exists:teacher_assignments,id',

            'day' => 'required|string|max:20',

            'start_time' => 'required|date_format:H:i',

            'end_time' => 'required|date_format:H:i|after:start_time',

            'room' => 'nullable|string|max:100',
        ]);


        /*
        |--------------------------------------------------------------------------
        | Get Teacher Assignment
        |--------------------------------------------------------------------------
        */

        $assignment = TeacherAssignment::findOrFail(
            $validated['teacher_assignment_id']
        );


        /*
        |--------------------------------------------------------------------------
        | Teacher Conflict
        |--------------------------------------------------------------------------
        */

        $teacherConflict = Schedule::where(
            'day',
            $validated['day']
        )
        ->whereHas('teacherAssignment', function ($query) use ($assignment) {

            $query->where(
                'teacher_id',
                $assignment->teacher_id
            );

        })
        ->where(function ($query) use ($validated) {

            $query
                ->where(
                    'start_time',
                    '<',
                    $validated['end_time']
                )
                ->where(
                    'end_time',
                    '>',
                    $validated['start_time']
                );

        })
        ->exists();


        if ($teacherConflict) {

            return back()
                ->withInput()
                ->withErrors([
                    'start_time' =>
                        'This teacher already has a schedule during this time.'
                ]);
        }


        /*
        |--------------------------------------------------------------------------
        | Room Conflict
        |--------------------------------------------------------------------------
        */

        if (!empty($validated['room'])) {

            $roomConflict = Schedule::where(
                'day',
                $validated['day']
            )
            ->where(
                'room',
                $validated['room']
            )
            ->where(function ($query) use ($validated) {

                $query
                    ->where(
                        'start_time',
                        '<',
                        $validated['end_time']
                    )
                    ->where(
                        'end_time',
                        '>',
                        $validated['start_time']
                    );

            })
            ->exists();


            if ($roomConflict) {

                return back()
                    ->withInput()
                    ->withErrors([
                        'room' =>
                            'This room is already booked during this time.'
                    ]);
            }
        }


        /*
        |--------------------------------------------------------------------------
        | Class / Group Conflict
        |--------------------------------------------------------------------------
        */

        $classGroupConflict = Schedule::where(
            'day',
            $validated['day']
        )
        ->whereHas('teacherAssignment', function ($query) use ($assignment) {

            $query
                ->where(
                    'academy_class_id',
                    $assignment->academy_class_id
                )
                ->where(
                    'group_id',
                    $assignment->group_id
                );

        })
        ->where(function ($query) use ($validated) {

            $query
                ->where(
                    'start_time',
                    '<',
                    $validated['end_time']
                )
                ->where(
                    'end_time',
                    '>',
                    $validated['start_time']
                );

        })
        ->exists();


        if ($classGroupConflict) {

            return back()
                ->withInput()
                ->withErrors([
                    'teacher_assignment_id' =>
                        'This class/group already has a schedule during this time.'
                ]);
        }


        /*
        |--------------------------------------------------------------------------
        | Create Schedule
        |--------------------------------------------------------------------------
        */

        Schedule::create([

            'teacher_assignment_id' =>
                $validated['teacher_assignment_id'],

            'day' =>
                $validated['day'],

            'start_time' =>
                $validated['start_time'],

            'end_time' =>
                $validated['end_time'],

            'room' =>
                !empty($validated['room'])
                    ? $validated['room']
                    : null,

            'status' =>
                'active',
        ]);


        /*
        |--------------------------------------------------------------------------
        | Redirect
        |--------------------------------------------------------------------------
        */

        return redirect()
            ->route('schedules.index')
            ->with(
                'success',
                'Schedule created successfully!'
            );
    }


    /*
    |--------------------------------------------------------------------------
    | Update Schedule
    |--------------------------------------------------------------------------
    */

    public function update(
        Request $request,
        Schedule $schedule
    ) {

        $validated = $request->validate([

            'teacher_assignment_id' =>
                'required|exists:teacher_assignments,id',

            'day' =>
                'required|string|max:20',

            'start_time' =>
                'required|date_format:H:i',

            'end_time' =>
                'required|date_format:H:i|after:start_time',

            'room' =>
                'nullable|string|max:100',
        ]);


        /*
        |--------------------------------------------------------------------------
        | Get Assignment
        |--------------------------------------------------------------------------
        */

        $assignment = TeacherAssignment::findOrFail(
            $validated['teacher_assignment_id']
        );


        /*
        |--------------------------------------------------------------------------
        | Teacher Conflict
        |--------------------------------------------------------------------------
        */

        $teacherConflict = Schedule::where(
            'day',
            $validated['day']
        )
        ->where(
            'id',
            '!=',
            $schedule->id
        )
        ->whereHas('teacherAssignment', function ($query) use ($assignment) {

            $query->where(
                'teacher_id',
                $assignment->teacher_id
            );

        })
        ->where(function ($query) use ($validated) {

            $query
                ->where(
                    'start_time',
                    '<',
                    $validated['end_time']
                )
                ->where(
                    'end_time',
                    '>',
                    $validated['start_time']
                );

        })
        ->exists();


        if ($teacherConflict) {

            return back()
                ->withInput()
                ->withErrors([
                    'start_time' =>
                        'This teacher already has a schedule during this time.'
                ]);
        }


        /*
        |--------------------------------------------------------------------------
        | Room Conflict
        |--------------------------------------------------------------------------
        */

        if (!empty($validated['room'])) {

            $roomConflict = Schedule::where(
                'day',
                $validated['day']
            )
            ->where(
                'room',
                $validated['room']
            )
            ->where(
                'id',
                '!=',
                $schedule->id
            )
            ->where(function ($query) use ($validated) {

                $query
                    ->where(
                        'start_time',
                        '<',
                        $validated['end_time']
                    )
                    ->where(
                        'end_time',
                        '>',
                        $validated['start_time']
                    );

            })
            ->exists();


            if ($roomConflict) {

                return back()
                    ->withInput()
                    ->withErrors([
                        'room' =>
                            'This room is already booked during this time.'
                    ]);
            }
        }


        /*
        |--------------------------------------------------------------------------
        | Class / Group Conflict
        |--------------------------------------------------------------------------
        */

        $classGroupConflict = Schedule::where(
            'day',
            $validated['day']
        )
        ->where(
            'id',
            '!=',
            $schedule->id
        )
        ->whereHas('teacherAssignment', function ($query) use ($assignment) {

            $query
                ->where(
                    'academy_class_id',
                    $assignment->academy_class_id
                )
                ->where(
                    'group_id',
                    $assignment->group_id
                );

        })
        ->where(function ($query) use ($validated) {

            $query
                ->where(
                    'start_time',
                    '<',
                    $validated['end_time']
                )
                ->where(
                    'end_time',
                    '>',
                    $validated['start_time']
                );

        })
        ->exists();


        if ($classGroupConflict) {

            return back()
                ->withInput()
                ->withErrors([
                    'teacher_assignment_id' =>
                        'This class/group already has a schedule during this time.'
                ]);
        }


        /*
        |--------------------------------------------------------------------------
        | Update Schedule
        |--------------------------------------------------------------------------
        */

        $schedule->update([

            'teacher_assignment_id' =>
                $validated['teacher_assignment_id'],

            'day' =>
                $validated['day'],

            'start_time' =>
                $validated['start_time'],

            'end_time' =>
                $validated['end_time'],

            'room' =>
                $validated['room'] ?? null,
        ]);


        /*
        |--------------------------------------------------------------------------
        | Redirect
        |--------------------------------------------------------------------------
        */

        return redirect()
            ->route('schedules.index')
            ->with(
                'success',
                'Schedule updated successfully!'
            );
    }


    /*
    |--------------------------------------------------------------------------
    | Delete Schedule
    |--------------------------------------------------------------------------
    */

    public function destroy(Schedule $schedule)
    {
        $schedule->delete();

        return redirect()
            ->route('schedules.index')
            ->with(
                'success',
                'Schedule deleted successfully!'
            );
    }
}