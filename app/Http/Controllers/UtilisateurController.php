<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UtilisateurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('utilisateurs.liste');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(session()->get('role') == "gerant") {
            abort('404');
        } else {
            return view('utilisateurs.ajouter');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (count(User::where('email', $request->email)->get()) != 0) {
            return back()->with('error', "Email déjà utilisé !");
        } else {
            
            $user = new User;
            $user->name = $request->nom;
            $user->role = $request->role;
            $user->email = $request->email;
            $user->password = sha1($request->password);
            $user->save();

            return back()->with('success', "Utilisateur ajouté avec succès !");
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(session()->get('role') != "gerant" && session()->get('role') != "admin") {
            abort('404');
        } else {
            return view('utilisateurs.modifier');
        }
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
        if ($request->password != $request->password_confirm) {
            return back()->with('error', "Les deux mot de passe ne sont pas identiques !");
        } else {
            $user = User::find(session()->get('id'));
            $user->name = $request->nom;
            $user->email = $request->email;
            if ($request->password != "") {
                $user->password = sha1($request->password);
            }
            $user->save();

            session()->put('nom', $request->nom);

            return back()->with('success', "Utilisateur mis à jour avec succès !");
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(session()->get('role') == "gerant") {
            abort('404');
        } else {
            $user = User::find($id);
            $user->delete();

            return redirect(route('listeUtilisateur'))->with('success', "Utilisateur supprimé avec succès !");
        }
    }

    public function loginForm(Request $request) {

        $users = User::where('email', $request->email)->where('password', sha1($request->password))->get();

        if (count($users) == 0) {
            return back()->with('error', "Email ou mot de passe incorrect !");
        } else {
            foreach ($users as $user) {
                session()->put('email', $request->email);
                session()->put('id', $user->id);
                session()->put('role', $user->role);
                session()->put('nom', $user->name);
            }

            return redirect(route('index'));
        }
        
    }
}
