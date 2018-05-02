<?php

if (!function_exists('nameViewForUser')) {
	function nameViewForUser()
	{
		if(Auth::User()->isAdmin){
	        return 'homeAdmin';
	    }
	    if(Auth::User()->droit->cadre){
	        return 'homeC';
	    }else{
	    	return 'homeNC';
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