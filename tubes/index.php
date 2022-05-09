<?php 
// memeriksa sudah login atau belum
session_start();

$level=$_SESSION['level'];

if(!isset($_SESSION["level"])){
header("location:login.php");
exit;
}

if($_SESSION["level"]!='user'){
	header("location:$level/index.php");
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

	<!-- AOS -->
	<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">


	<!-- icon -->
	<link rel="icon" href="icon/icon.png">
	<!-- Google Fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link
		href="https://fonts.googleapis.com/css2?family=Libre+Bodoni:wght@500&family=Montserrat:wght@300;400;500;600&family=Open+Sans:wght@600&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Space+Mono&display=swap"
		rel="stylesheet">
	<title>GoturthinQs.</title>

	<style>
	body {
		background-color: #EAEAEA;
		font-family: 'poppins', sans-serif;
		color: #2d2d2d;
		font-size: 14px;
	}



	.navbar-brand {
		font-weight: 400;
		font-family: 'Libre Bodoni', sans-serif;
		text-transform: uppercase;
	}

	.navbar-brand span {
		color: red;
	}

	.form-control {
		height: 30px;
	}


	.fas.fa-search {
		color: #EAEAEA;
	}

	.fas.fa-search:hover {
		color: white;
	}


	.far.fa-window-close {
		color: #EAEAEA;
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
		font-family: 'poppins', sans-serif;
		text-transform: uppercase;
		font-weight: 500;
		font-size: 12px;

	}

	.card-text {
		text-align: center;
		font-family: 'poppins', sans-serif;
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

	#logout {
		color: #b22222;

	}

	#logout:hover {
		color: #ff0000;
	}


	#container-produk {
		display: flex;
		flex-wrap: wrap;
		justify-content: center;
	}

	@media (min-width:1400px) {

		/* cari1 */
		.form-control {
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




	@media (max-width:1400px) {

		/* cari1 */
		.form-control {
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


	@media (max-width:1200px) {

		/* cari1 */
		.form-control {
			position: relative;
			width: 350px;
			height: 30px;
			left: 10%;
		}

		#search {
			position: relative;
			left: 10%;
		}
	}



	@media (max-width:994px) {
		.navbar-nav {
			text-align: center;
		}

		#card-mobile img {
			height: 300px;
			object-fit: cover;
		}

		/* cari1 */


		.form-control {
			position: absolute;
			width: 90%;
			height: 30px;
			left: 10px;
			top: 15px;
		}





	}






	@media(max-width:425px) {

		#exit {
			position: absolute;
			left: 85%;
			top: 10px;
			font-size: 20px;
			cursor: pointer;
		}


		.navbar-brand {
			margin-left: auto;
		}
	}




	@media(max-width:340px) {


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
			margin-left: auto;
		}

		#card-mobile img {
			height: 200px;
			object-fit: cover;
		}




	}


	#card {
		border-radius: 5px;
		cursor: pointer;
		transition: opacity 0.3s;
		display: block;

	}

	#myImg {
		transition: transform 1.5s ease;

	}

	#card:hover {
		opacity: 0.7;

	}

	#card:hover #myImg {
		transform: scale(1.4);
	}

	#card-mobile {
		border-radius: 5px;
		cursor: pointer;
		transition: opacity 0.3s;
		display: block;
		transition: transform 1.5s ease;
	}



	#card-mobile:hover {
		opacity: 0.7;
	}

	#card-mobile:hover #myImg {
		transform: scale(1.4);

	}

	#inner {
		overflow: hidden;
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
		color: #EAEAEA;
	}

	.bar-sosmed {

		padding-right: 20px;
		text-align: center;



	}


	/* search */
	</style>

	<!-- link my css -->
	<link rel="stylesheet" href="css/main.css">

</head>

