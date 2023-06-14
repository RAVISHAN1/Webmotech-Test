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
        Schema::create('invoice_items', function (Blueprint $table) {
            $table->integer('invoice_id');
            $table->integer('invoice_item_id');
            $table->integer('patient_id');
            $table->integer('practitioner_id');
            $table->string('line_description');
            $table->integer('quantity');
            $table->float('unit_price');
            $table->float('unit_total');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoice_items');
    }
};
