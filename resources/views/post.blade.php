

@extends('layouts.main')
<article>
@section('container')

<div class="container">
    <div class="row justify-content-center mb-5">
        <div class="col-md-8">

            <h2 class="mb-3">{{ $post->tittle }}</h2>
            <h5>{{ $post->autor }}</h5>
            
            <p>by <a href="/blog?author={{ $post->author->name }}" class="text-decoration-none">{{ $post->author->name }}</a> in<a href="/blog?category={{ $post->category->slug }} {{ $post->category->name }} "class="text-decoration-none"></a>
             in <a href="/blog?category={{ $post->category->slug }}" class="text-decoration-none"> {{ $post->category->name }}</a>
                </p>
                @if($post->image)
                <div>
                    <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->category->name }}" class="img-fluid">
                </div>
                @else
                <img src="https://source.unsplash.com/1200x400?{{ $post->category->name }}" alt="{{ $post->category->name }}" class="img-fluid">
                @endif
            
        <article class="my-3 fs-5">
            <p>{!! $post->body !!}</p>
        </article>
            <a href="/blog">Back to Posts</a>
            
        </div>
    </div>
</div>

@endsection