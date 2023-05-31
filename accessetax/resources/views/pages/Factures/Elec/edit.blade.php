@extends('layouts.signed')
@section('main')
    <form action="{{ route('billsElec.update', $elecBill->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="field">
            <label class="label">Nom Facture</label>
            <div class="control">
                <input class="input" type="text" name="nom_facture" value="{{ $elecBill->nom_facture }}" required>
            </div>
        </div>

        <div class="field">
            <label class="label">Fournisseur</label>
            <div class="control">
                <input class="input" type="text" name="fournisseur" value="{{ $elecBill->fournisseur }}" required>
            </div>
        </div>

        <div class="field">
            <label class="label">Fichier</label>
            <div class="control">
                <input class="input" type="file" name="fichier" value="{{ $elecBill->fichier }}" required>
            </div>
        </div>

        <div class="field">
            <label class="label">Date Début</label>
            <div class="control">
                <input class="input" type="date" name="date_debut" value="{{ $elecBill->date_debut }}" required>
            </div>
        </div>

        <div class="field">
            <label class="label">Date Fin</label>
            <div class="control">
                <input class="input" type="date" name="date_fin" value="{{ $elecBill->date_fin }}" required>
            </div>
        </div>

        <div class="field">
            <label class="label">Type</label>
            <div class="control">
                <input class="input" type="text" name="type" value="{{ $elecBill->type }}" required>
            </div>
        </div>

        <div class="field">
            <label class="label">Numéro Facture</label>
            <div class="control">
                <input class="input" type="text" name="numero_facture" value="{{ $elecBill->numero_facture }}" required>
            </div>
        </div>

        <div class="field">
            <label class="label">Numéro Contrat</label>
            <div class="control">
                <input class="input" type="text" name="numero_contrat" value="{{ $elecBill->numero_contrat }}" required>
            </div>
        </div>

        <div class="field">
            <label class="label">Numéro Compteur</label>
            <div class="control">
                <input class="input" type="text" name="numero_compteur" value="{{ $elecBill->numero_compteur }}"
                    required>
            </div>
        </div>

        <div class="field">
            <label class="label">Numéro Client</label>
            <div class="control">
                <input class="input" type="text" name="numero_client" value="{{ $elecBill->numero_client }}" required>
            </div>
        </div>

        <div class="field">
            <label class="label">Numéro Site</label>
            <div class="control">
                <input class="input" type="text" name="numero_site" value="{{ $elecBill->numero_site }}" required>
            </div>
        </div>
        <div class="field">
            <label class="label">Numéro etude</label>
            <div class="control">
                <input class="input" type="text" name="numero_etude" value="{{ $elecBill->numero_etude }}" required>
            </div>
        </div>
        <div class="field">
            <label class="label">Consommation</label>
            <div class="control">
                <input class="input" type="text" name="consommation" value="{{ $elecBill->consommation }}" required>
            </div>
        </div>
        <div class="field">
            <label class="label">Année</label>
            <div class="control">
                <input class="input" type="text" name="annee" value="{{ $elecBill->annee }}" required>
            </div>
        </div>
        <div class="field">
            <label class="label">Année</label>
            <div class="control">
                <input class="input" type="text" name="annee" value="{{ $elecBill->annee }}" required>
            </div>
        </div>

        <div class="field">
            <label class="label">Electric Contract ID</label>
            <div class="control">
                <input class="input" type="text" name="elec_contract_id" value="{{ $elecBill->elec_contract_id }}"
                    required>
            </div>
        </div>

        <div class="field is-grouped">
            <div class="control">
                <button class="button is-primary" type="submit">Update</button>
            </div>
            <div class="control">
                <button class="button is-link" type="reset">Reset</button>
            </div>
        </div>


    </form>
@endsection
