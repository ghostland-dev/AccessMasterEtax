@extends('layouts.app')
@section('content')
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
                                                        <h4 class="title mb-4">Liste des usilisateurs </h4>
                                                        <p class="text-muted mb-0 para-desc">Start work with Leaping. Build
                                                            responsive, mobile-first projects on
                                                            the web with the world's most popular front-end component
                                                            library.</p>
                                                    </div>


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

                                            <div class="container-fluid">

                                                <div class="row">
                                                    <div class="nav flex-column nav-pills me-3" id="v-pills-tab"
                                                        role="tablist" aria-orientation="vertical">
                                                        <button class="nav-link active" id="v-pills-home-tab"
                                                            data-bs-toggle="pill" data-bs-target="#v-pills-home"
                                                            type="button" role="tab" aria-controls="v-pills-home"
                                                            aria-selected="true">Clients</button>
                                                        <button class="nav-link" id="v-pills-profile-tab"
                                                            data-bs-toggle="pill" data-bs-target="#v-pills-profile"
                                                            type="button" role="tab" aria-controls="v-pills-profile"
                                                            aria-selected="false">Visiteurs</button>

                                                        <button class="nav-link" id="v-pills-messages-tab"
                                                            data-bs-toggle="pill" data-bs-target="#v-pills-messages"
                                                            type="button" role="tab" aria-controls="v-pills-messages"
                                                            aria-selected="false">Commerciaux</button>
                                                        <button class="nav-link" id="v-pills-settings-tab"
                                                            data-bs-toggle="pill" data-bs-target="#v-pills-settings"
                                                            type="button" role="tab" aria-controls="v-pills-settings"
                                                            aria-selected="false">Adminisrateur</button>
                                                    </div>
                                                    <div class="tab-content" id="v-pills-tabContent">
                                                        <div class="tab-pane fade show active" id="v-pills-home"
                                                            role="tabpanel" aria-labelledby="v-pills-home-tab"
                                                            tabindex="0">

                                                            <table class="table align-middle mb-0 bg-white">
                                                                <thead class="bg-light">
                                                                    <tr>
                                                                        <th>Name</th>
                                                                        <th>Title</th>
                                                                        <th>Status</th>
                                                                        <th>Position</th>
                                                                        <th>Actions</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>

                                                                    @foreach ($clients as $client)
                                                                        <tr>
                                                                            <td>
                                                                                <div class="d-flex align-items-center">
                                                                                    <img src="https://mdbootstrap.com/img/new/avatars/7.jpg"
                                                                                        class="rounded-circle"
                                                                                        alt=""
                                                                                        style="width: 45px; height: 45px" />
                                                                                    <div class="ms-3">
                                                                                        <p class="fw-bold mb-1">Kate
                                                                                            Hunington</p>
                                                                                        <p class="text-muted mb-0">
                                                                                            kate.hunington@gmail.com
                                                                                        </p>
                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <p class="fw-normal mb-1">Designer</p>
                                                                                <p class="text-muted mb-0">UI/UX</p>
                                                                            </td>
                                                                            <td>
                                                                                <span
                                                                                    class="badge badge-warning rounded-pill d-inline">Awaiting</span>
                                                                            </td>
                                                                            <td>Senior</td>
                                                                            <td>

                                                                                <a class="btn btn-success" href="http://"
                                                                                    target="_blank"
                                                                                    rel="noopener noreferrer"><i
                                                                                        class="fa fa-eye"></i></a>
                                                                                <a class="btn btn-warning" href="http://"
                                                                                    target="_blank"
                                                                                    rel="noopener noreferrer"><i
                                                                                        class="fa fa-pen"></i></a>
                                                                                <a class="btn btn-danger" href="http://"
                                                                                    target="_blank"
                                                                                    rel="noopener noreferrer"><i
                                                                                        class="fa fa-trash"></i></a>

                                                                            </td>
                                                                        </tr>
                                                                    @endforeach

                                                                </tbody>
                                                            </table>
                                                        </div>
                                                        <div class="tab-pane fade" id="v-pills-profile" role="tabpanel"
                                                            aria-labelledby="v-pills-profile-tab" tabindex="0">


                                                            <table class="table align-middle mb-0 bg-white">
                                                                <thead class="bg-light">
                                                                    <tr>
                                                                        <th>Name</th>
                                                                        <th>Title</th>
                                                                        <th>Status</th>
                                                                        <th>Position</th>
                                                                        <th>Actions</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>

                                                                    @foreach ($visiteurs as $visiteur)
                                                                        <tr>
                                                                            <td>
                                                                                <div class="d-flex align-items-center">
                                                                                    <img src="https://mdbootstrap.com/img/new/avatars/7.jpg"
                                                                                        class="rounded-circle"
                                                                                        alt=""
                                                                                        style="width: 45px; height: 45px" />
                                                                                    <div class="ms-3">
                                                                                        <p class="fw-bold mb-1">Kate
                                                                                            Hunington</p>
                                                                                        <p class="text-muted mb-0">
                                                                                            kate.hunington@gmail.com
                                                                                        </p>
                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <p class="fw-normal mb-1">Designer</p>
                                                                                <p class="text-muted mb-0">UI/UX</p>
                                                                            </td>
                                                                            <td>
                                                                                <span
                                                                                    class="badge badge-warning rounded-pill d-inline">Awaiting</span>
                                                                            </td>
                                                                            <td>Senior</td>
                                                                            <td>

                                                                                <a class="btn btn-success" href="http://"
                                                                                    target="_blank"
                                                                                    rel="noopener noreferrer"><i
                                                                                        class="fa fa-eye"></i></a>
                                                                                <a class="btn btn-warning" href="http://"
                                                                                    target="_blank"
                                                                                    rel="noopener noreferrer"><i
                                                                                        class="fa fa-pen"></i></a>
                                                                                <a class="btn btn-danger" href="http://"
                                                                                    target="_blank"
                                                                                    rel="noopener noreferrer"><i
                                                                                        class="fa fa-trash"></i></a>

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
                                                                        <th>Name</th>
                                                                        <th>Title</th>
                                                                        <th>Status</th>
                                                                        <th>Position</th>
                                                                        <th>Actions</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>

                                                                    @foreach ($commerciaux as $commercial)
                                                                        <tr>
                                                                            <td>
                                                                                <div class="d-flex align-items-center">
                                                                                    <img src="https://mdbootstrap.com/img/new/avatars/7.jpg"
                                                                                        class="rounded-circle"
                                                                                        alt=""
                                                                                        style="width: 45px; height: 45px" />
                                                                                    <div class="ms-3">
                                                                                        <p class="fw-bold mb-1">Kate
                                                                                            Hunington</p>
                                                                                        <p class="text-muted mb-0">
                                                                                            kate.hunington@gmail.com
                                                                                        </p>
                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <p class="fw-normal mb-1">Designer</p>
                                                                                <p class="text-muted mb-0">UI/UX</p>
                                                                            </td>
                                                                            <td>
                                                                                <span
                                                                                    class="badge badge-warning rounded-pill d-inline">Awaiting</span>
                                                                            </td>
                                                                            <td>Senior</td>
                                                                            <td>

                                                                                <a class="btn btn-success" href="http://"
                                                                                    target="_blank"
                                                                                    rel="noopener noreferrer"><i
                                                                                        class="fa fa-eye"></i></a>
                                                                                <a class="btn btn-warning" href="http://"
                                                                                    target="_blank"
                                                                                    rel="noopener noreferrer"><i
                                                                                        class="fa fa-pen"></i></a>
                                                                                <a class="btn btn-danger" href="http://"
                                                                                    target="_blank"
                                                                                    rel="noopener noreferrer"><i
                                                                                        class="fa fa-trash"></i></a>

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
                                                                        <th>Name</th>
                                                                        <th>Title</th>
                                                                        <th>Status</th>
                                                                        <th>Position</th>
                                                                        <th>Actions</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>

                                                                    @foreach ($administrateurs as $admin)
                                                                        <tr>
                                                                            <td>
                                                                                <div class="d-flex align-items-center">
                                                                                    <img src="https://mdbootstrap.com/img/new/avatars/7.jpg"
                                                                                        class="rounded-circle"
                                                                                        alt=""
                                                                                        style="width: 45px; height: 45px" />
                                                                                    <div class="ms-3">
                                                                                        <p class="fw-bold mb-1">Kate
                                                                                            Hunington</p>
                                                                                        <p class="text-muted mb-0">
                                                                                            kate.hunington@gmail.com
                                                                                        </p>
                                                                                    </div>
                                                                                </div>
                                                                            </td>
                                                                            <td>
                                                                                <p class="fw-normal mb-1">Designer</p>
                                                                                <p class="text-muted mb-0">UI/UX</p>
                                                                            </td>
                                                                            <td>
                                                                                <span
                                                                                    class="badge badge-warning rounded-pill d-inline">Awaiting</span>
                                                                            </td>
                                                                            <td>Senior</td>
                                                                            <td>

                                                                                <a class="btn btn-success" href="http://"
                                                                                    target="_blank"
                                                                                    rel="noopener noreferrer"><i
                                                                                        class="fa fa-eye"></i></a>
                                                                                <a class="btn btn-warning" href="http://"
                                                                                    target="_blank"
                                                                                    rel="noopener noreferrer"><i
                                                                                        class="fa fa-pen"></i></a>
                                                                                <a class="btn btn-danger" href="http://"
                                                                                    target="_blank"
                                                                                    rel="noopener noreferrer"><i
                                                                                        class="fa fa-trash"></i></a>

                                                                            </td>
                                                                        </tr>
                                                                    @endforeach

                                                                </tbody>
                                                            </table>







                                                        </div>
                                                    </div>
                                                </div>



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
