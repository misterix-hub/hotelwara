@extends('layouts.sideBarLeft')

@section('content')
    <br />
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-9 col-md-12 col-sm-12">

                <a href="{{ route('ajouterChambre') }}" class="float-right font-size-14 {{ (session()->get('role') == 'gerant') ? 'disabled' : '' }}">
                    <i class="icofont-plus"></i>
                    <b>Ajouter une chambre</b>
                </a>

                <i class="icofont-bed"></i>
                <small class="font-weight-bold">CHAMBRES</small><br />

                @if ($message = Session::get('success'))    
                    <div class="alert alert-success alert-dismissible fade show font-size-14" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            <span class="sr-only">Close</span>
                        </button>
                        {{ $message }}
                    </div>
                @endif

                <table class="table table-striped table-bordered" width="100%">
                    <thead>
                        <tr>
                            <th>
                                Nom de la chambre
                            </th>
                            <th>
                                Catégorie
                            </th>
                            <th>
                                Prix
                            </th>
                            <th>
                                État
                            </th>
                            <th colspan="2" class="text-center">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse (App\Chambre::all() as $chambre)    
                            <tr>
                                <td>
                                    {{ $chambre->nom }}
                                </td>
                                <td>
                                    {{ $chambre->categorie }}
                                </td>
                                <td>
                                    {{ $chambre->prix }}
                                </td>
                                <td>
                                    {{ $chambre->etat }}
                                </td>
                                <td width="50" class="text-center">
                                    <a href="{{ route('editChambre', $chambre->id) }}"
                                        class="btn btn-outline-blue pt-1 pb-1 pl-3 pr-3 m-0 rounded {{ (session()->get('role') == 'gerant') ? 'disabled' : '' }}">
                                        <i class="icofont-edit"></i>
                                    </a>
                                </td>
                                <td width="50" class="text-center">
                                    <a href="{{ route('destroyChambre', $chambre->id) }}" onclick="return confirm('Êtes-vous sur(e) de vouloir supprimer cette chambre ? ')"
                                    class="btn btn-outline-danger pt-1 pb-1 pl-3 pr-3 m-0 rounded {{ (session()->get('role') == 'gerant') ? 'disabled' : '' }}">
                                        <i class="icofont-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">
                                    <b>Pas de chambre ajoutée !</b>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>
                                Nom de la chambre
                            </th>
                            <th>
                                Catégorie
                            </th>
                            <th>
                                Prix
                            </th>
                            <th>
                                État
                            </th>
                            <th colspan="2" class="text-center">
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