@extends('layouts.conntected')
@section('subcontent')
    <div class="container p-2">



        <button class="btn btn-success" data-bs-target="#exampleModalToggle" data-bs-toggle="modal"> + Nouveau
            Utilisateur</button>
        <!--end col-->

        <!--end row-->

        <div class="container-fluid">

            <!--- //FIXME:  fix the flow  -->
            <div class="row">
                <div class="  grid lg:grid-cols-4 md:grid-cols-2 sm:grid-cols-2 my-4  " id="v-pills-tab" role="tablist"
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

                    <button
                        class="bg-slate-500 font-semibold text-emerald-400    rounded-md m-2 p-3 active:bg-emerald-400 active:text-white
                    "
                        id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#v-pills-messages" type="button"
                        role="tab" aria-controls="v-pills-messages" aria-selected="false">Commerciaux</button>
                    <button
                        class="bg-slate-500 font-semibold text-emerald-400    rounded-md m-2 p-3 active:bg-emerald-400 active:text-white
                    "
                        id="v-pills-settings-tab" data-bs-toggle="pill" data-bs-target="#v-pills-settings" type="button"
                        role="tab" aria-controls="v-pills-settings" aria-selected="false">Adminisrateur</button>
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

                    <div class="tab-pane fade" id="v-pills-messages" role="tabpanel"
                        aria-labelledby="v-pills-messages-tab" tabindex="0">



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

                                @foreach ($commerciaux as $commercial)
                                    <tr>
                                        <td>
                                            <p class="fw-normal mb-1">
                                                {{ $commercial->id }}</p>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <img src="{{ $commercial->profile }}" class="rounded-circle"
                                                    alt="" style="width: 45px; height: 45px" />
                                                <div class="ms-3">
                                                    <p class="fw-bold mb-1">
                                                        {{ $commercial->firstName . ' ' . $commercial->lastName }}
                                                    </p>
                                                    <p class="text-muted mb-0">
                                                        {{ $commercial->email }}
                                                    </p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <p class="fw-normal mb-1">
                                                {{ $commercial->tel }}</p>
                                            <p class="text-muted mb-0">
                                                {{ $commercial->fix }}</p>
                                        </td>
                                        <td>
                                            <span>{{ $commercial->job }}</span>
                                        </td>
                                        <td>{{ $commercial->siren }}</td>
                                        <td>
                                            <span> {{ $commercial->role }} </span>
                                        </td>
                                        <td>

                                            <div class="dropdown">
                                                <button class="btn btn-success dropdown-toggle" type="button"
                                                    id="actionsDropdown{{ $commercial->id }}" data-bs-toggle="dropdown"
                                                    aria-expanded="true">
                                                    <i class="fa fa-cog"></i>
                                                </button>
                                                <ul class="dropdown-menu"
                                                    aria-labelledby="actionsDropdown{{ $commercial->id }}">
                                                    <li><a class="dropdown-item"
                                                            href="{{ route('utilisateur.show', $commercial->id) }}"
                                                            target="_blank" rel="noopener noreferrer"><i
                                                                class="fa fa-eye"></i>
                                                            Détails</a></li>
                                                    <li><a class="dropdown-item"
                                                            href="{{ route('utilisateur.edit', $commercial->id) }}"
                                                            target="_blank" rel="noopener noreferrer"><i
                                                                class="fa fa-pen"></i>
                                                            Modifier</a></li>
                                                    <li>
                                                        <form method="POST"
                                                            action="{{ route('utilisateur.destroy', $commercial->id) }}">
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
                    <div class="tab-pane fade" id="v-pills-settings" role="tabpanel"
                        aria-labelledby="v-pills-settings-tab" tabindex="0">


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

                                @foreach ($administrateurs as $admin)
                                    <tr>
                                        <td>
                                            <p class="fw-normal mb-1">
                                                {{ $admin->id }}</p>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <img src="{{ $admin->profile }}" class="rounded-circle" alt=""
                                                    style="width: 45px; height: 45px" />
                                                <div class="ms-3">
                                                    <p class="fw-bold mb-1">
                                                        {{ $admin->firstName . ' ' . $admin->lastName }}
                                                    </p>
                                                    <p class="text-muted mb-0">
                                                        {{ $admin->email }}
                                                    </p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <p class="fw-normal mb-1">
                                                {{ $admin->tel }}</p>
                                            <p class="text-muted mb-0">
                                                {{ $admin->fix }}</p>
                                        </td>
                                        <td>
                                            <span>{{ $admin->job }}</span>
                                        </td>
                                        <td>{{ $admin->siren }}</td>
                                        <td>
                                            <span> {{ $admin->role }} </span>
                                        </td>
                                        <td>

                                            <div class="dropdown">
                                                <button class="btn btn-success dropdown-toggle" type="button"
                                                    id="actionsDropdown{{ $admin->id }}" data-bs-toggle="dropdown"
                                                    aria-expanded="true">
                                                    <i class="fa fa-cog"></i>
                                                </button>
                                                <ul class="dropdown-menu"
                                                    aria-labelledby="actionsDropdown{{ $admin->id }}">
                                                    <li><a class="dropdown-item"
                                                            href="{{ route('utilisateur.show', $admin->id) }}"
                                                            target="_blank" rel="noopener noreferrer"><i
                                                                class="fa fa-eye"></i>
                                                            Détails</a></li>
                                                    <li><a class="dropdown-item"
                                                            href="{{ route('utilisateur.edit', $admin->id) }}"
                                                            target="_blank" rel="noopener noreferrer"><i
                                                                class="fa fa-pen"></i>
                                                            Modifier</a></li>
                                                    <li>
                                                        <form method="POST"
                                                            action="{{ route('utilisateur.destroy', $admin->id) }}">
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

                            <div class="row justify-content-center w-100">
                                <div class="row">
                                    <div class="card   ">

                                        <h1 class="modal-title    bg-light-success text-center p-2 m-2 rounded-2 text-success"
                                            id="exampleModalToggleLabel"> Nouveau utilisateur</h1>

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

                                            <div class="input-registers  col-md-12">

                                                <!-- If you wish to reference an existing file (i.e. from your database), pass the url into imageData() -->
                                                <div x-data="imageData()" class="file-input d-flex items-center">

                                                    <!-- Preview Image -->
                                                    <div class=" rounded-circle overflow-hidden bg-gray-100">
                                                        <!-- Placeholder image -->
                                                        <div x-show="!previewPhoto">
                                                            <svg class="w-30 text-gray-300" fill="currentColor"
                                                                viewBox="0 0 24 24">
                                                                <path
                                                                    d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" />
                                                            </svg>
                                                        </div>
                                                        <!-- Show a preview of the photo -->
                                                        <div x-show="previewPhoto">
                                                            <img :src="previewPhoto" alt="" width=150
                                                                class="image-fluid">
                                                        </div>
                                                    </div>

                                                    <div class="flex items-center">
                                                        <!-- File Input -->
                                                        <div class="ml-5 rounded-md shadow-sm">
                                                            <!-- Replace the file input styles with our own via the label -->
                                                            <input @change="updatePreview($refs)" x-ref="input"
                                                                type="file" accept="image/*,capture=camera"
                                                                name="profile" id="profile" class="custom">
                                                            <label for="profile"
                                                                class="py-2 px-3 border text-center border-gray-300 rounded-md text-sm leading-4 font-medium text-gray-700 hover:text-indigo-500 hover:border-indigo-300 focus:outline-none focus:border-indigo-300 focus:shadow-outline-indigo active:bg-gray-50 active:text-indigo-800 transition duration-150 ease-in-out">
                                                                Téléverser l'image
                                                            </label>
                                                        </div>
                                                        <div class="flex items-center text-sm text-gray-500 mx-2">
                                                            <!-- Display the file name when available -->
                                                            <span x-text="fileName || emptyText"></span>
                                                            <!-- Removes the selected file -->
                                                            <button x-show="fileName" @click="clearPreview($refs)"
                                                                type="button" aria-label="Remove image"
                                                                class="mx-1 mt-1">
                                                                <svg viewBox="0 0 20 20" fill="currentColor"
                                                                    class="x-circle w-4 h-4" aria-hidden="true"
                                                                    focusable="false">
                                                                    <path fill-rule="evenodd"
                                                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293
  1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                                                                        clip-rule="evenodd"></path>
                                                                </svg>
                                                            </button>
                                                        </div>
                                                        @error('profile')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror

                                                    </div>

                                                </div>
                                            </div>



                                            {{-- <div class="input-registers  col-md-10 ">
                                                <div class="file w-80 is-primary is-boxed">
                                                    <label class="file-label w-100">
                                                        <input class="file-input @error('profile') is-invalid @enderror"
                                                            type="file" name="profile">
                                                        <span class="file-cta">
                                                            <span class="file-icon">
                                                                <i class="fas fa-cloud-upload-alt"></i>
                                                            </span>
                                                            <span class="file-label ">
                                                                Profile de l'utilisateur
                                                            </span>
                                                        </span>
                                                    </label>
                                                    @error('profile')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div> --}}
                                            <div class="input-registers  col-md-5">
                                                <label for="userName"
                                                    class="form-label">{{ __('Nom utilisateur') }}</label>

                                                <div class="col-md-12">
                                                    <input id="userName" type="text"
                                                        class="form-control @error('userName') is-invalid @enderror"
                                                        name="userName" value="{{ old('userName') }}" required
                                                        autocomplete="userName" autofocus>

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
                                                            class="form-control @error('role') is-invalid @enderror"
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
                                                        class="form-control @error('lastName') is-invalid @enderror"
                                                        name="lastName" value="{{ old('lastName') }}" required
                                                        autocomplete="lastName" autofocus>

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
                                                        class="form-control @error('tel') is-invalid @enderror"
                                                        name="tel" value="{{ old('tel') }}" required
                                                        autocomplete="tel" autofocus placeholder="+336-000-000-000">

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
                                                        class="form-control @error('fix') is-invalid @enderror"
                                                        name="fix" value="{{ old('fix') }}" required
                                                        autocomplete="fix" autofocus placeholder="+332-000-000-000">

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
                                                        class="form-control @error('') is-invalid @enderror"
                                                        name="job" value="{{ old('job') }}" required
                                                        autocomplete="job" autofocus placeholder="Responsable financier">

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
                                                        class="form-control @error('siren') is-invalid @enderror"
                                                        name="siren" value="{{ old('siren') }}" required
                                                        autocomplete="siren" autofocus>

                                                    @error('siren')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="input-registers  col-md-3">
                                                <label for="email"
                                                    class="form-label">{{ __('Adresse E-mail') }}</label>

                                                <div class="col-md-12">
                                                    <input id="email" type="email"
                                                        class="form-control @error('email') is-invalid @enderror"
                                                        name="email" value="{{ old('email') }}" required
                                                        autocomplete="email">

                                                    @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="input-registers  col-md-3">
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


                                            <div class="input-registers  col-md-3">
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

        </div>
    </div>
@endsection
