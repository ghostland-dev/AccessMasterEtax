@extends('layouts.signed')
@section('main')
    <div class="w-3/4 mx-auto  bg-light p-2 rounded-md shadow">



        <div class="flex justify-between gap-2">

            <input type="number" id="searchInput"
                class="shadow p-3 form-control border-0 bg-success my-4 text-emerald-400 w-4/3 rounded-md"
                placeholder="SIREN de l'entreprise ici">

            <button id="getData" class="w-1/4 shadow p-3 form-control border-0 bg-dark my-4 text-white ">
                <i class="fa fa-cogs mx-2 "></i> Autocompleter
            </button>


        </div>


        <form method="POST" action="{{ route('companie.update', $site->id) }}" class="shadow-md p-3">
            @csrf
            @method('POST')


            <h4 class="my-3 text-base mx-auto w-full text-slate-400 text-center bg-slate-50 p-3 rounded-md"> modifier le
                site </h4>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="grid gap-2 grid-cols-1 lg:grid-cols-3 md:grid-cols-2 sm:grid-cols-1">
                <div class="mb-4">
                    <label for="denomination" class="block text-gray-700 text-sm font-bold mb-2">Dénomination:</label>
                    <input type="text" name="denomination" id="denomination" class="border border-gray-400 p-2 w-full"
                        required>
                </div>

                <div class="mb-4">
                    <label for="siren" class="block text-gray-700 text-sm font-bold mb-2">Siren:</label>
                    <input type="text" name="siren" id="siren" class="border border-gray-400 p-2 w-full" required>
                </div>

                <div class="mb-4">
                    <label for="siret" class="block text-gray-700 text-sm font-bold mb-2">Siret:</label>
                    <input type="text" name="siret" id="siret" class="border border-gray-400 p-2 w-full" required>
                </div>

                <div class="mb-4">
                    <label for="forme_juridique" class="block text-gray-700 text-sm font-bold mb-2">Forme juridique:</label>
                    <input type="text" name="forme_juridique" id="forme_juridique"
                        class="border border-gray-400 p-2 w-full" required>
                </div>

                <div class="mb-4">
                    <label for="forme_juridique_code" class="block text-gray-700 text-sm font-bold mb-2">Forme juridique
                        code:</label>
                    <input type="text" name="forme_juridique_code" id="forme_juridique_code"
                        class="border border-gray-400 p-2 w-full" required>
                </div>

                <div class="mb-4">
                    <label for="capital" class="block text-gray-700 text-sm font-bold mb-2">Capital:</label>
                    <input type="text" name="capital" id="capital" class="border border-gray-400 p-2 w-full" required>
                </div>

                <div class="mb-4">
                    <label for="effectif" class="block text-gray-700 text-sm font-bold mb-2">Effectif:</label>
                    <input type="text" name="effectif" id="effectif" class="border border-gray-400 p-2 w-full" required>
                </div>

                <div class="mb-4">
                    <label for="nb_dirigents" class="block text-gray-700 text-sm font-bold mb-2">Nombre de
                        dirigeants:</label>
                    <input type="number" name="nb_dirigents" id="nb_dirigents" class="border border-gray-400 p-2 w-full"
                        required>
                </div>

                <div class="mb-4">
                    <label for="categorie_juridique" class="block text-gray-700 text-sm font-bold mb-2">Catégorie
                        juridique:</label>
                    <input type="text" name="categorie_juridique" id="categorie_juridique"
                        class="border border-gray-400 p-2 w-full" required>
                </div>

                <div class="mb-4">
                    <label for="code_postal" class="block text-gray-700 text-sm font-bold mb-2">Code postal:</label>
                    <input type="text" name="code_postal" id="code_postal" class="border border-gray-400 p-2 w-full"
                        required>
                </div>

                <div class="mb-4">
                    <label for="ville" class="block text-gray-700 text-sm font-bold mb-2">Ville:</label>
                    <input type="text" name="ville" id="ville" class="border border-gray-400 p-2 w-full" required>
                </div>

                <div class="mb-4">
                    <label for="code_naf" class="block text-gray-700 text-sm font-bold mb-2">Code NAF:</label>
                    <input type="text" name="code_naf" id="code_naf" class="border border-gray-400 p-2 w-full" required>
                </div>

                <div class="mb-4">
                    <label for="code_nace" class="block text-gray-700 text-sm font-bold mb-2">Code NACE:</label>
                    <input type="text" name="code_nace" id="code_nace" class="border border-gray-400 p-2 w-full"
                        required>
                </div>

                <div class="mb-4">
                    <label for="site_internet" class="block text-gray-700 text-sm font-bold mb-2">Site internet:</label>
                    <input type="url" name="site_internet" id="site_internet"
                        class="border border-gray-400 p-2 w-full" required>
                </div>

                <div class="mb-4">
                    <label for="nic" class="block text-gray-700 text-sm font-bold mb-2">NIC:</label>
                    <input type="text" name="nic" id="nic" class="border border-gray-400 p-2 w-full"
                        required>
                </div>

                <div class="mb-4">
                    <label for="nic_siege" class="block text-gray-700 text-sm font-bold mb-2">NIC siège:</label>
                    <input type="text" name="nic_siege" id="nic_siege" class="border border-gray-400 p-2 w-full"
                        required>
                </div>

                <div class="mb-4">
                    <label for="date_creation" class="block text-gray-700 text-sm font-bold mb-2">Date de
                        création:</label>
                    <input type="date" name="date_creation" id="date_creation"
                        class="border border-gray-400 p-2 w-full" required>
                </div>



                <div class="my-4 mt-2 ">
                    <label class="relative inline-flex items-center mb-4 cursor-pointer">
                        <input type="checkbox" name="date_radiation" id="date_radiation" class="sr-only peer">
                        <div
                            class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-emerald-300 dark:peer-focus:ring-emerald-400 dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-emerald-600">
                        </div>
                        <span class="ml-3 text-sm   font-bold text-gray-400 dark:text-gray-300">Cette entreprise a été
                            radiée</span>
                    </label>
                </div>

            </div>

            <div class="grid gap-2 grid-cols-1 lg:grid-cols-1 md:grid-cols-1 sm:grid-cols-1">


                <div class="mb-4 w-full">
                    <label for="adresse" class="block text-gray-700 text-sm font-bold mb-2">Adresse:</label>
                    <textarea name="adresse" id="adresse" class="border border-gray-400 p-2 w-full" rows="3" required></textarea>
                </div>

            </div>
            <div class="w-100">
                <button type="submit" class="my-3   mx-auto btn btn-dark p-2 px-4"> Soumettre
                </button>
            </div>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var searchInput = document.getElementById('searchInput');
            var getData = document.getElementById('getData');
            getData.addEventListener('click', function() {
                var query = searchInput.value;
                if (query.length >= 7) {
                    fetchCompanies(query);
                }
            });
        });

        function fetchCompanies(query) {

            var xhr = new XMLHttpRequest();
            xhr.open('GET', '/app/v1/data/pappers?q=' + encodeURIComponent(query), true);
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        var response = JSON.parse(xhr.responseText);

                        populateFields(response.resultats[0]);
                    } else {
                        console.error('Error:', xhr.status);
                    }
                }
            };
            xhr.send();

        }

        function populateFields(company) {
            document.getElementById('denomination').value = company.nom_entreprise;
            document.getElementById('siren').value = company.siren;
            document.getElementById('siret').value = company.siege.siret;
            document.getElementById('forme_juridique').value = company.forme_juridique;
            document.getElementById('forme_juridique_code').value = company.categorie_juridique;
            document.getElementById('capital').value = company.chiffre_affaires;
            document.getElementById('effectif').value = company.effectif;
            document.getElementById('nb_dirigents').value = company.nb_dirigeants_total;
            document.getElementById('categorie_juridique').value = company.categorie_juridique;
            document.getElementById('adresse').value = company.siege.adresse_ligne_1;
            document.getElementById('code_postal').value = company.siege.code_postal;
            document.getElementById('ville').value = company.siege.ville;
            document.getElementById('code_naf').value = company.code_naf;
            document.getElementById('code_nace').value = company.code_naf;
            document.getElementById('nic').value = company.siege.nic;
            document.getElementById('nic_siege').value = company.siege.nic;
            document.getElementById('date_creation').value = company.date_creation;
            document.getElementById('date_radiation').value = company.date_radiation;
        }
    </script>
@endsection
