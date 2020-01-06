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

                <a href="{{ route('ajouterMateriel') }}" class="float-right font-size-14 {{ (session()->get('role') == 'gerant') ? 'disabled' : '' }}">
                    <i class="icofont-plus"></i>
                    <b>Ajouter un matériel</b>
                </a>

                <i class="icofont-lamp"></i>
                <small class="font-weight-bold">MATÉRIELS</small><br />

                <table class="table table-striped table-bordered" width="100%">
                    <thead>
                        <tr>
                            <th>
                                Nom du matériel
                            </th>
                            <th width="100" class="text-center">
                                Quantité
                            </th>
                            <th colspan="2" class="text-center">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse (App\Materiel::all() as $materiel)    
                            <tr>
                                <td>
                                    {{ $materiel->nom }}
                                </td>
                                <td class="text-right">
                                    {{ $materiel->quantite }}
                                </td>
                                <td width="40" class="text-center">
                                    <a href="{{ route('editMateriel', $materiel->id) }}" class="btn btn-outline-blue pt-1 pb-1 pl-3 pr-3 m-0 rounded {{ (session()->get('role') == 'gerant') ? 'disabled' : '' }}">
                                        <i class="icofont-edit"></i>
                                    </a>
                                </td>
                                <td width="40" class="text-center">
                                    <a href="{{ route('destroyMateriel', $materiel->id) }}" class="btn btn-outline-danger pt-1 pb-1 pl-3 pr-3 m-0 rounded {{ (session()->get('role') == 'gerant') ? 'disabled' : '' }}"
                                        onclick="return confirm('Êtes-vous sur(e) de vouloir supprimer ce matériel ? ')">
                                        <i class="icofont-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">
                                    <b>Pas de matériel ajouté !</b>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>
                                Nom du matériel
                            </th>
                            <th width="100" class="text-center">
                                Quantité
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