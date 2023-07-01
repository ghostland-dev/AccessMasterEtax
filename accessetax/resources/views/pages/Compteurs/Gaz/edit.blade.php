@extends('layouts.conntected')
@section('subcontent')
    <form class="d-flex flex-wrap justify-content-center" method="POST"
        action="{{ route('utilisateur.update', $Utilisateur->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

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

        <div class="input-register  col-md-10">
            <label for="profile" class="form-label">{{ __('Profile') }}</label>

            <div class="col-md-12">
                <img class="img-fluid rounded-circle m-2" src="{{ $Utilisateur->profile }}" alt="" srcset=""
                    style="height:150px; width:150px;">
                <input id="profile" type="file" class="form-control ti ti-file @error('profile') is-invalid @enderror"
                    name="profile" value="{{ $Utilisateur->profile }}" autocomplete="profile" autofocus>


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
                <input id="userName" type="text" class="form-control @error('userName') is-invalid @enderror"
                    name="userName" value="{{ $Utilisateur->userName }}" required autocomplete="userName" autofocus>

                @error('userName')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        @if (Auth::user()->role == 'administrateur')
            <div class="input-register  col-md-5">
                <label for="role" class="form-label">{{ __('Role') }}</label>
                <div class="col-md-12">


                    <select id="role" class="form-control @error('role') is-invalid @enderror" name="role"
                        value="{{ old('role') }}" required autocomplete="role" autofocus>

                        <option>
                            Selectionnez un role
                        </option>

                        <option value="administrateur" {{ $Utilisateur->role == 'administrateur' ? 'selected' : '' }}>
                            Administrateur </option>
                        <option value="client" {{ $Utilisateur->role == 'client' ? 'selected' : '' }}> Client </option>
                        <option value="commercial" {{ $Utilisateur->role == 'commercial' ? 'selected' : '' }}> Agent
                            commercial
                        </option>
                        <option value="visiteur" {{ $Utilisateur->role == 'visiteur' ? 'selected' : '' }}> Visieteur
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




        <div class="input-register  col-md-5">
            <label for="firstName" class="form-label">{{ __('Prénom') }}</label>

            <div class="col-md-12">
                <input id="firstName" type="text" class="form-control @error('firstName') is-invalid @enderror"
                    name="firstName" value="{{ $Utilisateur->firstName }}" required autocomplete="firstName" autofocus>

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
                <input id="lastName" type="text" class="form-control @error('lastName') is-invalid @enderror"
                    name="lastName" value="{{ $Utilisateur->lastName }}" required autocomplete="lastName" autofocus>

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
                <input id="tel" type="text" class="form-control @error('tel') is-invalid @enderror" name="tel"
                    value="{{ $Utilisateur->tel }}" required autocomplete="tel" autofocus placeholder="+336-000-000-000">

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
                <input id="fix" type="text" class="form-control @error('fix') is-invalid @enderror" name="fix"
                    value="{{ $Utilisateur->fix }}" required autocomplete="fix" autofocus placeholder="+332-000-000-000">

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
                <input id="job" type="text" class="form-control @error('') is-invalid @enderror" name="job"
                    value="{{ $Utilisateur->job }}" required autocomplete="job" autofocus
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
                <input id="siren" type="text" class="form-control @error('siren') is-invalid @enderror"
                    name="siren" value="{{ $Utilisateur->siren }}" required autocomplete="siren" autofocus>

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
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                    name="email" value="{{ $Utilisateur->email }}" required autocomplete="email">

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        {{--
        <div class="input-register  col-md-5">
            <label for="password" class="form-label">{{ __('Mot de passe') }}</label>

            <div class="col-md-12">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                    name="password" required autocomplete="new-password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>


        <div class="input-register  col-md-5">
            <label for="password-confirm" class="form-label">{{ __('Confirmer le mot de passe') }}</label>

            <div class="col-md-12">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required
                    autocomplete="new-password">
            </div>

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div> --}}

        <div class="input-register col-md-10  mt-2 ">
            <div class="col-md-12 d-flex  justify-content-center">

                <button type="submit" class="w-50  mx-4 btn btn-success">
                    {{ __('Ajouter') }}
                </button>

            </div>
        </div>

    </form>
@endsection
