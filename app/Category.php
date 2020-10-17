<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [

        'name','meta_keywords','meta_des','image'
    ];
    public function courses()
    {
        return $this->hasMany('App\Course');
    }
}
