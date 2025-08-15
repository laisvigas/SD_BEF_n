@extends('layouts.fe_master')
@section('content')
<div class="container">
    <h1>Oferta de livros para as férias</h1>

    @if(session('success'))
        <div class="alert alert-success my-3">{{ session('success') }}</div>
    @endif

    <div class="mb-3">
        <a class="btn btn-primary" href="{{ route('books_create') }}">Adicionar livro</a>
    </div>

    <table class="table table-bordered align-middle">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Valor estimado (€)</th>
                <th>Valor pago (€)</th>
                <th>User destinatário</th>
                <th>Diferença</th>
                <th style="width: 180px;">Ações</th>
            </tr>
        </thead>
        <tbody>
            @forelse($books as $book)
                @php
                    $diff = is_null($book->paid_price) ? null : (float)$book->estimated_price - (float)$book->paid_price;
                @endphp
                <tr>
                    <td>{{ $book->name }}</td>
                    <td>{{ number_format($book->estimated_price, 2, ',', '.') }}</td>
                    <td>{{ is_null($book->paid_price) ? '—' : number_format($book->paid_price, 2, ',', '.') }}</td>
                    <td>
                        {{ $book->user?->name ?? '—' }}
                        @if($book->user?->email)
                            <small class="text-muted d-block">{{ $book->user->email }}</small>
                        @endif
                    </td>
                    <td>
                        @if(is_null($diff))
                            <span class="text-muted">—</span>
                        @elseif($diff > 0)
                            <span class="text-success">Ganho de € {{ number_format($diff, 2, ',', '.') }}</span>
                        @elseif($diff < 0)
                            <span class="text-danger">Perda de € {{ number_format(abs($diff), 2, ',', '.') }}</span>
                        @else
                            <span>Sem diferença</span>
                        @endif
                    </td>
                    <td>
                        <a class="btn btn-sm btn-secondary" href="{{ route('books_edit', $book) }}">Ver/Editar</a>

                        <form action="{{ route('books_destroy', $book) }}" method="POST" class="d-inline"
                              onsubmit="return confirm('Tem certeza que deseja apagar este livro?');">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger" type="submit">Apagar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="6" class="text-center text-muted">Ainda não há livros.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
