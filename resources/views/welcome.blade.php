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


                        <br /><br /><br /><br /><br />
                        <h1 class="comfortaa text-center text-muted">
                            Bienvenu (e), {{ session()->get('nom') }}
                        </h1><br />

                        <h5 class="comfortaa text-center text-muted">
                            Espace réservé uniquement aux administrateurs, utilisateurs et gérants
                        </h5><br />

                        <center>
                            <div style="width: 200px;" class="border-bottom mt-4 border-warning"></div>
                        </center><br /><br />

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
        });
    </script>
@endsection