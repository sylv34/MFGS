<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ddi extends Model
{
	public $timestamps =false;

	protected $fillable = [
        'titre',
        'contenu',
        'date_demande',
        'droit_id',
        'demandeur_user_id',
        'concerne_user_id',
        'urgence_ddi_id',
    ];
	
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
		return $this->belongsTo('App\urgenceDdi');
	}

	public function statu_ddi()
	{
		return $this->belongsTo('App\StatuDdi');
	}
	public function isUrgent(){
		return $this->urgence_ddi->id==4 ? 'bg-danger text-white font-weight-bold' : '';
	}
}
