@extends('layouts.header')

@section('sideBarLeft')

<div class="grey lighten-2" style="position: absolute; top: 0; left: 0; right: 0; bottom: 0;">
    <div class="container">
        <div class="row">
            <div class="col-12"><br />
                <table>
                    <tr>
                        <td>
                            <img src="{{ URL::asset('images/logo_hotel_wara.jpg') }}" alt="logo" class="rounded" width="50">
                        </td>
                        <td class="pl-1" style="padding-top: 12px;">
                            <b>HôtelWara</b>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="col-12 text-center">
                <h2>
                    <img src="{{ URL::asset('images/logo_hotel_wara.jpg') }}" alt="logo" class="rounded mb-2" width="100"><br />
                    Connexion
                </h2><br />
                
            </div>
            <div class="col-lg-4 col-md-2 col-sm-12"></div>
            <div class="col-lg-4 col-md-8 col-sm-12">

                @if ($message = Session::get('error'))    
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            <span class="sr-only">Close</span>
                        </button>
                        {{ $message }}
                    </div>
                @endif


                <form action="{{ route('loginForm') }}" method="post">
                    @csrf
    
                    <label for="email" class="mb-0" style="font-size: 14px;">
                        <b>Email ou téléphone</b>
                    </label>
                    <input type="text" name="email" id="email" class="form-control" placeholder="Saisir dans le champs ...">
    
                    <label for="password" class="mb-0 mt-4" style="font-size: 14px;">
                        <b>Mot de passe</b>
                    </label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Saisir dans le champs ...">
    
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary btn-md mr-0 mt-3 rounded">
                            <i class="icofont-login"></i>
                            Connexion
                        </button>
                    </div>
                </form><br /><br /><br />

                <div class="text-center" style="font-size: 14px;">
                    <b>Hotelwara &copy; 2019 | Tous droits réservés.<br />
                    By <a target="_blank" href="#!">IBTAGroup</a></b>
                </div>
            </div>
            <div class="col-lg-4 col-md-2 col-sm-12"></div>
        </div>
    </div>
</div>


@endsection