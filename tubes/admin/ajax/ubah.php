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

$id= $_GET["id"];
// query data mahasiswa berdasarkan id
$produk= query("SELECT * FROM produk WHERE id=$id")[0]; // supaya ga manggil 0 nya lagi

// mengaharhkan ke normal page
// if($keyword===''){
// header("Refresh:0; url=index.php");
// exit;
// }


?>





<label for="inputState">Ukuran :</label>
<select id="inputState" class="form-control" name="ukuran" required>
	<?php foreach($ukuranProduk as $ukuran): ?>
	<option value="<?= $ukuran['ukuran'];?>" <?php if($ukuran['ukuran']==$produk['ukuran']){
								echo"selected";
							} ?>><?= $ukuran['ukuran']; ?></option>
	<?php endforeach; ?>
</select>