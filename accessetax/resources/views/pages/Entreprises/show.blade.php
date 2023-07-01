@extends('layouts.signed')

@section('main')
    <div class="   ">
        <div class="  border-0    rounded shadow-sm">
            <div class="card-body p-4">
                <div class="flex text-center w-full ">
                    <h5 class=" text-slate-400 bg-light p-3 rounded-md w-full ">
                        <span class=" text-emerald-400"> {{ $entreprise->denomination }}</span>
                    </h5>
                </div>
                <div class="content grow column">
                    <div class="flex justify-between">
                        <div class="  bg-gray-400 text-white rounded-full px-3 py-2 my-2">Date de creation :
                            {{ $entreprise->date_creation }}</div>
                        <div
                            class="  rounded-full px-3 {{ $entreprise->date_radiation == null ? 'bg-emerald-50 text-emerald-400' : 'bg-red-400 text-white' }}   p-2 my-2 ">
                            {{ $entreprise->date_radiation ? 'Attention cette entreprise est radié' : 'Entreprise en activité' }}
                        </div>
                    </div>

                    <div class="col  ">
                        <div class="card  ">
                            <div class="card-body">


                                <div
                                    class="grid my-2 p-2  gap-1 bg-light  grid-cols-1 lg:grid-cols-3 md:grid-cols-3 sm:grid-cols-2 text-gray-400">
                                    <p class="flex justify-content-between p-2 bg-white rounded-md">

                                        <span> SIREN : </span>
                                        <span class="bg-emerald-50 text-emerald-400 p-2 rounded-md">

                                            {{ $entreprise->siren }}</span>
                                    </p>
                                    <p class="flex justify-content-between p-2 bg-white rounded-md">
                                        <span> SIRET : </span>
                                        <span class="bg-emerald-50 text-emerald-400 p-2 rounded-md">
                                            {{ $entreprise->siret }}</span>
                                    </p>

                                    <p class="flex justify-content-between p-2 bg-white rounded-md"> <span>Ville : </span>
                                        <span class="bg-emerald-50 text-emerald-400 p-2 rounded-md">
                                            {{ $entreprise->ville }} ,
                                            {{ $entreprise->code_postal }}</span>
                                    </p>
                                    <p class="flex justify-content-between p-2 bg-white rounded-md"> <span> Capital :</span>
                                        <span class="bg-emerald-50 text-emerald-400 p-2 rounded-md">
                                            {{ $entreprise->capital }}</span>
                                    </p>
                                    <p class="flex justify-content-between p-2 bg-white rounded-md"> <span> Effecltif :
                                        </span>
                                        <span class="bg-emerald-50 text-emerald-400 p-2 rounded-md">
                                            {{ $entreprise->effectif }}</span>
                                    </p>
                                    <p class="flex justify-content-between p-2 bg-white rounded-md"> <span> N° de dirigenets
                                            : </span>
                                        <span class="bg-emerald-50 text-emerald-400 p-2 rounded-md">
                                            {{ $entreprise->nb_dirigents }}</span>
                                    </p>
                                    <p class="flex justify-content-between p-2 bg-white rounded-md"> <span> date de création
                                            :</span>
                                        <span class="bg-emerald-50 text-emerald-400 p-2 rounded-md">
                                            {{ $entreprise->date_creation }}</span>
                                    </p>
                                    <p class="flex justify-content-between p-2 bg-white rounded-md"> <span> Code NAF :
                                        </span>
                                        <span class="bg-emerald-50 text-emerald-400 p-2 rounded-md">
                                            {{ $entreprise->code_naf }}</span>
                                    </p>
                                    <p class="flex justify-content-between p-2 bg-white rounded-md"> <span> Code Nace :
                                        </span>
                                        <span class="bg-emerald-50 text-emerald-400 p-2 rounded-md">
                                            {{ $entreprise->code_nic }}</span>
                                    </p>
                                    <p class="flex justify-content-between p-2 bg-white rounded-md"> <span> Site internet
                                            :</span>
                                        <span class="bg-emerald-50 text-emerald-400 p-2 rounded-md">
                                            <a class=" text-emerald-400"
                                                href="{{ $entreprise->site_internet }}">visiter</a></span>
                                    </p>
                                    <p class="flex justify-content-between p-2 bg-white rounded-md"> <span>Categorie
                                            juridique :</span>
                                        <span class="bg-emerald-50 text-emerald-400 p-2 rounded-md">
                                            {{ $entreprise->categorie_juridique }}</span>
                                    </p>
                                    <p class="flex justify-content-between p-2 bg-white rounded-md"> <span>Cetegorie code
                                            forme juridique :</span>
                                        <span class="bg-emerald-50 text-emerald-400 p-2 rounded-md">
                                            {{ $entreprise->forme_juridique_code }}</span>
                                    </p>
                                    <p class="flex justify-content-between p-2 bg-white rounded-md"> <span> Ville : </span>
                                        <span class="bg-emerald-50 text-emerald-400 p-2 rounded-md">
                                            {{ $entreprise->ville }}</span>
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

                    <table class="table   mb-0 bg-white">
                        <a href="{{ route('site.create') }}" class="btn btn-success m-3 ">
                            + Nouveau site
                        </a>
                        <thead class="bg-light">
                            <tr>
                                <th scope="col">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value=""
                                            id="flexCheckDefault" />
                                    </div>
                                </th>
                                <th>site</th>
                                <th>Adresse</th>
                                <th>Contact</th>
                                <th>Consommation</th>
                                <th>Date Inscription </th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($entreprise->sites as $site)
                                <tr>
                                    <th scope="row">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value=""
                                                id="flexCheckDefault" />
                                        </div>
                                    </th>
                                    <td>
                                        <div class="d-flex align-items-center">

                                            <div class="ms-3">
                                                <p class="fw-bold mb-1">{{ $site->nom }}</p>
                                                <p class="text-muted mb-0">{{ $site->siret }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="ms-3">
                                                <p class="fw-bold mb-1"> <i class="mx-2 fas fa-marker text-emerald-400"></i>
                                                    {{ $site->adresse }}</p>
                                                <p class="text-muted mb-0">
                                                    {{ $site->ville . ' | ' . $site->code_postal . ' | ' . $site->pays }}
                                                </p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <p class="text-muted mb-0"><i
                                                class="mx-2 fas fa-mobile text-emerald-400"></i>{{ $site->telephone }}
                                        </p>
                                        <p class="text-muted mb-0"><i
                                                class="mx-2 fas fa-mail text-emerald-400"></i>{{ $site->email }}
                                        </p>
                                    </td>
                                    <td>
                                        <p class="text-muted mb-0"><i class="mx-2 fas fa-plug text-emerald-400"></i>
                                            {{ $site->consommation_electrcite }} Mkw/€</p>
                                        <p class="text-muted mb-0"><i class="mx-2 fas fa-fire text-emerald-400"></i>
                                            {{ $site->consommation_gaz }} Mkw/€</p>
                                    </td>

                                    <td>{{ $site->created_at }}</td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-success dropdown-toggle" type="button"
                                                id="actionsDropdown{{ $site->id }}" data-bs-toggle="dropdown"
                                                aria-expanded="true">
                                                <i class="fa fa-cog"></i>
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="actionsDropdown{{ $site->id }}">
                                                <li><a class="dropdown-item" href="{{ route('site.show', $site->id) }}"
                                                        target="_blank" rel="noopener noreferrer"><i
                                                            class="fa fa-eye"></i>
                                                        Détails</a></li>
                                                <li><a class="dropdown-item" href="{{ route('site.edit', $site->id) }}"
                                                        target="_blank" rel="noopener noreferrer"><i
                                                            class="fa fa-pen"></i>
                                                        Modifier</a></li>
                                                <li>
                                                    <form method="POST" action="{{ route('site.destroy', $site->id) }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="dropdown-item"><i
                                                                class="fa fa-trash"></i>
                                                            Supprimer</button>
                                                    </form>
                                                </li>
                                            </ul>
                                        </div>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>

                {{-- Dates of start and end --}}

            </div>

        </div>
    </div>
@endsection
