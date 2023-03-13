@extends('layouts.app')
@section('content')
  
<table class="table align-middle mb-0 bg-white">
    <button type="button" class="btn btn-info m-3 ">
      + Nouveau site
    </button>
    <thead class="bg-light">
      <tr>
        <th scope="col">
          <div class="form-check">
             <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" />
          </div>
        </th>
        <th>site</th>
        <th>Adresse</th>
        <th>Contact</th>
        <th>Consommation</th>
        <th>Date Inscription  </th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      @foreach($sites as $site )
      <tr>
        <th scope="row">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" />
          </div>
        </th>
        <td>
          <div class="d-flex align-items-center">
             
            <div class="ms-3">
              <p class="fw-bold mb-1">{{ $site->nom}}</p>
              <p class="text-muted mb-0">{{ $site->siret }}</p>
            </div>
          </div>
        </td>
        <td>
          <div class="d-flex align-items-center">
            <div class="ms-3">
              <p class="fw-bold mb-1"> <i class="fas fa-map"></i>  {{ $site->adresse   }}</p>
              <p class="text-muted mb-0"> {{ $site->ville.' | ' .$site->code_postal.' | ' .$site->pays }}</p>
            </div>
          </div>
        </td>
        <td>
          <p class="text-muted mb-0">{{  $site->telephone }}</p>
          <p class="text-muted mb-0">{{  $site->email }}</p>
        </td>
        <td>
          <p class="text-muted mb-0"><i class="fas fa-plug"></i> {{ $site->consommation_electrcite }}</p>
          <p class="text-muted mb-0"><i class="fas fa-fire"></i>  {{ $site->consommation_gaz }}</p>
        </td>
 
        <td>{{ $site->created_at }}</td>
        <td>
          <a href="button" class="btn btn-primary btn-sm btn-rounded"> <i class="fas fa-pen"></i> </a>
          <a href="button" class="btn btn-danger btn-sm btn-rounded">  <i class="fas fa-trash"></i> </a>

        </td>
      </tr>
      @endforeach
    </tbody>
  </table>

@endsection