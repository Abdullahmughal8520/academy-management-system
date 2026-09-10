<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Exam extends Model
{
    protected $fillable = [
        'name',
        'academic_year',
        'exam_date',
        'status',
    ];

    protected $casts = [
        'exam_date' => 'date',
    ];

    public function results(): HasMany
    {
        return $this->hasMany(Result::class);
    }
}