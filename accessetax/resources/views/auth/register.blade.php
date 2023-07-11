@extends('layouts.app')

@section('content')

    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <div
            class="position-relative overflow-hidden  bg-gradient-to-r from-slate-500 to-green-300 min-vh-100 d-flex align-items-center justify-content-center">
            <div class="d-flex align-items-center justify-content-center w-100">
                <div class="row justify-content-center w-full lg:w-2/4 md:w-3/4 sm:w-full    ">
                    <div class="row justify-content-center w-100">
                        <div class="card ">
                            <div class="card-body">



                                <form class=" " method="POST" action="{{ route('register') }}"
                                    enctype="multipart/form-data">
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

                                    <div class=" ">



                                        <label for="dropzone-file"
                                            class="flex flex-col items-center @error('profile') is-invalide @enderror justify-center w-full h-30 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                                <svg aria-hidden="true" class="w-10 h-10 mb-3 text-gray-400" fill="none"
                                                    stroke="currentColor" viewBox="0 0 24 24"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12">
                                                    </path>
                                                </svg>
                                                <p class="mb-2 text-sm text-gray-500 dark:text-gray-400">Téléverser une
                                                    image de profile</p>
                                                <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF
                                                    (MAX. 800x400px)</p>
                                            </div>
                                            <input id="dropzone-file" type="file" name="profile" class="hidden"
                                                value="{{ old('profile') }}" required autocomplete="profile" />
                                        </label>

                                        @error('profile')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="grid gap-2 grid-cols-1 lg:grid-cols-2 md:grid-cols-2 sm:grid-cols-1">
                                        <div class="  ">
                                            <label for="userName" class="form-label">{{ __('Nom utilisateur') }}</label>

                                            <div class=" ">
                                                <input id="userName" type="text"
                                                    class="form-control @error('userName') is-invalid @enderror"
                                                    name="userName" value="{{ old('userName') }}" required
                                                    placeholder="nom d'utilisateur" autocomplete="userName" autofocus>

                                                @error('userName')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>



                                        <div class="  ">
                                            <label for="firstName" class="form-label">{{ __('Prénom') }}</label>

                                            <div class=" ">
                                                <input id="firstName" type="text"
                                                    class="form-control @error('firstName') is-invalid @enderror"
                                                    name="firstName" value="{{ old('firstName') }}" required
                                                    autocomplete="firstName" placeholder="Prénom" autofocus>

                                                @error('firstName')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="  ">
                                            <label for="lastName" class="form-label">{{ __('Nom') }}</label>

                                            <div class=" ">
                                                <input id="lastName" type="text"
                                                    class="form-control @error('lastName') is-invalid @enderror"
                                                    name="lastName" value="{{ old('lastName') }}" required
                                                    autocomplete="lastName" placeholder="Nom" autofocus>

                                                @error('lastName')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="  ">
                                            <label for="tel" class="form-label">{{ __('Mobile') }}</label>

                                            <div class=" ">
                                                <input id="tel" type="tel"
                                                    class="form-control @error('tel') is-invalid @enderror" name="tel"
                                                    value="{{ old('tel') }}" required autocomplete="tel" autofocus
                                                    placeholder="06 00 00 00">

                                                @error('lastName')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="  ">
                                            <label for="fix" class="form-label">{{ __('Fix') }}</label>

                                            <div class=" ">
                                                <input id="fix" type="text"
                                                    class="form-control @error('fix') is-invalid @enderror" name="fix"
                                                    value="{{ old('fix') }}" required autocomplete="fix" autofocus
                                                    placeholder="02 00 00 00">

                                                @error('fix')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>


                                        <div class="  ">
                                            <label for="job" class="form-label">{{ __('Fonction') }}</label>

                                            <div class=" ">
                                                <input id="job" type="text"
                                                    class="form-control @error('job') is-invalid @enderror" name="job"
                                                    value="{{ old('job') }}" required autocomplete="job" autofocus
                                                    placeholder="Responsable financier">

                                                @error('job')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="  ">
                                            <label for="siren" class="form-label">{{ __('siren') }}</label>

                                            <div class=" ">
                                                <input id="siren" type="number"
                                                    class="form-control @error('siren') is-invalid @enderror"
                                                    name="siren" value="{{ old('siren') }}" required
                                                    autocomplete="siren" placeholder="00-00-00-00" autofocus>

                                                @error('siren')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="  ">
                                            <label for="email" class="form-label">{{ __('Adresse E-mail') }}</label>

                                            <div class=" ">
                                                <input id="email" type="email"
                                                    class="form-control @error('email') is-invalid @enderror"
                                                    name="email" value="{{ old('email') }}"
                                                    placeholder="exemple@domain.fr" required autocomplete="email">

                                                @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="  ">
                                            <label for="password" class="form-label">{{ __('Mot de passe') }}</label>

                                            <div class=" ">
                                                <input id="password" type="password"
                                                    class="form-control @error('password') is-invalid @enderror"
                                                    name="password" placeholder="mot de passe" required
                                                    autocomplete="new-password">

                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>


                                        <div class="  ">
                                            <label for="password-confirm"
                                                class="form-label">{{ __('Confirmer
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    le mot de passe') }}</label>

                                            <div class=" ">
                                                <input id="password-confirm" type="password"
                                                    class="form-control  @error('password') is-invalide @enderror "
                                                    name="password_confirmation" required
                                                    placeholder="confirmation de mot de passe"
                                                    autocomplete="new-password">
                                            </div>

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>


                                    </div>

                                    <div class="my-4">
                                        <div class="  d-flex  justify-content-center">
                                            <a href="{{ route('login') }}" class="w-50 mx-4 btn btn-dark ">
                                                J'ai déjà un compte
                                            </a>
                                            <button type="submit" class="w-50  mx-4 btn btn-success">
                                                S'inscrire
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





    <script>
        $(document).ready(function() {
            $('#siren').on('input', function() {
                var siren = $(this).val();
                var sirenField = $(this);

                if (siren.length >= 8) {
                    $.ajax({
                        url: `/app/v1/data/pappers/existence?siren=${siren}`,
                        method: 'GET',
                        success: function(response) {
                            if (response.exists) {
                                $('#siren-error').text('Le SIREN existe.');
                                sirenField.removeClass('is-invalid').addClass('is-valid');
                            } else {
                                $('#siren-error').text('Le SIREN n\'existe pas.');
                                sirenField.removeClass('is-valid').addClass('is-invalid');
                            }
                        },
                        error: function(xhr, status, error) {
                            $('#siren-error').text(
                                'Une erreur s\'est produite lors de la vérification du SIREN.'
                            );
                            sirenField.removeClass('is-valid').addClass('is-invalid');
                        }
                    });
                } else {
                    $('#siren-error').text('');
                    sirenField.removeClass('is-valid is-invalid');
                }
            });
        });
    </script>


@endsection
