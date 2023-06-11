@extends('layouts.signed')

@section('main')
    <h5 class="card-header bg-success text-center text-white">{{ __('Test d\'Eligibilité CSPE') }}</h5>

    <div class="container-fluid  ">
        <form method="POST" action="{{ route('cspeElig.store') }}" class=" ">
            @csrf
            @method('POST')
            <div id="formsContainer">
                <div class="shadow-md  p-2 grid lg:grid-cols-4  md:grid-cols-2 sm:grid-cols-1 py-4 my-3">
                    <div class="  p-2  ">
                        <label for="codeNaf" class="  col-form-label text-md-right">{{ __('Code NAF') }}</label>

                        <div class=" ">
                            <input id="codeNaf" type="text" class="form-control" name="codeNaf[]"
                                value="{{ old('codeNaf') }}" placeholder="0.00" required autocomplete="codeNaf" autofocus>
                        </div>
                    </div>

                    <div class="  p-2   ">
                        <label for="valeurAjouter" class="  col-form-label text-md-right">{{ __('Valeur Ajouter') }}</label>

                        <div class=" ">
                            <input id="valeurAjouter" type="number" class="form-control" name="valeurAjouter[]"
                                value="{{ old('valeurAjouter') }}" placeholder="0.00" required autocomplete="valeurAjouter">
                        </div>
                    </div>

                    <div class="  p-2   ">
                        <label for="CAR" class="  col-form-label text-md-right">{{ __('CAR') }}</label>

                        <div class=" ">
                            <input id="CAR" type="number" class="form-control" placeholder="0.00" name="CAR[]"
                                value="{{ old('CAR') }}" required autocomplete="CAR">
                        </div>
                    </div>

                    <div class="  p-2   ">
                        <label for="study_id" class=" col-form-label text-md-right">Assigné à l'étude</label>
                        <select name="study_id[]" id="study_id" class="form-select" required>
                            <option value="">Selectionnez une étude</option>
                            @foreach ($etudes as $etude)
                                <option {{ $etude->id ? 'selected' : '' }} value="{{ $etude->id }}">
                                    {{ $etude->nom_etude . ' ' . $etude->id }}</option>
                            @endforeach

                        </select>
                    </div>
                </div>

            </div>

            <div class=" max-auto my-3   ">
                <div class=" ">
                    <button type="submit" class="btn btn-success m-2">
                        {{ __('lancez le teste d\'éligibilité') }} <i class="fa fa-arrow-right  " aria-hidden="true"></i>
                    </button>


                    <button id="addFormButton" class="btn btn-dark m-2">{{ __('Ajouter un nouveau formulaire') }}</button>

                </div>
            </div>
        </form>




    </div>

    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
    <script>
        $(document).ready(function() {
            let formIndex = 1;

            $('#addFormButton').click(function(e) {
                e.preventDefault();
                let newForm = `
                <div class="shadow-md p-2 grid lg:grid-cols-4  md:grid-cols-2 sm:grid-cols-1 py-4 my-3">
                    <div class="  p-2  ">
                        <label for="codeNaf" class="  col-form-label text-md-right">{{ __('Code NAF') }}</label>
                        <div class=" ">
                            <input id="codeNaf" type="text" class="form-control" name="codeNaf[]" required autocomplete="codeNaf" autofocus>
                        </div>
                    </div>

                    <div class="  p-2   ">
                        <label for="valeurAjouter" class="  col-form-label text-md-right">{{ __('Valeur Ajouter') }}</label>
                        <div class=" ">
                            <input id="valeurAjouter" type="text" class="form-control" name="valeurAjouter[]" required autocomplete="valeurAjouter">
                        </div>
                    </div>

                    <div class="  p-2   ">
                        <label for="CAR[]" class="  col-form-label text-md-right">{{ __('CAR') }}</label>
                        <div class=" ">
                            <input id="CAR" type="text" class="form-control" name="CAR[]" required autocomplete="CAR">
                        </div>
                    </div>

                    <div class="  p-2   ">
                        <label for="study_id" class=" col-form-label text-md-right">Assigné à l'étude</label>
                        <select name="study_id[]" id="study_id" class="form-select" required>
                            <option value="">Selectionnez une étude</option>
                            @foreach ($etudes as $etude)
                                <option value="{{ $etude->id }}">
                                    {{ $etude->nom_etude . ' ' . $etude->id }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                `;

                $('#formsContainer').append(newForm);
                formIndex++;
            });
        });
    </script>
@endsection
