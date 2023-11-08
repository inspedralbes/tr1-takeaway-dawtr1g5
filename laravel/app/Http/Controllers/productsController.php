<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\products;
use App\Models\type;
use App\Models\genres;
use Illuminate\Support\Facades\DB;

class productsController extends Controller
{
    //
    public function index()
    {
        $products = DB::table("products")
            ->join('genres', 'genre_id', '=', 'genres.id')
            ->select('products.*', 'genres.genre_name')
            ->orderBy('artist', 'asc')
            ->get();
        return response()->json($products);
    }
    public function index_paginated()
    {
        $products = DB::table("products")
            ->join('genres', 'genre_id', '=', 'genres.id')
            ->select('products.*', 'genres.genre_name')
            ->orderBy('artist', 'asc')
            ->paginate(10);
        return response()->json($products);
    }

    public function index_all()
    {

        $products = DB::table("products")
            ->join('genres', 'genre_id', '=', 'genres.id')
            ->select('products.*', 'genres.genre_name')
            ->get();
        $genres = genres::all();

        return view('products.index', ['products' => $products, 'genres' => $genres]);
    }

    public function index_adv(Request $request)
    {
        $maxPrice = intval($request->maxPrice);
        $genre = intval($request->genre);
        $query = products::query(); // Inicializar la consulta


        if ($genre != 0) {
            $query->where('genre_id', '=', $request->genre);
        }

        if ($maxPrice) {
            $query->where('price', '<', $maxPrice);
        }


        $products = $query->get();
        return response()->json($products);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'artist' => 'required',
        ]);

        $product = new products;
        $product->name = $request->name;
        $product->artist = $request->artist;
        $product->year = $request->year;
        $product->price = $request->price;
        $product->compositores = $request->compositores;
        $product->discografica = $request->discografica;
        $product->duracion = $request->duracion;
        $product->tracklist = $request->tracklist;
        $product->genre_id = $request->genre;
        $product->image = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->storeAs('/img', $request->file('image')->getClientOriginalName());
            $product->image = $imagePath;
        }

        $product->save();
        return redirect()->route('products')->with('success', 'Producte registrat correctament!');
    }

    public function show($id)
    {
        $product = DB::table("products")
            ->join('genres', 'genre_id', '=', 'genres.id')
            ->select('products.*', 'genres.genre_name')
            ->where('products.id', '=', $id)
            ->get();
        $genres = genres::all();
        return view('products.show', ['product' => $product, 'genres' => $genres]);
    }

    public function index_single($id)
    {
        $products = DB::table("products")
            ->where('products.id', '=', $id)
            ->join('genres', 'genre_id', '=', 'genres.id')
            ->select('products.*', 'genres.genre_name')
            ->get();

        return response()->json($products);
    }

    public function update(Request $request, $id)
    {
        $product = products::find($id);
        $product->name = $request->name;
        $product->artist = $request->artist;
        $product->year = $request->year;
        $product->price = $request->price;
        $product->compositores = $request->compositores;
        $product->discografica = $request->discografica;
        $product->duracion = $request->duracion;
        $product->tracklist = $request->tracklist;
        $product->genre_id = $request->genre;
        // $product->image = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->storeAs('/img', $request->file('image')->getClientOriginalName());
            $product->image = $imagePath;
        }
        $product->save();

        return redirect()->route('products')->with('success', 'Producte actualitzat correctament!');
    }

    public function destroy($id)
    {
        $product = products::find($id);
        $product->delete();
        return redirect()->route('products')->with('success', 'El producte ha sigut el·liminat correctament!');
    }
}
