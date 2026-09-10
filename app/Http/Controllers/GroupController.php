<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\AcademyClass;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    public function create()
    {
        $classes = AcademyClass::where('status', 'active')
            ->orderBy('name')
            ->get();

        return view('groups.create', compact('classes'));
    }

    public function store(Request $request)
{
    $validated = $request->validate([
        'academy_class_id' => 'required|exists:academy_classes,id',
        'name' => 'required|string|max:100',
        'description' => 'nullable|string',
    ]);

    $exists = Group::where('academy_class_id', $validated['academy_class_id'])
        ->where('name', $validated['name'])
        ->exists();

    if ($exists) {
        return back()
            ->withErrors([
                'name' => 'This group already exists for the selected class.'
            ])
            ->withInput();
    }

    Group::create($validated);

    return redirect('/groups/create')
        ->with('success', 'Group added successfully!');
}

public function index()
{
    $groups = Group::with('academyClass')
        ->latest()
        ->get();

    return view('groups.index', compact('groups'));
}

public function edit(Group $group)
{
    $classes = AcademyClass::where('status', 'active')
        ->orderBy('name')
        ->get();

    return view('groups.edit', compact('group', 'classes'));
}

public function update(Request $request, Group $group)
{
    $validated = $request->validate([
        'academy_class_id' => 'required|exists:academy_classes,id',
        'name' => 'required|string|max:100',
        'description' => 'nullable|string',
        'status' => 'required|in:active,inactive',
    ]);

    $exists = Group::where('academy_class_id', $validated['academy_class_id'])
        ->where('name', $validated['name'])
        ->where('id', '!=', $group->id)
        ->exists();

    if ($exists) {
        return back()
            ->withErrors([
                'name' => 'This group already exists for the selected class.'
            ])
            ->withInput();
    }

    $group->update($validated);

    return redirect('/groups')
        ->with('success', 'Group updated successfully!');
}

public function destroy(Group $group)
{
    $group->delete();

    return redirect('/groups')
        ->with('success', 'Group deleted successfully!');
}
}