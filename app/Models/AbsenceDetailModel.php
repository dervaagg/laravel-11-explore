<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AbsenceDetailModel extends Model
{
    use HasFactory;

    protected $primaryKey = 'absence_code';
    protected $fillable = ['description'];

    public function absences()
    {
        return $this->hasMany(AbsenceModel::class, 'absence_code');
    }
}
