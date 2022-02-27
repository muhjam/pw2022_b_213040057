<!-- Membuat Daftar Pasien RS Pasundan -->

<?php
// Daftar Pasien
$pasien = [
    [
        "nama" => "Muhamad Jamaludin",
        "umur" => "19 Tahun",
        "no.tlp" => "081257578571",
        "alamat" => "jl.Tutwuri Handayani No 81",
        "gambar" => "muhamadjamaludin.png"
    ],
    [
        "nama" => "Jamjam",
        "umur" => "15 Tahun",
        "no.tlp" => "081257576686",
        "alamat" => "Komplek Gria Bandung Indah Blok H No 21",
        "gambar" => "jamjam.png"
    ],
    [
        "nama" => "Udin",
        "umur" => "50 Tahun",
        "no.tlp" => "081257579121",
        "alamat" => "jl.Sukaresmi No 31",
        "gambar" => "udin.png"
    ],
    [
        "nama" => "ranca",
        "umur" => "60 Tahun",
        "no.tlp" => "081257579121",
        "alamat" => "jl.padasuka No 88",
        "gambar" => "ranca.png"
    ],
    [
        "nama" => "audi",
        "umur" => "10 Tahun",
        "no.tlp" => "081257579121",
        "alamat" => "jl.apartemen No 37",
        "gambar" => "audi.png"
    ],
    [
        "nama" => "rivan",
        "umur" => "22 Tahun",
        "no.tlp" => "081257579121",
        "alamat" => "jl.rajawali No 10",
        "gambar" => "rivan.png"
    ],

];

?>

<!DOCTYPE html>
<html>

<head>

    <title>Daftar Pasien | RS Pasundan</title>
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        body {
            font-family: sans-serif;
        }


        h1 {
            text-align: center;
            margin: 30px;
        }

        .container {
            box-sizing: border-box;
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
        }

        .card {
            margin: 10px;
            padding: 10px;
            width: 300px;
            height: 300px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.19), 0 6px 6px rgba(0, 0, 0, 0.20);

        }

        .card ul {
            list-style: none;
        }

        .card-img {
            width: 100%;
            height: 200px;
            margin-bottom: 10px;
        }

        .card-img img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }
    </style>
</head>

<body>
    <h1>Daftar Pasien <br> Rumah Sakit Pasundan</h1>

    <div class="container">
        <?php foreach ($pasien as $p) : ?>
            <div class="card">

                <div class="card-img">
                    <img src="img/<?= $p["gambar"] ?>">
                </div>
                <ul>
                    <li>Nama : <?= $p["nama"] ?></li>
                    <li>Umur : <?= $p["umur"] ?></li>
                    <li>No.tlp : <?= $p["no.tlp"] ?> </li>
                    <li>Alamat : <?= $p["alamat"] ?></li>
                </ul>
            </div>
        <?php endforeach ?>
    </div>
</body>

</html>