@extends('layouts.sideBarLeft')

@section('content')
    <br />
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-9 col-md-12 col-sm-12">

                @if ($message = Session::get('error'))    
                    <div class="alert alert-danger alert-dismissible fade show font-size-14" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            <span class="sr-only">Close</span>
                        </button>
                        {{ $message }}
                    </div>
                @endif


                <i class="icofont-bed"></i>
                <small class="font-weight-bold">AJOUTER UNE CHAMBRE</small><br />

                <form action="{{ route('storeChambre') }}" method="post">
                    @csrf
                    <br />
                    <table width="100%">
                        <tr>
                            <td width="35%">
                                <label for="nom" class="font-size-14 mb-0"><b>Nom de chambre</b></label>
                                <input type="text" required id="nom" name="nom" class="form-control font-size-14" placeholder="Saisir dans le champs ...">
                            </td>
                            <td>
                                <label for="categorie" class="font-size-14 mb-0"><b>Catégorie de chambre</b></label>
                                <input type="text" required id="categorie" name="categorie" class="form-control font-size-14" placeholder="Saisir dans le champs ...">
                            </td>
                            <td width="100">
                                <label for="prix" class="font-size-14 mb-0"><b>Prix</b></label>
                                <input type="number" required min="1" max="1000000" id="prix" name="prix" class="form-control font-size-14" placeholder="1 500 Frs">
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