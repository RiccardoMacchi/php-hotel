<?php

    $disp_park = $_GET["disp_park"];
    var_dump(empty($disp_park));

    $filter_vote = $_GET["min_vote"];
    
    echo "===============";
    var_dump($disp_park);


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
    var_dump($filter_vote >= $hotels[0]['vote']);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <form action="index.php" method="GET">
            <input type="checkbox" name="disp_park">
            <label for="radio_btn">Disponibilità di Parcheggio</label>
            <input value="1" type="radio" name="min_vote">
            <label for="votes">1 stella</label>
            <input value="2" type="radio" name="min_vote">
            <label for="votes">2 stella</label>
            <input value="3" type="radio" name="min_vote">
            <label for="votes">3 stella</label>
            <input value="4" type="radio" name="min_vote">
            <label for="votes">4 stella</label>
            <input value="5" type="radio" name="min_vote">
            <label for="votes">5 stella</label>
            <button>FILTRA</button>
        </form>
    </div>
    <div class="container">
        <table>
            <tr>
                <th>Nome Hotel</th>
                <th>Descrizione Hotel</th>
                <th>Disponibile Parcheggio</th>
                <th>Voto</th>
                <th>Distanza dal centro in km</th>
            </tr>
            <?php foreach($hotels as $hotel): ?>
                <?php if((empty($disp_park) || $hotel['parking']) && $filter_vote <= $hotel['vote']): ?>
            <tr>
                <td><?php echo $hotel['name'] ?></td>
                <td><?php echo $hotel['description'] ?></td>
                <td><?php echo ($hotel['parking'] ? 'Si' : 'No') ?></td>
                <td><?php echo $hotel['vote']?></td>
                <td><?php echo $hotel['distance_to_center'] ?></td>
            </tr>
                <?php endif; ?>
            <?php endforeach; ?>
        </table>
    </div>
</body>
</html>