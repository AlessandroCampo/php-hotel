<?
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

$hotel_keys = array_keys($hotels[0]);
$with_park = $_GET['with_park'];
$min_vote = $_GET['min_vote'];

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>

    <form class="mb-5 w-25 ms-5" action='/boolean-ex/php-hotel/index.php' method="get">
        <div class="mb-3 form-check d-flex gap-3 align-items-center">
            <label class="form-label" for="parkCheck">With park</label>
            <input type="checkbox" class="form-input fs-1" id="parkCheck" name="with_park">
        </div>
        <div class="mb-3 form-check d-flex gap-3 align-items-center">
            <label for="vote_min" class="form-label">Minimum Vote</label>
            <input type="number" class="form-control fs-6 w-25" id="vote_min" max="5" name="min_vote">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>


    <!-- x -->

    <table class="table text-center ">
        <thead>
            <tr>
                <? foreach ($hotel_keys as $key) : ?>
                    <th scope="col"> <?= strtoupper($key);  ?></th>
                <? endforeach; ?>
            </tr>
        </thead>
        <tbody>
            <? foreach ($hotels as $hotel) : ?>
                <?php if ((!isset($_GET['with_park']) || $_GET['with_park'] == $hotel['parking']) && (!isset($_GET['min_vote']) || $hotel['vote'] >= $_GET['min_vote'])) : ?>

                    <tr>
                        <? foreach ($hotel as $key => $info) : ?>
                            <td>
                                <?
                                if ($key === 'vote' && is_numeric($info)) {
                                    for ($i = 0; $i < $info; $i++) {
                                        echo '<i class="fa-solid fa-star text-warning"></i>';
                                    }
                                } else {
                                    if (!is_bool($info)) {
                                        echo $info;
                                    } else if (is_bool($info)) {
                                        if ($info) {
                                            echo '<i class="fa-solid fa-check text-success"></i>';
                                        } else {
                                            echo '<i class="fa-solid fa-xmark text-danger"></i>';
                                        }
                                    }
                                }
                                ?>
                            </td>
                        <? endforeach; ?>
                    </tr>
                <?php endif; ?>
            <? endforeach; ?>

        </tbody>

    </table>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>

</html>