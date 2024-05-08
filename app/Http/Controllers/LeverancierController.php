<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Leverancier;


class LeverancierController extends Controller
{

    public function index()
    {
        return view('voeg-leverancier');
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'Naam' => 'required|string',
            'Contactpersoon' => 'required|string',
            'Leveranciernummer' => 'required',
            'Mobiel' => 'required'
        ], [
            'Naam.required' => 'Een naam is verplicht.',
            'ContactPersoon.required' => 'Een contactpersoon is verplicht.',
            'LeverancierNummer.required' => 'Een leverancier nummer is verplicht.',
            'Mobiel.required' => 'Een mobiel nummer is verplicht.',
        ]);

        $leverancier = new Leverancier();
        $leverancier->naam = $validatedData['Naam'];
        $leverancier->contactpersoon = $validatedData['Contactpersoon'];
        $leverancier->leverancierNummer = $validatedData['Leveranciernummer'];
        $leverancier->mobiel = $validatedData['Mobiel'];
        $leverancier->save();

        return redirect('overzicht-leveranciers')->with('success', 'Leverancier is toegevoegd.');
    }
}
