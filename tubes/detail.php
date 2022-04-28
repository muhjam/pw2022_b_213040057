<?php 
// memeriksa sudah login atau belum
session_start();

if(!isset($_SESSION["login"])){
header("location:login.php");
exit;
}

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
	<link rel="icon" href="icon/icon.png">
	<!-- Google Fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link
		href="https://fonts.googleapis.com/css2?family=Libre+Bodoni:wght@500&family=Montserrat:wght@300;400;500;600&family=Open+Sans:wght@600&display=swap"
		rel="stylesheet">

	<title>GoturDetail.</title>

	<!-- link my css -->
	<link rel="stylesheet" href="css/style.css">


</head>

<body>
	<h1 class="h1">GoturDetail<span>.</span></h1>
	<h6 class="subtitle2">Detail dari barang keren</h6>
	<div class="container">
		<div class="card" style="max-width: 3000px;">
			<div class="row g-0">
				<div class="col-md-4">
					<img id="myImg" src="img/<?= $_GET["gambar"] ?>" class="img-fluid rounded-start" style="object-fit:cover;">
					<!-- The Modal -->
					<div id="myModal" class="modal">
						<img class="modal-content" id="img01">
					</div>
				</div>
				<div class="col-md-8 ">
					<div class="card-body">
						<h5 class="card-title"><?= $_GET["nama_produk"]; ?></h5>
						<h6 class="card-subtitle mb-2 text-muted">Kode : <?= $_GET["kode_produk"]; ?></h6>
						<p class="card-text"><?= $_GET["keterangan"]; ?></p>

						<a href="index.php" style="text-decoration:none; color:#ffff;" class="ms-auto"><button type="button"
								class="btn btn-outline-dark">Kembali</button></a>
					</div>
				</div>
			</div>
		</div>

	</div>

	<div id="map" class="fh5co-map">
		<iframe
			src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2601141.170198934!2d106.61469224054412!3d-7.046159555026572!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e43e8ebf7617%3A0x501e8f1fc2974e0!2sCimahi%2C%20Kec.%20Cimahi%20Tengah%2C%20Kota%20Cimahi%2C%20Jawa%20Barat!5e0!3m2!1sid!2sid!4v1643875888332!5m2!1sid!2sid"
			width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
	</div>
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