<?php

namespace App\Models\Blog;

use Illuminate\Database\Eloquent\Model;

class TravelBlog extends Model
{
    protected $guarded=[];
    protected $primaryKey = 'travel_blog_id';
    public function join()
    {
        return $this->hasMany('App\Models\Join\Join','destination_id','destination_id');
    }
    public function blog_destination()
    {
        return $this->hasMany('App\Models\Blog\BlogDestiantion','travel_blog_id','travel_blog_id');
    }

}
