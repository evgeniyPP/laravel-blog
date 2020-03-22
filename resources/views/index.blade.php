@extends('_layouts.1column')

@section('title', 'Главная')

@section('stylesheets')
    <link rel="stylesheet" href={{ asset('storage/stylesheets/main.css?1') }} />
@endsection

@section('center-column')
    @forelse ($posts as $post)
        @include('_html.single_post', [
            'id' => $post->id,
            'title' => $post->title,
            'date' => $post->updated_at,
        ])
    @empty
        <h2>Постов нет</h2>
    @endforelse
@endsection

{{-- @section('right-column')
    @include('_partials.sidebar')
@endsection --}}