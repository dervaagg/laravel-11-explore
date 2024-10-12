<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnualLeaveModel extends Model
{
    use HasFactory;

    protected $primaryKey = 'leave_id';
    protected $fillable = ['employee_id', 'year', 'leaves_total', 'leaves_used', 'leaves_remaining'];

    public function account()
    {
        return $this->belongsTo(AccountModel::class, 'employee_id');
    }
}
