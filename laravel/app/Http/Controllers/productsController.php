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
        $products = products::with(['genres_id', 'type'])->get();
        return response()->json($products);
    }
}
