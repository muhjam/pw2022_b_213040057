<?php 
// memeriksa sudah login atau belum
session_start();
require 'functions.php';

$level=$_SESSION['level'];
$username=$_SESSION['username'];
$email=$_SESSION['email'];
$id=$_SESSION['id'];

if(!isset($_SESSION["level"])){
header("location:../logout.php");
exit;
}

if($_SESSION["level"]!='admin'){
	header("location:../$level/index.php");
exit;
}









// produk
$id=$_GET['id'];
$produk=query("SELECT * FROM produk WHERE id='$id'")['0'];
if(empty($produk)){
	header("location:dashboard.php");
}


// jenis produk
$jenisProduk=query("SELECT * FROM jenis_produk");


// profile
$profile=query("SELECT foto FROM users WHERE email='$email'")[0];


?>


<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

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

		/* navbar */
		#navbarScroll {
			overflow: hidden;
			height: 0px;
		}


		@keyframes slideup {
			0% {
				height: 220px;
			}

			100% {
				height: 0px;
			}
		}

		@keyframes slidedown {
			0% {
				height: 0px;
			}

			100% {
				height: 220px;
			}
		}

		#card {
			width: 50%;
		}

		.navbar-nav {
			text-align: center;
		}

		#card img {
			height: 300px;
			object-fit: cover;
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
		font-weight: 600;
	}

	#point:hover {
		color: red;
	}

	.judul .col a {
		text-decoration: none;
		color: rgba(0, 0, 0, 0.692);
		text-align: left;
		font-weight: 500;
		font-family: "Montserrat", sans-serif;
		text-transform: uppercase;
		font-size: 12px;
	}

	.judul .col a:hover {
		text-decoration: underline;
	}


	/* DETAIL */

	#myImg {
		border-radius: 5px;
		cursor: pointer;
		transition: 0.3s;
		display: block;
		margin-left: auto;
		margin-right: auto;
	}

	#myImg:hover {
		opacity: 0.7;
	}


	/* The Modal (background) */

	.modal {
		display: none;
		/* Hidden by default */
		position: fixed;
		/* Stay in place */
		z-index: 1;
		/* Sit on top */
		padding-top: 100px;
		/* Location of the box */
		left: 0;
		top: 0;
		width: 100%;
		/* Full width */
		height: 100%;
		/* Full height */
		overflow: auto;
		/* Enable scroll if needed */
		background-color: rgb(0, 0, 0);
		/* Fallback color */
		background-color: rgba(0, 0, 0, 0.9);
		/* Black w/ opacity */
	}


	/* Modal Content (image) */

	.modal-content {
		margin: auto;
		display: block;
		width: 75%;
		max-width: 75%;
	}


	/* Caption of Modal Image */

	#caption {
		margin: auto;
		display: block;
		width: 80%;
		max-width: 700px;
		text-align: center;
		color: #ccc;
		padding: 10px 0;
		height: 150px;
	}


	/* Add Animation */

	.modal-content,
	#caption {
		-webkit-animation-name: zoom;
		-webkit-animation-duration: 0.6s;
		animation-name: zoom;
		animation-duration: 0.6s;
	}

	.out {
		animation-name: zoom-out;
		animation-duration: 0.6s;
	}

	@-webkit-keyframes zoom {
		from {
			-webkit-transform: scale(1);
		}

		to {
			-webkit-transform: scale(2);
		}
	}

	@keyframes zoom {
		from {
			transform: scale(0.4);
		}

		to {
			transform: scale(1);
		}
	}

	@keyframes zoom-out {
		from {
			transform: scale(1);
		}

		to {
			transform: scale(0);
		}
	}


	/* The Close Button */

	.close {
		position: absolute;
		top: 15px;
		right: 35px;
		color: #f1f1f1;
		font-size: 40px;
		font-weight: bold;
		transition: 0.3s;
	}

	.close:hover,
	.close:focus {
		color: #bbb;
		text-decoration: none;
		cursor: pointer;
	}



	/* 100% Image Width on Smaller Screens */

	@media only screen and (max-width: 700px) {
		.modal-content {
			width: 100%;
		}
	}


	/* hover dropdown */
	.dropdown:hover .dropdown-menu {
		display: block;
		margin-top: 0; // remove the gap so it doesn't close
	}
	</style>
	<!-- link my css -->
	<link rel="stylesheet" href="css/style.css">


</head>

<body class="d-flex flex-column min-vh-100">


	<!-- awal navbar -->

	<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">

		<div class="container">


			<span class="fas fa-bars me-auto ms-3 d-lg-none" data-bs-target="#navbarScroll"
				aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation"
				style="color:white;font-size:20px;cursor:pointer;">
			</span>

			<span class="fas fa-minus me-auto ms-3 d-none d-lg-none" data-bs-target="#navbarScroll"
				aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation"
				style="color:white;font-size:20px;cursor:pointer;">
			</span>



			<a class="navbar-brand ms-4 ms-lg-0" id="logo" href="index.php">GoturthinQs<span>.</span></a>

			<a href="dashboard.php?mencari" class="btn btn-dark d-lg-none ms-auto" style="display:block;"><i class="fas fa-search"
					style="color:white;"></i></a>


			<form id="bar" action="dashboard.php" method="post" class="d-lg-block" style="display:none;">
				<input class="form-control formm me-lg-2" type="text" placeholder="Cari Produk Goturthings" aria-label="Search"
					name="keyword" autocomplete="off" id="keyword">

				<a id="exit" class="btn btn-dark ms-auto d-lg-none"><i class="far fa-window-close"></i></a>
			</form>

			<div class="collapse navbar-collapse show" id="navbarScroll" style="animation:slideup ease forwards;">


				<label for="keyword" class="btn btn-dark d-none d-lg-block" id="search"> <a href="dashboard.php"><i
							class="fas fa-search"></i></a> </label>





				<ul class="navbar-nav">

					<!-- profile mobile -->
					<a class="mt-1 d-lg-none" href="profile.php"><img id="profile" src="../profile/<?=$profile['foto'];?>"
							style="width:35px; height:35px; object-fit:cover;border-radius:50%;border:2px solid #d6d6d6;" title="<?=$profile['username']?>
