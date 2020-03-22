@extends('_layouts.1column')

@section('title', 'Добавить пост')

@section('stylesheets')
    <link rel="stylesheet" href={{asset('storage/stylesheets/main.css?1')}} />
    <link rel="stylesheet" href={{asset('storage/stylesheets/forms.css')}} />
@endsection

@section('center-column')
    @include('post.add-layout', [
        'method' => $form->method(),
        'fields' => $form->fields()
    ])
@endsection

@section('scripts')
    <script src={{ asset('storage/js/main.js') }}></script>
@endsection