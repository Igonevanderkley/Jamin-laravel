<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/style.css">
    <title>Product toevoegen</title>
</head>

<body>
    @include('partials._navbar')
    <h1>Leverancier toevoegen</h1>

    @if (session('success'))
        <div class="alert alert-success">
            <center>{{ session('success') }}</center>
        </div>
    @endif

    <div class="form-container">
        <form action="{{ route('LeverancierController.store') }}" method="POST">
            @csrf
            <div class="input">
                <label for="Naam">Naam</label>
                <input type="text" name="Naam" placeholder="Haribo">
            </div>

            <div class="input">
                <label for="Contactpersoon">Contactpersoon</label>
                <input type="text" name="Contactpersoon" placeholder="John Doe">
            </div>

            <div class="input">
                <label for="Leveranciernummer">Leveranciernummer</label>
                <input type="text" name="Leveranciernummer" placeholder="L102 93 24 748">
            </div>

            <div class="input">
                <label for="Mobiel">Mobiel</label>
                <input type="text" name="Mobiel" placeholder="06-12345678">
            </div>


            <div class="buttons">
                <a href="/overzicht-leveranciers">Andere leveranciers</a>

                <button type="submit">Opslaan</button>
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
