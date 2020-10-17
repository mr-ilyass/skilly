<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{

    public function category()
    {
        // return $this->belongsTo('App\BlogPost', 'post_id', 'blog_post_id');
        return $this->belongsTo('App\Category');

    }
    public function episode()
    {
        return $this->hasMany('App\Episode');
    }
}
