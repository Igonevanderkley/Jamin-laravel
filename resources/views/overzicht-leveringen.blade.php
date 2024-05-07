<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/style.css">
    <title>Leverings Informatie</title>
</head>

<body>
    @include('partials._navbar')
    <h1>Leverings Informatie</h1>

    @foreach ($leverancier as $item)
        <ul class="add-info">
            <li>Naam: {{ $item->naam }}</li>
            <li>Contactpersoon: {{ $item->contactPersoon }}</li>
            <li>Leverancier nummer: {{ $item->Leveranciernummer }}</li>
            <li>Mobiel: {{ $item->mobiel }}</li>
        </ul>
    @break
@endforeach

<div class="tableDiv">
    <table>
        <thead>
            <tr>
                <th>Naam product</th>
                <th>Datum laatste levering</th>
                <th>Aantal</th>
                <th>Eerst volgende levering</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($productLeverancier as $levering)
                <tr>
                    <td>{{ $product->naam }}</td>
                    <td>{{ $levering->datumLevering }}</td>
                    <td>{{ $levering->aantal }}</td>
                    <td>{{ $levering->datumEerstVolgendeLevering }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

</body>

</html>
