@extends('layouts.app')
@section('content')




<table class="table align-middle mb-0 bg-white">
    <button type="button" class="btn btn-info m-3 ">
        + Nouveau contratGaz
    </button>
    <thead class="bg-light">
        <tr>
            <th scope="col">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" />
                </div>
            </th>
            <th>ID Contrat</th>
            <th>Période</th>
            <th>Signature</th>
            <th>Compteur</th>
            <th>Téléchargement</th>
            <th>Date Inscription </th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($contratGazs as $contratGaz )
        <tr>
            <th scope="row">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" />
                </div>
            </th>
            <td>
                <div class="d-flex align-items-center">

                    <div class="ms-3">
                        <p class="fw-bold mb-1">{{ $contratGaz->nom_contrat  }}</p>
                        <p class="text-muted mb-0">{{ $contratGaz->fournisseur }}</p>
                    </div>
                </div>
            </td>
            <td>
                <div class="d-flex align-items-center">
                    <div class="ms-3">
                        <p class="fw-bold mb-1"> <i class="fas fa-date"></i> {{ $contratGaz->date_debut   }}</p>
                        <p class="fw-bold mb-1"> <i class="fas fa-date"></i> {{ $contratGaz->date_fin   }}</p>

                    </div>
                </div>
            </td>
            <td>
                <p class="text-muted mb-0">{{  $contratGaz->date_signature }}</p>
            </td>
            <td>
                <p class="text-muted mb-0">{{ $contratGaz->gaz_meter_id }}</p>

            </td>
            <td>
                <p class="text-muted mb-0"><a class=" p-3 rounded-circle bg-warning text-white fas fa-download"
                        href="{{ $contratGaz->fichier }}" download></a>
                </p>
            </td>
            <td>{{ $contratGaz->created_at }}</td>
            <td>
                <a href="button" class="btn btn-primary btn-sm btn-rounded"> <i class="fas fa-pen"></i> </a>
                <a href="button" class="btn btn-danger btn-sm btn-rounded"> <i class="fas fa-trash"></i> </a>

            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection