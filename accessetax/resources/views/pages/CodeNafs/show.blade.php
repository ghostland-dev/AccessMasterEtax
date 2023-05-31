@extends('layouts.signed')
@section('main')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-success">Détail de code NAF</h5>
                    <p class="card-text"> <b class="text-dark">+ Code Naf :</b> {{ $codenaf->code_naf }}</p>
                    <p class="card-text"> <b class="text-dark">+ Libellé naf :</b> {{ $codenaf->libelle_naf }}</p>
                    <p class="card-text"> <b class="text-dark">+ Eligibilité :</b> {{ $codenaf->eligible ? 'Oui' : 'Non' }}
                    </p>
                    <a href="{{route('codesNafs')}}" class="btn btn-success"> <i class="fa fa-arrow-circle-left"></i></a>
                </div>
            </div>
        </div>
    </div>
@endsection
