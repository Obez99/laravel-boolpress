@extends('layouts.admin')

@section('content')
<div class="card my-3">
  <strong class="card-header">{{ $post->title }}</strong>
  <div class="card-body">
    <p class="card-text">{{ $post->content }}</p>
    <div class="category-label d-inline-block text-light p-2 rounded" style="background-color:{{$post->category->color}}">{{$post->category->name}}</div>
  </div>
  <div class="card-footer text-muted">
    <span>Pubblicato il {{ $post->created_at }}</span>
    @if($post->created_at != $post->updated_at)
    <span class="ml-5">Modificato il {{$post->updated_at}}</span>
    @endif
  </div>
</div>

      <div class="mt-4 d-flex">
        <a class="btn btn-success" href="{{route("admin.posts.edit", $post->id)}}">Modifica</a>
        <form action="{{route("admin.posts.destroy", $post->id)}}" method="post" class="form-delete">
          @csrf
          @method("DELETE")
          <input type="submit" value="Cancella post" class="btn btn-danger ml-3">
        </form>
        
      </div>
    </div>
@endsection