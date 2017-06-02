
 <?php
  session_start();


  include "online/koneksi.php";

  if (!isset($_SESSION['userid'])) {
    header("location:block.php");

  }
//cek level user
  if ($_SESSION['level'] !="user" && $_SESSION['level'] !="admin") {
    header("location:block.php");
  }

include"config/css.php"
 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>Document</title>
 </head>
 <body>
	<?php include"config/navbar.php" ?>
	<div class="container">
		edit profile<br>
		

	</div>

	<?php include"config/footer.php" ?>
 </body>
<?php 
include"config/js.php"
 ?>

 </html>

