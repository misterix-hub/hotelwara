@extends('layouts.sideBarLeft')

@section('content')
    <br />
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-9 col-md-12 col-sm-12" style="font-size: 14px;">
                                
                <i class="icofont-calendar"></i>
                <small class="font-weight-bold">LISTE DES RÉSERVATIONS</small><br /><br />

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
        });
    </script>
@endsection