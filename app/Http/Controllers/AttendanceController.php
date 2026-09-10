<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AttendanceController extends Controller
{
    public function index()
    {
        $teacher = Auth::user()->teacher;

        if (!$teacher) {
            abort(403, 'Teacher profile not found.');
        }

        $attendances = Attendance::with([
            'student',
            'academyClass',
            'group',
        ])
        ->where('teacher_id', $teacher->id)
        ->latest('attendance_date')
        ->latest()
        ->get();

        return view('teacher.attendance.index', compact('attendances'));
    }


    public function create()
    {
        $teacher = Auth::user()->teacher;

        if (!$teacher) {
            abort(403, 'Teacher profile not found.');
        }

        $assignments = $teacher->teacherAssignments()
            ->with([
                'academyClass',
                'group',
                'subject',
            ])
            ->get();

        return view('teacher.attendance.create', compact('assignments'));
    }


    public function students(Request $request)
    {
        $teacher = Auth::user()->teacher;

        if (!$teacher) {
            abort(403, 'Teacher profile not found.');
        }

        $validated = $request->validate([
            'academy_class_id' => 'required|exists:academy_classes,id',
            'group_id' => 'nullable|exists:groups,id',
        ]);

        /*
        |--------------------------------------------------------------------------
        | Check Teacher Assignment
        |--------------------------------------------------------------------------
        */

        $assigned = $teacher->teacherAssignments()
            ->where('academy_class_id', $validated['academy_class_id'])
            ->when(
                $validated['group_id'] ?? null,
                function ($query) use ($validated) {
                    $query->where('group_id', $validated['group_id']);
                }
            )
            ->exists();

        if (!$assigned) {
            return response()->json([
                'message' => 'You are not assigned to this class/group.'
            ], 403);
        }


        /*
        |--------------------------------------------------------------------------
        | Get Students
        |--------------------------------------------------------------------------
        */

        $students = Student::where(
            'academy_class_id',
            $validated['academy_class_id']
        )
        ->when(
            $validated['group_id'] ?? null,
            function ($query) use ($validated) {
                $query->where('group_id', $validated['group_id']);
            }
        )
        ->where('status', 'active')
        ->orderBy('first_name')
        ->get();

        return response()->json($students);
    }


    public function store(Request $request)
    {
        $teacher = Auth::user()->teacher;

        if (!$teacher) {
            abort(403, 'Teacher profile not found.');
        }

        $validated = $request->validate([
            'academy_class_id' => 'required|exists:academy_classes,id',
            'group_id' => 'nullable|exists:groups,id',
            'attendance_date' => 'required|date',
            'attendance' => 'required|array',
            'attendance.*' => 'required|in:present,absent,leave',
        ]);


        /*
        |--------------------------------------------------------------------------
        | Check Teacher Assignment
        |--------------------------------------------------------------------------
        */

        $assigned = $teacher->teacherAssignments()
            ->where('academy_class_id', $validated['academy_class_id'])
            ->when(
                $validated['group_id'] ?? null,
                function ($query) use ($validated) {
                    $query->where('group_id', $validated['group_id']);
                }
            )
            ->exists();

        if (!$assigned) {
            abort(403, 'You are not assigned to this class/group.');
        }


        /*
        |--------------------------------------------------------------------------
        | Save Attendance
        |--------------------------------------------------------------------------
        */

        foreach ($validated['attendance'] as $studentId => $status) {

            $student = Student::where('id', $studentId)
                ->where(
                    'academy_class_id',
                    $validated['academy_class_id']
                )
                ->when(
                    $validated['group_id'] ?? null,
                    function ($query) use ($validated) {
                        $query->where('group_id', $validated['group_id']);
                    }
                )
                ->where('status', 'active')
                ->first();

            if (!$student) {
                continue;
            }

            Attendance::updateOrCreate(
                [
                    'student_id' => $student->id,
                    'attendance_date' => $validated['attendance_date'],
                ],
                [
                    'teacher_id' => $teacher->id,
                    'academy_class_id' => $validated['academy_class_id'],
                    'group_id' => $validated['group_id'] ?? null,
                    'status' => $status,
                ]
            );
        }


        return redirect()
            ->route('teacher.attendance.index')
            ->with('success', 'Attendance saved successfully!');
    }
}
