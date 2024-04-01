<?php

namespace App\Http\Controllers;

use App\Models\ProductLeverancier;
use Illuminate\Http\Request;

class ProductLeverancierController extends Controller
{
    public function store(Request $request)
    {
        $aantal = $request->input('aantal');
        $datumLevering = $request->input('datumLevering');
        $leverancierId_ = $request->input('leverancierId_');
        $productId = $request->input('productId');

        $productLeverancier = new ProductLeverancier();
        $productLeverancier->aantal = $aantal;
        $productLeverancier->datumLevering = $datumLevering;
        $productLeverancier->leverancierId = $leverancierId_;
        $productLeverancier->productId = $productId;
        $productLeverancier->save();

        return redirect('overzicht-geleverde-producten/' . $leverancierId_);
    }
}
