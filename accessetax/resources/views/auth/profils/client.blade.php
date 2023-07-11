@extends('layouts.signed')

@section('main')
    <div class="container">


        <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
            <div class="col">
                <div class="card radius-10 border-start border-0 border-3 border-info">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="mb-0 text-info"><i class="fa fa-home mr-2"></i> Entreprises</p>
                                <h4 class="my-1 text-info"> {{ count($user->companies) }}</h4>
                                <p class="mb-0 font-13">
                                    {{ count($user->companies) > 1 ? 'Grand entreprise' : 'Petite entreprise' }}.</p>
                            </div>
                            <div class="widgets-icons-2 rounded-circle bg-gradient-scooter text-white ms-auto">
                                <i class="fa fa-shopping-cart"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card radius-10 border-start border-0 border-3 border-danger">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="mb-0 text-danger"><i class="fa fa-building mr-2"></i> Site</p>
                                <h4 class="my-1 text-danger"> {{ '0' }} </h4>
                                <p class="mb-0 font-13"> entreprise en croissance</p>
                            </div>
                            <div class="widgets-icons-2 rounded-circle bg-gradient-bloody text-white ms-auto">
                                <i class="fa fa-dollar"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card radius-10 border-start border-0 border-3 border-success">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="mb-0 text-success">numbre de site</p>
                                <h4 class="my-1 text-success">34.6%</h4>
                                <p class="mb-0 font-13">-4.5% from last week</p>
                            </div>
                            <div class="widgets-icons-2 rounded-circle bg-gradient-ohhappiness text-white ms-auto">
                                <i class="fa fa-bar-chart"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card radius-10 border-start border-0 border-3 border-warning">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="mb-0 text-secondary">Total Customers</p>
                                <h4 class="my-1 text-warning">8.4K</h4>
                                <p class="mb-0 font-13">+8.4% from last week</p>
                            </div>
                            <div class="widgets-icons-2 rounded-circle bg-gradient-blooker text-white ms-auto">
                                <i class="fa fa-users"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <ol
        class="relative  border-gray-200 dark:border-gray-700 bg-gray-50 px-3 py-4 rounded-md border-l-slate-400 border-l-4 ">
        @if (Auth::user()->etape >= 8)
            <li class="mb-10 ml-6">
                <span
                    class="absolute flex items-center justify-center w-6 h-6 bg-slate-100 rounded-full -left-3 p-2 ring-8 ring-white dark:ring-gray-900 dark:bg-emerald-500">
                    <i class="w-3 h-3 text-slate-400 dark:text-emerald-300 fas fa-box    "></i>
                </span>
                <h3 class="flex items-center mb-1 text-lg font-semibold text-emerald-400 dark:text-white"> Changement de
                    Taux réduits<span
                        class="bg-red-50 text-red-500 text-sm font-medium mr-2 py-1 px-3 rounded dark:bg-red-400 dark:text-red-300 ml-3">Nouveau</span>
                </h3>
                <time class="block mb-2 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">Released on
                    January
                    13th, 2022</time>
                <p class="mb-4 text-base font-normal text-gray-500 dark:text-gray-400"> Votre dossier a été transmis au
                    authorité, vous allez recevoir la conifrmation bientôt, </p>
                <a href="#"
                    class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg hover:bg-gray-100 hover:text-emerald-700 focus:z-10 focus:ring-4 focus:outline-none focus:ring-gray-200 focus:text-emerald-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-gray-700">
                    <i class="fa fa-download mx-2" aria-hidden="true"></i> Confirmation de reception ZIP</a>

            </li>
        @endif
        @if (Auth::user()->etape >= 7)
            <li class="mb-10 ml-6">
                <span
                    class="absolute flex items-center justify-center w-6 h-6 bg-slate-100 rounded-full -left-3 p-2 ring-8 ring-white dark:ring-gray-900 dark:bg-emerald-500">
                    <i class="w-3 h-3 text-slate-400 dark:text-emerald-300 fas fa-box    "></i>
                </span>
                <h3 class="flex items-center mb-1 text-lg font-semibold text-emerald-400 dark:text-white"> Réglement de
                    préstation <span
                        class="bg-red-50 text-red-500 text-sm font-medium mr-2 py-1 px-3 rounded dark:bg-red-400 dark:text-red-300 ml-3">Nouveau</span>
                </h3>
                <time class="block mb-2 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">Released on
                    January
                    13th, 2022</time>
                <p class="mb-4 text-base font-normal text-gray-500 dark:text-gray-400"> Votre dossier a été transmis au
                    authorité, vous allez recevoir la conifrmation bientôt, </p>
                <a href="#"
                    class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg hover:bg-gray-100 hover:text-emerald-700 focus:z-10 focus:ring-4 focus:outline-none focus:ring-gray-200 focus:text-emerald-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-gray-700">
                    <i class="fa fa-sold mx-2" aria-hidden="true"></i> Payer votre préstation</a>
            </li>
        @endif
        @if (Auth::user()->etape >= 6)
            <li class="mb-10 ml-6">
                <span
                    class="absolute flex items-center justify-center w-6 h-6 bg-slate-100 rounded-full -left-3 p-2 ring-8 ring-white dark:ring-gray-900 dark:bg-emerald-500">
                    <i class="w-3 h-3 text-slate-400 dark:text-emerald-300 fas fa-box    "></i>
                </span>
                <h3 class="flex items-center mb-1 text-lg font-semibold text-emerald-400 dark:text-white"> Transmission De
                    Dossier<span
                        class="bg-red-50 text-red-500 text-sm font-medium mr-2 py-1 px-3 rounded dark:bg-red-400 dark:text-red-300 ml-3">Nouveau</span>
                </h3>
                <time class="block mb-2 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">Released on
                    January
                    13th, 2022</time>
                <p class="mb-4 text-base font-normal text-gray-500 dark:text-gray-400"> Votre dossier a été transmis au
                    authorité, vous allez recevoir la conifrmation bientôt, </p>
                <a href="#"
                    class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg hover:bg-gray-100 hover:text-emerald-700 focus:z-10 focus:ring-4 focus:outline-none focus:ring-gray-200 focus:text-emerald-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-gray-700">
                    <i class="fa fa-download mx-2" aria-hidden="true"></i> Confirmation de reception ZIP</a>
            </li>
        @endif
        @if (Auth::user()->etape >= 5)
            <li class="mb-10 ml-6">
                <span
                    class="absolute flex items-center justify-center w-6 h-6 bg-slate-100 rounded-full -left-3 p-2 ring-8 ring-white dark:ring-gray-900 dark:bg-emerald-500">
                    <i class="w-3 h-3 text-slate-400 dark:text-emerald-300 fas fa-box    "></i>
                </span>
                <h3 class="flex items-center mb-1 text-lg font-semibold text-emerald-400 dark:text-white"> Transmission De
                    Dossier<span
                        class="bg-red-50 text-red-500 text-sm font-medium mr-2 py-1 px-3 rounded dark:bg-red-400 dark:text-red-300 ml-3">Nouveau</span>
                </h3>
                <time class="block mb-2 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">Released on
                    January
                    13th, 2022</time>
                <p class="mb-4 text-base font-normal text-gray-500 dark:text-gray-400"> Votre dossier a été transmis au
                    authorité, vous allez recevoir la conifrmation bientôt, </p>
                <a href="#"
                    class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg hover:bg-gray-100 hover:text-emerald-700 focus:z-10 focus:ring-4 focus:outline-none focus:ring-gray-200 focus:text-emerald-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-gray-700">
                    <i class="fa fa-download mx-2" aria-hidden="true"></i> Confirmation de reception ZIP</a>
            </li>
        @endif
        @if (Auth::user()->etape >= 4)
            <li class="mb-10 ml-6">
                <span
                    class="absolute flex items-center justify-center w-6 h-6 bg-slate-100 rounded-full -left-3 p-2 ring-8 ring-white dark:ring-gray-900 dark:bg-emerald-500">
                    <i class="w-3 h-3 text-slate-400 dark:text-emerald-300 fas fa-box    "></i>
                </span>
                <h3 class="mb-1 text-lg font-semibold text-emerald-400 dark:text-white">Montage de dossier</h3>
                <time class="block mb-2 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">Released on
                    December
                    7th, 2021</time>
                <p class="text-base font-normal text-gray-500 dark:text-gray-400">All of the pages and components are first
                    designed in Figma and we keep a parity between the two versions even as we update the project.</p>
            </li>
        @endif
        @if (Auth::user()->etape >= 3)
            <li class="ml-6">
                <span
                    class="absolute flex items-center justify-center w-6 h-6 bg-slate-100 rounded-full -left-3 p-2 ring-8 ring-white dark:ring-gray-900 dark:bg-emerald-500">
                    <i class="w-3 h-3 text-slate-400 dark:text-emerald-300 fas fa-box    "></i>
                </span>
                <h3 class="mb-1 text-lg font-semibold text-emerald-400 dark:text-white">Génération et signature des fichiers
                </h3>
                <time class="block mb-2 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">Released on
                    December
                    2nd, 2021</time>
                <p class="text-base font-normal text-gray-500 dark:text-gray-400">Get started with dozens of web components
                    and
                    interactive elements built on top of Tailwind CSS.</p>
            </li>
        @endif
        @if (Auth::user()->etape >= 2)
            <li class="ml-6">
                <span
                    class="absolute flex items-center justify-center w-6 h-6 bg-slate-100 rounded-full -left-3 p-2 ring-8 ring-white dark:ring-gray-900 dark:bg-emerald-500">
                    <i class="w-3 h-3 text-slate-400 dark:text-emerald-300 fas fa-box    "></i>
                </span>
                <h3 class="mb-1 text-lg font-semibold text-emerald-400 dark:text-white">Resultat des tests d'éligibité</h3>
                <time class="block mb-2 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">Released on
                    December
                    2nd, 2021</time>
                <p class="text-base font-normal text-gray-500 dark:text-gray-400">Get started with dozens of web components
                    and
                    interactive elements built on top of Tailwind CSS.</p>
            </li>
        @endif
        @if (Auth::user()->etape >= 1)
            <li class="ml-6">
                <span
                    class="absolute flex items-center justify-center w-6 h-6 bg-slate-100 rounded-full -left-3 p-2 ring-8 ring-white dark:ring-gray-900 dark:bg-emerald-500">
                    <i class="w-3 h-3 text-slate-400 dark:text-emerald-300 fas fa-box    "></i>
                </span>
                <h3 class="mb-1 text-lg font-semibold text-emerald-400 dark:text-white">Test d'éligibité</h3>
                <time class="block mb-2 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">Released on
                    December
                    2nd, 2021</time>
                <p class="text-base font-normal text-gray-500 dark:text-gray-400">Get started with dozens of web components
                    and
                    interactive elements built on top of Tailwind CSS.</p>
            </li>
        @endif
    </ol>
@endsection
