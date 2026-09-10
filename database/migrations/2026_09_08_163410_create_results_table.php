<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('results', function (Blueprint $table) {
            $table->id();

            $table->foreignId('student_id')
                ->constrained('students')
                ->cascadeOnDelete();

            $table->foreignId('exam_id')
                ->constrained('exams')
                ->cascadeOnDelete();

            $table->decimal('total_marks', 8, 2);

            $table->decimal('obtained_marks', 8, 2);

            $table->decimal('percentage', 5, 2);

            $table->string('grade')->nullable();

            $table->timestamps();

            $table->unique([
                'student_id',
                'exam_id'
            ]);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('results');
    }
};