@extends('layouts.admin')

@section('content')
@if(session("msg"))
<div class="alert alert-success d-flex justify-content-between" role="alert">{{session("msg")}} 
  <button type="button" class="close" aria-label="Close" id="closeBtn">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif
<div class="card my-3">
  <strong class="card-header d-flex justify-content-between align-items-center">{{ $post->title }} <div class="category-label d-inline-block text-light p-2 rounded" style="background-color:{{$post->category->color}}">{{$post->category->name}}</div></strong>
  <div class="card-body">
    <p class="card-text">{{ $post->content }}</p>
    <div class="mt-3">
      @foreach($post->tags as $tag)
      <span class="badge badge-pill text-white p-1" style="background-color:{{$tag->color}}">{{$tag->name}}</span>
      @endforeach
    </div>
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