<?php

namespace App\Models\TourLeader;

use Illuminate\Database\Eloquent\Model;

class TourLeader extends Model
{
    protected $guarded=[];
    protected $primaryKey = 'tour_leader_id';
    public function tourgroup()
    {
        return $this->hasMany('App\Models\TourGroup\TourGroup','tour_leader_id','tour_leader_id');
    }
}
