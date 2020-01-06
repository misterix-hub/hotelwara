@extends('layouts.sideBarLeft')

@section('content')
    <br />
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-9 col-md-12 col-sm-12">
                <i class="icofont-bed"></i>
                <small class="font-weight-bold">MODIFIER UNE CHAMBRE</small><br />

                <form action="{{ route('updateChambre', $id) }}" method="post">
                    @csrf
                    <br />
                    @forelse (App\Chambre::where('id', $id)->get() as $chambre)
                        <table width="100%">
                            <tr>
                                <td width="35%">
                                    <label for="nom" class="font-size-14 mb-0"><b>Nom de chambre</b></label>
                                    <input type="text" required id="nom" name="nom" class="form-control font-size-14" value="{{ $chambre->nom }}">
                                </td>
                                <td>
                                    <label for="categorie" class="font-size-14 mb-0"><b>Catégorie de chambre</b></label>
                                    <input type="text" required id="categorie" name="categorie" class="form-control font-size-14" value="{{ $chambre->categorie }}">
                                </td>
                                <td width="100">
                                    <label for="prix" class="font-size-14 mb-0"><b>Prix</b></label>
                                    <input type="number" required min="1" max="10000000" id="prix" name="prix" class="form-control font-size-14" value="{{ $chambre->prix }}">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3" class="pt-2">
                                    <button type="submit" class="btn btn-blue btn-md ml-0 rounded {{ (session()->get('role') == 'gerant') ? 'disabled' : '' }}">
                                        Mettre à jour
                                    </button>
                                </td>
                            </tr>
                        </table>
                    @empty
                        <br />
                        <h4 class="text-center">
                            Erreur de chargement ... Réessayez !
                        </h4>
                    @endforelse
                </form>

            </div>
            <div class="col-lg-3 col-md-12 com-sm-12">
                @include('included.sideBarRight')
            </div>
        </div>
    </div>
@endsection