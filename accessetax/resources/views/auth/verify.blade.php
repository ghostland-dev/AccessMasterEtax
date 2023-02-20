@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verifier l\'adresse e-mail') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('un nouveau lien de réinitialisation a été envoyé') }}
                        </div>
                    @endif

                    {{ __('avant de continuer , veuillez verifier votre adresse E-mail') }}
                    {{ __('Si vous n\'avez pas recu aucun lien ? ') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('Renvoyer le lien') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
