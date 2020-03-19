@extends('layouts.app')

@section('title', "Пост №$id")

@section('content')
    <div class="flex-center position-ref full-height">
        <div class="content">
            <div class="title m-b-md">
                There will be post #{{$id}}
            </div>
        </div>
    </div>
@endsection