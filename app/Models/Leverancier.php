<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leverancier extends Model
{
    use HasFactory;

    protected $table = 'leverancier';

    protected $fillable = [
        'naam',
        'contactPersoon',
        'leveranciernummer',
        'mobiel',
    ];


    public function products()
    {
        return $this->belongsToMany(Product::class, 'productleverancier', 'leverancierId', 'productId');
    }
}

