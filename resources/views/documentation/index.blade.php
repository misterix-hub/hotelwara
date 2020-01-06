@extends('layouts.sideBarLeft')

@section('content')
    <br />
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-9 col-md-12 col-sm-12">
                <i class="icofont-book-alt"></i>
                <small class="font-weight-bold">DOCUMENTATION</small><br /><br />

                <div id="accordianId" role="tablist" aria-multiselectable="true">
                    <div class="card">
                        <div class="card-header" role="tab" id="section1HeaderId">
                            <h6 class="mb-0">
                                <a data-toggle="collapse" data-parent="#accordianId" href="#section1ContentId" aria-expanded="true" aria-controls="section1ContentId">
                                    <b class="text-muted">Comment faire une réservation ?</b>
                                </a>
                            </h6>
                        </div>
                        <div id="section1ContentId" class="collapse in" role="tabpanel" aria-labelledby="section1HeaderId">

                            
                            <div class="card-body">
                                <div class="red text-center rounded-circle mb-2 white-text" style="width: 30px; height: 30px; line-height: 30px;">
                                    1
                                </div>
                                <img src="{{ URL::asset('images/documentation/Capture d’écran de 2020-01-06 13-31-16.png') }}" alt="" width="100%">
                                <br /><br />
                                <div class="red text-center rounded-circle mb-2 white-text" style="width: 30px; height: 30px; line-height: 30px;">
                                    2
                                </div>
                                <img src="{{ URL::asset('images/documentation/Capture d’écran de 2020-01-06 13-31-31.png') }}" alt="" width="100%">
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" role="tab" id="section2HeaderId">
                            <h6 class="mb-0">
                                <a data-toggle="collapse" data-parent="#accordianId" href="#section2ContentId" aria-expanded="true" aria-controls="section2ContentId">
                                    <b class="text-muted">Comment ajouter une chambre ?</b>
                                </a>
                            </h6>
                        </div>
                        <div id="section2ContentId" class="collapse in" role="tabpanel" aria-labelledby="section2HeaderId">
                            <div class="card-body">
                                Section 2 content
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" role="tab" id="section3HeaderId">
                            <h6 class="mb-0">
                                <a data-toggle="collapse" data-parent="#accordianId" href="#section3ContentId" aria-expanded="true" aria-controls="section3ContentId">
                                    <b class="text-muted">Ajouter un personnel ?</b>
                                </a>
                            </h6>
                        </div>
                        <div id="section3ContentId" class="collapse in" role="tabpanel" aria-labelledby="section3HeaderId">
                            <div class="card-body">
                                Section 2 content
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" role="tab" id="section4HeaderId">
                            <h6 class="mb-0">
                                <a data-toggle="collapse" data-parent="#accordianId" href="#section4ContentId" aria-expanded="true" aria-controls="section4ContentId">
                                    <b class="text-muted">Comment ajouter un matériel ?</b>
                                </a>
                            </h6>
                        </div>
                        <div id="section4ContentId" class="collapse in" role="tabpanel" aria-labelledby="section4HeaderId">
                            <div class="card-body">
                                Section 2 content
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="col-lg-3 col-md-12 com-sm-12">
                @include('included.sideBarRight')
            </div>
        </div>
    </div>
@endsection