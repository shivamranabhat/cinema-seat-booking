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
        Schema::create('seats', function (Blueprint $table) {
            $table->id();
           $table->unsignedBigInteger('theater_id'); // FK to theaters table
            $table->string('row', 2);                // E.g. 'A', 'B', etc.
            $table->unsignedInteger('number');        // E.g. 1, 2, 3...
            $table->string('label');        // E.g. 'A10'
            $table->enum('type', ['standard', 'vip', 'accessible'])->default('standard');
            $table->string('price');
            $table->foreign('theater_id')->references('id')->on('theaters')->onDelete('cascade');
            $table->string('slug');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seats');
    }
};
