@extends('layouts.sideBarLeft')

@section('content')
    <br />
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-9 col-md-12 col-sm-12" style="font-size: 14px;">
                                
                <i class="icofont-chart-line"></i>
                <small class="font-weight-bold">BILAN DE RESERVATIONS</small><br /><br />

                @if ($message = Session::get('success'))    
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            <span class="sr-only">Close</span>
                        </button>
                        {{ $message }}
                    </div>
                @endif<br />

                <form action="{{ route('printBilan') }}" target="_blank" class="row" method="get">
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <label for="reservationtime" class="mb-0"><b>Sélectionnez les dates correspondantes à votre bilan</b></label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="icofont-calendar"></i></span>
                            </div>
                            <input required type="text" class="form-control float-right font-size-14" name="date" id="reservationtime">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <label class="mb-0"><b>&nbsp;</b></label><br />
                        <button type="submit" class="btn btn-primary btn-md rounded m-0">
                            Soumettre
                        </button>
                    </div>
                </form>
            </div>
            <div class="col-lg-3 col-md-12 com-sm-12">
                @include('included.sideBarRight')
            </div>
        </div>
    </div><br /><br /><br />
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