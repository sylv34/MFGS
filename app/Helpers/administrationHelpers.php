<?php

if (!function_exists('selectDroitUser')) {
	function selectDroitUser($idService, $boolCadre = NULL)
	{
		return isset($boolCadre) || $idService > 1 ? $idService : $idService+1;
	}
}