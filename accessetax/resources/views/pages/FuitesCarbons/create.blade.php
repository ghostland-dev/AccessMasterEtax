@extends('layouts.signed')

@section('main')
    <form class="container" action="{{ route('fuitcarbon.store') }}" method="POST">
        @csrf
        @method('POST')


        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

        <div class="row">
            <!-- Text input -->
            <div class="group-form col-md-8 mb-4">
                <label class="form-label" for="nom">Nom</label>
                <input type="text" id="nom" name="nom" class="form-control" placeholder="nom de code . . ." />

            </div>

            <!-- Text input -->
            <div class="group-form col-md-4 mb-4">
                <label class="form-label" for="code">Code</label>
                <input type="text" id="code" name="code" class="form-control" placeholder="ex: AP1000"/>
            </div>

            <!-- Text input -->
            <div class="group-form col-md-4 mb-4">
                <label class="form-label" for="eligible">Eligible</label>
                <select class="form-select" name="eligible" id="eligible">
                    <option value="">Selectionner l'éligibilité</option>
                    <option value="1">Oui, ce code est éligible.</option>
                    <option value="0">Non, ce code n'est pas éligible.</option>
                </select>
            </div>


        </div>

        <!-- Submit button -->
        <button type="submit" class="btn btn-success  my-4">Soumettre</button>
    </form>
@endsection
