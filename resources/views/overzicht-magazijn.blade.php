<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>overzicht magazijn</title>
</head>

<body>
    @include('partials._navbar')
        <h1>Magazijn overzicht</h1>

        <div class="tableDiv">
            <table>
                <thead>
                    <tr>
                        <th>Barcode</th>
                        <th>Naam</th>
                        <th>Verpakkings eenheid</th>
                        <th>Aantal aanwezig</th>
                        <th>Allergeen info</th>
                        <th>Leverings info</th>
                        <th>Wijzig</th>
                        <th>Verwijder</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($magazijnItems as $item)
                        <tr>
                            <td>{{ $item->barcode }}</td>
                            <td>{{ $item->naam }}</td>
                            <td>{{ floor($item['magazijn']['verpakkingsEenheid'] * 2) / 2 }}</td>
                            <td>{{ $item['magazijn']['aantalAanwezig'] }}</td>
                            <td>
                                <a href="overzicht-allergenen/{{ $item->id }}">
                                    <img src="img/allergy.png">
                                </a>
                            </td>
                            <td>
                                <a href="overzicht-leveringen/{{ $item->id }}">
                                    <img src="img/questionMark.svg">
                                </a>
                            </td>
                            <td>
                                <a href="wijzig-product/{{ $item->id }}">
                                    <img src="img/pencil.png">
                                </a>
                            </td>
                            <td>
                                <a href="verwijder-product/{{ $item->id }}">
                                    <img src="img/trash.png">
                                </a>
                            </td>

                        </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
</body>

</html>
