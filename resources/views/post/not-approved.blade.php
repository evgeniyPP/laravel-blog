@extends('_layouts.1column')

@section('title', 'Песочница')

@section('stylesheets')
    <link rel="stylesheet" href={{ asset('storage/stylesheets/main.css?1') }} />
    <style>
        body > .container {
            min-height: calc(100vh - 92px - 41px);
        }
    </style>
@endsection

@section('center-column')
    @forelse ($posts as $post)
        @include('_html.single_post', [
            'id' => $post->id,
            'title' => $post->title,
            'date' => $post->updated_at,
            'is_approved' => $post->is_approved
        ])
    @empty
        <h2>Постов нет</h2>
    @endforelse
@endsection