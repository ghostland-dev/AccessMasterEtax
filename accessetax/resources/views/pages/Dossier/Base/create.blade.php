@extends('layouts.signed')

@section('main')
    <div class="container-fluid  ">
        <h4 class="text-center bg-success text-white rounded-2 p-3">Une nouveau dossier de base</h4>
        <form action="{{ route('baseFoler.store') }}" method="POST" class="form-group">
            @csrf
            @method('POST')

                    @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endi
            <div class="grid grid-cols-2 lg:grid-cols-3 md:grid-cols-2 sm:grid-cols-1 gap-3 shadow p-3 rounded-md ">


                <div class=" space-y-2    ">
                    <label for="numero_dossier">N° de dossier</label>
                    <input type="text" name="numero_dossier" id="numero_dossier" class="form-control"
                        placeholder="N° de dossier ... " required>
                </div>
                <div class=" space-y-2    ">
                    <label for="nom_dossier">Nom de dossier</label>
                    <input type="text" name="nom_dossier" id="numero_dossier" class="form-control"
                        placeholder="N° de dossier ... " required>
                </div>
                <div class=" space-y-2    ">
                    <label for="nom_client">Nom d'étude</label>
                    <input type="text" name="nom_client" id="nom_client" class="form-control"
                        placeholder="N° de etude ... " required>
                </div>
                <div class=" space-y-2    ">
                    <label for="study_id">Dossier de base</label>
                    <select name="study_id" id="study_id" class="form-control" placeholder="l'etude ... " required>
                        <option>Selectionnez l'etude'</option>
                        @foreach ($etudes as $etude)
                            <option value="id">
                                {{ $etude->nom_etude }} </option>
                        @endforeach


                    </select>
                </div>
                <div class=" space-y-2    ">
                    <label for="statut_dossier">Statut de dossier</label>
                    <select name="statut_dossier" id="statut_dossier" class="form-control" placeholder="N° de etude ... "
                        required>
                        <option>Selectionnez le statut de dossier </option>
                        <option value="en attente">En Attente </option>
                        <option value="en cours">En cours </option>
                        <option value="traité">Traité</option>
                        <option value="prêt à envoyé">Prêt à envoyé</option>
                        <option value="envoyé">Envoyé</option>
                        <option value="confirmé">Confirmé </option>
                        <option value="finalisé">Finalisé </option>
                        <option value="réglé">Réglé </option>
                    </select>
                </div>

            </div>
            <div class="w-100">
                <button type="submit" class="my-3   mx-auto btn btn-dark p-2 px-4"> Soumettre
                </button>
            </div>
        </form>
    </div>
@endsection
