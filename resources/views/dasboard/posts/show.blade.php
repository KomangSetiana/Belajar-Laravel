@extends('dasboard.layouts.main')

@section('container')
<div class="container">
    <div class="row my-3">
        <div class="col-lg-8">

            <h2 class="mb-3">{{ $post->tittle }}</h2>
            <h5>{{ $post->autor }}</h5>
            
           <a href="/dasboard/posts" class="btn btn-success"> <span data-feather="arrow-left"></span> Back To My Posts</a>
           <a href="/dasboard/posts/{{ $post->slug }}/edit" class="btn btn-warning"> <span data-feather="edit"></span> Edit</a>
           <form action="/dasboard/posts/{{ $post->slug }}" method="POST" class="d-inline">
            @method('delete')
            @csrf
            <button class="btn btn-danger" onclick="return confirm('Are you sure?')"><span data-feather="x-circle"></span> Delete</a> </button>
           </form>
           @if($post->image)
           <div>
                <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->category->name }}" class="img-fluid mt-3">
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