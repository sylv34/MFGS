<?php

Use App\ddi;

if (!function_exists('nameViewForUser')) {
	function nameViewForUser()
	{
		if(Auth::User()->isAdmin){
	        return 'home.homeAdmin';
	    }
	    if(Auth::User()->droit->cadre){
	        return 'home.homeC';
	    }else{
	    	return 'home.homeNC';
	    }
	}
}

if (!function_exists('getPaginateAutoLinks')) {
	function getPaginateAutoLinks()
	{
		return App\Link::whereUser_id(AUth::User()->id)->count()<8 ? App\Link::whereUser_id(Auth::User()->id)->simplePaginate(4) : App\Link::whereUser_id(Auth::User()->id)->paginate(4);
	}
}

if (!function_exists('getSlug')) {
	function getSlug(){

		return Auth::User()->droit->libelle;

	}
}

if (!function_exists('getUrgentDdiList')) {
	function getUrgentDdiList(){

		return ddi::where([
                            ['droit_id', '=', Auth::User()->droit_id],
                            ['statu_ddi_id', '<>', 4]
                        ])
                ->limit(5)
                ->orderByDesc('urgence_ddi_id')
                ->get();
	}
}

if (!function_exists('getStat')) {
	function getStat(){
		return [
                    'bloquant'=> ddi::where([
                                    ['droit_id', '=', Auth::User()->droit_id],
                                    ['statu_ddi_id', '<>', 4],
                                    ['urgence_ddi_id', '=', 4]
                                            ])->count()
                ,
                
                    'urgent' => ddi::where([
                                    ['droit_id', '=', Auth::User()->droit_id],
                                    ['statu_ddi_id', '<>', 4],
                                    ['urgence_ddi_id', '=', 3]
                                            ])->count()
                ,
                
                    'moyen' => ddi::where([
                                    ['droit_id', '=', Auth::User()->droit_id],
                                    ['statu_ddi_id', '<>', 4],
                                    ['urgence_ddi_id', '=', 2]
                                            ])->count()
                ,
                
                    'attente' => ddi::where([
                                    ['droit_id', '=', Auth::User()->droit_id],
                                    ['statu_ddi_id', '=', 1]
                                            ])->count()
                ,
                
                    'cours' => ddi::where([
                                    ['droit_id', '=', Auth::User()->droit_id],
                                    ['statu_ddi_id', '=', 2]
                                            ])->count()
                ,
                
                    'retarde' => ddi::where([
                                    ['droit_id', '=', Auth::User()->droit_id],
                                    ['statu_ddi_id', '=', 3]
                                            ])->count()
                ,
                
                    'total' => ddi::where([
                                    ['droit_id', '=', Auth::User()->droit_id],
                                    ['statu_ddi_id', '<>', 4]
                                            ])->count()
                ];
	}
}
if (!function_exists('getDataIndex')) {
	function getDataIndex(){
		return ['slug'=>getSlug(), 'links' => getPaginateAutoLinks(), 'ddis' => getUrgentDdiList(), 'stats' => getStat()];
	}
}
if (!function_exists('initChart')) {
    function initChart(App\Charts\DdiChart $chart){
        $stats=getStat();
        $chart->dataset('', 'line', [$stats['bloquant'], $stats['urgent'], $stats['attente'], $stats['retarde']]);
        return $chart;
    }
}

