<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\{User,droit,Link,ddi};
use App\Charts\DdiChart;

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

       
        $chart = new DdiChart;
        initChart($chart);
        return view(nameViewForUser(),['data' => getDataIndex(), 'chart' => $chart]);
        
    }
}
