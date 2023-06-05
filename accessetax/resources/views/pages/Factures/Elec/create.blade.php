@extends('layouts.signed')
@section('main')
    <form action="{{ route('billsElec.store') }}" method="POST" enctype="multipart/form-data"
        class="d-flex justify-content-around flex-wrap" id="ElecBillForm">
        @csrf
        @method('POST')


        <div class="file btn btn-success is-boxed w-100">
            <label class="file-label w-100">
                <input class="file-input w-100" type="file" name="fichier">
                <span class="file-cta">
                    <span class="file-icon">
                        <i class="fas fa-cloud-upload-alt"></i>
                    </span>
                    <span class="file-label">
                        Téléverser la facture
                    </span>
                </span>
            </label>
        </div>
        <div class="container-fluid  ">

            <div class="grid gap-3 grid-cols-2 lg:grid-cols-3 md:grid-cols-3 sm:grid-cols-2 p-4">
                <div class="shadow-md p-2 rounded-md">
                    <label class="label">Nom Facture</label>
                    <div class="control">
                        <input class="input" type="text" name="nom_facture" required>
                    </div>
                </div>

                <div class="shadow-md p-2 rounded-md">
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

                <div class="shadow-md p-2 rounded-md">
                    <label class="label">Type</label>
                    <div class="control">
                        <input class="input" type="text" name="type" required>
                    </div>
                </div>

                <div class="shadow-md p-2 rounded-md">
                    <label class="label">Numéro Facture</label>
                    <div class="control">
                        <input class="input" type="text" name="numero_facture" required>
                    </div>
                </div>

                <div class="shadow-md p-2 rounded-md">
                    <label class="label">Numéro Contrat</label>
                    <div class="control">
                        <input class="input" type="text" name="numero_contrat" required>
                    </div>
                </div>

                <div class="shadow-md p-2 rounded-md">
                    <label class="label">Numéro Compteur</label>
                    <div class="control">
                        <input class="input" type="text" name="numero_compteur" required>
                    </div>
                </div>

                <div class="shadow-md p-2 rounded-md">
                    <label class="label">Numéro Client</label>
                    <div class="control">
                        <input class="input" type="text" name="numero_client" required>
                    </div>
                </div>

                <div class="shadow-md p-2 rounded-md">
                    <label class="label">Numéro Site</label>
                    <div class="control">
                        <input class="input" type="text" name="numero_site" required>
                    </div>
                </div>
                <div class="shadow-md p-2 rounded-md">
                    <label class="label">Numéro etude</label>
                    <div class="control">
                        <input class="input" type="text" name="numero_etude" required>
                    </div>
                </div>

                <div class="shadow-md p-2 rounded-md">
                    <label class="label">Date Début</label>
                    <div class="control">
                        <input class="input" type="date" name="date_debut" required>
                    </div>
                </div>
                <div class="shadow-md p-2 rounded-md">
                    <label class="label">Date Fin</label>
                    <div class="control">
                        <input class="input" type="date" name="date_fin" required>
                    </div>
                </div>

                <div class="shadow-md p-2 rounded-md">
                    <label class="label">Consommation</label>
                    <div class="control">
                        <input class="input" type="text" name="consommation" required>
                    </div>
                </div>
                <div class="shadow-md p-2 rounded-md">
                    <label class="label">Année</label>
                    <div class="control">
                        <input class="input" type="text" name="annee" required>
                    </div>
                </div>

                <div class="shadow-md p-2 rounded-md">
                    <label class="label">Electric Contract ID</label>
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
                    <button class="btn btn-success" type="reset">Annuler</button>
                </div>
            </div>


    </form>
@endsection
