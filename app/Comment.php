<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

    protected $fillable = ['name', 'comment'];

    public function project()
    {
        return $this->belongsTo('App\Project');
    }
}
