<?php

namespace mfgs;

use Illuminate\Database\Eloquent\Model;

class droit extends Model
{
	public $timestamps =false;

	
    public function user()
    {
    	return $this->hasMany('mfgs\user');
    }

    public function ddi()
    {
    	return $this->hasMany('mfgs\ddi');
    }

    public function notes()
    {
    	return $this->belongsToMany('mfgs\note');
    }
}
