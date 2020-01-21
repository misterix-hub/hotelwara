@extends('layouts.sideBarLeft')

@section('content')
    <br />
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-9 col-md-12 col-sm-12">

                @if ($message = Session::get('success'))    
                    <div class="alert alert-success alert-dismissible fade show font-size-14" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            <span class="sr-only">Close</span>
                        </button>
                        {{ $message }}
                    </div>
                @endif

                <a href="{{ route('ajouterUtilisateur') }}" class="float-right font-size-14 {{ (session()->get('role') == 'gerant') ? 'disabled' : '' }}">
                    <i class="icofont-plus"></i>
                    <b>Ajouter un utilisateur</b>
                </a>

                <i class="icofont-lock"></i>
                <small class="font-weight-bold">UTILISATEURS</small><br />

                <table class="table table-striped table-bordered" width="100%">
                    <thead>
                        <tr>
                            <th>
                                Nom complet
                            </th>
                            <th>
                                Email | Téléphone
                            </th>
                            <th>
                                Rôle
                            </th>
                            <th class="text-center">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse (App\User::where('id', '<>', session()->get('id'))->get() as $user)    
                            <tr>
                                <td>
                                    {{ $user->name }}
                                </td>
                                <td>
                                    {{ $user->email }}
                                </td>
                                <td>
                                    {{ $user->role }}
                                </td>
                                <!--<td width="50" class="text-center">
                                    <a href="{{ route('editUtilisateur', $user->id) }}" class="btn btn-outline-blue pt-1 pb-1 pl-3 pr-3 m-0 rounded {{ (session()->get('role') == 'gerant') ? 'disabled' : '' }}">
                                        <i class="icofont-edit"></i>
                                    </a>
                                </td>-->
                                <td width="50" class="text-center">
                                    <a href="{{ route('destroyUtilisateur', $user->id) }}" class="btn btn-outline-danger pt-1 pb-1 pl-3 pr-3 m-0 rounded {{ (session()->get('role') == 'gerant') ? 'disabled' : '' }}"
                                        onclick="return confirm('Êtes-vous sur(e) de vouloir supprimer cet utilisateur ? ')">
                                        <i class="icofont-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">
                                    <b>Pas d'utilisateur ajouté !</b>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>
                                Nom complet
                            </th>
                            <th>
                                Email | Téléphone
                            </th>
                            <th>
                                Rôle
                            </th>
                            <th class="text-center">
                                Action
                            </th>
                        </tr>
                    </tfoot>
                </table>

            </div>
            <div class="col-lg-3 col-md-12 com-sm-12">
                @include('included.sideBarRight')
            </div>
        </div>
    </div>
@endsection