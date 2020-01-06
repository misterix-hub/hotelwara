@extends('layouts.sideBarLeft')

@section('content')
    <br />
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-9 col-md-12 com-sm-12 font-size-14">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">

                        @if ($message = Session::get('error'))    
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    <span class="sr-only">Close</span>
                                </button>
                                {{ $message }}
                            </div>
                        @endif

                        @if ($message = Session::get('success'))    
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    <span class="sr-only">Close</span>
                                </button>
                                {{ $message }}
                            </div>
                        @endif


                        <br /><br /><br />
                        <h1 class="comfortaa text-center text-muted">
                            Bienvenu (e), {{ session()->get('nom') }}
                        </h1><br />

                        <h5 class="comfortaa text-center text-muted">
                            Espace réservé uniquement aux administrateurs, utilisateurs et gérants
                        </h5>

                        <center>
                            <div style="width: 200px;" class="border-bottom mt-4 border-warning"></div>
                        </center><br /><br />

                        <div class="text-center">
                            <a href="" class="btn btn-md rounded btn-blue" data-toggle="modal" data-target="#modelId">
                                <i class="icofont-plus"></i>
                                Nouvelle réservation
                            </a>
                        </div>
                        
                        <!-- Modal -->
                        <form action="{{ route('storeReservation') }}" method="post">
                            <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content" style="border-radius: 5px;">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Faire une nouvelle réservation</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <!--<div class="custom-control custom-switch">
                                                <input type="checkbox" class="custom-control-input" id="customSwitch1">
                                                <label class="custom-control-label" for="customSwitch1">
                                                    <b class="font-weight-bold">Client(e) connu(e)</b> <b>(Quand il s'agit d'un client dejà connu ou dejà répertorié.)</b>
                                                </label>
                                            </div>
                                            <table width="100%">
                                                <tr>
                                                    <td class="pt-2">
                                                        <label for="old_carte" class="mb-0"><b>Identifiant du client</b></label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <input required type="text" disabled class="form-control font-size-14" id="old_carte" name="old_carte" placeholder="Saisir dans le champs ...">
                                                    </td>
                                                </tr>
                                            </table><hr class="mb-0" />-->
                                            @csrf

                                            <div>
                                                <b class="orange-text"><i class="icofont-bed"></i> Informations réservation</b>
                                            </div>
                                            <table width="100%">
                                                <tr>
                                                    <td width="50%">
                                                        <label for="chambre" class="mb-0"><b>Chambre à réserver</b></label>
                                                        
                                                        <select required class="form-control select2bs4" name="chambre">
                                                            <option selected="selected" disabled value="">Sélectionnez une chambre</option>
                                                            @foreach (App\Chambre::all() as $chambre)
                                                                <option value="{{ $chambre->id }}">{{ $chambre->nom . " - " . $chambre->categorie }}</option>
                                                            @endforeach
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <label for="reservationtime" class="mb-0"><b>Date de réservation</b></label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i class="icofont-calendar"></i></span>
                                                            </div>
                                                            <input required type="text" class="form-control float-right font-size-14" name="date" id="reservationtime">
                                                        </div>
                                                    </td>
                                                </tr>
                                            </table>


                                            <div class="mt-2">
                                                <b class="orange-text"><i class="icofont-user"></i> Informations client</b>
                                            </div>
                                            <table width="100%">
                                                <tr>
                                                    <td width="50%">
                                                        <label for="nom_complet" class="mb-0"><b>Nom complet du client</b></label>
                                                        <input required type="text" class="form-control font-size-14" id="nom_complet" name="nom_complet" placeholder="Saisir dans le champs ...">
                                                    </td>
                                                    <td>
                                                        <label for="carte" class="mb-0"><b>Numéro de carte</b></label>
                                                        <input required type="text" class="form-control font-size-14" id="carte" name="carte" placeholder="Saisir dans le champs ...">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td width="50%" class="pt-3">
                                                        <label for="profession" class="mb-0"><b>Profession du client</b></label>
                                                        <input required type="text" class="form-control font-size-14" id="profession" name="profession" placeholder="Saisir dans le champs ...">
                                                    </td>
                                                    <td class="pt-3">
                                                        <label for="telephone" class="mb-0"><b>Téléphone du client</b></label>
                                                        <input required type="text" class="form-control font-size-14" id="telephone" name="telephone" placeholder="Saisir dans le champs ...">
                                                    </td>
                                                </tr>
                                            </table>
                                            
                                        </div>
                                        <div class="modal-footer pt-2 pb-2">
                                            <button type="reset" class="btn btn-white btn-md z-depth-0" data-dismiss="modal">Fermer</button>
                                            <button type="submit" class="btn btn-blue btn-md">
                                                <i class="icofont-save"></i>
                                                Enregistrer
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-12 com-sm-12">
                @include('included.sideBarRight')
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $(function () {
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })
            $('#reservationtime').daterangepicker({
                timePicker: true,
                timePickerIncrement: 30,
                locale: {
                    format: 'YYYY-MM-DD hh:mm A'
                }
            });

            $('#customSwitch1').change(function() {
                if ($(this).prop('checked') == true) {
                    $('#old_carte').removeAttr('disabled');
                    $('#nom_complet').attr('disabled', 'disabled');
                    $('#carte').attr('disabled', 'disabled');
                    $('#profession').attr('disabled', 'disabled');
                    $('#telephone').attr('disabled', 'disabled');
                } else {
                    $('#old_carte').attr('disabled', 'disabled');
                    $('#nom_complet').removeAttr('disabled');
                    $('#carte').removeAttr('disabled');
                    $('#profession').removeAttr('disabled');
                    $('#telephone').removeAttr('disabled');
                }
            });
        });
    </script>
@endsection