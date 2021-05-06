<?php

namespace App\Models\Hotel;

use Illuminate\Database\Eloquent\Model;

class HotelImage extends Model
{
    protected $guarded=[];
    protected $primaryKey = 'hotel_image_id';
    public function hotel()
    {
        return $this->belongsTo('App\Models\Hotel\Hotel','hotel_id');
    }
}
