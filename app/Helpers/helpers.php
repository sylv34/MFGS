<?php

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

if (!function_exists('paginateAutoLinks')) {
	function paginateAutoLinks()
	{
		return App\Link::whereUser_id(AUth::User()->id)->count()<8 ? App\Link::whereUser_id(Auth::User()->id)->simplePaginate(4) : App\Link::whereUser_id(Auth::User()->id)->paginate(4);
	}
}

if (!function_exists('paginateAutoNotes')) {
	function paginateAutoNotes()
	{
		return App\Link::whereUser_id(AUth::User()->id)->count()<8 ? App\Link::whereUser_id(Auth::User()->id)->simplePaginate(4) : App\Link::whereUser_id(Auth::User()->id)->paginate(4);
	}
}
if (!function_exists('redirectAutoDdi')) {
	function redirectAutoDdi(App\ddi $ddi, $id)
	{
		return $ddi->statu_ddi->id==4 ? redirect()->route('support.visu')->with('status', sprintf('DDI_%d cloturée',$id)) : redirect()->route('support.edit',$id)->with('status', sprintf('DDI_%d modifiée',$id));
	}
}
