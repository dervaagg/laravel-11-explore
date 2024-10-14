<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->bigInteger('nik')->primary();
            $table->integer('employee_id')->unsigned();
            $table->string('name', 255);
            $table->enum('position', ['Karyawan', 'Manager', 'Direktur', 'HRGA']);
            $table->integer('department_id')->unsigned()->nullable(); // Menjadi nullable
            $table->integer('fingerprint_id')->nullable();
            $table->boolean('is_manager')->default(false);
            $table->boolean('is_hrga')->default(false);
            $table->integer('leave_balance')->default(0);
            $table->decimal('basic_salary', 10, 2);
            $table->decimal('position_allowance', 10, 2);
            $table->decimal('health_allowance', 10, 2);
            $table->decimal('pension_allowance', 10, 2);
            $table->decimal('communication_allowance', 10, 2);
            $table->timestamps();

            // Menambahkan foreign key constraint untuk department_id
            $table->foreign('department_id')->references('department_id')->on('departments')->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
