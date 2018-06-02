<?php

namespace mfgs;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    protected $fillable = ['nom', 'path', 'user_id'];
	public $timestamps =false;

    public function user()
    {
    	return $this->hasMany('mfgs\User');
    }
}
