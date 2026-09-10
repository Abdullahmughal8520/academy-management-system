<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FeePayment extends Model
{
    protected $fillable = [
        'fee_id',
        'receipt_number',
        'amount',
        'payment_date',
        'payment_method',
        'transaction_reference',
        'remarks',
    ];

    protected $casts = [
        'amount' => 'decimal:2',
        'payment_date' => 'date',
    ];

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */

    public function fee(): BelongsTo
    {
        return $this->belongsTo(Fee::class);
    }

    /*
    |--------------------------------------------------------------------------
    | Student Relationship Through Fee
    |--------------------------------------------------------------------------
    */

    public function student()
    {
        return $this->hasOneThrough(
            Student::class,
            Fee::class,
            'id',          // Foreign key on fees table
            'id',          // Foreign key on students table
            'fee_id',      // Local key on fee_payments table
            'student_id'   // Local key on fees table
        );
    }
}