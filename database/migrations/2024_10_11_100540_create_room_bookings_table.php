<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('room_bookings', function (Blueprint $table) {
            $table->increments('booking_id');
            $table->integer('employee_id')->unsigned();
            $table->integer('room_id')->unsigned();
            $table->date('booking_date');
            $table->time('start_time');
            $table->time('end_time');
            $table->string('status');
            $table->integer('usage_duration');
            $table->integer('requested_by');
            $table->boolean('approved_by_hrga')->default(false);
            $table->boolean('verbal_booking')->default(false);
            $table->foreign('employee_id')->references('employee_id')->on('users');
            $table->foreign('room_id')->references('room_id')->on('rooms');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('room_bookings');
    }
};
