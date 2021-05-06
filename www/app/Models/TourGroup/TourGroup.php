<?php

namespace App\Models\TourGroup;

use Illuminate\Database\Eloquent\Model;

class TourGroup extends Model
{
    protected $guarded=[];
    protected $primaryKey = 'tour_group_id';

    public function package()
    {
        return $this->belongsTo('App\Models\Package\Package','package_id');
    }
    public function tour_leader()
    {
        return $this->belongsTo('App\Models\TourLeader\TourLeader','tour_leader_id');
    }
}
