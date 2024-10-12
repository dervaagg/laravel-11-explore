<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PayrollHistoryModel extends Model
{
    use HasFactory;

    protected $primaryKey = 'history_id';
    protected $fillable = [
        'employee_id',
        'month',
        'year',
        'basic_salary',
        'position_allowance',
        'health_allowance',
        'pension_allowance',
        'communication_allowance',
        'meal_allowance',
        'transport_allowance',
        'bonus',
        'overtime_pay',
        'total_hours_overtime',
        'jamsostek_jht',
        'tax_employee',
        'koprasi_deduction',
        'other_deductions',
        'total_salary'
    ];

    public function employee()
    {
        return $this->belongsTo(AccountModel::class, 'employee_id');
    }
}
