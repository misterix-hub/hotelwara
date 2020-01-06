@extends('layouts.sideBarLeft')

@section('content')
    <br />
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-9 col-md-12 col-sm-12" style="font-size: 14px;">
                <i class="icofont-group"></i>
                <small class="font-weight-bold">CLIENTS</small><br /><br />

                <table class="table table-striped table-bordered" width="100%" id="example1">
                    <thead>
                        <tr>
                            <th>
                                Nom complet
                            </th>
                            <th>
                                Téléphone
                            </th>
                            <th>
                                Profession
                            </th>
                            <th>
                                N° carte
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach (App\Client::select('nom_complet', 'carte', 'telephone', 'profession', "id")->distinct('carte')->get() as $client)    
                            <tr>
                                <td>
                                    {{ $client->nom_complet }}
                                </td>
                                <td>
                                    {{ $client->telephone }}
                                </td>
                                <td>
                                    {{ $client->profession }}
                                </td>
                                <td>
                                    {{ $client->carte }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>
                                Nom complet
                            </th>
                            <th>
                                Téléphone
                            </th>
                            <th>
                                Profession
                            </th>
                            <th>
                                N° carte
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

@section('js')
    <script src="{{ URL::asset('plugins/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ URL::asset('plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
    <script>
        $(function () {
            $('#example1').DataTable();
        });
    </script>
@endsection