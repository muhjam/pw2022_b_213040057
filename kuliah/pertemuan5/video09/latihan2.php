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
    <title>Latihan $_GET</title>
</head>

<body>

    <h1>Daftar Mahasiswa</h1>
    <ul>
        <?php foreach ($mahasiswa as $mhs) : ?>

            <li> <a href="latihan3.php?nama=<?= $mhs["nama"]; ?>&npm=<?= $mhs["npm"]; ?>&email=<?= $mhs["email"]; ?>&jurusan=<?= $mhs["jurusan"]; ?>&gambar=<?= $mhs["gambar"]; ?>"><?= $mhs["nama"]; ?></a></li>

        <?php endforeach; ?>
    </ul>
</body>

</html>