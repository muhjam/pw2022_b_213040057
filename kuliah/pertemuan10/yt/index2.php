<?php
// Koneksi ke database
// "root dstiu itu password kalo pake MAMP"
// $conn = mysqli_connect("localhost", "root", "", "phpdasar");


$conn = mysqli_connect("localhost", "root", "", "phpdasar");

// Mengambil data dari tabel "mahasiswa" / query data mahasiswa

// CARA NGECEK DATA PADA TABEL DATA BASE
// $result = mysqli_query($conn, "SELECT * FROM mahasiswa");
// var_dump($result);

// KALO NGECEK EROR
// $result = mysqli_query($conn, "SELECT * FROM mahasiswa");
// if (!$result) {
//     echo mysqli_error($conn);
// }

// mysqli_query($conn, "SELECT * FROM mahasiswa");


$result = mysqli_query($conn, "SELECT * FROM mahasiswa");

// ambil data (fetch) mahasiswa dari object result
// mysqli_fetch_row()       //  Mengembalikan array numerik
// mysqli_fetch_assoc()     //  Mengembalikan array associative
// mysqli_fetch_array()     //  Mengembalikan keduanya
// mysqli_fetch_object()    //  


// Berikut contoh Penerapannya:

// $mhs = mysqli_fetch_row($result);
// var_dump($mhs[2]);

// $mhs = mysqli_fetch_assoc($result);
// var_dump($mhs["jurusan"]);

// $mhs = mysqli_fetch_array($result);
// var_dump($mhs[2])        jadi kalo ini bisa dua duanya row sama assoc

// $mhs = mysqli_fetch_row($result);
// var_dump($mhs->email)

// Lanjut Ngoding

// pake while supaya semua data keluar
// while ($mhs = mysqli_fetch_assoc($result)) {
//     var_dump($mhs["nama"]);
// }


?>
<!DOCTYPE html>
<html>

<head>
    <title>Daftar Mahasiswa</title>
</head>

<body>

    <h1>Daftar Mahasiswa</h1>

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
        <?php while ($row = mysqli_fetch_assoc($result)) : ?>
            <tr>
                <td><?= $i; ?></td>
                <td>
                    <a href="">ubah</a> |
                    <a href="">hapus</a>
                </td>
                <td><img src="img/<?= $row["gambar"] ?>"></td>
                <td><?= $row["nrp"]; ?></td>
                <td><?= $row["nama"]; ?></td>
                <td><?= $row["email"]; ?></td>
                <td><?= $row["jurusan"]; ?></td>
            </tr>
            <?php $i++; ?>
        <?php endwhile; ?>


    </table>

</body>

</html>


<!-- selesai -->