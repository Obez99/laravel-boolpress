@extends('layouts.admin')

@section('content')
  <ul class="list-group">
    <li class="list-group-item"><strong>Nome: </strong>{{Auth::user()->name}}</li>
    <li class="list-group-item"><strong>Email: </strong>{{Auth::user()->email}}</li>
    <li class="list-group-item"><strong>Data Creazione: </strong>{{Auth::user()->created_at}}</li>
  </ul>
@endsection
