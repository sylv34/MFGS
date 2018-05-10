<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\{PasswordRequest,UserRequest};
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\{User,droit};


class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all()->sortBy('nom');
        return view('administration.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $services = getDroitLibelles();
        return view('administration.create',compact('services'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $droit = isset($request->cadre) ? selectDroitUser($request->service, $request->cadre) : selectDroitUser($request->service);
        
        $isAdmin = isset($request->admin) ? true : false;
         User::create([
            'nom' => strtoupper($request->nom),
            'prenom' => ucfirst($request->prenom),
            'email' => $request->email,
            'password' => Hash::make($request->pw),
            'droit_id' => $droit,
            'isAdmin' => $isAdmin,
        ]);
         return redirect()->route('administration.index')->with('status', "Utilisateur ajouté avec succès");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($nom)
    {
        $user = User::whereNom($nom)->first();
        $services = getDroitLibelles();
        $data = ['user' => $user, 'services' =>$services];
        return view('administration.edit', compact('data'));
    }
    /**
     * Show the form for editing password.
     *
     * @param  int  $nom
     * @return \Illuminate\Http\Response
     */
    public function editPassword($nom)
    {
        $user = User::whereNom($nom)->first();
        
        return view('administration.editPassword', compact('user'));
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
        $user = User::findOrFail($id);
        $user->nom = $request->nom;
        $user->prenom = $request->prenom;
        $user->email = $request->email;

        $user->droit_id = isset($request->cadre) ? selectDroitUser($request->service, $request->cadre) : selectDroitUser($request->service);
        
        $user->isAdmin = isset($request->admin) ? true : false;
        $user->save();

        return redirect()->route('administration.index')->with('status', sprintf('Profil de %s %s à bien été modifié', $user->nom, $user->prenom));
    }
    /**
     * Update the password.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updatePassword(PasswordRequest $request, $id)
    {
        $user = User::findOrFail($id);
        $user->password = Hash::make($request->pw);
        $user->save();
        return redirect()->route('administration.edit', $user->nom)->with('status', sprintf('Mot de passe de %s %s à bien été modifié', $user->nom, $user->prenom));;

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
