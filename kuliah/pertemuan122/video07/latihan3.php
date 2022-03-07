<?php
$mahasiswa = [
    ["Muhamad Jamaludin", "213040057", "Teknik Informatika", "muhhjam@gmail.com"],
    ["jamjam", "213040051", "Teknik Infalllovingyou", "jam@gmail.com"],
    ["udin", "213040666", "Teknik Teknikan", "muhamadjamaludinpadmawinata@gmail.com"]
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

            <li>Nama : <?= $mhs[0] ?></li>
            <li>NPM :<?= $mhs[1] ?></li>
            <li>Jurusan : <?= $mhs[2] ?></li>
            <li>Email : <?= $mhs[3] ?></li>

        </ul>
    <?php endforeach ?>

</body>

</html>