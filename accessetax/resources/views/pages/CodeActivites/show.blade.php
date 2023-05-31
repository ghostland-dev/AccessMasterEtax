@extends('layouts.signed')
@section('main')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-success">Détail de code d'activité</h5>
                    <p class="card-text"> <b class="text-dark">+ Code NAF :</b> {{ $codeActivite->code_naf }}</p>
                    <p class="card-text"> <b class="text-dark">+ Code NACE :</b> {{ $codeActivite->code_nace }}</p>
                    <p class="card-text"> <b class="text-dark">+ Libellé NAF :</b> {{ $codeActivite->libelle_naf }}</p>
                    <p class="card-text"> <b class="text-dark">+ Libellé NACE :</b> {{ $codeActivite->libelle_nace }}</p>

                    <a href="{{ route('activityCodes') }}" class="btn btn-success"> <i
                            class="fa fa-arrow-circle-left"></i></a>
                </div>
            </div>
        </div>
    </div>
@endsection
