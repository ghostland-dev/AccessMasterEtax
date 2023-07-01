@extends('layouts.pipeline')
@section('pipeline')
      @include('layouts.partials.timeline',['step'=>Auth::user()->etape ?? 4])



    <div class="  centred bg-light">
        <div class="container     pt-4  ">
            <div class="row justify-content-center">
                <div class="col-md-7">
                    <div class="card ">
                        <h5 class="card-header bg-success text-center text-white">{{ __('Documents à fournir') }}</h5>

                        <div class="card-body p-4">
                            <form method="POST" action="{{ route('ValidationCSPE') }}" enctype="multipart/form-data">
                                @csrf
                                @method('POST')


                                <div class="form-group">
                                    <label class="file-label bg-slate-50 rounded-md p-2 my-2"> <i
                                            class="fa fa-file-pdf fa-2x mx-2"></i>
                                        Bilans Comptables (2 an)

                                    </label>
                                    <input class="form-control" type="file" name="bilans" accept=".pdf" multiple>
                                </div>

                                <div class="form-group">
                                    <label class="file-label bg-slate-50 rounded-md p-2 my-2"> <i
                                            class="fa fa-file-pdf fa-2x mx-2"></i>
                                        CERFA - la valeur ajoutée:

                                    </label>
                                    <input class="form-control" type="file" name="valeur_ajoutee" accept=".pdf">
                                </div>



                                <div class="form-group">
                                    <label class="file-label bg-slate-50 rounded-md p-2 my-2"> <i
                                            class="fa fa-file-pdf fa-2x mx-2"></i>
                                        RIB

                                    </label>
                                    <input class="form-control" type="file" name="rib_entreprise" accept=".pdf">
                                </div>

                                <div class="form-group">
                                    <label class="file-label bg-slate-50 rounded-md p-2 my-2"> <i
                                            class="fa fa-file-pdf fa-2x mx-2"></i>
                                        KBIS

                                    </label>
                                    <input class="form-control" type="file" name="kabis" accept=".pdf">
                                </div>

                                <div class="form-group">
                                    <label class="file-label bg-slate-50 rounded-md p-2 my-2"> <i
                                            class="fa fa-file-pdf fa-2x mx-2"></i>
                                        Contrat de préstation

                                    </label>
                                    <input class="form-control" type="file" name="contrat_de_prestation" accept=".pdf">
                                </div>

                                <div class="form-group">
                                    <label class="file-label bg-slate-50 rounded-md p-2 my-2"> <i
                                            class="fa fa-file-pdf fa-2x mx-2"></i>
                                        Attestation manuscrite (signée)

                                    </label>
                                    <input class="form-control" type="file" name="courrier_cerfa" accept=".pdf">
                                </div>

                                <div class="form-group">
                                    <label class="file-label bg-slate-50 rounded-md p-2 my-2"> <i
                                            class="fa fa-file-pdf fa-2x mx-2"></i>
                                        Mandataire ou Pouvoir

                                    </label>
                                    <input class="form-control" type="file" name="pouvoir_jdmp" accept=".pdf">
                                </div>

                                <div class="form-group">
                                    <label class="file-label bg-slate-50 rounded-md p-2 my-2"> <i
                                            class="fa fa-file-pdf fa-2x mx-2"></i>
                                        CGV Access Energies

                                    </label>
                                    <input class="form-control" type="file" name="cgv_access_anergies" accept=".pdf">
                                </div>


                                <div class="form-group form-group my-2 row ">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-success">
                                            {{ __('Envoyer mes documents') }}
                                        </button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="card">
                        <h5 class="card-header bg-success text-center text-white">{{ __('Statut de dossier') }}</h5>

                        <ul class="gap-2 p-4">

                            <li class="bg-light-warning text-warning   p-3 my-2" id="bilans">

                                <i class="fa bg-warning text-white rounded-circle px-2 py-1 m-1 fa-times"
                                    aria-hidden="true"></i> <strong>Bilans Comptables (2 an) </strong> <span>
                                    {{ __(' Billans comptables des 2 dernieres années ') }}
                                </span>

                            </li>
                            <li class="bg-light-warning text-warning p-3 my-2" id="valeur_ajoutee">

                                <i class="fa bg-warning text-white rounded-circle px-2 py-1 m-1 fa-times"
                                    aria-hidden="true"></i> <strong>CERFA - la valeur ajoutée:</strong> <span>
                                    {{ __(' Merci de fournir ce document signé ') }}
                                </span>

                            </li>

                            <li class="bg-light-warning text-warning p-3 my-2" id="rib_entreprise">

                                <i class="fa bg-warning text-white rounded-circle px-2 py-1 m-1 fa-times"
                                    aria-hidden="true"></i><strong>RIB </strong> <span>
                                    {{ __(' la société qui recevra le remboursement') }}
                                </span>

                            </li>

                            <li class="bg-light-warning text-warning p-3 my-2" id="kabis">

                                <i class="fa bg-warning text-white rounded-circle px-2 py-1 m-1 fa-times"
                                    aria-hidden="true"></i><strong>KBIS </strong> <span>
                                    {{ __(' la société qui recevra le remboursement') }}
                                </span>

                            </li>

                            <li class="bg-light-warning text-warning   p-3 my-2" id="contrat_de_prestation">

                                <i class="fa bg-warning text-white rounded-circle px-2 py-1 m-1 fa-times"
                                    aria-hidden="true"></i> <strong>Contrat de préstation </strong> <span>
                                    {{ __('Merci de fournir ce document signé') }}
                                </span>

                            </li>

                            <li class="bg-light-warning text-warning   p-3 my-2" id="courrier_cerfa">

                                <i class="fa bg-warning text-white rounded-circle px-2 py-1 m-1 fa-times"
                                    aria-hidden="true"></i> <strong>Attestation manuscrite (signée) </strong> <span>
                                    {{ __('Attestation manuscrite de non-répercussion de la taxe ') }}
                                </span>

                            </li>

                            <li class="bg-light-warning text-warning   p-3 my-2" id="pouvoir_jdmp">

                                <i class="fa bg-warning text-white rounded-circle px-2 py-1 m-1 fa-times"
                                    aria-hidden="true"></i> <strong>Mandataire ou Pouvoir </strong> <span>
                                    {{ __('Merci de fournir ce document signé et écrit en main') }}
                                </span>

                            </li>

                            <li class="bg-light-warning text-warning   p-3 my-2" id="cgv_access_anergies">

                                <i class="fa bg-warning text-white rounded-circle px-2 py-1 m-1 fa-check"
                                    aria-hidden="true"></i> <strong>CGV Access Energies </strong> <span>
                                    {{ __('Merci de fournir ce document signé et écrit en main') }}
                                </span>

                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
        // Add an event listener to all file inputs
        const fileInputs = document.querySelectorAll('.form-control');
        fileInputs.forEach(fileInput => {
            fileInput.addEventListener('change', function() {
                // Check if a file is selected
                if (this.files.length > 0) {
                    // Find the corresponding status element based on the name attribute of the file input
                    const statusElement = document.querySelector(`#${this.name}`);
                    const statusElementIcon = document.querySelector(`#${this.name} > i`);
                    // Update the status element text


                    // Optionally, you can also update the CSS class of the status element to indicate a successful upload
                    statusElement.classList.remove('bg-light-warning', 'text-warning');
                    statusElementIcon.classList.remove('fa-times', 'bg-warning');
                    statusElement.classList.add('bg-success', 'text-white');
                    statusElementIcon.classList.add('fa-check', 'bg-dark');
                }
            });
        });
    </script>
@endsection
