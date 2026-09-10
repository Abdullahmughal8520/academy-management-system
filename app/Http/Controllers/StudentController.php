<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\AcademyClass;
use App\Models\Group;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;


 
class StudentController extends Controller
{
    public function create()
    {
        $classes = AcademyClass::where('status', 'active')
            ->orderBy('name')
            ->get();

        $groups = Group::where('status', 'active')
            ->orderBy('name')
            ->get();

        return view('students.create', compact('classes', 'groups'));
    }



    public function index()
    {
        $students = Student::with([
            'academyClass',
            'group'
        ])->latest()->get();

        return view('students.index', compact('students'));
    }


   public function store(Request $request)
{
    $validated = $request->validate([
        'student_code' => 'required|unique:students,student_code',

        'first_name' => 'required|string|max:100',

        'last_name' => 'nullable|string|max:100',

        'father_name' => 'required|string|max:100',

        'date_of_birth' => 'nullable|date',

        'gender' => 'nullable|in:male,female,other',

        'phone' => 'nullable|string|max:20',

        'email' => 'required|email|max:255|unique:users,email',

        'address' => 'nullable|string',

        'admission_date' => 'required|date',

        'academy_class_id' =>
            'required|exists:academy_classes,id',

        'group_id' =>
            'required|exists:groups,id',
    ]);

    DB::transaction(function () use ($validated) {

        // Create student login account
        $user = User::create([
            'name' => $validated['first_name'] . ' ' . ($validated['last_name'] ?? ''),
            'email' => $validated['email'],
            'password' => Hash::make($validated['student_code']),
            'role' => 'student',
        ]);

        // Create student record and link it with user
        Student::create([
            'user_id' => $user->id,
            'student_code' => $validated['student_code'],
            'first_name' => $validated['first_name'],
            'last_name' => $validated['last_name'] ?? null,
            'father_name' => $validated['father_name'],
            'date_of_birth' => $validated['date_of_birth'] ?? null,
            'gender' => $validated['gender'] ?? null,
            'phone' => $validated['phone'] ?? null,
            'email' => $validated['email'],
            'address' => $validated['address'] ?? null,
            'admission_date' => $validated['admission_date'],
            'academy_class_id' => $validated['academy_class_id'],
            'group_id' => $validated['group_id'],
            'status' => 'active',
        ]);
    });

    return redirect('/students')
        ->with('success', 'Student added successfully! Login account created successfully.');
}


    public function edit(Student $student)
    {
        $classes = AcademyClass::where('status', 'active')
            ->orderBy('name')
            ->get();

        $groups = Group::where('status', 'active')
            ->orderBy('name')
            ->get();

        return view(
            'students.edit',
            compact('student', 'classes', 'groups')
        );
    }


    public function update(Request $request, Student $student)
    {
        $validated = $request->validate([
            'student_code' =>
                'required|unique:students,student_code,' . $student->id,

            'first_name' =>
                'required|string|max:100',

            'last_name' =>
                'nullable|string|max:100',

            'father_name' =>
                'required|string|max:100',

            'phone' =>
                'nullable|string|max:20',

            'email' =>
                'nullable|email|max:255',

            'academy_class_id' =>
                'required|exists:academy_classes,id',

            'group_id' =>
                'required|exists:groups,id',
        ]);

        $student->update($validated);

        return redirect('/students')
            ->with('success', 'Student updated successfully!');
    }

    public function createAccount(Student $student)
{
    if ($student->user_id) {
        return back()->withErrors([
            'email' => 'This student already has a login account.'
        ]);
    }

    if (!$student->email) {
        return back()->withErrors([
            'email' => 'This student does not have an email address.'
        ]);
    }

    if (User::where('email', $student->email)->exists()) {
        return back()->withErrors([
            'email' => 'This email is already registered with another account.'
        ]);
    }

    DB::transaction(function () use ($student) {

        $user = User::create([
            'name' => $student->first_name . ' ' . ($student->last_name ?? ''),
            'email' => $student->email,
            'password' => Hash::make($student->student_code),
            'role' => 'student',
        ]);

        $student->update([
            'user_id' => $user->id,
        ]);
    });

    return back()->with(
        'success',
        'Student login account created successfully. Password is the student code.'
    );
}


   
public function destroy(Student $student)
{
    $student->delete();

    return redirect()
        ->route('students.index')
        ->with('success', 'Student deleted successfully.');
}

}
