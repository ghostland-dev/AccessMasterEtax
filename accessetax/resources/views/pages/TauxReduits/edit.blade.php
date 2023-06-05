@extends('layouts.signed')

@section('main')
    <!--  Header End -->
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <h4 class="my-3 text-base w-full mx-auto  text-slate-400 text-center bg-slate-50 p-3 rounded-md"> Modifier
                    un taux réduit</h4>
                <form action="{{ route('taxRed.update', $TauxReduit->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <!-- 2 column grid layout with text inputs for the first and last names -->
                    <div class="grid gap-3 grid-cols-3 lg:grid-cols-3 md:grid-cols-3 sm:grid-cols-1">

                        <div class="">
                            <div class="form-outline">
                                <label class="form-label" for="titre">Titre</label>
                                <input type="text" placeholder="Titre de taux" id="titre"
                                    value="{{ $TauxReduit->titre }}" name="titre" class="form-control" />
                            </div>
                        </div>
                        <div class="">
                            <div class="form-outline">
                                <label class="form-label" for="consommation_mkw">consommation en (MKw)</label>
                                <input type="number" placeholder="0.00" id="consommation_mkw"
                                    value="{{ $TauxReduit->consommation_mkw }}" name="consommation_mkw"
                                    class="form-control" />
                            </div>
                        </div>
                        <div class="">
                            <div class="form-outline">
                                <label class="form-label" for="remuneration">remuneration en (€)</label>
                                <input type="number" placeholder="0.00" id="remuneration"
                                    value="{{ $TauxReduit->remuneration }}" name="remuneration" class="form-control" />
                            </div>
                        </div>


                    </div>

                    <!-- Submit button -->
                    <button type="submit" class="btn btn-success px-3 my-4">Soumettre </button>
                </form>

            </div>
        </div>
    </div>
@endsection
