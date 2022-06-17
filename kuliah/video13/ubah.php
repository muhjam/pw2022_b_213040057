<?php

// ambil data di URL
$id= $_GET["id"];

// query data mahasiswa berdasarkan id
$mhs= query("SELECT * FROM mahasiswa WHERE id= $id")[0]; // supaya ga manggil 0 nya lagi

// cek apakah tombol submit telah ditekan atau belum
if (isset($_POST["submit"])) {

    // cek apakag data berhasil diubah atau tidak
    if (ubah($_POST) > 0) {
        echo "
        <script>
        alert('data berhasil diubah')
        document.location.href='index.php'
        </script>";
    } else {
        echo
        "        <script>
        alert('data gagal diubah')
        document.location.href='index.php'
        </script>";
    }
}

?>


<!DOCTYPE html>
<html>

<head>
    <title>Ubah data mahasiswa</title>

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
    <h1>Ubah data mahasiswa</h1>

    <form action="" method="post">
        <input type="hidden" name="id" value="<?= $mhs["id"]; ?>">
        <table>
            <tr>
                <td>
                    <label for="nrp">NRP</label>
                </td>
                <td>:</td>
                <td><input type="text" name="nrp" id="nrp" required value="<?= $mhs["nrp"]?>";></td>
            </tr>

            <tr>
                <td>
                    <label for="nama">Nama</label>
                </td>
                <td>:</td>
                <td><input type="text" name="nama" id="nama" required value="<?= $mhs["nama"]?>":></td>
            </tr>

            <tr>
                <td>
                    <label for="email">Email</label>
                </td>
                <td>:</td>
                <td><input type="email" name="email" id="email" required value="<?= $mhs["email"]?>";></td>
            </tr>

            <tr>
                <td>
                    <label for="jurusan">Jurusan</label>
                </td>
                <td>:</td>
                <td><input type="text" name="jurusan" id="jurusan" required value="<?= $mhs["jurusan"]?>";></td>
            </tr>

            <tr>
                <td>
                    <label for="gambar">Gambar</label>
                </td>
                <td>:</td>
                <td><input type="text" name="gambar" id="gambar" required value="<?= $mhs["gambar"]?>";></td>
            </tr>
        </table>

        <button type="submit" name="submit"><a onclick="return confirm('Anda yakin mengubahnya?')">Ubah Data!</a></button>

    </form>

</body>

</html>