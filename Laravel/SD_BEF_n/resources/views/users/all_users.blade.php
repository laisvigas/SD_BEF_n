@extends('layouts.fe_master')
@section('content')
    @if (@session('message'))
      <div class="alert alert-success">
          {{session('message')}}
      </div>
    @endif

    <h1>Aqui tens os Users</h1>
    <h6>Responsável</h6>
    <ul>
        <li>Nome: {{ $courseResp ? $courseResp->name : 'ainda não atribuído' }}</li>
        <li>Email: {{ $courseResp ? $courseResp->email : 'geral@cesae.pt' }}</li>
    </ul>



    <ul>
        @foreach ($users as $user)
        <li>{{ $user['id'] }} : {{ $user['name'] }}</li>
        @endforeach
    </ul>

    <h1>Users vindos do Banco de Dados</h1>

    <table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nome</th>
      <th scope="col">Email</th>
      <th scope="col">NIF</th>
      <th></th>
    </tr>
  </thead>
  <tbody>

    @foreach ($usersFromDB as $user)
        <tr>
            <th scope="row">{{ $user->id }}</th>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->nif }}</td>
            <td>
              <a href="{{ route('user.show', $user->id) }}" class="btn btn-info me-2">Ver / Editar</a>
              <a href="{{ route('user.delete', $user->id) }}" class="btn btn-danger">Apagar</a>
            </td>
        </tr>
    @endforeach

  </tbody>
</table>
@endsection
