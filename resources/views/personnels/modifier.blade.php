@extends('layouts.sideBarLeft')

@section('content')
    <br />
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-9 col-md-12 col-sm-12">
                <i class="icofont-shield"></i>
                <small class="font-weight-bold">AJOUTER UN PERSONNEL</small><br />

                @if ($message = Session::get('success'))
                    <div class="alert alert-primary alert-success fade show" style="font-size: 14px;" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            <span class="sr-only">Close</span>
                        </button>
                        {{ $message }}
                    </div>
                @endif

                <form action="{{ route('updatePersonnel', $id) }}" method="post">
                    @csrf
                    <br />
                    <table width="100%">
                        @foreach (App\Personnel::where('id', $id)->get() as $personnel)    
                            <tr>
                                <td width="50%">
                                    <label for="nom" class="font-size-14 mb-0"><b>Nom complet du personnel</b></label>
                                    <input required type="text" id="nom" name="nom" class="form-control font-size-14" value="{{ $personnel->nom }}">
                                </td>
                                <td>
                                    <label for="email" class="font-size-14 mb-0"><b>Email</b></label>
                                    <input required type="email" id="email" name="email" class="form-control font-size-14" value="{{ $personnel->email }}">
                                </td>
                            </tr>
                            <tr>
                                <td width="50%" class="pt-3">
                                    <label for="telephone" class="font-size-14 mb-0"><b>Téléphone</b></label>
                                    <input required type="text" id="telephone" name="telephone" class="form-control font-size-14" value="{{ $personnel->telephone }}">
                                </td>
                                <td class="pt-3">
                                    <label for="fonction" class="font-size-14 mb-0"><b>Fonction</b></label>
                                    <input required type="text" id="fonction" name="fonction" class="form-control font-size-14" value="{{ $personnel->fonction }}">
                                </td>
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="3" class="pt-2">
                                <button type="submit" class="btn btn-blue btn-md ml-0 rounded {{ (session()->get('role') == 'gerant') ? 'disabled' : '' }}">
                                    Mettre à jour
                                </button>
                            </td>
                        </tr>
                    </table>
                </form>

            </div>
            <div class="col-lg-3 col-md-12 com-sm-12">
                @include('included.sideBarRight')
            </div>
        </div>
    </div>
@endsection