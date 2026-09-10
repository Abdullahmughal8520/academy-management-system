<?php

namespace App\Models;

use App\Models\TeacherAssignment;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $fillable = [
        'student_id',
        'teacher_id',
        'academy_class_id',
        'group_id',
        'attendance_date',
        'status',
    ];

    protected $casts = [
        'attendance_date' => 'date',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    public function academyClass()
    {
        return $this->belongsTo(AcademyClass::class);
    }

    public function group()
    {
        return $this->belongsTo(Group::class);
    }
    public function teacherAssignment()
    {
        return $this->belongsTo(TeacherAssignment::class);
    }
}
