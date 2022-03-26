<?php
// SUPERGLOBALS	
// Variavel bawaan PHP yang bisa diakses di mana pun
// Bentuknya Array Associative
// $_GET
// $_POST
// $_SEREVER
// $_GET = ["nama"=>"jamjam"]; //cara ini bisa cuma kurang tepat

// $_GET = ["nama"=>"jamjam", "email"=>"jamjam@gmail.com"]; // ini tepat

// //ini tepat juga
// $_GET["nama"]="Jamjam"; 
// $_GET["email"]="Jamjam@gmail.com";
//  $_GET["nama"]="udin"; //ini bakal ketimpa namanya 

// var_dump ($_GET);
?>

<!-- http://localhost/pw2022_b_213040057/kuliah/pertemuan7/kuliah_latihan1.php?nama=jamjam&email=jamjam@gmail.com -->
<!-- <h1>Halo, <?= $_GET["nama"]; ?></h1> -->

<ul>
	<li><a href="kuliah_latihan2.php?nama=Jamjam&npm=213040058&email=jamjam@gmail.com">Jamjam</a></a></li>
	<li><a href="kuliah_latihan2.php?nama=Rivan&npm=213040045&email=rivan@gmail.com">Rivan</a></li>
	<li><a href="kuliah_latihan2.php?nama=Muhamad Jamaludin&npm=213040057&email=muhhjam@gmail.com">Muhamad Jamaludin</a></li>
</ul>

<!-- selesai -->

