@extends('layouts.signed')

@section('main')
    <div class="   ">
        <div class="  border-0    rounded shadow-sm">
            <div class="card-body p-4">
                <div class="flex text-center w-full ">
                    <h5 class=" text-slate-400 bg-light p-3 rounded-md w-full ">
                        <span class=" text-emerald-400"> {{ $site->nom }}</span>
                    </h5>
                </div>
                <div class="content grow column">
                    <div class="flex justify-between">
                        <div class="  bg-gray-400 text-white rounded-full px-3 py-2 my-2">Date de creation :
                            {{ $site->date_creation }}</div>
                        <div
                            class="  rounded-full px-3 {{ $site->date_radiation == null ? 'bg-emerald-50 text-emerald-400' : 'bg-red-400 text-white' }}   p-2 my-2 ">
                            {{ $site->date_radiation ? 'Attention cette site est radié' : 'site en activité' }}
                        </div>
                    </div>

                    <div class="col  ">
                        <div class="card  ">
                            <div class="card-body">


                                <div
                                    class="grid my-2 p-2  gap-1 bg-light  grid-cols-1 lg:grid-cols-2 md:grid-cols-2 sm:grid-cols-2 text-gray-400">

                                    <p class="flex justify-content-between p-2 bg-white rounded-md">
                                        <span> SIRET : </span>
                                        <span class="bg-emerald-50 text-emerald-400 p-2 rounded-md">
                                            {{ $site->siret }}</span>
                                    </p>


                                    <p class="flex justify-content-between p-2 bg-white rounded-md"> <span> Consommation de
                                            Gaz :</span>
                                        <span class="bg-emerald-50 text-emerald-400 p-2 rounded-md">
                                            {{ $site->consommation_gaz }}</span>
                                    </p>
                                    <p class="flex justify-content-between p-2 bg-white rounded-md"> <span> Type :
                                        </span>
                                        <span class="bg-emerald-50 text-emerald-400 p-2 rounded-md">
                                            {{ $site->type }}</span>
                                    </p>
                                    <p class="flex justify-content-between p-2 bg-white rounded-md"> <span> Adresse
                                            : </span>
                                        <span class="bg-emerald-50 text-emerald-400 p-2 rounded-md">
                                            {{ $site->adresse }}</span>
                                    </p>


                                </div>

                                <div
                                    class="grid gap-2 grid-cols-1 xl:grid-cols-2 lg:grid-cols-2 md:grid-cols-2 sm:grid-cols-1 ">
                                    <a class="btn btn-success" target="_blank" rel="noopener"
                                        href="https://api.avis-situation-sirene.insee.fr/identification/pdf/84476652700015"><i
                                            class="fas fa-file-download"></i>
                                        Avis de situation SIRENE
                                    </a><a class="btn btn-success" href="#" target="_blank" rel="noopener"><i
                                            class="fas fa-file-download"></i>
                                        Extrait INPI
                                    </a><a href="pepper-hot-844766527/PEPPER%20HOT%27 - Extrait d'immatriculation.pdf"
                                        class="btn btn-success" target="_blank" rel="nofollow"><i
                                            class="fas fa-file-download"></i>
                                        Extrait Pappers
                                    </a>
                                </div>

                            </div>

                        </div>
                    </div>



                </div>

                {{-- Dates of start and end --}}

            </div>

            <div class="row">

                <a href="{{ route('study.create') }}" class="btn btn-dark m-3 ">
                    + Nouvelle Etude
                </a>

                <div class="grid gap-3 grid-cols-1 lg:grid-cols-3 md:grid-cols-2  sm:grid-cols-1 ">
                    @foreach ($site->etudes as $etude)
                        <div class=" my-2">
                            <div class="card h-100">
                                <div class="card-header bg-success  text-white  text-center">
                                    {{ $etude->created_at }}
                                </div>
                                <div>
                                    <img src="{{ asset('./img/study.gif') }}"
                                        class="h-20 mx-auto p-2 bg-slate-50 rounded-full" alt="" srcset="">
                                </div>
                                <div class="card-body   ">
                                    <p class="text-success bg-light-gray p-3 text-xl  rounded-2">Détails de l'étude</p>
                                    <h5>{{ $etude->nom_etude }}</h5>
                                    <p>Nom de l'etude est <b class="text-success"> {{ $etude->nom_etude }}</b>, nom de
                                        client <b class="text-success"> {{ $etude->nom_client }}</b>,nom de
                                        responsable <b class="text-success">{{ $etude->nom_contact }}</b></p>
                                    <span class="bg-light-gray rounded-2 p-2 my-2 ">Responsable :
                                        {{ $etude->nom_responsable }}
                                    </span>

                                    <h6 class="text-success bg-slate-500 p-3 mt-3 rounded-2">Site proprietaire</h6>
                                    <div class="grid grid-cols-1 lg:grid-cols-1 md:grid-cols-1 sm:grid-cols-1 gap-1 ">
                                        <p
                                            class="text-muted flex justify-between px-3 mb-0 bg-slate-50 text-slate-600 p-2 rounded-md ">
                                            <span class="text-emerald-400 font-semibold">Nom Site </span>
                                            <span>{{ $etude->Site->nom }}</span>
                                        </p>
                                        <p
                                            class="text-muted flex justify-between px-3 mb-0  bg-slate-50 text-slate-600 p-2 rounded-md ">
                                            <span class="text-emerald-400 font-semibold">SIRET </span>
                                            <span>{{ $etude->Site->siret }}</span>
                                        </p>
                                        <p
                                            class="text-muted flex justify-between px-3 mb-0  bg-slate-50 text-slate-600 p-2 rounded-md ">
                                            <span class="text-emerald-400 font-semibold"> Conso</span>
                                            <span>{{ $etude->Site->consommation_gaz }}</span>
                                        </p>

                                    </div>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                        incididunt
                                        ut labore et dolore.</p>

                                    <div class="dropdown">
                                        <button class="btn btn-success dropdown-toggle" type="button"
                                            id="actionsDropdown{{ $etude->id }}" data-bs-toggle="dropdown"
                                            aria-expanded="true">
                                            <i class="fa fa-cog"></i>
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="actionsDropdown{{ $etude->id }}">
                                            <li><a class="dropdown-item" href="{{ route('study.show', $etude->id) }}"
                                                    rel="noopener noreferrer"><i class="fa fa-eye"></i>
                                                    Détails</a></li>
                                            <li><a class="dropdown-item" href="{{ route('study.edit', $etude->id) }}"
                                                    rel="noopener noreferrer"><i class="fa fa-pen"></i>
                                                    Modifier</a></li>
                                            <li>
                                                <form method="POST" action="{{ route('study.destroy', $etude->id) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="dropdown-item"><i class="fa fa-trash"></i>
                                                        Supprimer</button>
                                                </form>
                                            </li>
                                        </ul>
                                    </div>

                                </div>

                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
@endsection
