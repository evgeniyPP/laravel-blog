@extends('_layouts.1column')

@section('title', "Редактировать пост №{$id}")

@section('stylesheets')
    <link rel="stylesheet" href={{asset('storage/stylesheets/main.css?1')}} />
    <link rel="stylesheet" href={{asset('storage/stylesheets/add-edit.css')}} />
@endsection

@section('center-column')
    @include('post.edit-layout', [
        'method' => $form->method(),
        'fields' => $form->fields()
    ])
@endsection

@section('scripts')
    <script src={{ asset('storage/js/main.js') }}></script>
@endsection