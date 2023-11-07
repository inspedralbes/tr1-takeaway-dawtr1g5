@extends('app')

@section('content')
<div class="">
    <h1>Creació d'un producte</h1>
    <form action="{{route('products')}}" method="POST" enctype="multipart/form-data">
        @csrf

        @if (session('success'))
        <h6 class="message is-success">{{session('success')}}</h6>
        @endif

        @error('title')
        <h6 class="message is-danger">{{$message}} </h6>
        @enderror
        <div class="">
            <label for="name" class="label">Nom del disc</label>
            <input type="text" class="input" name="name">
        </div>
        <div class="">
            <label for="artist" class="label">Nom de l'artista</label>
            <input type="text" class="input" name="artist">
        </div>
        <div class="">
            <label for="year" class="label">Any de publicació</label>
            <input type="number" name="year" class="input" min="0" value="2023">
        </div>
        <div class="">
            <label for="price" class="label">Preu del producte (€)</label>
            <input type="number" name="price" class="input" step="0.01" min="0" value="0">
        </div>
        <div class="">
            <label for="genre" class="label">Gènere del disc</label>
            <div class="select">
                <select name="genre">
                    @foreach($genres as $genre)
                    <option value="{{$genre->id}}">{{$genre->genre_name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <label for="type_id" class="label">Tipus del producte</label>
        <div class="select">
            <select name="type_id">
                @foreach($type as $tipus)
                <option value="{{$tipus->id}}">{{$tipus->type}}</option>
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
        <button type="submit" class="button is-primary">Crear nueva tarea</button>
    </form>
</div>

<div>
    <hr>
    <h1>Llistat de productes</h1>
    <ul>
        @foreach ($products as $product)
        <li><a href="{{route('products-edit',['id'=>$product->id])}}">{{$product->type}}: {{$product->name}}</a></li>
        @endforeach
    </ul>
</div>

@endsection