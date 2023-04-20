@extends('layouts.app')
@section('content')


    <div class="modal modal-xl fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel"
        tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="row justify-content-center w-100">
                        <div class="row">
                            <div class="card   ">

                                <h1 class="modal-title fs-5  bg-light-success text-center p-2 m-2 rounded-2 text-success"
                                    id="exampleModalToggleLabel"> Nouveau
                                    Etude</h1>

                                <form class="d-flex flex-wrap justify-content-center gap-2" method="POST"
                                    action="{{ route('utilisateur.store') }}" enctype="multipart/form-data">
                                    @csrf

                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif



                                    <div class="input-registers  col-md-10 ">
                                        <div class="file w-80 is-primary is-boxed">
                                            <label class="file-label w-100">
                                                <input class="file-input @error('profile') is-invalid @enderror"
                                                    type="file" name="profile">
                                                <span class="file-cta">
                                                    <span class="file-icon">
                                                        <i class="fas fa-cloud-upload-alt"></i>
                                                    </span>
                                                    <span class="file-label ">
                                                        Profile de
                                                        l'utilisateur
                                                    </span>
                                                </span>
                                            </label>
                                            @error('profile')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="input-registers  col-md-5">
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

                                    @if (Auth::user()->role == 'adminisrateur')
                                        <div class="input-registers  col-md-5">
                                            <label for="role" class="form-label">{{ __('Role') }}</label>
                                            <div class="col-md-12">


                                                <select id="role"
                                                    class="form-control @error('role') is-invalid @enderror" name="role"
                                                    value="{{ old('role') }}" required autocomplete="role" autofocus>

                                                    <option>
                                                        Selectionnez un role
                                                    </option>


                                                </select>

                                                @error('role')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    @endif




                                    <div class="input-registers  col-md-5">
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

                                    <div class="input-registers  col-md-5">
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

                                    <div class="input-registers  col-md-5">
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

                                    <div class="input-registers  col-md-5">
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


                                    <div class="input-registers  col-md-5">
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

                                    <div class="input-registers  col-md-5">
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

                                    <div class="input-registers  col-md-5">
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

                                    <div class="input-registers  col-md-5">
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


                                    <div class="input-registers  col-md-5">
                                        <label for="password-confirm"
                                            class="form-label">{{ __('Confirmer le mot de passe') }}</label>

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

                                    <div class="input-registers col-md-10  mt-2 ">
                                        <div class="col-md-12 d-flex  justify-content-center">

                                            <button type="submit" class="w-50  mx-4 btn btn-success">
                                                {{ __('Soumettre') }}
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





    <div class="container-fluid">
        <div class="row justify-content-center">


            <div class="col-md-12">
                <div class="card">
                    <!--  Body Wrapper -->
                    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6"
                        data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">

                        @include('layouts.partials.sidebar')
                        <!--  Main wrapper -->
                        <div class="body-wrapper">
                            <!--  Header Start -->
                            @include('layouts.partials.navbar')

                            <!--  Header End -->
                            <div class="container-fluid">
                                <div class="card">
                                    <div class="card-body">
                                        @if (session('status'))
                                            <div class="alert alert-success" role="alert">
                                                {{ session('status') }}
                                            </div>
                                        @endif
                                        <div class="container mt-5 pt-4">
                                            <div class="row align-items-end mb-4 pb-2">
                                                <div class="col-md-8">
                                                    <div class="section-title text-center text-md-start">
                                                        <h6 class="title mb-4 text-success">+ liste des études </h6>
                                                        <p class="text-muted mb-0 para-desc">Start work with Leaping. Build
                                                            responsive, mobile-first projects on the web with the world's
                                                            most popular front-end component library.</p>
                                                    </div>



                                                    <button class="btn btn-primary " data-bs-target="#exampleModalToggle"
                                                        data-bs-toggle="modal"> + Nouveau
                                                        Etude</button>

                                                    <!--end col-->



                                                </div>
                                                <!--end col-->



                                                <div class="col-md-4 mt-4 mt-sm-0 d-none d-md-block">
                                                    <div class="text-center text-md-end">
                                                        <a href="page-jobs.html" class="text-primary">Voir plus d'etudes
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 24 24" fill="none"
                                                                stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-arrow-right fea icon-sm">
                                                                <line x1="5" y1="12" x2="19"
                                                                    y2="12"></line>
                                                                <polyline points="12 5 19 12 12 19"></polyline>
                                                            </svg></a>
                                                    </div>
                                                </div>
                                                <!--end col-->
                                            </div>
                                            <!--end row-->

                                            <div class="row">

                                                @foreach ($etudes as $etude)
                                                    <div class="col-lg-6 col-md-6 col-12 mt-4 pt-2">
                                                        <div class="card border-0 bg-light rounded shadow">
                                                            <div class="card-body p-4">
                                                                <span
                                                                    class="badge rounded-pill bg-primary float-md-end mb-3 mb-sm-0">
                                                                    {{ $etude->nom_etude }}</span>
                                                                <h5 class="text-success tag is-light">
                                                                    {{ $etude->nom_client }}</h5>
                                                                <div class="mt-3">
                                                                    {{-- Liste element of the folder --}}
                                                                    <span class="text-muted d-block"><i
                                                                            class="fa fa-plus mr-2"
                                                                            aria-hidden="true"></i>
                                                                        <a href="#" target="_blank"
                                                                            class="text-muted">{{ $etude->nom_responsable }}</a></span>
                                                                    <span class="text-muted d-block"><i
                                                                            class="fa fa-plus mr-2"
                                                                            aria-hidden="true"></i>
                                                                        {{ $etude->nom_contact }}</span>

                                                                    <span class="text-muted d-block"><i
                                                                            class="fa fa-plus mr-2"
                                                                            aria-hidden="true"></i>
                                                                    </span>

                                                                    {{-- Dates of start and end --}}
                                                                    <div class="d-flex gap-1 my-1 justify-content-between">
                                                                        <span class="tag is-primary p-3 is-size-7 badge ">
                                                                            <i class="fa fa-date" aria-hidden="true"></i>
                                                                            <b> Début :</b> {{ $etude->date_debut }}</span>
                                                                        <span class="tag is-warning p-3 is-size-7 badge ">
                                                                            <i class="fa fa-date" aria-hidden="true"></i>
                                                                            <b> Fin : </b>{{ $etude->date_fin }}</span>
                                                                    </div>
                                                                </div>

                                                                <div class="mt-3  ">
                                                                    <a href="#" class=" btn btn-primary"><i
                                                                            class="fa fa-eye"></i></a>
                                                                    <a href="#" class=" btn btn-warning"><i
                                                                            class="fa fa-pen"></i></a>
                                                                    <a href="#" class=" btn btn-danger"><i
                                                                            class="fa fa-trash"></i></a>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>


                                                    <!--end col-->
                                                @endforeach


                                                <div class="col-12 mt-4 pt-2 d-block d-md-none text-center">
                                                    <a href="#" class="btn btn-primary">View more Jobs <svg
                                                            xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 24 24" fill="none"
                                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round"
                                                            class="feather feather-arrow-right fea icon-sm">
                                                            <line x1="5" y1="12" x2="19"
                                                                y2="12"></line>
                                                            <polyline points="12 5 19 12 12 19"></polyline>
                                                        </svg></a>
                                                </div>
                                                <!--end col-->
                                            </div>
                                            <!--end row-->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
