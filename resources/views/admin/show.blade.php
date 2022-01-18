@extends('layouts.admin')

@section('content')
    <div class="post-viewer">
      <h2 class="post-title">{{$post->title}}</h2>
      <div class="post-description">{{$post->content}}</div>
      <div></div>

      <div class="mt-4 d-flex">
        <a class="btn btn-success" href="">Modifica</a>
        <form action="{{route("admin.posts.destroy", $post->id)}}" method="post">
          @csrf
          @method("DELETE")
          <input type="submit" value="Cancella" class="btn btn-danger ml-3">
        </form>
        
      </div>
    </div>
@endsection