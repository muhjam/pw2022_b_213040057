<?php

// cek apakah tudak ada data di $_GET
if (
    !isset($_GET["nama"]) ||
    !isset($_GET["npm"]) ||
    !isset($_GET["email"]) ||
    !isset($_GET["jurusan"]) ||
    !isset($_GET["gambar"])

) {
    // redirect
    header("Location: latihan2.php");
    exit;
}

?>



<!DOCTYPE html>
<html>

<head>
    <title>Detail Mahasiswa</title>
</head>

<body>

    <ul>
        <li><img src="img/<?= $_GET["gambar"]; ?>"></li>
        <li>Nama : <?= $_GET["nama"]; ?></li>
        <li>NPM : <?= $_GET["npm"]; ?></li>
        <li>Email : <?= $_GET["email"]; ?></li>
        <li>Jurusan : <?= $_GET["jurusan"]; ?></li>
    </ul>


    <a href="latihan2.php">kembali ke daftar mahasiswa</a>
</body>

</html>