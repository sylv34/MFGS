<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\NoteRequest;
use App\{droit,note};
use Carbon\Carbon;
use Illuminate\Support\Facades\{Auth,Storage};


class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $serviceLibelle = droit::all()->unique('libelle')->reject(function ($value){
            return $value->id==18||$value->id==1;
        });



        return view('note.create',['libelles' =>$serviceLibelle]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NoteRequest $request)
    {
        // nom : remplace tous les espace par des tirets et supprime tous les accents, majuscule etc...
        // puis ajoute l'extension .pdf
        $nom = str_finish(str_slug(basename($request->note->getClientOriginalName(),'.pdf')),'.pdf');
        $path =$request->file('note')->storeAs('notes',$nom);

        $note = note::create(['titre' => $request->titre, 'path' => $path, 'datePublication' => Carbon::now()->format('d-m-Y')]);

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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $note = note::findOrFail($id);

        return Response()->file(storage_path("app/public/".$note->path));
    }

    /**
     * Download the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function downloadFile($id){
        $note = note::findOrFail($id);

        return Response()->download(storage_path("app/public/".$note->path));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
