@extends('layouts.main')

@section('content')
        <div class="py-1 max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4">
                <p>{!! $post->description !!}</p>
            </div>
    </div>
@endsection

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ $post->title }}
    </h2>
@endsection
