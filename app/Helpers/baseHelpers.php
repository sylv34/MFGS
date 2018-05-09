<?php

if (!function_exists('redirectAutoDdi')) {
	function redirectAutoDdi(App\ddi $ddi, $id)
	{
		return $ddi->statu_ddi->id==4 ? redirect()->route('support.visu')->with('status', sprintf('DDI_%d cloturée',$id)) : redirect()->route('support.edit',$id)->with('status', sprintf('DDI_%d modifiée',$id));
	}
}
