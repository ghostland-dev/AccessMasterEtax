@extends('layouts.signed')
@section('main')
    <div>
        <a href="{{ route('baseDoc.create') }}" class="btn btn-success m-3 ">
            + Nouveau documents de base
        </a>

        <div class=" grid gap-2 grid-cols-1 lg:grid-cols-2 md:grid-cols-2 sm:grid-cols-1 ">
            @foreach ($baseDocuments as $baseDocument)
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

                                        <ul class="list-group">
                                            <li class="list-group-item">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <span> <i class="fa fa-file-pdf fa-2x  text-slate-400 mx-2"></i>
                                                        CGV Access
                                                        Energies</span>
                                                    <a href="{{ $baseDocument->cgv_access_anergies }}"
                                                        class="btn btn-success" download><i class="fa fa-download"></i></a>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <span><i class="fa fa-file-pdf fa-2x  text-slate-400 mx-2"></i>RIB
                                                        d'entreprise</span>
                                                    <a href="{{ $baseDocument->rib_entreprise }}" class="btn btn-success"
                                                        download><i class="fa fa-download"></i></a>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <span> <i class="fa fa-file-pdf fa-2x  text-slate-400 mx-2"></i>
                                                        KIBIS</span>
                                                    <a href="{{ $baseDocument->kabis }}" class="btn btn-success" download><i
                                                            class="fa fa-download"></i></a>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <span> <i class="fa fa-file-pdf fa-2x  text-slate-400 mx-2"></i>
                                                        Billans
                                                        Comptables</span>
                                                    <div>
                                                        <a href="{{ $baseDocument->bilan_comptable_1 }}"
                                                            class="btn btn-success" download><i
                                                                class="fa fa-download"></i></a>
                                                        <a href="{{ $baseDocument->bilan_comptable_2 }}"
                                                            class="btn btn-success" download><i
                                                                class="fa fa-download"></i></a>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <span> <i class="fa fa-file-pdf fa-2x  text-slate-400 mx-2"></i>
                                                        Annexes</span>
                                                    <div>
                                                        <a href="{{ $baseDocument->annexe_1 }}" class="btn btn-success"
                                                            download><i class="fa fa-download"></i></a>
                                                        <a href="{{ $baseDocument->annexe_1 }}" class="btn btn-success"
                                                            download><i class="fa fa-download"></i></a>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <span> <i class="fa fa-file-pdf fa-2x  text-slate-400 mx-2"></i>
                                                        Courrier
                                                        manuscrit</span>
                                                    <a href="{{ $baseDocument->confirmation_douanaire }}"
                                                        class="btn btn-success" download><i class="fa fa-download"></i></a>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <span> <i class="fa fa-file-pdf fa-2x  text-slate-400 mx-2"></i>
                                                        Fiche
                                                        d'entreprise</span>
                                                    <a href="{{ $baseDocument->fichier_entreprise }}"
                                                        class="btn btn-success" download><i class="fa fa-download"></i></a>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <span> <i class="fa fa-file-pdf fa-2x  text-slate-400 mx-2"></i>
                                                        Fiche
                                                        d'entreprise</span>
                                                    <a href="{{ $baseDocument->valeur_ajoutee }}" class="btn btn-success"
                                                        download><i class="fa fa-download"></i></a>
                                                </div>
                                            </li>


                                            <!-- Add more list items for additional files -->
                                        </ul>
                                    </div>


                            </ul>
                        </div>
                        <div class="w-full float-right  ">
                            <a class="text-muted dropdown-toggle font-size-16 bg-dark text-white p-2 rounded-4 mx-2"
                                href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true"><i
                                    class="fa fa-cog"></i>Actions </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="{{ route('baseDoc.show', $baseDocument->id) }}">Détails</a>
                                <a class="dropdown-item" href="{{ route('baseDoc.edit', $baseDocument->id) }}">Editer</a>

                                <form method="POST" action="{{ route('baseDoc.destroy', $baseDocument->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="dropdown-item"><i class="fa fa-trash"></i>
                                        Supprimer</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="mt-4">
            {{ $baseDocuments->links('vendor.pagination.tailwind') }}
        </div>
    </div>
@endsection
