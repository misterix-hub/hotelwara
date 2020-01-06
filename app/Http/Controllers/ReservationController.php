<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use App\Reservation;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('reservations.liste');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (substr($request->date, 0, 10) == substr($request->date, 22, 10)) {
            return back()->with('error', "Les deux dates de réservation ne sont pas différentes !");
        } else {

            $date1 = strtotime(substr($request->date, 0, 10));
            $date2 = strtotime(substr($request->date, 22, 10));

            if ((($date2 - $date1) / 86400 < 0) || (($date1 - strtotime(date('Y-m-d'))) / 86400 < 0)) {
                return back()->with('error', "Les deux dates de réservation ne sont pas conformes !");
            } else {

                if (trim($request->old_carte) == "") {

                    $client = new Client;
                    $client->nom_complet = $request->nom_complet;
                    $client->carte = $request->carte;
                    $client->profession = $request->profession;
                    $client->telephone = $request->telephone;
                    $client->save();

                    $reservation = new Reservation;
                    $reservation->client_id = $client->id;
                    $reservation->chambre_id = $request->chambre;
                    $reservation->debut = substr($request->date, 0, 10);
                    $reservation->fin = substr($request->date, 22, 10);
                    $reservation->etat = "En cours";
                    $reservation->save();

                } else {

                    if (count(Client::where('id', $request->old_carte)->get()) == 0) {
                        return back()->with('error', "L'identifiant du client n'a pas été retrouvé !");
                    } else {
                        $reservation = new Reservation;
                        $reservation->client_id = $request->old_carte;
                        $reservation->chambre_id = $request->chambre;
                        $reservation->debut = substr($request->date, 0, 10);
                        $reservation->fin = substr($request->date, 22, 10);
                        $reservation->etat = "En cours";
                        $reservation->save();
                    }
                    
                }
    
                return back()->with('success', "Réservation ajoutée avec succès !");
            }
            
            
            
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
        $reservation = Reservation::find($id);
        $reservation->delete();
        return redirect(route('listeReservation'))->with('success', "Réservation supprimée avec succès !");
    }

    public function facture($id, $action) {
        /*$date1 = strtotime("2019-12-15");
        $date2 = strtotime("2020-01-2");

        return ($date2 - $date1) / 86400;*/

        return view('reservations.facture', [
            'id' => $id,
            'action' => $action
        ]);
    }

    public function fermer($id) {
        $reservation = Reservation::find($id);
        $reservation->etat = "Termine";
        $reservation->save();
        
        return redirect(route('factureReservation', [$id, 'terminer']));
    }
}
