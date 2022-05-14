<?php 
// memeriksa sudah login atau belum
session_start();

$level=$_SESSION['level'];

if(!isset($_SESSION["level"])){
header("location:../login.php");
exit;
}

if($_SESSION["level"]!='user'){
	header("location:../$level/index.php");
exit;
}

// koneksi database
require 'php/send-email.php';
?>


<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<link href="https://fonts.googleapis.com/css?family=Oswald:300,400|Roboto+Mono&display=swap" rel="stylesheet" />

	<link rel="stylesheet" href="fonts/icomoon/style.css" />

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css" />

	<!-- Style -->
	<link rel="stylesheet" href="css/style.css" />

	<!-- icon -->
	<link rel="icon" href="../icon/icon.png" />

	<title>GoturContact.</title>
</head>

<body>
	<div class="content">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-8">
					<div class="row mb-5">
						<div class="col-md-4 mr-auto">
							<h3 class="thin-heading mb-4">Bandung</h3>
							<p>Jl. Ambon No.09, Citarum, Kec. Bandung Weta, Kota Bandung, Jawa Barat 40115</p>
						</div>
						<div class="col-md-6 ml-auto">
							<h3 class="thin-heading mb-4">Contact Info</h3>
							<p>
								T: +62 812 5757 8571 <br /> E: muhhjam@gmail.com
							</p>
						</div>
					</div>

					<div class="row justify-content-center">
						<div class="col-md-12">
							<h3 class="thin-heading mb-4">Message Us</h3>

							<form class="mb-5" method="post" id="contactForm" name="contactForm">
								<div class="row">
									<div class="col-md-6 form-group">
										<input type="text" class="form-control" name="name" id="name" placeholder="Your name" />
									</div>
									<div class="col-md-6 form-group">
										<input type="text" class="form-control" name="email" id="email" placeholder="Email" />
									</div>
								</div>
								<div class="row">
									<div class="col-md-12 form-group">
										<textarea class="form-control" name="message" id="message" cols="30" rows="2"
											placeholder="Write your message"></textarea>
									</div>
								</div>
								<div class="row">
									<div class="col-8">
										<input type="submit" value="Send Message" class="btn btn-primary rounded-0 py-2 px-4" />
										<span class="submitting"></span>
									</div>
									<div class="col-4 ml-auto mt-3">
										<a href="../index.php" class="text-danger px-4">Cancel </a>
									</div>
								</div>
							</form>

							<div id="form-message-warning mt-4"></div>
							<div id="form-message-success">
								Your message was sent, thank you! <br>
								<a href="../index.php">back</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script src="js/jquery-3.3.1.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.validate.min.js"></script>
	<script src="js/main.js"></script>
</body>

</html>