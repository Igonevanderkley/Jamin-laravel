<?php

namespace App\Http\Controllers;

use App\Models\ProductLeverancier;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Leverancier;

class LeveringController extends Controller
{

    public function index($id)
    {
        $leverancier = Product::find($id)->leveranciers;
        $product = Product::find($id);
        $productLeverancier = ProductLeverancier::where('productId', $id)->get();
        // $aantal = Magazijn::with('product')->where('productId', $id)->select('aantalAanwezig')->get();

        return view('overzicht-leveringen', [
            'leverancier' => $leverancier,
            'productLeverancier' => $productLeverancier,
            'product' => $product,
        ]);
    }

   

    public function geleverdeProducten($leverancierId)
    {
        $leverancier = Leverancier::find($leverancierId);

        $leveringen = ProductLeverancier::select(
            'Product.naam',
            'Product.id',
            'Magazijn.aantalAanwezig',
            'Magazijn.verpakkingsEenheid',
            'ProductLeverancier.datumLevering'
        )
        ->join('Product', 'ProductLeverancier.ProductId', '=', 'Product.Id')
        ->join('Magazijn', 'Product.Id', '=', 'Magazijn.ProductId')
        ->where('ProductLeverancier.leverancierId', $leverancierId)
        ->get();

    return view('overzicht-geleverde-producten', [
        'leverancier' => $leverancier,
        'leveringen' => $leveringen
    ]);

    }

    public function create($leverancierId, $productId)
    {
        $leverancier = Leverancier::find($leverancierId);
        return view('/voeg-levering', [
            'leverancier' => $leverancier,
            'productId' => $productId
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'aantal' => 'required|integer',
            'datumLevering' => 'required|date',
            'leverancierId' => 'required',
            'productId' => 'required'
        ]);

        $productLeverancier = new ProductLeverancier();
        $productLeverancier->aantal = $validatedData['aantal'];
        $productLeverancier->datumLevering = $validatedData['datumLevering'];
        $productLeverancier->leverancierId = $validatedData['leverancierId'];
        $productLeverancier->productId = $validatedData['productId'];
        $productLeverancier->save();

        return redirect('overzicht-geleverde-producten/' . $validatedData['leverancierId']);
    }

}
