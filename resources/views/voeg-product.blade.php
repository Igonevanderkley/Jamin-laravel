<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/style.css">
    <title>product toevoegen</title>
</head>

<body>
    @include('partials._navbar')

    <h1>Product toevoegen</h1>

    <div class="form-container">
        <form action="{{ route('MagazijnController.store') }}" method="POST">
            @csrf
                <div class="input">
                    <label for="naam">product naam</label>
                    <input type="text" name="naam" placeholder="Mintnopjes">
                </div>

                <div class="input">
                    <label for="barcode">barcode</label>
                    <input type="text" name="barcode" placeholder="8719587231278">
                </div>

                <div class="input">
                    <label for="verpakkingsEenheid">verpakkings eenheid (KG)</label>
                    <input step="any" type="number" name="verpakkingsEenheid" placeholder="5">
                </div>

                <div class="input">
                    <label for="aantalAanwezig">Aantal in magazijn</label>
                    <input type="number" name="aantalAanwezig" placeholder="45">
                </div>

                    <div class="input">
                    <label for="aantalAanwezig">Aantal in magazijn</label>
                    <input type="number" name="aantalAanwezig" placeholder="45">
                </div>


            <div class="buttons">
                <a href="/overzicht-magazijn">Andere producten</a>

                <button type="submit">Sla op</button>
            </div>


            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <h4>{{ $error }}</h4>
                        @endforeach
                    </ul>
                </div>
            @endif
        </form>

    </div>
</body>

</html>
