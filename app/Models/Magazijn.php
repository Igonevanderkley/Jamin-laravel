<?php

namespace App\Models;

use Illuminate\Http\Request;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Magazijn extends Model
{
    use HasFactory;

    protected $table = 'magazijn';

    // protected $fillable = [
    //     'aantalAanwezig',
    // ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'productId');
    }


}
