<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\AcademyClass;
use App\Models\Group;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function create()
    {
        $classes = AcademyClass::where('status', 'active')
            ->orderBy('name')
            ->get();

        $groups = Group::where('status', 'active')
            ->with('academyClass')
            ->orderBy('name')
            ->get();

        return view('subjects.create', compact('classes', 'groups'));
    }

    public function store(Request $request)
{
    $validated = $request->validate([
        'academy_class_id' => 'required|exists:academy_classes,id',
        'group_id' => 'required|exists:groups,id',
        'name' => 'required|string|max:100',
        'code' => 'nullable|string|max:50',
        'description' => 'nullable|string',
    ]);

    $groupBelongsToClass = Group::where('id', $validated['group_id'])
        ->where('academy_class_id', $validated['academy_class_id'])
        ->exists();

    if (!$groupBelongsToClass) {
        return back()
            ->withErrors([
                'group_id' => 'Selected group does not belong to the selected class.'
            ])
            ->withInput();
    }

    $exists = Subject::where('academy_class_id', $validated['academy_class_id'])
        ->where('group_id', $validated['group_id'])
        ->where('name', $validated['name'])
        ->exists();

    if ($exists) {
        return back()
            ->withErrors([
                'name' => 'This subject already exists for the selected class and group.'
            ])
            ->withInput();
    }

    Subject::create($validated);

    return redirect('/subjects/create')
        ->with('success', 'Subject added successfully!');
}

public function index()
{
    $subjects = Subject::with(['academyClass', 'group'])
        ->latest()
        ->get();

    return view('subjects.index', compact('subjects'));
}

public function edit(Subject $subject)
{
    $classes = AcademyClass::where('status', 'active')
        ->orderBy('name')
        ->get();

    $groups = Group::where('status', 'active')
        ->with('academyClass')
        ->orderBy('name')
        ->get();

    return view('subjects.edit', compact('subject', 'classes', 'groups'));
}

public function update(Request $request, Subject $subject)
{
    $validated = $request->validate([
        'academy_class_id' => 'required|exists:academy_classes,id',
        'group_id' => 'required|exists:groups,id',
        'name' => 'required|string|max:100',
        'code' => 'nullable|string|max:50',
        'description' => 'nullable|string',
        'status' => 'required|in:active,inactive',
    ]);

    $groupBelongsToClass = Group::where('id', $validated['group_id'])
        ->where('academy_class_id', $validated['academy_class_id'])
        ->exists();

    if (!$groupBelongsToClass) {
        return back()
            ->withErrors([
                'group_id' => 'Selected group does not belong to the selected class.'
            ])
            ->withInput();
    }

    $exists = Subject::where('academy_class_id', $validated['academy_class_id'])
        ->where('group_id', $validated['group_id'])
        ->where('name', $validated['name'])
        ->where('id', '!=', $subject->id)
        ->exists();

    if ($exists) {
        return back()
            ->withErrors([
                'name' => 'This subject already exists for the selected class and group.'
            ])
            ->withInput();
    }

    $subject->update($validated);

    return redirect('/subjects')
        ->with('success', 'Subject updated successfully!');
}

public function destroy(Subject $subject)
{
    $subject->delete();

    return redirect('/subjects')
        ->with('success', 'Subject deleted successfully!');
}

}