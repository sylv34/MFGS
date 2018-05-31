<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\NoteRequest;
use App\{droit,note};
use Carbon\Carbon;
use Illuminate\Support\Facades\{Auth,Storage};


class NoteController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notes = getNotes();
        return view('note.index',compact('notes'));
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
        // nomNorm : remplace tous les espace par des tirets et supprime tous les accents, majuscule etc...
        // puis ajoute l'extension .pdf
        $nom = nomNorm($request);

        $path =$request->file('note')->storeAs('notes',$nom);

        $note = note::create(['titre' => $request->titre, 'path' => $path, 'datePublication' => Carbon::now()->format('d-m-Y')]);

        return noteAttach($request);
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
}
