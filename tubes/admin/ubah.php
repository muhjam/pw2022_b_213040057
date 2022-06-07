<?php
// memeriksa sudah login atau belum
session_start();

$level=$_SESSION['level'];
$username=$_SESSION['username'];
$status=$_SESSION['status'];


if(!isset($_SESSION["level"])){
header("location:../logout.php");
exit;
}

if($_SESSION["level"]!='admin'){
	header("location:../$level/index.php");
exit;
}





if($_SESSION["status"]=='ban'){
	    echo "
        <script>
        alert('maaf, akun anda telah diban!')
        document.location.href='../logout.php'
        </script>";
exit;
}


// koneksi database
require 'functions.php';

// ambil data di URL

if(!isset($_GET['id'])){
header("location:dashboard.php");

}



$id= $_GET["id"];

// query data mahasiswa berdasarkan id
$produk= query("SELECT * FROM produk WHERE id=$id")[0]; // supaya ga manggil 0 nya lagi

if(empty($produk)){
	header("location:dashboard.php");
}


// cek apakah tombol submit telah ditekan atau belum
if (isset($_POST["submit"])) {

    // cek apakag data berhasil diubah atau tidak
    if (ubah($_POST) > 0) {
        echo "
        <script>
        alert('data berhasil diubah')
        document.location.href='dashboard.php'
        </script>";
    } else {
        echo"
        <script>
        alert('data tidak ada yang diubah')
        document.location.href='dashboard.php'
        </script>";
    }
}


// jenis produk
$jenisProduk=query("SELECT * FROM jenis_produk");

// ukuran produk
$ukuranProduk=query("SELECT * FROM ukuran");



