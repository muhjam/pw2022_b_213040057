<?php
// memeriksa sudah login atau belum
session_start();

$level=$_SESSION['level'];

if(!isset($_SESSION["level"])){
header("location:../login.php");
exit;
}

if($_SESSION["level"]!='admin'){
	header("location:../$level.php");
exit;
}


// koneksi database
require '../functions.php';

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
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="keywords"
		content="trifthing, bandung, baju bekas, online shope, fashion, baju keren, baju bekas keren, barang bekas, barang keren, goturthinqs, goturthings, tempat trifthing" />
	<meta name="author" content="Jam-Jam" />


	<!--icon  -->
	<link rel="icon" href="../icon/icon.png">



	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

	<!-- Font-Awessome -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">

	<!-- Google Fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link
		href="https://fonts.googleapis.com/css2?family=Libre+Bodoni:wght@500&family=Montserrat:wght@300;400;500;600&family=Open+Sans:wght@600&display=swap"
		rel="stylesheet">
	<title>GoturSignup.</title>

	<style>
	@media(max-width:499px) {

		.logo {
			margin: 30px auto 0 auto;
			width: 100%;
			height: 100%;
		}


		.logo h1 {
			margin-bottom: -2px;
			text-align: center;
			font-weight: 400;
			font-family: 'Libre Bodoni', sans-serif;
			text-transform: uppercase;
			color: #151e3d;
			;
		}

		.logo h1 span {
			color: red;
		}

		.logo .subtitle {
			color: rgba(0, 0, 0, 0.692);
			text-align: center;
			font-weight: 500;
			font-family: 'Montserrat', sans-serif;
			text-transform: uppercase;
			font-size: 10px;
		}

		.btn2 {
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
	}

	@media(min-width:500px) {
		.container-fluid .content {
			margin: 30px auto;
			padding: 10px;
			width: 50%;
			height: 100%;
			box-shadow: 0 10px 20px rgba(0, 0, 0, 0.19), 0 6px 6px rgba(0, 0, 0, 0.20);
			border-radius: 10px;
		}

		.logo {
			margin: 30px auto 0 auto;
			width: 50%;
			height: 50%;
		}

		.logo h1 {
			margin-bottom: -2px;
			text-align: center;
			font-weight: 400;
			font-family: 'Libre Bodoni', sans-serif;
			text-transform: uppercase;
			color: #151e3d;
			;
		}

		.logo h1 span {
			color: red;
		}

		.logo .subtitle {
			color: rgba(0, 0, 0, 0.692);
			text-align: center;
			font-weight: 500;
			font-family: 'Montserrat', sans-serif;
			text-transform: uppercase;
			font-size: 15px;
		}

		.btn2 {
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
	}
	</style>

	<!-- link my css -->
	<link rel="stylesheet" href="../css/style.css">

	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6/jquery.min.js"></script>

</head>


<body>


	<div class="logo">
		<h1 class="h1">GoturChange<span>.</span></h1>
		<h6 class="subtitle">Ubah barang keren</h6>
	</div>

	<div class="container-fluid">


		<div class="content">

			<form action="" method="post" enctype="multipart/form-data" id="us">

				<input type="hidden" name="id" value="<?= $produk["id"];?>">
				<input type="hidden" name="gambarLama" value="<?= $produk["gambar"];?>">

				<div class="form-group row mb-3">
					<label for="kode_produk" class="col-sm-2 col-form-label">Kode</label>
					<div class="col-sm-6 ms-auto">
						<input type="text" placeholder="Kode Produk" class="form-control" id="kode_produk" name="kode_produk"
							maxlength="8" required value="<?= $produk["kode_produk"]?>">
					</div>
				</div>
				<div class="form-group row">
					<label for="nama_produk" class="col-sm-2 col-form-label">Nama</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="nama_produk" placeholder="Nama Produk" name="nama_produk"
							maxlength="200" required value="<?= $produk["nama_produk"]?>">
					</div>
				</div>



				<div class="row mt-3 mb-3 ">
					<div class="form-group col-md-6 mb-3">
						<label for="jenis_produk">Jenis :</label>
						<select id="jenis_produk" class="form-control" name="jenis_produk" required>
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
					</div>

					<div class="form-group col-md-6">
						<label for="inputState">Ukuran :</label>
						<select id="inputState" class="form-control" name="ukuran" required>
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
							<option value="27">27</option>
							<option value="28">28</option>
							<option value="29">29</option>
							<option value="30">30</option>
							<option value="31">31</option>
							<option value="32">32</option>
							<option value="33">33</option>
							<option value="34">34</option>
						</select>
					</div>
				</div>


				<div class="form-group row mb-3">
					<label for="harga" class="col-sm-2 col-form-label">Harga</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="harga" placeholder="Rp.xxxxxx" name="harga" maxlength="11"
							required value="<?= $produk["harga"]?>">
					</div>
				</div>


				<div class="form-group row mb-3">
					<label for="keterangan" class="col-sm-2 col-form-label">Keterangan</label>
					<div class="col-sm-9 ms-auto">
						<input type="text" class="form-control" id="keterangan" placeholder="Ketik Keterangan" name="keterangan"
							maxlength="200" required value="<?= $produk["keterangan"]?>">
					</div>
				</div>


				<label for="gambar" class="form-label">Pilih Gambar:</label>
				<div class="row mb-3">
					<div class="form-grup col-md-2 mb-3 ms-3">
						<img src="../img/<?= $produk["gambar"]?> " width="40px">
					</div>
					<div class="form-grup col-md-6">

						<input class="form-control form-control-sm " id="gambar" type="file" name="gambar"
							value="<?= $produk["keterangan"]?>">
					</div>

				</div>


				<div class="row mt-4">
					<div class="col-2"> <a href="javascript:history.back()"><i class="far fa-arrow-alt-circle-left"></i></a></div>
					<div class="col-4 ms-auto">
						<button type="submit" name="submit" class="btn btn-dark mb-3 ps-3 pe-3">Ubah</button>
					</div>

				</div>



			</form>
		</div>
	</div>




	<!-- my javascript -->
	<script src="../js/script.js"></script>


	<!-- Optional JavaScript; choose one of the two! -->

	<!-- Option 1: Bootstrap Bundle with Popper -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
	</script>

	<!-- Option 2: Separate Popper and Bootstrap JS -->
	<!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>

<!-- selesai -->