<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccountModel extends Model
{
    use HasFactory;

    protected $primaryKey = 'employee_id'; // Primary key sesuai dengan tabel accounts
    protected $fillable = ['username', 'password', 'role'];

    // Relasi dengan Employee
    public function employee()
    {
        return $this->belongsTo(EmployeeModel::class, 'employee_id'); // Relasi ke EmployeeModel
    }

    // Relasi ke Absences
    public function absences()
    {
        return $this->employee()->hasMany(AbsenceModel::class, 'employee_id'); // Menggunakan relasi employee
    }

    // Relasi ke Annual Leaves
    public function annualLeaves()
    {
        return $this->employee()->hasMany(AnualLeaveModel::class, 'employee_id'); // Menggunakan relasi employee
    }

    // Relasi ke Overtimes
    public function overtimes()
    {
        return $this->employee()->hasMany(OvertimeModel::class, 'employee_id'); // Menggunakan relasi employee
    }

    // Relasi ke Room Bookings
    public function roomBookings()
    {
        return $this->employee()->hasMany(RoomBookingModel::class, 'employee_id'); // Menggunakan relasi employee
    }

    // Relasi ke Payrolls
    public function payrolls()
    {
        return $this->employee()->hasMany(PayrollModel::class, 'employee_id'); // Menggunakan relasi employee
    }

    // Relasi ke Payroll Histories
    public function payrollHistories()
    {
        return $this->employee()->hasMany(PayrollHistoryModel::class, 'employee_id'); // Menggunakan relasi employee
    }
}
