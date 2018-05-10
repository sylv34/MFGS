<?php


if (!function_exists('redirectAutoDdi')) {
	function redirectAutoDdi(App\ddi $ddi, $id)
	{
		return $ddi->statu_ddi->id==4 ? redirect()->route('support.visu')->with('status', sprintf('DDI_%d cloturée',$id)) : redirect()->route('support.edit',$id)->with('status', sprintf('DDI_%d modifiée',$id));
	}
}

if (!function_exists('getDdi')) {
	function getDdi()
	{
		return App\ddi::where([
                            ['droit_id', '=', Auth::User()->droit_id],
                            ['statu_ddi_id', '<>', 4]
                        ])
						->orderBy('date_demande')
						->orderBy('urgence_ddi_id','desc')
						->get();
	}
}
if (!function_exists('getDroitLibelles')) {
	function getDroitLibelles()
	{
		return App\droit::all()->unique('libelle')->reject(function ($value){
            return $value->id==18||$value->id==1;
        });
	}
}
if (!function_exists('getDataCreate')) {
	function getDataCreate()
	{
		return ['users' => App\User::all(), 'libelles'=>getDroitLibelles(), 'urgence'=>App\urgenceDdi::all()];
	}
}

