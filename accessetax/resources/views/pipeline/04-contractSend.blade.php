@extends('layouts.pipeline')
@section('pipeline')
     @include('layouts.partials.timeline',['step'=>Auth::user()->etape ?? 3])
    <div class=" background jumbotron jumbotron-fluid h-100" id="banner"
        style="background-image: url({{ asset('img/banner-bk.jpg') }});">
        <div class="container text-center text-md-center">

            <h3 data-aos="fade" data-aos-easing="linear" data-aos-duration="1000" data-aos-once="true"
                class="display-5 text-white font-weight-bold py-5 text-center">
                <span class="text-success"> Bravo !</span> vous êtes sur le point de signer le contrat.

            </h3>
            <p data-aos="fade" data-aos-easing="linear" data-aos-duration="1000" data-aos-once="true"
                class="lead text-white my-4">
                Veuillez Téléchragez, signez et téléveser le contrat de la préstation.
            </p>


            <a href="{{ route('etape4') }}" data-aos="fade" data-aos-easing="linear" data-aos-duration="1000"
                data-aos-once="true" class="btn my-4 font-weight-bold btn btn-warning"> <i class="fa fa-send"></i>
                Envoyer les fichiers signés</a>
        </div>





        <ul class="link-list gap-2 d-flex flex-wrap justify-content-center">

            <li class=" text-success
              rounded  "> <a href="{{ route('contract') }}" data-aos="fade"
                    data-aos-easing="linear" data-aos-duration="300" data-aos-once="true"
                    class="btn my-4 font-weight-bold btn btn-success"><i class="fa fa-download"></i>
                    Téléchrager le contrat</a></li>
            <li class=" text-success
              rounded  "><a href="{{ route('pouvoir') }}" data-aos="fade"
                    data-aos-easing="linear" data-aos-duration="300" data-aos-once="true"
                    class="btn my-4 font-weight-bold btn btn-success"> <i class="fa fa-download"></i>
                    Téléchrager le pourvoir mandataire</a>
            </li>
            <li class=" text-success
              rounded  "> <a
                    href="{{ asset('storage/files/CGV_Access_Energies.pdf') }}" data-aos="fade" data-aos-easing="linear"
                    data-aos-duration="300" data-aos-once="true" class="btn my-4 font-weight-bold btn btn-success"> <i
                        class="fa fa-download"></i> Téléchrager les
                    CGV d'Access Energies</a></li>
            <li class=" text-success
              rounded  "><a href="{{ route('courrier') }}" data-aos="fade"
                    data-aos-easing="linear" data-aos-duration="300" data-aos-once="true"
                    class="btn my-4 font-weight-bold btn btn-success"> <i class="fa fa-download"></i>
                    Téléchrager Courrier Type</a>
            </li>

        </ul>
    </div>
@endsection
