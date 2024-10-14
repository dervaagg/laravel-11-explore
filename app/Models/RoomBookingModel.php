<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomBookingModel extends Model
{
    use HasFactory;

    protected $primaryKey = 'booking_id';
    protected $fillable = [
        'employee_id',
        'room_id',
        'booking_date',
        'start_time',
        'end_time',
        'status',
        'usage_duration',
        'requested_by',
        'approved_by_hrga',
        'verbal_booking'
    ];

    public function room()
    {
        return $this->belongsTo(RoomModel::class, 'room_id');
    }

    public function employee()
    {
        return $this->belongsTo(User::class, 'employee_id');
    }
}
