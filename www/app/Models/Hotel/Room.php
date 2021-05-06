<?php

namespace App\Models\Hotel;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $guarded=[];
    protected $primaryKey = 'room_id';
    public function hotel()
    {
        return $this->belongsTo('App\Models\Hotel\Hotel','hotel_id');
    }
}
