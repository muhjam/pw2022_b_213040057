<?php
// memeriksa sudah login atau belum
session_start();

if(!isset($_SESSION["login"])){
header("location:login.php");
exit;
}

// koneksi database
require 'functions.php';

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
        document.location.href='tambah.php'
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
	<title>GoturAdd.</title>

	<style>
	h1 {
		text-align: center;
		margin-bottom: -34px;
		text-align: center;
		font-weight: 400;
		font-family: 'Libre Bodoni',
			sans-serif;
		color: #151e3d;
		text-transform: uppercase;

	}

	.subtitle {
		margin-bottom: 7px;
		color: rgba(0, 0, 0, 0.692);
		text-align: center;
		font-weight: 500;
		font-family: 'Montserrat',
			sans-serif;
		text-transform: uppercase;

		font-size: 13px;
	}


	span {
		color: red;
	}

	form {
		width: fit-content;
		padding: 10px;
		margin: auto;
		box-shadow: 0 10px 20px rgba(0, 0, 0, 0.19), 0 6px 6px rgba(0, 0, 0, 0.20);
		border-radius: 15px;
		font-weight: 500;
		font-family: 'Montserrat',
			sans-serif;
	}

	table {
		margin-bottom: 10px;
	}

	button {
		cursor: pointer;
		margin-left: 30%;
	}

	.far.fa-arrow-alt-circle-left {
		color: #c51f1a;
		margin: 10px 10px 0 10px;
		font-size: 20px;
		transition: 0.5s;
	}

	.far.fa-arrow-alt-circle-left:hover {
		color: red;
		transition: 0.6s;
	}
	</style>

</head>

<body>
	<h1>GoturAdd<span>.</span></h1>
	<h6 class="subtitle">Tambah barang keren</h6>
	<form action="" method="post" enctype="multipart/form-data">
		<table cellspacing="2" cellpadding="5">
			<td>
				<label for="kode_produk">Kode Produk</label>
			</td>
			<td>:</td>
			<td><input type="kode_produk" name="kode_produk" id="kode_produk" required></td>
			</tr>

			<tr>
				<td>
					<label for="nama_produk">Nama Produk</label>
				</td>
				<td>:</td>
				<td><input type="text" name="nama_produk" id="nama_produk" required></td>
			</tr>

			<tr>
				<td>
					<label for="jenis_produk">Jenis Produk</label>
				</td>
				<td>:</td>
				<td>
					<select id="jenis_produk" name="jenis_produk">
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
				<td><input type="text" name="harga" id="harga" required></td>
			</tr>


			<td>
				<label for="keterangan">Keterangan</label>
			</td>
			<td>:</td>
			<td><input type="text" name="keterangan" id="keterangan" required></td>
			</tr>

			<tr>
				<td>
					<label for="gambar">Gambar</label>
				</td>
				<td>:</td>
				<td><input type="file" name="gambar" id="gambar" required></td>
			</tr>
		</table>

		<button type="submit" name="submit">Tambah Data!</button>
		<table>
			<tr>
				<td><a href="index.php"><i class="far fa-arrow-alt-circle-left"></i></a>
				</td>
			</tr>
		</table>

	</form>

</body>

</html>