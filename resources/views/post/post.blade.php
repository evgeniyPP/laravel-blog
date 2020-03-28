@extends('_layouts.1column')

@section('title', $post->title)

@section('stylesheets')
    <link rel="stylesheet" href={{asset('storage/stylesheets/main.css?1')}} />
    <style>
        .warning {
            background: red;
            color: white;
            font-weight: bold;
            text-align: center;
            padding: 1rem 0;
            border-radius: 5px;
        }
    </style>
@endsection

@section('center-column')
    @include('_html.post.post', [
        'id' => $post->id,
        'title' => $post->title,
        'date' => $post->updated_at,
        'content' => $post->content,
        'is_approved' => $post->is_approved
    ])
@endsection