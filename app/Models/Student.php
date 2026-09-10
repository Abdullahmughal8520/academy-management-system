<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Student extends Model
{
    protected $fillable = [
        'user_id',
        'student_code',
        'first_name',
        'last_name',
        'father_name',
        'date_of_birth',
        'gender',
        'phone',
        'email',
        'address',
        'admission_date',
        'academy_class_id',
        'group_id',
        'status',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function academyClass(): BelongsTo
    {
        return $this->belongsTo(AcademyClass::class);
    }

    public function group(): BelongsTo
    {
        return $this->belongsTo(Group::class);
    }

    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }
public function fees()
{
    return $this->hasMany(\App\Models\Fee::class);
}
}
