@extends('_layouts.1column')

@section('title', $post->title)

@section('stylesheets')
    <link rel="stylesheet" href={{asset('storage/stylesheets/main.css?1')}} />
@endsection

@section('center-column')
    @include('_html.post.post', [
        'id' => $post->id,
        'title' => $post->title,
        'date' => $post->updated_at,
        'content' => $post->content,
    ])
@endsection