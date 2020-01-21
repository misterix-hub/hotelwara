@extends('layouts.sideBarLeft')

@section('content')
    <br />
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-9 col-md-12 col-sm-12">
                <i class="icofont-lock"></i>
                <small class="font-weight-bold">MODIFIER MON COMPTE UTILISATEUR</small><br />

                @if ($message = Session::get('success'))    
                    <div class="alert alert-success alert-dismissible fade show font-size-14" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            <span class="sr-only">Close</span>
                        </button>
                        {{ $message }}
                    </div>
                @endif

                @if ($message = Session::get('error'))    
                    <div class="alert alert-danger alert-dismissible fade show font-size-14" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            <span class="sr-only">Close</span>
                        </button>
                        {{ $message }}
                    </div>
                @endif

                <form action="{{ route('updateUtilisateur', session()->get('id')) }}" method="post">
                    @csrf
                    <br />
                    <table width="100%">
                        @foreach (App\User::where('id', session()->get('id'))->get() as $user)    
                            <tr>
                                <td width="50%">
                                    <label for="nom" class="font-size-14 mb-0"><b>Nom complet</b></label>
                                    <input required type="text" id="nom" name="nom" class="form-control font-size-14" value="{{ $user->name }}">
                                </td>
                                <td>
                                    <label for="email" class="font-size-14 mb-0"><b>Email ou téléphone</b></label>
                                    <input required type="text" id="email" name="email" class="form-control font-size-14" value="{{ $user->email }}">
                                </td>
                            </tr>
                            <tr>
                                <td width="50%" class="pt-2">
                                    <label for="password" class="font-size-14 mb-0"><b>Nouveau mot de passe</b></label>
                                    <input type="password" minlength="6" maxlength="20" id="password" name="password" class="form-control font-size-14" placeholder="Saisir dans le champs ...">
                                </td>
                                <td class="pt-2">
                                    <label for="password_confirm" class="font-size-14 mb-0"><b>Comfirmer nouveau mot de passe</b></label>
                                    <input type="password" minlength="6" maxlength="20" id="password_confirm" name="password_confirm" class="form-control font-size-14" placeholder="Saisir dans le champs ...">
                                </td>
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="3" class="pt-2">
                                <button type="submit" class="btn btn-blue btn-md ml-0 rounded">
                                    Mettre à jour
                                </button>
                            </td>
                        </tr>
                    </table>
                </form>

            </div>
            <div class="col-lg-3 col-md-12 com-sm-12">
                @include('included.sideBarRight')
            </div>
        </div>
    </div>
@endsection