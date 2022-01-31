@extends('layouts.admin')

@section('content')
<h2>Modifica post</h2>

<form action="{{route('admin.posts.update', $post->slug)}}" method="post" enctype="multipart/form-data">
  @csrf
  @method("PATCH")

  <div class="form-group">
    <label for="formGroupTitle">Titolo</label>
    <input type="text" class="form-control @error('title') is-invalid @enderror" id="formGroupTitle" placeholder="Titolo" name="title" value="{{$post->title}}" required>
    @error('title')
    <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
    </span>
  @enderror
  </div>
  <div class="form-group">
    <label for="formGroupDescription">Descrizione</label>
    <textarea type="text" class="form-control @error('content') is-invalid @enderror" id="formGroupDescription" placeholder="Scrivi qualcosa..." name="content" required>{{$post->content}}</textarea>
    @error('content')
    <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
    </span>
  @enderror
  </div>

  <div class="form-group">
    <label for="formGroupTitle">Immagine</label>
    <input type="file" class="form-control @error('image') is-invalid @enderror" id="formGroupTitle" placeholder="Immagine" name="image" value="{{$post->image}}">
    @error('image')
    <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
    </span>
  @enderror
  </div>

  <label for="formGroupCategory">Categoria</label>
  <select id="formGroupCategory" class="form-control @error('category_id') is-invalid @enderror" name="category_id">
    @foreach($categories as $category)
      <option value="{{$category->id}}" {{$category->id == $post->category_id ? 'selected' : ''}}>{{$category->name}}</option>
    @endforeach
  </select>

  <label class="mt-3 d-block">Tags</label>
    <fieldset class="form-control">
      @foreach ($tags as $tag)
      <input type="checkbox" name="tags[]" value="{{$tag->id}}" {{$post->tags->contains($tag) ? 'checked' : ''}}>
      <label class="text-dark mr-3">{{$tag->name}}</label>
      @endforeach
    </fieldset>
  

  <input class="btn btn-success mt-5" type="submit" value="Modifica post">
  <input class="btn btn-danger mt-5" type="reset" value="Reset">
</form>
@endsection