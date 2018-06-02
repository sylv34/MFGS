<?php
use mfgs\Http\Requests\UserRequest;

if (!function_exists('selectDroitUser')) {
	function selectDroitUser(UserRequest $request)
	{
		if ($request->service=='1'){
			return ['admin'=> true, 'droit' =>1];
		}

		return ['admin'=>isset($request->admin), 'droit'=>isset($request->cadre) ? $request->service : $request->service+1];
	}
}