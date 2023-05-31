@extends('layouts.signed')
@section('main')
    <form action="{{ route('billGaz.update', $gazBill->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="field">
            <label class="label">Nom Facture</label>
            <div class="control">
                <input class="input" type="text" name="nom_facture" value="{{ $gazBill->nom_facture }}" required>
            </div>
        </div>

        <div class="field">
            <label class="label">Fournisseur</label>
            <div class="control">
                <input class="input" type="text" name="fournisseur" value="{{ $gazBill->fournisseur }}" required>
            </div>
        </div>

        <div class="field">
            <label class="label">Fichier</label>
            <div class="control">
                <input class="input" type="text" name="fichier" value="{{ $gazBill->fichier }}" required>
            </div>
        </div>

        <div class="field">
            <label class="label">Date Début</label>
            <div class="control">
                <input class="input" type="date" name="date_debut" value="{{ $gazBill->date_debut }}" required>
            </div>
        </div>

        <div class="field">
            <label class="label">Date Fin</label>
            <div class="control">
                <input class="input" type="date" name="date_fin" value="{{ $gazBill->date_fin }}" required>
            </div>
        </div>

        <div class="field">
            <label class="label">Type</label>
            <div class="control">
                <input class="input" type="text" name="type" value="{{ $gazBill->type }}" required>
            </div>
        </div>

        <div class="field">
            <label class="label">Numéro Facture</label>
            <div class="control">
                <input class="input" type="text" name="numero_facture" value="{{ $gazBill->numero_facture }}" required>
            </div>
        </div>

        <div class="field">
            <label class="label">Numéro Contrat</label>
            <div class="control">
                <input class="input" type="text" name="numero_contrat" value="{{ $gazBill->numero_contrat }}" required>
            </div>
        </div>

        <div class="field">
            <label class="label">Numéro Compteur</label>
            <div class="control">
                <input class="input" type="text" name="numero_compteur" value="{{ $gazBill->numero_compteur }}"
                    required>
            </div>
        </div>

        <div class="field">
            <label class="label">Numéro Client</label>
            <div class="control">
                <input class="input" type="text" name="numero_client" value="{{ $gazBill->numero_client }}" required>
            </div>
        </div>

        <div class="field">
            <label class="label">Numéro Site</label>
            <div class="control">
                <input class="input" type="text" name="numero_site" value="{{ $gazBill->numero_site }}" required>
            </div>
        </div>
        <div class="field">
            <label class="label">Numéro etude</label>
            <div class="control">
                <input class="input" type="text" name="numero_etude" value="{{ $gazBill->numero_etude }}" required>
            </div>
        </div>
        <div class="field">
            <label class="label">Consommation</label>
            <div class="control">
                <input class="input" type="text" name="consommation" value="{{ $gazBill->consommation }}" required>
            </div>
        </div>
        <div class="field">
            <label class="label">Année</label>
            <div class="control">
                <input class="input" type="text" name="annee" value="{{ $gazBill->annee }}" required>
            </div>
        </div>
        <div class="field">
            <label class="label">Année</label>
            <div class="control">
                <input class="input" type="text" name="annee" value="{{ $gazBill->annee }}" required>
            </div>
        </div>

        <div class="field">
            <label class="label">Electric Contract ID</label>
            <div class="control">
                <input class="input" type="text" name="elec_contract_id" value="{{ $gazBill->elec_contract_id }}"
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
