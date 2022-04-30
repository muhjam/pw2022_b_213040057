<?php 
// memeriksa sudah login atau belum
session_start();

if(isset($_SESSION["login"])){
header("location:index.php");
exit;
}

// koneksi database
require 'functions.php';



if(isset($_POST["confrim"])){
	if(confrim($_POST)>0){

	} else {
 echo mysqli_error($conn);
}
}




			if(isset($_POST["change"])){
 			if(changepw($_POST)>0){
        echo "
   			<script>
        alert('Password telah diubah!')
			  document.location.href='login.php'
        </script>";
    		}else {
      	echo mysqli_error($conn);
   		 }
			}
 ?>
<!DOCTYPE html>
<html>

<head>
	<!--icon  -->
	<link rel="icon" href="icon/icon.png">

	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

	<!-- Google Fonts -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link
		href="https://fonts.googleapis.com/css2?family=Libre+Bodoni:wght@500&family=Montserrat:wght@300;400;500;600&family=Open+Sans:wght@600&display=swap"
		rel="stylesheet">
	<title>GoturPassword.</title>
</head>
<!-- link my css -->
<link rel="stylesheet" href="css/login.css">


</head>



<body>

	<div class="container">
		<div class="logo">
			<h1>GoturChangePW<span>.</span></h1>
			<h6 class="subtitle" id="subtitle1" style="display:;">Cari username anda disini</h6>
				<h6 class="subtitle" id="subtitle2" style="display:none;">Buat password baru disini</h6>
		</div>

		<div class="content">
			<form action="" method="post" class="px-4 py-3" id="us" style="display:;">
				<!-- mencari user -->

				<div class="mb-3">
					<label for="exampleDropdownFormEmail1" class="form-label">Username</label>
					<input type="text" name="username" class="form-control" id="exampleDropdownFormEm" placeholder="Cari Username"
						required>
				</div>
				<button type="submit" class="btn btn-outline-danger	" name="confrim" id="btn">Confrim</button>
	
			</form>


			<form action="" method="post" class="px-4 py-3" style="display:none;" id="pw">

				<!-- mengubah password -->
				<?php if (isset($error)) : ?>
				<p>Konfirmasi password tidak sesuai</p>
				<?php endif; ?>
							<input type="hidden" name="username" class="form-control" id="exampleDropdownFormPassword1"
							placeholder="Masukan Password Baru" value="<?=$_GET['username']; ?>">
				<div class="mb-3">
						<label for="exampleDropdownFormPassword1" class="form-label">New Password</label>
						<input type="password" name="password" class="form-control" id="exampleDropdownFormPassword1"
							placeholder="Masukan Password Baru" required>
					</div>
					<div class="mb-3">
						<label for="exampleDropdownFormPassword1" class="form-label">Konfirmasi Password</label>
						<input type="password" name="password2" class="form-control" id="exampleDropdownFormPassword1"
							placeholder="Konfirmasi Password" required>
					</div>
					<button type="submit" class="btn btn-outline-danger	" name="change">Change</button>

</form>

			<div class="dropdown-divider"></div>

			<a class="dropdown-item" href="login.php">Are you got account? Lets Login</a>
		</div>
	</div>



	<!-- FORM -->
<?php $username=$_GET['username'];

// Cek username sudah ada atau belum
    $result=mysqli_query($conn,"SELECT username FROM users WHERE username='$username'");
		if(mysqli_num_rows($result)>0){
echo"<script>
		var us = document.getElementById('us');
		var pw = document.getElementById('pw');
	 
		pw.setAttribute('style', 'display:;');
		us.setAttribute('style', 'display:none;');
		subtitle2.setAttribute('style', 'display:;');
		subtitle1.setAttribute('style', 'display:none;');
		
	</script>";
			
		} ?>
</body>

</html>
