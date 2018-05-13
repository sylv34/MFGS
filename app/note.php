<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class note extends Model
{
    protected $fillable = ['titre', 'datePublication', 'path'];
	public $timestamps =false;

    public function droits()
    {
    	return $this->belongsToMany('App\droit');
    }
}