"></a>



					<li class="nav-item">
						<a href="index.php?mencari#container" class="nav-link  d-lg-none fs-4" style="cursor:pointer;"
							aria-expanded="false">
							Shop
						</a>
					</li>
				</ul>

				<ul class="navbar-nav ms-auto navbar-nav-scroll" style="--bs-scroll-height: 100px;">

					<li class=" nav-item dropdown">
						<a class="nav-link dropdown-toggle d-lg-block d-none mt-2" href="#" id="navbarDropdownMenuLink"
							role="button" data-bs-toggle="dropdown" aria-expanded="false">
							Shop
						</a>
						<ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
							<?php foreach($jenisProduk as $jenis): ?>
							<li><a name="cari" class="dropdown-item"
									href="index.php?cari=<?= $jenis['jenis_produk']; ?>#container"><?= $jenis['jenis_produk']; ?></a></li>


							<?php endforeach; ?>
							<li><a class="dropdown-item" href="index.php?mencari#container">All Items</a></li>
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
							<a name="cari" href="index.php?mencari#container" class="nav-link" id="jenis">All Items</a>
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
							<img id="profile" src="../profile/<?=$profile['foto'];?>" alt="<?=$profile['username']?>"
								title="<?=$profile['username']?>"
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


	<div class="container judul" style="margin-top:100px;">
		<div class="col">
			<h3 id="judul">Dashboard</h3>
		</div>
		<div class="col">
			<a href="index.php">home</a> / <a href="index.php#container">shop</a> / <a href="dashboard.php">Dashboard</a> / <a
				href="#" class="fw-bold" id="point">Detail</a>
		</div>
	</div>

	<div class="container-fluid mb-5">
		<div class="card mt-3" style="max-width: 3000px;">
			<div class="row g-0">
				<div class="col-md-4">
					<img id="myImg" src="../img/<?= $produk["gambar"] ?>" class="img-fluid rounded-start"
						style="object-fit:cover;">
					<!-- The Modal -->
					<div id="myModal" class="modal">
						<img class="modal-content" id="img01">
					</div>
				</div>
				<div class="col-md-8 ">
					<div class="card-body">
						<h2 class="card-title"><?= $produk["nama_produk"]; ?></h2>
						<h5 class="card-title mb-2"><?= rupiah($produk["harga"]); ?></h5>
						<br>
						<h6 class="card-text">Code : <?= $produk["kode_produk"]; ?></h6>
						<h6 class="card-text">Size : <?= $produk["ukuran"]; ?></h6>

						<h6 class="card-text" style=" display:inline-block;">Color :</h6>

						<div class="kotak ms-2"
							style="background-color:<?= $produk['warna']?>;border:1px solid black;width:20px;height:10px;display:inline-block;border-radius:10px">
						</div>


						<h6 class="card-text mt-2 mb-3"><?= $produk["keterangan"]; ?></h6>


					</div>
				</div>
			</div>
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




	<!-- My Script -->
	<script>
	// Get the modal
	var modal = document.getElementById('myModal');

	// Get the image and insert it inside the modal - use its "alt" text as a caption
	var img = document.getElementById('myImg');
	var modalImg = document.getElementById("img01");
	var captionText = document.getElementById("caption");
	img.onclick = function() {
		modal.style.display = "block";
		modalImg.src = this.src;
		modalImg.alt = this.alt;
		captionText.innerHTML = this.alt;
	}


	// When the user clicks on <span> (x), close the modal
	modal.onclick = function() {
		img01.className += " out";
		setTimeout(function() {
			modal.style.display = "none";
			img01.className = "modal-content";
		}, 400);

	}

	// nav
	const btnBars = document.querySelector(".fa-bars");
	const btnMinus = document.querySelector(".fa-minus");
	const show = document.querySelector(".navbar-collapse");


	btnBars.addEventListener("click", function() {
		btnBars.classList.toggle("d-none");
		btnMinus.classList.toggle("d-none");
		show.setAttribute("style", "animation:slidedown 0.5s ease forwards;");
	});

	btnMinus.addEventListener("click", function() {
		btnBars.classList.toggle("d-none");
		btnMinus.classList.toggle("d-none");
		show.setAttribute("style", "animation:slideup 0.5s ease forwards;");
	});
	</script>




	<!-- Optional JavaScript; choose one of the two! -->

	<!-- Option 1: Bootstrap Bundle with Popper -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
	</script>

	<!-- Option 2: Separate Popper and Bootstrap JS -->
	<!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>

<!-- selesai -->