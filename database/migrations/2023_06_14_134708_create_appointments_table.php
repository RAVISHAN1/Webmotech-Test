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
        Schema::create('appointments', function (Blueprint $table) {
            $table->bigInteger('id', 20)->unsigned();
            $table->string('appointment_id');
            $table->integer('external_patient_id');
            $table->integer('practitioner_id')->nullable();
            $table->integer('user_id')->nullable();
            $table->string('appointment_status')->nullable();
            $table->datetime('appointment_date')->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->integer('course_id')->nullable();
            $table->timestamp('status_cancellation_time')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
