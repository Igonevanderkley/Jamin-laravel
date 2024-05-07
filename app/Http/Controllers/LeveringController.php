<?php

namespace App\Http\Controllers;

use App\Models\ProductLeverancier;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
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

    public function leveranciers()
    {
        $leveranciers = ProductLeverancier::select(
            'ProductLeverancier.LeverancierId',
            'Leverancier.Naam',
            'Leverancier.contactpersoon',
            'Leverancier.leverancierNummer',
            'Leverancier.mobiel',
            DB::raw('count(distinct ProductLeverancier.ProductId) as product_count')
        )

            ->join('Leverancier', 'ProductLeverancier.LeverancierId', '=', 'Leverancier.Id')
            ->groupBy('ProductLeverancier.LeverancierId', 'Leverancier.Naam')
            ->get();


        return view('overzicht-leveranciers', [
            'leveranciers' => $leveranciers,
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

    public function voegLevering($leverancierId, $productId)
    {
        $leverancier = Leverancier::find($leverancierId);
        return view('/voeg-levering', [
            'leverancier' => $leverancier,
            'productId' => $productId
        ]);
    }

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
