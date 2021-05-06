<?php

namespace App\Models\Blog;

use Illuminate\Database\Eloquent\Model;

class BlogDestination extends Model
{
    protected $guarded=[];
    protected $primaryKey = 'blog_destination_id';

    public function travel_blog()
    {
        return $this->belongsTo('App\Models\Blog\TravelBlog','travel_blog_id');
    }
}
