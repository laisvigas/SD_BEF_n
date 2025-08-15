@extends('layouts.fe_master')
@section('content')
<div class="container">
    <h1>Editar livro</h1>

    <form method="POST" action="{{ route('books_update', $book) }}">
        @csrf
        @method('PUT')
        @include('books.books_form-fields', ['book' => $book, 'users' => $users])
        <button class="btn btn-primary">Atualizar</button>
        <a href="{{ route('books_route') }}" class="btn btn-link">Cancelar</a>
    </form>
</div>
@endsection
