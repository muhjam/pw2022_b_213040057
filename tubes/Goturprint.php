<?php

require_once __DIR__ . '/vendor/autoload.php';

// koneksi database
require 'functions.php';
$goturthings=query("SELECT * FROM produk");

$mpdf = new \Mpdf\Mpdf();


$html='<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
	<!-- icon -->
	<link rel="icon" href="icon/icon.png">

		<link rel="icon" href="icon/icon.png">
	<!-- Google Fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link
		href="https://fonts.googleapis.com/css2?family=Libre+Bodoni:wght@500&family=Montserrat:wght@300;400;500;600&family=Open+Sans:wght@600&display=swap"
		rel="stylesheet">
    <title>GoturthinQs.</title>


</head>
<body>
   		<div class="logo">
			<h1 style="text-align: center;font-family: "Libre Bodoni", sans-serif;color: #151e3d;">GOTURTHINQS<span style=" color: red;font-size: 50px;">.</span></h1>

			<div class="container" style="font-family:sans-serif;">

<table  border="1" cellpadding="10" cellspacing="0">
				<thead>
					<tr style="background-color:black;">
						<th style="color:white;">No</th>
						<th style="color:white;">Gambar</th>
						<th style="color:white;">Kode Produk</th>
						<th style="color:white;">Nama Produk</th>
						<th style="color:white;">Jenis Produk</th>
						<th style="color:white;">Ukuran</th>
						<th style="color:white;">Harga</th>
						<th style="color:white;">Keterangan</th>
					</tr>
				</thead>
			';

				$i=1;
foreach($goturthings as $goturthing){
	$html.='<tbody>
	<tr>
	<td>'.$i++.'</td>
	<td><img src="img/'.$goturthing["gambar"].'" style="width:100px; height:100px; object-fit:cover"/></td>
	<td>'.$goturthing["kode_produk"].'</td>
	<td>'.$goturthing["nama_produk"].'</td>
	<td>'.$goturthing["jenis_produk"].'</td>
	<td>'.$goturthing["ukuran"].'</td>
	<td>Rp.'.$goturthing["harga"].'</td>
	<td>'.$goturthing["keterangan"].'</td>
	</tr>

</tbody>

	';
}

 $html.= '
					</table>
					</div>
					</body>
					</html>';


$mpdf->WriteHTML($html);
$mpdf->Output('daftar-produk-goturthings.pdf', 'I');

?>