@extends('layouts.signed')
@section('main')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-success">Détail de bureau des douanes</h5>
                    <p class="card-text"> <b class="text-dark">+ Nom de bureau :</b> {{ $douane->council_office_name }}</p>
                    <p class="card-text"> <b class="text-dark">+ Adresse de bureau :</b> {{ $douane->council_office_address }}
                    </p>
                    <p class="card-text"> <b class="text-dark">+ Code NIC :</b> {{ $douane->nic_code }}
                    </p>
                    <a href="{{ route('douanes') }}" class="btn btn-success"> <i class="fa fa-arrow-circle-left"></i></a>
                </div>
            </div>
        </div>
    </div>
@endsection
