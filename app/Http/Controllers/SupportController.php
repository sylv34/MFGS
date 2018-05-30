<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\DdiRequest;
use Illuminate\Support\Facades\Auth;
use App\{urgenceDdi,ddi, statuDdi, droit, User};
use Carbon\Carbon;

class SupportController extends Controller
{
    public function __construct()
    {
        $this->middleware('cadre');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function visu()
    {
        $ddis = getDdi();
        return view('support.index', compact('ddis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $data=getDataCreate();
        return view('support.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DdiRequest $request)
    {
        ddi::create([
            'titre' => $request->titre,
            'contenu' => $request->contenu,
            'date_demande' => Carbon::now()->format('d-m-Y'),
            'month' => Carbon::now()->month,
            'droit_id' => $request->service,
            'demandeur_user_id' => Auth::User()->id,
            'concerne_user_id' => $request->userConcerne,
            'urgence_ddi_id' => $request->urgence,
        ]);
         return redirect()->route('home', Auth::User()->droit->libelle)->with('status', "Demande d'intervention envoyée");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ddi= Ddi::findOrFail($id);
        $statuts = statuDdi::all();
        return view('support.edit', ['ddi' => $ddi, 'statuts'=>$statuts]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $ddi = ddi::findOrFail($id);
        $ddi->commentaires = $request->input('commentaires');
        $ddi->statu_ddi_id = $request->input('statut');
        $ddi->save();
        return redirectAutoDdi($ddi,$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
