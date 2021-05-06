<?php

namespace App\Models\Booking;

use Illuminate\Database\Eloquent\Model;

class BookingStatus extends Model
{
    protected $guarded=[];
    protected $primaryKey = 'booking_status_id';
    public function booking()
    {
        return $this->hasMany('App\Models\Booing\Booing','booking_status_id','booking_status_id');
    }
    public function hotel_booking()
    {
        return $this->hasMany('App\Models\Hotel\HotelBooking','booking_status_id','booking_status_id');
    }
}
