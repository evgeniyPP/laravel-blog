@extends('_layouts.1column')

@section('title', $post->title)

@section('stylesheets')
    <link rel="stylesheet" href={{asset('storage/stylesheets/main.css?1')}} />
@endsection

@section('center-column')
    @include('post.post-layout', [
        'id' => $post->id,
        'title' => $post->title,
        'date' => $post->dt,
        'content' => $post->content,
    ])
@endsection

@section('scripts')
    <script src={{ asset('storage/js/main.js') }}></script>
@endsection