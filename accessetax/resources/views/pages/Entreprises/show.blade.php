@extends('layouts.signed')

@section('main')
    <div class="   ">
        <div class="  border-0  bg-light rounded shadow-sm">
            <div class="card-body p-4">
                <div class="flex text-center w-full ">
                    <h5 class=" text-slate-400 bg-white p-3 rounded-md w-full ">
                        <span class=" text-emerald-400">  {{ $entreprise->denomination }}</span>
                    </h5>
                </div>
                <div class="content grow column">
                    <div class="flex justify-between">
                        <div class="bg-gray-400 text-white rounded-full px-3 py-2 my-2">Date de creation :
                            {{ $entreprise->date_creation }}</div>
                        <div
                            class=" rounded-full px-3 {{ $entreprise->date_radiation == null ? 'bg-emerald-50 text-emerald-400' : 'bg-red-400 text-white' }}   p-2 my-2 ">
                            {{ $entreprise->date_radiation ? 'Attention cette entreprise est radié' : 'Entreprise en activité' }}
                        </div>
                    </div>

                    <div class="col  ">
                        <div class="card">
                            <div class="card-body">


                                <div
                                    class="my-2 p-2  gap-2 bg-light-gray grid grid-cols-1 lg:grid-cols-3 md:grid-cols-3 sm:grid-cols-2 text-gray-400">
                                    <p class="flex justify-between p-2 bg-white rounded-md"><i
                                            class="mdi mdi-phone font-size-15 align-middle pe-2  "></i>
                                        SIREN : <span class="bg-emerald-50 text-emerald-400 p-2 rounded-md">
                                            {{ $entreprise->siren }}</span>
                                    </p>
                                    <p class="flex justify-between p-2 bg-white rounded-md"><i
                                            class="mdi mdi-phone font-size-15 align-middle pe-2  "></i>
                                        SIRET : <span class="bg-emerald-50 text-emerald-400 p-2 rounded-md">
                                            {{ $entreprise->siret }}</span>
                                    </p>

                                    <p class="flex justify-between p-2 bg-white rounded-md"><i
                                            class="mdi mdi-google-maps font-size-15 align-middle pe-2  "></i>
                                        Ville : <span class="bg-emerald-50 text-emerald-400 p-2 rounded-md">
                                            {{ $entreprise->ville }} ,
                                            {{ $entreprise->code_postal }}</span>
                                    </p>
                                    <p class="flex justify-between p-2 bg-white rounded-md"><i
                                            class="mdi mdi-google-maps font-size-15 align-middle pe-2  "></i>
                                        Capital : <span class="bg-emerald-50 text-emerald-400 p-2 rounded-md">
                                            {{ $entreprise->capital }}</span>
                                    </p>
                                    <p class="flex justify-between p-2 bg-white rounded-md"><i
                                            class="mdi mdi-google-maps font-size-15 align-middle pe-2  "></i>
                                        Effecltif : <span class="bg-emerald-50 text-emerald-400 p-2 rounded-md">
                                            {{ $entreprise->effectif }}</span>
                                    </p>
                                    <p class="flex justify-between p-2 bg-white rounded-md"><i
                                            class="mdi mdi-google-maps font-size-15 align-middle pe-2  "></i>
                                        N° de dirigenets : <span class="bg-emerald-50 text-emerald-400 p-2 rounded-md">
                                            {{ $entreprise->nb_dirigents }}</span>
                                    </p>
                                    <p class="flex justify-between p-2 bg-white rounded-md"><i
                                            class="mdi mdi-google-maps font-size-15 align-middle pe-2  "></i>
                                        date de création : <span class="bg-emerald-50 text-emerald-400 p-2 rounded-md">
                                            {{ $entreprise->date_creation }}</span>
                                    </p>
                                    <p class="flex justify-between p-2 bg-white rounded-md"><i
                                            class="mdi mdi-google-maps font-size-15 align-middle pe-2  "></i>
                                        Code NAF : <span class="bg-emerald-50 text-emerald-400 p-2 rounded-md">
                                            {{ $entreprise->code_naf }}</span>
                                    </p>
                                    <p class="flex justify-between p-2 bg-white rounded-md"><i
                                            class="mdi mdi-google-maps font-size-15 align-middle pe-2  "></i>
                                        Code Nace : <span class="bg-emerald-50 text-emerald-400 p-2 rounded-md">
                                            {{ $entreprise->code_nic }}</span>
                                    </p>
                                    <p class="flex justify-between p-2 bg-white rounded-md"><i
                                            class="mdi mdi-google-maps font-size-15 align-middle pe-2  "></i>
                                        Site internet : <span class="bg-emerald-50 text-emerald-400 p-2 rounded-md">
                                            {{ $entreprise->site_internet }}</span>
                                    </p>
                                    <p class="flex justify-between p-2 bg-white rounded-md"><i
                                            class="mdi mdi-google-maps font-size-15 align-middle pe-2  "></i>
                                        Cetegorie juridique : <span class="bg-emerald-50 text-emerald-400 p-2 rounded-md">
                                            {{ $entreprise->categorie_juridique }}</span>
                                    </p>
                                    <p class="flex justify-between p-2 bg-white rounded-md"><i
                                            class="mdi mdi-google-maps font-size-15 align-middle pe-2  "></i>
                                        Cetegorie code forme juridique : <span
                                            class="bg-emerald-50 text-emerald-400 p-2 rounded-md">
                                            {{ $entreprise->forme_juridique_code }}</span>
                                    </p>
                                    <p class="flex justify-between p-2 bg-white rounded-md"><i
                                            class="mdi mdi-google-maps font-size-15 align-middle pe-2  "></i>
                                        Ville : <span class="bg-emerald-50 text-emerald-400 p-2 rounded-md">
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
                </div>

                {{-- Dates of start and end --}}

            </div>

        </div>
    </div>
@endsection
