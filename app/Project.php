<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{

    protected $fillable = ['title', 'text', 'img', 'need_sum','current_sum', 'finish'];

    protected $dates = ['finished_at'];

    public function scopeCurrent($query)
    {
        return $query->where('finished_at', '<=', Carbon::now());
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function donations()
    {
        return $this->hasMany('App\Donation');
    }
}
