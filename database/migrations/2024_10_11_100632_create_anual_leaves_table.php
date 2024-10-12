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
        Schema::create('anual_leaves', function (Blueprint $table) {
            $table->increments('leave_id');
            $table->integer('employee_id')->unsigned();
            $table->year('year');
            $table->integer('leaves_total');
            $table->integer('leaves_used');
            $table->integer('leaves_remaining');
            $table->foreign('employee_id')->references('employee_id')->on('accounts');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anual_leaves');
    }
};
