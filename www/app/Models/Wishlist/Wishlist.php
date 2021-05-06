<?php

namespace App\Models\Wishlist;

use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    protected $guarded=[];
    protected $primaryKey = 'wishlist_id';
    public function package()
    {
        return $this->belongsTo('App\Models\Package\Package','package_id');
    }
    public function customer()
    {
        return $this->belongsTo('App\Models\Customer\Customer','customer_id');
    }

}
