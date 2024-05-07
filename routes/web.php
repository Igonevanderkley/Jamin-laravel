<?php

use App\Http\Controllers\AllergeenController;
use App\Http\Controllers\MagazijnController;
use App\Http\Controllers\LeverancierController;
use App\Http\Controllers\LeveringController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\leverancier;

use App\Models\ProductLeverancier;


use Illuminate\Support\Collection;

Route::get('/', function () {
    return view('welcome-jamin');
});

Route::get('overzicht-magazijn', [MagazijnController::class, 'index'])->name('overzicht-magazijn');

Route::get('overzicht-allergenen/{slug}', [AllergeenController::class, 'index'])->name('overzicht-allergenen');

Route::get('overzicht-leveringen/{slug}', [LeveringController::class, 'index'])->name('overzicht-leveringen');

Route::get('overzicht-leveranciers', [LeveringController::class, 'leveranciers'])->name('leveranciers');

Route::get('overzicht-geleverde-producten/{slug}', [LeveringController::class, 'geleverdeProducten'])->name('overzicht-geleverde-producten');

Route::get('voeg-levering/{slug}/{rowin}', function ($leverancierId, $productId) {
    $leverancier = Leverancier::find($leverancierId);
    return view('/voeg-levering', [
        'leverancier' => $leverancier,
        'productId' => $productId
    ]);
});

// Route::post('voeg-levering', 'ProductLeverancier@store')->name('ProductLeverancier.store', ProductLeverancier::class);

Route::post('/productleverancier/store', [ProductLeverancier::class, 'store'])->name('ProductLeverancier.store');


// Route::resource('voeg-levering/{slug}', MagazijnController::class)
//     ->only(['store']);





// Route::get('categories/{category:slug}', function (Category $category) {
//     return view('posts', [
//         'posts' => $category->posts
//     ]);
// });
