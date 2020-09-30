@extends('layouts.main')

@section('content')
    @include('layouts.errors')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-white shadow-xl sm:rounded-lg">
            <form action="{{ route('posts.store') }}" method="post">
                @csrf
                @livewire('inputs.text', ['name' => 'title', 'label' => 'Post Title'])
                @livewire('inputs.text-area', ['name' => 'description', 'label' => 'Post Content'])
                <label for="published">Publish</label>
                <input type="checkbox" name="published">
                <button type="submit">Publish</button>
            </form>
        </div>
    </div>
@endsection

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Create a new Post
    </h2>
@endsection
