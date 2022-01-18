@extends('layouts.admin')

@section('content')
<ul class="list-group">
  @foreach ($posts as $post)
    <li class="list-group-item d-flex justify-content-between">
      <a href="">{{$post->title}}</a>
      <strong>{{$post->created_at}}</strong>
    </li>
  @endforeach
  
</ul>
@endsection