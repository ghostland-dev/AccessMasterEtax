@extends('layouts.signed')
@section('main')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-success">Détail des consntnates</h5>
                    <p class="card-text"> <b class="text-dark">+ TICGN plein :</b> {{ $constant->tcgn_plein }}</p>
                    <p class="card-text"> <b class="text-dark">+ TICGN reduite :</b> {{ $constant->tcgn_reduit }}</p>
                    <p class="card-text"> <b class="text-dark">+ CSPE :</b> {{ $constant->cspe }}
                    </p>
                    <a href="{{ route('constants') }}" class="btn btn-success"> <i class="fa fa-arrow-circle-left"></i></a>
                </div>
            </div>
        </div>
    </div>
@endsection
