<?php

namespace App\Models\Hotel;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    protected $guarded=[];
    protected $primaryKey = 'hotel_id';
    public function hotel_booking()
    {
        return $this->hasMany('App\Models\Hotel\HotelBooking','hotel_id','hotel_id');
    }
    public function hotel_wishlist()
    {
        return $this->hasOne('App\Models\Hotel\HotelWishlist','hotel_id','hotel_id');
    }
    public function hotel_image()
    {
        return $this->hasMany('App\Models\Hotel\HotelImage','hotel_id','hotel_id');
    }
    public function room()
    {
        return $this->hasMany('App\Models\Hotel\Room','hotel_id','hotel_id');
    }
    public function state()
    {
        return $this->hasOne('App\Models\Hotel\State','state_id','state_id');
    }
    public function city()
    {
        return $this->hasOne('App\Models\Hotel\City','city_id','city_id');
    }
}
