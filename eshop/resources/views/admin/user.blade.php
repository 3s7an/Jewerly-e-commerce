@extends('admin.layout')

@section('content')
<h1 class="text-center mb-4">Uživatelia</h1>
<hr>
<!-- TABULKA -->

<!-- Hlava tabulky -->
<table class="table table-hover">

    <tr>
      <th scope="col">Id</th>
      <th scope="col">Meno</th>
      <th scope="col">Priezvisko</th>
      <th scope="col">Email</th>
      <th scope="col">Admin</th>
      <th scope="col">Editovať</th>

    </tr>

<!-- Telo tabulky -->
    @foreach ($users as $user)
    <tr>
        <td>{{$user->id}}</td>
        <td>{{$user->name}}</td>
        <td>{{$user->surname}}</td>
        <td>{{$user->email}}</td>
        @if ($user->is_admin == 1)
    <td>Áno</td>
@else
    <td>Nie</td>
@endif


        <td><a class="btn ">X</a> <a href="{{route('admin.user.show', $user->id)}}" class="btn "> <i class="fa-solid fa-pen-to-square"></i></a> </td>
    @endforeach

<!-- KONIEC TABULKY -->


@endsection
