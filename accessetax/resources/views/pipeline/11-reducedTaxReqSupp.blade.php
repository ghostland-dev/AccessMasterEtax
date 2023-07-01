@extends('layouts.pipeline')
@section('pipeline')
    @include('layouts.partials.timeline', ['step' => Auth::user()->etape ?? 10])
@endsection
