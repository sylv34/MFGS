<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class droit extends Model
{
	public $timestamps =false;

	
    public function user()
    {
    	return $this->hasMany('App\user');
    }

    public function ddi()
    {
    	return $this->hasMany('App\ddi');
    }

    public function notes()
    {
    	return $this->belongsToMany('App\note');
    }
}
