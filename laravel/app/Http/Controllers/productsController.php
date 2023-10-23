<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\products;

class productsController extends Controller
{
    //
    public function index()
    {
        $products = products::all();
        return response()->json($products);
    }
}
