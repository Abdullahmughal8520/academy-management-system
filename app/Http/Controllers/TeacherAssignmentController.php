<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Models\AcademyClass;
use App\Models\Group;
use App\Models\Subject;
use App\Models\TeacherAssignment;
use Illuminate\Http\Request;



class TeacherAssignmentController extends Controller
{
    public function index()
    {
        $assignments = TeacherAssignment::with([
            'teacher',
            'academyClass',
            'group',
            'subject'
        ])->latest()->get();

        return view('teacher_assignments.index', compact('assignments'));
    }

    public function create()
{
    $teachers = Teacher::all();
    $classes = AcademyClass::all();
    $groups = Group::all();
    $subjects = Subject::all();

    return view('teacher_assignments.create', compact(
        'teachers',
        'classes',
        'groups',
        'subjects'
    ));
}

public function store(Request $request)
{
    $validated = $request->validate([
        'teacher_id' => 'required|exists:teachers,id',
        'academy_class_id' => 'required|exists:academy_classes,id',
        'group_id' => 'required|exists:groups,id',
        'subject_id' => 'required|exists:subjects,id',
    ]);

    $alreadyAssigned = TeacherAssignment::where('teacher_id', $validated['teacher_id'])
        ->where('academy_class_id', $validated['academy_class_id'])
        ->where('group_id', $validated['group_id'])
        ->where('subject_id', $validated['subject_id'])
        ->exists();

    if ($alreadyAssigned) {
        return back()
            ->withInput()
            ->withErrors([
                'teacher_id' => 'This teacher is already assigned to this class, group and subject.'
            ]);
    }

    TeacherAssignment::create($validated);

    return redirect()
        ->route('teacher-assignments.index')
        ->with('success', 'Teacher assigned successfully.');
}

    public function destroy(TeacherAssignment $teacherAssignment)
    {
        $teacherAssignment->delete();

        return redirect()
            ->route('teacher-assignments.index')
            ->with('success', 'Teacher assignment deleted successfully.');
    }
}