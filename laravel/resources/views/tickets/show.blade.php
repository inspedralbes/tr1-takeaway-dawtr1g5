@extends('app')
@section('content')

<style>
    .product-table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 10px;
    }

    .product-table th,
    .product-table td {
        padding: 8px;
        border: 1px solid #ddd;
        text-align: center;
    }

    .product-table th {
        background-color: #f2f2f2;
    }

    /* Estilos para las filas alternas */
    .product-table tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    /* Estilos para el encabezado de la tabla */
    .product-table th {
        background-color: #333;
        color: #fff;
    }
</style>

<form action="{{ route('tickets-update', ['id' => $tickets[0]->id]) }}" method="POST">
    @method('PATCH')
    @csrf

    <div class="">
        <label for="estat" class="label">Estat de la comanda</label>
        <div class="">
            <select name="estat">
                @foreach ($tickets as $ticket)
                <option value="Pendent de preparar" {{ $ticket->estat == 'Pendent de preparar' ? 'selected' : ''
                    }}>Pendent de preparar</option>
                <option value="En preparació" {{ $ticket->estat == 'En preparació' ? 'selected' : '' }}>En preparació
                </option>
                <option value="Preparat per recollir" {{ $ticket->estat == 'Preparat per recollir' ? 'selected' : ''
                    }}>Preparat per recollir</option>
                <option value="Recollit" {{ $ticket->estat == 'Recollit' ? 'selected' : '' }}>Recollit</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="">
        <label for="final_price" class="label">Precio final</label>
        <input type="text" name="final_price" class="input" value="{{ $tickets[0]->final_price }} €" disabled>
    </div>
    <div class="">
        <label for="user_name" class="label">User name</label>
        <input type="text" name="user_name" class="input" value="{{ $tickets[0]->user_name }}" disabled>
    </div>
    <div class="">
        <label for="user_email" class="label">User email</label>
        <input type="text" name="user_email" class="input" value="{{ $tickets[0]->user_email }}" disabled>
    </div>
    <hr>
    <div class="">
        <label for="linea_tickets" class="label">Líneas del ticket</label>
        @foreach ($linea_ticket as $linea)
        @if ($linea->ticket_id == $tickets[0]->id)
        <div class="linea-detalle">
            <label for="id_linea" class="label">Id línea {{ $linea->id_linea }}</label>
            <hr>
            <table class="product-table">
                <tr>
                    <th>Product Name</th>
                    <th>Product Artist</th>
                    <th>Year Release</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Product Type</th>
                    <th>Product Genre</th>
                </tr>
                <tr>
                    <td>{{ $linea->product_name }}</td>
                    <td>{{ $linea->product_artist }}</td>
                    <td>{{ $linea->product_year_release }}</td>
                    <td>{{ $linea->price }}</td>
                    <td>{{ $linea->quantity }}</td>
                    <td>{{ $linea->product_type }}</td>
                    <td>{{ $linea->product_genre }}</td>
                </tr>
            </table>
        </div>
        @endif
        @endforeach
    </div>


    <button type="submit" class="button is-primary">¡Actualizar ticket!</button>
</form>

<form action="{{ route('tickets-destroy', [$tickets[0]->id]) }}" method="POST">
    @method('DELETE')
    @csrf
    <button type="submit" class="button is-danger">Eliminar Ticket</button>
</form>

@endsection