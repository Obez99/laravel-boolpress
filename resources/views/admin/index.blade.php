@extends('layouts.admin')

@section('content')
@if(count($posts)>0)
  @if(session("msg"))
  <div class="alert alert-success d-flex justify-content-between" role="alert">{{session("msg")}} 
    <button type="button" class="close" aria-label="Close" id="closeBtn">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  @endif
  <h2>I tuoi post</h2>
  <ul class="list-group user-posts">
    @foreach ($posts as $post)
      <li class="list-group-item p-0">
        <a href="{{route('admin.posts.show', $post->slug)}}" class="d-flex justify-content-between p-3">{{$post->title}}
          <strong>{{$post->created_at}}</strong>
        </a>
      </li>
    @endforeach
  </ul>

  @else
  <h2>Nessun post disponibile, creane uno!</h2>
  <a class="btn btn-primary mt-3" href="{{route('admin.posts.create')}}">Crea nuovo post</a>
  @endif
@endsection