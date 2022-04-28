<?php
// memeriksa sudah login atau belum
session_start();

if(!isset($_SESSION["login"])){
header("location:login.php");
exit;
}

// koneksi database
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
	<!-- Font-Awessome -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">


	<!-- Google Fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link
		href="https://fonts.googleapis.com/css2?family=Libre+Bodoni:wght@500&family=Montserrat:wght@300;400;500;600&family=Open+Sans:wght@600&display=swap"
		rel="stylesheet">
	<!-- icon -->
	<link rel="icon" href="icon/icon.png">
	<title>GoturCahnge.</title>

	<!-- link my css -->
	<link rel="stylesheet" href="css/style.css">

</head>

<body>
	<h1 class="h1">GoturChange<span>.</span></h1>
	<h6 class="subtitle2">Ubah barang keren</h6>


	<form action="" method="post" enctype="multipart/form-data" class="form">

		<input type="hidden" name="id" value="<?= $produk["id"];?>">
		<input type="hidden" name="gambarLama" value="<?= $produk["gambar"];?>">

		<table cellspacing="10" cellpadding="5" class="tabel">
			<tr>
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
						<option value="Flanel">Flanel</option>
						<option value="Sepatu">Sepatu</option>
						<option value="Topi">Topi</option>
						<option value="Jaket">Jaket</option>
						<option value="Sweater">Sweater</option>
						<option value="Hoodie">Hoodie</option>
						<option value="Vest">Vest</option>
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

				<td> <img src="img/<?= $produk["gambar"]?> " width="40px"><br> <input type="file" name="gambar" id="gambar">
				</td>
			</tr>
		</table>

		<button type="submit" name="submit" class="btn2">Ubah Data!</button>
		<table>
			<tr>
				<td>
				<td><a href="index.php"><i class="far fa-arrow-alt-circle-left"></i></a></td>
			</tr>
		</table>

	</form>

</body>

</html>