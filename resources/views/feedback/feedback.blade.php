@extends('_layouts.1column')

@section('title', 'Обратная связь')

@section('stylesheets')
    <link rel="stylesheet" href={{asset('storage/stylesheets/main.css?1')}} />
    <link rel="stylesheet" href={{asset('storage/stylesheets/forms.css')}} />
@endsection

@section('center-column')
    @include('_html.feedback.feedback', [
        'method' => $form->method(),
        'fields' => $form->fields()
    ])
@endsection