<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\TeacherAssignment;

class TeacherController extends Controller
{
    public function create()
    {
        return view('teachers.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'teacher_code' => 'required|unique:teachers,teacher_code',
            'first_name' => 'required|string|max:100',
            'last_name' => 'nullable|string|max:100',
            'phone' => 'nullable|string|max:20',
            'email' => 'required|email|max:255|unique:users,email',
            'qualification' => 'nullable|string|max:100',
            'joining_date' => 'nullable|date',
        ]);

        DB::transaction(function () use ($validated) {

            $user = User::create([
                'name' => trim(
                    $validated['first_name'] . ' ' .
                    ($validated['last_name'] ?? '')
                ),
                'email' => $validated['email'],
                'password' => Hash::make('Teacher@12345'),
                'role' => 'teacher',
            ]);

            Teacher::create([
                'teacher_code' => $validated['teacher_code'],
                'first_name' => $validated['first_name'],
                'last_name' => $validated['last_name'] ?? null,
                'phone' => $validated['phone'] ?? null,
                'email' => $validated['email'],
                'qualification' => $validated['qualification'] ?? null,
                'joining_date' => $validated['joining_date'] ?? null,
                'user_id' => $user->id,
            ]);
        });

        return redirect('/teachers')
            ->with('success', 'Teacher and login account created successfully!');
    }

    public function index()
    {
        $teachers = Teacher::latest()->get();

        return view('teachers.index', compact('teachers'));
    }

    public function edit(Teacher $teacher)
    {
        return view('teachers.edit', compact('teacher'));
    }

    public function update(Request $request, Teacher $teacher)
    {
        $validated = $request->validate([
            'teacher_code' => 'required|unique:teachers,teacher_code,' . $teacher->id,
            'first_name' => 'required|string|max:100',
            'last_name' => 'nullable|string|max:100',
            'phone' => 'nullable|string|max:20',
            'email' => 'required|email',
            'qualification' => 'nullable|string|max:100',
            'joining_date' => 'nullable|date',
        ]);

        // Check email only if another user is already using it
        $existingUser = User::where('email', $validated['email'])
            ->where('id', '!=', $teacher->user_id)
            ->first();

        if ($existingUser) {
            return back()
                ->withErrors([
                    'email' => 'This email is already being used by another account.'
                ])
                ->withInput();
        }

        DB::transaction(function () use ($validated, $teacher) {

            $teacher->update([
                'teacher_code' => $validated['teacher_code'],
                'first_name' => $validated['first_name'],
                'last_name' => $validated['last_name'] ?? null,
                'phone' => $validated['phone'] ?? null,
                'email' => $validated['email'],
                'qualification' => $validated['qualification'] ?? null,
                'joining_date' => $validated['joining_date'] ?? null,
            ]);

            // Update login account if teacher already has one
            if ($teacher->user_id && $teacher->user) {

                $teacher->user->update([
                    'name' => trim(
                        $validated['first_name'] . ' ' .
                        ($validated['last_name'] ?? '')
                    ),
                    'email' => $validated['email'],
                ]);
            }
        });

        return redirect('/teachers')
            ->with('success', 'Teacher updated successfully!');
    }

    public function createAccount(Teacher $teacher)
    {
        if ($teacher->user_id) {
            return redirect('/teachers')
                ->with('success', 'This teacher already has a login account.');
        }

        if (!$teacher->email) {
            return redirect('/teachers')
                ->withErrors([
                    'email' => 'Please add an email address first.'
                ]);
        }

        if (User::where('email', $teacher->email)->exists()) {
            return redirect('/teachers')
                ->withErrors([
                    'email' => 'This email is already being used by another account.'
                ]);
        }

        DB::transaction(function () use ($teacher) {

            $user = User::create([
                'name' => trim(
                    $teacher->first_name . ' ' .
                    ($teacher->last_name ?? '')
                ),
                'email' => $teacher->email,
                'password' => Hash::make('Teacher@12345'),
                'role' => 'teacher',
            ]);

            $teacher->update([
                'user_id' => $user->id,
            ]);
        });

        return redirect('/teachers')
            ->with('success', 'Teacher login account created successfully!');
    }

public function classes()
{
    $teacher = auth()->user()->teacher;

    $assignments = \App\Models\TeacherAssignment::with([
        'academyClass',
        'group',
        'subject',
    ])
    ->where('teacher_id', $teacher->id)
    ->get();

    $classes = $assignments
        ->pluck('academyClass')
        ->filter()
        ->unique('id')
        ->values();

    return view('teacher.classes', compact(
        'teacher',
        'classes',
        'assignments'
    ));
}
    public function destroy(Teacher $teacher)
    {
        DB::transaction(function () use ($teacher) {

            if ($teacher->user_id) {
                $teacher->user()->delete();
            }

            $teacher->delete();
        });

        return redirect('/teachers')
            ->with('success', 'Teacher deleted successfully!');
    }
}
