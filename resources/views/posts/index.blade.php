@extends('layouts.main')

@section('content')
    {{-- @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif --}}

    @include('layouts.errors')

    @foreach ($posts as $post)
        <div class="py-1 max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4">
                <a href="{{ route('posts.show', $post->slug)}}"><h1>{{ $post->title }}</h1></a><small>{{ $post->user->name }}</small>
                <p>{{ $post->short_description }}</p>
            </div>
        </div>
    @endforeach
@endsection

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Posts
    </h2>
@endsection
