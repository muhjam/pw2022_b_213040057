<?php 
require '../functions.php';

// konfigurasi
$jumlahDataPerHalaman=5;
$jumlahData= count(query("SELECT * FROM produk"));
$jumlahHalaman= ceil($jumlahData / $jumlahDataPerHalaman);
$halamanAktif=(isset($_GET["page"])) ? $_GET["page"] : 1;
$awalData=($jumlahDataPerHalaman * $halamanAktif)-$jumlahDataPerHalaman;

$goturthings = query("SELECT * FROM jenis_produk INNER JOIN produk ON jenis_produk.jenis_produk=produk.jenis_produk INNER JOIN ukuran ON ukuran.ukuran = produk.ukuran ORDER BY produk.id DESC LIMIT $awalData,$jumlahDataPerHalaman");



// mengaharhkan ke normal page
// if($keyword===''){
// header("Refresh:0; url=index.php");
// exit;
// }


?>

<table class="table" cellpadding="10" cellspacing="0">

	<thead class="table-dark">
		<tr style="text-align:center;">
			<th>No <span class="d-none d-lg-inline">
					<?php if(!isset($_GET['urut-terbaru'])):?>
					<a href="?urut-terbaru=ASC&page=<?=$halamanAktif?>" style="text-decoration:none;">&#8593;</a>
					<?php elseif($_GET['urut-terbaru']=='ASC'):?>
					<a href="?urut-terbaru=DESC&page=<?=$halamanAktif?>" style="text-decoration:none;">&#8595;</a>
					<?php elseif($_GET['urut-terbaru']=='DESC'):?>
					<a href="?urut-terbaru=ASC&page=<?=$halamanAktif?>" style="text-decoration:none;">&#8593;</a>
					<?php endif;?>
				</span>
			</th>
			<th>Image</th>
			<th>Name <span class="d-none d-lg-inline">
					<?php if(!isset($_GET['urut-nama'])):?>
					<a href="?urut-nama=DESC&page=<?=$halamanAktif?>" style="text-decoration:none;">&#8593;</a>
					<?php elseif($_GET['urut-nama']=='DESC'):?>
					<a href="?urut-nama=ASC&page=<?=$halamanAktif?>" style="text-decoration:none;">&#8595;</a>
					<?php elseif($_GET['urut-nama']=='ASC'):?>
					<a href="?urut-nama=DESC&page=<?=$halamanAktif?>" style="text-decoration:none;">&#8593;</a>
					<?php endif;?>
				</span>
			</th>
			<th>Type <span class="d-none d-lg-inline">
					<?php if(!isset($_GET['urut-jenis'])):?>
					<a href="?urut-jenis=DESC&page=<?=$halamanAktif?>" style="text-decoration:none;">&#8593;</a>
					<?php elseif($_GET['urut-jenis']=='DESC'):?>
					<a href="?urut-jenis=ASC&page=<?=$halamanAktif?>" style="text-decoration:none;">&#8595;</a>
					<?php elseif($_GET['urut-jenis']=='ASC'):?>
					<a href="?urut-jenis=DESC&page=<?=$halamanAktif?>" style="text-decoration:none;">&#8593;</a>
					<?php endif;?>
				</span>
			</th>
			<th>Size <span class="d-none d-lg-inline">
					<?php if(!isset($_GET['urut-ukuran'])):?>
					<a href="?urut-ukuran=DESC&page=<?=$halamanAktif?>" style="text-decoration:none;">&#8593;</a>
					<?php elseif($_GET['urut-ukuran']=='DESC'):?>
					<a href="?urut-ukuran=ASC&page=<?=$halamanAktif?>" style="text-decoration:none;">&#8595;</a>
					<?php elseif($_GET['urut-ukuran']=='ASC'):?>
					<a href="?urut-ukuran=DESC&page=<?=$halamanAktif?>" style="text-decoration:none;">&#8593;</a>
					<?php endif;?>
				</span>
			</th>
			<th>Price <span class="d-none d-lg-inline">
					<?php if(!isset($_GET['urut-harga'])):?>
					<a href="?urut-harga=DESC&page=<?=$halamanAktif?>" style="text-decoration:none;">&#8593;</a>
					<?php elseif($_GET['urut-harga']=='DESC'):?>
					<a href="?urut-harga=ASC&page=<?=$halamanAktif?>" style="text-decoration:none;">&#8595;</a>
					<?php elseif($_GET['urut-harga']=='ASC'):?>
					<a href="?urut-harga=DESC&page=<?=$halamanAktif?>" style="text-decoration:none;">&#8593;</a>
					<?php endif;?></span>
			</th>
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
		<?php if(!isset($_GET['page'])): ?>
		<?php $i; ?>
		<?php elseif(isset($_GET['page'])): ?>

		<?php $a=$_GET['page']; ?>
		<?php $i=5*$a-4; ?>
		<?php endif; ?>

		<?php foreach ($goturthings as $goturthing ) :?>
		<tbody>
			<tr style="text-align:center;">

				<td><?= $i; ?></td>

				<td><img src="../img/<?= $goturthing["gambar"] ?>" style="width:100px; height:100px; object-fit:cover">
				</td>
				<td><?= $goturthing["nama_produk"]; ?></td>
				<td><?= $goturthing["jenis_produk"]; ?></td>
				<td><?= $goturthing["ukuran"]; ?></td>
				<td><?= rupiah($goturthing["harga"]); ?></td>
				<td>


					<a href="ubah.php?id=<?= $goturthing["id"] ?>" class="btn badge bg-warning">Change</a>

					<a href="hapus.php?id=<?= $goturthing["id"] ?>"
						onclick="return confirm('Anda yakin akan menghapus data ini?')" class="btn badge bg-danger mt-2">Delete</a>



					<a href="detail.php?id=<?= $goturthing["id"]?>" class="btn badge bg-info mt-2">Detail</a>
				</td>

			</tr>

		</tbody>
		<?php $i++; ?>
		<?php endforeach; ?>

</table>