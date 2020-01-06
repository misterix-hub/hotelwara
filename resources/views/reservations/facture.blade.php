@extends('layouts.header')

@section('sideBarLeft')
    <br />
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12" style="font-size: 14px;">
                <h2 class="text-center">
                    <i class="icofont-soundcloud icofont-2x"></i><br />
                    <b class="font-weight-bold">Hôtel wara</b>
                </h2><br /><br />
                @foreach (App\Reservation::where('id', $id)->get() as $reservation)
                    <table width="100%">
                        <tr>
                            <td width="50%">
                                <h1>&nbsp;</h1>
                                <div>
                                    <b>Adresse complète : Kpalimé 2019<br />
                                    Email : <a href="">hotelwara@gmail.com</a><br />
                                    Contacts : 22891985311 | 22894856210</b>
                                </div>
                            </td>
                            <td>
                                <h1>Facture</h1>
                                
                                @foreach (App\Client::where('id', $reservation->client_id)->get() as $client)    
                                    <b>
                                        A l'ordre de M, Mme, Mlle <span class="font-weight-bold">{{ $client->nom_complet }}</span><br />
                                        Profession: {{ $client->profession }}<br />
                                        Contact : {{ $client->telephone }}
                                    </b>
                                @endforeach
                                
                            </td>
                        </tr>
                    </table><br /><br />

                    <table class="table table-striped table-bordered table-sm" width="100%">
                        <thead class="thead-default">
                            <tr>
                                <th>
                                    Libellé
                                </th>
                                <th class="text-center">
                                    Qantité
                                </th>
                                <th class="text-center">
                                    Jours
                                </th>
                                <th class="text-center">
                                    PU
                                </th>
                                <th class="text-center">
                                    PT
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach (App\Chambre::where('id', $reservation->chambre_id)->get() as $chambre) 
                                @if ($action == 'imprimer')
                                    <tr>
                                        <td scope="row">
                                            {{ $chambre->categorie }}
                                        </td>
                                        <td width="100" class="text-right">
                                            1
                                        </td>
                                        <td width="100" class="text-right">
                                            @if (((strtotime($reservation->fin) - strtotime($reservation->debut)) / 86400) < 0)
                                                0
                                            @elseif(((strtotime($reservation->fin) - strtotime($reservation->debut)) / 86400) == 0)
                                                1
                                            @elseif(((strtotime($reservation->fin) - strtotime($reservation->debut)) / 86400) > 0)
                                                {{ (strtotime($reservation->fin) - strtotime($reservation->debut)) / 86400 }}
                                            @endif
                                        </td>
                                        <td width="130" class="text-right">
                                            {{ $chambre->prix }} F
                                        </td>
                                        <td width="130" class="text-right">
                                            {{ ((strtotime($reservation->fin) - strtotime($reservation->debut)) / 86400) * $chambre->prix }} F
                                        </td>
                                    </tr>
                                    <tr>
                                        <th colspan="4" class="text-center">
                                            <span class="font-weight-bold">Total</span>
                                        </th>
                                        <th class="text-right">
                                            <span>{{ ((strtotime($reservation->fin) - strtotime($reservation->debut)) / 86400) * $chambre->prix }} F CFA</span>
                                        </th>
                                    </tr>
                                @else
                                    <tr>
                                        <td scope="row">
                                            {{ $chambre->categorie }}
                                        </td>
                                        <td width="100" class="text-right">
                                            1
                                        </td>
                                        <td width="100" class="text-right">
                                            @if (((strtotime(date('Y-m-d')) - strtotime($reservation->debut)) / 86400) < 0)
                                                0
                                            @elseif(((strtotime(date('Y-m-d')) - strtotime($reservation->debut)) / 86400) == 0)
                                                1
                                            @elseif(((strtotime(date('Y-m-d')) - strtotime($reservation->debut)) / 86400) > 0)
                                                {{ (strtotime(date('Y-m-d')) - strtotime($reservation->debut)) / 86400 }}
                                            @endif
                                        </td>
                                        <td width="130" class="text-right">
                                            {{ $chambre->prix }} F
                                        </td>
                                        <td width="130" class="text-right">
                                            @if ((((strtotime(date('Y-m-d')) - strtotime($reservation->debut)) / 86400) * $chambre->prix) < 0)
                                               0 
                                            @else
                                                {{ ((strtotime(date('Y-m-d')) - strtotime($reservation->debut)) / 86400) * $chambre->prix }} F
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th colspan="4" class="text-center">
                                            <span class="font-weight-bold">Total</span>
                                        </th>
                                        <th class="text-right">
                                            @if ((((strtotime(date('Y-m-d')) - strtotime($reservation->debut)) / 86400) * $chambre->prix) < 0)
                                                0
                                            @else
                                                <span>{{ ((strtotime(date('Y-m-d')) - strtotime($reservation->debut)) / 86400) * $chambre->prix }} F CFA</span>
                                            @endif
                                        </th>
                                    </tr> 
                                @endif
                            @endforeach
                        </tbody>
                    </table><br />
                @endforeach

                <div class="text-right">
                    <b>Kpalimé, le 12 Désembre 2020.</b>
                </div><br /><br /><br />

                <table width="100%">
                    <tr>
                        <td width="50%">
                            
                        </td>
                        <td class="font-weight-bold text-center">
                            Le Responsable
                        </td>
                    </tr>
                </table>
                
            </div>
        </div>
    </div><br /><br /><br />
@endsection

@section('js')
    <script>
        window.addEventListener("load", window.print());
    </script>
@endsection