// profile
$profile=query("SELECT * FROM users WHERE username='$username'")[0];



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
	<title>GoturthinQs.</title>

	<style>
	html {
		scroll-behavior: smooth;
	}

	body {
		background-color: #eaeaea;
		font-family: "poppins", sans-serif;
		color: #2d2d2d;
		font-size: 14px;
	}

	.navbar-brand {
		font-weight: 400;
		font-family: "Libre Bodoni", sans-serif;
		text-transform: uppercase;
	}

	.navbar-brand span {
		color: red;
	}

	.formm {
		height: 30px;
	}

	.fas.fa-search {
		color: #eaeaea;
	}

	.fas.fa-search:hover {
		color: white;
	}

	.far.fa-window-close {
		color: #eaeaea;
	}

	.far.fa-window-close:hover {
		color: white;
	}

	.navbar-brand {
		font-size: 25px;
		text-align: center;
	}

	.card-title {
		text-align: center;
		font-family: "poppins", sans-serif;
		text-transform: uppercase;
		font-weight: 500;
		font-size: 12px;
	}

	.card-text {
		text-align: center;
		font-family: "poppins", sans-serif;
		font-weight: 400;
		text-transform: uppercase;
		font-size: 11px;
	}

	#exit {
		position: absolute;
		left: 89%;
		top: 10px;
		font-size: 20px;
		cursor: pointer;
	}


	@media (min-width: 1400px) {

		/* cari1 */
		.formm {
			position: relative;
			width: 350px;
			height: 30px;
			left: 70%;
		}

		#search {
			position: relative;
			left: 30%;
		}
	}

	@media (max-width: 1400px) {

		/* cari1 */
		.formm {
			position: relative;
			width: 350px;
			height: 30px;
			left: 40%;
		}

		#search {
			position: relative;
			left: 25%;
		}
	}

	@media (max-width: 1200px) {

		/* cari1 */
		.formm {
			position: relative;
			width: 290px;
			height: 30px;
			left: 10%;
		}

		#search {
			position: relative;
			left: 2%;
		}
	}

	@media (max-width: 990px) {
		.navbar-nav {
			text-align: center;
		}

		/* cari1 */
		.formm {
			position: absolute;
			width: 90%;
			height: 30px;
			left: 10px;
			top: 15px;
		}
	}



	/* awal body tambah ubah */
	@media (max-width: 767px) {

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

	@media (min-width: 768px) {

		.container-fluid .content {
			margin: 30px auto;
			padding: 10px;
			width: 50%;
			height: 100%;
			box-shadow: 0 10px 20px rgba(0, 0, 0, 0.19), 0 6px 6px rgba(0, 0, 0, 0.2);
			border-radius: 10px;
			background-color: #ffffff;
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

	/* akhir body tambah ubah */

	@media (max-width: 425px) {
		#card {
			width: 50%;
		}

		#exit {
			position: absolute;
			left: 85%;
			top: 10px;
			font-size: 20px;
			cursor: pointer;
		}

		.navbar-brand {
			font-size: 20px;
			text-align: center;
			margin-left: 20px;
		}
	}

	@media (max-width: 340px) {
		#card {
			width: 50%;
		}

		#exit {
			position: absolute;
			left: 85%;
			top: 10px;
			font-size: 20px;
			cursor: pointer;
		}

		.navbar-nav {
			text-align: center;
		}

		.navbar-brand {
			font-size: 20px;
			text-align: center;
			margin-left: 20px;
		}

		#card img {
			height: 200px;
			object-fit: cover;
		}
	}



	@media (max-width: 320px) {
		#card {
			width: 50%;
		}

		#exit {
			position: absolute;
			left: 85%;
			top: 10px;
			font-size: 20px;
			cursor: pointer;
		}

		.navbar-nav {
			text-align: center;
		}

		.navbar-brand {
			font-size: 18px;
			text-align: center;
			margin-left: 20px;
		}

		#card img {
			height: 200px;
			object-fit: cover;
		}
	}




	@media (max-width: 305px) {
		#card {
			width: 50%;
		}

		#exit {
			position: absolute;
			left: 85%;
			top: 10px;
			font-size: 20px;
			cursor: pointer;
		}

		.navbar-nav {
			text-align: center;
		}

		.navbar-brand {
			font-size: 15px;
			text-align: center;
			margin-left: 20px;
		}

		#card img {
			height: 200px;
			object-fit: cover;
		}
	}



	/* footer */

	.footer-sosmed {
		padding-right: 20px;
		text-align: end;
	}

	.footer-sosmed li {
		list-style: none;
		display: inline-block;
		padding: 2px 5px;
	}

	.footer-sosmed a {
		color: #303958;
		font-size: 15px;
		display: inline-block;
	}

	.footer-sosmed a:hover {
		color: #151e3d;
	}

	#footer {
		display: flex;
		justify-content: space-between;
	}

	.bar-sosmed li {
		list-style: none;
		display: inline-block;
		padding: 2px 5px;
	}

	.bar-sosmed a {
		color: #303958;
		font-size: 15px;
		display: inline-block;
	}

	.bar-sosmed a:hover {
		color: #eaeaea;
	}

	.bar-sosmed {
		padding-right: 20px;
		text-align: center;
	}



	/* judul */
	#judul {
		color: rgba(0, 0, 0, 0.692);
		text-align: left;
		font-weight: 600;
		font-family: "Montserrat", sans-serif;
		text-transform: uppercase;
		font-size: 32px;
	}


	#point {
		font-family: "Montserrat", sans-serif;
		font-weight: 600;

	}

	#point:hover {
		color: red;
	}

	.container .col a {
		text-decoration: none;
		color: rgba(0, 0, 0, 0.692);
		text-align: left;
		font-weight: 500;
		font-family: "Montserrat", sans-serif;
		text-transform: uppercase;
		font-size: 12px;
	}

	.container .col a:hover {
		text-decoration: underline;
	}



	/* profile */
	#profile {
		transition: 0.3s;
	}

	#profile:hover {
		opacity: 0.7;
	}

	/* hover dropdown */
	.dropdown:hover .dropdown-menu {
		display: block;
		margin-top: 0; // remove the gap so it doesn't close
	}
	</style>


	<!-- link my css -->
	<!-- <link rel="stylesheet" href="../css/style.css"> -->

</head>

