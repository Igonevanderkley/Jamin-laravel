<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Overzicht leveranciers</title>
</head>

<body>
    @include('partials._navbar')
    <h1>Overzicht leveranciers</h1>

    <div class="tableDiv">
        <table>
            <thead>
                <tr>
                    <th>
                        <div class="button">
                            <a href="voeg-leverancier">Voeg leverancier toe</a>
                        </div>
                    </th>
                </tr>
                <tr>
                    <th>Naam</th>
                    <th>Contactpersoon</th>
                    <th>Leveranciernummer</th>
                    <th>Mobiel</th>
                    <th>Aantal verschillende producten </th>
                    <th>Toon producten</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($leveranciers as $leverancier)
                    <tr>
                        <td>{{ $leverancier->Naam }}</td>
                        <td>{{ $leverancier->contactpersoon }}</td>
                        <td>{{ $leverancier->leverancierNummer }}</td>
                        <td>{{ $leverancier->mobiel }}</td>
                        <td>{{ $leverancier->product_count }}</td>
                        <td>
                            <a href="overzicht-geleverde-producten/{{ $leverancier->Id }}">
                                <img src="img/box.png">
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</html>
