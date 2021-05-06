<?php

namespace App\Models\Hotel;

use Illuminate\Database\Eloquent\Model;

class HotelWishlist extends Model
{
    protected $guarded=[];
    protected $primaryKey = 'hotel_wishlist_id';
    public function hotel()
    {
        return $this->belongsTo('App\Models\Hotel\Hotel','hotel_id');
    }
    public function customer()
    {
        return $this->belongsTo('App\Models\Customer\Customer','customer_id');
    }
}
