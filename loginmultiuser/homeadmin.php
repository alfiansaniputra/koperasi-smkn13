<?php
	session_start();

	if (!isset($_SESSION['userid'])) {
		header("location:block.php");

	}
//cek level user
	if ($_SESSION['level'] !="admin") {
		header("location:block.php");
	}


 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<h5>selamat datang <?php echo $_SESSION['userid'] ?></h5>

	menu admin

	<a href="halaman1.php">HALAMAN 1</a>
	<a href="halaman2.php">HALAMAN 2</a>
	<a href="halaman3.php">HALAMAN 3</a>
	<a href="log.php?op=out">LOG OUT</a>
</body>
</html>