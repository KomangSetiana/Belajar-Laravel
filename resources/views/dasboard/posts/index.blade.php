@extends('dasboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2"> My Posts</h1>
</div>

@if (session()->has('success'))
<div class="alert alert-success col-lg-8" role="alert">
  {{ session('success') }}
</div>
@endif
<div class="table-responsive col-lg-8">
  <a href="/dasboard/posts/create" class="btn btn-primary mb-3">Create New Post</a>
<table class="table table-striped table-sm">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Tittle</th>
        <th scope="col">Category</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($posts as $post)
            
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $post->tittle }}</td>
          <td>{{ $post->category->name }}</td>
          <td>
              <a href="/dasboard/posts/{{ $post->slug }}" class="badge bg-info"><span data-feather="eye"></span></a>
              <a href="/dasboard/posts/{{ $post->slug }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
              <form action="/dasboard/posts/{{ $post->slug }}" method="POST" class="d-inline">
              @method('delete')
              @csrf
              <button class="badge bg-danger border-0" onclick=" return confirm('Are you sure?')"><span data-feather="x-circle"></span></button>
              </form>
          </td>
      </tr>
    </div>
        @endforeach
    </tbody>
  </table>
    
@endsection