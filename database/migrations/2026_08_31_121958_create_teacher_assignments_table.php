<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
  public function up(): void
{
    Schema::create('teacher_assignments', function (Blueprint $table) {
        $table->id();

        $table->foreignId('teacher_id')
            ->constrained('teachers')
            ->cascadeOnDelete();

        $table->foreignId('academy_class_id')
            ->constrained('academy_classes')
            ->cascadeOnDelete();

        $table->foreignId('group_id')
            ->constrained('groups')
            ->cascadeOnDelete();

        $table->foreignId('subject_id')
            ->constrained('subjects')
            ->cascadeOnDelete();

        $table->timestamps();

        $table->unique(
    [
        'teacher_id',
        'academy_class_id',
        'group_id',
        'subject_id'
    ],
    'teacher_assignment_unique'
);
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teacher_assignments');
    }
};
