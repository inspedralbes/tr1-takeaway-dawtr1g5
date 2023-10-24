@extends('app')

@section('content')
<div class="container w-25 border p-4 mt-4">
    <form action="{{route('products')}}" method="POST" enctype="multipart/form-data">
        @csrf

        @if (session('success'))
        <h6 class="alert alert-success">{{session('success')}}</h6>
        @endif

        @error('title')
        <h6 class="alert alert-danger">{{$message}} </h6>
        @enderror
        <div class="mb-3">
            <label for="name" class="form-label">Nom del disc</label>
            <input type="text" class="form-control" name="name">
        </div>
        <div class="mb-3">
            <label for="artist" class="form-label">Nom de l'artista</label>
            <input type="text" class="form-control" name="artist">
        </div>
        <div class="mb-3">
            <label for="year" class="form-label">Any de publicació</label>
            <input type="number" name="year" class="form-control" min="0">
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Preu del producte (€)</label>
            <input type="number" name="price" class="form-control" step="0.01" min="0">
        </div>
        <div class="mb-3">
            <label for="genre" class="form-label">Gènere del disc</label>
            <select name="genre" class="form-select">
                @foreach($genres as $genre)
                <option value="{{$genre->id}}">{{$genre->genre_name}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="type_id" class="form-label">Tipus del producte</label>
            <select name="type_id" class="form-select">
                @foreach($type as $tipus)
                <option value="{{$tipus->id}}">{{$tipus->type}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Imatge del producte</label>
            <input type="file" class="form-control" name="image">
        </div>
        <button type="submit" class="btn btn-primary">Crear nueva tarea</button>
    </form>
    @endsection