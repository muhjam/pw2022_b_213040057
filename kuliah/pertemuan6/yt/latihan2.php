<?php
$mahasiswa = [
    [
        "nama" => "Muhamad Jamaludin",
        "npm" => "213040057",
        "jurusan" => "Teknik Informatika",
        "email" => "muhhjam@gmail.com",
        "gambar" => "muhamadjamaludin.png"
    ],
    [
        "nama" => "jamjam",
        "npm" => "213040666",
        "jurusan" => "Teknik Individu",
        "email" => "muhamadjamaludinpadmawinata@gmail.com",
        "gambar" => "jamjam.jpg"
    ],
    [
        "nama" => "udin",
        "npm" => "213040123",
        "jurusan" => "Teknik Sipil",
        "email" => "udingantengsedunia999@gmail.com",
        "gambar" => "udin.jpeg"
    ]

];


?>



<!DOCTYPE html>
<html>

<head>

    <title>Daftar Mahasiswa</title>
</head>

<body>
    <h1>Daftar Mahasiswa</h1>

    <?php foreach ($mahasiswa as $mhs) : ?>
        <ul>
            <li><img src="img/<?= $mhs["gambar"]; ?>"></li>
            <li>Nama : <?= $mhs["nama"];  ?></li>
            <li>NPM : <?= $mhs["npm"];  ?></li>
            <li>Jurusan : <?= $mhs["jurusan"];   ?></li>
            <li>Email : <?= $mhs["email"];   ?></li>

        </ul>
    <?php endforeach ?>

</body>

</html>

<!-- selesai -->