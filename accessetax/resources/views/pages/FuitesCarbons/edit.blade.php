@extends('layouts.signed')

@section('main')
    <form class="container  " action="{{ route('fuitcarbon.update', $fuiteCarbon->id) }}" method="POST">
        @csrf
        @method('PUT')

        <h4 class="my-3 text-base w-fit mx-auto  text-slate-400 text-center bg-slate-50 p-3 rounded-md"> Modifier le code de
            fuite carbon </h4>

        <div class="row">
            <!-- Text input -->
            <div class="group-form col-md-4 mb-4">
                <label class="form-label" for="nom">Nom</label>
                <input type="text" id="nom" name="nom" value="{{ $fuiteCarbon->nom }}" class="form-control" />

            </div>

            <!-- Text input -->
            <div class="group-form col-md-4 mb-4">
                <label class="form-label" for="code">Code</label>
                <input type="text" id="code" name="code" value="{{ $fuiteCarbon->code }}" class="form-control" />
            </div>

            <!-- Text input -->
            <div class="group-form col-md-4 mb-4">
                <label class="form-label" for="eligible">Eligible</label>
                <select class="form-select" name="eligible" id="eligible">
                    <option value="">Selectionner l'éligibilité</option>
                    <option {{ $fuiteCarbon->eligible === 1 ? 'selected' : '' }} value="1">Oui, ce code est éligible.
                    </option>
                    <option {{ $fuiteCarbon->eligible === 0 ? 'selected' : '' }} value="0">Non, ce code n'est pas
                        éligible.</option>
                </select>
            </div>


        </div>

        <!-- Submit button -->
        <button type="submit" class="btn btn-success   mb-4">Mettre à jour</button>
    </form>
@endsection
