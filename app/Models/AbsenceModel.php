<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AbsenceModel extends Model
{
    use HasFactory;

    protected $primaryKey = 'absence_id';
    protected $fillable = [
        'employee_id',
        'date',
        'absence_code',
        'description',
        'duration',
        'start_date',
        'end_date',
        'document',
        'absence_type'
    ];

    public function account()
    {
        return $this->belongsTo(AccountModel::class, 'employee_id');
    }

    public function absenceDetails()
    {
        return $this->belongsTo(AbsenceDetailModel::class, 'absence_code');
    }

    public function approval()
    {
        return $this->hasOne(ApprovalModel::class, 'absence_id');
    }
}
