@extends('layouts.app')
@section('content')

    <div class="row justify-content-center w-100  ">
        <div class="row">
            <div class="card">

                <h5 class="modal-title    bg-light text-center p-3 rounded-md m-2 rounded-2 text-success"
                    id="exampleModalToggleLabel"> Nouveau utilisateur</h5>

                <form class=" grid gap-3 grid-cols-1 lg:grid-cols-3 md:grid-cols-3 sm:grid-cols-1 " method="POST"
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

                    <div class="  ">

                        <div class="flex items-center justify-center  h-20 w-full">
                            <label for="dropzone-file"
                                class="flex flex-col items-center  justify-center w-full   border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                <div class="flex flex-col items-center justify-center p-2     ">

                                    <p class="mb-2 text-sm text-gray-500 dark:text-gray-400">
                                        téléverser le profil</p>

                                </div>
                                <input id="dropzone-file" name="profile" id="profile" type="file" class="hidden" />
                            </label>
                        </div>

                    </div>

                    <div class="">
                        <label for="userName" class="form-label">{{ __('Nom utilisateur') }}</label>

                        <div class="">
                            <input id="userName" type="text"
                                class="border border-gray-400 p-2 w-full rounded-md @error('userName') is-invalid @enderror"
                                name="userName" value="{{ old('userName') }}" required autocomplete="userName" autofocus>

                            @error('userName')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    @if (Auth::user()->role == 'administrateur')
                        <div class="">
                            <label for="role" class="form-label">{{ __('Role') }}</label>
                            <div class="">


                                <select id="role"
                                    class="border border-gray-400 p-2 w-full rounded-md @error('role') is-invalid @enderror"
                                    name="role" value="{{ old('role') }}" required autocomplete="role" autofocus>

                                    <option>
                                        Selectionnez un role
                                    </option>
                                    @for ($i = 0; $i < count($roles); $i++)
                                        <option value="{{ $roles[$i] }}">
                                            {{ $roles[$i] }}
                                        </option>
                                    @endfor

                                </select>

                                @error('role')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    @endif




                    <div class="">
                        <label for="firstName" class="form-label">{{ __('Prénom') }}</label>

                        <div class="">
                            <input id="firstName" type="text"
                                class="border border-gray-400 p-2 w-full rounded-md @error('firstName') is-invalid @enderror"
                                name="firstName" value="{{ old('firstName') }}" required autocomplete="firstName"
                                autofocus>

                            @error('firstName')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="">
                        <label for="lastName" class="form-label">{{ __('Nom') }}</label>

                        <div class="">
                            <input id="lastName" type="text"
                                class="border border-gray-400 p-2 w-full rounded-md @error('lastName') is-invalid @enderror"
                                name="lastName" value="{{ old('lastName') }}" required autocomplete="lastName" autofocus>

                            @error('lastName')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="">
                        <label for="tel" class="form-label">{{ __('Mobile') }}</label>

                        <div class="">
                            <input id="tel" type="text"
                                class="border border-gray-400 p-2 w-full rounded-md @error('tel') is-invalid @enderror"
                                name="tel" value="{{ old('tel') }}" required autocomplete="tel" autofocus
                                placeholder="+336-000-000-000">

                            @error('lastName')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="">
                        <label for="fix" class="form-label">{{ __('Fix') }}</label>

                        <div class="">
                            <input id="fix" type="text"
                                class="border border-gray-400 p-2 w-full rounded-md @error('fix') is-invalid @enderror"
                                name="fix" value="{{ old('fix') }}" required autocomplete="fix" autofocus
                                placeholder="+332-000-000-000">

                            @error('fix')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>


                    <div class="">
                        <label for="job" class="form-label">{{ __('Fonction') }}</label>

                        <div class="">
                            <input id="job" type="text"
                                class="border border-gray-400 p-2 w-full rounded-md @error('') is-invalid @enderror"
                                name="job" value="{{ old('job') }}" required autocomplete="job" autofocus
                                placeholder="Responsable financier">

                            @error('job')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="">
                        <label for="siren" class="form-label">{{ __('siren') }}</label>

                        <div class="">
                            <input id="siren" type="text"
                                class="border border-gray-400 p-2 w-full rounded-md @error('siren') is-invalid @enderror"
                                name="siren" value="{{ old('siren') }}" required autocomplete="siren" autofocus>

                            @error('siren')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class=" ">
                        <label for="email" class="form-label">{{ __('Adresse E-mail') }}</label>

                        <div class="">
                            <input id="email" type="email"
                                class="border border-gray-400 p-2 w-full rounded-md @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class=" ">
                        <label for="password" class="form-label">{{ __('Mot de passe') }}</label>

                        <div class="">
                            <input id="password" type="password"
                                class="border border-gray-400 p-2 w-full rounded-md @error('password') is-invalid @enderror"
                                name="password" required autocomplete="new-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>


                    <div class=" ">
                        <label for="password-confirm" class="form-label">{{ __('Confirmer le mot de passe') }}</label>

                        <div class="">
                            <input class="border border-gray-400 p-2 w-full rounded-md" id="password-confirm"
                                type="password" class="" name="password_confirmation" required
                                autocomplete="new-password">
                        </div>

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class=" col-md-10  mt-2 ">
                        <div class=" d-flex  justify-content-center">

                            <button type="submit" class="w-50  mx-4 btn btn-success">
                                {{ __('Soumettre') }}
                            </button>

                        </div>
                    </div>

                </form>

            </div>
        </div>
    </div>

@endsection
