<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
<<<<<<< Updated upstream

class OrderController extends Controller
{
    //
=======
use App\Models\Order;
use Illuminate\Support\Facades\DB;
use App\Models\products;

class OrderController extends Controller
{
    public function index()
        {
            // $comandes = DB::table("orders")
            // ->join('products', '', '=', 'genres.id')
            // ->join('types', 'type_id', '=', 'types.id')
            // ->select('products.*', 'genres.genre_name', 'types.type')
            // ->get();
        }
    
>>>>>>> Stashed changes
}
