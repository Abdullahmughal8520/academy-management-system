<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function create()
        {
            return view('courses.create');
        }
    public function store(Request $request)
        {
            $validated = $request->validate([
                'course_code' => 'required|unique:courses,course_code',
                'name' => 'required|string|max:150',
                'description' => 'nullable|string',
                'duration' => 'nullable|string|max:100',
                'fee' => 'required|numeric|min:0',
            ]);

            Course::create($validated);

            return redirect('/courses/create')
                ->with('success', 'Course added successfully!');
        }

    public function index()
        {
            $courses = Course::latest()->get();

            return view('courses.index', compact('courses'));
        }

    public function edit(Course $course)
        {
            return view('courses.edit', compact('course'));
        }

    public function update(Request $request, Course $course)
        {
            $validated = $request->validate([
                'course_code' => 'required|unique:courses,course_code,' . $course->id,
                'name' => 'required|string|max:150',
                'description' => 'nullable|string',
                'duration' => 'nullable|string|max:100',
                'fee' => 'required|numeric|min:0',
                'status' => 'required|in:active,inactive',
            ]);

            $course->update($validated);

            return redirect('/courses')
                ->with('success', 'Course updated successfully!');
        }

    public function destroy(Course $course)
    {
        $course->delete();

        return redirect('/courses')->with('success', 'Course deleted successfully!');
    }



}