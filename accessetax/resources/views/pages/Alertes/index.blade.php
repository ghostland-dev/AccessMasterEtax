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
                                            <div class="alert bg-light-success text-success text-center" role="alert">
                                                <i class="fa fa-trash"></i> {{ session('status') }}
                                            </div>
                                        @endif
                                        <div class="row">
                                            @foreach ($modelData as $alerte)
                                                <div class="card p-3  " role="alert  " aria-live="assertive"
                                                    aria-atomic="true">
                                                    <div class="container">

                                                        <i class="ti ti-bell-ringing"></i>
                                                        <div class="toast-header  ">


                                                        </div>
                                                        <div class="toast-body">
                                                            {{ $alerte->description_alerte }}
                                                        </div>
                                                    </div>
                                                    <form action="{{ route('alerte.destroy', $alerte->id) }}"
                                                        method="POST">

                                                        @csrf
                                                        <input type="hidden" name="_method" value="DELETE">
                                                        <button type="submit" class="btn btn-success my-2"><i
                                                                class="fa fa-close"></i></button>

                                                    </form>
                                                </div>

                                                {{-- @if ($alerte->id == 5)
                                    @break --}}
                                                {{-- @endif --}}
                                            @endforeach
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
