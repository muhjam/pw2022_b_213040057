<?php
//array associative
//array yang indexnya berupa String, yang berpasangan dengan nilainya
$mahasiswa = [
    [
        "nama"=>"Muhamad Jamaludin",
        "npm"=>"213040057", 
        "email"=>"muhhjam@gmail.com",
        "jurusan"=>"Teknik Informatika"
    ],
    [
        "nama"=>"Rivialdi",
        "npm"=>"213040049", 
        "email"=>"rivialdi@gmail.com", 
        "jurusan"=>"Teknik Informatika"
    ],
    [
        "nama"=>"Jimmy", 
        "npm"=>"213040050", 
        "email"=>"jimmy@gmail.com", 
        "jurusan"=>"Teknik Informatika"
    ],
    [
        "nama"=>"Lanang", 
        "npm"=>"213040046", 
        "email"=>"lanang@gmail.com", 
        "jurusan"=>"Teknik Informatika"],
    [
        "nama"=>"Rivan", 
        "npm"=>"213040045", 
        "email"=>"rivan@gmail.com", 
        "jurusan"=>"Teknik Informatika"
    ],
    [
        "nama"=>"Jauhari", 
        "npm"=>"213040060", 
        "email"=>"jauhari@gmail.com", 
        "jurusan"=>"Teknik Informatika"
    ],
    [
        "nama"=>"Audi", 
        "npm"=>"213040076", 
        "email"=>"audi@gmail.com", 
        "jurusan"=>"Teknik Informatika"
    ],    
    [
        "nama"=>"Ahmad", 
        "npm"=>"213040077", 
        "email"=>"ahmad@gmail.com", 
        "jurusan"=>"Teknik Informatika"
    ],
    [
        "nama"=>"Ardhi", 
        "npm"=>"213040082", 
        "email"=>"ardhi@gmail.com", 
        "jurusan"=>"Teknik Informatika"
    ],
    [
        "nama"=>"Rendi", 
        "npm"=>"213040081", 
        "email"=>"rendi@gmail.com", 
        "jurusan"=>"Teknik Informatika"
    ]
];
?>
// var_dump($mahasiswa[1]['email']);
?<!DOCTYPE html>
<html lang="en">

<head>
    <title>Daftar Mahasiswa</title>
    <style>
        body {
            font-family: sans-serif;
        }

        h1 {
            text-align: center;
        }

        .container {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
        }

        ul {
            float: left;
            margin: 20px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.19), 0 6px 6px rgba(0, 0, 0, 0.20);
            width: 250px;
        }

        ul li {
            line-height: 20px;
            list-style: none;
        }
    </style>

</head>

<body>
    <h1>Daftar Mahasiswa</h1>


    <div class="container">

        <?php foreach ($mahasiswa as $mhs) : ?>
            <ul>

                <li>Nama : <?= $mhs["nama"] ?></li>
                <li>NPM : <?= $mhs["npm"] ?></li>
                <li>Email : <?= $mhs["email"] ?></li>
                <li>Jurusan : <?= $mhs["jurusan"] ?></li>

            </ul>
        <?php endforeach ?>

    </div>
</body>

</html>

<!-- selesai -->