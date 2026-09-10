<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $fillable = [
        'teacher_assignment_id',
        'day',
        'start_time',
        'end_time',
        'room',
        'status',
    ];

    public function teacherAssignment()
    {
        return $this->belongsTo(TeacherAssignment::class);
    }
}
