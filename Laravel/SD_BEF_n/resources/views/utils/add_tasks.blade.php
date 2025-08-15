@extends('layouts.fe_master')

@section('content')
    <h1>Olá, aqui podes adicionar Tasks</h1>

    <form method="POST" action="{{ route('tasks.store') }}">
        @csrf

        <div class="mb-3">
            <label class="form-label">Nome da Tarefa</label>
            <input name="name" type="text" class="form-control" id="name">
            @error('name')
                <p class="error">nome inválido</p>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Descrição</label>
            <input name="description" type="text" class="form-control" id="description">
            @error('description')
                <p class="error">descrição inválida</p>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Atribuir a</label>
            <select name="user_id" class="form-select" required>
                @foreach(\App\Models\User::all() as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
            @error('user_id')
                <p class="error">utilizador inválido</p>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary mt-2">Adicionar</button>
    </form>
@endsection

