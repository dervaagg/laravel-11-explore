<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('departments', function (Blueprint $table) {
            $table->increments('department_id');
            $table->string('department_name', 255);
            $table->integer('manager_id')->unsigned()->nullable(); // Nullable jika tidak ada
            $table->timestamps();

            // Pastikan foreign key mengacu pada employee_id yang valid
            $table->foreign('manager_id')->references('employee_id')->on('employees')->onDelete('set null');

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('departments');
    }
};