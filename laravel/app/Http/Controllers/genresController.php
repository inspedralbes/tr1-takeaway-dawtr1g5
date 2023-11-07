<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\genres;

class genresController extends Controller
{
    public function index()
    {
        $genres = genres::all();
        return response()->json($genres);
    }
}
