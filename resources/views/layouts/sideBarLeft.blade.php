@extends('layouts.header')

@section('sideBarLeft')
    <div class="sideBarLeft">
        <div class="titre comfortaa blue darken-1 white-text" style="padding: 11px 10px;">
            Hotel wara
        </div>
        <div class="pr-2 pl-2 pb-1 pt-1 grey lighten-2">
            <table width="100%">
                <tr>
                    <td width="45">
                        <a href="{{ route('editUtilisateur', session()->get('id')) }}">
                            <div style="width: 45px; height: 45px; line-height: 45px;"
                            class="text-center orange rounded-circle">
                                <i class="icofont-camera white-text"></i>
                            </div>
                        </a>
                    </td>
                    <td class="pl-2 pt-1" style="line-height: 17px;">
                        <a href="{{ route('editUtilisateur', session()->get('id')) }}" class="black-text">
                            <b>{{ session()->get('nom') }}</b><br />
                            <small>{{ session()->get('role') }}</small>
                        </a>
                    </td>
                </tr>
            </table>
        </div>
        <div class="menu-item ml-2 mr-2 mt-2">
            <a href="{{ route('listeCLient') }}">
                <div class="rounded pl-1">
                    <i class="icofont-group"></i>
                    Clients
                </div>
            </a>
            <a href="{{ route('listeChambre') }}">
                <div class="rounded pl-1">
                    <i class="icofont-bed"></i>
                    Chambres
                </div>
            </a>
            <a href="{{ route('listeReservation') }}">
                <div class="rounded pl-1">
                    <i class="icofont-calendar"></i>
                    Réservation
                </div>
            </a>
        </div>
        <div class="divider ml-2 mr-2 mt-3">
            <small>Resources</small>
        </div>
        <div class="menu-item ml-2 mr-2">
            <a href="{{ route('listePersonnel') }}">
                <div class="rounded pl-1">
                    <i class="icofont-shield"></i>
                    Personnels
                </div>
            </a>
            <a href="{{ route('listeMateriel') }}">
                <div class="rounded pl-1">
                    <i class="icofont-lamp"></i>
                    Matériels
                </div>
            </a>
            <a href="{{ route('listeUtilisateur') }}">
                <div class="rounded pl-1">
                    <i class="icofont-lock"></i>
                    Utilisateurs
                </div>
            </a>
        </div>
        <div class="divider ml-2 mr-2 mt-3">
            <small>Liens utiles</small>
        </div>
        <div class="menu-item ml-2 mr-2">
            <a href="{{ route('documentation') }}">
                <div class="rounded pl-1">
                    <i class="icofont-book-alt"></i>
                    Documentation
                </div>
            </a>
        </div>
    </div>
    <div class="wrappable-content">
        <div class="grey lighten-3 pt-1 pb-1">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <div class="pt-2">
                            <a href="{{ route('index') }}">
                                <i class="icofont-home"></i>
                                <small>Accueil</small>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12 text-right">
                        <a href="{{ route('logout') }}" class="btn btn-danger btn-sm m-1 z-depth-0" style="border-radius: 25px;">
                            <b>Déconnexion</b>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @yield('content')
    </div>
@endsection