<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;


class MagazijnController extends Controller
{
  
    public function index()
    {
        $magazijnItems = Product::with('magazijn')->get();
        
        return view('overzicht-magazijn', [
            'magazijnItems' => $magazijnItems
        ]);
    }
}