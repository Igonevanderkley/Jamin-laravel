<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/style.css">
    <title>Overzicht Allergenen</title>
</head>

<body>
    @include('partials._navbar')
    <h1>Overzicht Allergenen</h1>

    <ul class="add-info">
        <li>{{ $productData->naam }}</li>
        <li>{{ $productData->barcode }}</li>
    </ul>

    <div class="tableDiv">
        <table>
            @if ($allergenen->isEmpty())
                <td>
                    In dit product zitten geen stoffen die een allergische reactie kunnen veroorzaken.
                </td>
            @else
                <thead>
                    <tr>
                        <th>Naam</th>
                        <th>Omschrijving</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($allergenen as $item)
                        <tr>
                            <td>{{ $item->naam }}</td>
                            <td>{{ $item->omschrijving }}</td>
                        </tr>
                    @endforeach
                </tbody>
        </table>
    </div>
        @endif
</body>

</html>
