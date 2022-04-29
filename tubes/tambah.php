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
	<title>GoturAdd.</title>

	<!-- link my css -->
	<link rel="stylesheet" href="css/style.css">

</head>

<body>
	<h1 class="h1">GoturAdd<span>.</span></h1>
	<h6 class="subtitle2">Tambah barang keren</h6>

	<form action="" method="post" enctype="multipart/form-data" class="form">
		<table cellspacing="10" cellpadding="5" class="tabel">
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
						<option value="27">27</option>
						<option value="28">28</option>
						<option value="29">29</option>
						<option value="30">30</option>
						<option value="31">31</option>
						<option value="32">32</option>
						<option value="33">33</option>
						<option value="34">34</option>
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

		<button type="submit" name="submit" class="btn2">Tambah Data!</button>
		<table>
			<tr>
				<td><a href="index.php"><i class="far fa-arrow-alt-circle-left"></i></a>
				</td>
			</tr>
		</table>

	</form>

</body>

</html>