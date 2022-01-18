@extends('layouts.admin')

@section('content')
<h2>I tuoi post</h2>
<ul class="list-group user-posts">
  @foreach ($posts as $post)
    <li class="list-group-item p-0">
      <a href="{{route('admin.posts.show', $post->id)}}" class="d-flex justify-content-between p-3">{{$post->title}}
        <strong>{{$post->created_at}}</strong>
      </a>
    </li>
  @endforeach
  
</ul>
@endsection