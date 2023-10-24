<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\products;
use App\Models\type;
use App\Models\genres;

class productsController extends Controller
{
    //
    public function index()
    {
        // $products = products::with(['genre_id'])->get();
        $products = products::all();
        return response()->json($products);
    }

    public function index_all()
    {
        $products = products::all();
        $genres = genres::all();
        $type = type::all();

        return view('products.index', ['products' => $products, 'genres' => $genres, 'type' => $type]);
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
        $product->genre_id = $request->genre;
        $product->type = $request->type;
        $product->image = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->storeAs('images', $request->file('image')->getClientOriginalName());
            $product->image = $imagePath;
        }

        $product->save();
        return redirect()->route('products')->with('success', 'Producte registrat correctament!');
    }
}
