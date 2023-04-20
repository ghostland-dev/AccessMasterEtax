@extends('layouts.pipeline')
@section('pipeline')
    <div class=" background jumbotron jumbotron-fluid  back-image" id="banner  ">

         
        <div class="container text-center text-md-center">

            <h1 data-aos="fade" data-aos-easing="linear" data-aos-duration="1000" data-aos-once="true"
                class="display-3 text-white font-weight-bold my-5 text-center">
                Bienvenue

            </h1>
            <p data-aos="fade" data-aos-easing="linear" data-aos-duration="1000" data-aos-once="true"
                class="lead text-white my-4">
                Access E-Tax est une solution digital qui vous permet de monter vos dossier
                <br> pour vous faire rembourser des taux énérgitiques, nous vous evitons les procedures pénibles <br> et
                lentes, et vous avez un suivi direct de votre dossier.
            </p>
            <a href="{{ route('etape2') }}" data-aos="fade" data-aos-easing="linear" data-aos-duration="1000"
                data-aos-once="true" class="btn my-4 font-weight-bold atlas-cta cta-green btn-success">Commencer</a>
        </div>
    </div>
@endsection
