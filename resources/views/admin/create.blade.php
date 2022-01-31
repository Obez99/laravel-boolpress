@extends('layouts.admin')

@section('content')
    <h2>Crea nuovo post</h2>

    <form action="{{route('admin.posts.store')}}" method="post" enctype="multipart/form-data">
      @csrf

      <div class="form-group">
        <label for="formGroupExampleInput">Titolo</label>
        <input type="text" class="form-control @error('title') is-invalid @enderror" id="formGroupExampleInput" placeholder="Titolo" name="title" value="{{old('title')}}">
        @error('title')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
        @enderror
      </div>

      <div class="form-group">
        <label for="formGroupExampleInput2">Descrizione</label>
        <textarea type="text" class="form-control @error('content') is-invalid @enderror" id="formGroupExampleInput2" placeholder="Scrivi qualcosa..." name="content">{{old('content')}}</textarea>
        @error('content')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
        @enderror
      </div>

      <div class="form-group">
        <label for="formGroupTitle">Immagine</label>
        <input type="file" class="form-control @error('image') is-invalid @enderror" id="formGroupTitle" placeholder="Immagine" name="image" value="{{old('image')}}">
        @error('image')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
      @enderror
      </div>

      <label>Categoria</label>
      <select class="form-control @error('category_id') is-invalid @enderror" name="category_id">
        <option disabled selected>Scegli una categoria...</option>
        @foreach($categories as $category)
        <option value="{{$category->id}}">{{$category->name}}</option>
        @endforeach
      </select>

      @error('category_id')
        <span class="invalid-feedback" role="alert">
          <strong>{{ $message }}</strong>
        </span>
      @enderror

      <label class="mt-3 d-block">Tags</label>
      <fieldset class="form-control">
        @foreach ($tags as $tag)
        <input type="checkbox" name="tags[]" value="{{$tag->id}}">
        <label class="text-dark mr-3">{{$tag->name}}</label>
        @endforeach
      </fieldset>
        
      <input class="btn btn-primary mt-5" type="submit" value="Crea nuovo post">
      <input class="btn btn-danger mt-5" type="reset" value="Reset">
    </form>

    {{-- @if($errors->any())
    <div class="alert alert-danger mt-3" role="alert">
      <ul>
      @foreach($errors->all() as $error)
        <li>{{$error}}</li>
      @endforeach
      </ul>
    </div>
    @endif --}}
@endsection