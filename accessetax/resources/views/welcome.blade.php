{{-- @extends('layouts.app')
@section('content')



@endsection --}}

<!DOCTYPE html>
<html lang="zh-TW">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Access E-Tax</title>

    <meta name="description" content="">
    <link rel="icon" href="favicon.icon" sizes="32x32" type="image/x-icon">
    <!-- custom.css -->
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <!-- bootstrap.min.css -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <!-- font-awesome -->
    <link rel="stylesheet" href="{{ asset('font-awesome-4.7.0/css/font-awesome.min.css') }}">

    <!-- AOS -->
    <link rel="stylesheet" href="{{ asset('css/aos.css') }}">
</head>

<body>
    <!-- banner -->
    <div class="jumbotron jumbotron-fluid h-full" id="banner"
        style="background-image: url(./img/bg-universe.jpg); height: 100vh;">
        <div class="container flex justify-center text-center text-md-left">
            <header>
                <div class="row justify-content-between">
                    <div class="col-2">
                        <img data-aos="fade-right" data-aos-delay="200" data-aos-duration="1000" data-aos-once="true"
                            src="{{ asset('img/logo.svg') }}" alt="logo" class="logo">
                    </div>
                    <div class="col-6 align-self-center text-right">
                        <a href="{{ route('login') }}" class=" border-1 border-white border-solid text-white ">Se
                            connecter </a>
                    </div>
                </div>
            </header>
            <h1 data-aos="fade-right" data-aos-delay="200" data-aos-duration="1000" data-aos-once="true"
                class="display-3 text-white font-weight-bold my-5">
                Solution digitale<br>
                Faitez la Différence

            </h1>
            <p data-aos="fade-right" data-aos-delay="200" data-aos-duration="1000" data-aos-once="true"
                class="lead text-white my-4">
                Access E-Tax est une solution digital qui vous permet de monter vos dossier
                <br> pour vous faire rembourser des taux énérgitiques, nous vous evitons les procedures pénibles <br> et
                lentes, et vous avez un suivi direct de votre dossier.
            </p>
            <a href="{{ route('etape1') }}" data-aos="fade-top" data-aos-delay="200" data-aos-duration="1000"
                data-aos-once="true" class="btn my-4 font-weight-bold atlas-cta cta-green">Commencer</a>
        </div>
    </div>





    <!-- feature (skew background) -->
    <div class="jumbotron jumbotron-fluid feature" id="feature-first">
        <div class="container my-5">
            <div class="row justify-content-between text-center text-md-left">
                <div data-aos="fade-right" data-aos-duration="1000" data-aos-once="true" class="col-md-6">
                    <h2 class="font-weight-bold">Jeter un coup d'oeil</h2>
                    <p class="my-4">vous souhiatez savoir comment les choses vont se déroler, quelles sonts les étapes
                        à suivre.</p>
                    <a href="#" class="btn my-4 font-weight-bold atlas-cta cta-blue">demande de contact</a>
                </div>
                <div data-aos="fade-left" data-aos-duration="1000" data-aos-once="true"
                    class="col-md-6 align-self-center">
                    <img src="img/feature-1.png" alt="Take a look inside" class="mx-auto d-block">
                </div>
            </div>
        </div>
    </div>
    <!-- feature (green background) -->
    <div class="jumbotron jumbotron-fluid feature" id="feature-last">
        <div class="container">
            <div class="row justify-content-between text-center text-md-left">
                <div data-aos="fade-left" data-aos-duration="1000" data-aos-once="true" class="col-md-6 flex-md-last">
                    <h2 class="font-weight-bold">Tout est dégitalisé !</h2>
                    <p class="my-4">
                        Chez Access Energies nous nous assurons que vous n'aurez pas
                        <br> besoin de se déplacer, vous pouvez vous faire rembourser depuis votre bureau
                    </p>
                    <a href="#" class="btn my-4 font-weight-bold atlas-cta cta-blue">En savoir plus</a>
                </div>
                <div data-aos="fade-right" data-aos-duration="1000" data-aos-once="true"
                    class="col-md-6 align-self-center flex-md-first">
                    <img src="img/feature-2.png" alt="Safe and reliable" class="mx-auto d-block">
                </div>
            </div>
        </div>
    </div>

    <!-- price table -->
    <div class="container my-5 py-2" id="price-table">
        <h2 class="text-center font-weight-bold d-block mb-3">Préstations</h2>
        <div class="row">
            <div data-aos="fade-right" data-aos-delay="200" data-aos-duration="1000" data-aos-once="true"
                class="col-md-4   text-center py-4 mt-5">
                <h4 class="my-4">STARTUP</h4>
                <p class="font-weight-bold"><span class="display-2 font-weight-bold">0</span> €</p>
                <ul class="list-unstyled">
                    <li>1 Etude TCGIN </li>
                    <li>1 Etude CSPE </li>
                    <li>1 Site </li>
                    <li>1 Commesion déduit <br> de taux de remboursement</li>
                    <li>Assistance client</li>
                </ul>
                <a href="#" class="btn my-4 font-weight-bold atlas-cta cta-ghost">S'abonner</a>
            </div>
            <div data-aos="fade-up" data-aos-duration="1000" data-aos-once="true"
                class="col-md-4 text-center py-4 mt-5 rounded" id="price-table__premium">
                <h4 class="my-4">PREMIUM</h4>
                <p class="font-weight-bold"> <span class="display-2 font-weight-bold">450</span> €/ Mois.</p>
                <ul class="list-unstyled">
                    <li> service 1</li>
                    <li> service 2</li>
                    <li> service 3</li>
                    <li> service 4</li>
                </ul>
                <a href="#" class="btn my-4 font-weight-bold atlas-cta cta-green">s'abonner</a>
            </div>
            <div data-aos="fade-left" data-aos-delay="200" data-aos-duration="1000" data-aos-once="true"
                class="col-md-4 text-center py-4 mt-5">
                <h4 class="my-4">PROFESSIONAL</h4>
                <p class="font-weight-bold"> <span class="display-2 font-weight-bold">3000</span> €/ Mois.</p>
                <ul class="list-unstyled">
                    <li> service 1</li>
                    <li> service 2</li>
                    <li> service 3</li>
                    <li> service 4</li>
                </ul>
                <a href="#" class="btn my-4 font-weight-bold atlas-cta cta-ghost">s'abonner</a>
            </div>
        </div>
    </div>

    <!-- contact -->
    <div class="jumbotron jumbotron-fluid" id="contact"
        style="background-image: url({{ asset('img/banner-bk.jpg') }});">
        <div class="container my-5">
            <div class="row justify-content-between">
                <div class="col-md-6 text-white">
                    <h2 class="font-weight-bold">Nous Contactez</h2>
                    <p class="my-4">
                        Access Energies est une société française spécialisée dans le conseil et l’accompagnement des
                        entreprises.
                        <br> dans le but de réduire significativement et durablement leur budget énergétique
                    </p>
                    <ul class="list-unstyled">
                        <li>Email : contact@accessenergies.fr</li>
                        <li>Fix : 02 78 94 01 30</li>
                        <li>Adresse : 181 Rue Joliot Curie, 76650 Petit-Couronne</li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <form action="#" method="POST">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="name">Votre nom</label>
                                <input type="name" class="form-control" id="name">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="Email">Votre E-mail</label>
                                <input type="email" class="form-control" id="Email">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="message">Messages</label>
                            <textarea class="form-control" id="message" rows="3"></textarea>
                        </div>
                        <button type="submit"
                            class="btn font-weight-bold atlas-cta atlas-cta-wide cta-green my-3">Envoyer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- copyright -->
    <div class="jumbotron jumbotron-fluid" id="copyright">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-md-6 text-white align-self-center text-center text-md-left my-2">
                    Copyright © 2023 - Access-Energies
                </div>
                <div class="col-md-6 align-self-center text-center text-md-right my-2" id="social-media">
                    <a href="#" class="d-inline-block text-center ml-2">
                        <i class="fa fa-facebook" aria-hidden="true"></i>
                    </a>
                    <a href="#" class="d-inline-block text-center ml-2">
                        <i class="fa fa-twitter" aria-hidden="true"></i>
                    </a>
                    <a href="#" class="d-inline-block text-center ml-2">
                        <i class="fa fa-linkedin" aria-hidden="true"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- AOS -->
    <script src="{{ asset('js/aos.js') }}"></script>
    <script>
        AOS.init({});
    </script>
</body>

</html>
