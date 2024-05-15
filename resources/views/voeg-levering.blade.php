<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/style.css">
    <title>Levering product</title>
</head>

<body>
    @include('partials._navbar')
    <h1>Levering product</h1>

    <ul class="add-info">
        <li>Naam: {{ $leverancier->naam }}</li>
        <li>Contactpersoon: {{ $leverancier->contactPersoon }}</li>
        <li>Mobiel: {{ $leverancier->mobiel }}</li>
    </ul>

    <div class="form-container">


        <form action="{{ route('LeveringController.store') }}" method="POST">

            @csrf

            <div class="input">
                <label for="aantal">Aantal Producten</label>
                <input type="number" name="aantal">
            </div>
            <div class="input">
                <label for="datumLevering">Datum levering
                </label>
                <input type="date" name="datumLevering">
            </div>

            <input type="hidden" name="leverancierId" value="{{ $leverancier->id }}">
            <input type="hidden" name="productId" value="{{ $productId }}">


            <div class="buttons">
                <a href="/overzicht-geleverde-producten/{{ $leverancier->id }}">Terug</a>
                <button type="submit">Opslaan</button>
            </div>
        </form>
    </div>


</body>

</html>
