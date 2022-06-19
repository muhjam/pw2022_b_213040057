<?php
$mahasiswa = [
    ["Muhamad Jamaludin", "213040057", "muhhjam@gmail.com", "Teknik Informatika"],
    ["Rivialdi", "213040049", "rivialdi@gmail.com", "Teknik Informatika"],
    ["Jimmy", "213040050", "jimmy@gmail.com", "Teknik Informatika"],
    ["Lanang", "213040046", "lanang@gmail.com", "Teknik Informatika"],
    ["Rivan", "213040045", "rivan@gmail.com", "Teknik Informatika"],
    ["Jauhari", "213040060", "jauhari@gmail.com", "Teknik Informatika"],
    ["Audi", "213040076", "audi@gmail.com", "Teknik Informatika"],    ["Ahmad", "213040077", "ahmad@gmail.com", "Teknik Informatika"],
    ["Ardhi", "213040082", "ardhi@gmail.com", "Teknik Informatika"],
    ["Rendi", "213040081", "rendi@gmail.com", "Teknik Informatika"]

];
?>
<!DOCTYPE html>
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

                <li>Nama : <?= $mhs[0] ?></li>
                <li>NPM : <?= $mhs[1] ?></li>
                <li>Email : <?= $mhs[2] ?></li>
                <li>Jurusan : <?= $mhs[3] ?></li>

            </ul>
        <?php endforeach ?>

    </div>
</body>

</html>

<!-- selesai -->