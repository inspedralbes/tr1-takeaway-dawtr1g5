<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\products;

class type extends Model
{
    use HasFactory;

    public function products()
    {
        return $this->hasMany(products::class, 'id');
    }
}
