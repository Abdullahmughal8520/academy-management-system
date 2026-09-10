<?php

namespace App\Http\Controllers;

use App\Models\AcademyClass;
use Illuminate\Http\Request;

class AcademyClassController extends Controller
{
    public function create()
        {
            return view('academy_classes.create');
        }

    public function store(Request $request)
        {
            $validated = $request->validate([
                'name' => 'required|string|max:50|unique:academy_classes,name',
                'description' => 'nullable|string',
            ]);

            AcademyClass::create($validated);

            return redirect('/classes/create')
                ->with('success', 'Class added successfully!');
        }

    public function index()
        {
            $classes = AcademyClass::latest()->get();

            return view('academy_classes.index', compact('classes'));
        }

    public function edit(AcademyClass $academyClass)
        {
            return view('academy_classes.edit', compact('academyClass'));
        }

    public function update(Request $request, AcademyClass $academyClass)
        {
            $validated = $request->validate([
                'name' => 'required|string|max:50|unique:academy_classes,name,' . $academyClass->id,
                'description' => 'nullable|string',
                'status' => 'required|in:active,inactive',
            ]);

            $academyClass->update($validated);

            return redirect('/classes')
                ->with('success', 'Class updated successfully!');
        }

    public function destroy(AcademyClass $academyClass)
        {
            $academyClass->delete();

            return redirect('/classes')
                ->with('success', 'Class deleted successfully!');
        }
}
