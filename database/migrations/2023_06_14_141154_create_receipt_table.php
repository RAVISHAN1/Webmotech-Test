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
        Schema::create('receipt', function (Blueprint $table) {
            $table->id();
            $table->integer('receipt_id');
            $table->integer('external_patient_id');
            $table->integer('user_id');
            $table->integer('clinic_id');
            $table->date('receipt_date');
            $table->float('amount');
            $table->float('allocation');
            $table->timestamps();
            $table->timestamp('receipt_created_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('receipt');
    }
};
