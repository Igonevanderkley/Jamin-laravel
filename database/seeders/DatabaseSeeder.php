<?php

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Allergeen;
use App\Models\Leverancier;
use App\Models\Magazijn;
use App\Models\ProductPerAllergeen;
use App\Models\ProductLeverancier;


class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Insert data into Product table
        Product::insert([
            ['Id' => 1, 'Naam' => 'Mintnopjes', 'Barcode' => 8719587231278],
            ['Id' => 2, 'Naam' => 'Schoolkrijt', 'Barcode' => 8719587326713],
            ['Id' => 3, 'Naam' => 'Honingdrop', 'Barcode' => 8719587327836],
            ['Id' => 4, 'Naam' => 'Zure Beren', 'Barcode' => 8719587321441],
            ['Id' => 5, 'Naam' => 'Cola Flesjes', 'Barcode' => 8719587321237],
            ['Id' => 6, 'Naam' => 'Turtles', 'Barcode' => 8719587322245],
            ['Id' => 7, 'Naam' => 'Witte Muizen', 'Barcode' => 8719587328256],
            ['Id' => 8, 'Naam' => 'Reuzen Slangen', 'Barcode' => 8719587325641],
            ['Id' => 9, 'Naam' => 'Zoute Rijen', 'Barcode' => 8719587322739],
            ['Id' => 10, 'Naam' => 'Winegums', 'Barcode' => 8719587327527],
            ['Id' => 11, 'Naam' => 'Drop Munten', 'Barcode' => 8719587322345],
            ['Id' => 12, 'Naam' => 'Kruis Drop', 'Barcode' => 8719587322265],
            ['Id' => 13, 'Naam' => 'Zoute Ruitjes', 'Barcode' => 8719587323256],
        ]);

        // Insert data into Allergeen table
        Allergeen::insert([
            ['Id' => 1, 'Naam' => 'Gluten', 'Omschrijving' => 'Dit product bevat gluten'],
            ['Id' => 2, 'Naam' => 'Gelatine', 'Omschrijving' => 'Dit product bevat gelatine'],
            ['Id' => 3, 'Naam' => 'AZO-kleurstof', 'Omschrijving' => 'Dit product bevat AZO-kleurstoffen'],
            ['Id' => 4, 'Naam' => 'Lactose', 'Omschrijving' => 'Dit product bevat lactose'],
            ['Id' => 5, 'Naam' => 'Soja', 'Omschrijving' => 'Dit product bevat soja'],
        ]);

        // Insert data into Leverancier table
        Leverancier::insert([
            ['Id' => 1, 'Naam' => 'Venco', 'ContactPersoon' => 'Bert van Linge', 'LeverancierNummer' => 'L102 93 84 719', 'Mobiel' => '06-28493827'],
            ['Id' => 2, 'Naam' => 'Astra sweets', 'ContactPersoon' => 'Jasper del Monte', 'LeverancierNummer' => 'L102 92 84 315', 'Mobiel' => '06-39398734'],
            ['Id' => 3, 'Naam' => 'Haribo', 'ContactPersoon' => 'Sven Stalman', 'LeverancierNummer' => 'L102 93 24 748', 'Mobiel' => '06-24383292'],
            ['Id' => 4, 'Naam' => 'Joyce  Stelterberg', 'ContactPersoon' => 'Jasper del Monte', 'LeverancierNummer' => 'L102 38 45 773', 'Mobiel' => '06-48293823'],
            ['Id' => 5, 'Naam' => 'De Bron', 'ContactPersoon' => 'Remco Veenstra', 'LeverancierNummer' => 'L102 38 57 736', 'Mobiel' => '06-34291234'],
            ['Id' => 6, 'Naam' => 'Quality Street', 'ContactPersoon' => 'Johan Nooij', 'LeverancierNummer' => 'L102 92 34 586', 'Mobiel' => '06-23458456'],
        ]);

        // Insert data into Magazijn table
        Magazijn::insert([
            ['Id' => 1, 'ProductId' => 1, 'VerpakkingsEenheid' => 5, 'AantalAanwezig' => 453],
            ['Id' => 2, 'ProductId' => 2, 'VerpakkingsEenheid' => 2.5, 'AantalAanwezig' => 400],
            ['Id' => 3, 'ProductId' => 3, 'VerpakkingsEenheid' => 5, 'AantalAanwezig' => 1],
            ['Id' => 4, 'ProductId' => 4, 'VerpakkingsEenheid' => 1, 'AantalAanwezig' => 800],
            ['Id' => 5, 'ProductId' => 5, 'VerpakkingsEenheid' => 3, 'AantalAanwezig' => 234],
            ['Id' => 6, 'ProductId' => 6, 'VerpakkingsEenheid' => 2, 'AantalAanwezig' => 345],
            ['Id' => 7, 'ProductId' => 7, 'VerpakkingsEenheid' => 1, 'AantalAanwezig' => 795],
            ['Id' => 8, 'ProductId' => 8, 'VerpakkingsEenheid' => 10, 'AantalAanwezig' => 233],
            ['Id' => 9, 'ProductId' => 9, 'VerpakkingsEenheid' => 2.5, 'AantalAanwezig' => 123],
            ['Id' => 10, 'ProductId' => 10, 'VerpakkingsEenheid' => 3, 'AantalAanwezig' => null],
            ['Id' => 11, 'ProductId' => 11, 'VerpakkingsEenheid' => 2, 'AantalAanwezig' => 367],
            ['Id' => 12, 'ProductId' => 12, 'VerpakkingsEenheid' => 1, 'AantalAanwezig' => 467],
            ['Id' => 13, 'ProductId' => 13, 'VerpakkingsEenheid' => 5, 'AantalAanwezig' => 20],
        ]);

        // Insert data into ProductPerAllergeen table
        ProductPerAllergeen::insert([
            ['Id' => 1, 'ProductId' => 1, 'AllergeenId' => 2],
            ['Id' => 2, 'ProductId' => 1, 'AllergeenId' => 1],
            ['Id' => 3, 'ProductId' => 1, 'AllergeenId' => 3],
            ['Id' => 4, 'ProductId' => 3, 'AllergeenId' => 4],
            ['Id' => 5, 'ProductId' => 6, 'AllergeenId' => 5],
            ['Id' => 6, 'ProductId' => 9, 'AllergeenId' => 2],
            ['Id' => 7, 'ProductId' => 9, 'AllergeenId' => 5],
            ['Id' => 8, 'ProductId' => 10, 'AllergeenId' => 2],
            ['Id' => 9, 'ProductId' => 12, 'AllergeenId' => 4],
            ['Id' => 10, 'ProductId' => 13, 'AllergeenId' => 1],
            ['Id' => 11, 'ProductId' => 13, 'AllergeenId' => 4],
            ['Id' => 12, 'ProductId' => 13, 'AllergeenId' => 5],
        ]);

        // Insert data into ProductLeverancier table
        ProductLeverancier::insert([
            ['Id' => 1, 'LeverancierId' => 1, 'ProductId' => 1, 'DatumLevering' => '2023-04-09', 'Aantal' => 23, 'DatumEerstVolgendeLevering' => '2023-04-09'],
            ['Id' => 2, 'LeverancierId' => 1, 'ProductId' => 1, 'DatumLevering' => '2023-04-18', 'Aantal' => 21, 'DatumEerstVolgendeLevering' => '2023-04-25'],
            ['Id' => 3, 'LeverancierId' => 1, 'ProductId' => 2, 'DatumLevering' => '2023-04-09', 'Aantal' => 12, 'DatumEerstVolgendeLevering' => '2023-04-16'],
            ['Id' => 4, 'LeverancierId' => 1, 'ProductId' => 3, 'DatumLevering' => '2023-04-10', 'Aantal' => 11, 'DatumEerstVolgendeLevering' => '2023-04-17'],
            ['Id' => 5, 'LeverancierId' => 2, 'ProductId' => 4, 'DatumLevering' => '2023-04-14', 'Aantal' => 16, 'DatumEerstVolgendeLevering' => '2023-04-21'],
            ['Id' => 6, 'LeverancierId' => 2, 'ProductId' => 4, 'DatumLevering' => '2023-04-21', 'Aantal' => 23, 'DatumEerstVolgendeLevering' => '2023-04-28'],
            ['Id' => 7, 'LeverancierId' => 2, 'ProductId' => 5, 'DatumLevering' => '2023-04-14', 'Aantal' => 45, 'DatumEerstVolgendeLevering' => '2023-04-21'],
            ['Id' => 8, 'LeverancierId' => 2, 'ProductId' => 6, 'DatumLevering' => '2023-04-14', 'Aantal' => 30, 'DatumEerstVolgendeLevering' => '2023-04-21'],
            ['Id' => 9, 'LeverancierId' => 3, 'ProductId' => 7, 'DatumLevering' => '2023-04-12', 'Aantal' => 12, 'DatumEerstVolgendeLevering' => '2023-04-19'],
            ['Id' => 10, 'LeverancierId' => 3, 'ProductId' => 7, 'DatumLevering' => '2023-04-19', 'Aantal' => 23, 'DatumEerstVolgendeLevering' => '2023-04-26'],
            ['Id' => 11, 'LeverancierId' => 3, 'ProductId' => 8, 'DatumLevering' => '2023-04-10', 'Aantal' => 12, 'DatumEerstVolgendeLevering' => '2023-04-17'],
            ['Id' => 12, 'LeverancierId' => 3, 'ProductId' => 9, 'DatumLevering' => '2023-04-11', 'Aantal' => 1, 'DatumEerstVolgendeLevering' => '2023-04-18'],
            ['Id' => 13, 'LeverancierId' => 4, 'ProductId' => 10, 'DatumLevering' => '2023-04-16', 'Aantal' => 24, 'DatumEerstVolgendeLevering' => '2023-04-30'],
            ['Id' => 14, 'LeverancierId' => 5, 'ProductId' => 11, 'DatumLevering' => '2023-04-10', 'Aantal' => 47, 'DatumEerstVolgendeLevering' => '2023-04-17'],
            ['Id' => 15, 'LeverancierId' => 5, 'ProductId' => 11, 'DatumLevering' => '2023-04-10', 'Aantal' => 60, 'DatumEerstVolgendeLevering' => '2023-04-26'],
            ['Id' => 16, 'LeverancierId' => 5, 'ProductId' => 12, 'DatumLevering' => '2023-04-11', 'Aantal' => 45, 'DatumEerstVolgendeLevering' => null],
            ['Id' => 17, 'LeverancierId' => 5, 'ProductId' => 13, 'DatumLevering' => '2023-04-12', 'Aantal' => 23, 'DatumEerstVolgendeLevering' => null],
        ]);
    }
}
