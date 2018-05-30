<?php

Use App\{note};
use App\Http\Requests\NoteRequest;

if (!function_exists('nomNorm')) {
	function nomNorm(NoteRequest $request)
	{
		return str_finish(str_slug(basename($request->note->getClientOriginalName(),'.pdf')),'.pdf');
	}
}

if(!function_exists('noteAttach')) {
	function noteAttach(NoteRequest $request){

		if(isset($request->tout)){
			$note->droits()->attach(18);
			return redirect()->route('home')->with('status', "Note diffusée");
		}

		if (isset($request->info)) {
			$note->droits()->attach(1);
		}

		for ($i=2; $i < 18; $i++) {

			if(isset($request->$i)){
				if(isset($request->cadre)){
					$note->droits()->attach($i);
				}else{
					$note->droits()->attach($i+1);
				}
			}                
		}

		return redirect()->route('home')->with('status', "Note diffusée");
	}
}

if (!function_exists('getNotes')) {
    function getNotes(){
        return note::whereHas('droits', function ($query) {
            $query->where('droit_id', 18)->orWhere('droit_id', Auth::User()->droit->id);
        })->orderByDesc('datePublication')->get();
    }
}