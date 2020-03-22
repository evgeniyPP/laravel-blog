@extends('_layouts.1column')

@section('title', 'Зарегистрироваться')

@section('stylesheets')
    <link rel="stylesheet" href={{asset('storage/stylesheets/main.css?1')}} />
    <link rel="stylesheet" href={{asset('storage/stylesheets/forms.css')}} />
@endsection

@section('center-column')
    @include('_html.auth.signup', [
        'method' => $form->method(),
        'fields' => $form->fields()
    ])
@endsection