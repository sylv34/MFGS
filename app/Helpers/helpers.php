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