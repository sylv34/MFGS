<?php

Use App\{ddi,note};
use App\Charts\DdiChart;

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
		return App\Link::whereUser_id(AUth::User()->id)->count()<8 ? App\Link::whereUser_id(Auth::User()->id)->simplePaginate(8) : App\Link::whereUser_id(Auth::User()->id)->paginate(8);
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
if (!function_exists('getStatPerMonth')) {
    function getStatPerMonth($type){
        if($type!=0){
            for ($i=1; $i < 13; $i++) { 

                $stat[] = ddi::where([
                    ['droit_id', '=', Auth::User()->droit_id],
                    ['urgence_ddi_id', '=', $type],
                    ['month', '<=', $i]])->count();
            }
        }else{
            for ($i=1; $i < 13; $i++) { 
                $stat[] = ddi::where([
                    ['droit_id', '=', Auth::User()->droit_id],
                    ['statu_ddi_id', '<>', 4],
                    ['month', '<=', $i]
                ])->count();
            }
        }
        return $stat;
    }
}

if (!function_exists('getStat')) {
	function getStat(){
		return [
            'bloquant'=> getStatPerMonth(4)
            ,

            'urgent' => getStatPerMonth(3)
            ,

            'moyen' => getStatPerMonth(2)
            ,

            'total' => getStatPerMonth(0)
        ];
    }
}

if (!function_exists('initChart')) {
    function initChart(){
        $chart = new DdiChart;
        $stats=getStat();

        $chart->dataset('Bloquant', 'line',[$stats['bloquant'][0],$stats['bloquant'][1],$stats['bloquant'][2],$stats['bloquant'][3],$stats['bloquant'][4],$stats['bloquant'][5],$stats['bloquant'][6],$stats['bloquant'][7],$stats['bloquant'][8],$stats['bloquant'][9],$stats['bloquant'][10],$stats['bloquant'][11]])
        ->options(['borderColor' => 'red']);

        $chart->dataset('Urgent', 'line',[$stats['urgent'][0],$stats['urgent'][1],$stats['urgent'][2],$stats['urgent'][3],$stats['urgent'][4],$stats['urgent'][5],$stats['urgent'][6],$stats['urgent'][7],$stats['urgent'][8],$stats['urgent'][9],$stats['urgent'][10],$stats['urgent'][11]])
        ->options(['borderColor' => 'yellow']);
        
        $chart->dataset('Moyen', 'line',[$stats['moyen'][0],$stats['moyen'][1],$stats['moyen'][2],$stats['moyen'][3],$stats['moyen'][4],$stats['moyen'][5],$stats['moyen'][6],$stats['moyen'][7],$stats['moyen'][8],$stats['moyen'][9],$stats['moyen'][10],$stats['moyen'][11]])
        ->options(['borderColor' => 'blue']);

        $chart->dataset('Total', 'line',[$stats['total'][0],$stats['total'][1],$stats['total'][2],$stats['total'][3],$stats['total'][4],$stats['total'][5],$stats['total'][6],$stats['total'][7],$stats['total'][8],$stats['total'][9],$stats['total'][10],$stats['total'][11]])
        ->options(['borderColor' => 'black']);


        return $chart;
    }
}

if (!function_exists('getDataIndex')) {
    function getDataIndex(){
        return ['slug'=>getSlug(), 'links' => getPaginateAutoLinks(), 'ddis' => getUrgentDdiList(), 'stats' => getStat(), 'notes' => getNotes(),'chart' => initChart()];
    }
}


