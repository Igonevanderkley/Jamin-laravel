<?php

use App\Http\Controllers\AllergeenController;
use App\Http\Controllers\MagazijnController;
use App\Http\Controllers\LeveringController;
use App\Http\Controllers\LeverancierController;

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome-jamin');
});

Route::get('overzicht-magazijn', [MagazijnController::class, 'index'])->name('overzicht-magazijn');

Route::get('overzicht-allergenen/{slug}', [AllergeenController::class, 'index'])->name('overzicht-allergenen');

Route::get('overzicht-leveringen/{slug}', [LeveringController::class, 'index'])->name('overzicht-leveringen');

Route::get('overzicht-leveranciers', [LeveringController::class, 'leveranciers'])->name('leveranciers');

Route::get('overzicht-geleverde-producten/{slug}', [LeveringController::class, 'geleverdeProducten'])->name('overzicht-geleverde-producten');

Route::get('voeg-levering/{slug1}/{slug2}', [LeveringController::class, 'voegLevering'])->name('voeg-levering/{slug1}/{slug2}');

Route::post('/LeveringController/store', [LeveringController::class, 'store'])->name('LeveringController.store');

Route::get('wijzig-product/{slug}', [MagazijnController::class, 'wijzigIndex'])->name('wijzig-product');

Route::post('/MagazijnController/update', [MagazijnController::class, 'update'])->name('MagazijnController.update');

Route::get('verwijder-product/{slug}', [MagazijnController::class, 'destroy'])->name('verwijder-product');

Route::get('voeg-product', [MagazijnController::class, 'createIndex'])->name('voeg-product');

Route::post('/MagazijnController/store', [MagazijnController::class, 'store'])->name('MagazijnController.store');

Route::get('voeg-leverancier', [LeverancierController::class, 'index'])->name('voeg-leverancier');

Route::post('/LeverancierController/store', [LeverancierController::class, 'store'])->name('LeverancierController.store');

