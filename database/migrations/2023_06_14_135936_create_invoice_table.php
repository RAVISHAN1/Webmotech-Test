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
        Schema::create('invoice', function (Blueprint $table) {
            $table->bigInteger('id', 20)->unsigned();
            $table->integer('invoice_no');
            $table->integer('external_patient_id');
            $table->integer('practitioner_id');
            $table->integer('external_user_id');
            $table->date('date');
            $table->float('total_amount');
            $table->timestamps();
            $table->integer('clinic_id');
            $table->integer('course_id')->nullable();
            $table->text('invoice_display')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoice');
    }
};
