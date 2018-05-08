<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\{User,droit,Link,ddi};
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
        $paginatorLinks=paginateAutoLinks();
        $Ddi= ddi::where([
                            ['droit_id', '=', Auth::User()->droit_id],
                            ['statu_ddi_id', '<>', 4]
                        ])
                ->limit(5)
                ->orderByDesc('urgence_ddi_id')
                ->get();
        return view(nameViewForUser(),['nom'=>Auth::User()->nom,'links'=>$paginatorLinks, 'ddis'=>$Ddi]);
        
    }
}
