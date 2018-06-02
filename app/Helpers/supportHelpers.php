<?php


if (!function_exists('redirectAutoDdi')) {
	function redirectAutoDdi(mfgs\ddi $ddi, $id)
	{
		return $ddi->statu_ddi->id==4 ? redirect()->route('support.visu')->with('status', sprintf('DDI_%d cloturée',$id)) : redirect()->route('support.visu',$id)->with('status', sprintf('DDI_%d modifiée',$id));
	}
}

if (!function_exists('getDdi')) {
	function getDdi()
	{
		return mfgs\ddi::where([
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
		return mfgs\droit::all()->unique('libelle')->reject(function ($value){
            return $value->id==18;
        });
	}
}
if (!function_exists('getDataCreate')) {
	function getDataCreate()
	{
		return ['users' => mfgs\User::all(), 'libelles'=>getDroitLibelles(), 'urgence'=>mfgs\urgenceDdi::all()];
	}
}

