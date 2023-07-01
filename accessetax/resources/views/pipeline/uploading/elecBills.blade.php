@extends('layouts.app')

@section('content')
    @php
        $step = 5;
        $confirmed = true;
    @endphp

    @include('layouts.partials.timeline')



    <div class=" bg-light-success  centred  my-5 py-5">
        <div class="container     pt-4  ">
            <div class="row justify-content-center">

                <div class="col-md-12">
                    <div class="card  ">

                        {{-- <form id="my-dropzone" class="dropzone border-2 border-gray-500 border-dashed rounded-md ">
                            @csrf
                        </form> --}}

                        <form action="{{ route('billsElec.store') }}" method="POST" enctype="multipart/form-data"
                            class="d-flex justify-content-around flex-wrap card" id="ElecBillForm">
                            @csrf
                            @method('POST')

                            <div class="container   ">



                                <div id="formFacture" class=" p-3">


                                    <div class="grid gap-2  grid-cols-2 lg:grid-cols-6 md:grid-cols-6 sm:grid-cols-2 p2">


                                        <div class="form-group">
                                            <label class="label">Facture en .PDF</label>
                                            <input class="form-control" type="file" name="fichier[]" accept=".pdf">
                                        </div>


                                        <div class="    rounded-md">
                                            <label class="label">Fournisseur</label>
                                            <div class="select w-100   ">
                                                <select class="w-100 " name="fournisseur[]" id="fournisseur">
                                                    @foreach ($fournisseurs as $fournisseur)
                                                        <option class=" p-3" value="{{ $fournisseur->nom_fournisseur }}">
                                                            {{ $fournisseur->nom_fournisseur }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="    rounded-md">
                                            <label class="label">Date Début</label>
                                            <div class="control">
                                                <input class="input" type="date" name="date_debut[]" required>
                                            </div>
                                        </div>
                                        <div class="    rounded-md">
                                            <label class="label">Date Fin</label>
                                            <div class="control">
                                                <input class="input" type="date" name="date_fin[]" required>
                                            </div>
                                        </div>

                                        <div class="    rounded-md">
                                            <label class="label">Année</label>
                                            <div class="control">
                                                <input class="input" type="text" name="annee[]" required>
                                            </div>
                                        </div>

                                        <div class="    rounded-md">
                                            <label class="label">Contrat D'éléctrcité </label>
                                            <div class="control">
                                                <input class="input" type="number" name="elec_contract_id[]" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="control">
                                    <button id="autrefacture" class="btn btn-success float-right" type="submit">+</button>
                                </div>
                                <div class="field col-md-12 is-grouped my-4">
                                    <div class="control">
                                        <button class="btn btn-success" type="submit">Créer</button>
                                    </div>
                                    <div class="control">
                                        <button class="btn btn-dark" type="reset">Annuler</button>
                                    </div>
                                </div>



                        </form>


                        <ul class="ga  p-4 ">
                            @if ($confirmed == true)
                                <li class="bg-light-success text-success p-3 my-2">

                                    <i class="fa bg-success text-white rounded-circle px-2 py-2 m-1 fa-check"
                                        aria-hidden="true"></i>
                                    <strong> Confirmation:</strong> <span id="returnAlerts">
                                        votre dossier a été envoyé avec succès, ne revenons vers vous dans les plus bref
                                        délai.</span>

                                    <br>
                                    <a href="{{ route('etape6') }}" class="btn btn-dark mt-5" id="returnAlerts"><i
                                            class=" fa fa-check"></i> Continuer</a>

                                </li>
                            @else
                                <li class="bg-light-warning text-warning p-3 my-2">

                                    <i class="fa bg-warning text-white rounded-circle px-2 py-2 m-1 fa-times"
                                        aria-hidden="true"></i>
                                    <strong> Confirmation:</strong> <span id="returnAlerts">
                                        votre dossier a été envoyé avec succès, ne revenons vers vous dans les plus bref
                                        délai.</span>

                                </li>
                            @endif


                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
        $(document).ready(function() {
            let formIndex = 1;

            $('#autrefacture').click(function(e) {
                e.preventDefault();
                let newForm = `
                <div class="grid gap-2  grid-cols-2 lg:grid-cols-6 md:grid-cols-6 sm:grid-cols-2 p-2">

                    <div class="form-group">
                        <label class="label">Facture en .PDF</label>
                             <input class="form-control" type="file" name="fichier[]" accept=".pdf">
                    </div>
                    <div class="    rounded-md">
                        <label class="label">Fournisseur</label>
                        <div class="select w-100   ">
                            <select class="w-100 " name="fournisseur[]" id="fournisseur">
                                @foreach ($fournisseurs as $fournisseur)
                                    <option class=" p-3" value="{{ $fournisseur->nom_fournisseur }}">
                                        {{ $fournisseur->nom_fournisseur }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="    rounded-md">
                        <label class="label">Date Début</label>
                        <div class="control">
                            <input class="input" type="date" name="date_debut[]" required>
                        </div>
                    </div>
                    <div class="    rounded-md">
                        <label class="label">Date Fin</label>
                        <div class="control">
                            <input class="input" type="date" name="date_fin[]" required>
                        </div>
                    </div>

                    <div class="    rounded-md">
                        <label class="label">Année</label>
                        <div class="control">
                            <input class="input" type="text" name="annee[]" required>
                        </div>
                    </div>

                    <div class="    rounded-md">
                        <label class="label">Contrat D'éléctrcité </label>
                        <div class="control">
                            <input class="input" type="number" name="elec_contract_id[]" required>
                        </div>
                    </div>
                </div
                `;

                $('#formFacture').append(newForm);
                formIndex++;
            });
        });
    </script>
@endsection
