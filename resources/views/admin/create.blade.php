@extends('layouts.admin')

@section('content')
    <h2>Crea nuovo post</h2>

    <form action="{{route('admin.posts.store')}}" method="post">
      @csrf

      <div class="form-group">
        <label for="formGroupExampleInput">Titolo</label>
        <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Titolo" name="title">
      </div>
      <div class="form-group">
        <label for="formGroupExampleInput2">Descrizione</label>
        <textarea type="text" class="form-control" id="formGroupExampleInput2" placeholder="Scrivi qualcosa..." name="content"></textarea>
      </div>

      <input class="btn btn-primary mt-5" type="submit" value="Crea nuovo post">
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