<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Teacher extends Model
{
    protected $fillable = [
        'teacher_code',
        'first_name',
        'last_name',
        'phone',
        'email',
        'qualification',
        'joining_date',
        'status',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function teacherAssignments()
{
    return $this->hasMany(TeacherAssignment::class);
}

public function attendances()
{
    return $this->hasMany(Attendance::class);
}

}
