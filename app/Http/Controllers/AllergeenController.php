<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;


class AllergeenController extends Controller
{
    public function index($id)
    {
        $allergenen = Product::find($id)->allergenen;
        $productData = Product::find($id);

        return view('overzicht-allergenen', [
            'allergenen' => $allergenen,
            'productData' => $productData
        ]);
    }
}