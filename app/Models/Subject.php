<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\AcademyClass;
use App\Models\Group;

class Subject extends Model
{
    protected $fillable = [
        'academy_class_id',
        'group_id',
        'name',
        'code',
        'description',
        'status',
    ];

    public function academyClass()
    {
        return $this->belongsTo(AcademyClass::class);
    }

    public function group()
    {
        return $this->belongsTo(Group::class);
    }
}