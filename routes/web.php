<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Controllers
|--------------------------------------------------------------------------
*/

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;

use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;

use App\Http\Controllers\CourseController;
use App\Http\Controllers\AcademyClassController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\SubjectController;

use App\Http\Controllers\TeacherAssignmentController;
use App\Http\Controllers\ScheduleController;

use App\Http\Controllers\AttendanceController;

use App\Http\Controllers\StudentDashboardController;
use App\Http\Controllers\TeacherDashboardController;

use App\Http\Controllers\ExamController;
use App\Http\Controllers\ResultController;

use App\Http\Controllers\FeeStructureController;
use App\Http\Controllers\FeeController;
use App\Http\Controllers\FeePaymentController;


/*
|--------------------------------------------------------------------------
| Root Redirect
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return redirect()->route('login');
});


/*
|--------------------------------------------------------------------------
| Authentication Routes
|--------------------------------------------------------------------------
*/

Route::get('/login', [AuthController::class, 'showLogin'])
    ->name('login');

Route::post('/login', [AuthController::class, 'login'])
    ->name('login.submit');

Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout');


/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::middleware('admin')->group(function () {

    /*
    |--------------------------------------------------------------------------
    | Admin Dashboard
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/dashboard',
        [DashboardController::class, 'index']
    )->name('dashboard');


    /*
    |--------------------------------------------------------------------------
    | Admin Weekly Timetable
    |--------------------------------------------------------------------------
    |
    | Admin can see the complete academy timetable.
    | All teachers, classes, groups and subjects are shown.
    |
    */

    Route::get(
        '/admin/weekly-timetable',
        [ScheduleController::class, 'weeklyTimetable']
    )->name('admin.weekly-timetable');


    /*
    |--------------------------------------------------------------------------
    | Students
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/students/create',
        [StudentController::class, 'create']
    )->name('students.create');

    Route::post(
        '/students',
        [StudentController::class, 'store']
    )->name('students.store');

    Route::get(
        '/students',
        [StudentController::class, 'index']
    )->name('students.index');

    Route::post(
        '/students/{student}/create-account',
        [StudentController::class, 'createAccount']
    )->name('students.create-account');

    Route::post(
        '/students/{student}/store-account',
        [StudentController::class, 'storeAccount']
    )->name('students.store-account');

    Route::get(
        '/students/{student}/edit',
        [StudentController::class, 'edit']
    )->name('students.edit');

    Route::put(
        '/students/{student}',
        [StudentController::class, 'update']
    )->name('students.update');

    Route::delete(
        '/students/{student}',
        [StudentController::class, 'destroy']
    )->name('students.destroy');


    /*
    |--------------------------------------------------------------------------
    | Student Academic Overview
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/student/academic-overview',
        [StudentDashboardController::class, 'academicOverview']
    )->name('student.academic-overview');


    /*
    |--------------------------------------------------------------------------
    | Teachers
    |--------------------------------------------------------------------------
    */

    Route::resource(
        'teachers',
        TeacherController::class
    )->only([
        'index',
        'create',
        'store',
        'edit',
        'update',
        'destroy'
    ]);

    Route::post(
        'teachers/{teacher}/create-account',
        [TeacherController::class, 'createAccount']
    )->name('teachers.create-account');


    /*
    |--------------------------------------------------------------------------
    | Courses
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/courses/create',
        [CourseController::class, 'create']
    )->name('courses.create');

    Route::post(
        '/courses',
        [CourseController::class, 'store']
    )->name('courses.store');

    Route::get(
        '/courses',
        [CourseController::class, 'index']
    )->name('courses.index');

    Route::get(
        '/courses/{course}/edit',
        [CourseController::class, 'edit']
    )->name('courses.edit');

    Route::put(
        '/courses/{course}',
        [CourseController::class, 'update']
    )->name('courses.update');

    Route::delete(
        '/courses/{course}',
        [CourseController::class, 'destroy']
    )->name('courses.destroy');


    /*
    |--------------------------------------------------------------------------
    | Classes
    |--------------------------------------------------------------------------
    */

    Route::resource(
        'classes',
        AcademyClassController::class
    )
    ->parameters([
        'classes' => 'academyClass'
    ])
    ->only([
        'index',
        'create',
        'store',
        'edit',
        'update',
        'destroy'
    ]);


    /*
    |--------------------------------------------------------------------------
    | Groups
    |--------------------------------------------------------------------------
    */

    Route::resource(
        'groups',
        GroupController::class
    )->only([
        'index',
        'create',
        'store',
        'edit',
        'update',
        'destroy'
    ]);


    /*
    |--------------------------------------------------------------------------
    | Subjects
    |--------------------------------------------------------------------------
    */

    Route::resource(
        'subjects',
        SubjectController::class
    )->only([
        'index',
        'create',
        'store',
        'edit',
        'update',
        'destroy'
    ]);


    /*
    |--------------------------------------------------------------------------
    | Teacher Assignments
    |--------------------------------------------------------------------------
    */

    Route::resource(
        'teacher-assignments',
        TeacherAssignmentController::class
    )->only([
        'index',
        'create',
        'store',
        'destroy'
    ]);


    /*
    |--------------------------------------------------------------------------
    | Schedule Management
    |--------------------------------------------------------------------------
    */

    Route::resource(
        'schedules',
        ScheduleController::class
    )->only([
        'index',
        'create',
        'store',
        'edit',
        'update',
        'destroy'
    ]);


    /*
    |--------------------------------------------------------------------------
    | Admin Fee Structures
    |--------------------------------------------------------------------------
    */

    Route::resource(
        'fee-structures',
        FeeStructureController::class
    )->except([
        'show'
    ]);


    /*
    |--------------------------------------------------------------------------
    | Admin Fee Management
    |--------------------------------------------------------------------------
    */

    Route::resource(
        'fees',
        FeeController::class
    );


    /*
    |--------------------------------------------------------------------------
    | Receive Payment - Select Student
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/fee-payments/create',
        [FeePaymentController::class, 'create']
    )->name('fee-payments.create');


    /*
    |--------------------------------------------------------------------------
    | Receive Payment - Selected Fee
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/fees/{fee}/payments/create',
        [FeePaymentController::class, 'paymentForm']
    )->name('fees.payments.create');


    /*
    |--------------------------------------------------------------------------
    | Store Payment
    |--------------------------------------------------------------------------
    */

    Route::post(
        '/fees/{fee}/payments',
        [FeePaymentController::class, 'store']
    )->name('fees.payments.store');


    /*
    |--------------------------------------------------------------------------
    | Payment Receipt
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/fee-payments/{feePayment}/receipt',
        [FeePaymentController::class, 'receipt']
    )->name('fee-payments.receipt');

});


/*
|--------------------------------------------------------------------------
| Student Routes
|--------------------------------------------------------------------------
*/

Route::middleware('student')->group(function () {

    /*
    |--------------------------------------------------------------------------
    | Student Dashboard
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/student/dashboard',
        [StudentDashboardController::class, 'index']
    )->name('student.dashboard');


    /*
    |--------------------------------------------------------------------------
    | Student Timetable
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/student/timetable',
        [StudentDashboardController::class, 'timetable']
    )->name('student.timetable');


    /*
    |--------------------------------------------------------------------------
    | Student Attendance
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/student/attendance',
        [StudentDashboardController::class, 'attendance']
    )->name('student.attendance');


    /*
    |--------------------------------------------------------------------------
    | Student Subjects
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/student/subjects',
        [StudentDashboardController::class, 'subjects']
    )->name('student.subjects');


    /*
    |--------------------------------------------------------------------------
    | Student Results
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/student/results',
        [StudentDashboardController::class, 'results']
    )->name('student.results');


    /*
    |--------------------------------------------------------------------------
    | Student Fees
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/student/fees',
        [StudentDashboardController::class, 'fees']
    )->name('student.fees');

});


/*
|--------------------------------------------------------------------------
| Teacher Routes
|--------------------------------------------------------------------------
*/

Route::middleware('teacher')->group(function () {

    /*
    |--------------------------------------------------------------------------
    | Teacher Dashboard
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/teacher/dashboard',
        [TeacherDashboardController::class, 'index']
    )->name('teacher.dashboard');


    /*
    |--------------------------------------------------------------------------
    | Teacher Timetable
    |--------------------------------------------------------------------------
    |
    | Teacher sees ONLY their own timetable.
    |
    */

    Route::get(
        '/teacher/timetable',
        [TeacherDashboardController::class, 'timetable']
    )->name('teacher.timetable');


    /*
    |--------------------------------------------------------------------------
    | Teacher Assignments
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/teacher/assignments',
        [TeacherDashboardController::class, 'assignments']
    )->name('teacher.assignments');


    /*
    |--------------------------------------------------------------------------
    | Teacher Subjects
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/teacher/subjects',
        [TeacherDashboardController::class, 'subjects']
    )->name('teacher.subjects');


    /*
    |--------------------------------------------------------------------------
    | Teacher Classes
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/teacher/classes',
        [TeacherDashboardController::class, 'classes']
    )->name('teacher.classes');


    /*
    |--------------------------------------------------------------------------
    | Teacher Profile
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/teacher/profile',
        [TeacherDashboardController::class, 'profile']
    )->name('teacher.profile');


    /*
    |--------------------------------------------------------------------------
    | Teacher Security
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/teacher/change-password',
        [TeacherDashboardController::class, 'changePassword']
    )->name('teacher.change-password');

    Route::post(
        '/teacher/change-password',
        [TeacherDashboardController::class, 'updatePassword']
    )->name('teacher.update-password');


    /*
    |--------------------------------------------------------------------------
    | Teacher Attendance
    |--------------------------------------------------------------------------
    */

    Route::get(
        '/teacher/attendance',
        [AttendanceController::class, 'index']
    )->name('teacher.attendance.index');

    Route::get(
        '/teacher/attendance/create',
        [AttendanceController::class, 'create']
    )->name('teacher.attendance.create');

    Route::get(
        '/teacher/attendance/students',
        [AttendanceController::class, 'students']
    )->name('teacher.attendance.students');

    Route::post(
        '/teacher/attendance',
        [AttendanceController::class, 'store']
    )->name('teacher.attendance.store');

});


/*
|--------------------------------------------------------------------------
| Exams
|--------------------------------------------------------------------------
*/

Route::resource(
    'exams',
    ExamController::class
)->except([
    'show'
]);


/*
|--------------------------------------------------------------------------
| Results
|--------------------------------------------------------------------------
*/

Route::resource(
    'results',
    ResultController::class
);