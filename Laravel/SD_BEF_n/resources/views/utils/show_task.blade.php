@extends('layouts.fe_master')

@section('content')
    <h3>Detalhes da Tarefa</h3>

    <h6><strong>ID:</strong> {{ $myTask->id }}</h6>
    <h6><strong>Nome:</strong> {{ $myTask->name }}</h6>
    <h6><strong>Descrição:</strong> {{ $myTask->description }}</h6>
    <h6><strong>Responsável:</strong> {{ $myTask->user_id }}</h6>
@endsection
