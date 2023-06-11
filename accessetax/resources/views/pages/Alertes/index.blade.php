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
                                            <div class="alert bg-light-gray text-success text-center" role="alert">
                                                <i class="fa fa-trash"></i> {{ session('status') }}
                                            </div>
                                        @endif
                                        <div class="grid gap-3 grid-cols-3 lg:grid-cols-3 md:grid-cols-3  sm:grid-cols-1">
                                            @foreach ($modelData as $alerte)
                                                <div class="  card p-3  " role="alert" aria-live="assertive"
                                                    aria-atomic="true">
                                                    <div class="container-fluid">
                                                        <div class="flex justify-between w-ful">
                                                            <i class="btn btn-light-success ti ti-bell-ringing"></i>
                                                            <form action="{{ route('alerte.destroy', $alerte->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                <input type="hidden" name="_method" value="DELETE">
                                                                <button type="submit"
                                                                    class="p-1   bg-red-50 text-red-600 rounded-full"><i
                                                                        class="fa fa-close"></i></button>

                                                            </form>
                                                        </div>
                                                        <div class="bg-slate-50   min-h-[6em] p-2 my-2 rounded-2">
                                                            <div class="toast-header  ">{{ $alerte->nom_alerte }} </div>
                                                            <div class="toast-body">
                                                                {{ $alerte->description_alerte }}
                                                                <span class=" "> {{ $alerte->type_alerte }}</span>
                                                            </div>
                                                        </div>

                                                    </div>

                                                </div>
                                            @endforeach
                                        </div>


                                        <div class="mt-4">
                                            {{ $modelData->links('vendor.pagination.tailwind') }}
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
