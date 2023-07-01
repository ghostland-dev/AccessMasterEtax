@extends('layouts.signed')
@section('main')
    <form action="{{ route('genFold.update', $DossierGen->id) }}" method="POST" enctype="multipart/form-data"
        class="d-flex justify-content-around flex-wrap" id="DossierDeBase">
        @csrf
        @method('PUT')


        <div class="container-fluid  ">

            <div class="grid gap-3 grid-cols-1 lg:grid-cols-2 md:grid-cols-2 sm:grid-cols-1  ">


                <div class=" space-y-2    ">
                    <label for="numero_dossier">N° de dossier</label>
                    <input type="text" name="numero_dossier" id="numero_dossier" class="form-control"
                        placeholder="N° de dossier ... " required>
                </div>

                <div class=" space-y-2    ">
                    <label for="nom_dossier">Nom de dossier</label>
                    <input type="text" name="nom_dossier" id="nom_dossier" class="form-control"
                        placeholder="N° de dossier ... " required>
                </div>

                <div class=" space-y-2    ">
                    <label for="statut_dossier">Statut de dossier</label>
                    <select name="statut_dossier" id="statut_dossier" class="form-control"
                        placeholder="statut de dossier ... " required>
                        <option>Selectionnez le statut de dossier </option>
                        <option {{ $DossierGen->statut_dossier == 'en attente' ? 'checked' : '' }} value="en attente">En
                            Attente </option>
                        <option {{ $DossierGen->statut_dossier == 'en cours' ? 'checked' : '' }} value="en cours">En cours
                        </option>
                        <option {{ $DossierGen->statut_dossier == 'traité' ? 'checked' : '' }} value="traité">Traité
                        </option>
                        <option {{ $DossierGen->statut_dossier == 'prêt à envoyé' ? 'checked' : '' }} value="prêt à envoyé">
                            Prêt à envoyé</option>
                        <option {{ $DossierGen->statut_dossier == 'envoyé' ? 'checked' : '' }} value="envoyé">Envoyé
                        </option>
                        <option {{ $DossierGen->statut_dossier == 'confirmé' ? 'checked' : '' }} value="confirmé">Confirmé
                        </option>
                        <option {{ $DossierGen->statut_dossier == 'finalisé' ? 'checked' : '' }} value="finalisé">Finalisé
                        </option>
                        <option {{ $DossierGen->statut_dossier == 'réglé' ? 'checked' : '' }} value="réglé">Réglé </option>
                    </select>
                </div>

                <div class=" space-y-2    ">
                    <label for="base_folder_id">Dossier de base</label>
                    <select name="base_folder_id" id="base_folder_id" class="form-control"
                        placeholder="statut de dossier ... " required>
                        <option>Selectionnez le statut de dossier </option>
                        @foreach ($DossiersBase as $dossier)
                            <option {{ $DossierGen->base_folder_id == $dossier->id ? 'checked' : '' }} value="id">
                                {{ $dossier->nom_dossier }} </option>
                        @endforeach


                    </select>
                </div>



                <div class="file btn btn-success is-boxed w-100">
                    <label class="file-label w-100">
                        <input class="file-input w-100" type="file" name="attestation_non_rembourse">
                        <span class="bg-emerlad-400 text-white text-center">
                            <span class=" ">
                                <i class="fas fa-cloud-upload-alt fa-2x mx-auto"></i>
                            </span>
                            <span class="file-label  ">
                                Téléverser Attest. Non Rembouresment


                            </span>
                        </span>
                    </label>
                </div>

                <div class="file btn btn-success is-boxed w-100">
                    <label class="file-label w-100">
                        <input class="file-input w-100" type="file" name="pouvoir_client">
                        <span class="bg-emerlad-400 text-white text-center">
                            <span class=" ">
                                <i class="fas fa-cloud-upload-alt fa-2x mx-auto"></i>
                            </span>
                            <span class="file-label  ">
                                Téléverser Pouvoir CLIENT
                            </span>
                        </span>
                    </label>
                </div>

                <div class="file btn btn-success is-boxed w-100">
                    <label class="file-label w-100">
                        <input class="file-input w-100" type="file" name="contrat_de_prestation">
                        <span class="bg-emerlad-400 text-white text-center">
                            <span class=" ">
                                <i class="fas fa-cloud-upload-alt fa-2x mx-auto"></i>
                            </span>
                            <span class="file-label  ">
                                Téléverser Contrat De Préstation
                            </span>
                        </span>
                    </label>
                </div>

                <div class="file btn btn-success is-boxed w-100">
                    <label class="file-label w-100">
                        <input class="file-input w-100" type="file" name="demande_rembourse">
                        <span class="bg-emerlad-400 text-white text-center">
                            <span class=" ">
                                <i class="fas fa-cloud-upload-alt fa-2x mx-auto"></i>
                            </span>
                            <span class="file-label  ">
                                Téléverser Demande De Rembouresment
                            </span>
                        </span>
                    </label>
                </div>

                <div class="file btn btn-success is-boxed w-100">
                    <label class="file-label w-100">
                        <input class="file-input w-100" type="file" name="courrier_cerfa">
                        <span class="bg-emerlad-400 text-white text-center">
                            <span class=" ">
                                <i class="fas fa-cloud-upload-alt fa-2x mx-auto"></i>
                            </span>
                            <span class="file-label  ">
                                Téléverser Courrier Cerfa
                            </span>
                        </span>
                    </label>
                </div>

                <div class="file btn btn-success is-boxed w-100">
                    <label class="file-label w-100">
                        <input class="file-input w-100" type="file" name="client_cerfa_14317_07">
                        <span class="bg-emerlad-400 text-white text-center">
                            <span class=" ">
                                <i class="fas fa-cloud-upload-alt fa-2x mx-auto"></i>
                            </span>
                            <span class="file-label  ">
                                Téléverser CLIENT Cerfa 14317-07
                            </span>
                        </span>
                    </label>
                </div>

                <div class="file btn btn-success is-boxed w-100">
                    <label class="file-label w-100">
                        <input class="file-input w-100" type="file" name="client_cerfa_14318_08">
                        <span class="bg-emerlad-400 text-white text-center">
                            <span class=" ">
                                <i class="fas fa-cloud-upload-alt fa-2x mx-auto"></i>
                            </span>
                            <span class="file-label  ">
                                Téléverser CLIENT Cerfa 14318-08
                            </span>
                        </span>
                    </label>
                </div>

                <div class="file btn btn-success is-boxed w-100">
                    <label class="file-label w-100">
                        <input class="file-input w-100" type="file" name="client_cerfa_14700_03">
                        <span class="bg-emerlad-400 text-white text-center">
                            <span class=" ">
                                <i class="fas fa-cloud-upload-alt fa-2x mx-auto"></i>
                            </span>
                            <span class="file-label  ">
                                Téléverser CLIENT Cerfa 14700-03
                            </span>
                        </span>
                    </label>
                </div>

                <div class="file btn btn-success is-boxed w-100">
                    <label class="file-label w-100">
                        <input class="file-input w-100" type="file" name="client_pouvoir_ae">
                        <span class="bg-emerlad-400 text-white text-center">
                            <span class=" ">
                                <i class="fas fa-cloud-upload-alt fa-2x mx-auto"></i>
                            </span>
                            <span class="file-label  ">
                                CLIENT Pouvoir Voltaria
                            </span>
                        </span>
                    </label>
                </div>

                <div class="file btn btn-success is-boxed w-100">
                    <label class="file-label w-100">
                        <input class="file-input w-100" type="file" name="proposition_service">
                        <span class="bg-emerlad-400 text-white text-center">
                            <span class=" ">
                                <i class="fas fa-cloud-upload-alt fa-2x mx-auto"></i>
                            </span>
                            <span class="file-label  ">
                                Téléverser Proposition De Service
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








            </div>
            <div class="field col-md-12 is-grouped my-4">
                <div class="control">
                    <button class="btn btn-success" type="submit">mettre à jour</button>
                </div>
                <div class="control">
                    <button class="btn btn-success" type="reset">Annuler</button>
                </div>
            </div>

        </div>
    </form>
@endsection
