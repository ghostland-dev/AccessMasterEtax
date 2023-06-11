@extends('layouts.signed')
@section('main')
    <div class="w-3/4 mx-auto   ">
        <form action="{{ route('billGaz.store') }}" method="POST" enctype="multipart/form-data"
            class="d-flex justify-content-around flex-wrap card" id="GazBillForm">
            @csrf
            @method('POST')

            <div class="container   ">
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
                        <input id="dropzone-file" type="file" class="hidden" name="fichier" />
                    </label>
                </div>

                <div class="grid gap-3 grid-cols-2 lg:grid-cols-3 md:grid-cols-3 sm:grid-cols-2 p-4">
                    <div class="  p-2 rounded-md">
                        <label class="label">Nom Facture</label>
                        <div class="control">
                            <input class="input" type="text" name="nom_facture" required>
                        </div>
                    </div>

                    <div class="  p-2 rounded-md">
                        <label class="label">Fournisseur</label>
                        <div class="select w-100   ">
                            <select class="w-100 " name="fournisseur" id="fournisseur">
                                @foreach ($fournisseurs as $fournisseur)
                                    <option class=" p-3" value="{{ $fournisseur->nom_fournisseur }}">
                                        {{ $fournisseur->nom_fournisseur }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="  p-2 rounded-md">
                        <label class="label">Type</label>
                        <div class="control">
                            <input class="input" type="text" name="type" required>
                        </div>
                    </div>

                    <div class="  p-2 rounded-md">
                        <label class="label">Numéro Facture</label>
                        <div class="control">
                            <input class="input" type="text" name="numero_facture" required>
                        </div>
                    </div>

                    <div class="  p-2 rounded-md">
                        <label class="label">Numéro Contrat</label>
                        <div class="control">
                            <input class="input" type="text" name="numero_contrat" required>
                        </div>
                    </div>

                    <div class="  p-2 rounded-md">
                        <label class="label">Numéro Compteur</label>
                        <div class="control">
                            <input class="input" type="text" name="numero_compteur" required>
                        </div>
                    </div>

                    <div class="  p-2 rounded-md">
                        <label class="label">Numéro Client</label>
                        <div class="control">
                            <input class="input" type="text" name="numero_client" required>
                        </div>
                    </div>

                    <div class="  p-2 rounded-md">
                        <label class="label">Numéro Site</label>
                        <div class="control">
                            <input class="input" type="text" name="numero_site" required>
                        </div>
                    </div>
                    <div class="  p-2 rounded-md">
                        <label class="label">Numéro etude</label>
                        <div class="control">
                            <input class="input" type="text" name="numero_etude" required>
                        </div>
                    </div>

                    <div class="  p-2 rounded-md">
                        <label class="label">Date Début</label>
                        <div class="control">
                            <input class="input" type="date" name="date_debut" required>
                        </div>
                    </div>
                    <div class="  p-2 rounded-md">
                        <label class="label">Date Fin</label>
                        <div class="control">
                            <input class="input" type="date" name="date_fin" required>
                        </div>
                    </div>

                    <div class="  p-2 rounded-md">
                        <label class="label">Consommation</label>
                        <div class="control">
                            <input class="input" type="text" name="consommation" required>
                        </div>
                    </div>
                    <div class="  p-2 rounded-md">
                        <label class="label">Année</label>
                        <div class="control">
                            <input class="input" type="text" name="annee" required>
                        </div>
                    </div>

                    <div class="  p-2 rounded-md">
                        <label class="label">Gaz Contract ID</label>
                        <div class="control">
                            <input class="input" type="number" name="elec_contract_id" required>
                        </div>
                    </div>
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
    </div>


      
@endsection
