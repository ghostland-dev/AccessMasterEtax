@extends('layouts.signed')
@section('main')
    <form action="{{ route('study.store') }}" method="POST" class="d-flex justify-content-around flex-wrap" id="EtudeForm">
        @csrf
        @method('POST')


        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

        <div class="container-fluid  ">

            <div class="shadow grid gap-3 grid-cols-2 lg:grid-cols-3 md:grid-cols-3 sm:grid-cols-2 p-4">
                <div class="p-2 rounded-md">
                    <label for="nom_etude" class="label">Nom Facture</label>
                    <div class="control">
                        <input class="input" type="text" name="nom_etude" id="nom_etude" required>
                    </div>
                </div>


                <div class="p-2 rounded-md">
                    <label class="label">Date Début</label>
                    <div class="control">
                        <input class="input" type="date" name="date_debut" required>
                    </div>
                </div>


                <div class="p-2 rounded-md">
                    <label class="label">Date Fin</label>
                    <div class="control">
                        <input class="input" type="date" name="date_fin" required>
                    </div>
                </div>


                <div class="p-2 rounded-md">
                    <label for="nom_client" class="label">Nom client</label>
                    <div class="control">
                        <input class="input" type="text" name="nom_client" id="nom_client" required>
                    </div>
                </div>


                <div class="p-2 rounded-md">
                    <label for="nom_contact" class="label">Nom contact</label>
                    <div class="control">
                        <input class="input" type="text" name="nom_contact" id="nom_contact" required>
                    </div>
                </div>


                <div class="p-2 rounded-md">
                    <label for="nom_responsable" class="label">Nom résponsable</label>
                    <div class="control">
                        <input class="input" type="text" name="nom_responsable" id="nom_responsable" required>
                    </div>
                </div>

                <div class="p-2 rounded-md">
                    <label for="site_id" class="label">Site Assoccié</label>
                    <div class="control">
                        <input class="input" type="number" name="site_id" id="site_id" required>
                    </div>
                </div>
            </div>
            <div class="shadow grid gap-3 grid-cols-2 lg:grid-cols-2 md:grid-cols-3 sm:grid-cols-2 p-4">
                <div class="control">
                    <button class="btn btn-success" type="submit">Créer</button>
                </div>
                <div class="control">
                    <button class="btn btn-success" type="reset">Annuler</button>
                </div>
            </div>


    </form>
@endsection
