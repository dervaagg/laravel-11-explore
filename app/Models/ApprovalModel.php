<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApprovalModel extends Model
{
    use HasFactory;

    protected $primaryKey = 'approval_id';
    protected $fillable = [
        'absence_id',
        'approval_status',
        'approval_date',
        'approved_by_manager',
        'approved_by_hrga',
        'approved_by_director',
        'submission_time'
    ];

    public function absence()
    {
        return $this->belongsTo(AbsenceModel::class, 'absence_id');
    }

    public function manager()
    {
        return $this->belongsTo(EmployeeModel::class, 'approved_by_manager');
    }

    public function hrga()
    {
        return $this->belongsTo(EmployeeModel::class, 'approved_by_hrga');
    }

    public function director()
    {
        return $this->belongsTo(EmployeeModel::class, 'approved_by_director');
    }
}
