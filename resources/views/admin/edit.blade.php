@extends('layouts.admin')

@section('content')
<h2>Modifica post</h2>

<form action="{{route('admin.posts.update', $post->id)}}" method="post">
  @csrf
  @method("PATCH")

  <div class="form-group">
    <label for="formGroupTitle">Titolo</label>
    <input type="text" class="form-control" id="formGroupTitle" placeholder="Titolo" name="title" value="{{$post->title}}">
  </div>
  <div class="form-group">
    <label for="formGroupDescription">Descrizione</label>
    <textarea type="text" class="form-control" id="formGroupDescription" placeholder="Scrivi qualcosa..." name="content">{{$post->content}}</textarea>
  </div>

  <label for="formGroupCategory">Categoria</label>
  <select id="formGroupCategory" class="form-control" name="category_id">
    @foreach($categories as $category)
      <option value="{{$category->id}}" {{$category->id == $post->category_id ? 'selected' : ''}}>{{$category->name}}</option>
    @endforeach
  </select>

  <label class="mt-3 d-block">Tags</label>
  <div>
    @foreach ($tags as $tag)
    <div class="form-check form-check-inline mr-3">
      <input class="form-check-input" type="checkbox" value="{{$tag->name}}">
      <label class="form-check-label">{{$tag->name}}</label>
    </div>
    @endforeach
  </div>
  

  <input class="btn btn-success mt-5" type="submit" value="Modifica post">
  <input class="btn btn-danger mt-5" type="reset" value="Reset">
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
@endsection