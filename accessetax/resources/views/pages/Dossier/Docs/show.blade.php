@extends('layouts.signed')
@section('main')
    <div class="row">
        <div class="card  ">
            <div class="card-header w-full">
                <div class=" grid gap-2 grid-cols-1 lg:grid-cols-2 md:grid-cols-2 sm:grid-cols-1">
                    <div class=" ">
                        <h5 class="card-title mb-0"> Document de base ()</h5>
                    </div>

                </div>
            </div>
            <div class="card-body">
                <div class=" ">
                    <ul class="list-unstyled">
                        <li class="media mb-3">

                            <div class="container-fluid">

                                <ul class="grid gap-2 grid-cols-1 lg:grid-cols-2 md:grid-cols-2 sm:grid-cols-1">
                                    <li class="shadow rounded-md p-2">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span> <i class="fa fa-file-pdf fa-2x  text-slate-400 mx-2"></i>
                                                CGV Access
                                                Energies</span>
                                            <a href="{{ $BaseDoc->cgv_access_anergies }}" class="btn btn-success"
                                                download><i class="fa fa-download"></i></a>
                                        </div>
                                    </li>
                                    <li class="shadow rounded-md p-2">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span><i class="fa fa-file-pdf fa-2x  text-slate-400 mx-2"></i>RIB
                                                d'entreprise</span>
                                            <a href="{{ $BaseDoc->rib_entreprise }}" class="btn btn-success" download><i
                                                    class="fa fa-download"></i></a>
                                        </div>
                                    </li>
                                    <li class="shadow rounded-md p-2">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span> <i class="fa fa-file-pdf fa-2x  text-slate-400 mx-2"></i>
                                                KIBIS</span>
                                            <a href="{{ $BaseDoc->kabis }}" class="btn btn-success" download><i
                                                    class="fa fa-download"></i></a>
                                        </div>
                                    </li>
                                    <li class="shadow rounded-md p-2">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span> <i class="fa fa-file-pdf fa-2x  text-slate-400 mx-2"></i>
                                                Billans
                                                Comptables</span>
                                            <div>
                                                <a href="{{ $BaseDoc->bilan_comptable_1 }}" class="btn btn-success"
                                                    download><i class="fa fa-download"></i></a>
                                                <a href="{{ $BaseDoc->bilan_comptable_2 }}" class="btn btn-success"
                                                    download><i class="fa fa-download"></i></a>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="shadow rounded-md p-2">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span> <i class="fa fa-file-pdf fa-2x  text-slate-400 mx-2"></i>
                                                Annexes</span>
                                            <div>
                                                <a href="{{ $BaseDoc->annexe_1 }}" class="btn btn-success" download><i
                                                        class="fa fa-download"></i></a>
                                                <a href="{{ $BaseDoc->annexe_1 }}" class="btn btn-success" download><i
                                                        class="fa fa-download"></i></a>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="shadow rounded-md p-2">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span> <i class="fa fa-file-pdf fa-2x  text-slate-400 mx-2"></i>
                                                Courrier
                                                manuscrit</span>
                                            <a href="{{ $BaseDoc->confirmation_douanaire }}" class="btn btn-success"
                                                download><i class="fa fa-download"></i></a>
                                        </div>
                                    </li>
                                    <li class="shadow rounded-md p-2">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span> <i class="fa fa-file-pdf fa-2x  text-slate-400 mx-2"></i>
                                                Fiche
                                                d'entreprise</span>
                                            <a href="{{ $BaseDoc->fichier_entreprise }}" class="btn btn-success" download><i
                                                    class="fa fa-download"></i></a>
                                        </div>
                                    </li>
                                    <li class="shadow rounded-md p-2">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span> <i class="fa fa-file-pdf fa-2x  text-slate-400 mx-2"></i>
                                                Fiche
                                                d'entreprise</span>
                                            <a href="{{ $BaseDoc->valeur_ajoutee }}" class="btn btn-success" download><i
                                                    class="fa fa-download"></i></a>
                                        </div>
                                    </li>


                                    <!-- Add more list items for additional files -->
                                </ul>
                            </div>


                    </ul>
                </div>
                <div class="w-full float-right  ">
                    <a class="text-muted dropdown-toggle font-size-16 bg-dark text-white p-2 rounded-4 mx-2" href="#"
                        role="button" data-bs-toggle="dropdown" aria-haspopup="true"><i class="fa fa-cog"></i>Actions </a>
                    <div class="dropdown-menu dropdown-menu-end">
                        <a class="dropdown-item" href="{{ route('baseDoc.show', $BaseDoc->id) }}">Détails</a>
                        <a class="dropdown-item" href="{{ route('baseDoc.edit', $BaseDoc->id) }}">Editer</a>

                        <form method="POST" action="{{ route('baseDoc.destroy', $BaseDoc->id) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="dropdown-item"><i class="fa fa-trash"></i>
                                Supprimer</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
