<?php

namespace App\Models\Hotel;

use Illuminate\Database\Eloquent\Model;

class HotelBooking extends Model
{
    protected $guarded=[];
    public function hotel()
    {
        return $this->belongsTo('App\Models\Hotel\Hotel','hotel_id');
    }
    public function customer()
    {
        return $this->belongsTo('App\Models\Customer\Customer','customer_id');
    }
    public function status()
    {
        return $this->belongsTo('App\Models\Booking\BookingStatus','booking_status_id');
    }
    
}
