<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\products;

class genres extends Model
{
    use HasFactory;

    public function product()
    {
        return $this->belongsTo(products::class, 'id');
    }

}
