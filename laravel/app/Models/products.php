<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\type;
use App\Models\genres;

class products extends Model
{
    use HasFactory;
    // protected $table = 'products';
    // protected $fillable = ['cd_name', 'artist', 'year', 'genre'];

    public function genre_id()
    {
        return $this->hasOne(genres::class, 'id');
    }

    public function type_id()
    {
        return $this->hasOne(type::class, 'id');
    }

}

