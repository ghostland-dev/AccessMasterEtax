@extends('layouts.signed')

@section('main')
    <form class="container" action="{{ route('activityCode.store') }}" method="POST">
        @csrf
        @method('POST')

        <div class="row">
            <!-- Text input -->
            <div class="form-group">
                <label for="nom_compteur">Nom du compteur :</label>
                <input type="text" name="nom_compteur" id="nom_compteur" class="form-control"
                    value="{{ old('nom_compteur') }}">
            </div>

            <div class="form-group">
                <label for="PDL">PDL :</label>
                <input type="text" name="PDL" id="PDL" class="form-control" value="{{ old('PDL') }}">
            </div>

            <div class="form-group">
                <label for="puissance">Puissance :</label>
                <input type="number" name="puissance" id="puissance" step="0.1" class="form-control"
                    value="{{ old('puissance') }}">
            </div>

            <div class="form-group">
                <label for="numero_client">Numéro client :</label>
                <input type="text" name="numero_client" id="numero_client" class="form-control"
                    value="{{ old('numero_client') }}">
            </div>

            <div class="form-group">
                <label for="numero_site">Numéro site :</label>
                <input type="text" name="numero_site" id="numero_site" class="form-control"
                    value="{{ old('numero_site') }}">
            </div>

            <div class="form-group">
                <label for="numero_etude">Numéro étude :</label>
                <input type="text" name="numero_etude" id="numero_etude" class="form-control"
                    value="{{ old('numero_etude') }}">
            </div>

            <div class="form-group">
                <label for="numero_contrat">Numéro contrat :</label>
                <input type="text" name="numero_contrat" id="numero_contrat" class="form-control"
                    value="{{ old('numero_contrat') }}">
            </div>

            <div class="form-group">
                <label for="fournisseur">Fournisseur :</label>
                <input type="text" name="fournisseur" id="fournisseur" class="form-control"
                    value="{{ old('fournisseur') }}">
            </div>

            <div class="form-group">
                <label for="profile">Profil :</label>
                <select name="profile" id="profile" class="form-control">
                    <option value="C1" {{ old('profile') === 'C1' ? 'selected' : '' }}>C1</option>
                    <option value="C2" {{ old('profile') === 'C2' ? 'selected' : '' }}>C2</option>
                    <option value="C3" {{ old('profile') === 'C3' ? 'selected' : '' }}>C3</option>
                </select>
            </div>

            <div class="form-group">
                <label for="consommation">Consommation :</label>
                <input type="text" name="consommation" id="consommation" class="form-control"
                    value="{{ old('consommation') }}">
            </div>

            <div class="form-group">
                <label for="annee">Année :</label>
                <input type="text" name="annee" id="annee" class="form-control" value="{{ old('annee') }}">
            </div>

            <div class="form-group">
                <label for="site_id">Site ID :</label>
                <input type="number" name="site_id" id="site_id" class="form-control" value="{{ old('site_id') }}">
            </div>



        </div>

        <!-- Submit button -->
        <button type="submit" class="btn btn-primary btn-block mb-4">Créer</button>
    </form>
@endsection
