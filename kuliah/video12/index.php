<?php


$mahasiswa = query("SELECT * FROM mahasiswa");

?>
<!DOCTYPE html>
<html>

<head>
    <title>Daftar Mahasiswa</title>
    <style>
        .container {
            display: flex;
            justify-content: center;
            flex-direction: column;
            text-align: center;
        }

        h1 {
            text-align: center;
        }

        .container a.tambah {
            text-align: start;
            margin: 10px;
            width: fit-content;
        }
    
</style>

</head>

<body>

    <div class="container">
        <h1>Daftar Mahasiswa</h1>

        <a href="tambah.php" class="tambah">+ Tambah data mahasiswa</a>

        <table border="1" cellpadding="10" cellspacing="0">

            <tr>
                <th>No.</th>
                <th>Aksi</th>
                <th>Gambar</th>
                <th>NRP</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Jurusan</th>
            </tr>


            <?php $i = 1; ?>

            <!-- ANALOGI TEMEN BAWA LEMARI KELUAR UNTUK NUNJUKIN BAJU -->
            <?php foreach ($mahasiswa as $mhs) : ?>
                <tr>
                    <td><?= $i; ?></td>
                    <td>
                        <a href="">ubah</a> |
                        <a href="hapus.php?id=<?= $mhs["id"] ?>" onclick="return confirm('Yakin?')">hapus</a>
                    </td>
                    <td><img src=" img/<?= $mhs["gambar"] ?>">
                    </td>
                    <td><?= $mhs["nrp"]; ?></td>
                    <td><?= $mhs["nama"]; ?></td>
                    <td><?= $mhs["email"]; ?></td>
                    <td><?= $mhs["jurusan"]; ?></td>
                </tr>
                <?php $i++; ?>
            <?php endforeach; ?>


        </table>
    </div>
</body>

</html>