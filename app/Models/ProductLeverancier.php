<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class ProductLeverancier extends Model
{
    use HasFactory;

    protected $table = 'productleverancier';

    protected $fillable = [
        'aantalProductheden',
        'datumEerstVolgendeLevering',
        'leverancierId',
        'productId',
    ];

}
