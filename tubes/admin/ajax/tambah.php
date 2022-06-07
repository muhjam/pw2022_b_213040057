<?php 
require '../functions.php';

$jenis_produk=$_GET["jenisProduk"];

if($jenis_produk!=''){
$query="SELECT * FROM ukuran_jenis_produk
             WHERE
            jenis_produk LIKE '%$jenis_produk%'
					";
$ukuranProduk= query($query);
}


// mengaharhkan ke normal page
// if($keyword===''){
// header("Refresh:0; url=index.php");
// exit;
// }


?>





<label for="inputState">Ukuran :</label>
<select id="inputState" class="form-control" name="ukuran" required>
	<option value="">Pilih Ukuran</option>
	<?php foreach($ukuranProduk as $ukuran): ?>
	<option value="<?= $ukuran['ukuran'];?>"><?= $ukuran['ukuran']; ?></option>
	<?php endforeach; ?>
</select>