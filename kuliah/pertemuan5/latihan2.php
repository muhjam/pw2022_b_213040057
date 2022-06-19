<?php
// pengulangan pada array
// for / foreach
$angka = [3, 2, 15, 20, 11, 77, 89];
?>

<!DOCTYPE html>
<html>

<head>
    <title>Latihan Array</title>
    <style>
        .kotak {
            width: 50px;
            height: 50px;
            background-color: salmon;
            text-align: center;
            line-height: 50px;
            margin: 3px;
            float: left;
        }

        .clear {
            clear: both;
        }
    
</style>
</head>

<body>

    <!-- count ini untuk menjumlahkan otomatis isi array nya -->


    <!-- for -->
    <?php for ($i = 0; $i < count($angka); $i++) { ?>
        <div class="kotak"><?php echo $angka[$i] ?></div>
    <?php } ?>

    <div class="clear"></div>

    <!-- foreach -->
    <?php foreach ($angka as $a) { ?>
        <div class="kotak"> <?php echo $a; ?> </div>
    <?php } ?>

    <div class="clear"></div>

    <!-- foreach sederhana -->
    <?php foreach ($angka as $a) : ?>
        <div class="kotak"> <?= $a; ?> </div>
    <?php endforeach ?>


</body>

</html>

<!-- selesai -->