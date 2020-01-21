@extends('layouts.sideBarLeft')

@section('content')
    <br />
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-9 col-md-12 col-sm-12" style="font-size: 14px;">

                <a href="" class="btn btn-sm rounded btn-blue float-right mr-0" data-toggle="modal" data-target="#modelId">
                    <i class="icofont-plus"></i>
                    Nouvelle réservation
                </a>
                                
                <i class="icofont-calendar"></i>
                <small class="font-weight-bold">LISTE DES RÉSERVATIONS</small><br /><br /><br /><br />

                @if ($message = Session::get('success'))    
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            <span class="sr-only">Close</span>
                        </button>
                        {{ $message }}
                    </div>
                @endif

                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>
                                Client
                            </th>
                            <th class="d-none">
                                Carte
                            </th>
                            <th>
                                Chambre
                            </th>
                            <th>Début</th>
                            <th>Fin</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach (App\Reservation::where("etat", "En cours")->get() as $reservation)
                            @foreach (App\Client::where('id', $reservation->client_id)->get() as $client)    
                                <tr>
                                    <td>
                                        {{ $client->nom_complet }}
                                    </td>
                                    <td class="d-none">
                                        {{ $client->carte }}
                                    </td>
                                    <td>
                                        @foreach (App\Chambre::where('id', $reservation->chambre_id)->get() as $chambre)
                                            {{ $chambre->nom }}
                                        @endforeach
                                    </td>
                                    <td>
                                        {{ $reservation->debut }}
                                    </td>
                                    <td>
                                        {{ $reservation->fin }}
                                    </td>
                                    <td class="text-center" width="170">
                                        <a href="{{ route('factureReservation', [$reservation->id, 'imprimer']) }}" target="_blank" class="btn btn-outline-grey rounded m-0 pt-1 pb-1 pr-3 pl-3">
                                            <i class="icofont-print"></i>
                                        </a>
                                        <a href="{{ route('fermerReservation', $reservation->id) }}" target="_blank" onclick="return confirm('Êtes-vous sur(e) de vouloir terminier cette réservation ? ')"
                                            class="btn btn-outline-green rounded m-0 pt-1 pb-1 pr-3 pl-3">
                                            <i class="icofont-print"></i><i class="icofont-check"></i>
                                        </a>
                                        <a href="{{ route('destroyReservation', $reservation->id) }}" onclick="return confirm('Êtes-vous sur(e) de vouloir supprimer cette réservation ? ')"
                                        class="btn btn-outline-red rounded pt-1 pb-1 pl-3 pr-3 m-0">
                                            <i class="icofont-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>
                                Client
                            </th>
                            <th class="d-none">
                                Carte
                            </th>
                            <th>
                                Chambre
                            </th>
                            <th>Début</th>
                            <th>Fin</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </tfoot>
                </table>

                <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                    <form action="{{ route('storeReservation') }}" method="post">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content" style="border-radius: 5px;">
                                <div class="modal-header">
                                    <h5 class="modal-title">Faire une nouvelle réservation</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
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
                    </form>
                </div>

            </div>
            <div class="col-lg-3 col-md-12 com-sm-12">
                @include('included.sideBarRight')
            </div>
        </div>
    </div><br /><br /><br />
    
@endsection

@section('js')
    <script src="{{ URL::asset('plugins/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ URL::asset('plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
    <script>
        $(function () {
            $('#example1').DataTable();

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
        });
    </script>
@endsection