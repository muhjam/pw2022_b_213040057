<?php
// cek udah login apa belum
session_start();
	require 'functions.php';


if(isset($_SESSION['akunbaru'])){
$email=$_SESSION['akunbaru'];
// koneksi ke database
$conn=koneksi();
mysqli_query($conn, "DELETE FROM users WHERE `users`.`email` = '$email'");
}


// cek cookie
if(isset($_COOKIE['id'])&&isset($_COOKIE['key'])){
  $id=$_COOKIE['id'];
  $key=$_COOKIE['key'];

  // ambil username berdasarkan id
  $result= mysqli_query($conn, "SELECT * FROM users WHERE id=$id");
  $row=mysqli_fetch_assoc($result);

  // cek cookie dan username
  if($key===hash('sha256', $row['email'])){
	$_SESSION['level']=$row['level'];
	$_SESSION['username']=$row['username'];
    $_SESSION['status']=$row['status'];
	$_SESSION['email']=$row['email'];	
			$_SESSION['id']=$row['id'];
  }
}


if(isset($_COOKIE['level'])){
  if($_COOKIE['level']=='true'){
    $_SESSION['level']=$row['level'];
		$_SESSION['username']=$row['username'];
		$_SESSION['status']=$row['status'];
		$_SESSION['email']=$row['email'];
		$_SESSION['id']=$row['id'];
  }
}

// cek apakah sudah login
if(isset($_SESSION["level"])){

if($_SESSION['level']=="admin"){
	header("location:admin/index.php");
exit;
}else if($_SESSION['level']=="user"){
	header("location:user/index.php");
exit;
}


}






// cek apakah tombol submit sudah di tekan atau belum
if (isset($_POST["login"])) {

$email=$_POST["email"];
$password=$_POST["password"];


// Cek Full Name
$result=mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");

// jika akun belum di buat
if(mysqli_num_rows($result)===0){
	    echo "
        <script>
        alert('Anda belum membuat akun!')
							document.location.href='login.php'
        </script>";
}

if(mysqli_num_rows($result)===1){
  //  memanggil isinya
$row=mysqli_fetch_assoc($result);

// cek status
	if($row['status']=="non"){
			echo " <script>
        alert('Anda belum membuat akun!')
				document.location.href='login.php'
        </script>";
		}else if($row['status']=="ban"){
			echo " <script>
        alert('Maaf, akun anda telah diban!')
				document.location.href='login.php'
        </script>";
		}

 // Cek password

if(password_verify($password, $row['password'])){



	// cek jika user login sebagai admin
	if($row['level']=="admin"){
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['email'] = $email;
		$_SESSION['level'] = "admin";
		$_SESSION['id']=$row['id'];
		$_SESSION['status']=$row['status'];
		// alihkan ke halaman admin
		header("location:admin/index.php");
	// cek jika user login sebagai pegawai
	}else if($row['level']=="user"){
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['email'] = $email;
		$_SESSION['level'] = "admin";
		$_SESSION['id']=$row['id'];
		$_SESSION['status']=$row['status'];
			// alihkan ke halaman user
		header("location:user/index.php");
	}else{
	$error=true;
	}	




}




// cek remember me
if(isset($_POST['remember'])){
  // buat cookie
  setcookie('id', $row['id'], time() + 60);
  setcookie('key', hash('sha256', $row['username']), time() + 60);

		// cek jika user login sebagai admin
	if($row['level']=="admin"){

		// buat session login dan username
			$_SESSION['username'] = $username;
		$_SESSION['email'] = $email;
		$_SESSION['level'] = "admin";
		$_SESSION['id']=$row['id'];
		$_SESSION['status']=$row['status'];
		// alihkan ke halaman dashboard admin
		header("location:admin/index.php");

	// cek jika user login sebagai pegawai
	}else if($row['level']=="user"){
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['email'] = $email;
		$_SESSION['level'] = "admin";
		$_SESSION['id']=$row['id'];
		$_SESSION['status']=$row['status'];
		// alihkan ke halaman dashboard pegawai
		header("location:user/index.php");

	}else{
	$error=true;
	}	
}


}

$error=true;

}


// pagination
// konfigurasi







$goturthings = query("SELECT * FROM jenis_produk INNER JOIN produk ON jenis_produk.jenis_produk=produk.jenis_produk INNER JOIN ukuran ON ukuran.ukuran = produk.ukuran ORDER BY produk.id DESC");
  


if(isset($_GET['cari'])){

$goturthings=cari($_GET["cari"]);

}




$jenisProduk=query("SELECT * FROM jenis_produk");



// tombol cari
// if(isset($_POST["cari"])){
// 	$goturthings = cari($_POST["keyword"]);
	
// }



?>



