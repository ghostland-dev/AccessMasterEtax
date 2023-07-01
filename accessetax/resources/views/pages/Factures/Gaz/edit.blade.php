@extends('layouts.signed')
@section('main')
    <div class="w-3/4 mx-auto   ">
        <form action="{{ route('billGaz.update', $FactureGaz->id) }}" method="POST" enctype="multipart/form-data"
            class="d-flex justify-content-around flex-wrap card">
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


            <div class=" grid gap-3 grid-cols-1 lg:grid-cols-1 md:grid-cols-1 sm:grid-cols-1   text-center ">


                <div class="grid gap-3 grid-cols-1 lg:grid-cols-1 md:grid-cols-1 sm:grid-cols-1 p-4">
                    <label for="dropzone-file"
                        class="flex flex-col items-center justify-center w-full h-24 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                        <div class="flex flex-row items-center justify-center pt-5 pb-6">
                            <svg aria-hidden="true" class="w-10 h-10 mb-3 text-gray-400 mx-3" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12">
                                </path>
                            </svg>
                            <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold"> Téléverser
                                    la
                                    facture</p>

                        </div>
                        <input id="dropzone-file" type="file" value="{{ $FactureGaz->fichier }}" class="hidden"
                            name="fichier" />
                    </label>
                </div>



                <object data="{{ $FactureGaz->fichier }}" type="application/pdf" width="100%" height="200px">
                    <p>Incapable d'afficher ce type de fichier <a class="btn btn-success"
                            href="{{ $FactureGaz->fichier }}">Télécharger</a>
                        pour visualuser.</p>
                </object>

            </div>


            <div class="grid gap-2 grid-cols-1 lg:grid-cols-3 md:grid-cols-3 sm:grid-cols-1 my-3 p-3 ">
                <div class=" p-2 rounded-md">
                    <label class="label">Nom Facture</label>
                    <div class="control">
                        <input class="input" type="text" name="nom_facture" value="{{ $FactureGaz->nom_facture }}"
                            required>
                    </div>
                </div>


                <div class=" p-2 rounded-md">
                    <label class="label">Numéro Facture</label>
                    <div class="control">
                        <input class="input" type="text" name="numero_facture" value="{{ $FactureGaz->numero_facture }}"
                            required>
                    </div>
                </div>

                <div class=" p-2 rounded-md">
                    <label class="label">Fournisseur</label>
                    <div class="control">
                        <input class="input" type="text" name="fournisseur" value="{{ $FactureGaz->fournisseur }}"
                            required>
                    </div>
                </div>



                <div class=" p-2 rounded-md">
                    <label class="label">Date Début</label>
                    <div class="control">
                        <input class="input" type="date" name="date_debut" value="{{ $FactureGaz->date_debut }}"
                            required>
                    </div>
                </div>

                <div class=" p-2 rounded-md">
                    <label class="label">Date Fin</label>
                    <div class="control">
                        <input class="input" type="date" name="date_fin" value="{{ $FactureGaz->date_fin }}" required>
                    </div>
                </div>

                <div class=" p-2 rounded-md">
                    <label class="label">Type</label>
                    <div class="control">
                        <input class="input" type="text" name="type" value="{{ $FactureGaz->type }}" required>
                    </div>
                </div>


                <div class=" p-2 rounded-md">
                    <label class="label">Numéro Contrat</label>
                    <div class="control">
                        <input class="input" type="text" name="numero_contrat"
                            value="{{ $FactureGaz->numero_contrat }}" required>
                    </div>
                </div>

                <div class=" p-2 rounded-md">
                    <label class="label">Numéro Compteur</label>
                    <div class="control">
                        <input class="input" type="text" name="numero_compteur"
                            value="{{ $FactureGaz->numero_compteur }}" required>
                    </div>
                </div>

                <div class=" p-2 rounded-md">
                    <label class="label">Numéro Client</label>
                    <div class="control">
                        <input class="input" type="text" name="numero_client" value="{{ $FactureGaz->numero_client }}"
                            required>
                    </div>
                </div>

                <div class=" p-2 rounded-md">
                    <label class="label">Numéro Site</label>
                    <div class="control">
                        <input class="input" type="text" name="numero_site" value="{{ $FactureGaz->numero_site }}"
                            required>
                    </div>
                </div>
                <div class=" p-2 rounded-md">
                    <label class="label">Numéro etude</label>
                    <div class="control">
                        <input class="input" type="text" name="numero_etude"
                            value="{{ $FactureGaz->numero_etude }}" required>
                    </div>
                </div>
                <div class=" p-2 rounded-md">
                    <label class="label">Consommation</label>
                    <div class="control">
                        <input class="input" type="text" name="consommation"
                            value="{{ $FactureGaz->consommation }}" required>
                    </div>
                </div>
                <div class=" p-2 rounded-md">
                    <label class="label">Année</label>
                    <div class="control">
                        <input class="input" type="text" name="annee" value="{{ $FactureGaz->annee }}" required>
                    </div>
                </div>
                <div class=" p-2 rounded-md">
                    <label class="label">Année</label>
                    <div class="control">
                        <input class="input" type="text" name="annee" value="{{ $FactureGaz->annee }}" required>
                    </div>
                </div>

                <div class=" p-2 rounded-md">
                    <label class="label">Gaztric Contract ID</label>
                    <div class="control">
                        <input class="input" type="text" name="Gaz_contract_id"
                            value="{{ $FactureGaz->gaz_contract_id }}" required>
                    </div>
                </div>
            </div>
            <div class=" p-2 rounded-md flex  justify-center gap-2 w-full">
                <div class="control">
                    <button class="btn btn-success" type="submit">Mettre à jour</button>
                </div>
                <div class="control">
                    <button class="btn btn-dark" type="reset">Réinitialiser</button>
                </div>
            </div>


        </form>
    </div>
@endsection
