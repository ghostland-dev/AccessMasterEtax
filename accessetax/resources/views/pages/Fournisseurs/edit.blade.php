@extends('layouts.signed')
@section('main')
    <div class="p-4 ">
        <form class="form" action="{{ route('supplier.update', $fournisseur->id) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <h4 class="my-3 text-xl w-full  mx-auto  text-emerald-400 text-center bg-slate-50 p-3 rounded-md"> Modifier le
                fournisseur </h4>

            <div class=" grid grid-cols-2 lg:grid-cols-2 md:grid-cols-2 sm:grid-cols-1 gap-2  ">
                <div class="form-outline  ">

                    <div class="flex items-center justify-center my-3 w-full">
                        <label for="dropzone-file"
                            class="flex flex-col items-center justify-center w-full h-40 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-400 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                <i class="w-10 h-10 mb-3 text-gray-400 fa fa-upload fa-2x"></i>
                                <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">cliquez
                                        ici pour téléverser ou glisser un fichier</span> or drag and drop</p>
                                <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX.
                                    400x400px)</p>
                            </div>
                            <input id="dropzone-file" type="file" name="logo" class="hidden"
                                />
                        </label>
                    </div>

                </div>
                <div class="mx-auto">
                    <img src="{{ $fournisseur->logo }}" alt="logo" class="h-[160px] rounded-md  my-3 w-fit">
                </div>
            </div>
            <div class="grid lg:grid-cols-3 md:grid-cols-2 sm:grid-cols-1 gap-2 shadow p-4">


                <div class=" ">
                    <div class="form-outline">
                        <label class="form-label" for="nom_fournisseur">Nom de fournisseur</label>
                        <input type="text" id="nom_fournisseur" name="nom_fournisseur"
                            value="{{ $fournisseur->nom_fournisseur }}" class="form-control" placeholder="ex: Engie" />
                    </div>
                </div>
                <div class=" ">
                    <div class="form-outline">
                        <label class="form-label" for="contact">Nom contact</label>
                        <input type="text" id="contact" name="contact" value="{{ $fournisseur->contact }}"
                            class="form-control" placeholder="ex: Mr.ALpha  X" />
                    </div>
                </div>
                <div class=" ">
                    <div class="form-outline">
                        <label class="form-label" for="email">E-mail</label>
                        <input type="email" id="email" name="email" value="{{ $fournisseur->email }}"
                            class="form-control" placeholder="ex: exemple@domian.fr" />
                    </div>
                </div>
                <div class=" ">
                    <div class="form-outline">
                        <label class="form-label" for="tel">Téléphone</label>
                        <input type="tel" id="tel" name="tel" value="{{ $fournisseur->tel }}"
                            class="form-control" placeholder="ex: 02 00 00 00 00" />
                    </div>
                </div>
                <div class=" ">
                    <div class="form-outline">
                        <label class="form-label" for="address">Adresse</label>
                        <input type="text" id="address" name="address" value="{{ $fournisseur->address }}"
                            class="form-control" placeholder="ex: 13 rue des boulvard" />
                    </div>
                </div>
                <div class=" ">
                    <div class="form-outline">
                        <label class="form-label" for="ville">Ville</label>
                        <input type="text" id="ville" name="ville" value="{{ $fournisseur->ville }}"
                            class="form-control" placeholder="ex: Rouen" />
                    </div>
                </div>


                <div class=" ">
                    <div class="form-outline">
                        <label class="form-label" for="zip_code">Code postal</label>
                        <input type="check" id="zip_code" name="zip_code" value="{{ $fournisseur->zip_code }}"
                            class="form-control" placeholder="ex: 15542" />
                    </div>
                </div>

                <div class=" ">
                    <div class="form-outline">
                        <label class="form-label" for="country">Pays</label>
                        <input type="check" id="country" name="country" value="{{ $fournisseur->country }}"
                            class="form-control" placeholder="ex: France" />
                    </div>
                </div>

                <div class=" ">
                    <div class="form-outline">
                        <label class="form-label" for="siret">SIRET</label>
                        <input type="check" id="siret" name="siret" value="{{ $fournisseur->siret }}"
                            class="form-control" placeholder="ex: 078451245" />
                    </div>
                </div>
                <div class=" ">
                    <div class="form-outline">
                        <label class="form-label" for="energie">Statut</label>
                        <input type="number" id="energie" name="energie" value="{{ $fournisseur->energie }}"
                            class="form-control" placeholder="ex: 3" />
                    </div>
                </div>
                <div class="my-4 ">
                    <label class="relative inline-flex items-center mb-4 cursor-pointer">
                        <input type="checkbox" name="fournisseur_electrcite"
                            {{ $fournisseur->fournisseur_electrcite ? 'checked' : '' }} class="sr-only peer">
                        <div
                            class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-emerald-300 dark:peer-focus:ring-emerald-400 dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-emerald-600">
                        </div>
                        <span class="ml-3 text-sm   font-bold text-gray-400 dark:text-gray-300">Fournisseur de
                            d'éléctrcité</span>
                    </label>
                </div>

                <div class="my-4 ">
                    <label class="relative inline-flex items-center mb-4 cursor-pointer">
                        <input type="checkbox" name="fournisseur_gaz"
                            {{ $fournisseur->nom_fournisseur ? 'checked' : '' }} class="sr-only peer">
                        <div
                            class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-emerald-300 dark:peer-focus:ring-emerald-400 dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-emerald-600">
                        </div>
                        <span class="ml-3 text-sm   font-bold text-gray-400 dark:text-gray-300">Fournisseur de gaz</span>
                    </label>
                </div>



                <!-- Checkbox -->

            </div>

            <!-- Submit button -->
            <button type="submit" class="btn btn-success px-3 my-3">Mettre à jour</button>
        </form>

    </div>
@endsection
