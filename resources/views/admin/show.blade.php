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

<div class="comments-section">
  <h2 class="text-left mt-5">Commenti</h2>
  <div class="comments-container">
  @if(count($post->comments)>0)
    @foreach($post->comments as $comment)
    <div class="card mb-3 w-100" style="width: 18rem;">
      <div class="card-body">
        <h5 class="card-title">{{$comment->user->name}}</h5>
        <h6 class="card-subtitle mb-2 text-muted">{{$comment->created_at->format("d m Y, H:i")}}</h6>
        <p class="card-text">{{$comment->content}}</p>
        @if($comment->user->id === Auth::user()->id)
        <form action="{{route('admin.comments.destroy', $comment->id)}}" method="post">
          @csrf
          @method("DELETE")
          <input type="submit" class="btn btn-danger" value="Elimina">
        </form>
        @endif
      </div>
    </div>
    
    @endforeach
    @else
    <p class="text-white">Ancora nessun commento</p>
  @endif
    </div>

  <h2 class="mt-5">Nuovo Commento</h2>
  <form action="{{route('admin.comments.store', $post->id)}}">
    @csrf
    <input type="hidden" value="{{$post->id}}" name="post_id">
    <textarea class="w-100 form-control" name="content" cols="30" rows="3"></textarea>
    <input type="submit" class="btn btn-success mt-4">
  </form>

  @if($errors->any())
    <div class="alert alert-danger mt-3" role="alert">
      <ul>
      @foreach($errors->all() as $error)
        <li>{{$error}}</li>
      @endforeach
      </ul>
    </div>
    @endif
</div>
@endsection