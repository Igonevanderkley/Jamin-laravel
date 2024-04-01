<?php

use App\Http\Controllers\ProductLeverancierController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Magazijn;
use App\Models\leverancier;

use App\Models\ProductLeverancier;


use Illuminate\Support\Collection;

Route::get('/', function () {
    return view('welcome-jamin');
});

Route::get('overzicht-magazijn', function () {
    $magazijnItems = Product::with('magazijn')->get();

    return view('overzicht-magazijn', [
        'magazijnItems' => $magazijnItems
    ]);
});

Route::get('overzicht-allergenen/{slug}', function ($id) {
    $allergenen = Product::find($id)->allergenen;
    $productData = Product::find($id);

    return view('overzicht-allergenen', [
        'allergenen' => $allergenen,
        'productData' => $productData
    ]);
});


Route::get('overzicht-leveringen/{slug}', function ($id) {
    $leverancier = Product::find($id)->leveranciers;
    $product = Product::find($id);
    $productLeverancier = ProductLeverancier::where('productId', $id)->get();
    // $aantal = Magazijn::with('product')->where('productId', $id)->select('aantalAanwezig')->get();

    return view('overzicht-leveringen', [
        'leverancier' => $leverancier,
        'productLeverancier' => $productLeverancier,
        'product' => $product,
    ]);
});

Route::get('overzicht-leveranciers', function () {
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
});

Route::get('overzicht-geleverde-producten/{slug}', function ($leverancierId) {
    $leverancier = Leverancier::find($leverancierId);

    $leveringen =
        ProductLeverancier::select(
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
});

Route::get('voeg-levering/{slug}/{rowin}', function ($leverancierId, $productId) {
    $leverancier = Leverancier::find($leverancierId);
    return view('/voeg-levering', [
        'leverancier' => $leverancier,
        'productId' => $productId
    ]);
});

// Route::post('voeg-levering', 'ProductLeverancier@store')->name('ProductLeverancier.store', ProductLeverancier::class);

Route::post('/productleverancier/store', [ProductLeverancierController::class, 'store'])->name('ProductLeverancier.store');


// Route::resource('voeg-levering/{slug}', MagazijnController::class)
//     ->only(['store']);





// Route::get('categories/{category:slug}', function (Category $category) {
//     return view('posts', [
//         'posts' => $category->posts
//     ]);
// });
