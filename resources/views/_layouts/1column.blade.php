@extends('_layouts.app')

@section('header')
    @include('_partials.header')
@endsection

@section('search')
    @include('_partials.search')
@endsection

@section('content')
    <div class="container">
        @yield('center-column')
    </div>
@endsection

@section('copyrights')
    @include('_partials.copyrights')
@endsection