@extends('admin.layout')

@section('content')
<h1 class="text-center mb-4 text-4xl font-bold text-gray-800">Users</h1>

<!-- TABULKA -->

<!-- Hlava tabulky -->
<table class="table table-hover">

    <tr>
      <th scope="col">Id</th>
      <th scope="col">Name</th>
      <th scope="col">Surname</th>
      <th scope="col">Email</th>
      <th scope="col">Admin</th>
      <th scope="col">Edit</th>

    </tr>

<!-- Telo tabulky -->
    @foreach ($users as $user)
    <tr>
        <td>{{$user->id}}</td>
        <td>{{$user->name}}</td>
        <td>{{$user->surname}}</td>
        <td>{{$user->email}}</td>
        @if ($user->is_admin == 1)
    <td>Yes</td>
@else
    <td>No</td>
@endif


        <td><a href="{{route('admin.user.show', $user->id)}}" class="btn "> <i class="fa-solid fa-pen-to-square"></i></a> </td>
    @endforeach

<!-- KONIEC TABULKY -->


@endsection
