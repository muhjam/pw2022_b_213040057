<?php 
require 'functions.php';

$goturthings = query("SELECT * FROM jenis_produk INNER JOIN produk ON jenis_produk.kode_jenis=produk.kode_jenis INNER JOIN ukuran ON ukuran.kode_ukuran = produk.kode_ukuran");
 ?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Goturthings</title>
  </head>
  <body>

<h1>GOTURTHINGS</h1>

  <table class="table container">
  <thead class="table-dark">
    <tr>
			<td>No</td>
			<td>Gambar</td>
			<td>Nama Produk</td>
			<td>Jenis Produk</td>
			<td>Ukuran</td>
			<td>Harga</td>
			<td>Aksi</td>

		</tr>
  </thead>

<?php $i=1; ?>


	<?php foreach ($goturthings as $goturthing ) :?>
  <tbody>
    <tr>
			<td><?= $i; ?></td>
			<td><img src=" img/<?= $goturthing["gambar"] ?>" style="width:100px; height:100px; object-fit:cover"></td>
			<td><?= $goturthing["nama_produk"]; ?></td>
			<td><?= $goturthing["nama_jenis"]; ?></td>
			<td><?= $goturthing["ukuran"]; ?></td>
			<td><?= $goturthing["harga"]; ?></td>
			<td> 
				<a href="" class="btn badge bg-warning">edit</a> 
				<a href="delete.php?kode_produk=<?= $goturthing["kode_produk"] ?>" onclick="return confirm('Anda yakin akan menghapus data ini?')" class="btn badge bg-danger">delete</a>
        <a href="detail.php?gambar=<?= $goturthing["gambar"]?>&nama_produk=<?= $goturthing["nama_produk"] ?>&keterangan=<?= $goturthing["keterangan"]?>" class="btn badge bg-info">detail</a>
			</td>
                       
		</tr>

  </tbody>
	<?php $i++; ?>
<?php endforeach; ?>


</table>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>