<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Materiel;

class MaterielController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('materiels.liste');
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
            return view('materiels.ajouter');
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
        if (count(Materiel::where('nom', $request->nom)->get()) != 0) {
            return back()->with('error', "Matériel déjà ajouté !");
        } else {
            $materiel = new Materiel;
            $materiel->nom = $request->nom;
            $materiel->quantite = $request->quantite;
            $materiel->save();

            return back()->with('success', "Matériel ajouté avec succès !");
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
        if(session()->get('role') == "gerant") {
            abort('404');
        } else {
            return view('materiels.modifier', [
                'id' => $id
            ]);
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
        $materiel = Materiel::find($id);
        $materiel->nom = $request->nom;
        $materiel->quantite = $request->quantite;
        $materiel->save();

        return back()->with('success', "Matériel mis à jour avec succès !");
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
            $materiel = Materiel::find($id);
            $materiel->delete();

            return back()->with('success', "Matériel supprimé avec succès !");
        }
    }
}
