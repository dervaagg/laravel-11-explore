<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomModel extends Model
{
    use HasFactory;

    protected $primaryKey = 'room_id';
    protected $fillable = ['room_name', 'availability', 'current_usage_start_time', 'current_usage_end_time', 'booking_status', 'usage_time'];

    public function roomBookings()
    {
        return $this->hasMany(RoomBookingModel::class, 'room_id');
    }
}
