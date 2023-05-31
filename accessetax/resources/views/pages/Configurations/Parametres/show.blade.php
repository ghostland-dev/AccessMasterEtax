@extends('layouts.signed')
@section('main')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-success">Détail des paramètres </h5>
                    <p class="card-text"> <b class="text-dark">+ Paraméter TICGN :</b> {{ $parametre->tcgn }}</p>
                    <p class="card-text"> <b class="text-dark">+ Paraméter CSPE :</b> {{ $parametre->cspe }}</p>
                    <p class="card-text"> <b class="text-dark">+ Paraméter CSPE :</b> {{ $parametre->created_at }}</p>

                    <a href="{{ route('parameters') }}" class="btn btn-success"> <i class="fa fa-arrow-circle-left"></i></a>
                </div>
            </div>
        </div>
    </div>
@endsection
