@extends('app')
@section('content')

<form action="{{ route('tickets-update', ['id' => $ticket[0]->id]) }}" method="POST">
    @method('PATCH')
    @csrf

        <div class="">
            <label for="estat" class="label">Estat de la comanda</label>
            <div class="">
                <select name="estat">
                    <option value="Pendent de preparar">Pendent de preparar</option>
                    <option value="En preparació">En preparació</option>
                    <option value="Preparat per recollir">Preparat per recollir</option>
                    {{-- <option value=""></option> --}}
                </select>
            </div>
            <div class="">
                <label for="final_price" class="label">Precio final</label>
                <input type="text" name="final_price" class="input" value="{{ $ticket[0]->final_price }} €" disabled>
            </div>
        </div>
        <button type="submit" class="button is-primary">¡Actualizar ticket!</button>
</form>

<form action="{{ route('tickets-destroy', [$ticket[0]->id]) }}" method="POST">
    @method('DELETE')
    @csrf
    <button type="submit" class="button is-danger">Eliminar Ticket</button>
</form>

@endsection