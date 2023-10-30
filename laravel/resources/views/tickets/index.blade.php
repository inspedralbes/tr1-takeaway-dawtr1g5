@extends('app')
@section('content')
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
@endsection