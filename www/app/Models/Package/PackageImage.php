<?php

namespace App\Models\Package;

use Illuminate\Database\Eloquent\Model;

class PackageImage extends Model
{
    protected $guarded=[];
    protected $primaryKey = 'package_image_id';
    
    public function package()
    {
        return $this->belongsTo('App\Models\Package\Package','package_id');
    }
}
