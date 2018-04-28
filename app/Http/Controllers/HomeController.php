<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\{User,droit};
use App\Helplers\helpers;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //$poles= droit::where('id','<>',Auth::user()->droit->id)->get();
        //$poles=$poles->unique('libelle')
        //            ->filter(function($value){
        //                return $value->id!=18;
        return view(nameViewForUser());
        
    }
}
