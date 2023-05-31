@extends('layouts.signed')

@section('main')
    <form action="{{ route('activityCode.store') }}" method="POST" class=" w-1/2 shadow mx-auto p-7 rounded-md">
        @csrf
        @method('POST')

        <div class="text-center my-3 bg-slate-50 p-3 rounded-md w-full ">
            <h4 class="text-gray-400   "> Ajouter un nouveau code d'activité </h4>
        </div>

        <div class="row  ">
            <!-- Text input -->
            <div class="group-form col-md-3 mb-4">
                <label class="form-label" for="code_naf">CODE NAF</label>
                <input type="text" id="code_naf" name="code_naf" class="form-control" placeholder="ex:EX245D" />

            </div>

            <!-- Text input -->
            <div class="group-form col-md-9 mb-4">
                <label class="form-label" for="libelle_naf">Description NAF</label>
                <input type="text" id="libelle_naf" name="libelle_naf" class="form-control"
                    placeholder="ex: le code Naf de telle activité ." />

            </div>

            <!-- Text input -->
            <div class="group-form col-md-3 mb-4">
                <label class="form-label" for="code_nace">Code NACE</label>
                <input type="text" id="code_nace" name="code_nace" class="form-control" placeholder="Code Nace" />

            </div>

            <!-- Text input -->
            <div class="group-form col-md-9 mb-4">
                <label class="form-label" for="libelle_nace">Description NACE</label>
                <input type="text" id="libelle_nace" name="libelle_nace" class="form-control"
                    placeholder="ex: le code Nace de telle activité ." />

            </div>
        </div>

        <!-- Submit button -->
        <button type="submit" class="btn btn-success   mb-4 ">Soumettre</button>
    </form>
@endsection