<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta name="description" content="Tempat trifthingnya Bandung" />
	<meta name="keywords"
		content="GoturthinQs, toko online, trifthing, jual barang bekas fashion, toko online bandung, toko online di bandung, goturthings, got your things, GBI, trifthing bandung" />
	<meta name="author" content="Muhamad Jamaludin" />

	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

	<!-- Font-Awessome -->
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">

	<!-- icon -->
	<link rel="icon" href="icon/icon.png">
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

	.form-control {
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

	#logout {
		color: #b22222;
	}

	#logout:hover {
		color: #ff0000;
	}

	@media (min-width: 1400px) {
		#card {
			width: 25%;
		}

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

	@media (max-width: 1400px) {
		#card {
			width: 25%;
		}

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

	@media (max-width: 1200px) {

		/* cari1 */
		.form-control {
			position: relative;
			width: 350px;
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
		.form-control {
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
		color: #eaeaea;
	}

	.bar-sosmed {
		padding-right: 20px;
		text-align: center;
	}





	/* hover dropdown */
	.dropdown:hover .dropdown-menu {
		display: block;
	}
	</style>


	<!-- link my css -->
	<!-- <link rel="stylesheet" href="css/main.css"> -->

</head>

<body class="d-flex flex-column min-vh-100">


	<!-- awal navbar -->

	<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">

		<div class="container">

			<span class="fas fa-bars me-auto ms-3 d-lg-none" data-bs-target="#navbarScroll" aria-controls="navbarScroll"
				aria-expanded="false" aria-label="Toggle navigation" style="color:white;font-size:20px;cursor:pointer;">
			</span>

			<span class="fas fa-minus me-auto ms-3 d-none d-lg-none" data-bs-target="#navbarScroll"
				aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation"
				style="color:white;font-size:20px;cursor:pointer;">
			</span>



			<a class="navbar-brand ms-4 ms-lg-0" id="logo" href="index.php">GoturthinQs<span>.</span></a>

			<a href="index.php?mencari#container" id="cariin" class="btn btn-dark d-lg-none ms-auto" style="display:block;"><i
					class="fas fa-search" style="color:white;"></i></a>


			<form id="bar" action="" method="post" class="d-lg-block"
				style="<?php if(isset($_GET['mencari'])){echo"display:;";}else{echo"display:none;";}?>">
				<input class="form-control formm me-lg-2" type="text" placeholder="Cari Produk Goturthings" aria-label="Search"
					name="keyword" autocomplete="off" id="keyword" autofocus>

				<a id="exit" class="btn btn-dark ms-auto d-lg-none"><i class="far fa-window-close"></i></a>
			</form>

			<div class="collapse navbar-collapse show" id="navbarScroll" style="animation:slideup ease forwards;">


				<label for="keyword" class="btn btn-dark d-none d-lg-block" id="search"> <a
						href="index.php?mencari#container"><i class="fas fa-search"></i></a> </label>





				<ul class="navbar-nav">



					<li class="nav-item">
						<a href="index.php?mencari#container" class="nav-link  d-lg-none fs-4 active" style="cursor:pointer;"
							aria-expanded="false">
							Shop
						</a>
					</li>
				</ul>

				<ul class="navbar-nav ms-auto navbar-nav-scroll" style="--bs-scroll-height: 100px;">

					<li class=" nav-item dropdown">
						<a class="nav-link dropdown-toggle d-lg-block d-none active" href="#" id="navbarDropdownMenuLink"
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

					<li class="nav-item d-lg-block d-none">
						<a class="nav-link" href="contact.php">Contact</a>
					</li>



					<!-- bagian dropdown -->
					<li class="nav-item fs-4 d-lg-none">
						<a class="nav-link" id="contact" href="contact.php">Contact</a>
					</li>
				</ul>

				<div class="login-register text-center">
					<a class="btn btn-secondary ms-lg-5 me-lg-1" style="font-size:10px;" href="login.php">Login</a>
					<a class="btn btn-danger" style="font-size:10px;" href="signup.php">Regrister</a>
				</div>

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

	<!-- awal slide image -->
	<div id="carouselExampleFade" class="carousel slide carousel-fade mt-5" data-bs-ride="carousel">
		<div class="carousel-inner">
			<div class="carousel-item active">
				<img src="img/slide.png" class="d-block w-100" alt="slide1" style="object-fit:cover;">
			</div>
			<div class="carousel-item">
				<img src="img/slidee.png" class="d-block w-100" alt="slide2">
			</div>
			<div class="carousel-item">
				<img src="img/slideee.png" class="d-block w-100" alt="slide3">
			</div>
		</div>
		<div class="carousel-control-prev" style="pointer-events:none;">
			<span class="fas fa-angle-left bg-dark" aria-hidden="true" data-bs-target="#carouselExampleFade"
				data-bs-slide="prev"
				style="border-radius:100%;width:50px;height:50px;line-height:50px;font-size:25px;pointer-events:auto;cursor:pointer;"></span>
			<span class="visually-hidden">Previous</span>
		</div>
		<div class="carousel-control-next" style="pointer-events:none;">
			<span class="fas fa-angle-right bg-dark" aria-hidden="true" data-bs-target="#carouselExampleFade"
				data-bs-slide="next"
				style="border-radius:100%;width:50px;height:50px;line-height:50px;font-size:25px;pointer-events:auto;cursor:pointer;"></span>
			<span class="visually-hidden">Next</span>
		</div>
	</div>
	<!-- akhir slide image -->


	<div id="container" data-aos="fade-up">
		<!-- awal new arrivals -->


		<?php if(!isset($_GET['cari'])): ?>

		<div class="arrival text-center my-5">
			<span
				style="border-top: 1px solid #555;border-bottom: 1px solid #555;padding: 3px 0px;letter-spacing: 5px;font-size: 18px;color: #555;">NEW
				ARRIVALS</span>

		</div>

		<?php endif; ?>


		<?php if(isset($_GET['cari'])): ?>

		<div class="arrival text-center my-5">
			<span
				style="border-top: 1px solid #555;border-bottom: 1px solid #555;padding: 3px 0px;letter-spacing: 5px;font-size: 18px;color: #555;text-transform:uppercase;"><?= $_GET['cari']; ?></span>

		</div>

		<?php endif; ?>


		<!-- akhir new arrivals -->



		<?php if(empty($goturthings)): ?>


		<div class="col text-center" style="padding:50px 0 200px 0;">
			<h1 style="color:#a9a9a9;font-family: 'Open Sans', sans-serif;margin-top:120px;text-align:center;">
				Tidak
				Ada Produk</h1>

		</div>


		<?php endif; ?>


		<!-- awal isi produk -->
		<div class="container-fluid">
			<div class="row g-2 news-wrap" data-aos="flip-left">


				<?php foreach($goturthings as $goturthing) :?>


				<a href="beli.php?id=<?= $goturthing["id"]?>" id="card" class="mb-5 news-item"
					style="text-decoration:none;color:black;display:none;">
					<div id="inner">
						<img id="myImg" src=" img/<?= $goturthing["gambar"] ?>" class="card-img-top"
							alt="<?= $goturthing["kode_produk"] ?>" style="height:300px;object-fit:cover;">
					</div>
					<p class="card-title mt-2"><?= $goturthing["nama_produk"]; ?></p>
					<p class="card-text"><?= idr($goturthing["harga"]); ?></p>
				</a>


				<?php endforeach; ?>
			</div>
		</div>
		<!-- awal loadmore -->
		<div class="loadMore text-center mb-5 mt-2" id="loadMore" data-aos="flip-left">
			<button class="load-more">Load More</button>
		</div>
		<!-- akhir loadmore -->

	</div>
	<!-- akhir isi produuk -->






	<!-- awal footer -->



	<!-- map -->
	<div id="map" class="fh5co-map mt-5" data-aos="fade-up" data-aos-offset="300">
		<iframe
			src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2601141.170198934!2d106.61469224054412!3d-7.046159555026572!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e43e8ebf7617%3A0x501e8f1fc2974e0!2sCimahi%2C%20Kec.%20Cimahi%20Tengah%2C%20Kota%20Cimahi%2C%20Jawa%20Barat!5e0!3m2!1sid!2sid!4v1643875888332!5m2!1sid!2sid"
			width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
	</div>
	<!-- akhir map -->

	<!-- awal footer -->
	<div class="border mb-3 mt-auto" style="border-top:black 1px solid;width:90%;margin:auto;"></div>

	<div class="footer container" id="footer">
		<p class=""><i class="far fa-copyright"></i> 2022 <a href="https://www.instagram.com/muhamadjamaludinpad/"
				target="_blank" style="text-decoration:none;	color:#2d2d2d;">Muhamad Jamaludin</a>. Created With Love. <br>
			All
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


	<script>
	// ambil elemen2 yang dibutuhkan
	var keyword = document.getElementById("keyword");
	var container = document.getElementById("container");
	var loadMore = document.getElementById("loadMore");
	var slide = document.getElementById("carouselExampleFade");
	var map = document.getElementById("map");


	// tambahkan event ketika keyboard ditulis
	keyword.addEventListener("keyup", function() {

		slide.setAttribute("style", "display:none;");
		container.setAttribute("style", "margin-top:25px;");
		map.setAttribute("style", "display:none;");
		// buat object ajax
		var xhr = new XMLHttpRequest();

		// cek kesiapan ajax
		xhr.onreadystatechange = function() {
			if (xhr.readyState == 4 && xhr.status == 200) {
				container.innerHTML = xhr.responseText;
			}
		};

		// eksekusi ajax
		xhr.open("GET", "ajax/mainProduk.php?keyword=" + keyword.value, true);
		xhr.send();

		if (keyword.value == '') {
			slide.setAttribute("style", "display:;");
			container.setAttribute("style", "margin-top:0;");
			map.setAttribute("style", "display:;");
		}
	});

	// button search
	var search = document.getElementById("cariin");
	var bar = document.getElementById("bar");
	var exit = document.getElementById("exit");

	// nav
	const btnBars = document.querySelector(".fa-bars");
	const btnMinus = document.querySelector(".fa-minus");
	const show = document.querySelector(".navbar-collapse");


	search.addEventListener("click", function() {
		var bar = document.getElementById("bar");
		bar.setAttribute("style", "display:;");
		btnBars.classList.remove("d-none");
		btnMinus.classList.add("d-none");
		show.setAttribute("style", "animation:slideup 0.5s ease forwards;");
	});

	exit.addEventListener("click", function() {
		var bar = document.getElementById("bar");
		bar.setAttribute("style", "display:none;");

	});



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