@extends('layouts.signed')
@section('main')
    <div class="container ">

        <!--end col-->

        <div class="   my-4 mt-sm-0  ">
            <a href="{{ route('genFold.create') }}" class="btn btn-success  ">
                + Nouveau dossier de générés
            </a>
        </div>
        <!--end col-->

        <!--end row-->

        <div class="row">
            <div class=" grid gap-3 grid-cols-1 lg:grid-cols-2 md:grid-cols-2 sm:grid-cols-1 ">
                @foreach ($DossierGens as $DossierGen)
                    <div class=" card    rounded-md shadow-md">
                        <div class="card-body p-4">
                            <div class=" flex justify-between px-3 p-2 rounded-md bg-slate-50  align-middle">

                                <h5 class="text-emerald-400 pt-1 capitalize"> liste des fichiers générés </h5>

                                @if ($DossierGen->statut_dossier == 'en attente')
                                    <span class=" p-2  bg-red-50 py-1 px-2 rounded-lg text-center  text-red-400">
                                        {{ $DossierGen->statut_dossier }}</span>
                                @elseif($DossierGen->statut_dossier == 'en cours')
                                    <span class=" p-2  bg-yellow-50 py-1 px-2 rounded-lg text-center  text-yellow-400">
                                        {{ $DossierGen->statut_dossier }}</span>
                                @elseif($DossierGen->statut_dossier == 'prêt à envoyé')
                                    <span class=" p-2  bg-indigo-50 py-1 px-2 rounded-lg text-center  text-indigo-400">
                                        {{ $DossierGen->statut_dossier }}</span>
                                @elseif($DossierGen->statut_dossier == 'envoyé')
                                    <span class=" p-2  bg-orange-50 py-1 px-2 rounded-lg text-center  text-orange-400">
                                        {{ $DossierGen->statut_dossier }}</span>
                                @elseif($DossierGen->statut_dossier == 'confirmé')
                                    <span class=" p-2  bg-blue-50 py-1 px-2 rounded-lg text-center  text-blue-400">
                                        {{ $DossierGen->statut_dossier }}</span>
                                @elseif($DossierGen->statut_dossier == 'finalisé')
                                    <span class=" p-2  bg-emerald-50 py-1 px-2 rounded-lg text-center  text-emerald-400">
                                        {{ $DossierGen->statut_dossier }}</span>
                                @elseif($DossierGen->statut_dossier == 'réglé')
                                    <span class=" p-2  bg-emerald-50 py-1 px-2 rounded-lg text-center  text-emerald-400">
                                        {{ $DossierGen->statut_dossier }}</span>
                                @elseif($DossierGen->statut_dossier == 'traité')
                                    <span class=" p-2  bg-emerald-50 py-1 px-2 rounded-lg text-center  text-emerald-400">
                                        {{ $DossierGen->statut_dossier }}</span>
                                @elseif($DossierGen->statut_dossier == null)
                                    <span class=" p-2  bg-gray-100 py-1 px-2 rounded-lg text-center  text-gray-400">
                                        Inconnu</span>
                                @endif


                            </div>
                            <div class="grid gap-2 grid-cols-2 lg:grid-cols-2 md:grid-cols-2 sm:grid-cols-2 p-2 my-2">

                                <span class=" shadow-sm  text-muted flex justify-between">
                                    <p class="capitalize text-xs"><i class="text-gray-400 mx-2 fa fa-file-pdf fa-2xl"></i>
                                        Attest. non
                                        rembouresment </p>
                                    <a href="{{ $DossierGen->attestation_non_rembourse }}"><i
                                            class="fa fa-download bg-emerald-400 p-2 rounded-full text-white"></i></a>
                                </span>
                                <span class=" shadow-sm  text-muted flex justify-between">
                                    <p class="capitalize text-xs"><i
                                            class="text-gray-400 mx-2 fa fa-file-pdf fa-2xl"></i>Pouvoir
                                        CLIENT </p>
                                    <a href="{{ $DossierGen->attestation_non_rembourse }}"><i
                                            class="fa fa-download bg-emerald-400 p-2 rounded-full text-white"></i></a>
                                </span>
                                <span class=" shadow-sm  text-muted flex justify-between">
                                    <p class="capitalize text-xs"><i
                                            class="text-gray-400 mx-2 fa fa-file-pdf fa-2xl"></i>Contrat
                                        de
                                        préstation </p>
                                    <a href="{{ $DossierGen->attestation_non_rembourse }}"><i
                                            class="fa fa-download bg-emerald-400 p-2 rounded-full text-white"></i></a>
                                </span>
                                <span class=" shadow-sm  text-muted flex justify-between">
                                    <p class="capitalize text-xs"><i
                                            class="text-gray-400 mx-2 fa fa-file-pdf fa-2xl"></i>Demande
                                        de
                                        rembouresment </p>
                                    <a href="{{ $DossierGen->attestation_non_rembourse }}"><i
                                            class="fa fa-download bg-emerald-400 p-2 rounded-full text-white"></i></a>
                                </span>
                                <span class=" shadow-sm  text-muted flex justify-between">
                                    <p class="capitalize text-xs"><i
                                            class="text-gray-400 mx-2 fa fa-file-pdf fa-2xl"></i>Courrier
                                        Cerfa
                                    </p>
                                    <a href="{{ $DossierGen->attestation_non_rembourse }}"><i
                                            class="fa fa-download bg-emerald-400 p-2 rounded-full text-white"></i></a>
                                </span>
                                <span class=" shadow-sm  text-muted flex justify-between">
                                    <p class="capitalize text-xs"><i
                                            class="text-gray-400 mx-2 fa fa-file-pdf fa-2xl"></i>CLIENT
                                        Cerfa
                                        14317-07</p>
                                    <a href="{{ $DossierGen->attestation_non_rembourse }}"><i
                                            class="fa fa-download bg-emerald-400 p-2 rounded-full text-white"></i></a>
                                </span>
                                <span class=" shadow-sm  text-muted flex justify-between">
                                    <p class="capitalize text-xs"><i
                                            class="text-gray-400 mx-2 fa fa-file-pdf fa-2xl"></i>CLIENT
                                        Cerfa
                                        14318-08</p>
                                    <a href="{{ $DossierGen->attestation_non_rembourse }}"><i
                                            class="fa fa-download bg-emerald-400 p-2 rounded-full text-white"></i></a>
                                </span>
                                <span class=" shadow-sm  text-muted flex justify-between">
                                    <p class="capitalize text-xs"><i
                                            class="text-gray-400 mx-2 fa fa-file-pdf fa-2xl"></i>CLIENT
                                        Cerfa
                                        14700-03 </p>
                                    <a href="{{ $DossierGen->attestation_non_rembourse }}"><i
                                            class="fa fa-download bg-emerald-400 p-2 rounded-full text-white"></i></a>
                                </span>
                                <span class=" shadow-sm  text-muted flex justify-between">
                                    <p class="capitalize text-xs"><i class="text-gray-400 mx-2 fa fa-file-pdf fa-2xl"></i>
                                        CLIENT
                                        Pouvoir
                                        Voltaria</p>
                                    <a href="{{ $DossierGen->attestation_non_rembourse }}"><i
                                            class="fa fa-download bg-emerald-400 p-2 rounded-full text-white"></i></a>
                                </span>
                                <span class=" shadow-sm  text-muted flex justify-between">
                                    <p class="capitalize text-xs"><i class="text-gray-400 mx-2 fa fa-file-pdf fa-2xl"></i>
                                        Proposition de
                                        service</p>
                                    <a href="{{ $DossierGen->attestation_non_rembourse }}"><i
                                            class="fa fa-download bg-emerald-400 p-2 rounded-full text-white"></i></a>
                                </span>

                            </div>
                        </div>
                        <p class="bg-slate-50 text-gray-400 p-2 rounded-md text-center flex align-middle justify-center">
                            <i class="text-emerald-400 mx-2 fa fa-calendar" aria-hidden="true"></i>
                            {{ $DossierGen->created_at }}
                        <div class="flex justify-center text-center bg-slate-50 p-2">

                            <a href="{{ route('genFold.show', $DossierGen->id) }}"
                                class=" p-2 rounded-full mx-2 bg-emerald-50 text-emerald-400"><i class="fa fa-eye"></i></a>
                            <a href="{{ route('genFold.edit', $DossierGen->id) }}"
                                class=" p-2 rounded-full mx-2 bg-yellow-50 text-yellow-400"><i class="fa fa-pen"></i></a>
                            <form method="POST" action="{{ route('genFold.destroy', $DossierGen->id) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class=" p-2 rounded-full mx-2 bg-red-50 text-red-400"><i
                                        class="fa fa-trash"></i>
                                </button>
                            </form>

                        </div>
                        </p>

                    </div>
                @endforeach
            </div>

            <div class="mt-4">
                {{ $DossierGens->links('vendor.pagination.tailwind') }}
            </div>
            <!--end col-->
        </div>
        <!--end row-->
    </div>
@endsection
