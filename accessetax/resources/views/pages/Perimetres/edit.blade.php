@extends('layouts.signed')

@section('main')
    <!--  Header End -->
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <h4 class="my-3 text-base w-full mx-auto  text-slate-400 text-center bg-slate-50 p-3 rounded-md"> Modifier
                    des
                    parimètres </h4>
                <form action="{{ route('premMeter.update',$Piremetrecompteur->id) }}" method="POST">
                    @csrf
                    @method('PUT')


                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <!-- 2 column grid layout with text inputs for the first and last names -->
                    <div class="grid gap-3 grid-cols-4 lg:grid-cols-4 md:grid-cols-3 sm:grid-cols-1">

                        <div class="">
                            <div class="form-outline">
                                <label class="form-label" for="compteur_c5">Compteur C5</label>
                                <input type="number" placeholder="0.00" value="{{ $Piremetrecompteur->compteur_c5 }}"
                                    id="compteur_c5" name="compteur_c5" class="form-control" />

                            </div>
                        </div>
                        <div class="">
                            <div class="form-outline">
                                <label class="form-label" for="compteur_c4">Compteur C4</label>
                                <input type="number" placeholder="0.00" value="{{ $Piremetrecompteur->compteur_c4 }}"
                                    id="compteur_c4" name="compteur_c4" class="form-control" />

                            </div>
                        </div>
                        <div class="">
                            <div class="form-outline">
                                <label class="form-label" for="compteur_hta">Compteur HTA</label>
                                <input type="number" placeholder="0.00" value="{{ $Piremetrecompteur->compteur_hta }}"
                                    id="compteur_hta" name="compteur_hta" class="form-control" />

                            </div>
                        </div>
                        <div class="">
                            <div class="form-outline">
                                <label class="form-label" for="compteur_t2">Compteur T2</label>
                                <input type="number" placeholder="0.00" value="{{ $Piremetrecompteur->compteur_t2 }}"
                                    id="compteur_t2" name="compteur_t2" class="form-control" />

                            </div>
                        </div>
                        <div class="">
                            <div class="form-outline">
                                <label class="form-label" for="compteur_t3">Compteur T3</label>
                                <input type="number" placeholder="0.00" value="{{ $Piremetrecompteur->compteur_t3 }}"
                                    id="compteur_t3" name="compteur_t3" class="form-control" />

                            </div>
                        </div>
                        <div class="">
                            <div class="form-outline">
                                <label class="form-label" for="compteur_t4">Compteur T4</label>
                                <input type="number" placeholder="0.00" value="{{ $Piremetrecompteur->compteur_t4 }}"
                                    id="compteur_t4" name="compteur_t4" class="form-control" />

                            </div>
                        </div>
                        <div class="">
                            <div class="form-outline">
                                <label class="form-label" for="company_id">ID Entreprise</label>
                                <input type="number" placeholder="0.00" value="{{ $Piremetrecompteur->company_id }}"
                                    id="company_id" name="company_id" class="form-control" />

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
