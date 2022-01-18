@extends('layouts.admin')

@section('content')
    <h1>Crea nuovo post</h1>

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

      <input type="hidden" name="author" value="{{Auth::user()->name}}">
      <input class="btn btn-primary mt-5" type="submit" value="Crea nuovo post">
      <input class="btn btn-danger mt-5" type="reset" value="Cancella">
    </form>
@endsection