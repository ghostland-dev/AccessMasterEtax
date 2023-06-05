@extends('layouts.signed')
@section('main')
    <div class="container  ">

        <a class="btn btn-success my-4" href="{{ route('companie.create') }}"> Nouvelle société</a>

        <div class="grid gap-4 grid-cols-1 xl:grid-cols-2 lg:grid-cols-2 md:grid-cols-2 sm:grid-cols-1 ">
            @foreach ($entreprises as $entreprise)
                <div class="   ">
                    <div class="  border-0 bg-gray-50 rounded shadow-sm">
                        <div class="card-body p-4">
                            <div class="flex text-center w-full ">
                                <h5 class=" text-slate-600 bg-white p-3 rounded-md w-full ">Informations Juridiques de <span
                                        class=" text-emerald-400">
                                        # {{ $entreprise->denomenation }}</span>
                                </h5>

                            </div>
                            <div class="content grow column">
                                <div class="flex justify-between">
                                    <div>Date de creation : {{ $entreprise->date_creation }}</div>
                                    <div class=""> {{ $entreprise->date_radiation ? 'Radié' : 'En Activité' }}</div>
                                </div>

                                <table class="grow">
                                    <tbody>
                                        <tr>
                                            <th class="text-gray-100">SIREN :</th>
                                            <td>{{ $entreprise->siren }} <span
                                                    class="far fa-copy clipboard mx-2 text-white bg-gray-300 rounded-full p-2"></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="text-gray-100">SIRET (siège) :</th>
                                            <td>{{ $entreprise->siret }} <span
                                                    class="far fa-copy clipboard mx-2 text-white bg-gray-300 rounded-full p-2"></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="text-gray-100">Forme juridique :
                                            </th>
                                            <td>{{ $entreprise->forme_juridique }}</td>
                                        </tr>
                                        <tr>
                                            <th class="text-gray-100">Code Forme juridique:</th>
                                            <td class="flex items-center">
                                                <div><span>{{ $entreprise->forme_juridique_code }}</span><span
                                                        class="far fa-copy clipboard mx-2 text-white bg-gray-300 rounded-full p-2"></span>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="text-gray-100">Effectif :
                                            </th>
                                            <td><span class=" ">{{ $entreprise->effectif }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="text-gray-100">Adresse (Siege) :</th>
                                            <td>{{ $entreprise->adresse }}<span
                                                    class="far fa-copy clipboard mx-2 text-white bg-gray-300 rounded-full p-2"></span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="text-gray-100">Capital social :</th>
                                            <td> <span class="bg-indigo-100 p-1 rounded-md"> {{ $entreprise->capital }} €
                                                </span></td>
                                        </tr>
                                        <tr>
                                            <th class="text-gray-100">Code NAF :</th>
                                            <td>{{ $entreprise->code_naf }}</td>
                                        </tr>
                                        <tr>
                                            <th class="text-gray-100">Code NACE :</th>
                                            <td class="bg-slate-50 p-2 rounded-full">{{ $entreprise->code_nace }}</td>
                                        </tr>
                                        <tr>
                                            <th class="text-gray-100">Numbre de Dirigeants :</th>
                                            <td class="bg-slate-50 p-2 rounded-full">{{ count($entreprise->responsibles) }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="text-gray-100">Numbre de sites :</th>
                                            <td>{{ count($entreprise->sites) }}</td>
                                        </tr>
                                        <tr class="my-3">
                                            <th class="text-gray-100">Site internet :</th>
                                            <td> <a class="text-blue-400 border-2 rounded-md p-[0.5em] my-3 w-100 border-dashed border-gray-400"
                                                    href="{{ $entreprise->site_internet }}"> <i
                                                        class="fa fa-link mx-2"></i>
                                                    Visiter le site</a> </td>
                                        </tr>
                                    </tbody>
                                </table>
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

                            {{-- Dates of start and end --}}

                        </div>

                    </div>
                </div>


                <!--end col-->
            @endforeach


            <div class="col-12 mt-4 pt-2 d-block d-md-none  ">
                <a href="#" class="btn btn-primary">View more Jobs <svg xmlns="http://www.w3.org/2000/svg"
                        width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="feather feather-arrow-right fea icon-sm">
                        <line x1="5" y1="12" x2="19" y2="12"></line>
                        <polyline points="12 5 19 12 12 19"></polyline>
                    </svg></a>
            </div>
            <!--end col-->
        </div>
        <!--end row-->
    </div>
@endsection
