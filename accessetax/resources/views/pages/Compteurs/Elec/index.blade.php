@extends('layouts.app')
@section('content')




<table class="table align-middle mb-0 bg-white">
    <button type="button" class="btn btn-info m-3 ">
        + Nouveau fournisseur
    </button>
    <thead class="bg-light">
        <tr>
            <th scope="col">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" />
                </div>
            </th>
            <th>PDL</th>
            <th>Puissance</th>
            <th>Fournisseur</th>
            <th>Consummation</th>
            <th>Profil</th>
            <th>Année</th>
            <th>Site</th>
            <th>Date Inscription </th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($compteursElecs as $compteursElec )
        <tr>
            <th scope="row">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" />
                </div>
            </th>
            <td>
                <div class="d-flex align-items-center">
                    <div class="ms-3">
                        <p class="fw-bold mb-1">{{ $compteursElec->PDL  }}</p>
                        <p class="text-muted mb-0">{{ $compteursElec->nom_compteur }}</p>
                    </div>
                </div>
            </td>
            <td>
                <div class="d-flex align-items-center">
                    <div class="ms-3">
                        <p class="fw-bold mb-1"> {{ $compteursElec->puissance   }}</p>
                    </div>
                </div>
            </td>
            <td>
                <p class="fw-bold mb-1"> {{ $compteursElec->fournisseur   }}</p>
            </td>
            <td>
                <p class="fw-bold mb-1"> {{ $compteursElec->profile   }}</p>
            </td>
            <td>
                <p class="fw-bold mb-1"> {{ $compteursElec->consommation   }}</p>
            </td>
            <td>
                <p class="text-muted mb-0">{{ $compteursElec->annee }}</p>
            </td>
            <td>
                <p class="text-muted mb-0">{{ $compteursElec->site_id }}</p>
            </td>

            <td>{{ $compteursElec->created_at }}</td>
            <td>
                <a href="button" class="btn btn-primary btn-sm btn-rounded"> <i class="fas fa-pen"></i> </a>
                <a href="button" class="btn btn-danger btn-sm btn-rounded"> <i class="fas fa-trash"></i> </a>

            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection