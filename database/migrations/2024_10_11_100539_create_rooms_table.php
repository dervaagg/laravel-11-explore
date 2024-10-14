<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->increments('room_id'); // Pastikan ini adalah primary key
            $table->string('room_name', 255);
            $table->string('availability', 50);
            $table->time('current_usage_start_time')->nullable();
            $table->time('current_usage_end_time')->nullable();
            $table->string('booking_status', 50);
            $table->string('usage_time', 50);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};
