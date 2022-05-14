<?php 
// memeriksa sudah login atau belum
session_start();

$level=$_SESSION['level'];

if(!isset($_SESSION["level"])){
header("location:../login.php");
exit;
}

if($_SESSION["level"]!='admin'){
	header("location:../index.php");
exit;
}



// koneksi database
require '../functions.php';


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
	.container-fluid .row .info {
		margin: 10px;
	}

	.container-fluid .row .info p {
		display: inline-block;
	}

	.container-fluid .row .logout {
		text-align: right;
		margin: 10px;
	}

	.container-fluid .row .logout a {
		color: silver;
		transition: 0.5s;
	}

	.container-fluid .row .logout a:hover {
		color: red;
		transition: 0.5s;
	}

	.container-fluid .row .logo {
		margin: 20px auto 40px auto;
	}
	</style>

	<!-- link my css -->
	<link rel="stylesheet" href="../css/style.css">

</head>

<body>



	<div class="container-fluid">
		<div class="row">
			<div class="info col-4">
				<p> <?=  $_SESSION['level']; ?> : </p>
				<p style="color:red;"><?= $_SESSION['username'];?></p>
			</div>
			<div class="logout col-6 ms-auto">
				<a href="../logout.php"><i class="fas fa-sign-out-alt">Logout</i></a>
			</div>
		</div>
		<div class="logo">
			<h1>Goturthinqs<span>.</span></h1>
			<h6 class="subtitle">tempat trifthingnya bandung</h6>
		</div>
		<nav class="navbar navbar-light">

			<div class="container-fluid">
				<form action="" method="post" class="d-flex">
					<input class="form-control me-2" type="text" placeholder="Cari Produk Goturthings" aria-label="Search"
						name="keyword" autofocus autocomplete="off" id="keyword">
				</form>


				<section>
					<a href="../Goturprint.php" target="_blank"><i class="fas fa-print"> Print</i></a> <a
						style="margin:0 5px;">|</a>
					<a href="tambah.php"><i class="fas fa-cart-plus">
							Tambah</i></a>
				</section>

			</div>
		</nav>

		<div id="container">
			<table class="table" cellpadding="10" cellspacing="0">

				<thead class="table-dark">
					<tr style="text-align:center;">
						<th>No</th>
						<th>Gambar</th>
						<th>Nama Produk</th>
						<th>Jenis Produk</th>
						<th>Ukuran</th>
						<th>Harga</th>
						<th>Aksi</th>

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


								<a href="ubah.php?id=<?= $goturthing["id"] ?>" class="btn badge bg-warning">ubah</a>

								<a href="hapus.php?id=<?= $goturthing["id"] ?>"
									onclick="return confirm('Anda yakin akan menghapus data ini?')"
									class="btn badge bg-danger mt-2">hapus</a>



								<a href="../detail.php?id=<?= $goturthing["id"]?>&kode_produk=<?= $goturthing["kode_produk"]?>&gambar=<?= $goturthing["gambar"]?>&nama_produk=<?= $goturthing["nama_produk"] ?>&keterangan=<?= $goturthing["keterangan"]?>"
									class="btn badge bg-info mt-2">detail</a>
							</td>

						</tr>

					</tbody>
					<?php $i++; ?>
					<?php endforeach; ?>

			</table>
		</div>

		<!-- Pagination -->
		<div id="page">
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

	<!-- footer -->

	<div id="footer" style="margin-top:50px;">

		<div class="row ms-3">
			<div class="col-md-12">
				<p><i class="far fa-copyright"></i> 2022 Muhamad Jamaludin. Created With Love. <br> All Picture From: <a
						href="https://www.instagram.com/goturthings/" target="_blank"
						style="text-decoration:none;	color: #151e3d;">GoturthiQs</a><span style="color:red;">.</span></p>
			</div>

		</div>
	</div>




	<script>
	// ambil elemen2 yang dibutuhkan
	var keyword = document.getElementById('keyword');
	var container = document.getElementById('container');
	var page = document.getElementById('page');



	// tambahkan event ketika keyboard ditulis
	keyword.addEventListener('keyup', function() {

		var page = document.getElementById('page');
		page.setAttribute("style", "display:none;");

		// buat object ajax
		var xhr = new XMLHttpRequest();

		// cek kesiapan ajax
		xhr.onreadystatechange = function() {
			if (xhr.readyState == 4 && xhr.status == 200) {
				container.innerHTML = xhr.responseText;
			}
		}

		// eksekusi ajax
		xhr.open('GET', '../ajax/produk.php?keyword=' + keyword.value, true);
		xhr.send();

		// memunculkan page atau refresh halaman
		if (keyword.value === '') {
			location.reload();
		}


	});
	</script>

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