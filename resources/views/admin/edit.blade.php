@extends('layouts.admin')

@section('content')
<h2>Modifica post</h2>

<form action="{{route('admin.posts.update', $post->id)}}" method="post">
  @csrf
  @method("PATCH")

  <div class="form-group">
    <label for="formGroupExampleInput">Titolo</label>
    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Titolo" name="title" value="{{$post->title}}">
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput2">Descrizione</label>
    <textarea type="text" class="form-control" id="formGroupExampleInput2" placeholder="Scrivi qualcosa..." name="content">{{$post->content}}</textarea>
  </div>

  <input type="hidden" name="author" value="{{Auth::user()->name}}">
  <input class="btn btn-success mt-5" type="submit" value="Modifica post">
  <input class="btn btn-danger mt-5" type="reset" value="Reset">
</form>
@endsection