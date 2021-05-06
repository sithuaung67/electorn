<?php

namespace App\Models\Hotel;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $guarded=[];
    protected $primaryKey = 'city_id';
    public function hotel()
    {
        return $this->belongsTo('App\Models\Hotel\Hotel','city_id');
    }
}
