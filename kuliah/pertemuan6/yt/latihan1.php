<!DOCTYPE html>
<html>

<head>

    <title>Latihan Array Associative</title>

    <style>
        .kotak {
            width: 30px;
            height: 30px;
            line-height: 30px;
            text-align: center;
            margin: 3px;
            float: left;
            background-color: green;
        }

        .clear {
            clear: both;
        }
    
</style>

</head>

<body>

    <?php
    $angka = [
        [1, 2, 3],
        [4, 5, 6],
        [7, 8, 9]
    ];

    // cara bacanya [0] itu index terluar berapa [2] itu index dalemnya jadi nya "3"
    // echo $angka[0][2]; 
    ?>


    <?php foreach ($angka as $a) : ?>
        <?php foreach ($a as $b) : ?>
            <div class="kotak"><?= $b ?></div>
        <?php endforeach ?>
        <div class="clear"></div>
    <?php endforeach ?>

</body>

</html>

<!-- selesai -->