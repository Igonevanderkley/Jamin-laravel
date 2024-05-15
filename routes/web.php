<?php

use App\Http\Controllers\AllergeenController;
use App\Http\Controllers\MagazijnController;
use App\Http\Controllers\LeveringController;
use App\Http\Controllers\LeverancierController;

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome-jamin');
});


Route::get('overzicht-allergenen/{slug}', [AllergeenController::class, 'index'])->name('overzicht-allergenen');

// Levering routes
Route::get('overzicht-leveringen/{slug}', [LeveringController::class, 'index'])->name('overzicht-leveringen');


Route::get('overzicht-geleverde-producten/{slug}', [LeveringController::class, 'geleverdeProducten'])->name('overzicht-geleverde-producten');

// create and store method
Route::get('voeg-levering/{slug1}/{slug2}', [LeveringController::class, 'create'])->name('voeg-levering/{slug1}/{slug2}');
Route::post('LeveringController/store', [LeveringController::class, 'store'])->name('LeveringController.store');


//product routes
Route::get('overzicht-magazijn', [MagazijnController::class, 'index'])->name('overzicht-magazijn');

// create and store method
Route::get('voeg-product', [MagazijnController::class, 'create'])->name('voeg-product');
Route::post('MagazijnController/store', [MagazijnController::class, 'store'])->name('MagazijnController.store');

// edit and update method
Route::get('wijzig-product/{slug}', [MagazijnController::class, 'edit'])->name('wijzig-product');
Route::post('MagazijnController/update', [MagazijnController::class, 'update'])->name('MagazijnController.update');

//delete method
Route::get('verwijder-product/{slug}', [MagazijnController::class, 'destroy'])->name('verwijder-product');


// Leverancier routes
Route::get('overzicht-leveranciers', [LeverancierController::class, 'index'])->name('leveranciers');

// create and store method
Route::get('voeg-leverancier', [LeverancierController::class, 'create'])->name('voeg-leverancier');
Route::post('LeverancierController/store', [LeverancierController::class, 'store'])->name('LeverancierController.store');

