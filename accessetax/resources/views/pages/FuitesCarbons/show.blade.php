@extends('layouts.signed')
@section('main')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-success">Détail de fuite Carbon</h5>
                    <p class="card-text"> <b class="text-dark">+ Nom :</b> {{ $fuiteCarbon->nom }}</p>
                    <p class="card-text"> <b class="text-dark">+ Code :</b> {{ $fuiteCarbon->code }}</p>
                    <p class="card-text"> <b class="text-dark">+ Eligibilité :</b>
                        {{ $fuiteCarbon->eligible ? 'Oui' : 'Non' }}
                    </p>
                    <a href="{{ route('fuitcarbons') }}" class="btn btn-success"> <i
                            class="fa fa-arrow-circle-left"></i></a>
                </div>
            </div>
        </div>
    </div>
@endsection
