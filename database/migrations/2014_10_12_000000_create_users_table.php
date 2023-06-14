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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->integer('external_user_id');
            $table->string('fname');
            $table->string('lname');
            $table->string('username')->nullable();
            $table->integer('user_group_id')->default(0);
            $table->integer('is_practitioner')->default(0);
            $table->string('email')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->string('remember_token')->nullable(); 
            $table->timestamps();
            $table->integer('clinic_id')->nullable();
            $table->integer('status')->default(1);
            $table->integer('is_user')->default(0);
            $table->integer('is_first_login')->default(1);
            $table->string('job_title')->nullable();
            $table->integer('job_designations_id')->nullable();
            $table->tinyInteger('filter_col')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
