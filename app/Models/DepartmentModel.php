<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DepartmentModel extends Model
{
    use HasFactory;

    protected $primaryKey = 'department_id';
    protected $fillable = ['department_name', 'manager_id'];

    public function manager()
    {
        return $this->belongsTo(EmployeeModel::class, 'manager_id');
    }

    public function employees()
    {
        return $this->hasMany(EmployeeModel::class, 'department_id');
    }
}
