@extends('_layouts.1column')

@section('title', 'Сообщение отправлено')

@section('stylesheets')
    <link rel="stylesheet" href={{asset('storage/stylesheets/main.css?1')}} />
@endsection

@section('center-column')
    @include('_html.feedback.success')
@endsection