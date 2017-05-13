<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{

    protected $dates = ['finished_at'];

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function donations()
    {
        return $this->hasMany('App\Donation');
    }
}
