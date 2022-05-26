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


?>
	<table class="table" cellpadding="10" cellspacing="0">

				<thead class="table-dark">
					<tr style="text-align:center;">
						<th>No</th>
						<th>Picture</th>
						<th>User Name</th>
						<th>Level</th>
						<th>Change</th>
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

							<td><img src=" ../profile/<?= $user["foto"] ?>" style="width:100px; height:100px; object-fit:cover">
							</td>
							<td><?= $user["username"]; ?></td>
							<td><?= $user["level"]; ?></td>
							<td>
	


						<?php if($user['level']=='admin'): ?>
						<?php echo"-"; ?>
						<?php endif; ?>



						<?php if($user['level']!='admin'): ?>
								<a href="level-ubah.php?id=<?= $user["id"] ?>"
									onclick="return confirm('Anda yakin akan menjadikan admin akun ini?')"
									class="btn badge bg-primary mt-2">admin</a>


							<?php if($user['status']=='no'): ?>

									<a href="level-ban.php?id=<?= $user["id"] ?>&status=ban ?>"
									onclick="return confirm('Anda yakin akan ban akun ini?')"
									class="btn badge bg-danger mt-2">ban</a>
							<?php endif; ?>

								<?php if($user['status']=='ban'): ?>

								<a href="level-heal.php?id=<?= $user["id"] ?>&status=no ?>"
									onclick="return confirm('Anda yakin akan memulihkan akun ini?')"
									class="btn badge bg-success mt-2">heal</a>
							<?php endif; ?>
								

						<?php endif; ?>

							</td>

						</tr>

					</tbody>
					<?php $i++; ?>
					<?php endforeach; ?>

			</table>