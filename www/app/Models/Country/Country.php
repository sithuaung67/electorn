<?php

namespace App\Models\Country;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $guarded=[];
    protected $primaryKey = 'country_id';
    public function join()
    {
        return $this->hasMany('App\Models\Join\Join','country_id','country_id');
    }
    public function destination()
    {
        return $this->hasMany('App\Models\Destination\Destination','country_id','country_id');
    }
}
