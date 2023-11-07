@extends('app')

@section('content')

<head>
    <link rel="stylesheet" href="{{ asset('css/products.css')}}">
</head>

<div class="container">
    <a href="http://127.0.0.1:8000/">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-back-up-double" width="24"
            height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
            stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
            <path d="M13 14l-4 -4l4 -4"></path>
            <path d="M8 14l-4 -4l4 -4"></path>
            <path d="M9 10h7a4 4 0 1 1 0 8h-1"></path>
        </svg>

    </a>

    <div class="btn-logout">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="button is-link">Cerrar sesión</button>
        </form>
    </div>
    
    <h1>Creació d'un producte</h1>
    <form action="{{ route('products') }}" method="POST" enctype="multipart/form-data">
        @csrf

        @if (session('success'))
        <h6 class="message is-success">{{ session('success') }}</h6>
        @endif

        @error('title')
        <h6 class="message is-danger">{{ $message }}</h6>
        @enderror

        <div class="form-group">
            <label for="name" class="label">Nom del disc</label>
            <input type="text" class="input" name="name">
        </div>

        <div class="form-group">
            <label for="artist" class="label">Nom de l'artista</label>
            <input type="text" class="input" name="artist">
        </div>

        <div class="form-group">
            <label for="year" class="label">Any de publicació</label>
            <input type="number" name="year" class="input" min="0" value="2023">
        </div>

        <div class="form-group">
            <label for="price" class="label">Preu del producte (€)</label>
            <input type="number" name="price" class="input" step="0.01" min="0" value="0">
        </div>
        <div class="form-group">
            <label for="compositores" class="label">Compositors</label>
            <input type="text" name="compositores" class="input" step="0.01" min="0" value="">
        </div>
        <div class="form-group">
            <label for="productora" class="label">Producció</label>
            <input type="text" name="productora" class="input" step="0.01" min="0" value="">
        </div>
        <div class="form-group">
            <label for="duracion" class="label">Duració</label>
            <input type="number" name="duracion" class="input" step="0.01" min="0" value="0">
        </div>
        <div class="form-group">
            <label for="tracklist" class="label">Tracklist</label>
            <textarea class="textarea is-primary" name="tracklist" placeholder="Tracklist..."></textarea>
        </div>


        <div class="form-group">
            <label for="genre" class="label">Gènere del disc</label>
            <div class="select">
                <select name="genre">
                    @foreach ($genres as $genre)
                    <option value="{{ $genre->id }}">{{ $genre->genre_name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <br>
        <br>

        <label class="" for="image">
            <input class="" type="file" name="image">
        </label>

        <br>
        <br>

        <div class="buttons">
            <a type="submit" class="create button is-primary">Crear nou producte</a>
            {{-- <a type="submit" href="products/llistat" class="button is-link">Llistat productes</a> --}}
        </div>


    </form>
    <hr>
    <div>
        <hr>
        <h1>Llistat de productes</h1>
        <ul>
            @foreach ($products as $product)
            <li><a href="{{route('products-edit',['id'=>$product->id])}}">{{$product->artist}} - {{$product->name}}</a>
            </li>
            @endforeach
        </ul>
    </div>
</div>



@endsection