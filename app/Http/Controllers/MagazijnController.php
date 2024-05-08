<?php

namespace App\Http\Controllers;

use App\Models\Magazijn;
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
    

    public function wijzigIndex($itemId)
    {
        $productData = Product::where('id', $itemId)->get();
        $magazijnData = Magazijn::where('productId', $itemId)->get();

        return view('wijzig-product', [
            'productData' => $productData,
            'magazijnData' => $magazijnData
        ]);
    }

    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'naam' => 'required|string',
            'barcode' => 'required|numeric',
            'verpakkingsEenheid' => 'required',
            'aantalAanwezig' => 'integer'
        ], [
            'naam.required' => 'Naam is verplicht.',
            'barcode.required' => 'Barcode is verplicht.',
            'barcode.numeric' => 'Barcode moet valide getal zijn.',
            'verpakkingsEenheid.required' => 'Verpakkings eenheid is verplicht.',
        ]);

        $product = Product::find($request->id);
        $product->naam = $validatedData['naam'];
        $product->barcode = $validatedData['barcode'];
        $product->save();

        $magazijnProduct = Magazijn::where('productId', $request->id)->first();
        $magazijnProduct->verpakkingsEenheid = $validatedData['verpakkingsEenheid'];
        $magazijnProduct->aantalAanwezig = $validatedData['aantalAanwezig'];
        $magazijnProduct->save();

        return redirect()->route('overzicht-magazijn');
    }

    public function destroy($itemId)
    {
        $product = Product::find($itemId);
        $product->delete();

        $magazijnProduct = Magazijn::where('productId', $itemId)->first();
        $magazijnProduct->delete();

        return redirect()->route('overzicht-magazijn');
    }
}