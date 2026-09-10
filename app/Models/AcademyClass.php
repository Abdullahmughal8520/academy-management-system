<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AcademyClass extends Model
{
    protected $fillable = [
        'name',
        'description',
        'status',
    ];

    public function groups()
    {
        return $this->hasMany(Group::class);
    }

    public function subjects()
    {
        return $this->hasMany(Subject::class);
    }

    public function students()
    {
        return $this->hasMany(Student::class, 'academy_class_id');
    }
}
