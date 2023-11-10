@extends('app')

<head>

    <link rel="stylesheet" href="{{ asset('css/products.css')}}">
    <title>PreSidis Shop (admin)</title>
</head>

@section('content')


<div class="container">
    <a href="{{ route('tickets') }}">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-back-up-double" width="24"
            height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
            stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
            <path d="M13 14l-4 -4l4 -4"></path>
            <path d="M8 14l-4 -4l4 -4"></path>
            <path d="M9 10h7a4 4 0 1 1 0 8h-1"></path>
        </svg>

    </a>
    <form action="{{ route('tickets-update', ['id' => $tickets[0]->id]) }}" method="POST">
        @method('PATCH')
        @csrf

        <div class="">
            <label for="estat" class="label">Estat de la comanda</label>
            <div class="">
                <select name="estat">
                    <option value="Pendent de preparar" {{ $tickets[0]->estat == 'Pendent de preparar' ? 'selected' : ''
                        }}>Pendent de preparar</option>
                    <option value="En preparació" {{ $tickets[0]->estat == 'En preparació' ? 'selected' : '' }}>En
                        preparació
                    </option>
                    <option value="Preparat per recollir" {{ $tickets[0]->estat == 'Preparat per recollir' ? 'selected'
                        : ''
                        }}>Preparat per recollir</option>
                    <option value="Recollit" {{ $tickets[0]->estat == 'Recollit' ? 'selected' : '' }}>Recollit</option>
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
                <ul class="product-list">
                    <li class="product-item">
                        <label>Product Name:</label> {{ $linea->product_name }}
                    </li>
                    <li class="product-item">
                        <label>Product Artist:</label> {{ $linea->product_artist }}
                    </li>
                    <li class="product-item">
                        <label>Year Release:</label> {{ $linea->product_year_release }}
                    </li>
                    <li class="product-item">
                        <label>Price:</label> {{ $linea->price }}
                    </li>
                    <li class="product-item">
                        <label>Quantity:</label> {{ $linea->quantity }}
                    </li>
                    <li class="product-item">
                        <label>Product Type:</label> {{ $linea->product_type }}
                    </li>
                    <li class="product-item">
                        <label>Product Genre:</label> {{ $linea->product_genre }}
                    </li>
                </ul>
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
</div>
@endsection