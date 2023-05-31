@extends('layouts.app')

@section('content')
    <div class="container-fluid bg-slate-50 h-screen">
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
                            <div class="container-fluid bg-slate-50">
                                <div class="card">
                                    <div class="card-body">
                                        @if (session('status'))
                                            <div class="alert bg-light-success text-success text-center" role="alert">
                                                <i class="fa fa-trash"></i> {{ session('status') }}
                                            </div>
                                        @endif

                                        @yield('main')


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
