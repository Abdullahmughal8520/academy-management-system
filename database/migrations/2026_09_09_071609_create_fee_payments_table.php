<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('fee_payments', function (Blueprint $table) {
            $table->id();

            $table->foreignId('fee_id')
                ->constrained('fees')
                ->cascadeOnDelete();

            $table->string('receipt_number')->unique();

            $table->decimal('amount', 10, 2);

            $table->date('payment_date');

            $table->enum('payment_method', [
                'cash',
                'bank',
                'online'
            ])->default('cash');

            $table->string('transaction_reference')->nullable();

            $table->text('remarks')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('fee_payments');
    }
};