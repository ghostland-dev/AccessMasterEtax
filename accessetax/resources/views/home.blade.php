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
                                        @foreach ($modelData as $alerte)
                                            <div class="card p-3" role="alert  " aria-live="assertive" aria-atomic="true">
                                                <i class="ti ti-bell-ringing"></i>
                                                <div class="toast-header  ">

                                                    <strong class="me-auto">{{ $alerte->type_alerte }}</strong>
                                                    <small>{{ $alerte->created_at }}</small>
                                                    <button type="button" class="btn-close" data-bs-dismiss="toast"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="toast-body">
                                                    {{ $alerte->description_alerte }}
                                                </div>
                                            </div>

                                            @if ($alerte->id == 5)
                                            @break
                                        @endif
                                    @endforeach
                                    <h5 class="card-title fw-semibold mb-4">une page simple</h5>
                                    <p class="mb-0">Cesi est une page simple </p>
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
