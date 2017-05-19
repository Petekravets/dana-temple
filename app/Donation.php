<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Donation extends Model
{

    protected $fillable = ['name', 'donate'];

    public static function anonimCheck($request)
    {
        if($request->has('anonim')) {
            $request->merge(['name' => 'Доброжелатель']);
        }
        return $request;
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function project()
    {
        return $this->belongsTo('App\Project');
    }
}
