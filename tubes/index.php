<?php 
require 'functions.php';


$goturthings = query("SELECT * FROM jenis_produk INNER JOIN produk ON jenis_produk.jenis_produk=produk.jenis_produk INNER JOIN ukuran ON ukuran.ukuran = produk.ukuran");


// tombol cari
if(isset($_POST["cari"])){
$goturthings = cari($_POST["keyword"]);

}



 ?>





<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Font-Awessome -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">


<!-- Google Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Libre+Bodoni:wght@500&family=Montserrat:wght@300;400;500;600&family=Open+Sans:wght@600&display=swap" rel="stylesheet">
    <title>Goturthings</title>

<style>
* {
	margin: 0;
	padding: 0;
	box-sizing: border-box;
}

html {
	scroll-behavior: smooth;
}


/* Judul */


.container .logo {
	margin: 30px 0 40px 0;
}



.container .logo h1 {
	margin-bottom: -5px;
	text-align: center;
	font-weight: 400;
	font-family: 'Libre Bodoni',
		sans-serif;
	text-transform: uppercase;
}

.container .logo h1 span{
	color: red;
}

.container .logo .subtitle{
	color:rgba(0, 0, 0, 0.692);
	text-align: center;
	font-weight: 500;
font-family: 'Montserrat',
sans-serif;
	text-transform: uppercase;
}


.container .navbar .container .fas.fa-cart-plus {
		color: #2d3655;
}

.container .navbar .container .fas.fa-cart-plus:hover {
	color: #151e3d;
}

@media (max-width:550px) {
	.container .logo {
		margin: 10px 0;
	}

	.container .logo h1 {

		margin-left: 10px;
		margin-bottom: 5px;
		text-align: left;
	}

	.container .logo h6{
		display: none;

	}


}

</style>

  </head>
  <body>




    
    
    <div class="container">
      <div class="logo">
        <h1>Goturthings<span>.</span></h1>
        <h6 class="subtitle">tempat trifthing serba ada</h6>
      </div>
      <nav class="navbar navbar-light">
        <div class="container">
          <form action="" method="post" class="d-flex">
            <input class="form-control me-2" type="text" placeholder="Cari Produk Goturthings" aria-label="Search" name="keyword" autofocus autocomplete="off">
            <button class="btn btn-outline-dark" type="submit" name="cari">Cari</button>
          </form>
      
                <a href="tambah.php"><i class="fas fa-cart-plus" style="text-align:center;"> Tambah</i></a>
        </div>
      </nav>
      <table class="table">
        
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
			<td><?= $goturthing["jenis_produk"]; ?></td>
			<td><?= $goturthing["ukuran"]; ?></td>
			<td><?= $goturthing["harga"]; ?></td>


			<td> 
				<a href="ubah.php?id=<?= $goturthing["id"] ?>" class="btn badge bg-warning">ubah</a>

				<a href="hapus.php?id=<?= $goturthing["id"] ?>" onclick="return confirm('Anda yakin akan menghapus data ini?')" class="btn badge bg-danger">hapus</a>
				
        <a href="detail.php?id=<?= $goturthing["id"]?>&kode_produk=<?= $goturthing["kode_produk"]?>&gambar=<?= $goturthing["gambar"]?>&nama_produk=<?= $goturthing["nama_produk"] ?>&keterangan=<?= $goturthing["keterangan"]?>" class="btn badge bg-info">detail</a>
	</td>
                       
		</tr>

  </tbody>
	<?php $i++; ?>
<?php endforeach; ?>

</table>



</div>
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