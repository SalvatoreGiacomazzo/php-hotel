<?php
$hotels = [

    [
        'name' => 'Hotel Belvedere',
        'description' => 'Hotel Belvedere Descrizione',
        'parking' => true,
        'vote' => 4,
        'distance_to_center' => 10.4
    ],
    [
        'name' => 'Hotel Futuro',
        'description' => 'Hotel Futuro Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 2
    ],
    [
        'name' => 'Hotel Rivamare',
        'description' => 'Hotel Rivamare Descrizione',
        'parking' => false,
        'vote' => 1,
        'distance_to_center' => 1
    ],
    [
        'name' => 'Hotel Bellavista',
        'description' => 'Hotel Bellavista Descrizione',
        'parking' => false,
        'vote' => 5,
        'distance_to_center' => 5.5
    ],
    [
        'name' => 'Hotel Milano',
        'description' => 'Hotel Milano Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 50
    ],

];
$filteredByParking = [];


if (isset($_GET['parkingFilter'])) {              //SE la richiesta get della checkbox arriva
    var_dump("filtrati per parcheggio");         //fai stampare la scritta
    foreach ($hotels as $hotel) {            //per ogni hotel in hotels, se la chiave dell'hotel 'parking' è true, pushalo nell'array $filteredByParking
        if ($hotel["parking"] == true) {
            array_push($filteredByParking, $hotel);
        }
    }
} else {
    var_dump("non filtrati");
    $filteredByParking = $hotels;        //Se tutto ciò non avviene, non viene creato un nuovo
}


if (isset($_GET['rating']) && $_GET['rating'] >= 1) {
    var_dump("filtrati per voto");
} else {
    var_dump("non filtrati per voto");
}

/*Stampare tutti i nostri hotel con tutti i dati disponibili.
Iniziate in modo graduale.
Prima stampate in pagina i dati, senza preoccuparvi dello stile.
Dopo aggiungete Bootstrap e mostrate le informazioni con una tabella.
Bonus:
1 - Aggiungere un form ad inizio pagina che tramite una richiesta GET permetta di filtrare gli hotel che hanno un parcheggio.
2 - Aggiungere un secondo campo al form che permetta di filtrare gli hotel per voto (es. inserisco 3 ed ottengo tutti gli hotel che hanno un voto di tre stelle o superiore)
*/
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Hotel</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>


<body>
    <div class="container h-50 w-75 mt-5">
        <div class="row">
            <!-- Inizio del form unificato -->
            <form class="form-check" action="index.php" method="GET">
                <!-- rarking form-->
                <div class="col-5">
                    <input class="form-check-input" type="checkbox" id="parkingFilter" name="parkingFilter">
                    <label class="form-check-label" for="parkingFilter">
                        Filtra parcheggio
                    </label>
                </div>

                <!-- rating form -->
                <div class="col-5">
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Filtra per voto</label>
                        <input type="number" min="1" max="5" class="form-control" name="rating" id="rating">
                    </div>
                </div>

                <!-- button -->
                <div class="col-2">
                    <button type="submit" class="btn btn-primary mt-3">Submit/Reset</button>
                </div>
            </form>

        </div>
    </div>

    <div class="row">
        <table class="table table-dark">
            <thead>

                <tr>
                    <?php foreach ($hotels[0] as $key => $value) { ?>
                        <th scope="col" class="text-warning"> <?= $key  ?></th>
                    <?php } ?>
                </tr>

            </thead>

            <?php foreach ($filteredByParking as $hotel) { ?>

                <tbody>
                    <tr>
                        <th scope="row" class="w-20"> <?= $hotel["name"]; ?></th>
                        <td><?= $hotel["description"]; ?></td>


                        <td>
                            <?php if ($hotel['parking']) {
                                echo "Disponibile";
                            } else {
                                echo "Non Disponibile";
                            } ?>
                        </td>

                        <td><?= $hotel["vote"]; ?>/5</td>
                        <td><?= $hotel["distance_to_center"]; ?>km</td>
                    </tr>

                <?php } ?>

                </tbody>

        </table>
    </div>
    </div>
    </div>
</body>


</body>

</html>