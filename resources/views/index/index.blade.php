@extends('_layouts.1column')

@section('title', 'Главная')

@section('stylesheets')
    <link rel="stylesheet" href={{ asset('storage/stylesheets/main.css?1') }} />
@endsection

@section('center-column')
    @forelse ($posts as $post)
        @include('index.single_post', [
            'id' => $post->id,
            'title' => $post->title,
            'date' => $post->dt,
        ])
    @empty
        <h2>Постов нет</h2>
    @endforelse
@endsection

{{-- @section('right-column')
    @include('_partials.sidebar')
@endsection --}}

@section('scripts')
    <script src={{ asset('storage/js/main.js') }}></script>
@endsection