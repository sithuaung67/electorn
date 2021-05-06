<?php

namespace App\Models\Join;

use Illuminate\Database\Eloquent\Model;

class Join extends Model
{
    protected $guarded=[];
    protected $primaryKey = 'join_id';
    public function package()
    {
        return $this->belongsTo('App\Models\Package\Package','package_id');
    }
    public function destination()
    {
        return $this->belongsTo('App\Models\Destination\Destination','destination_id');
    }
    public function country()
    {
        return $this->belongsTo('App\Models\Country\Country','country_id');
    }
    public function travel_blog()
    {
        return $this->belongsTo('App\Models\Blog\TravelBlog','destination_id');
    }
}
