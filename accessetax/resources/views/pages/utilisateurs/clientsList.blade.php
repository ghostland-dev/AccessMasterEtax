@extends('layouts.signed')
@section('main')
    <div class="container p-2">


        <button class="btn btn-success" data-bs-target="#exampleModalToggle" data-bs-toggle="modal"> + Nouveau
            Utilisateur</button>
        <!--end col-->

        <!--end row-->

        <div class="container-fluid">

            <!--- //FIXME:  fix the flow  -->
            <div class="row">
                <div class="  grid lg:grid-cols-2 md:grid-cols-2 sm:grid-cols-2 my-4  " id="v-pills-tab" role="tablist"
                    aria-orientation="vertical">
                    <button
                        class=" bg-slate-500 font-semibold text-emerald-400  active  rounded-md m-2 p-3 active:bg-emerald-400 active:text-white
                     "
                        id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button"
                        role="tab" aria-controls="v-pills-home" aria-selected="true">Clients</button>
                    <button
                        class=" bg-slate-500 font-semibold text-emerald-400    rounded-md m-2 p-3 active:bg-emerald-400 active:text-white
                    "
                        id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button"
                        role="tab" aria-controls="v-pills-profile" aria-selected="false">Visiteurs</button>


                </div>
                <div class="tab-content" id="v-pills-tabContent">

                    <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel"
                        aria-labelledby="v-pills-home-tab" tabindex="0">

                        <table class="table align-middle mb-0 bg-white">
                            <thead class="bg-light">
                                <tr>
                                    <th>ID</th>

                                    <th>Nom Complet</th>
                                    <th>Contact</th>
                                    <th>Fonction</th>
                                    <th>Entreprise</th>
                                    <th>Role</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($clients as $client)
                                    <tr>
                                        <td>
                                            <p class="fw-normal mb-1">
                                                {{ $client->id }}</p>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <img src="{{ $client->profile }}" class="rounded-circle" alt=""
                                                    style="width: 45px; height: 45px" />
                                                <div class="ms-3">
                                                    <p class="fw-bold mb-1">
                                                        {{ $client->firstName . ' ' . $client->lastName }}
                                                    </p>
                                                    <p class="text-muted mb-0">
                                                        {{ $client->email }}
                                                    </p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <p class="fw-normal mb-1">
                                                {{ $client->tel }}</p>
                                            <p class="text-muted mb-0">
                                                {{ $client->fix }}</p>
                                        </td>
                                        <td>
                                            <span>{{ $client->job }}</span>
                                        </td>
                                        <td>{{ $client->siren }}</td>
                                        <td>
                                            <span> {{ $client->role }} </span>
                                        </td>
                                        <td>

                                            <div class="dropdown">
                                                <button class="btn btn-success dropdown-toggle" type="button"
                                                    id="actionsDropdown{{ $client->id }}" data-bs-toggle="dropdown"
                                                    aria-expanded="true">
                                                    <i class="fa fa-cog"></i>
                                                </button>
                                                <ul class="dropdown-menu"
                                                    aria-labelledby="actionsDropdown{{ $client->id }}">
                                                    <li><a class="dropdown-item"
                                                            href="{{ route('utilisateur.show', $client->id) }}"
                                                            target="_blank"
                                                            rel=" bg-slate-800 text-emerald-400 p-2 rounded-smoopener noreferrer"><i
                                                                class="fa fa-eye"></i>
                                                            Détails</a></li>
                                                    <li><a class="dropdown-item"
                                                            href="{{ route('utilisateur.edit', $client->id) }}"
                                                            target="_blank" rel="noopener noreferrer"><i
                                                                class="fa fa-pen"></i>
                                                            Modifier</a></li>
                                                    <li>
                                                        <form method="POST"
                                                            action="{{ route('utilisateur.destroy', $client->id) }}">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="dropdown-item"><i
                                                                    class="fa fa-trash"></i>
                                                                Supprimer</button>
                                                        </form>
                                                    </li>
                                                </ul>
                                            </div>

                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>

                    <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab"
                        tabindex="0">


                        <table class="table align-middle mb-0 bg-white">
                            <thead class="bg-light">
                                <tr>
                                    <th>ID</th>

                                    <th>Nom Complet</th>
                                    <th>Contact</th>
                                    <th>Fonction</th>
                                    <th>Entreprise</th>
                                    <th>Role</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($visiteurs as $visiteur)
                                    <tr>
                                        <td>
                                            <p class="fw-normal mb-1">
                                                {{ $visiteur->id }}</p>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <img src="{{ $visiteur->profile }}" class="rounded-circle" alt=""
                                                    style="width: 45px; height: 45px" />
                                                <div class="ms-3">
                                                    <p class="fw-bold mb-1">
                                                        {{ $visiteur->firstName . ' ' . $visiteur->lastName }}
                                                    </p>
                                                    <p class="text-muted mb-0">
                                                        {{ $visiteur->email }}
                                                    </p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <p class="fw-normal mb-1">
                                                {{ $visiteur->tel }}</p>
                                            <p class="text-muted mb-0">
                                                {{ $visiteur->fix }}</p>
                                        </td>
                                        <td>
                                            <span>{{ $visiteur->job }}</span>
                                        </td>
                                        <td>{{ $visiteur->siren }}</td>
                                        <td>
                                            <span> {{ $visiteur->role }} </span>
                                        </td>
                                        <td>

                                            <div class="dropdown">
                                                <button class="btn btn-success dropdown-toggle" type="button"
                                                    id="actionsDropdown{{ $visiteur->id }}" data-bs-toggle="dropdown"
                                                    aria-expanded="true">
                                                    <i class="fa fa-cog"></i>
                                                </button>
                                                <ul class="dropdown-menu"
                                                    aria-labelledby="actionsDropdown{{ $visiteur->id }}">
                                                    <li><a class="dropdown-item"
                                                            href="{{ route('utilisateur.show', $visiteur->id) }}"
                                                            target="_blank" rel="noopener noreferrer"><i
                                                                class="fa fa-eye"></i>
                                                            Détails</a></li>
                                                    <li><a class="dropdown-item"
                                                            href="{{ route('utilisateur.edit', $visiteur->id) }}"
                                                            target="_blank" rel="noopener noreferrer"><i
                                                                class="fa fa-pen"></i>
                                                            Modifier</a></li>
                                                    <li>
                                                        <form method="POST"
                                                            action="{{ route('utilisateur.destroy', $visiteur->id) }}">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="dropdown-item"><i
                                                                    class="fa fa-trash"></i>
                                                                Supprimer</button>
                                                        </form>
                                                    </li>
                                                </ul>
                                            </div>

                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>

                    </div>


                </div>
            </div>
            <div class="row mt-4 pt-2 d-md-none text-center">
                <a href="#" class="btn btn-primary">View more Jobs <svg xmlns="http://www.w3.org/2000/svg"
                        width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="feather feather-arrow-right fea icon-sm">
                        <line x1="5" y1="12" x2="19" y2="12"></line>
                        <polyline points="12 5 19 12 12 19"></polyline>
                    </svg></a>
            </div>

            <!--end col-->


            <!--end col-->
            <div class="modal modal-xl fade" id="exampleModalToggle" aria-hidden="true"
                aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">

                        <div class="modal-body">
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>

                            <div class="row justify-content-center w-100  ">
                                <div class="row">
                                    <div class="card">

                                        <h5 class="modal-title    bg-light text-center p-3 rounded-md m-2 rounded-2 text-success"
                                            id="exampleModalToggleLabel"> Nouveau utilisateur</h5>

                                        <form class=" grid gap-3 grid-cols-1 lg:grid-cols-3 md:grid-cols-3 sm:grid-cols-1 "
                                            method="POST" action="{{ route('utilisateur.store') }}"
                                            enctype="multipart/form-data">
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
                                                        <input id="dropzone-file" name="profile" id="profile"
                                                            type="file" class="hidden" />
                                                    </label>
                                                </div>

                                            </div>

                                            <div class="">
                                                <label for="userName"
                                                    class="form-label">{{ __('Nom utilisateur') }}</label>

                                                <div class="">
                                                    <input id="userName" type="text"
                                                        class="border border-gray-400 p-2 w-full rounded-md @error('userName') is-invalid @enderror"
                                                        name="userName" value="{{ old('userName') }}" required
                                                        autocomplete="userName" autofocus>

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
                                                            name="role" value="{{ old('role') }}" required
                                                            autocomplete="role" autofocus>

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
                                                        name="firstName" value="{{ old('firstName') }}" required
                                                        autocomplete="firstName" autofocus>

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
                                                        name="lastName" value="{{ old('lastName') }}" required
                                                        autocomplete="lastName" autofocus>

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
                                                        name="tel" value="{{ old('tel') }}" required
                                                        autocomplete="tel" autofocus placeholder="+336-000-000-000">

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
                                                        name="fix" value="{{ old('fix') }}" required
                                                        autocomplete="fix" autofocus placeholder="+332-000-000-000">

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
                                                        name="job" value="{{ old('job') }}" required
                                                        autocomplete="job" autofocus placeholder="Responsable financier">

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
                                                        name="siren" value="{{ old('siren') }}" required
                                                        autocomplete="siren" autofocus>

                                                    @error('siren')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class=" ">
                                                <label for="email"
                                                    class="form-label">{{ __('Adresse E-mail') }}</label>

                                                <div class="">
                                                    <input id="email" type="email"
                                                        class="border border-gray-400 p-2 w-full rounded-md @error('email') is-invalid @enderror"
                                                        name="email" value="{{ old('email') }}" required
                                                        autocomplete="email">

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
                                                <label for="password-confirm"
                                                    class="form-label">{{ __('Confirmer le mot de passe') }}</label>

                                                <div class="">
                                                    <input class="border border-gray-400 p-2 w-full rounded-md"
                                                        id="password-confirm" type="password" class=""
                                                        name="password_confirmation" required autocomplete="new-password">
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

                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
