<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('fees', function (Blueprint $table) {
            $table->id();

            $table->foreignId('student_id')
                ->constrained('students')
                ->cascadeOnDelete();

            $table->foreignId('fee_structure_id')
                ->nullable()
                ->constrained('fee_structures')
                ->nullOnDelete();

            $table->string('fee_month', 7); // Example: 2026-09

            $table->decimal('total_amount', 10, 2)->default(0);
            $table->decimal('discount', 10, 2)->default(0);
            $table->decimal('payable_amount', 10, 2)->default(0);
            $table->decimal('paid_amount', 10, 2)->default(0);
            $table->decimal('remaining_amount', 10, 2)->default(0);

            $table->date('due_date')->nullable();

            $table->enum('status', [
                'unpaid',
                'partial',
                'paid',
                'overdue'
            ])->default('unpaid');

            $table->text('remarks')->nullable();

            $table->timestamps();

            $table->unique(['student_id', 'fee_month']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('fees');
    }
};