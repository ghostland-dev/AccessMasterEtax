@extends('layouts.signed')
@section('main')
    <form action="{{ route('billsElec.update', $FactureElec->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')




        <div class=" grid gap-3 grid-cols-1 lg:grid-cols-1 md:grid-cols-1 sm:grid-cols-1   text-center ">
            <div class="file is-success has-name w-full   ">
                <label class="file-label   ">
                    <input class="file-input  " type="file" value="{{ $FactureElec->fichier }}" name="fichier">
                    <span class="file-cta">
                        <span class="file-icon">
                            <i class="fas fa-cloud-upload-alt"></i>
                        </span>
                        <span class="file-label ">
                            Téléverser la facture
                        </span>
                    </span>
                    <span class="file-name ">

                    </span>
                </label>
            </div>

            <object data="{{ $FactureElec->fichier }}" type="application/pdf" width="100%" height="200px">
                <p>Incapable d'afficher ce type de fichier <a class="btn btn-success"
                        href="{{ $FactureElec->fichier }}">Télécharger</a>
                    pour visualuser.</p>
            </object>

        </div>


        <div class="grid gap-2 grid-cols-1 lg:grid-cols-3 md:grid-cols-3 sm:grid-cols-1 my-3 p-3 ">
            <div class="shadow-md p-2 rounded-md">
                <label class="label">Nom Facture</label>
                <div class="control">
                    <input class="input" type="text" name="nom_facture" value="{{ $FactureElec->nom_facture }}"
                        required>
                </div>
            </div>

            <div class="shadow-md p-2 rounded-md">
                <label class="label">Fournisseur</label>
                <div class="control">
                    <input class="input" type="text" name="fournisseur" value="{{ $FactureElec->fournisseur }}"
                        required>
                </div>
            </div>



            <div class="shadow-md p-2 rounded-md">
                <label class="label">Date Début</label>
                <div class="control">
                    <input class="input" type="date" name="date_debut" value="{{ $FactureElec->date_debut }}" required>
                </div>
            </div>

            <div class="shadow-md p-2 rounded-md">
                <label class="label">Date Fin</label>
                <div class="control">
                    <input class="input" type="date" name="date_fin" value="{{ $FactureElec->date_fin }}" required>
                </div>
            </div>

            <div class="shadow-md p-2 rounded-md">
                <label class="label">Type</label>
                <div class="control">
                    <input class="input" type="text" name="type" value="{{ $FactureElec->type }}" required>
                </div>
            </div>

            <div class="shadow-md p-2 rounded-md">
                <label class="label">Numéro Facture</label>
                <div class="control">
                    <input class="input" type="text" name="numero_facture" value="{{ $FactureElec->numero_facture }}"
                        required>
                </div>
            </div>

            <div class="shadow-md p-2 rounded-md">
                <label class="label">Numéro Contrat</label>
                <div class="control">
                    <input class="input" type="text" name="numero_contrat" value="{{ $FactureElec->numero_contrat }}"
                        required>
                </div>
            </div>

            <div class="shadow-md p-2 rounded-md">
                <label class="label">Numéro Compteur</label>
                <div class="control">
                    <input class="input" type="text" name="numero_compteur" value="{{ $FactureElec->numero_compteur }}"
                        required>
                </div>
            </div>

            <div class="shadow-md p-2 rounded-md">
                <label class="label">Numéro Client</label>
                <div class="control">
                    <input class="input" type="text" name="numero_client" value="{{ $FactureElec->numero_client }}"
                        required>
                </div>
            </div>

            <div class="shadow-md p-2 rounded-md">
                <label class="label">Numéro Site</label>
                <div class="control">
                    <input class="input" type="text" name="numero_site" value="{{ $FactureElec->numero_site }}"
                        required>
                </div>
            </div>
            <div class="shadow-md p-2 rounded-md">
                <label class="label">Numéro etude</label>
                <div class="control">
                    <input class="input" type="text" name="numero_etude" value="{{ $FactureElec->numero_etude }}"
                        required>
                </div>
            </div>
            <div class="shadow-md p-2 rounded-md">
                <label class="label">Consommation</label>
                <div class="control">
                    <input class="input" type="text" name="consommation" value="{{ $FactureElec->consommation }}"
                        required>
                </div>
            </div>
            <div class="shadow-md p-2 rounded-md">
                <label class="label">Année</label>
                <div class="control">
                    <input class="input" type="text" name="annee" value="{{ $FactureElec->annee }}" required>
                </div>
            </div>
            <div class="shadow-md p-2 rounded-md">
                <label class="label">Année</label>
                <div class="control">
                    <input class="input" type="text" name="annee" value="{{ $FactureElec->annee }}" required>
                </div>
            </div>

            <div class="shadow-md p-2 rounded-md">
                <label class="label">Electric Contract ID</label>
                <div class="control">
                    <input class="input" type="text" name="elec_contract_id"
                        value="{{ $FactureElec->elec_contract_id }}" required>
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
