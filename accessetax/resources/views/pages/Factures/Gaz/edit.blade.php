@extends('layouts.signed')
@section('main')
    <form action="{{ route('billGaz.update', $FactureGaz->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')




        <div class=" grid gap-3 grid-cols-1 lg:grid-cols-1 md:grid-cols-1 sm:grid-cols-1   text-center ">


            <div class="file is-primary">
                <label class="file-label">
                    <input class="file-input" type="file" name="fichier" value="{{ $FactureGaz->fichier }}">
                    <span class="file-cta">
                        <span class="file-icon">
                            <i class="fas fa-upload"></i>
                        </span>
                        <span class="file-label">
                            Téléverser la facture
                        </span>
                    </span>
                </label>
            </div>

            <object data="{{ $FactureGaz->fichier }}" type="application/pdf" width="100%" height="200px">
                <p>Incapable d'afficher ce type de fichier <a class="btn btn-success"
                        href="{{ $FactureGaz->fichier }}">Télécharger</a>
                    pour visualuser.</p>
            </object>

        </div>


        <div class="grid gap-2 grid-cols-1 lg:grid-cols-3 md:grid-cols-3 sm:grid-cols-1 my-3 p-3 ">
            <div class="shadow-md p-2 rounded-md">
                <label class="label">Nom Facture</label>
                <div class="control">
                    <input class="input" type="text" name="nom_facture" value="{{ $FactureGaz->nom_facture }}" required>
                </div>
            </div>

            <div class="shadow-md p-2 rounded-md">
                <label class="label">Fournisseur</label>
                <div class="control">
                    <input class="input" type="text" name="fournisseur" value="{{ $FactureGaz->fournisseur }}" required>
                </div>
            </div>



            <div class="shadow-md p-2 rounded-md">
                <label class="label">Date Début</label>
                <div class="control">
                    <input class="input" type="date" name="date_debut" value="{{ $FactureGaz->date_debut }}" required>
                </div>
            </div>

            <div class="shadow-md p-2 rounded-md">
                <label class="label">Date Fin</label>
                <div class="control">
                    <input class="input" type="date" name="date_fin" value="{{ $FactureGaz->date_fin }}" required>
                </div>
            </div>

            <div class="shadow-md p-2 rounded-md">
                <label class="label">Type</label>
                <div class="control">
                    <input class="input" type="text" name="type" value="{{ $FactureGaz->type }}" required>
                </div>
            </div>

            <div class="shadow-md p-2 rounded-md">
                <label class="label">Numéro Facture</label>
                <div class="control">
                    <input class="input" type="text" name="numero_facture" value="{{ $FactureGaz->numero_facture }}"
                        required>
                </div>
            </div>

            <div class="shadow-md p-2 rounded-md">
                <label class="label">Numéro Contrat</label>
                <div class="control">
                    <input class="input" type="text" name="numero_contrat" value="{{ $FactureGaz->numero_contrat }}"
                        required>
                </div>
            </div>

            <div class="shadow-md p-2 rounded-md">
                <label class="label">Numéro Compteur</label>
                <div class="control">
                    <input class="input" type="text" name="numero_compteur" value="{{ $FactureGaz->numero_compteur }}"
                        required>
                </div>
            </div>

            <div class="shadow-md p-2 rounded-md">
                <label class="label">Numéro Client</label>
                <div class="control">
                    <input class="input" type="text" name="numero_client" value="{{ $FactureGaz->numero_client }}"
                        required>
                </div>
            </div>

            <div class="shadow-md p-2 rounded-md">
                <label class="label">Numéro Site</label>
                <div class="control">
                    <input class="input" type="text" name="numero_site" value="{{ $FactureGaz->numero_site }}"
                        required>
                </div>
            </div>
            <div class="shadow-md p-2 rounded-md">
                <label class="label">Numéro etude</label>
                <div class="control">
                    <input class="input" type="text" name="numero_etude" value="{{ $FactureGaz->numero_etude }}"
                        required>
                </div>
            </div>
            <div class="shadow-md p-2 rounded-md">
                <label class="label">Consommation</label>
                <div class="control">
                    <input class="input" type="text" name="consommation" value="{{ $FactureGaz->consommation }}"
                        required>
                </div>
            </div>
            <div class="shadow-md p-2 rounded-md">
                <label class="label">Année</label>
                <div class="control">
                    <input class="input" type="text" name="annee" value="{{ $FactureGaz->annee }}" required>
                </div>
            </div>
            <div class="shadow-md p-2 rounded-md">
                <label class="label">Année</label>
                <div class="control">
                    <input class="input" type="text" name="annee" value="{{ $FactureGaz->annee }}" required>
                </div>
            </div>

            <div class="shadow-md p-2 rounded-md">
                <label class="label">Electric Contract ID</label>
                <div class="control">
                    <input class="input" type="text" name="gaz_contract_id"
                        value="{{ $FactureGaz->gaz_contract_id }}" required>
                </div>
            </div>
        </div>
        <div class="shadow-md p-2 rounded-md flex  justify-center gap-2 w-full">
            <div class="control">
                <button class="button is-primary" type="submit">Mettre à jour</button>
            </div>
            <div class="control">
                <button class="button is-link" type="reset">Réinitialiser</button>
            </div>
        </div>


    </form>
@endsection
