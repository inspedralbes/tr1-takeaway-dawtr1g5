@extends('app')
@section('content')
    <form action="" method="POST">
        @method('PATCH')
        @csrf
        <div>
            <select name="" id="">
                <option value="1" ></option>
                <option value="2" ></option>
                <option value="3" ></option>
                <option value="4" ></option>

            </select>
        </div>
{{-- 
        <div class="">
            <label for="estat" class="label">Estat de la comanda</label>
            <div class="select">

            </div>
        </div>

        <div class="">
            <label for="final_price" class="label">Estat de la comanda</label>
            <input type="text" class="input" name="final_price" value="{{$ticket->final_price}}">
        </div> --}}
    </form>
@endsection