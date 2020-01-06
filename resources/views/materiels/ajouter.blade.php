@extends('layouts.sideBarLeft')

@section('content')
    <br />
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-9 col-md-12 col-sm-12">
                <i class="icofont-lamp"></i>
                <small class="font-weight-bold">AJOUTER UN MATÉRIEL</small><br />

                @if ($message = Session::get('success'))
                    <div class="alert alert-primary alert-success fade show" style="font-size: 14px;" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            <span class="sr-only">Close</span>
                        </button>
                        {{ $message }}
                    </div>
                @endif


                @if ($message = Session::get('error'))
                    <div class="alert alert-primary alert-danger fade show" style="font-size: 14px;" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            <span class="sr-only">Close</span>
                        </button>
                        {{ $message }}
                    </div>
                @endif

                <form action="{{ route('storeMateriel') }}" method="post">
                    @csrf
                    <br />
                    <table width="100%">
                        <tr>
                            <td width="60%">
                                <label for="nom" class="font-size-14 mb-0"><b>Nom du matériel</b></label>
                                <input required type="text" id="nom" name="nom" class="form-control font-size-14" placeholder="Saisir dans le champs ...">
                            </td>
                            <td>
                                <label for="quantite" class="font-size-14 mb-0"><b>Quantité</b></label>
                                <input required type="number" min="1" max="1000000" id="quantite" name="quantite" class="form-control font-size-14" placeholder="Saisir ici ...">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" class="pt-2">
                                <button type="submit" class="btn btn-blue btn-md ml-0 rounded {{ (session()->get('role') == 'gerant') ? 'disabled' : '' }}">
                                    AJouter
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