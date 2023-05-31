@extends('layouts.signed')
@section('main')
    <div class="d-flex justify-content-between flex-wrap">
        @foreach ($baseDocuments as $baseDocument)
            <div class="col-md-6">
                <div class="card m-b-30">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <h5 class="card-title mb-0">Important Files</h5>
                            </div>
                            <div class="col-4">
                                <ul class="list-inline-group text-right mb-1 pl-0">
                                    <li class="list-inline-item mr-0 font-12"><i
                                            class="feather icon-more-vertical- font-20 text-primary"></i>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="product-file-type">
                            <ul class="list-unstyled">
                                <li class="media mb-3">

                                    <div class="container-fluid">

                                        <ul class="list-group">
                                            <li class="list-group-item">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <span>CGV Access Energies</span>
                                                    <a href="{{ $baseDocument->cgv_access_anergies }}"
                                                        class="btn btn-success" download><i class="fa fa-download"></i></a>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <span>RIB d'entreprise</span>
                                                    <a href="{{ $baseDocument->rib_entreprise }}" class="btn btn-success"
                                                        download><i class="fa fa-download"></i></a>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <span>KIBIS</span>
                                                    <a href="{{ $baseDocument->kabis }}" class="btn btn-success" download><i
                                                            class="fa fa-download"></i></a>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <span>Billans Comptables</span>
                                                    <div>
                                                        <a href="{{ $baseDocument->bilan_comptable_1 }}"
                                                            class="btn btn-success" download><i
                                                                class="fa fa-download"></i></a>
                                                        <a href="{{ $baseDocument->bilan_comptable_2 }}"
                                                            class="btn btn-success" download><i
                                                                class="fa fa-download"></i></a>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <span>Annexes</span>
                                                    <div>
                                                        <a href="{{ $baseDocument->annexe_1 }}" class="btn btn-success"
                                                            download><i class="fa fa-download"></i></a>
                                                        <a href="{{ $baseDocument->annexe_1 }}" class="btn btn-success"
                                                            download><i class="fa fa-download"></i></a>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <span>Courrier manuscrit</span>
                                                    <a href="{{ $baseDocument->confirmation_douanaire }}"
                                                        class="btn btn-success" download><i class="fa fa-download"></i></a>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <span>Fiche d'entreprise</span>
                                                    <a href="{{ $baseDocument->fichier_entreprise }}"
                                                        class="btn btn-success" download><i class="fa fa-download"></i></a>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <span>Fiche d'entreprise</span>
                                                    <a href="{{ $baseDocument->valeur_ajoutee }}" class="btn btn-success"
                                                        download><i class="fa fa-download"></i></a>
                                                </div>
                                            </li>


                                            <!-- Add more list items for additional files -->
                                        </ul>
                                    </div>


                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
