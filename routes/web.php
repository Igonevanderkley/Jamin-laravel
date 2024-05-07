<?php

use App\Http\Controllers\AllergeenController;
use App\Http\Controllers\MagazijnController;
use App\Http\Controllers\LeveringController;
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

Route::post('/productleverancier/store', [LeveringController::class, 'store'])->name('ProductLeverancier.store');

