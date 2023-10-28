@extends('app')

@section('content')
    <h1>Comandas</h1>
    <ul>
        @foreach ($comandas as $comanda)
            <li> {{ $comanda->idComanda }}</li>
        @endforeach
    </ul>
    <form action="{{ route('comands')}}" method="POST">
        @csrf

    </form>
@endsection