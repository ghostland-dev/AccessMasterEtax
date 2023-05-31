@extends('layouts.app')

@section('content')
    @php
        $step = 5;
        $confirmed = true;
    @endphp

    @include('layouts.partials.timeline')

  

    <div class=" bg-light-success  centred  my-5 py-5">
        <div class="container     pt-4  ">
            <div class="row justify-content-center">

                <div class="col-md-12">
                    <div class="card my-9">


                        <ul class="gap-2 p-4 ">
                            @if ($confirmed == true)
                                <li class="bg-light-success text-success p-3 my-2">

                                    <i class="fa bg-success text-white rounded-circle px-2 py-2 m-1 fa-check"
                                        aria-hidden="true"></i>
                                    <strong> Confirmation:</strong> <span id="returnAlerts">
                                        votre dossier a été envoyé avec succès, ne revenons vers vous dans les plus bref
                                        délai.</span>

                                    <br>
                                    <a href="{{ route('etape6') }}" class="btn btn-dark mt-5" id="returnAlerts"><i
                                            class=" fa fa-check"></i> Continuer</a>

                                </li>
                            @else
                                <li class="bg-light-warning text-warning p-3 my-2">

                                    <i class="fa bg-warning text-white rounded-circle px-2 py-2 m-1 fa-times"
                                        aria-hidden="true"></i>
                                    <strong> Confirmation:</strong> <span id="returnAlerts">
                                        votre dossier a été envoyé avec succès, ne revenons vers vous dans les plus bref
                                        délai.</span>

                                </li>
                            @endif


                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
