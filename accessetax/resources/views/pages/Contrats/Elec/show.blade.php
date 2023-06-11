@extends('layouts.signed')
@section('main')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="  bg-success rounded-md p-4 flex justify-between ">
                        <h3 class="text-white">Détail de contrat</h3>
                    </div>
                    <div class=" grid  my-2 gap-2 grid-cols-1 lg:grid-cols-4 md:grid-cols-3 sm:grid-cols-2   text-center ">

                        <div class="flex flex-col card ">
                            <p class=" bg-gray-50 rounded-md p-2 "> <b class="text-success"> Nom de compteur
                                </b> </p>
                            <p> {{ $contratElec->numero_compteur }} </p>
                        </div>
                        <div class="flex flex-col card ">
                            <p class=" bg-gray-50 rounded-md p-2 "> <b class="text-success"> N° Clinet </b>
                            </p>
                            <p> {{ $contratElec->numero_client }}</p>
                        </div>
                        <div class="flex flex-col card ">
                            <p class=" bg-gray-50 rounded-md p-2 "> <b class="text-success"> Fournisseur
                                </b>
                            </p>
                            <p> {{ $contratElec->fournisseur }}</p>
                        </div>

                        <div class="flex flex-col card ">
                            <p class=" bg-gray-50 rounded-md p-2 "> <b class="text-success"> Année </b></p>
                            <p> {{ $contratElec->annee }}</p>
                        </div>
                        <div class="flex flex-col card ">
                            <p class=" bg-gray-50 rounded-md p-2 "> <b class="text-success"> Consommation </b></p>
                            <p> {{ $contratElec->consommation }}</p>
                        </div>
                        <div class="flex flex-col card ">
                            <p class=" bg-gray-50 rounded-md p-2 "> <b class="text-success"> Date début</b>
                            </p>
                            <p> Debut: {{ $contratElec->date_debut }}</p>

                            </p>
                        </div>
                        <div class="flex flex-col card ">
                            <p class=" bg-gray-50 rounded-md p-2 "> <b class="text-success"> Date fin </b>
                            </p>

                            <p> Fin :{{ $contratElec->date_fin }}
                            </p>
                        </div>

                    </div>






                    <div class=" grid gap-3 grid-cols-1 lg:grid-cols-1 md:grid-cols-1 sm:grid-cols-1   text-center ">
                        <object data="{{ $contratElec->fichier }}" type="application/pdf" width="100%" height="500px">
                            <p>Incapable d'afficher ce type de fichier <a class="btn btn-success"
                                    href="{{ $contratElec->fichier }}">Télécharger</a>
                                pour visualuser.</p>
                        </object>

                    </div>

                </div>

            </div>

            <div class="grid grid-cols-1 lg:grid-cols-1 md:grid-cols-1 sm:grid-cols-1  ">
                <div class="shadow  ">
                    <div class="card-body">


                        <div class="  bg-success rounded-md p-4 flex justify-between ">
                            <h3 class="text-white">liste des factures d'éléctrcité Asoccié</h3>
                            <a href="{{ route('contractElec.show', $contratElec->elecMeter->id) }}"
                                class="bg-slate-50 p-2 rounded-full text-white"><i
                                    class=" text-emerald-400 fa fa-eye"></i></a>
                        </div>



                        <table class="table align-middle   mb-0 bg-white">
                            <a href="{{ route('billsElec.create') }}" class="btn btn-success m-3 ">
                                + Nouvelle facture d'éléctrcité
                            </a>
                            <thead class="bg-light   ">
                                <tr class="text-align-center">
                                    <th scope="col">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value=""
                                                id="flexCheckDefault" />
                                        </div>
                                    </th>
                                    <th>N° Facture</th>
                                    <th>Fournisseur</th>
                                    <th>Consommation</th>
                                    <th>Période </th>
                                    <th>Année </th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($contratElec->bills as $facture)
                                    <tr>
                                        <th scope="row">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value=""
                                                    id="flexCheckDefault" />
                                            </div>
                                        </th>
                                        <td>
                                            <div class="d-flex align-items-start">

                                                <div class="ms-3">
                                                    <p class="fw-bold mb-1">
                                                        {{ $facture->numero_facture }}</p>

                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-start">
                                                <div class="ms-3">
                                                    <p class="fw-bold mb-1">
                                                        <span class=" ">
                                                            {{ $facture->fournisseur }} </span>
                                                    </p>
                                                </div>
                                            </div>
                                        </td>

                                        <td>
                                            <div class="d-flex align-items-start">
                                                <div class="ms-3">
                                                    <p class="fw-bold  my-2">
                                                        <span class="bg-light  px-3 py-2 text-bold  rounded-2 text-success">
                                                            {{ $facture->consommation }} €/kw</span>
                                                    </p>
                                                </div>
                                            </div>
                                        </td>

                                        <td class="   text-center">
                                            <p class="text-muted mb-0">
                                                <span class="text-light ">
                                                    <p class="fw-bold  my-2">
                                                        <span
                                                            class="text-danger bg-light  my-2  px-3 py-2 text-bold  rounded-2">
                                                            {{ $facture->date_debut }} </span> <i
                                                            class="fa fa-arrow-right"></i>
                                                        <span
                                                            class="text-success bg-light  my-2 px-3 py-2 text-bold  rounded-2">
                                                            {{ $facture->date_fin }}</span>
                                                    </p>
                                                </span>
                                            </p>

                                        </td>

                                        <td>{{ $facture->annee }}</td>
                                        <td>
                                            <a class="btn btn-dark" href="{{ $facture->fichier }}" download><i
                                                    class="fa fa-download text-white"></i></a>
                                            <div class="dropdown">
                                                <button class="btn btn-success dropdown-toggle" type="button"
                                                    id="actionsDropdown{{ $facture->id }}" data-bs-toggle="dropdown"
                                                    aria-expanded="true">
                                                    <i class="fa fa-cog"></i>
                                                </button>
                                                <ul class="dropdown-menu"
                                                    aria-labelledby="actionsDropdown{{ $facture->id }}">
                                                    <li><a class="dropdown-item"
                                                            href="{{ route('billsElec.show', $facture->id) }}"
                                                            rel="noopener noreferrer"><i class="fa fa-eye"></i>
                                                            Détails</a></li>
                                                    <li><a class="dropdown-item"
                                                            href="{{ route('billsElec.edit', $facture->id) }}"
                                                            rel="noopener noreferrer"><i class="fa fa-pen"></i>
                                                            Modifier</a></li>
                                                    <li>
                                                        <form method="POST"
                                                            action="{{ route('billsElec.destroy', $facture->id) }}">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="dropdown-item"><i
                                                                    class="fa fa-trash"></i>
                                                                Supprimer</button>
                                                        </form>
                                                    </li>
                                                </ul>
                                            </div>

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>



                    </div>

                </div>
            </div>

        </div>
        <a href="{{ route('contractElecs') }}" class="btn btn-success my-2 mw-3"> <i
                class="fa fa-arrow-circle-left"></i></a>
    </div>
    </div>
@endsection
