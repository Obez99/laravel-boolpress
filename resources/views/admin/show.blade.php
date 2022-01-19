@extends('layouts.admin')

@section('content')
<div class="card text-center my-3">
  <strong class="card-header text-left">{{ $post->title }}</strong>
  <div class="card-body">
    <p class="card-text text-left">{{ $post->content }}</p>
  </div>
  <div class="card-footer text-muted">
    Pubblicato il {{ $post->created_at }}
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