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
    Schema::create('students', function (Blueprint $table) {
        $table->id();

        $table->string('student_code')->unique();

        $table->string('first_name');
        $table->string('last_name')->nullable();

        $table->string('father_name');

        $table->date('date_of_birth')->nullable();

        $table->enum('gender', ['male', 'female', 'other'])->nullable();

        $table->string('phone')->nullable();
        $table->string('email')->nullable();

        $table->text('address')->nullable();

        $table->date('admission_date');

        $table->enum('status', ['active', 'inactive'])->default('active');

        $table->timestamps();
    });
}



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
