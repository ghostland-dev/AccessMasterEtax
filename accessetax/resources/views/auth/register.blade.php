@extends('layouts.app')

@section('content')

    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <div
            class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
            <div class="d-flex align-items-center justify-content-center w-100">
                <div class="row justify-content-center w-100">
                    <div class="col-md-8 col-lg-6 col-xxl-6 my-6">
                        <div class="card pb-2 mb-3">
                            <div class="card-body">
                                <a href="{{ route('home') }}" class="text-nowrap logo-img text-center d-block py-3 w-100">
                                    <img src="{{ asset('logo.svg') }}" width="180" alt="">
                                </a>
                                <p class="text-center">Protegez la tésorie de votre entreprise !</p>


                                <form class="d-flex flex-wrap justify-content-center" method="POST"
                                    action="{{ route('register') }}" enctype="multipart/form-data">
                                    @csrf

                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif

                                    <div class="input-register  col-md-10">
                                        <label for="profile" class="form-label">{{ __('Profile') }}</label>

                                        <div class="col-md-12">
                                            <input id="profile" type="file"
                                                class="form-control ti ti-file @error('profile') is-invalid @enderror"
                                                name="profile" value="{{ old('profile') }}" required autocomplete="profile"
                                                autofocus>

                                            @error('profile')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="input-register  col-md-5">
                                        <label for="userName" class="form-label">{{ __('Nom utilisateur') }}</label>

                                        <div class="col-md-12">
                                            <input id="userName" type="text"
                                                class="form-control @error('userName') is-invalid @enderror" name="userName"
                                                value="{{ old('userName') }}" required autocomplete="userName" autofocus>

                                            @error('userName')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>



                                    <div class="input-register  col-md-5">
                                        <label for="firstName" class="form-label">{{ __('Prénom') }}</label>

                                        <div class="col-md-12">
                                            <input id="firstName" type="text"
                                                class="form-control @error('firstName') is-invalid @enderror"
                                                name="firstName" value="{{ old('firstName') }}" required
                                                autocomplete="firstName" autofocus>

                                            @error('firstName')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="input-register  col-md-5">
                                        <label for="lastName" class="form-label">{{ __('Nom') }}</label>

                                        <div class="col-md-12">
                                            <input id="lastName" type="text"
                                                class="form-control @error('lastName') is-invalid @enderror" name="lastName"
                                                value="{{ old('lastName') }}" required autocomplete="lastName" autofocus>

                                            @error('lastName')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="input-register  col-md-5">
                                        <label for="tel" class="form-label">{{ __('Mobile') }}</label>

                                        <div class="col-md-12">
                                            <input id="tel" type="text"
                                                class="form-control @error('tel') is-invalid @enderror" name="tel"
                                                value="{{ old('tel') }}" required autocomplete="tel" autofocus
                                                placeholder="+336-000-000-000">

                                            @error('lastName')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="input-register  col-md-5">
                                        <label for="fix" class="form-label">{{ __('Fix') }}</label>

                                        <div class="col-md-12">
                                            <input id="fix" type="text"
                                                class="form-control @error('fix') is-invalid @enderror" name="fix"
                                                value="{{ old('fix') }}" required autocomplete="fix" autofocus
                                                placeholder="+332-000-000-000">

                                            @error('fix')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="input-register  col-md-5">
                                        <label for="job" class="form-label">{{ __('Fonction') }}</label>

                                        <div class="col-md-12">
                                            <input id="job" type="text"
                                                class="form-control @error('') is-invalid @enderror" name="job"
                                                value="{{ old('job') }}" required autocomplete="job" autofocus
                                                placeholder="Responsable financier">

                                            @error('job')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="input-register  col-md-5">
                                        <label for="siren" class="form-label">{{ __('siren') }}</label>

                                        <div class="col-md-12">
                                            <input id="siren" type="text"
                                                class="form-control @error('siren') is-invalid @enderror" name="siren"
                                                value="{{ old('siren') }}" required autocomplete="siren" autofocus>

                                            @error('siren')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="input-register  col-md-5">
                                        <label for="email" class="form-label">{{ __('Adresse E-mail') }}</label>

                                        <div class="col-md-12">
                                            <input id="email" type="email"
                                                class="form-control @error('email') is-invalid @enderror" name="email"
                                                value="{{ old('email') }}" required autocomplete="email">

                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="input-register  col-md-5">
                                        <label for="password" class="form-label">{{ __('Mot de passe') }}</label>

                                        <div class="col-md-12">
                                            <input id="password" type="password"
                                                class="form-control @error('password') is-invalid @enderror"
                                                name="password" required autocomplete="new-password">

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="input-register  col-md-5">
                                        <label for="password-confirm"
                                            class="form-label">{{ __('Confirmer
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        le mot de passe') }}</label>

                                        <div class="col-md-12">
                                            <input id="password-confirm" type="password" class="form-control"
                                                name="password_confirmation" required autocomplete="new-password">
                                        </div>

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="input-register col-md-10  mt-2 ">
                                        <div class="col-md-12 d-flex  justify-content-center">
                                            <a href="{{ route('login') }}" class="w-50 mx-4 btn btn-dark ">
                                                {{ __("J'ai déjà un compte ") }}
                                            </a>
                                            <button type="submit" class="w-50  mx-4 btn btn-success">
                                                {{ __('S\'inscrire ') }}
                                            </button>

                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>










@endsection
