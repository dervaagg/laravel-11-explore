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
        Schema::create('payrolls', function (Blueprint $table) {
            $table->increments('payroll_id');
            $table->integer('employee_id')->unsigned();
            $table->string('month');
            $table->integer('year');
            $table->decimal('basic_salary', 10, 2);
            $table->decimal('position_allowance', 10, 2);
            $table->decimal('health_allowance', 10, 2);
            $table->decimal('pension_allowance', 10, 2);
            $table->decimal('communication_allowance', 10, 2);
            $table->decimal('meal_allowance', 10, 2);
            $table->decimal('transport_allowance', 10, 2);
            $table->decimal('bonus', 10, 2);
            $table->decimal('overtime_pay', 10, 2);
            $table->integer('total_hours_overtime');
            $table->decimal('jamsostek_jht', 10, 2);
            $table->decimal('tax_employee', 10, 2);
            $table->decimal('koprasi_deduction', 10, 2);
            $table->decimal('other_deductions', 10, 2);
            $table->decimal('total_salary', 10, 2);
            $table->foreign('employee_id')->references('employee_id')->on('accounts');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payrolls');
    }
};
