@extends('layouts.fe_master')
@section('content')
<div class="container">
    <h1>Novo livro</h1>

    <form method="POST" action="{{ route('books_store') }}">
        @csrf
        @include('books.books_form-fields', ['book' => null, 'users' => $users])
        <button class="btn btn-primary">Salvar</button>
        <a href="{{ route('books_route') }}" class="btn btn-link">Cancelar</a>
    </form>
</div>
@endsection
