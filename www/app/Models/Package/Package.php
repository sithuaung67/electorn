<?php

namespace App\Models\Package;

use Illuminate\Database\Eloquent\Model;


class Package extends Model
{
    protected $guarded=[];
    protected $primaryKey = 'package_id';
    public function booking()
    {
        return $this->hasMany('App\Models\Booking\Booking','package_id','package_id');
    }
    public function wishlist()
    {
        return $this->hasOne('App\Models\Wishlist\Wishlist','package_id','package_id');
    }
    public function tourgroup()
    {
        return $this->hasMany('App\Models\TourGroup\TourGroup','package_id','package_id');
    }
    public function package_image()
    {
        return $this->hasMany('App\Models\Package\PackageImage','package_id','package_id');
    }

}
