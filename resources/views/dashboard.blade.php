<?php

use App\Models\Post;

$posts = Post::orderBy('published_at', 'desc')->take(5)->get();
?>

<x-app-layout>
    <header class="mb-5">
        <nav class="navbar navbar-expand-lg navbar-light bg-success">
            <div class="container-fluid">
                <h2 class="text-success-subtle bg-success text-center py-1">
                    {{ __('Usuario: ') }}{{ Auth::user()->name }}
                </h2>
            </div>
        </nav>
    </header>

    <div class="container">
        <div class="bg-light rounded shadow-sm p-4 mb-5">
            <div class="p-6 text-gray-900">
                <h4>{{ __("Bienvenido a Guarderia Joseph Lancaster!") }}</h4>
                <br>
                <p>{{ Auth::user()->name }}</p>
            </div>

            <div class="p-6 text-gray-900">
                <h4>Últimos Avisos:</h4>
                <ul>
                    @foreach ($posts as $post)
                    <div class="card-body bg-white">
                        <div class="alert bg-success-subtle text-dark">
                            <strong>Title:</strong>
                            {{ $post->title }}
                        </div>
                        <div class="alert bg-success-subtle text-dark">
                            <strong>Content:</strong>
                            {{ $post->content }}
                        </div>
                        <div class="alert bg-success-subtle text-dark">
                            <strong>Publicado el:</strong>
                            {{ $post->created_at }}
                        </div>
                    </div>
                    <hr>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</x-app-layout>