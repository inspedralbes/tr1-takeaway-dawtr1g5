@extends('app')

@section('content')

<form action="{{route('products-update',['id'=>$product[0]->id])}}" method="POST">
    @method('PATCH')
    @csrf

    <div class="">
        <label for="name" class="label">Nom del disc</label>
        <input type="text" class="input is-primary" name="name" value="{{$product[0]->name}}">
    </div>
    <div class="">
        <label for="artist" class="label">Nom de l'artista</label>
        <input type="text" class="input is-primary" name="artist" value="{{$product[0]->artist}}">
    </div>
    <div class="">
        <label for="year" class="label">Any de publicació</label>
        <input type="number" name="year" class="input is-primary" min="0" value="{{$product[0]->year}}">
    </div>
    <div class="">
        <label for="price" class="label">Preu del producte (€)</label>
        <input type="number" name="price" class="input is-primary" step="0.01" min="0" value="{{$product[0]->price}}">
    </div>
    <div class="">
        <label for="compositores" class="label">Compositores</label>
        <textarea class="textarea is-primary" name="compositores">
                {{ str_replace(', ', "\n", $product[0]->compositores) }}
            </textarea>
    </div>



    <div class="">
        <label for="discografica" class="label">Productora</label>
        <textarea class="textarea is-primary" name="discografica">
                {{ str_replace(', ', "\n", $product[0]->discografica) }}
            </textarea>
    </div>
    <div class="">
        <label for="duracion" class="label">Duracion (min)</label>
        <input type="text" class="input is-primary" name="duracion" value="{{ $product[0]->duracion }}"></input>
    </div>
    <div class="">
        <label for="tracklist" class="label">Tracklist</label>
        <textarea class="textarea is-primary" name="tracklist" style="margin: auto; color: #727271">
                {{ str_replace(', ', "\n", $product[0]->tracklist) }}
            </textarea>
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

    <br>
    <br>
    <label class="" for="image">
        <input class="" type="file" name="image">
    </label>
    <br>
    <br>
    <button type="submit" class="button is-primary">Actualitzar producte</button>
</form>
<br>
<form action="{{route('products-destroy',[$product[0]->id])}}" method="POST">
    @method('DELETE')
    @csrf
    <button class="button is-danger">Eliminar producte</button>
</form>
</div>
@endsection