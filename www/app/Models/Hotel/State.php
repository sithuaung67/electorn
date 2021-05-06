<?php

namespace App\Models\Hotel;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    protected $guarded=[];
    protected $primaryKey = 'state_id';
    public function hotel()
    {
        return $this->belongsTo('App\Models\Hotel\Hotel','state_id');
    }
}
