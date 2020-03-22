@extends('_layouts.1column')

@section('title', 'Войти')

@section('stylesheets')
    <link rel="stylesheet" href={{asset('storage/stylesheets/main.css?1')}} />
    <link rel="stylesheet" href={{asset('storage/stylesheets/forms.css')}} />
@endsection

@section('center-column')
    @include('auth.login-layout', [
        'method' => $form->method(),
        'fields' => $form->fields()
    ])
@endsection

@section('scripts')
    <script src={{ asset('storage/js/main.js') }}></script>
@endsection