@extends('layouts.signed')
@section('main')
    <form action="{{ route('baseDoc.store') }}" method="POST" enctype="multipart/form-data"
        class="d-flex justify-content-around flex-wrap" id="ElecBillForm">
        @csrf
        @method('POST')


        <div class="container-fluid  ">

            <div class="grid gap-3 grid-cols-1 lg:grid-cols-2 md:grid-cols-2 sm:grid-cols-1  ">

                <div class="file bg-slate-600 p-2 rounded-md is-boxed w-100">
                    <label class="file-label w-100">
                        <input class="file-input w-100" type="file" value="{{ $BaseDoc->cgv_access_anergies }}"
                            name="cgv_access_anergies">
                        <span class="flex justify-between px-3 text-white text-center">
                            <span class=" ">
                                <i class="fas fa-cloud-upload-alt  mx-auto text-emerald-400"></i>
                            </span>
                            <span class="file-label  ">
                                Téléverser CGV Voltaria
                            </span>
                        </span>
                    </label>
                </div>

                <div class="file bg-slate-600 p-2 rounded-md is-boxed w-100">
                    <label class="file-label w-100">
                        <input class="file-input w-100" type="file" value="{{ $BaseDoc->rib_entreprise }}"
                            name="rib_entreprise">
                        <span class="flex justify-between px-3 text-white text-center">
                            <span class=" ">
                                <i class="fas fa-cloud-upload-alt  mx-auto text-emerald-400"></i>
                            </span>
                            <span class="file-label  ">
                                Téléverser RIB d'entreprise
                            </span>
                        </span>
                    </label>
                </div>

                <div class="file bg-slate-600 p-2 rounded-md is-boxed w-100">
                    <label class="file-label w-100">
                        <input class="file-input w-100" type="file" value="{{ $BaseDoc->kabis }}" name="kabis">
                        <span class="flex justify-between px-3 text-white text-center">
                            <span class=" ">
                                <i class="fas fa-cloud-upload-alt  mx-auto text-emerald-400"></i>
                            </span>
                            <span class="file-label  ">
                                Téléverser KABIS
                            </span>
                        </span>
                    </label>
                </div>

                <div class="file bg-slate-600 p-2 rounded-md is-boxed w-100">
                    <label class="file-label w-100">
                        <input class="file-input w-100" type="file" value="{{ $BaseDoc->bilan_comptable_1 }}"
                            name="bilan_comptable_1">
                        <span class="flex justify-between px-3 text-white text-center">
                            <span class=" ">
                                <i class="fas fa-cloud-upload-alt  mx-auto text-emerald-400"></i>
                            </span>
                            <span class="file-label  ">
                                Téléverser Bilan comptable 1 année
                            </span>
                        </span>
                    </label>
                </div>

                <div class="file bg-slate-600 p-2 rounded-md is-boxed w-100">
                    <label class="file-label w-100">
                        <input class="file-input w-100" type="file" value="{{ $BaseDoc->bilan_comptable_2 }}"
                            name="bilan_comptable_2">
                        <span class="flex justify-between px-3 text-white text-center">
                            <span class=" ">
                                <i class="fas fa-cloud-upload-alt  mx-auto text-emerald-400"></i>
                            </span>
                            <span class="file-label  ">
                                Téléverser Bilan comptable 2 année
                            </span>
                        </span>
                    </label>
                </div>

                <div class="file bg-slate-600 p-2 rounded-md is-boxed w-100">
                    <label class="file-label w-100">
                        <input class="file-input w-100" type="file" value="{{ $BaseDoc->annexe_1 }}" name="annexe_1">
                        <span class="flex justify-between px-3 text-white text-center">
                            <span class=" ">
                                <i class="fas fa-cloud-upload-alt  mx-auto text-emerald-400"></i>
                            </span>
                            <span class="file-label  ">
                                Téléverser Annexe 01
                            </span>
                        </span>
                    </label>
                </div>

                <div class="file bg-slate-600 p-2 rounded-md is-boxed w-100">
                    <label class="file-label w-100">
                        <input class="file-input w-100" type="file" value="{{ $BaseDoc->annexe_2 }}" name="annexe_2">
                        <span class="flex justify-between px-3 text-white text-center">
                            <span class=" ">
                                <i class="fas fa-cloud-upload-alt  mx-auto text-emerald-400"></i>
                            </span>
                            <span class="file-label  ">
                                Téléverser Annexe 02
                            </span>
                        </span>
                    </label>
                </div>

                <div class="file bg-slate-600 p-2 rounded-md is-boxed w-100">
                    <label class="file-label w-100">
                        <input class="file-input w-100" type="file" value="{{ $BaseDoc->courrier_type }}"
                            name="courrier_type">
                        <span class="flex justify-between px-3 text-white text-center">
                            <span class=" ">
                                <i class="fas fa-cloud-upload-alt  mx-auto text-emerald-400"></i>
                            </span>
                            <span class="file-label  ">
                                Téléverser Courier type
                            </span>
                        </span>
                    </label>
                </div>

                <div class="file bg-slate-600 p-2 rounded-md is-boxed w-100">
                    <label class="file-label w-100">
                        <input class="file-input w-100" type="file" value="{{ $BaseDoc->confirmation_douanaire }}"
                            name="confirmation_douanaire">
                        <span class="flex justify-between px-3 text-white text-center">
                            <span class=" ">
                                <i class="fas fa-cloud-upload-alt  mx-auto text-emerald-400"></i>
                            </span>
                            <span class="file-label  ">
                                Téléverser Confirmation douanaire
                            </span>
                        </span>
                    </label>
                </div>

                <div class="file bg-slate-600 p-2 rounded-md is-boxed w-100">
                    <label class="file-label w-100">
                        <input class="file-input w-100" type="file" value="{{ $BaseDoc->fichier_entreprise }}"
                            name="fichier_entreprise">
                        <span class="flex justify-between px-3 text-white text-center">
                            <span class=" ">
                                <i class="fas fa-cloud-upload-alt  mx-auto text-emerald-400"></i>
                            </span>
                            <span class="file-label  ">
                                Téléverser fichier d'entreprise
                            </span>
                        </span>
                    </label>
                </div>

                <div class="file bg-slate-600 p-2 rounded-md is-boxed w-100">
                    <label class="file-label w-100">
                        <input class="file-input w-100" type="file" value="{{ $BaseDoc->valeur_ajoutee }}"
                            name="valeur_ajoutee">
                        <span class="flex justify-between px-3 text-white text-center">
                            <span class=" ">
                                <i class="fas fa-cloud-upload-alt  mx-auto text-emerald-400"></i>
                            </span>
                            <span class="file-label  ">
                                Téléverser valeur ajoutée
                            </span>
                        </span>
                    </label>
                </div>

                <!-- Text input -->
                <div class="file bg-slate-600 rounded-md is-boxed w-100">
                    {{-- <label class="form-label" for="base_folder_id">Doosier de base</label> --}}
                    <input type="text" id="base_folder_id" name="base_folder_id"
                        class="text-emerald-400 bg-slate-600 w-full rounded-md  " value="{{ $BaseDoc->base_folder_id }}"
                        class="form-control" />

                </div>






            </div>
            <div class="field col-md-12 is-grouped my-4">
                <div class="control">
                    <button class="btn btn-success" type="submit">Mettre à jour</button>
                </div>
                <div class="control">
                    <button class="btn btn-dark p-2 rounded-md" type="reset">Réinitialiser</button>
                </div>
            </div>

        </div>
    </form>
@endsection
