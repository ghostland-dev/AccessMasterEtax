@extends('layouts.signed')
@section('main')
    <div class="p-4 ">
        <form>
            <!-- 2 column grid layout with text inputs for the first and last names -->
            <h4 class="my-3 text-xl w-full  mx-auto  text-emerald-400 text-center bg-slate-50 p-3 rounded-md"> Ajouter un
                nouveau code NAF </h4>

            <div class=" grid grid-cols-1 ">
                <div class="form-outline">

                    <div class="flex items-center justify-center my-3 w-full">
                        <label for="dropzone-file"
                            class="flex flex-col items-center justify-center w-full h-40 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                <i class="w-10 h-10 mb-3 text-gray-400 fa fa-upload fa-2x"></i>
                                <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">cliquez
                                        ici pour téléverser ou glisser un fichier</span> or drag and drop</p>
                                <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX.
                                    800x400px)</p>
                            </div>
                            <input id="dropzone-file" type="file" name="logo" class="hidden" />
                        </label>
                    </div>

                </div>
            </div>
            <div class="grid lg:grid-cols-3 md:grid-cols-2 sm:grid-cols-1 gap-2">


                <div class=" ">
                    <div class="form-outline">
                        <label class="form-label" for="nom_fournisseur">Last name</label>
                        <input type="text" id="nom_fournisseur" name="nom_fournisseur" class="form-control" />
                    </div>
                </div>
                <div class=" ">
                    <div class="form-outline">
                        <label class="form-label" for="contact">Titre</label>
                        <input type="text" id="contact" name="contact" class="form-control" />
                    </div>
                </div>
                <div class=" ">
                    <div class="form-outline">
                        <label class="form-label" for="email">E-mail</label>
                        <input type="email" id="email" name="email" class="form-control" />
                    </div>
                </div>
                <div class=" ">
                    <div class="form-outline">
                        <label class="form-label" for="tel">Téléphone</label>
                        <input type="tel" id="tel" name="tel" class="form-control" />
                    </div>
                </div>
                <div class=" ">
                    <div class="form-outline">
                        <label class="form-label" for="tel">Adresse</label>

                        <textarea name="address" id="" cols="30" rows="10" class="form-text"></textarea>
                    </div>
                </div>
                <div class=" ">
                    <div class="form-outline">
                        <label class="form-label" for="ville">Téléphone</label>
                        <input type="text" id="ville" name="ville" class="form-control" />
                    </div>
                </div>
                <div class=" ">
                    <div class="form-outline">
                        <label class="form-label" for="ville">Téléphone</label>
                        <input type="check" id="ville" name="ville" class="form-control" />
                    </div>
                </div>

                <div class=" ">
                    <div class="form-outline">
                        <label class="form-label" for="zip_code">cODE pOSTAL</label>
                        <input type="check" id="zip_code" name="zip_code" class="form-control" />
                    </div>
                </div>

                <div class=" ">
                    <div class="form-outline">
                        <label class="form-label" for="pays">pAYS</label>
                        <input type="check" id="pays" name="pays" class="form-control" />
                    </div>
                </div>

                <div class=" ">
                    <div class="form-outline">
                        <label class="form-label" for="siret">SIRET</label>
                        <input type="check" id="siret" name="siret" class="form-control" />
                    </div>
                </div>
                <div class=" ">
                    <div class="form-outline">
                        <label class="form-label" for="energie">Statut</label>

                    </div>
                </div>
                <div class=" ">
                    <label class="relative inline-flex items-center mb-4 cursor-pointer">
                        <input type="checkbox" value="fournisseur_electrcite" name="" class="sr-only peer">
                        <div
                            class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-emerald-300 dark:peer-focus:ring-emerald-800 dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-emerald-600">
                        </div>
                        <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">Fournisseur de
                            d'éléctrcité</span>
                    </label>
                </div>

                <div class=" ">
                    <label class="relative inline-flex items-center mb-4 cursor-pointer">
                        <input type="checkbox" value="fournisseur_gaz" name="" class="sr-only peer">
                        <div
                            class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-emerald-300 dark:peer-focus:ring-emerald-800 dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-emerald-600">
                        </div>
                        <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">Fournisseur de gaz</span>
                    </label>
                </div>



                <!-- Checkbox -->

            </div>

            <!-- Submit button -->
            <button type="submit" class="btn btn-primary btn-block  ">Créer</button>
        </form>

    </div>
@endsection
