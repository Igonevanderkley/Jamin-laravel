<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'product';


    public function leveranciers()
    {
        return $this->belongsToMany(Leverancier::class, 'productleverancier', 'productId', 'leverancierId');
    }

    public function allergenen()
    {
        return $this->belongsToMany(Allergeen::class, 'productperallergeen', 'productId', 'allergeenId');
    }

    public function magazijn()
    {
        return $this->hasOne(Magazijn::class, 'productId');
    }
}

