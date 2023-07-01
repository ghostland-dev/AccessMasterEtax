@extends('layouts.signed')

@section('main')
    <h5 class="card-header bg-success text-center text-white">{{ __('Test d\'Eligibilité CSPE') }}</h5>

    <div class="container-fluid  ">
        <form method="POST" action="{{ route('cspeElig.update', $EligibiliteCSPE->id) }}" class=" ">
            @csrf
            @method('PUT')


        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <div class="shadow  p-2 grid lg:grid-cols-4  md:grid-cols-2 sm:grid-cols-1 py-4">
                <div class="  p-2  ">
                    <label for="codeNaf" class="  col-form-label text-md-right">{{ __('Code NAF') }}</label>

                    <div class=" ">
                        <input id="codeNaf" type="text" class="form-control" name="codeNaf" placeholder="0.00" required
                            autocomplete="codeNaf" value="{{ $EligibiliteCSPE->codeNaf }}" autofocus>
                    </div>
                </div>

                <div class="  p-2   ">
                    <label for="valeurAjouter" class="  col-form-label text-md-right">{{ __('Valeur Ajouter') }}</label>

                    <div class=" ">
                        <input id="valeurAjouter" type="text" class="form-control" name="valeurAjouter"
                            placeholder="0.00" required autocomplete="valeurAjouter"
                            value="{{ $EligibiliteCSPE->valeurAjouter }}">
                    </div>
                </div>

                <div class="  p-2   ">
                    <label for="CAR" class="  col-form-label text-md-right">{{ __('CAR') }}</label>

                    <div class=" ">
                        <input id="CAR" type="text" class="form-control" placeholder="0.00" name="CAR" required
                            autocomplete="CAR" value="{{ $EligibiliteCSPE->CAR }}">
                    </div>
                </div>

                <div class="  p-2   ">
                    <label for="study_id" class=" col-form-label text-md-right">Assigné à l'étude</label>
                    <select name="study_id" id="study_id" class="form-select" required>
                        <option value="">Selectionnez une étude</option>
                        @foreach ($etudes as $etude)
                            <option {{ $etude->id == $EligibiliteCSPE->study_id ? 'selected' : '' }}
                                value="{{ $etude->id }}">
                                {{ $etude->nom_etude . ' ' . $etude->id }}</option>
                        @endforeach

                    </select>
                </div>
            </div>
            <div class=" max-auto my-3   ">
                <div class=" ">
                    <button type="submit" class="btn btn-success">
                        {{ __('lancez le teste d\'éligibilité') }} <i class="fa fa-arrow-right mx-2"
                            aria-hidden="true"></i>
                    </button>
                </div>
            </div>
        </form>



    </div>
@endsection
