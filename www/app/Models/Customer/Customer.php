<?php

namespace App\Models\Customer;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $guarded=[];
    protected $primaryKey = 'customer_id';
    public function booking()
    {
        return $this->hasMany('App\Models\Booking\Booking','customer_id','customer_id');
    }
    public function wishlist()
    {
        return $this->hasMany('App\Models\Wishlist\Wishlist','customer_id','customer_id');
    }
    public function hotel_booking()
    {
        return $this->hasMany('App\Models\Hotel\HotelBooking','customer_id','customer_id');
    }

}
