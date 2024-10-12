<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccountModel extends Model
{
    use HasFactory;

    protected $primaryKey = 'employee_id';
    protected $fillable = ['username', 'password', 'role'];

    public function employee()
    {
        return $this->belongsTo(EmployeeModel::class, 'employee_id');
    }

    public function absences()
    {
        return $this->hasMany(AbsenceModel::class, 'employee_id');
    }

    public function anualLeaves()
    {
        return $this->hasMany(AnualLeaveModel::class, 'employee_id');
    }

    public function overtimes()
    {
        return $this->hasMany(OvertimeModel::class, 'employee_id');
    }

    public function roomBookings()
    {
        return $this->hasMany(RoomBookingModel::class, 'employee_id');
    }

    public function payrolls()
    {
        return $this->hasMany(PayrollModel::class, 'employee_id');
    }

    public function payrollHistories()
    {
        return $this->hasMany(PayrollHistoryModel::class, 'employee_id');
    }
}
