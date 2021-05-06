<?php

namespace App\Models\Destination;

use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    protected $guarded=[];
    protected $primaryKey = 'destination_id';
    public function join()
    {
        return $this->hasMany('App\Models\Join\Join','destination_id','destination_id');
    }
    public function country()
    {
        return $this->belongsTo('App\Models\Country\Country','country_id');
    }
}
