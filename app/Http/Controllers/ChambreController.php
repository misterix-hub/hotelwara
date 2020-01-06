<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Chambre;

class ChambreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('chambres.liste');
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
            return view('chambres.ajouter');
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
        if (count(Chambre::where('nom', $request->nom)->get()) != 0) {
            return back()->with('error', "Nom de chambre déjà pris !");
        } else {
            $chambre = new Chambre;
            $chambre->nom = $request->nom;
            $chambre->categorie = $request->categorie;
            $chambre->prix = $request->prix;
            $chambre->etat = "Libre";
            $chambre->save();
    
            return redirect(route('listeChambre'))->with('success', "Chambre ajoutée avec succès !");
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
            return view('chambres.modifier', [
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
        $chambre = Chambre::findOrFail($id);
            $chambre->nom = $request->nom;
            $chambre->categorie = $request->categorie;
            $chambre->prix = $request->prix;
            $chambre->save();
    
            return redirect(route('listeChambre'))->with('success', "Chambre mis à jour avec succès !");
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
            $chambre = Chambre::find($id);
            $chambre->delete();
            return redirect(route('listeChambre'))->with('success', "Chambre supprimée avec succès !");
        }
    }
}
