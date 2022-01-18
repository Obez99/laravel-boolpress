@extends('layouts.admin')

@section('content')
    <div class="post-viewer">
      <h2 class="post-title">{{$post->title}}</h2>
      <div class="post-description">{{$post->content}}</div>
      <div></div>

      <div class="mt-4">
        <a class="btn btn-success" href="">Modifica</a>
        <a class="btn btn-danger" href="">Cancella</a>
      </div>
    </div>
@endsection