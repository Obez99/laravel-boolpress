@extends('layouts.admin')

@section('content')
<h2>Modifica post</h2>

<form action="{{route('admin.posts.update', $post->slug)}}" method="post">
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
    <fieldset class="form-control">
      {{-- @dump($post->tags) --}}
      @foreach ($tags as $tag)
      <input type="checkbox" name="tags[]" value="{{$tag->id}}" {{$post->tags->contains($tag) ? 'checked' : ''}}>
      <label class="text-dark mr-3">{{$tag->name}}</label>
      @endforeach
    </fieldset>
  

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