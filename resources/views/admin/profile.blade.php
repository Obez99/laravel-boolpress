@extends('layouts.admin')

@section('content')
<aside>
  <ul class="list-group mx-5 ">
      <li class="list-group-item"><a href="#">Profilo</a></li>
      <li class="list-group-item"><a href="#">Posts</a></li>
  </ul>
</aside>

<div class="dashboard-content">
  <ul class="list-group">
    <li class="list-group-item"><strong>Nome: </strong>{{Auth::user()->name}}</li>
    <li class="list-group-item"><strong>Email: </strong>{{Auth::user()->email}}</li>
    <li class="list-group-item"><strong>Data Creazione: </strong>{{Auth::user()->created_at}}</li>
  </ul>
</div>
@endsection
