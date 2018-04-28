<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ddi extends Model
{
	public $timestamps =false;
	
	public function droit()
	{
		return $this->belongsTo('App\droit');
	}

	public function concerne_user()
	{
		return $this->belongsTo('App\user');
	}

	public function demandeur_user()
	{
		return $this->belongsTo('App\user');
	}

	public function urgence_ddi()
	{
		return $this->belongsTo('App\Models\urgenceDdi');
	}

	public function statu_ddi()
	{
		return $this->belongsTo('App\Models\StatuDdi');
	}
}
