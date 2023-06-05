@extends('layouts.signed')
@section('main')
    <form action="{{ route('baseDoc.store') }}" method="POST" enctype="multipart/form-data"
        class="d-flex justify-content-around flex-wrap" id="ElecBillForm">
        @csrf
        @method('POST')


        <div class="container-fluid  ">

            <div class="grid gap-3 grid-cols-1 lg:grid-cols-2 md:grid-cols-2 sm:grid-cols-1  ">

                <div class="file btn btn-success is-boxed w-100">
                    <label class="file-label w-100">
                        <input class="file-input w-100" type="file" name="cgv_access_anergies">
                        <span class="bg-emerlad-400 text-white text-center">
                            <span class=" ">
                                <i class="fas fa-cloud-upload-alt fa-2x mx-auto"></i>
                            </span>
                            <span class="file-label  ">
                                Téléverser CGV Access Energies
                            </span>
                        </span>
                    </label>
                </div>

                <div class="file btn btn-success is-boxed w-100">
                    <label class="file-label w-100">
                        <input class="file-input w-100" type="file" name="rib_entreprise">
                        <span class="bg-emerlad-400 text-white text-center">
                            <span class=" ">
                                <i class="fas fa-cloud-upload-alt fa-2x mx-auto"></i>
                            </span>
                            <span class="file-label  ">
                                Téléverser RIB d'entreprise
                            </span>
                        </span>
                    </label>
                </div>

                <div class="file btn btn-success is-boxed w-100">
                    <label class="file-label w-100">
                        <input class="file-input w-100" type="file" name="kabis">
                        <span class="bg-emerlad-400 text-white text-center">
                            <span class=" ">
                                <i class="fas fa-cloud-upload-alt fa-2x mx-auto"></i>
                            </span>
                            <span class="file-label  ">
                                Téléverser KABIS
                            </span>
                        </span>
                    </label>
                </div>

                <div class="file btn btn-success is-boxed w-100">
                    <label class="file-label w-100">
                        <input class="file-input w-100" type="file" name="bilan_comptable_1">
                        <span class="bg-emerlad-400 text-white text-center">
                            <span class=" ">
                                <i class="fas fa-cloud-upload-alt fa-2x mx-auto"></i>
                            </span>
                            <span class="file-label  ">
                                Téléverser Bilan comptable 1 année
                            </span>
                        </span>
                    </label>
                </div>

                <div class="file btn btn-success is-boxed w-100">
                    <label class="file-label w-100">
                        <input class="file-input w-100" type="file" name="bilan_comptable_2">
                        <span class="bg-emerlad-400 text-white text-center">
                            <span class=" ">
                                <i class="fas fa-cloud-upload-alt fa-2x mx-auto"></i>
                            </span>
                            <span class="file-label  ">
                                Téléverser Bilan comptable 2 année
                            </span>
                        </span>
                    </label>
                </div>

                <div class="file btn btn-success is-boxed w-100">
                    <label class="file-label w-100">
                        <input class="file-input w-100" type="file" name="annexe_1">
                        <span class="bg-emerlad-400 text-white text-center">
                            <span class=" ">
                                <i class="fas fa-cloud-upload-alt fa-2x mx-auto"></i>
                            </span>
                            <span class="file-label  ">
                                Téléverser Annexe 01
                            </span>
                        </span>
                    </label>
                </div>

                <div class="file btn btn-success is-boxed w-100">
                    <label class="file-label w-100">
                        <input class="file-input w-100" type="file" name="annexe_2">
                        <span class="bg-emerlad-400 text-white text-center">
                            <span class=" ">
                                <i class="fas fa-cloud-upload-alt fa-2x mx-auto"></i>
                            </span>
                            <span class="file-label  ">
                                Téléverser Annexe 02
                            </span>
                        </span>
                    </label>
                </div>

                <div class="file btn btn-success is-boxed w-100">
                    <label class="file-label w-100">
                        <input class="file-input w-100" type="file" name="courrier_type">
                        <span class="bg-emerlad-400 text-white text-center">
                            <span class=" ">
                                <i class="fas fa-cloud-upload-alt fa-2x mx-auto"></i>
                            </span>
                            <span class="file-label  ">
                                Téléverser Courier type
                            </span>
                        </span>
                    </label>
                </div>

                <div class="file btn btn-success is-boxed w-100">
                    <label class="file-label w-100">
                        <input class="file-input w-100" type="file" name="confirmation_douanaire">
                        <span class="bg-emerlad-400 text-white text-center">
                            <span class=" ">
                                <i class="fas fa-cloud-upload-alt fa-2x mx-auto"></i>
                            </span>
                            <span class="file-label  ">
                                Téléverser Confirmation douanaire
                            </span>
                        </span>
                    </label>
                </div>

                <div class="file btn btn-success is-boxed w-100">
                    <label class="file-label w-100">
                        <input class="file-input w-100" type="file" name="fichier_entreprise">
                        <span class="bg-emerlad-400 text-white text-center">
                            <span class=" ">
                                <i class="fas fa-cloud-upload-alt fa-2x mx-auto"></i>
                            </span>
                            <span class="file-label  ">
                                Téléverser fichier d'entreprise
                            </span>
                        </span>
                    </label>
                </div>

                <div class="file btn btn-success is-boxed w-100">
                    <label class="file-label w-100">
                        <input class="file-input w-100" type="file" name="valeur_ajoutee">
                        <span class="bg-emerlad-400 text-white text-center">
                            <span class=" ">
                                <i class="fas fa-cloud-upload-alt fa-2x mx-auto"></i>
                            </span>
                            <span class="file-label  ">
                                Téléverser valeur ajoutée
                            </span>
                        </span>
                    </label>
                </div>

                <!-- Text input -->
                <div class="group-form  mb-4">
                    <label class="form-label" for="base_folder_id">Doosier de base</label>
                    <input type="number" id="base_folder_id" name="base_folder_id" class="form-control" />

                </div>






            </div>
            <div class="field col-md-12 is-grouped my-4">
                <div class="control">
                    <button class="btn btn-success" type="submit">Créer</button>
                </div>
                <div class="control">
                    <button class="btn btn-success" type="reset">Annuler</button>
                </div>
            </div>

        </div>
    </form>
@endsection
