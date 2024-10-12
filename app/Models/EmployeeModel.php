<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeModel extends Model
{
    use HasFactory;

    protected $primaryKey = 'employee_id';
    protected $fillable = [
        'nik',
        'name',
        'position',
        'department_id',
        'fingerprint_id',
        'is_manager',
        'is_hrga',
        'leave_balance',
        'basic_salary',
        'position_allowance',
        'health_allowance',
        'pension_allowance',
        'communication_allowance'
    ];

    public function department()
    {
        return $this->belongsTo(DepartmentModel::class, 'department_id');
    }

    public function managerOfDepartment()
    {
        return $this->hasOne(DepartmentModel::class, 'manager_id');
    }

    public function absences()
    {
        return $this->hasMany(AbsenceModel::class, 'employee_id');
    }

    public function overtimes()
    {
        return $this->hasMany(OvertimeModel::class, 'employee_id');
    }

    public function anualLeaves()
    {
        return $this->hasMany(AnualLeaveModel::class, 'employee_id');
    }

    public function approvals()
    {
        return $this->hasMany(ApprovalModel::class, 'approved_by_manager');
    }
}
