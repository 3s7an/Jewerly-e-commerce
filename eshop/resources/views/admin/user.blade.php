@extends('admin.layout')

@section('content')
<table class="table table-hover">

    <tr>
      <th scope="col">Id</th>
      <th scope="col">Meno</th>
      <th scope="col">Email</th>
      <th scope="col">Heslo</th>
      <th scope="col">Admin</th>
      <th scope="col">Odstrániť</th>

    </tr>

@foreach ($users as $user)
<tr>
    <td>{{$user->id}}</td>
    <td>{{$user->name}}</td>
    <td>{{$user->email}}</td>
    <td>{{$user->password}}</td>
    <td>{{$user->is_admin}}</td>
    <td><button class="btn btn-danger btn-sm">X</button></td>
@endforeach



@endsection
