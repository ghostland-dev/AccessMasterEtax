@extends('layouts.signed')

@section('main')
    <form class="container" action="{{ route('codesNaf.store') }}" method="POST">
        @csrf
        @method('POST')

        <h4 class="my-3 text-base w-fit mx-auto  text-slate-400 text-center bg-slate-50 p-3 rounded-md"> Ajouter un nouveau code NAF </h4>

                @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class=" grid lg:grid-cols-3 md:grid-cols-3 sm:grid-cols-1 gap-3">
            <!-- Text input -->
            <div class="group-form  mb-4">
                <label class="form-label" for="code_naf">CODE NAF</label>
                <input type="text" id="code_naf" name="code_naf" class="form-control" />

            </div>

            <!-- Text input -->
            <div class="group-form  mb-4">
                <label class="form-label" for="libelle_naf">Description NAF</label>
                <input type="text" id="libelle_naf" name="libelle_naf" class="form-control" />

            </div>

            <!-- Text input -->
            <div class="group-form  mb-4">
                <label class="form-label" for="code_nace">Eligible</label>
                <select class="form-select" name="eligible">
                    <option value="">Selectionner l'éligibilité</option>
                    <option value="1">Oui, ce code est éligible.</option>
                    <option value="0">Non, ce code n'est pas éligible.</option>
                </select>
            </div>


        </div>

        <!-- Submit button -->
        <button type="submit" class="btn btn-success btn-block mb-4">Soumettre </button>
    </form>
@endsection
