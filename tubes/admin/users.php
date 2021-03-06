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








// pagination
// konfigurasi
$jumlahDataPerHalaman=5;
$jumlahData= count(query("SELECT * FROM users"));
$jumlahHalaman= ceil($jumlahData / $jumlahDataPerHalaman);
$halamanAktif=(isset($_GET["page"])) ? $_GET["page"] : 1;
$awalData=($jumlahDataPerHalaman * $halamanAktif)-$jumlahDataPerHalaman;

$users = query("SELECT * FROM users LIMIT $awalData,$jumlahDataPerHalaman");



$jenisProduk=query("SELECT * FROM jenis_produk");


// profile
$profile=query("SELECT * FROM users WHERE email='$email'")[0];




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
	<link rel="stylesheet" href="../css/style.css">

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

			<a href="#container" id="cariin" class="btn btn-dark d-lg-none ms-auto" style="display:block;"><i
					class="fas fa-search" style="color:white;"></i></a>


			<form id="bar" action="" method="post" class="d-lg-block"
				style="<?php if(isset($_GET['mencari'])){echo"display:;";}else{echo"display:none;";}?>">
				<input class="form-control formm me-lg-2" type="text" placeholder="Cari Produk Goturthings" aria-label="Search"
					name="keyword" autofocus autocomplete="off" id="keyword">

				<input class="form-control formm me-lg-2" type="hidden" hidden aria-label="Search" value="<?
				if(!isset($_GET['page'])){
					echo'1';
				}else{
					echo $page;
				}
				?>" name="halaman" autofocus autocomplete="off" id="halaman">

				<a id="exit" class="btn btn-dark ms-auto d-lg-none"><i class="far fa-window-close"></i></a>
			</form>

			<div class="collapse navbar-collapse show" id="navbarScroll" style="animation:slideup ease forwards;">


				<label for="keyword" class="btn btn-dark d-none d-lg-block" id="search"> <a href="#container"><i
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



	<div class="container" style="margin-top:100px;">
		<!-- awal judul -->
		<div class="col">
			<h3 id="judul">Dashboard</h3>
		</div>
		<div class="col mb-3">
			<a href="index.php">home</a> / <a href="index.php#container">shop</a> / <a href="dashboard.php">Dashboard</a> /
			<a href="#" class="fw-bold" id="point">Users</a>
		</div>
		<!-- akhir judul -->
	</div>




	<div class="container-fluid">


		<div id="container">
			<table class="table" cellpadding="10" cellspacing="0">

				<thead class="table-dark">
					<tr style="text-align:center;">
						<th>No</th>
						<th>Picture</th>
						<th>Full Name</th>
						<th>Email</th>
						<th>No Telp</th>
						<th>Address</th>
					</tr>
				</thead>


				<!-- tidak ada -->
				<?php if(empty($users)):?>
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
					<?php if(!isset($_GET['page'])): ?>
					<?php $i; ?>
					<?php elseif(isset($_GET['page'])): ?>

					<?php $a=$_GET['page']; ?>
					<?php $i=5*$a-4; ?>
					<?php endif; ?>
					<?php foreach ($users as $user ) :?>
					<tbody>
						<tr style="text-align:center;">
							<td><?= $i; ?></td>

							<td><img src=" ../profile/<?= $user["foto"] ?>" style="width:100px; height:100px; object-fit:cover"
									alt="<?=$profile['username']?>" title="<?=$profile['username']?>
">
							</td>
							<td style="text-transform:capitalize;"><?= $user["username"]; ?></td>
							<td>
								<?php if($user['email']==''): ?>
								<?= "-"; ?>
								<?php endif; ?>
								<?php if($user['email']!=''): ?>
								<?= $user['email']; ?>
								<?php endif; ?></td>

							<td>
								<?php if($user['no_telp']==''): ?>
								<?= "-"; ?>
								<?php endif; ?>
								<?php if($user['no_telp']!=''): ?>
								<?= $user['no_telp']; ?>
								<?php endif; ?></td>

							<td style="text-transform:capitalize;">
								<?php if($user['alamat']==''): ?>
								<?= "-"; ?>
								<?php endif; ?>
								<?php if($user['alamat']!=''): ?>
								<?= $user['alamat']; ?>
								<?php endif; ?></td>
							<td>

						</tr>

					</tbody>
					<?php $i++; ?>
					<?php endforeach; ?>

			</table>
		</div>

		<!-- Pagenation -->
		<nav aria-label="Page navigation example" id="page" class="mb-5 mt-5">
			<ul class="pagination justify-content-center me-3">
				<li class="page-item">
					<?php if($halamanAktif>1): ?>
					<a class="page-link" href="?page=<?= $halamanAktif - 1; ?>" aria-label="Previous" style="color:black;">
						<span aria-hidden="true">&laquo;</span>
					</a>
					<?php endif; ?>
				</li>
				<?php for($i=1;$i<=$jumlahHalaman;$i++) : ?>

				<?php if($i == $halamanAktif): ?>
				<li class="page-item active"><a style="background-color:#2d2d2d;border:1px solid white;" class="page-link"
						href="?page=<?= $i; ?>"><?= $i; ?></a></li>
				<?php else: ?>
				<li class="page-item"><a class="page-link" href="?page=<?= $i; ?>" style="color:black;"><?= $i; ?></a></li>
				<?php endif; ?>

				<?php endfor; ?>

				<li class="page-item">
					<?php if($halamanAktif<$jumlahHalaman): ?>
					<a class="page-link" href="?page=<?= $halamanAktif + 1; ?>" aria-label="Next" style="color:black;">
						<span aria-hidden="true">&raquo;</span>
					</a>
					<?php endif; ?>
				</li>
			</ul>
		</nav>

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
	var halaman = document.getElementById("halaman");

	// function ajax dengan baik
	function doStuff() {
		// buat object ajax
		var xhr = new XMLHttpRequest();
		page.classList.remove("d-none");

		// cek kesiapan ajax
		xhr.onreadystatechange = function() {
			if (xhr.readyState == 4 && xhr.status == 200) {
				container.innerHTML = xhr.responseText;
			}
		};

		// eksekusi ajax
		xhr.open("GET", "ajax/usersNormal.php?page=" + halaman.value, true);
		xhr.send();
	}

	// tambahkan event ketika keyboard ditulis
	keyword.addEventListener("keyup", function() {
		// buat object ajax
		var xhr = new XMLHttpRequest();
		page.classList.add("d-none");

		// cek kesiapan ajax
		xhr.onreadystatechange = function() {
			if (xhr.readyState == 4 && xhr.status == 200) {
				container.innerHTML = xhr.responseText;
			}
		};
		// memunculkan page atau refresh halaman
		if (keyword.value === "") {
			doStuff();
		} else {
			// eksekusi ajax
			xhr.open("GET", "ajax/users.php?keyword=" + keyword.value, true);
			xhr.send();
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