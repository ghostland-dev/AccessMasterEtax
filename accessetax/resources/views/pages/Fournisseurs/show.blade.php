@extends('layouts.signed')
@section('main')
    <div class="row">
        <div class="col-sm-12">

            <h5 class="card-title text-success">Détails de fournisseur</h5>
            <div class="col  ">
                <div class="card">
                    <div class="card-body">
                        <div class="dropdown float-end">
                            <a class="text-muted dropdown-toggle font-size-16 bg-dark text-white p-2 rounded-4 mx-2"
                                href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true"><i
                                    class="fa fa-cog"></i></a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="{{ route('supplier.show', $fournisseur->id) }}"><i
                                        class="fa fa-eye"></i> Détails</a>
                                <a class="dropdown-item" href="{{ route('supplier.edit', $fournisseur->id) }}"><i
                                        class="fa fa-pen"></i> Editer</a>

                                <form method="POST" action="{{ route('supplier.destroy', $fournisseur->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="dropdown-item"><i class="fa fa-trash"></i>
                                        Supprimer</button>
                                </form>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <div class=""><img src="{{ $fournisseur->logo }}" alt=""
                                    class="avatar-md rounded-circle img-thumbnail col-md-3 w-[200px] max-h-[300px]" />
                                <h5 class="font-size-16 mb-1"><a href="#" class="text-success">
                                        {{ $fournisseur->nom_fournisseur }}

                                </h5>
                            </div>

                            <div class="flex-1 ms-3  ">

                                <span class="badge badge-soft-success mb-0">{{ $fournisseur->function }}</span>
                            </div>
                        </div>
                        <div class="my-2 p-2  gap-2 bg-light-gray grid grid-cols-3 text-gray-400">
                            <p class="p-2 bg-white rounded-md"><i
                                    class="mdi mdi-phone font-size-15 align-middle pe-2  "></i>
                                {{ $fournisseur->contact }}
                            </p>
                            <p class="p-2 bg-white rounded-md"><i
                                    class="mdi mdi-phone font-size-15 align-middle pe-2  "></i>
                                {{ $fournisseur->tel }}
                            </p>
                            <p class="p-2 bg-white rounded-md"><i
                                    class="mdi mdi-email font-size-15 align-middle pe-2  "></i>
                                {{ $fournisseur->address }}
                            </p>
                            <p class="p-2 bg-white rounded-md"><i
                                    class="mdi mdi-google-maps font-size-15 align-middle pe-2  "></i>
                                {{ $fournisseur->city }} | {{ $fournisseur->zip_code }} | {{ $fournisseur->country }}
                            </p>
                            <p
                                class="p-2   rounded-md  {{ $fournisseur->fournisseur_electrcite ? 'text-emerald-400 bg-indigo-50' : 'text-red-400 bg-red-50' }}">
                                <i class="mdi mdi-google-maps font-size-15 align-middle pe-2  "></i>
                                {{ $fournisseur->fournisseur_electrcite ? 'Oui, il fourni de l\'éléctrcité ' : 'il ne fourni pas de l\'éléctrcité' }}
                            </p>
                            <p class="p-2   rounded-md {{ $fournisseur->fournisseur_gaz ?'text-emerald-400  bg-indigo-50':'text-red-400 bg-red-50'}}"><i
                                    class="mdi mdi-google-maps font-size-15 align-middle pe-2  "></i>
                                {{ $fournisseur->fournisseur_gaz ? 'Oui,il fourni de gaz' : 'Non, il ne fourni pas de gaz' }}
                            </p>
                        </div>
                        <div class="d-flex gap-2 pt-4">
                            <a href="mailto:{{ $fournisseur->email }}" class="btn p-2 btn-success btn-sm w-50"><i
                                    class="fa fa-mail  me-1"></i>{{ $fournisseur->email }}</a>
                            <a href="tel:{{ $fournisseur->tel }}" class="btn p-2 btn-dark btn-sm w-50"><i
                                    class="fa fa-mobile me-1"></i>
                                {{ $fournisseur->tel }}</a>
                        </div>
                    </div>
                </div>
            </div>
            <a href="{{ route('suppliers') }}" class="btn btn-success"> <i class="fa fa-arrow-circle-left"></i></a>

        </div>
    </div>
@endsection
