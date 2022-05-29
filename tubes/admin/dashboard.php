<?php 
// memeriksa sudah login atau belum
session_start();

$level=$_SESSION['level'];
$username=$_SESSION['username'];

if(!isset($_SESSION["level"])){
header("location:../login.php");
exit;
}

if($_SESSION["level"]!='admin'){
	header("location:../index.php");
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


// pagination
// konfigurasi
$jumlahDataPerHalaman=5;
$jumlahData= count(query("SELECT * FROM produk"));
$jumlahHalaman= ceil($jumlahData / $jumlahDataPerHalaman);
$halamanAktif=(isset($_GET["page"])) ? $_GET["page"] : 1;
$awalData=($jumlahDataPerHalaman * $halamanAktif)-$jumlahDataPerHalaman;

$goturthings = query("SELECT * FROM jenis_produk INNER JOIN produk ON jenis_produk.jenis_produk=produk.jenis_produk INNER JOIN ukuran ON ukuran.ukuran = produk.ukuran ORDER BY produk.id DESC LIMIT $awalData,$jumlahDataPerHalaman");


// tombol cari
// if(isset($_POST["cari"])){
// 	$goturthings = cari($_POST["keyword"]);
	
// }


$jenisProduk=query("SELECT * FROM jenis_produk");





// profile
$profile=query("SELECT * FROM users WHERE username='$username'")[0];

 ?>





<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="keywords"
		content="trifthing, bandung, baju bekas, online shope, fashion, baju keren, baju bekas keren, barang bekas, barang keren, goturthinqs, goturthings, tempat trifthing" />
	<meta name="author" content="Jam-Jam" />

	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

	<!-- Font-Awessome -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">

	<!-- icon -->
	<link rel="icon" href="../icon/icon.png">
	<!-- Google Fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link
		href="https://fonts.googleapis.com/css2?family=Libre+Bodoni:wght@500&family=Montserrat:wght@300;400;500;600&family=Open+Sans:wght@600&display=swap"
		rel="stylesheet">


	<!-- AOS -->
	<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
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

	.container-fluid .navbar .container-fluid section .fas.fa-print {
		color: #303958;
	}

	.container-fluid .navbar .container-fluid section .fas.fa-print:hover {
		color: #151e3d;
	}


	.container-fluid .navbar .container-fluid section .fas.fa-cart-plus {
		color: #2d3655;
	}

	.container-fluid .navbar .container-fluid section .fas.fa-cart-plus:hover {
		color: #151e3d;
	}


	/* hover dropdown */
	.dropdown:hover .dropdown-menu {
		display: block;
		margin-top: 0; // remove the gap so it doesn't close
	}
	</style>


	<!-- link my css -->
	<link rel="stylesheet" href="../css/style.css">

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

			<a href="#" id="cariin" class="btn btn-dark d-lg-none ms-auto" style="display:block;"><i
					class="fas fa-search"></i></a>


			<form id="bar" action="" method="post" class="d-lg-block" style="display:none;">
				<input class="form-control formm me-lg-2" type="text" placeholder="Cari Produk Goturthings" aria-label="Search"
					name="keyword" autofocus autocomplete="off" id="keyword">

				<a id="exit" class="btn btn-dark ms-auto d-lg-none"><i class="far fa-window-close"></i></a>
			</form>

			<div class="collapse navbar-collapse" id="navbarScroll">


				<label for="keyword" class="btn btn-dark d-none d-lg-block" id="search"> <a href="#"><i
							class="fas fa-search"></i></a> </label>


				<ul class="navbar-nav">


					<!-- profile mobile -->
					<a class="mt-1 d-lg-none" href="profile.php"><img id="profile" src="../profile/<?=$profile['foto'];?>"
							style="width:35px; height:35px; object-fit:cover;border-radius:50%;border:2px solid #d6d6d6;"
							title="<?=$username?>"></a>


					<li class="nav-item">
						<a href="index.php#container" class="nav-link  d-lg-none fs-4 " style="cursor:pointer;"
							aria-expanded="false">
							Shop
						</a>
					</li>
				</ul>

				<ul class="navbar-nav ms-auto navbar-nav-scroll" style="--bs-scroll-height: 100px;">

					<li class=" nav-item dropdown">
						<a class="nav-link dropdown-toggle d-lg-block d-none" href="#" id="navbarDropdownMenuLink" role="button"
							data-bs-toggle="dropdown" aria-expanded="false">
							Shop
						</a>
						<ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
							<?php foreach($jenisProduk as $jenis): ?>
							<li><a name="cari" class="dropdown-item"
									href="index.php?cari=<?= $jenis['jenis_produk']; ?>#container"><?= $jenis['jenis_produk']; ?></a></li>


							<?php endforeach; ?>
							<li><a class="dropdown-item" href="index.php#container">All items</a></li>
						</ul>
					</li>



					<div class="shop d-lg-none">

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

					<li class="nav-item d-lg-block d-none">
						<a class="nav-link" href="contact.php">Contact</a>
					</li>

					<li class="nav-item d-lg-block d-none">
						<a class="nav-link active" href="dashboard.php">Dashboard</a>
					</li>





					<!-- profile all -->
					<a class="ms-5 d-none d-lg-block" href="profile.php"><img id="profile" src="../profile/<?=$profile['foto'];?>"
							alt="<?=$username?>" title="<?=$username?>"
							style="width:35px; height:35px; object-fit:cover;border-radius:50%;border:2px solid #d6d6d6;"></a>



					<!-- bagian dropdown -->
					<li class="nav-item fs-4 d-lg-none">
						<a class="nav-link" id="contact" href="contact.php">Contact</a>
					</li>

					<li class="nav-item d-lg-none">
						<a class="nav-link active" id="dashboard" href="dashboard.php">Dashboard</a>
					</li>



				</ul>

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



	<div class="container" style="margin-top:100px;">
		<!-- awal judul -->
		<div class="col">
			<h3 id="judul">Dashboard</h3>
		</div>
		<div class="col mb-3">
			<a href="index.php">home</a> / <a href="index.php#container">shop</a> / <a href="#" class="fw-bold"
				id="point">Dashboard</a>
		</div>
		<!-- akhir judul -->
	</div>




	<div class="container-fluid">





		<nav class="navbar navbar-light">

			<div class="container-fluid">
				<!-- <form action="" method="post" class="d-flex">
					<input class="form-control me-2" type="text" placeholder="Cari Produk Goturthings" aria-label="Search"
						name="keyword" autofocus autocomplete="off" id="keyword">
				</form> -->

				<!-- ganjelan -->
				<div></div>
				<section>
					<a href="../Goturprint.php" target="_blank"><i class="fas fa-print"> Print</i></a> <a
						style="margin:0 5px;">|</a>
					<a href="tambah.php"><i class="fas fa-cart-plus">
							Add</i></a>

				</section>

			</div>
		</nav>

		<div id="container">
			<table class="table" cellpadding="10" cellspacing="0">

				<thead class="table-dark">
					<tr style="text-align:center;">
						<th>No</th>
						<th>Image</th>
						<th>Name</th>
						<th>Type</th>
						<th>Size</th>
						<th>Price</th>
						<th>Action</th>
					</tr>
				</thead>


				<!-- tidak ada -->
				<?php if(empty($goturthings)):?>

				<tr>
					<td colspan="7">
						<h1
							style="color:#a9a9a9;font-family: 'Open Sans', sans-serif;margin-top:120px;text-align:center;height:200px;display:;">
							Tidak Ada
							Data</h1>
					</td>

					<?php endif; ?>


					<!-- isi tabel -->

					<?php $i=1; ?>
					<?php foreach ($goturthings as $goturthing ) :?>
					<tbody>
						<tr style="text-align:center;">
							<td><?= $i; ?></td>
							<td><img src=" ../img/<?= $goturthing["gambar"] ?>" style="width:100px; height:100px; object-fit:cover">
							</td>
							<td><?= $goturthing["nama_produk"]; ?></td>
							<td><?= $goturthing["jenis_produk"]; ?></td>
							<td><?= $goturthing["ukuran"]; ?></td>
							<td><?= rupiah($goturthing["harga"]); ?></td>
							<td>


								<a href="ubah.php?id=<?= $goturthing["id"] ?>" class="btn badge bg-warning">Change</a>

								<a href="hapus.php?id=<?= $goturthing["id"] ?>"
									onclick="return confirm('Anda yakin akan menghapus data ini?')"
									class="btn badge bg-danger mt-2">Delete</a>



								<a href="detail.php?id=<?= $goturthing["id"]?>" class="btn badge bg-info mt-2">Detail</a>
							</td>

						</tr>

					</tbody>
					<?php $i++; ?>
					<?php endforeach; ?>

			</table>
		</div>

		<!-- Pagination -->
		<div id="page" class="mb-5">
			<?php if($halamanAktif>1): ?>
			<a style="margin-right:5px;" href="?page=<?= $halamanAktif - 1; ?>">&lt</a>
			<?php endif; ?>

			<?php for($i=1;$i<=$jumlahHalaman;$i++) : ?>

			<?php if($i == $halamanAktif): ?>
			<a href="?page=<?= $i; ?>" style="font-weight:bold;color:red;margin:0 5px;"><?= $i; ?></a>

			<?php else: ?>
			<a style="margin:0 5px;" href="?page=<?= $i; ?>"><?= $i; ?></a>
			<?php endif; ?>

			<?php endfor; ?>

			<?php if($halamanAktif<$jumlahHalaman): ?>
			<a href="?page=<?= $halamanAktif + 1; ?>">&gt</a>
			<?php endif; ?>






		</div>



	</div>


	<!-- awal footer -->
	<div class="border mb-3 mt-auto" style="border-top:black 1px solid;width:90%;margin:auto;"></div>

	<div class="footer container" id="footer">
		<p class=""><i class="far fa-copyright"></i> 2022 <a href="https://www.instagram.com/muhamadjamaludinpad/"
				target="_blank" style="text-decoration:none;	color:#2d2d2d;">Muhamad Jamaludin</a>. Created With Love. <br> All
			Picture
			From: <a href="https://www.instagram.com/goturthings/" target="_blank"
				style="text-decoration:none;	color: #151e3d;">GoturthinQs</a><span style="color:red;">.</span></p>

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




	<script>
	// ambil elemen2 yang dibutuhkan
	var keyword = document.getElementById("keyword");
	var container = document.getElementById("container");
	var page = document.getElementById("page");

	// tambahkan event ketika keyboard ditulis
	keyword.addEventListener("keyup", function() {
		var page = document.getElementById("page");
		page.setAttribute("style", "display:none;");

		// buat object ajax
		var xhr = new XMLHttpRequest();

		// cek kesiapan ajax
		xhr.onreadystatechange = function() {
			if (xhr.readyState == 4 && xhr.status == 200) {
				container.innerHTML = xhr.responseText;
			}
		};

		// eksekusi ajax
		xhr.open("GET", "ajax/produk.php?keyword=" + keyword.value, true);
		xhr.send();

		// memunculkan page atau refresh halaman
		if (keyword.value === "") {
			location.reload();
		}
	});

	// button search
	var search = document.getElementById("cariin");
	var bar = document.getElementById("bar");
	var exit = document.getElementById("exit");

	search.addEventListener("click", function() {
		var bar = document.getElementById("bar");
		bar.setAttribute("style", "display:;");
	});

	exit.addEventListener("click", function() {
		var bar = document.getElementById("bar");
		bar.setAttribute("style", "display:none;");
	});
	</script>



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