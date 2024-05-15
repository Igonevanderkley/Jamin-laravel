<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/style.css">
    <title>Geleverde producten</title>
</head>

<body>
    @include('partials._navbar')
    <h1>Geleverde producten</h1>
    <ul class="add-info">
        <li>Naam: {{ $leverancier->naam }}</li>
        <li>Contactpersoon: {{ $leverancier->contactPersoon }}</li>
        <li>Leverancier nummer: {{ $leverancier->Leveranciernummer }}</li>
        <li>Mobiel: {{ $leverancier->mobiel }}</li>
    </ul>

    <div class="tableDiv">

        <table>
            <thead>
                <tr>
                    <th>Naam</th>
                    <th>Aantal in magazijn</th>
                    <th>Verpakkingseenheid</th>
                    <th>Laatste levering</th>
                    <th>Nieuwe levering</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($leveringen as $levering)
                    <tr>
                        <td>{{ $levering->naam }}</td>
                        <td>{{ $levering->aantalAanwezig }}</td>
                        <td>{{ floor($levering->verpakkingsEenheid * 2) / 2 }} KG</td>
                        <td>{{ $levering->datumLevering }}</td>
                        <td>
                            <a href="/voeg-levering/{{ $leverancier->id }}/{{ $levering->id }}">
                                <img src="/img/plus.png">
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</body>

</html>
