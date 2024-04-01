<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Allergeen extends Model
{
    use HasFactory;

    protected $table = 'allergeen';

    public function products()
    {
        return $this->belongsToMany(Product::class, 'productperallergeen', 'allergeenId', 'productId');
    }
}
    
