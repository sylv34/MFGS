<?php

namespace mfgs;

use Illuminate\Database\Eloquent\Model;

class urgenceDdi extends Model
{
    public function ddi()
    {
    	return $this->hasMany('mfgs\ddi');
    }
}
