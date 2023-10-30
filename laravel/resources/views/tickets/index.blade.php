@extends('app')
@section('content')
<div class="">
    <hr>
    <h1>Llistat de tickets</h1>
    <form action="{{ route('tickets') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="">
            <label for="estat" class="label">Estat de la comanda</label>
            <div class="">
                <select name="" id="">
                    <option value="Pendent de preparar" disabled></option>
                    <option value="En preparació" disabled></option>
                    <option value="Preparat per recollir" disabled></option>
                    {{-- <option value=""></option> --}}
                </select>
            </div>
        </div>
        <div class="">
            <label for="final_price" class="label">Final Price</label>
            <input type="text" class="input" name="final_price">
        </div>
    </form>
        <div class="">
            <ul>
                @foreach ($tickets as $ticket)
                    <li><a href="{{ route('tickets-edit', ['id' =>$ticket->id]) }}"> {{ $ticket->id}} -> {{ $ticket->final_price}}</a></li>
                @endforeach
            </ul>
        </div>  
</div>
    
@endsection