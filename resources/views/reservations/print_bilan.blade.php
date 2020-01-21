@extends('layouts.header')

@section('sideBarLeft')
    <br />
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12" style="font-size: 14px;">
                <h2 class="text-center">
                    <img src="{{ URL::asset('images/logo_hotel_wara.jpg') }}" alt="logo" class="rounded mb-2" width="150"><br />
                    <b class="font-weight-bold">Hôtel wara</b>
                </h2><br /><br />

                <h1 class="text-center">Bilan de reservations</h1>

                <div>
                    <b>
                        Date début : {{ $date_debut }}<br />
                        Date fin : {{ $date_fin }}
                    </b>
                </div>

                <table class="table table-striped table-bordered">
                    <thead class="thead-default">
                        <tr>
                            <th width="100">
                                Date
                            </th>
                            <th>
                                Client
                            </th>
                            <th>
                                Chambre
                            </th>
                            <th width="100" class="text-center">
                                Nb jours
                            </th>
                            <th width="150" class="text-center">
                                Montant
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse (App\Reservation::where('etat', 'Termine')->get() as $reservation)
                            @if(strtotime($reservation->fin) >= strtotime($date_debut) && strtotime($reservation->fin) <= strtotime($date_fin))
                                @foreach(App\Client::where('id', $reservation->client_id)->get() as $client)
                                    @foreach(App\Chambre::where('id', $reservation->chambre_id)->get() as $chambre)
                                        <tr>
                                            <td scope="row">
                                                {{ $reservation->fin }}
                                            </td>
                                            <td>
                                                {{ $client->nom_complet }}
                                            </td>
                                            <td width="300">
                                                
                                                    {{ $chambre->categorie }}
                                                
                                            </td>
                                            <td class="text-right">

                                                @if (((strtotime($reservation->fin) - strtotime($reservation->debut)) / 86400) < 0)

                                                    <?php $nb_jours = 0; ?>
                                                    {{ $nb_jours }}
                                                @elseif(((strtotime($reservation->fin) - strtotime($reservation->debut)) / 86400) == 0)
                                                    <?php $nb_jours = 1; ?>
                                                    {{ $nb_jours }}
                                                @elseif(((strtotime($reservation->fin) - strtotime($reservation->debut)) / 86400) > 0)
                                                    <?php $nb_jours = (strtotime($reservation->fin) - strtotime($reservation->debut)) / 86400; ?>
                                                    {{ $nb_jours }}
                                                @endif

                                            </td>
                                            <td class="text-right">
                                                @if(($chambre->prix * ($nb_jours)) < 0)
                                                    0
                                                @else
                                                    <b>{{ $chambre->prix * ($nb_jours) }} F</b>
                                                    <?php $montant_total += $chambre->prix * ($nb_jours) ?>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                @endforeach
                            @endif
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">
                                    <b>Bilan vide pour cette date !</b>
                                </td>
                            </tr>
                        @endforelse
                        <tr>
                            <td colspan="4" class="text-center">
                                <b>MONTANT TOTAL</b>
                            </td>
                            <td class="text-right">
                                <b class="font-weight-bold">{{ $montant_total }} F CFA</b>
                            </td>
                        </tr>
                    </tbody>
                </table>
                
                <br /><br /><br />
                <div class="text-right">
                    <b>Kpalimé, le {{ date("d-m-Y") }}.</b>
                </div><br /><br /><br />
                
            </div>
        </div>
    </div><br /><br /><br />
@endsection

@section('js')
    <script>
        window.addEventListener("load", window.print());
    </script>
@endsection