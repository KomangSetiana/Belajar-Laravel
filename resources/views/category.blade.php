
@extends('layouts.main')

    @section('container')

    <h1 class="mb-5"> Post Category : {{ $category }}</h1>
   
   @foreach( $posts as $post)

   <article mb-6>
   <a href="/posts{{ $post->slug }}"><h2>{{ $post->tittle }}</h2></a>
   <h5> by:{{ $post->autor }}</h5>
   <p>{{ $post->excerpt }}</p>
    </article> 
   @endforeach
   @endsection
