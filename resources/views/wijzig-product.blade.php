<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/style.css">
    <title>product wijzigen</title>
</head>

<body>
    @include('partials._navbar')

    <h1>Product wijzigen</h1>

    <div class="form-container">
        <form action="{{ route('MagazijnController.update') }}" method="POST">
            @csrf

            @foreach ($productData as $productField)
                <div class="input">
                    <label for="naam">product naam</label>
                    <input type="text" name="naam" value="{{ $productField->naam }}">
                </div>

                <div class="input">
                    <label for="barcode">barcode</label>
                    <input type="text" name="barcode" value="{{ $productField->barcode }}">
                </div>
            @endforeach

            @foreach ($magazijnData as $magazijnField)
                <div class="input">
                    <label for="verpakkingsEenheid">verpakkings eenheid</label>
                    <input type="number" name="verpakkingsEenheid" value="{{ floor( $magazijnField->verpakkingsEenheid * 2) / 2 }}">
                </div>

                <div class="input">
                    <label for="aantalAanwezig">Aantal in magazijn</label>
                    <input type="number" name="aantalAanwezig" value="{{ $magazijnField->aantalAanwezig }}">
                </div>

                <input type="hidden" name="id" value="{{ $productField->id }}">
            @endforeach


            <div class="buttons">
                <a href="/overzicht-magazijn">Terug</a>

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
