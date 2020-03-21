@extends('_layouts.app')

@section('header')
    @include('_partials.header')
@endsection

@section('search')
    @include('_partials.search')
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xs-12  col-md-8">
                @yield('left-column')
            </div>

            <div class="col-xs-12  col-md-4">
                @yield('right-column')
            </div>
        </div>
    </div>
@endsection

@section('copyrights')
    @include('_partials.copyrights')
@endsection