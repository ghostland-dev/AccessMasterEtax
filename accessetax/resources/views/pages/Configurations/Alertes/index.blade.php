@extends('layouts.app')
@section('content')
    <table class="table align-middle mb-0 bg-white">
        <button type="button" class="btn btn-info m-3 ">
            + Nouveau alerte
        </button>
        <thead class="bg-light">
            <tr>
                <th scope="col">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" />
                    </div>
                </th>
                <th>alerte</th>
                <th>Contact</th>
                <th>SIREN</th>
                <th>Adresse</th>
                <th>Energie</th>
                <th>Date Inscription </th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($alertes as $alerte)
                <tr>
                    <th scope="row">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" />
                        </div>
                    </th>
                    <td>
                        <div class="d-flex align-items-center">
                            <img src="{{ $alerte->logo }}" alt="" style="width: 45px; height: 45px"
                                class="rounded-circle" />
                            <div class="ms-3">
                                <p class="fw-bold mb-1">{{ $alerte->nom_alerte }}</p>
                                <p class="text-muted mb-0">{{ $alerte->contact }}</p>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="d-flex align-items-center">
                            <div class="ms-3">
                                <p class="fw-bold mb-1"> <i class="fas fa-phone"></i> {{ $alerte->tel }}</p>
                                <p class="text-muted mb-0"><b>E-mail</b> {{ $alerte->email }}</p>
                            </div>
                        </div>
                    </td>
                    <td>
                        <p class="text-muted mb-0">{{ $alerte->siret }}</p>
                    </td>
                    <td>
                        <p class="text-muted mb-0">{{ $alerte->address }}</p>
                        <p class="text-muted mb-0">{{ $alerte->city . ' | ' . $alerte->zip_code }}</p>
                    </td>
                    <td>
                        <p class="badge badge-info rounded-pill d-inline {{ $alerte->alerte_electrcite ? '' : 'd-none' }}">
                            {{ $alerte->alerte_electrcite ? 'Electrcité' : '' }}</p>
                        <p class="badge badge-warning rounded-pill d-inline {{ $alerte->alerte_gaz ? '' : 'd-none' }}">
                            {{ $alerte->alerte_gaz ? 'Gaz' : '' }}</p>
                    </td>
                    <td>{{ $alerte->created_at }}</td>
                    <td>
                        <a href="button" class="btn btn-primary btn-sm btn-rounded"> <i class="fas fa-pen"></i> </a>
                        <a href="button" class="btn btn-danger btn-sm btn-rounded"> <i class="fas fa-trash"></i> </a>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-4">
        {{ $alertes->links('vendor.pagination.tailwind') }}
    </div>
@endsection
