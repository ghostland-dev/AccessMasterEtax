@extends('layouts.pipeline')
@section('pipeline')
    <div class=" background jumbotron jumbotron-fluid  h-screen back-image" id="banner  ">


        <div class="container text-center text-md-center">

            <h1 data-aos="fade" data-aos-easing="linear" data-aos-duration="1000" data-aos-once="true"
                class="display-3 text-white font-weight-bold my-5 text-center">
                Confirmation !

            </h1>
            <p data-aos="fade" data-aos-easing="linear" data-aos-duration="1000" data-aos-once="true"
                class="lead text-white my-4">

                Merci d'avoir pris le temps d'envoyer vos données. Votre dossier a été bien reçu par les autorités
                concernées. Nous reviendrons vers vous pour plus d'informations et pour vous confirmer le remboursement.
            </p>
            <a href="{{ route('register') }}" data-aos="fade" data-aos-easing="linear" data-aos-duration="1000"
                data-aos-once="true" class="btn my-4 font-weight-bold atlas-cta cta-green btn-success">Créer un compte</a>
        </div>
    </div>
@endsection
