<?php 
require '../functions.php';

$keyword=$_GET["keyword"];

$query="SELECT * FROM produk
             WHERE
            nama_produk LIKE '%$keyword%' OR
            jenis_produk LIKE '%$keyword%' OR
            ukuran LIKE '%$keyword%' OR
            harga LIKE '%$keyword%' OR
            kode_produk LIKE '%$keyword%' OR
            keterangan LIKE '%$keyword%'
            ORDER BY id DESC
					";




$goturthings= query($query);



// mengaharhkan ke normal page
// if($keyword===''){
// header("Refresh:0; url=index.php");
// exit;
// }


?>


<!-- awal new arrivals -->
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
	<div class="container-fluid">
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