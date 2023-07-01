@extends('layouts.pipeline')
@section('main')


    <div class=" background jumbotron jumbotron-fluid  h-screen back-image" id="banner  ">


        <div class="container text-center text-md-center">

            <h1 data-aos="fade" data-aos-easing="linear" data-aos-duration="1000" data-aos-once="true"
                class="display-3 text-white font-weight-bold my-5 text-center">
                Confirmation de recepetion

            </h1>
            <p data-aos="fade" data-aos-easing="linear" data-aos-duration="1000" data-aos-once="true"
                class="lead text-white my-4">
               Votre doussier a été bien reçu par les authorités concernés , nous revenennons vers vous pour plus d'inforamation et pour vous confirmer le remboursement
            </p>
            <a href="{{ route('etape2') }}" data-aos="fade" data-aos-easing="linear" data-aos-duration="1000"
                data-aos-once="true" class="btn my-4 font-weight-bold atlas-cta cta-green btn-success">Commencer</a>
        </div>
    </div>
@endsection
