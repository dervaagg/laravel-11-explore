<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OvertimeModel extends Model
{
    use HasFactory;

    protected $primaryKey = 'overtime_id';
    protected $fillable = [
        'employee_id',
        'date',
        'start_time',
        'end_time',
        'status',
        'division_manager_id',
        'director_id',
        'approved_by_hrga',
        'submission_time',
        'total_hours',
        'overtime_rate'
    ];

    public function employee()
    {
        return $this->belongsTo(AccountModel::class, 'employee_id');
    }

    public function divisionManager()
    {
        return $this->belongsTo(AccountModel::class, 'division_manager_id');
    }

    public function director()
    {
        return $this->belongsTo(AccountModel::class, 'director_id');
    }
}
