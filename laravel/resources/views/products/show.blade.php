@extends('app')

@section('content')

<head>
    <link rel="stylesheet" href="{{ asset('css/products.css')}}">
</head>
<div class="container">
    <a href="{{ route('products')}}">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-back-up-double" width="24"
            height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
            stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
            <path d="M13 14l-4 -4l4 -4"></path>
            <path d="M8 14l-4 -4l4 -4"></path>
            <path d="M9 10h7a4 4 0 1 1 0 8h-1"></path>
        </svg>
    </a>
    <h1>Actualitzar un producte</h1>
    <form action="{{route('products-update',['id'=>$product[0]->id])}}" method="POST">
        @method('PATCH')
        @csrf

        <div class="">
            <label for="name" class="label">Nom del disc</label>
            <input type="text" class="input" name="name" value="{{$product[0]->name}}">
        </div>
        <div class="">
            <label for="artist" class="label">Nom de l'artista</label>
            <input type="text" class="input" name="artist" value="{{$product[0]->artist}}">
        </div>
        <div class="">
            <label for="year" class="label">Any de publicació</label>
            <input type="number" name="year" class="input" min="0" value="{{$product[0]->year}}">
        </div>
        <div class="">
            <label for="price" class="label">Preu del producte (€)</label>
            <input type="number" name="price" class="input" step="0.01" min="0" value="{{$product[0]->price}}">
        </div>


        <div class="">
            <label for="genre" class="label">Gènere del disc</label>
            <div class="select">
                <select name="genre">
                    @foreach($genres as $genre)
                    <option value="{{$genre->id}}" @if ($genre->genre_name === $product[0]->genre_name) selected
                        @endif>{{$genre->genre_name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <label for="type_id" class="label">Tipus del producte</label>
        <div class="select">
            <select name="type_id">
                @foreach($type as $tipus)
                <option value="{{$tipus->id}}" @if ($tipus->type === $product[0]->type) selected
                    @endif>{{$tipus->type}}</option>
                @endforeach
            </select>
        </div>
        <br>
        <br>
        <label class="" for="image">
            <input class="" type="file" name="image">
        </label>
        <br>
        <br>
        <button type="submit" class="button is-primary">Actualitzar producte</button>
    </form>
    <form action="{{route('products-destroy',[$product[0]->id])}}" method="POST">
        @method('DELETE')
        @csrf
        <button class="button is-danger">Eliminar producte</button>
    </form>
</div>
@endsection