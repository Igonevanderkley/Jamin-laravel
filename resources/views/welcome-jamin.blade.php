<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Dashboard</title>
</head>

<body>
    @include('partials._navbar')

    </div>
    <div class="homepage">
        <div class="banner">
            <div class="welcome-container">
                <div class="welcome-card">
                    <div>
                        <h1>Welcome bij Jamin</h1>

                        <center>
                            <h4>Iets nieuws toevoegen?</h4>
                        </center>
                        <ul class="function-icons">
                            <a href="voeg-leverancier">
                                <li><img src="img/distributor.png" alt="">Leverancier</li>
                            </a>
                            <a href="voeg-product">
                                <li><img src="img/candy.png" alt="">Product</li>
                            </a>
                            <a href="overzicht-leveranciers">
                                <li><img src="img/delivery.png" alt="">Levering</li>
                            </a>
                        </ul>

                        <div class="reads">
                            <a href="overzicht-magazijn">Magazijn overzicht</a>
                            <a href="overzicht-leveranciers">Leveranciers</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
