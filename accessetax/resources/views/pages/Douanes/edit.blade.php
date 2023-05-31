@extends('layouts.signed')

@section('main')
    <form class="container" action="{{ route('douane.update', $douane->id) }}" method="POST">
        @csrf
        @method('PUT')
        <h4 class="my-3 text-base w-fit mx-auto  text-slate-400 text-center bg-slate-50 p-3 rounded-md"> Modifier
            bureau douane </h4>
        <div class="row">
            <!-- Text input -->
            <div class="group-form col-md-4 mb-4">
                <label class="form-label" for="council_office_name">Nom de bureau</label>
                <input type="text" id="council_office_name" value="{{ $douane->council_office_name }}"
                    name="council_office_name" class="form-control" />

            </div>

            <!-- Text input -->
            <div class="group-form col-md-4 mb-4">
                <label class="form-label" for="council_office_address">Adresse de bureau</label>
                <input type="text" id="council_office_address" value="{{ $douane->council_office_address }}"
                    name="council_office_address" class="form-control" />

            </div>

            <!-- Text input -->
            <div class="group-form col-md-4 mb-4">
                <label class="form-label" for="nic_code">code NIC</label>
                <input type="text" id="nic_code" name="nic_code" value="{{ $douane->nic_code }}" class="form-control" />

            </div>


        </div>

        <!-- Submit button -->
        <button type="submit" class="btn btn-success btn-block mb-4">Mettre à jour</button>
    </form>
@endsection
