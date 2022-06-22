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







// pagination
// konfigurasi







$goturthings = query("SELECT * FROM jenis_produk INNER JOIN produk ON jenis_produk.jenis_produk=produk.jenis_produk INNER JOIN ukuran ON ukuran.ukuran = produk.ukuran ORDER BY produk.id DESC");
  


if(isset($_GET['cari'])){

$goturthings=cari($_GET["cari"]);

}




$jenisProduk=query("SELECT * FROM jenis_produk");



// profile
$profile=query("SELECT * FROM users WHERE id='$id'")['0'];


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

	/* hover dropdown */
	.dropdown:hover .dropdown-menu {
		display: block;
		margin-top: 0; // remove the gap so it doesn't close
	}
	</style>


	<!-- link my css -->
	<!-- <link rel="stylesheet" href="css/contact.css"> -->

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

			<a href="index.php?mencari#container" class="btn btn-dark d-lg-none ms-auto" style="display:block;"><i
					class="fas fa-search" style="color:white;"></i></a>


			<form id="bar" action="index.php" method="post" class="d-lg-block" style="display:none;">
				<input class="form-control formm me-lg-2" type="text" placeholder="Cari Produk Goturthings" aria-label="Search"
					name="keyword" autocomplete="off" id="keyword">

				<a id="exit" class="btn btn-dark ms-auto d-lg-none"><i class="far fa-window-close"></i></a>
			</form>

			<div class="collapse navbar-collapse show" id="navbarScroll" style="animation:slideup ease forwards;">


				<label for="keyword" class="btn btn-dark d-none d-lg-block" id="search"> <a href="index.php?mencari#container"><i
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
							<li><a class="dropdown-item" href="index.php?mencari#container">All Items</a></li>
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
							<a name="cari" href="index.php?mencari#container" class="nav-link" id="jenis">All Items</a>
						</li>

					</div>

					<li class="nav-item d-lg-block d-none mt-2">
						<a class="nav-link active" href="contact.php">Contact</a>
					</li>

					<li class="nav-item d-lg-block d-none mt-2">
						<a class="nav-link " href="dashboard.php">Dashboard</a>
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
						<a class="nav-link active" id="contact" href="contact.php">Contact</a>
					</li>

					<li class="nav-item d-lg-none">
						<a class="nav-link" id="dashboard" href="dashboard.php">Dashboard</a>
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



	<div class="container" style="margin-top:100px;">



		<!-- awal judul -->
		<div class="col">
			<h3 id="judul">Contact</h3>
		</div>
		<div class="col mb-3">
			<a href="index.php">home</a> / <a href="index.php?mencari#container">shop</a> / <a href="#" class="fw-bold"
				id="point">Contact</a>
		</div>

		<!-- akhir judul -->


		<div class="alert alert-success alert-dismissible fade show d-none my-alert" role="alert">
			<strong>Terima kasih!</strong> Pesan anda telah diterima.
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>


		<div class="alert alert-danger alert-dismissible fade show d-none gagal-alert" role="alert">
			<strong>Mohon maaf!</strong> Pesan anda gagal dikirim.
			<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		</div>

		<form name="goturthinqs-contact-from">
			<!-- awal Form Contact Us -->
			<div class="row mb-3">
				<div class="col-6">
					<input type="text" name="first_name" class="form-control" placeholder="First name" aria-label="First name"
						required autofocus>
				</div>
				<div class="col-6">
					<input type="text" name="last_name" class="form-control" placeholder="Last name" aria-label="Last name"
						required autofocus>
				</div>
			</div>

			<div class="col-12 mb-3">
				<input type="email" name="email" class="form-control w-100" id="colFormLabel" placeholder="Email" required
					autofocus>
			</div>

			<div class="form-floating mb-3">
				<textarea class="form-control" name="message" placeholder="Message" id="floatingTextarea2" style="height: 100px"
					required autofocus></textarea>
				<label for="floatingTextarea2">Message</label>
			</div>


			<button type="submit" class="btn btn-outline-dark me-2 btn-kirim">Submit</button>


			<button class="btn btn-dark d-none btn-loading" type="button" disabled>
				<span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
				Loading...
			</button>


			<button type="reset" value="Reset" class="btn btn-danger">Cancel</button>


		</form>
		<!-- akhir Form Contact Us -->
	</div>

	<!-- awal footer -->
	<div class="border mb-2 mt-auto" style="border-top:black 1px solid;width:90%;margin:auto;"></div>

	<div class="footer container" id="footer">
		<p class=""><i class="far fa-copyright"></i> 2022 Muhamad Jamaludin. Created With Love. <br> All
			Picture
			From: <a href="https://www.instagram.com/goturthings/" target="_blank"
				style="text-decoration:none;	color: #151e3d;">GoturthinQs</a><span style="color:red;">.</span></p>

		<ul class="footer-sosmed d-sm-block d-none">
			<li><a href="https://www.instagram.com/goturthings/"> <i class="fab fa-instagram"></i></a>
			</li>
			<li><a href=""><i class="fab fa-facebook"></i></a></li>
			<li><a href=""><i class="fab fa-twitter"></i></a></li>
			<li><a href=""><i class="fab fa-whatsapp"></i></a></li>
		</ul>
	</div>
	<!-- akhir footer -->


	<!-- AOS -->
	<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
	<script>
	AOS.init();
	</script>


	<!-- loadmore -->
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

	<!-- jquery -->
	<script src="jquery/costum.js"></script>


	<script>
	configObj = {
		"buttonD": "M8 18.568L10.8 21.333 16 16.198 21.2 21.333 24 18.568 16 10.667z",
		"buttonT": "translate(-1148 -172) translate(832 140) translate(32 32) translate(284)",
		"shadowSize": "0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06)",
		"roundnessSize": "12px",
		"buttonDToBottom": "24px",
		"buttonDToRight": "24px",
		"selectedBackgroundColor": "#f7f7f7",
		"selectedIconColor": "#091b2a",
		"buttonWidth": "40px",
		"buttonHeight": "40px",
		"svgWidth": "32px",
		"svgHeight": "32px"
	};

	function createButton(obj, pageSimulator) {
		const body = document.querySelector("body");
		backToTopButton = document.createElement("span");
		backToTopButton.classList.add("softr-back-to-top-button");
		backToTopButton.id = "softr-back-to-top-button";
		pageSimulator ? pageSimulator.appendChild(backToTopButton) : body.appendChild(backToTopButton);
		backToTopButton.style.width = obj.buttonWidth;
		backToTopButton.style.height = obj.buttonHeight;
		backToTopButton.style.marginRight = obj.buttonDToRight;
		backToTopButton.style.marginBottom = obj.buttonDToBottom;
		backToTopButton.style.borderRadius = obj.roundnessSize;
		backToTopButton.style.boxShadow = obj.shadowSize;
		backToTopButton.style.color = obj.selectedBackgroundColor;
		backToTopButton.style.backgroundColor = obj.selectedBackgroundColor;
		pageSimulator ? backToTopButton.style.position = "absolute" : backToTopButton.style.position = "fixed";
		backToTopButton.style.outline = "none";
		backToTopButton.style.bottom = "0px";
		backToTopButton.style.right = "0px";
		backToTopButton.style.cursor = "pointer";
		backToTopButton.style.textAlign = "center";
		backToTopButton.style.border = "solid 2px currentColor";
		backToTopButton.innerHTML =
			'<svg class="back-to-top-button-svg" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" > <g fill="none" fill-rule="evenodd"> <path d="M0 0H32V32H0z" transform="translate(-1028 -172) translate(832 140) translate(32 32) translate(164) matrix(1 0 0 -1 0 32)" /> <path class="back-to-top-button-img" fill-rule="nonzero" d="M11.384 13.333h9.232c.638 0 .958.68.505 1.079l-4.613 4.07c-.28.246-.736.246-1.016 0l-4.613-4.07c-.453-.399-.133-1.079.505-1.079z" transform="translate(-1028 -172) translate(832 140) translate(32 32) translate(164) matrix(1 0 0 -1 0 32)" /> </g> </svg>';
		backToTopButtonSvg = document.querySelector(".back-to-top-button-svg");
		backToTopButtonSvg.style.verticalAlign = "middle";
		backToTopButtonSvg.style.margin = "auto";
		backToTopButtonSvg.style.justifyContent = "center";
		backToTopButtonSvg.style.width = obj.svgWidth;
		backToTopButtonSvg.style.height = obj.svgHeight;
		backToTopButton.appendChild(backToTopButtonSvg);
		backToTopButtonImg = document.querySelector(".back-to-top-button-img");
		backToTopButtonImg.style.fill = obj.selectedIconColor;
		backToTopButtonSvg.appendChild(backToTopButtonImg);
		backToTopButtonImg.setAttribute("d", obj.buttonD);
		backToTopButtonImg.setAttribute("transform", obj.buttonT);
		if (!pageSimulator) {
			backToTopButton.style.display = "none";
			window.onscroll = function() {
				if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
					backToTopButton.style.display = "block";
				} else {
					backToTopButton.style.display = "none";
				}
			};
			backToTopButton.onclick = function() {
				document.body.scrollTop = 0;
				document.documentElement.scrollTop = 0;
			};
		}
	};
	document.addEventListener("DOMContentLoaded", function() {
		createButton(configObj, null);
	});
	</script>


	<!-- main js -->
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
	</script>



	<!-- style form -->
	<script src='../js/form.js'></script>

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