<body>




	<!-- awal navbar -->


	<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">




		<div class="container">



			<button class="navbar-toggler me-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll"
				aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>

			<a class="navbar-brand" id="logo" href="#">GoturthinQs<span>.</span></a>

			<a href="#container" id="cari" class="btn btn-dark d-lg-none ms-auto" style="display:block;"><i
					class="fas fa-search"></i></a>

			<!-- cari1 -->
			<form action="" method="post" class="d-lg-block" id="bar" style="display:none;">

				<input class="form-control me-lg-2" type="text" placeholder="Cari Produk Goturthings" aria-label="Search"
					name="keyword" autofocus autocomplete="off" id="keyword">

				<a id="exit" class="btn btn-dark ms-auto d-lg-none" style=""><i class="far fa-window-close"></i></a>
			</form>

			<div class="collapse navbar-collapse" id="navbarScroll">

				<!-- cari1 -->


				<label for="keyword" class="btn btn-dark d-none d-lg-block" id="search"> <a href="#container"><i
							class="fas fa-search"></i></a> </label>





				<ul class="navbar-nav">
					<li class="nav-item">
						<a class="nav-link  d-lg-none fs-4 active" style="cursor:pointer;" aria-expanded="false">
							Shope
						</a>
					</li>
				</ul>

				<ul class="navbar-nav ms-auto navbar-nav-scroll" style="--bs-scroll-height: 100px;">

					<li class=" nav-item dropdown">
						<a class="nav-link dropdown-toggle d-lg-block d-none active" href="#" id="navbarDropdownMenuLink"
							role="button" data-bs-toggle="dropdown" aria-expanded="false">
							Shope
						</a>
						<ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
							<li><a class="dropdown-item" href="#">T-Shirt</a></li>
							<li><a class="dropdown-item" href="#">Hoodie</a></li>
							<li><a class="dropdown-item" href="#">Celana</a></li>

						</ul>
					</li>



					<div class="shope d-lg-none">
						<li class="nav-item">
							<a class="nav-link" href="#">T-Shirt</a>
						</li>


					</div>

					<li class="nav-item d-lg-block d-none">
						<a class="nav-link" href="#">Contact</a>
					</li>


					<li class="nav-item d-lg-block d-none me-auto ms-5">
						<a class="nav-link" id="logout" href="logout.php">Logout</a>
					</li>



					<!-- bagian dropdown -->
					<li class="nav-item fs-4 d-lg-none"><a class="nav-link" href="#">Contact</a>
					</li>


					<li class="nav-item fs-4  d-lg-none">
						<a class="nav-link" id="logout" href="logout.php">Logout</a>
					</li>
				</ul>
				<ul class="navbar-nav">
					<ul class="bar-sosmed d-lg-none mt-2">
						<li><a href=""> <i class="fab fa-instagram"></i></a>
						</li>
						<li><a href=""><i class="fab fa-facebook"></i></a></li>
						<li><a href=""><i class="fab fa-twitter"></i></a></li>
						<li><a href=""><i class="fab fa-whatsapp"></i></a></li>
					</ul>

				</ul>
			</div>
		</div>
	</nav>
	<!-- akhir navbar -->




	<!-- awal slide gambar -->

	<div id="carouselExampleIndicators" class="carousel slide mt-5" data-bs-ride="carousel">
		<div class="carousel-inner">
			<div class="carousel-item active">
				<img src="img/slide.png" class="d-block w-100" alt="slide1">
			</div>
			<div class="carousel-item">
				<img src="img/slidee.png" class="d-block w-100" alt="slide2">
			</div>
			<div class="carousel-item">
				<img src="img/slideee.png" class="d-block w-100" alt="slide3">
			</div>
		</div>
	</div>
	<!-- akhir slide gambar -->

	<div id="container" data-aos="fade-up">
		<!-- awal new arrivals -->

		<div class="arrival text-center my-5">
			<span
				style="border-top: 1px solid #555;border-bottom: 1px solid #555;padding: 3px 0px;letter-spacing: 5px;font-size: 18px;color: #555;">NEW
				ARRIVALS</span>

		</div>



		<!-- akhir new arrivals -->



		<?php if(empty($goturthings)): ?>


		<div class="col text-center" style="padding:50px 0 200px 0;">
			<h1 style="color:#a9a9a9;font-family: 'Open Sans', sans-serif;margin-top:120px;text-align:center;">
				Tidak
				Ada Produk</h1>

		</div>


		<?php endif; ?>


		<!-- awal isi produk -->
		<div class="container-fluid" id="container-produk">
			<div class="row g-2 " data-aos="flip-left">
				<?php foreach($goturthings as $goturthing) :?>



				<a href="detail.php?id=<?= $goturthing["id"]?>&kode_produk=<?= $goturthing["kode_produk"]?>&gambar=<?= $goturthing["gambar"]?>&nama_produk=<?= $goturthing["nama_produk"] ?>&keterangan=<?= $goturthing["keterangan"]?>"
					id="card" class="mb-5 w-25 d-none d-lg-block" style="text-decoration:none;color:black;">
					<div id="inner">
						<img id="myImg" src=" img/<?= $goturthing["gambar"] ?>" class="card-img-top"
							alt="<?= $goturthing["kode_produk"] ?>" style="height:300px;object-fit:cover;">
					</div>
					<p class="card-title mt-2"><?= $goturthing["nama_produk"] ?></p>
					<p class="card-text">IDR. <?= $goturthing["harga"] ?></p>

				</a>

				<a href="detail.php?id=<?= $goturthing["id"]?>&kode_produk=<?= $goturthing["kode_produk"]?>&gambar=<?= $goturthing["gambar"]?>&nama_produk=<?= $goturthing["nama_produk"] ?>&keterangan=<?= $goturthing["keterangan"]?>"
					id="card-mobile" class="mb-5 w-50 d-lg-none" style="text-decoration:none;color:black;">

					<div id="inner">
						<img id="myImg" src="img/<?= $goturthing["gambar"] ?>" class="card-img-top"
							alt="<?= $goturthing["kode_produk"] ?>">
					</div>

					<p class="card-title"><?= $goturthing["nama_produk"] ?></p>
					<p class="card-text">IDR. <?= $goturthing["harga"] ?></p>

				</a>


				<?php endforeach; ?>
			</div>
		</div>
	</div>
	<!-- akhir isi produuk -->


	<!-- awal footer -->



	<!-- map -->
	<div id="map" class="fh5co-map" data-aos="fade-up" data-aos-offset="300">
		<iframe
			src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2601141.170198934!2d106.61469224054412!3d-7.046159555026572!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e43e8ebf7617%3A0x501e8f1fc2974e0!2sCimahi%2C%20Kec.%20Cimahi%20Tengah%2C%20Kota%20Cimahi%2C%20Jawa%20Barat!5e0!3m2!1sid!2sid!4v1643875888332!5m2!1sid!2sid"
			width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
	</div>


	<!-- awal footer -->

	<div class="border my-2" style="border-top:black 1px solid;width:90%;margin:auto;"></div>

	<div class="footer container-fluid" id="footer">
		<p class=""><i class="far fa-copyright"></i> 2022 Muhamad Jamaludin. Created With Love. <br> All
			Picture
			From: <a href="https://www.instagram.com/goturthings/" target="_blank"
				style="text-decoration:none;	color: #151e3d;">GoturthiQs</a><span style="color:red;">.</span></p>

		<ul class="footer-sosmed d-sm-block d-none">
			<li><a href=""> <i class="fab fa-instagram"></i></a>
			</li>
			<li><a href=""><i class="fab fa-facebook"></i></a></li>
			<li><a href=""><i class="fab fa-twitter"></i></a></li>
			<li><a href=""><i class="fab fa-whatsapp"></i></a></li>
		</ul>
	</div>




	<!-- akhir footer -->




	<!-- JQuery -->

	<!-- AOS -->
	<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
	<script>
	AOS.init();
	</script>




	<!-- myscript -->
	<script>
	// ambil elemen2 yang dibutuhkan
	var keyword = document.getElementById('keyword');
	var container = document.getElementById('container');



	// tambahkan event ketika keyboard ditulis
	keyword.addEventListener('keyup', function() {



		// buat object ajax
		var xhr = new XMLHttpRequest();

		// cek kesiapan ajax
		xhr.onreadystatechange = function() {
			if (xhr.readyState == 4 && xhr.status == 200) {
				container.innerHTML = xhr.responseText;
			}
		}

		// eksekusi ajax
		xhr.open('GET', 'ajax/mainProduk.php?keyword=' + keyword.value, true);
		xhr.send();



	});




	var cari = document.getElementById('cari');
	var bar = document.getElementById('bar');
	var exit = document.getElementById('exit');


	cari.addEventListener('click', function() {

		var bar = document.getElementById('bar');
		bar.setAttribute("style", "display:;");

	});

	exit.addEventListener('click', function() {

		var bar = document.getElementById('bar');
		bar.setAttribute("style", "display:none;");

	});
	</script>

	<script src="js/main.js"></script>



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