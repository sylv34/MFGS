<?php

namespace mfgs;

use Illuminate\Database\Eloquent\Model;

class note extends Model
{
    protected $fillable = ['titre', 'datePublication', 'path'];
	public $timestamps =false;

    public function droits()
    {
    	return $this->belongsToMany('mfgs\droit');
    }
}
