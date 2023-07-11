@extends('layouts.signed')
@section('main')
    <div class="container ">

        <!--end col-->

        <div class="   my-4 mt-sm-0  ">
            <a href="{{ route('baseFoler.create') }}" class="btn btn-success  ">
                + Nouveau dossier de base
            </a>
        </div>
        <!--end col-->

        <!--end row-->

        <div class="row">
            <div class=" grid gap-2 grid-cols-1 lg:grid-cols-3 md:grid-cols-2 sm:grid-cols-1">
                @foreach ($DossierBases as $DossierBase)
                    <div class=" card border-0   rounded-md shadow-md">
                        <div class="card-body p-4">
                            <div
                                class="grid gap-2 grid-cols-2 lg:grid-cols-2 md:grid-cols-2 sm:grid-cols-2 px-2 p-2 rounded-md bg-slate-50  align-middle">

                                <h5 class="text-emerald-400 pt-1 capitalize">{{ $DossierBase->nom_client }}</h5>

                                @if ($DossierBase->statut_dossier == 'en attente')
                                    <span class=" bg-red-50 py-1 px-2 rounded-lg text-center  text-red-400">
                                        {{ $DossierBase->statut_dossier }}</span>
                                @elseif($DossierBase->statut_dossier == 'en cours')
                                    <span class=" bg-yellow-50 py-1 px-2 rounded-lg text-center  text-yellow-400">
                                        {{ $DossierBase->statut_dossier }}</span>
                                @elseif($DossierBase->statut_dossier == 'prêt à envoyé')
                                    <span class=" bg-indigo-50 py-1 px-2 rounded-lg text-center  text-indigo-400">
                                        {{ $DossierBase->statut_dossier }}</span>
                                @elseif($DossierBase->statut_dossier == 'envoyé')
                                    <span class=" bg-orange-50 py-1 px-2 rounded-lg text-center  text-orange-400">
                                        {{ $DossierBase->statut_dossier }}</span>
                                @elseif($DossierBase->statut_dossier == 'confirmé')
                                    <span class=" bg-blue-50 py-1 px-2 rounded-lg text-center  text-blue-400">
                                        {{ $DossierBase->statut_dossier }}</span>
                                @elseif($DossierBase->statut_dossier == 'finalisé')
                                    <span class=" bg-emerald-50 py-1 px-2 rounded-lg text-center  text-emerald-400">
                                        {{ $DossierBase->statut_dossier }}</span>
                                @elseif($DossierBase->statut_dossier == 'réglé')
                                    <span class=" bg-emerald-50 py-1 px-2 rounded-lg text-center  text-emerald-400">
                                        {{ $DossierBase->statut_dossier }}</span>
                                @elseif($DossierBase->statut_dossier == 'traité')
                                    <span class=" bg-emerald-50 py-1 px-2 rounded-lg text-center  text-emerald-400">
                                        {{ $DossierBase->statut_dossier }}</span>
                                @elseif($DossierBase->statut_dossier == null)
                                    <span class=" bg-gray-100 py-1 px-2 rounded-lg text-center  text-gray-400">
                                        Inconnu</span>
                                @endif


                            </div>
                            <div class="mt-3  ">
                                <span class="text-muted d-block">
                                    <p class="text-muted capitalize">
                                        <i class="text-success mx-2 fa fa-id-badge"></i> {{ $DossierBase->numero_dossier }}
                                    </p>
                                </span>
                                <span class="text-muted d-block">
                                    <p class="capitalize"><i
                                            class="text-success mx-2 fa fa-file"></i>{{ $DossierBase->nom_dossier }}
                                    </p>
                                </span>
                                <span class="text-muted d-block">
                                    <p class="capitalize"><i
                                            class="text-success mx-2 fa fa-user"></i>{{ $DossierBase->nom_client }}
                                    </p>
                                </span>
                            </div>



                            <div class=" grid gap-2 grid-cols-2 mt-3">
                                <a href="#" class="p-2 bg-slate-50 text-gray-400 rounded-md text-center"><i
                                        class="text-gray-400 mx-2 fa fa-file-pdf"></i> Docs
                                    Genérés</a>
                                <a href="# " class="p-2 bg-slate-50 text-gray-400 rounded-md text-center"><i
                                        class="text-gray-400 mx-2 fa fa-file-pdf"></i> Docs de
                                    base</a>
                            </div>

                        </div>


                        <p class="bg-slate-50 text-gray-400 p-2 rounded-md text-center flex align-middle justify-center"><i
                                class="text-emerald-400 mx-2 fa fa-calendar" aria-hidden="true"></i>
                            {{ $DossierBase->created_at }}
                        <div class="flex justify-center text-center bg-slate-200 p-2">

                            <a href="{{ route('baseFoler.show', $DossierBase->id) }}"
                                class=" p-2 rounded-full mx-2 bg-emerald-50 text-emerald-400"><i class="fa fa-eye"></i></a>
                            <a href="{{ route('baseFoler.edit', $DossierBase->id) }}"
                                class=" p-2 rounded-full mx-2 bg-yellow-50 text-yellow-400"><i class="fa fa-pen"></i></a>
                            <form method="POST" action="{{ route('baseFoler.destroy', $DossierBase->id) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class=" p-2 rounded-full mx-2 bg-red-50 text-red-400"><i
                                        class="fa fa-trash"></i>
                                </button>
                            </form>

                        </div>
                        </p>

                    </div>

                    <!--end col-->
                @endforeach
            </div>

            <div class="mt-4">
                {{ $DossierBases->links('vendor.pagination.tailwind') }}
            </div>
            <!--end col-->
        </div>
        <!--end row-->
    </div>
@endsection
