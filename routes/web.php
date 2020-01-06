<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

    if(!session()->has('id')) {
        return redirect(route('login'));
    } else {
        return view('welcome');
    }

})->name('index');

/* CLIENTS */

Route::get('clients', 'ClientController@index')->name('listeCLient');


/* CHAMBRES */

Route::get('chambres', 'ChambreController@index')->name('listeChambre');
Route::post('chambres', 'ChambreController@store')->name('storeChambre');
Route::get('chambres/ajouter', 'ChambreController@create')->name('ajouterChambre');
Route::get('chambres/{id}/edit', 'ChambreController@edit')->name('editChambre');
Route::post('chambres/{id}/update', 'ChambreController@update')->name('updateChambre');
Route::get('chambres/{id}/supprimer', 'ChambreController@destroy')->name('destroyChambre');

/* MATERIELS */

Route::get('materiels', 'MaterielController@index')->name('listeMateriel');
Route::post('materiels', 'MaterielController@store')->name('storeMateriel');
Route::get('materiels/ajouter', 'MaterielController@create')->name('ajouterMateriel');
Route::get('materiels/{id}/edit', 'MaterielController@edit')->name('editMateriel');
Route::post('materiels/{id}/update', 'MaterielController@update')->name('updateMateriel');
Route::get('materiels/{id}/supprimer', 'MaterielController@destroy')->name('destroyMateriel');

/* UTILISATEURS */

Route::get('utilisateurs', 'UtilisateurController@index')->name('listeUtilisateur');
Route::post('utilisateurs', 'UtilisateurController@store')->name('storeUtilisateur');
Route::get('utilisateurs/ajouter', 'UtilisateurController@create')->name('ajouterUtilisateur');
Route::get('utilisateurs/{id}/edit', 'UtilisateurController@edit')->name('editUtilisateur');
Route::post('utilisateurs/{id}/update', 'UtilisateurController@update')->name('updateUtilisateur');
Route::get('utilisateurs/{id}/supprimer', 'UtilisateurController@destroy')->name('destroyUtilisateur');

/* PERSONNELS */

Route::get('personnels', 'PersonnelController@index')->name('listePersonnel');
Route::post('personnels', 'PersonnelController@store')->name('storePersonnel');
Route::get('personnels/ajouter', 'PersonnelController@create')->name('ajouterPersonnel');
Route::get('personnels/{id}/edit', 'PersonnelController@edit')->name('editPersonnel');
Route::post('personnels/{id}/update', 'PersonnelController@update')->name('updatePersonnel');
Route::get('personnels/{id}/supprimer', 'PersonnelController@destroy')->name('destroyPersonnel');

/* DOCUMENTATION */

Route::get('documentation', 'DocumentationController@index')->name('documentation');

/* RESERVATIONS */

Route::get('reservations', 'ReservationController@index')->name('listeReservation');
Route::get('reservations/{id}/factures/{action}', 'ReservationController@facture')->name('factureReservation');
Route::get('reservations/{id}/supprimer', 'ReservationController@destroy')->name('destroyReservation');
Route::get('reservations/{id}/fermer', 'ReservationController@fermer')->name('fermerReservation');
Route::post('reservations/adjouter', 'ReservationController@store')->name('storeReservation');

Route::get('login', 'Controller@login')->name('login');
Route::post('login', 'UtilisateurController@loginForm')->name('loginForm');

Route::get('logout', 'Controller@logout')->name('logout');