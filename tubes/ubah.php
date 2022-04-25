<?php
require 'functions.php';

// ambil data di URL
$id= $_GET["id"];

// query data mahasiswa berdasarkan id
$produk= query("SELECT * FROM produk WHERE id=$id")[0]; // supaya ga manggil 0 nya lagi

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
        echo"
        <script>
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
    <h1>Ubah data produk</h1>


    <form action="" method="post" enctype="multipart/form-data">

        <input type="hidden" name="id" value="<?= $produk["id"];?>">
          <input type="hidden" name="gambarLama" value="<?= $produk["gambar"];?>">
          
			<table cellspacing="2" cellpadding="5">
                <td>
                    <label for="kode_produk">Kode Produk</label>
                </td>
                <td>:</td>
                <td><input type="text" name="kode_produk" id="kode_produk" required value="<?= $produk["kode_produk"]?>"></td>
            </tr>

            <tr>
                <td>
                    <label for="nama_produk">Nama Produk</label>
                </td>
                <td>:</td>
                <td><input type="text" name="nama_produk" id="nama_produk" required value="<?= $produk["nama_produk"]?>"></td>
            </tr>

			<tr>
                <td>
                    <label for="jenis_produk">Jenis Produk</label>
                </td>
                <td>:</td>
            <td>
    <select id="jenis_produk" name="jenis_produk">
         <option required value="<?= $produk["jenis_produk"]?>"><?= $produk["jenis_produk"]?></option>
         <option value="T-Shirt">T-Shirt</option>
        <option value="Celana">Celana</option>
        <option value="Outware">Outware</option>
        <option value="Sepatu">Sepatu</option>
        <option value="Topi">Topi</option>
         </select>
         <label for="ukuran" style="margin-left:5px">Ukuran</label>
         :
     <select id="ukuran" name="ukuran">
<option required value="<?= $produk["ukuran"]?>"><?= $produk["ukuran"]?></option>
<option value="S">S</option>
<option value="M">M</option>
<option value="L">L</option>
<option value="XL">XL</option>
<option value="XXL">XXL</option>
<option value="EU37">EU37</option>
<option value="EU38">EU38</option>
<option value="EU39">EU39</option>
<option value="EU40">EU40</option>
<option value="EU41">EU41</option>
<option value="EU42">EU42</option>
<option value="EU43">EU43</option>
<option value="EU44">EU44</option>
                </select>
        </td>         
        </tr>




            <tr>
                <td>
                    <label for="harga">Harga</label>
                </td>
                <td>:</td>
                <td><input type="harga" name="harga" id="harga" required value="<?= $produk["harga"]?>"></td>
            </tr>

  		   
            <td>
                    <label for="keterangan">Keterangan</label>
                </td>
                <td>:</td>
                <td><input type="text" name="keterangan" id="keterangan" required value="<?= $produk["keterangan"]?>"></td>
            </tr>

             <tr>
                <td>
                    <label for="gambar">Gambar</label>
                </td>
                <td>:</td>
              
                <td>  <img src="img/<?= $produk["gambar"]?> " width="40px"><br> <input type="file" name="gambar" id="gambar"></td>
            </tr>
        </table>

        <button type="submit" name="submit">Tambah Data!</button>

    </form>

</body>

</html>