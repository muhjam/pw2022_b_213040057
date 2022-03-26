<!DOCTYPE html>
<html>

<head>
    <title>POST</title>
</head>

<body>

    <!-- <form action="latihan5.php" method="post">
        <label for="nama">
            masukkan nama
            <input type="nama" name="nama" id="nama">
        </label>
        <br>
        <button type="submit" name="submit">Kirim!</button>

    </form> -->


    <!-- ini kalo action nya kosong, jadinya ke halaman sendiri -->

    <?php if (isset($_POST["submit"])) : ?>
        <h1>Halo, Sekamat datang <?= $_POST["nama"]; ?></h1>
    <?php endif ?>


    <form action="" method="post">
        <label for="nama">
            masukkan nama
            <input type="nama" name="nama" id="nama">
        </label>
        <br>
        <button type="submit" name="submit">Kirim!</button>

    </form>



</body>

</html>

<!-- selesai -->