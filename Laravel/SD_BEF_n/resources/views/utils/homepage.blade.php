@extends('layouts.fe_master')

@section('content')
    <div class="position-absolute top-0 start-0 w-100 h-100 bg-dark m-0 p-0"
     style="background: url('{{ asset('imgs/bg.png') }}') no-repeat center center / cover; z-index: -1;"></div>

    <div class="position-relative d-flex flex-column justify-content-center align-items-center text-white m-0 p-0 ">
        <div class="container text-start">
            <h5 class="mt-3">Olá, {{ $myName ?? 'Fulane' }}</h5>
            <h3>Boas vindas ao seu gerenciador de... coisas?</h3>
        </div>
    </div>
@endsection