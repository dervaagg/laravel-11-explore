<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'employee_id', // Add employee_id for linking with employee
        'role', // Add role for user
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Relationship with Employee
     */
    public function employee()
    {
        return $this->belongsTo(EmployeeModel::class, 'employee_id'); // Adjust this if needed
    }

    /**
     * Relationship with Absences
     */
    public function absences()
    {
        return $this->hasMany(AbsenceModel::class, 'employee_id', 'employee_id'); // Use employee_id for linking
    }

    /**
     * Relationship with Annual Leaves
     */
    public function annualLeaves()
    {
        return $this->hasMany(AnualLeaveModel::class, 'employee_id', 'employee_id'); // Use employee_id for linking
    }

    /**
     * Relationship with Overtimes
     */
    public function overtimes()
    {
        return $this->hasMany(OvertimeModel::class, 'employee_id', 'employee_id'); // Use employee_id for linking
    }

    /**
     * Relationship with Room Bookings
     */
    public function roomBookings()
    {
        return $this->hasMany(RoomBookingModel::class, 'employee_id', 'employee_id'); // Use employee_id for linking
    }

    /**
     * Relationship with Payrolls
     */
    public function payrolls()
    {
        return $this->hasMany(PayrollModel::class, 'employee_id', 'employee_id'); // Use employee_id for linking
    }

    /**
     * Relationship with Payroll Histories
     */
    public function payrollHistories()
    {
        return $this->hasMany(PayrollHistoryModel::class, 'employee_id', 'employee_id'); // Use employee_id for linking
    }
}
