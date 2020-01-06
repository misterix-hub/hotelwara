<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Personnel;

class PersonnelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('personnels.liste');
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
            return view('personnels.ajouter');
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
        if (count(Personnel::where('email', $request->email)->get()) != 0) {
            return back()->with('error', 'Email dejà utilisé !');
        } else {
            $personnel = new Personnel;
            $personnel->nom = $request->nom;
            $personnel->email = $request->email;
            $personnel->telephone = $request->telephone;
            $personnel->fonction = $request->fonction;
            $personnel->save();

            return back()->with('success', 'Personnel ajouté avec succès !');
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
            return view('personnels.modifier', [
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
        $personnel = Personnel::find($id);
        $personnel->nom = $request->nom;
        $personnel->email = $request->email;
        $personnel->telephone = $request->telephone;
        $personnel->fonction = $request->fonction;
        $personnel->save();

        return back()->with('success', 'Personnel mis à jour avec succès !');
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
            $personnel = Personnel::find($id);
            $personnel->delete();

            return back()->with('success', 'Personnel supprimé avec succès !');   
        }
    }
}
