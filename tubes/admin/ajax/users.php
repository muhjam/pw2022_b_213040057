<?php 
require '../functions.php';

$keyword=$_GET["keyword"];

$query="SELECT * FROM users
             WHERE
            username LIKE '%$keyword%' OR
            level LIKE '%$keyword%' OR
            status LIKE '%$keyword%' OR
						foto LIKE '%$keyword%'
					";

$users= query($query);


// mengaharhkan ke normal page
// if($keyword===''){
// header("Refresh:0; url=index.php");
// exit;
// }


?> <table class="table" cellpadding="10" cellspacing="0">

	<thead class="table-dark">
		<tr style="text-align:center;">
			<th>No</th>
			<th>Picture</th>
			<th>Full Name</th>
			<th>Email</th>
			<th>No Telp</th>
			<th>Address</th>
		</tr>
	</thead>


	<!-- tidak ada -->
	<?php if(empty($users)):?>
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
		<?php foreach ($users as $user ) :?>
		<tbody>
			<tr style="text-align:center;">
				<td><?= $i; ?></td>

				<td><img src=" ../profile/<?= $user["foto"] ?>" style="width:100px; height:100px; object-fit:cover"
						alt="<?=$profile['username']?>"
 title="<?=$profile['username']?>
">
				</td>
				<td style="text-transform:capitalize;"><?= $user["username"]; ?></td>
				<td>
					<?php if($user['email']==''): ?>
					<?= "-"; ?>
					<?php endif; ?>
					<?php if($user['email']!=''): ?>
					<?= $user['email']; ?>
					<?php endif; ?></td>

				<td style="text-transform:capitalize;">
					<?php if($user['no_telp']==''): ?>
					<?= "-"; ?>
					<?php endif; ?>
					<?php if($user['no_telp']!=''): ?>
					<?= $user['no_telp']; ?>
					<?php endif; ?></td>

				<td style="text-transform:capitalize;">
					<?php if($user['alamat']==''): ?>
					<?= "-"; ?>
					<?php endif; ?>
					<?php if($user['alamat']!=''): ?>
					<?= $user['alamat']; ?>
					<?php endif; ?></td>
				<td>

			</tr>

		</tbody>
		<?php $i++; ?>
		<?php endforeach; ?>

</table>