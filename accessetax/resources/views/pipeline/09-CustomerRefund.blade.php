@extends('layouts.pipeline')
@section('pipeline')
  @include('layouts.partials.timeline',['step'=>Auth::user()->etape ?? 8])


@endsection
