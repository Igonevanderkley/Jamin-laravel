<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Leverancier;


class LeverancierController extends Controller
{
    public function index()
    {
        $leveranciers = Leverancier::select(
            'Leverancier.Id',
            'Leverancier.Naam',
            'Leverancier.contactpersoon',
            'Leverancier.leverancierNummer',
            'Leverancier.mobiel',
            DB::raw('count(distinct ProductLeverancier.ProductId) as product_count')
        )
            ->leftJoin('ProductLeverancier', 'ProductLeverancier.LeverancierId', '=', 'Leverancier.Id')
            ->groupBy('Leverancier.Id', 'Leverancier.Naam', 'Leverancier.contactpersoon', 'Leverancier.leverancierNummer', 'Leverancier.mobiel')
            ->get();
        return view('overzicht-leveranciers', [
            'leveranciers' => $leveranciers,
        ]);
    }

    public function create()
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
