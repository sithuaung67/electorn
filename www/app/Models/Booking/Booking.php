<?php

namespace App\Models\Booking;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $guarded=[];
    public function package()
    {
        return $this->belongsTo('App\Models\Package\Package','package_id');
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
