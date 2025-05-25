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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // FK to users table
            $table->unsignedBigInteger('movie_schedule_id'); // FK to movie_schedules table
            $table->unsignedBigInteger('seat_id'); // FK to seats table
            $table->unsignedBigInteger('group_id')->nullable(); // For group bookings
            $table->enum('status', ['booked', 'cancelled'])->default('booked');
            $table->string('selected_date'); // Date of the booking
            $table->string('selected_time'); // Time of the booking

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('movie_schedule_id')->references('id')->on('movie_schedules')->onDelete('cascade');
            $table->foreign('seat_id')->references('id')->on('seats')->onDelete('cascade');

            // Prevent double-booking the same seat for the same schedule
            $table->unique(['movie_schedule_id', 'seat_id']);
            $table->string('slug');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
