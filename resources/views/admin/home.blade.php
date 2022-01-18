@extends('layouts.admin')

@section('content')
<ul class="list-group user-posts">
  @foreach ($posts as $post)
    <li class="list-group-item p-0">
      <a href="{{route('admin.posts.show')}}" class="d-flex justify-content-between p-3">{{$post->title}}
        <strong>{{$post->created_at}}</strong>
      </a>
    </li>
  @endforeach
  
</ul>
@endsection