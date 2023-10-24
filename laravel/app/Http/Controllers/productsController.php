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
        // $products = products::all();
        // $type = type::all();
        // $genres = genres::all();
        // return response()->json([$products, $type, $genres]);

        // $products = products::with(['getProductRelation'])->get();

        $products = DB::table("products")
            ->join('genres', 'genre_id', '=', 'genres.id')
            ->join('types', 'type_id', '=', 'types.id')
            ->select('products.*', 'genres.genre_name', 'types.type')
            ->get();


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
        $product->type_id = $request->type_id;
        $product->image = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->storeAs('/img', $request->file('image')->getClientOriginalName());
            $product->image = $imagePath;
        }

        $product->save();
        return redirect()->route('products')->with('success', 'Producte registrat correctament!');
    }
}
