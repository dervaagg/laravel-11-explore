<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->integer('employee_id')->unsigned()->primary(); // Mengubah menjadi primary key
            $table->string('username', 255);
            $table->string('password'); // Pastikan panjang sesuai kebutuhan
            $table->enum('role', ['Karyawan', 'Manager', 'Direktur', 'HRGA', 'Administrator']); // Menambahkan role sesuai kebutuhan

            // Menambahkan foreign key
            $table->foreign('employee_id')->references('employee_id')->on('employees')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('accounts');
    }
};
