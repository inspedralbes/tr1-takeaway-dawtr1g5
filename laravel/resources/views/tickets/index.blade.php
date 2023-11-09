@extends('app')
@section('content')

<head>
    <link rel="stylesheet" href="{{ asset('css/products.css')}}">
</head>

<div class="container">
    <a href="http://127.0.0.1:8000/welcome">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-back-up-double" width="24"
            height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
            stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
            <path d="M13 14l-4 -4l4 -4"></path>
            <path d="M8 14l-4 -4l4 -4"></path>
            <path d="M9 10h7a4 4 0 1 1 0 8h-1"></path>
        </svg>

    </a>
    <div class="">
        <h1>Llistat de tickets</h1>
        <hr>
        <div class="">
            @if (session('success'))
            <div class="message is-success">
                <h6>{{ session('success') }}</h6>
            </div>
            @endif
            <ul>
                @foreach ($tickets as $ticket)
                <li><a href="{{ route('tickets-edit', ['id' => $ticket->id]) }}"> ticket {{ $ticket->id}} -> {{
                        $ticket->final_price}} | {{$ticket->estat}}</a></li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection