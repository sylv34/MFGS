<?php

namespace mfgs;

use Illuminate\Database\Eloquent\Model;

class statuDdi extends Model
{
    public function ddi()
    {
    	return $this->hasMany('mfgs\ddi');
    }
}
