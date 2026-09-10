<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('result_items', function (Blueprint $table) {
            $table->id();

            $table->foreignId('result_id')
                ->constrained('results')
                ->cascadeOnDelete();

            $table->foreignId('subject_id')
                ->constrained('subjects')
                ->cascadeOnDelete();

            $table->decimal('total_marks', 8, 2);

            $table->decimal('obtained_marks', 8, 2);

            $table->decimal('percentage', 5, 2);

            $table->string('grade')->nullable();

            $table->timestamps();

            $table->unique([
                'result_id',
                'subject_id'
            ]);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('result_items');
    }
};