<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nom', 'prenom','email', 'password','droit_id', 'isAdmin','remember_token'
    ];


    public $timestamps = false;

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password'
    ];

    public function droit()
    {
        return $this->belongsTo('App\droit');
    }

    public function is_concerne_ddi(){
        return $this->hasMany('App\ddi','concerne_user_id');
    }

    public function is_demandeur_ddi(){
        return $this->hasMany('App\ddi','demandeur_user_id');
    }

    public function link()
    {
        $this->belongsToMany('App\Link');
    }

    public function isCadre()
    {
        return $this->droit_id==1||$this->droit_id%2==0;
    }

}
