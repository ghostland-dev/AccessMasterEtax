@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Portail Inscription') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
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

                        <div class="row mb-3">
                            <label for="profile" class="col-md-4 col-form-label text-md-end">{{ __('Profile') }}</label>

                            <div class="col-md-6">
                                <input id="profile" type="file"
                                    class="form-control @error('profile') is-invalid @enderror" name="profile"
                                    value="{{ old('profile') }}" required autocomplete="profile" autofocus>

                                @error('profile')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="userName" class="col-md-4 col-form-label text-md-end">{{ __('Nom utilisateur')
                                }}</label>

                            <div class="col-md-6">
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



                        <div class="row mb-3">
                            <label for="firstName" class="col-md-4 col-form-label text-md-end">{{ __('Prénom')
                                }}</label>

                            <div class="col-md-6">
                                <input id="firstName" type="text"
                                    class="form-control @error('firstName') is-invalid @enderror" name="firstName"
                                    value="{{ old('firstName') }}" required autocomplete="firstName" autofocus>

                                @error('firstName')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="lastName" class="col-md-4 col-form-label text-md-end">{{ __('Nom') }}</label>

                            <div class="col-md-6">
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

                        <div class="row mb-3">
                            <label for="tel" class="col-md-4 col-form-label text-md-end">{{ __('Mobile') }}</label>

                            <div class="col-md-6">
                                <input id="tel" type="text" class="form-control @error('tel') is-invalid @enderror"
                                    name="tel" value="{{ old('tel') }}" required autocomplete="tel" autofocus
                                    placeholder="+336-000-000-000">

                                @error('lastName')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="fix" class="col-md-4 col-form-label text-md-end">{{ __('Fix') }}</label>

                            <div class="col-md-6">
                                <input id="fix" type="text" class="form-control @error('fix') is-invalid @enderror"
                                    name="fix" value="{{ old('fix') }}" required autocomplete="fix" autofocus
                                    placeholder="+332-000-000-000">

                                @error('fix')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="job" class="col-md-4 col-form-label text-md-end">{{ __('Fonction') }}</label>

                            <div class="col-md-6">
                                <input id="job" type="text" class="form-control @error('') is-invalid @enderror"
                                    name="job" value="{{ old('job') }}" required autocomplete="job" autofocus
                                    placeholder="Responsable financier">

                                @error('job')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="siren" class="col-md-4 col-form-label text-md-end">{{ __('siren') }}</label>

                            <div class="col-md-6">
                                <input id="siren" type="text" class="form-control @error('siren') is-invalid @enderror"
                                    name="siren" value="{{ old('siren') }}" required autocomplete="siren" autofocus>

                                @error('siren')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Adresse E-mail')
                                }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Mot de passe')
                                }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirmer
                                le mot de passe') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
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
@endsection