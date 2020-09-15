@extends('layouts.main')

@section('content')

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-white shadow-xl sm:rounded-lg">
            <form action="{{ route('posts.update', $post->slug) }}" method="post">
                @method('PUT')
                @csrf
                @livewire('inputs.text', ['name' => 'title', 'label' => 'Post Title', 'value' => $post->title])
                @livewire('inputs.text-area', ['name' => 'description', 'label' => 'Post Content', 'text' => $post->description])
                <label for="published">Publish</label>
                <input type="checkbox" name="published" {{ $post->published ? "checked=checked" : "" }}>
                <button type="submit">Publish</button>
            </form>
            <form action="{{ route('posts.destroy', $post->slug) }}" method="post">
                @method('DELETE')
                @csrf
                <button type="submit">Delete</button>
            </form>
        </div>
    </div>
@endsection

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Create a new Post
    </h2>
@endsection
