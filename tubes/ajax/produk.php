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

<table class="table">

	<thead class="table-dark">
		<tr>
			<th>No</th>
			<th>Gambar</th>
			<th>Nama Produk</th>
			<th>Jenis Produk</th>
			<th>Ukuran</th>
			<th>Harga</th>
			<th>Aksi</th>

		</tr>
	</thead>

	<!-- menampilkan tidak ada data -->
	<?php if(!$goturthings): ?>
	<thead>
		<tr>
			<td colspan="7">
				<h1 style="color:#a9a9a9;font-family: 'Open Sans', sans-serif;margin-top:120px;text-align:center;height:200px;">
					Tidak Ada
					Data</h1>
			</td>
	</thead>
	<?php endif; ?>

	<!-- isi tabel -->

	<?php $i=1; ?>
	<?php foreach ($goturthings as $goturthing ) :?>
	<tbody>
		<tr>
			<td><?= $i; ?></td>
			<td><img src="img/<?= $goturthing["gambar"] ?>" style="width:100px; height:100px; object-fit:cover"></td>
			<td><?= $goturthing["nama_produk"]; ?></td>
			<td><?= $goturthing["jenis_produk"]; ?></td>
			<td><?= $goturthing["ukuran"]; ?></td>
			<td>Rp.<?= $goturthing["harga"]; ?></td>
			<td>
				<a href="ubah.php?id=<?= $goturthing["id"] ?>" class="btn badge bg-warning">ubah</a>

				<a href="hapus.php?id=<?= $goturthing["id"] ?>" onclick="return confirm('Anda yakin akan menghapus data ini?')"
					class="btn badge bg-danger mt-2">hapus</a>

				<a href="detail.php?id=<?= $goturthing["id"]?>&kode_produk=<?= $goturthing["kode_produk"]?>&gambar=<?= $goturthing["gambar"]?>&nama_produk=<?= $goturthing["nama_produk"] ?>&keterangan=<?= $goturthing["keterangan"]?>"
					class="btn badge bg-info mt-2">detail</a>
			</td>

		</tr>

	</tbody>
	<?php $i++; ?>
	<?php endforeach; ?>

</table>