<body class="d-flex flex-column min-vh-100">



	<!-- awal navbar -->

	<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">

		<div class="container">

			<button class="navbar-toggler me-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll"
				aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<a class="navbar-brand" id="logo" href="index.php">GoturthinQs<span>.</span></a>

			<a href="#container" id="cariin" class="btn btn-dark d-lg-none ms-auto" style="display:block;"><i
					class="fas fa-search"></i></a>


			<form id="bar" action="" method="post" class="d-lg-block" style="display:none;">
				<input class="form-control formm me-lg-2" type="text" placeholder="Cari Produk Goturthings" aria-label="Search"
					name="keyword" autofocus autocomplete="off" id="keyword">

				<a id="exit" class="btn btn-dark ms-auto d-lg-none"><i class="far fa-window-close"></i></a>
			</form>

			<div class="collapse navbar-collapse" id="navbarScroll">


				<label for="keyword" class="btn btn-dark d-none d-lg-block" id="search"> <a href="#container"><i
							class="fas fa-search"></i></a> </label>





				<ul class="navbar-nav">

					<!-- profile mobile -->
					<a class="mt-1 d-lg-none" href="profile.php"><img id="profile" src="../profile/<?=$profile['foto'];?>"
							style="width:35px; height:35px; object-fit:cover;border-radius:50%;border:2px solid #d6d6d6;"
							title="<?=$username?>"></a>


					<li class="nav-item">
						<a href="index.php#container" class="nav-link  d-lg-none fs-4" style="cursor:pointer;"
							aria-expanded="false">
							Shop
						</a>
					</li>
				</ul>

				<ul class="navbar-nav ms-auto navbar-nav-scroll" style="--bs-scroll-height: 100px;">

					<li class=" nav-item dropdown mt-2">
						<a class="nav-link dropdown-toggle d-lg-block d-none" href="#" id="navbarDropdownMenuLink" role="button"
							data-bs-toggle="dropdown" aria-expanded="false">
							Shop
						</a>
						<ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
							<?php foreach($jenisProduk as $jenis): ?>
							<li><a name="cari" class="dropdown-item"
									href="index.php?cari=<?= $jenis['jenis_produk']; ?>#container"><?= $jenis['jenis_produk']; ?></a></li>


							<?php endforeach; ?>
							<li><a class="dropdown-item" href="index.php#container">All Items</a></li>
						</ul>
					</li>



					<div class="shop d-lg-none ">

						<?php foreach($jenisProduk as $jenis): ?>

						<li class="nav-item">
							<a name="cari" href="index.php?cari=<?= $jenis['jenis_produk'];?>#container" class="nav-link"
								id="jenis"><?= $jenis['jenis_produk']; ?></a>
						</li>


						<?php endforeach; ?>
						<li class="nav-item">
							<a name="cari" href="index.php#container" class="nav-link" id="jenis">All Items</a>
						</li>

					</div>

					<li class="nav-item d-lg-block d-none mt-2">
						<a class="nav-link" href="contact.php">Contact</a>
					</li>

					<li class="nav-item d-lg-block d-none mt-2">
						<a class="nav-link active" href="dashboard.php">Dashboard</a>
					</li>




					<!-- profile all -->
					<li class=" nav-item dropdown ms-5">
						<a class="nav-link dropdown-toggle  d-none d-lg-block" href="#" id="navbarDropdownMenuLink" role="button"
							data-bs-toggle="dropdown" aria-expanded="false">
							<img id="profile" src="../profile/<?=$profile['foto'];?>" alt="<?=$username?>" title="<?=$username?>"
								style="width:35px; height:35px; object-fit:cover;border-radius:50%;border:2px solid #d6d6d6;">
						</a>
						<ul class="dropdown-menu" style="margin-left:-45px;" aria-labelledby="navbarDropdownMenuLink">
							<li><a name="cari" class="dropdown-item" href="profile.php">Profile</a></li>
							<li><a class="dropdown-item" href="../logout.php" style="color:red;">Logout</a></li>
						</ul>
					</li>



					<!-- bagian dropdown -->
					<li class="nav-item fs-4 d-lg-none">
						<a class="nav-link" id="contact" href="contact.php">Contact</a>
					</li>

					<li class="nav-item d-lg-none">
						<a class="nav-link active" id="dashboard" href="dashboard.php">Dashboard</a>
					</li>



				</ul>
				<ul class="navbar-nav">

					<ul class="bar-sosmed d-lg-none mt-2">
						<li><a href="https://www.instagram.com/goturthings/" target="_blank"> <i class="fab fa-instagram"></i></a>
						</li>
						<li><a href="https://www.facebook.com/profile.php?id=100078019380277" target="_blank"><i
									class="fab fa-facebook"></i></a></li>
						<li><a href="https://twitter.com/muhjmlpad" target="_blank"><i class="fab fa-twitter"></i></a></li>
						<li><a
								href="https://api.whatsapp.com/send?phone=6283124356686&text=Hallo%20saya%20<?= $username;?>.%20Salam%20kenal%20Admin%20goturthinqs."
								target="_blank"><i class="fab fa-whatsapp"></i></a></li>
					</ul>
				</ul>
			</div>
		</div>
	</nav>
	<!-- akhir navbar -->



	<!-- awal judul -->
	<div class="container" style="margin-top:100px;">
		<div class="col">
			<h3 id="judul">Dashboard</h3>
		</div>
		<div class="col mb-3">
			<a href="index.php">home</a> / <a href="index.php#container">shop</a> / <a href="dashboard.php">Dashboard</a> / <a
				href="#" class="fw-bold" id="point">Change</a>
		</div>
	</div>
	<!-- akhir judul -->






	<div class="container-fluid">

		<div class="content">

			<form action="" method="post" enctype="multipart/form-data" id="us">

				<input type="hidden" name="id" value="<?= $produk["id"];?>">
				<input type="hidden" name="gambarLama" value="<?= $produk["gambar"];?>">

				<div class="form-group row mb-3">
					<label for="kode_produk" class="col-sm-2 col-form-label">Kode</label>
					<div class="col-sm-6 ms-auto">
						<input type="text" placeholder="Kode Produk" class="form-control" id="kode_produk" name="kode_produk"
							maxlength="8" required value="<?= $produk["kode_produk"]?>" readonly autocomplete="off">
					</div>
				</div>
				<div class="form-group row">
					<label for="nama_produk" class="col-sm-2 col-form-label">Nama</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="nama_produk" placeholder="Nama Produk" name="nama_produk"
							maxlength="200" required value="<?= $produk["nama_produk"]?>" autocomplete="off">
					</div>
				</div>



				<div class="row mt-3 mb-3 ">
					<div class="form-group col-md-6 mb-3">
						<label for="jenis_produk">Jenis :</label>
						<select id="jenis_produk" class="form-control" name="jenis_produk" required>
							<option required value="<?= $produk["jenis_produk"]?>"><?= $produk["jenis_produk"]?></option>
							<?php foreach($jenisProduk as $jenis): ?>
							<option value="<?= $jenis['jenis_produk'];?>"><?= $jenis['jenis_produk']; ?></option>
							<?php endforeach; ?>
						</select>
					</div>

					<div class="form-group col-md-6">
						<label for="inputState">Ukuran :</label>
						<select id="inputState" class="form-control" name="ukuran" required>
							<option required value="<?= $produk["ukuran"]?>"><?= $produk["ukuran"]?></option>
							<?php foreach($ukuranProduk as $ukuran): ?>
							<option value="<?= $ukuran['ukuran'];?>"><?= $ukuran['ukuran']; ?></option>
							<?php endforeach; ?>
						</select>
					</div>
				</div>


				<div class="form-group row mb-3">
					<label for="harga" class="col-sm-2 col-form-label">Harga</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="harga" placeholder="Rp. xxxxxx" name="harga" maxlength="15"
							required value="Rp. <?= $produk["harga"]?>">
					</div>
				</div>


				<div class="form-group row mb-3">
					<label for="keterangan" class="col-sm-2 col-form-label">Keterangan</label>
					<div class="col-sm-9 ms-auto">
						<input type="text" class="form-control" id="keterangan" placeholder="Ketik Keterangan" name="keterangan"
							maxlength="200" required value="<?= $produk["keterangan"]?>">
					</div>
				</div>


				<div class="form-group row mb-3">
					<label for="warna" class="col-sm-2 col-form-label">Warna</label>
					<div class="col-sm-10">
						<input type="color" class="form-control" id="warna" name="warna" required value="<?= $produk["warna"]?>"
							style="width:100px;">
					</div>
				</div>

				<div class="mb-3">
					<label for="gambar" class="form-label">Pilih Gambar:</label>
					<img src="../img/<?= $produk["gambar"]?> " class="img-thumbnail mb-2" style="width:120px;" id=img-preview>
					<input class="form-control form-control-sm" id="gambar" type="file" name="gambar" onchange="previewImage();">
					<input class="form-control form-control-sm" id="gambarLama" type="hidden" name="gambarLama"
						value="<?= $produk["gambar"]?>">
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



	<!-- awal footer -->
	<div class="border mb-3 mt-auto" style="border-top:black 1px solid;width:90%;margin:auto;"></div>

	<div class="footer container" id="footer">
		<p class=""><i class="far fa-copyright"></i> 2022 <a href="https://www.instagram.com/muhamadjamaludinpad/"
				target="_blank" style="text-decoration:none;  color:#2d2d2d;">Muhamad Jamaludin</a>. Created With Love. <br> All
			Picture
			From: <a href="https://www.instagram.com/goturthings/" target="_blank"
				style="text-decoration:none;  color: #151e3d;">GoturthinQs</a><span style="color:red;">.</span></p>

		<ul class="footer-sosmed d-sm-block d-none">
			<li><a href="https://www.instagram.com/goturthings/" target="_blank"> <i class="fab fa-instagram"></i></a>
			</li>
			<li><a href="https://www.facebook.com/profile.php?id=100078019380277" target="_blank"><i
						class="fab fa-facebook"></i></a></li>
			<li><a href="https://twitter.com/muhjmlpad" target="_blank"><i class="fab fa-twitter"></i></a></li>
			<li><a
					href="https://api.whatsapp.com/send?phone=6283124356686&text=Hallo%20saya%20<?= $username;?>.%20Salam%20kenal%20Admin%20goturthinqs."
					target="_blank"><i class="fab fa-whatsapp"></i></a></li>
		</ul>
	</div>
	<!-- akhir footer -->



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


	<!-- my javascript -->
	<script>
	function previewImage() {
		const gambar = document.querySelector("#gambar");
		const imgPreview = document.querySelector("#img-preview");
		var oFReader = new FileReader();
		oFReader.readAsDataURL(gambar.files[0]);

		oFReader.onload = function(oFREvent) {
			imgPreview.src = oFREvent.target.result;
		};
	}
	</script>

</body>

</html>

<!-- selesai -->