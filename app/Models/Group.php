<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\AcademyClass;

class Group extends Model
{
    protected $fillable = [
        'academy_class_id',
        'name',
        'description',
        'status',
    ];

    public function academyClass()
    {
        return $this->belongsTo(AcademyClass::class);
    }

    public function subjects()
        {
            return $this->hasMany(Subject::class);
        }
}