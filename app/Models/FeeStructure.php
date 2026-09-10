<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class FeeStructure extends Model
{
    protected $fillable = [
        'academy_class_id',
        'group_id',
        'monthly_fee',
        'admission_fee',
        'exam_fee',
        'other_fee',
        'default_discount',
        'effective_from',
        'status',
    ];

    protected $casts = [
        'monthly_fee' => 'decimal:2',
        'admission_fee' => 'decimal:2',
        'exam_fee' => 'decimal:2',
        'other_fee' => 'decimal:2',
        'default_discount' => 'decimal:2',
        'effective_from' => 'date',
        'status' => 'boolean',
    ];

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */

    public function academyClass(): BelongsTo
    {
        return $this->belongsTo(AcademyClass::class);
    }

    public function group(): BelongsTo
    {
        return $this->belongsTo(Group::class);
    }

    public function fees(): HasMany
    {
        return $this->hasMany(Fee::class);
    }
}