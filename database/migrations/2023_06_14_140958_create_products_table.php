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
        Schema::create('products', function (Blueprint $table) {
            $table->bigInteger('id', 20)->unsigned();
            $table->integer('external_product_id');
            $table->integer('external_product_category_id');
            $table->integer('external_product_group_id');
            $table->string('name');
            $table->integer('status')->default(1);
            $table->timestamps();
            $table->integer('course_allowed');
            $table->float('unit_price');
            $table->integer('appointment_length')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
