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
        Schema::create('overtimes', function (Blueprint $table) {
            $table->increments('overtime_id');
            $table->integer('employee_id')->unsigned();
            $table->date('date');
            $table->time('start_time');
            $table->time('end_time');
            $table->enum('status', ['Pending', 'Approve', 'Rejected']);
            $table->integer('division_manager_id')->unsigned();
            $table->integer('director_id')->unsigned();
            $table->boolean('approved_by_hrga')->default(false);
            $table->time('submission_time');
            $table->integer('total_hours');
            $table->decimal('overtime_rate', 10, 2);
            $table->foreign('employee_id')->references('employee_id')->on('accounts');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('overtimes');
    }
};
