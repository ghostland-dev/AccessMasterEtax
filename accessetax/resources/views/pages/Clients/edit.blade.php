@extends('layouts.signed')
@section('main')
    <form method="POST" action="{{ route('client.update', $client->id) }}" enctype="multipart/form-data">
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

        <div class="    gap-2">
            <label for="profile" class="form-label">{{ __('Profile') }}</label>

            <div class="">
                <img class="img-fluid rounded-circle m-2" src="{{ $client->profile }}" alt="" srcset=""
                    style="height:150px; width:150px;">
                <input id="profile" type="file" class="form-control ti ti-file @error('profile') is-invalid @enderror"
                    name="profile" value="{{ $client->profile }}" autocomplete="profile" autofocus>


                @error('profile')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="grid gap-2 grid-cols-1 lg:grid-cols-3 md:grid-cols-2 sm:grid-cols-1  ">
            <div class="  ">
                <label for="userName" class="form-label">{{ __('Nom client') }}</label>

                <div class="">
                    <input id="userName" type="text" class="form-control @error('userName') is-invalid @enderror"
                        name="userName" value="{{ $client->userName }}" required autocomplete="userName" autofocus>

                    @error('userName')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            @if (Auth::user()->role == 'commercial')
                <div class="  ">
                    <label for="role" class="form-label">{{ __('Role') }}</label>
                    <div class="">


                        <select id="role" class="form-control @error('role') is-invalid @enderror" name="role"
                            value="{{ old('role') }}" required autocomplete="role" autofocus>

                            <option>
                                Selectionnez un role
                            </option>

                            <option value="client" {{ $client->role == 'client' ? 'selected' : '' }}> Client </option>
                            <option value="visiteur" {{ $client->role == 'visiteur' ? 'selected' : '' }}> Visieteur
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




            <div class="  ">
                <label for="firstName" class="form-label">{{ __('Prénom') }}</label>

                <div class="">
                    <input id="firstName" type="text" class="form-control @error('firstName') is-invalid @enderror"
                        name="firstName" value="{{ $client->firstName }}" required autocomplete="firstName" autofocus>

                    @error('firstName')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="  ">
                <label for="lastName" class="form-label">{{ __('Nom') }}</label>

                <div class="">
                    <input id="lastName" type="text" class="form-control @error('lastName') is-invalid @enderror"
                        name="lastName" value="{{ $client->lastName }}" required autocomplete="lastName" autofocus>

                    @error('lastName')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="  ">
                <label for="tel" class="form-label">{{ __('Mobile') }}</label>

                <div class="">
                    <input id="tel" type="text" class="form-control @error('tel') is-invalid @enderror"
                        name="tel" value="{{ $client->tel }}" required autocomplete="tel" autofocus
                        placeholder="+336-000-000-000">

                    @error('lastName')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="  ">
                <label for="fix" class="form-label">{{ __('Fix') }}</label>

                <div class="">
                    <input id="fix" type="text" class="form-control @error('fix') is-invalid @enderror"
                        name="fix" value="{{ $client->fix }}" required autocomplete="fix" autofocus
                        placeholder="+332-000-000-000">

                    @error('fix')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>


            <div class="  ">
                <label for="job" class="form-label">{{ __('Fonction') }}</label>

                <div class="">
                    <input id="job" type="text" class="form-control @error('') is-invalid @enderror"
                        name="job" value="{{ $client->job }}" required autocomplete="job" autofocus
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

                <div class="">
                    <input id="siren" type="text" class="form-control @error('siren') is-invalid @enderror"
                        name="siren" value="{{ $client->siren }}" required autocomplete="siren" autofocus>

                    @error('siren')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="  ">
                <label for="email" class="form-label">{{ __('Adresse E-mail') }}</label>

                <div class="">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                        name="email" value="{{ $client->email }}" required autocomplete="email">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

        </div>
        {{--
        <div class="  ">
            <label for="password" class="form-label">{{ __('Mot de passe') }}</label>

            <div class="">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                    name="password" required autocomplete="new-password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>


        <div class="  ">
            <label for="password-confirm" class="form-label">{{ __('Confirmer le mot de passe') }}</label>

            <div class="">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required
                    autocomplete="new-password">
            </div>

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div> --}}

        <div class="    mt-2 ">
            <div class=" d-flex  justify-content-center">

                <button type="submit" class="   mx-auto btn btn-success">
                    {{ __('Mettre à jour ') }}
                </button>

            </div>
        </div>

    </form>
@endsection
