@extends('layouts.fe_master')
@section('content')
<div class="container">
    <h1>{{ $book->name }}</h1>
    <ul class="list-group mb-3">
        <li class="list-group-item"><strong>Estimado:</strong> € {{ number_format($book->estimated_price, 2, ',', '.') }}</li>
        <li class="list-group-item"><strong>Pago:</strong> {{ is_null($book->paid_price) ? '—' : '€ '.number_format($book->paid_price, 2, ',', '.') }}</li>
        <li class="list-group-item"><strong>User:</strong> {{ $book->user?->name ?? '—' }}</li>
    </ul>
    <a href="{{ route('books.edit', $book) }}" class="btn btn-secondary">Editar</a>
    <a href="{{ route('books_route') }}" class="btn btn-link">Voltar</a>
</div>
@endsection

