
@extends('layouts.app')
@section('content')


<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
<div class="container mt-5 pt-4">
    <div class="row align-items-end mb-4 pb-2">
        <div class="col-md-8">
            <div class="section-title text-center text-md-start">
                <h4 class="title mb-4">Liste des dossiers de base</h4>
                <p class="text-muted mb-0 para-desc">Start work with Leaping. Build responsive, mobile-first projects on the web with the world's most popular front-end component library.</p>
            </div>
 
        </div><!--end col-->

        <div class="col-md-4 mt-4 mt-sm-0 d-none d-md-block">
            <div class="text-center text-md-end">
                <a href="page-jobs.html" class="text-primary">View more Jobs <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right fea icon-sm"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg></a>
            </div>
        </div><!--end col-->
    </div><!--end row-->

    <div class="row">

    @foreach( $DossierBases as $DossierBase)
        <div class="col-lg-4 col-md-6 col-12 mt-4 pt-2">
            <div class="card border-0 bg-light rounded shadow">
                <div class="card-body p-4">
                    <span class="badge rounded-pill bg-primary float-md-end mb-3 mb-sm-0"> {{ $DossierBase->statut_dossier }}</span>
                    <h5>{{ $DossierBase->nom_dossier }}</h5>
                    <div class="mt-3">
                        <span class="text-muted d-block"><i class="fa fa-home" aria-hidden="true"></i> <a href="#" target="_blank" class="text-muted">Bootdey.com LLC.</a></span>
                        <span class="text-muted d-block"><i class="fa fa-map-marker" aria-hidden="true"></i> {{ $DossierBase->numero_dossier }}</span>
                    </div>
                    
                    <div class="mt-3">
                        <a href="#" class="btn btn-primary">Documents Genérés</a>
                         <a href="#" class="btn btn-primary">Documents de base</a>
                    </div>
                   
                </div>
            </div>
        </div><!--end col-->
    @endforeach


        <div class="col-12 mt-4 pt-2 d-block d-md-none text-center">
            <a href="#" class="btn btn-primary">View more Jobs <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right fea icon-sm"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg></a>
        </div><!--end col-->
    </div><!--end row-->
</div>

@endsection