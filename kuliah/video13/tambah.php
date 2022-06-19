<?php

// cek apakah tombol submit telah ditekan atau belum
if (isset($_POST["submit"])) {

    // cek apakag data berhasil di tambahkan atau tidak
    if (tambah($_POST) > 0) {
        echo "
        <script>
        alert('data berhasil ditambahkan')
        document.location.href='index.php'
        </script>";
    } else {
        echo
        "        <script>
        alert('data gagal ditambahkan')
        document.location.href='index.php'
        </script>";
    }
}

?>


<!DOCTYPE html>
<html>

<head>
    <title>Tambah data mahasiswa</title>

    <style>
        h1 {
            text-align: center;
        }

        form {
            width: fit-content;
            padding: 10px;
            margin: auto;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.19), 0 6px 6px rgba(0, 0, 0, 0.20);
        }

        table {
            margin-bottom: 10px;
        }

        button {
            cursor: pointer;
            margin-left: 30%;
        }
    
</style>

</head>

<body>
    <h1>Tambah data mahasiswa</h1>

    <form action="" method="post">
        <table>
            <tr>
                <td>
                    <label for="nrp">NRP</label>
                </td>
                <td>:</td>
                <td><input type="text" name="nrp" id="nrp" required></td>
            </tr>

            <tr>
                <td>
                    <label for="nama">Nama</label>
                </td>
                <td>:</td>
                <td><input type="text" name="nama" id="nama" required></td>
            </tr>

            <tr>
                <td>
                    <label for="email">Email</label>
                </td>
                <td>:</td>
                <td><input type="email" name="email" id="email" required></td>
            </tr>

            <tr>
                <td>
                    <label for="jurusan">Jurusan</label>
                </td>
                <td>:</td>
                <td><input type="text" name="jurusan" id="jurusan" required></td>
            </tr>

            <tr>
                <td>
                    <label for="gambar">Gambar</label>
                </td>
                <td>:</td>
                <td><input type="text" name="gambar" id="gambar" required></td>
            </tr>
        </table>

        <button type="submit" name="submit">Tambah Data!</button>

    </form>

</body>

</html>