<?php 
// memeriksa sudah login atau belum
session_start();

$level=$_SESSION['level'];
$username=$_SESSION['username'];

if(!isset($_SESSION["level"])){
header("location:../logout.php");
exit;
}

if($_SESSION["level"]!='admin'){
	header("location:../$level.php");
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







$goturthings = query("SELECT * FROM jenis_produk INNER JOIN produk ON jenis_produk.jenis_produk=produk.jenis_produk INNER JOIN ukuran ON ukuran.ukuran = produk.ukuran ORDER BY produk.id DESC");
  


if(isset($_GET['cari'])){

$goturthings=cari($_GET["cari"]);

}




$jenisProduk=query("SELECT * FROM jenis_produk");


// profile
$profile=query("SELECT * FROM users WHERE username='$username'")[0];




// tombol cari
// if(isset($_POST["cari"])){
// 	$goturthings = cari($_POST["keyword"]);
	
// }




// cek
if(isset($_POST['submit'])){
	   // cek apakag profile berhasil diedit atau tidak
    if (edit($_POST) > 0) {
        echo "
        <script>
        alert('profile berhasil diubah')
        document.location.href='profile.php'
        </script>";
    } else {
        echo"
        <script>
        alert('profile belum diubah')
        document.location.href='profile.php'
        </script>";
    }
}


if(isset($_POST["berhasil"])){
	   // cek apakag profile berhasil diedit atau tidak
    if (editFoto($_POST) > 0) {
        echo "
        <script>
        alert('profile berhasil diubah')
        document.location.href='profile.php'
        </script>";
    } else {
        echo"
        <script>
        alert('profile belum diubah')
        document.location.href='profile.php'
        </script>";
    }
	}



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

	#profile-text {
		font-family: "Montserrat", sans-serif;
		font-weight: 600;
		font: size 20px;
	}


	#profile-text span {
		font-family: "Montserrat", sans-serif;
		font-weight: 500;
		font: size 20px;

	}



	/* DETAIL */

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



	#edit {
		color: #03254c;
		font-weight: bold;
	}

	#edit:hover {
		color: #1167b1;
	}



	#kamera {
		font-size: 20px;
		color: #f9f9f9;
		margin: 35px -10px;
		position: absolute;
		z-index: 1;
		opacity: 0;
	}


	.meImg:hover #kamera {
		opacity: 1;
		transition: 0.2s;
	}

	.meImg-bg {
		width: 1000px;
		height: 100px;
		margin-left: -12px;
		background-color: grey;
		object-fit: cover;
		opacity: 0;
		transition: 0.2s;
	}

	.meImg:hover .meImg-bg {
		opacity: 0.6;
		transition: 0.2s;
	}

	.meImg {
		border-radius: 50%;
		border: 2px solid white;
		margin-left: auto;
		margin-right: auto;
		width: 100px;
		height: 100px;
		background-image: url("../profile/<?= $profile["foto"] ?>");
		background-repeat: no-repeat;
		background-size: cover;
		background-position: center;
		cursor: pointer;
		display: block;
		overflow: hidden;
		text-align: center;
	}

	/* hover dropdown */
	.dropdown:hover .dropdown-menu {
		display: block;
		margin-top: 0; // remove the gap so it doesn't close
	}
	</style>


	<!-- link my css -->
	<!-- <link rel="stylesheet" href="css/main.css"> -->

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

			<a href="index.php#container" id="cariin" class="btn btn-dark d-lg-none ms-auto" style="display:block;"><i
					class="fas fa-search"></i></a>


			<form id="bar" action="" method="post" class="d-lg-block" style="display:none;">
				<input class="form-control formm me-lg-2" type="text" placeholder="Cari Produk Goturthings" aria-label="Search"
					name="keyword" autocomplete="off" id="keyword">

				<a id="exit" class="btn btn-dark ms-auto d-lg-none"><i class="far fa-window-close"></i></a>
			</form>

			<div class="collapse navbar-collapse" id="navbarScroll">


				<label for="keyword" class="btn btn-dark d-none d-lg-block" id="search"> <a href="index.php#container"><i
							class="fas fa-search"></i></a> </label>





				<ul class="navbar-nav">

					<!-- profile mobile -->
					<a class="mt-1 d-lg-none" href="profile.php"><img id="profile" src="../profile/<?=$profile['foto'];?>"
							style="width:35px; height:35px; object-fit:cover;border-radius:50%;border:2px solid white;"
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
						<a class="nav-link " href="dashboard.php">Dashboard</a>
					</li>




					<!-- profile all -->
					<a class="ms-5 d-none d-lg-block" href="profile.php"><img id="profile" src="../profile/<?=$profile['foto'];?>"
							alt="<?=$username?>" title="<?=$username?>"
							style="width:35px; height:35px; object-fit:cover;border-radius:50%;border:2px solid white;"></a>


					<!-- bagian dropdown -->
					<li class="nav-item fs-4 d-lg-none">
						<a class="nav-link" id="contact" href="contact.php">Contact</a>
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




	<!-- awal isi -->
	<div class="container mb-3" style="margin-top:100px;">

		<!-- awal judul -->
		<div class="col">
			<h3 id="judul">Profile</h3>
		</div>
		<div class="col mb-3">
			<a href="index.php">home</a> / <a href="index.php#container">shop</a> / <a href="profile.php"><?= $level; ?></a> /
			<a href="#" id="point">Edit</a>
		</div>
		<!-- akhir judul -->


		<div class="row mb-3">
			<label id="profile-text" for="foto" class="meImg">
				<i class="fas fa-camera" id="kamera"></i>
				<div class="meImg-bg"></div>
			</label>
		</div>


		<!-- foto profile -->
		<form action="" method="post" enctype="multipart/form-data">

			<input hidden class="form-control form-control-sm" id="foto" type="file" name="gambar"
				onchange="this.form.submit()">

			<input type="hidden" name="gambarLama" value="<?= $profile["foto"];?>">

			<input name="id" type="text" class="form-control" placeholder="-" hidden value="<?= $profile['id']; ?>">

			<input hidden type="text" name="berhasil">

		</form>


		<form action="" method="post" enctype="multipart/form-data">


			<input name="id" type="text" class="form-control" placeholder="-" hidden value="<?= $profile['id']; ?>">


			<table style="margin:0 auto;">
				<tr>
					<th>
						<label id="profile-text" for="username" class="text-center">User Name </label>
					</th>
					<td>:</td>
					<td>
						<input name="username" type="text" class="form-control" id="username" placeholder="-" name="username"
							maxlength="20" required value="<?= $username?>">
					</td>
				</tr>

				<tr>
					<th>
						<label id="profile-text" for="email" class="text-center">Email </label>
					</th>
					<td>:</td>
					<td>
						<input name="email" type="email" class="form-control" id="email" placeholder="-" name="email"
							maxlength="200" value=" <?= $profile['email']; ?>">
					</td>
				</tr>

				<tr>
					<th>
						<label id="profile-text" for="notelp" class="text-center">No Telp </label>
					</th>
					<td>:</td>
					<td>
						<input name="no_telp" type="text" class="form-control" id="notelp" placeholder="-" name="notelp"
							maxlength="13" value="<?= $profile['no_telp']; ?>">
					</td>
				</tr>



				<tr>
					<th>
						<label id="profile-text" for="gender" class="text-center">Gender </label>
					</th>
					<td>:</td>
					<td>



						<div class="form-check">
							<input name="gender" class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1"
								value="male" <?php if($profile['gender']=='male'){echo"checked";}; ?>>
							<label class="form-check-label" for="flexRadioDefault1">
								Male
							</label>
						</div>

						<div class="form-check">
							<input name="gender" class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2"
								value="female" <?php if($profile['gender']=='female'){echo"checked";}; ?>>
							<label class="form-check-label" for="flexRadioDefault2">
								Female
							</label>
						</div>

						<input hidden name="gender" class="form-check-input" type="radio" id="flexRadioDefault2" value="-"
							<?php if($profile['gender']=='-'){echo"checked";}; ?>>

					</td>
				</tr>


				<tr>
					<th>
						<label id="profile-text" for="lahir" class="text-center">Birthday </label>
					</th>
					<td>:</td>
					<td>
						<input type="date" class="form-control" placeholder="Date of Birth" name="lahir" data-provide="datepicker"
							value="<?= $profile['lahir'];?>">
					</td>
				</tr>


				<tr>
					<th>
						<label name="alamat" id="profile-text" for="alamat" class="text-center">Addess </label>
					</th>
					<td>:</td>
					<td>
						<input type="text" class="form-control" id="alamat" placeholder="-" name="alamat" maxlength="200"
							value="<?= $profile['alamat']; ?>">
					</td>
				</tr>




			</table>


			<div class="row text-center mb-5 mt-3">
				<div class="col">
					<button type="submit" class="btn btn-dark" name="submit" id="submit">Save</button>
					<button type="button" class="btn btn-danger" value="back" onclick="history.back();">Close</button>
				</div>
		</form>

	</div>
	<!-- akhir isi -->

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
	<script src="js/main.js">
	// ambil elemen2 yang dibutuhkan
	var keyword = document.getElementById('keyword');
	var container = document.getElementById('container');
	var loadMore = document.getElementById('loadMore');


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


	// button search
	var search = document.getElementById('cariin');
	var bar = document.getElementById('bar');
	var exit = document.getElementById('exit');

	search.addEventListener('click', function() {

		var bar = document.getElementById('bar');
		bar.setAttribute("style", "display:;");

	});

	exit.addEventListener('click', function() {

		var bar = document.getElementById('bar');
		bar.setAttribute("style", "display:none;");

	});
	</script>



	<!-- Optional JavaScript; choose one of the two! -->

	<!-- Option 1: Bootstrap Bundle with Popper -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
		integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
	</script>


	<!-- profile -->
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
	</script>

	<!-- Option 2: Separate Popper and Bootstrap JS -->
	<!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>