@extends('layouts.signed')

@section('main')
    <form class="container" action="{{ route('douane.store') }}" method="POST">
        @csrf
        @method('POST')

        <h4 class="my-3 text-base w-fit mx-auto  text-slate-400 text-center bg-slate-50 p-3 rounded-md"> Ajouter un nouveau
            bureau douane </h4>

        <div class="row">
            <!-- Text input -->
            <div class="group-form col-md-4 mb-4">
                <label class="form-label" for="council_office_name">Nom de bureau</label>
                <input type="text" id="council_office_name" name="council_office_name" class="form-control" placeholder="ex: Bureau de rouen" />

            </div>

            <!-- Text input -->
            <div class="group-form col-md-4 mb-4">
                <label class="form-label" for="council_office_address">Adresse de bureau</label>
                <input type="text" id="council_office_address" name="council_office_address" class="form-control" placeholder="ex: 12 rue des ...." />

            </div>

            <!-- Text input -->
            <div class="group-form col-md-4 mb-4">
                <label class="form-label" for="nic_code">code NIC</label>
                <input type="text" id="nic_code" name="nic_code" class="form-control" placeholder="ex AB1355"/>

            </div>


        </div>

        <!-- Submit button -->
        <button type="submit" class="btn btn-success btn-block mb-4">Créer</button>
    </form>
@endsection
