@extends('layouts.app')
@section('content')
    <table class="table align-middle mb-0 bg-white">
        <thead class="bg-light">
            <tr>
                <th scope="col">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" />
                    </div>
                </th>
                <th>Identifiants</th>
                <th>Contact
                <th>
                <th>Fonction</th>
                <th>Statut</th>
                <th>Date Inscription </th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($clients as $client)
                <tr>
                    <th scope="row">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" />
                        </div>
                    </th>
                    <td>
                        <div class="d-flex align-items-center">
                            <img src="{{ $client->profile }}" alt="" style="width: 45px; height: 45px"
                                class="rounded-circle" />
                            <div class="ms-3">
                                <p class="fw-bold mb-1">{{ $client->firstName . ' ' . $client->lastName }}</p>
                                <p class="text-muted mb-0">{{ $client->email }}</p>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="d-flex align-items-center">
                            <div class="ms-3">
                                <p class="fw-bold mb-1"> Mobile {{ $client->tel }}</p>
                                <p class="text-muted mb-0"><b>Fix</b> {{ $client->fix }}</p>
                            </div>
                        </div>
                    </td>
                    <td>
                        <p class="fw-normal mb-1">{{ $client->job }}</p>
                        <p class="text-muted mb-0"><b>SIREN : </b>{{ $client->siren }}</p>
                    </td>
                    <td>
                        <span class="badge badge-primary rounded-pill d-inline">{{ $client->role }}</span>
                    </td>
                    <td>
                        <span
                            class="badge badge-success rounded-pill d-inline">{{ $client->email_verified_at ? 'verifié' : 'Pas verifié' }}</span>
                    </td>
                    <td>{{ $client->created_at }}</td>
                    <td>
                        <a href="button" class="btn btn-primary btn-sm btn-rounded"> Editer </a>
                        <a href="button" class="btn btn-danger btn-sm btn-rounded"> Supprimer </a>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-4">
        {{ $clients->links('vendor.pagination.tailwind') }}
    </div>
@endsection
