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
        Schema::create('approvals', function (Blueprint $table) {
            $table->increments('approval_id');
            $table->integer('absence_id')->unsigned();
            $table->enum('approval_status', ['Pending', 'Approve', 'Rejected']);
            $table->date('approval_date');
            $table->integer('approved_by_manager')->unsigned()->nullable();
            $table->integer('approved_by_hrga')->unsigned()->nullable();
            $table->integer('approved_by_director')->unsigned()->nullable();
            $table->time('submission_time');
            $table->foreign('absence_id')->references('absence_id')->on('absences');
            $table->foreign('approved_by_manager')->references('employee_id')->on('accounts');
            $table->foreign('approved_by_hrga')->references('employee_id')->on('accounts');
            $table->foreign('approved_by_director')->references('employee_id')->on('accounts');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('approvals');
    }
};
