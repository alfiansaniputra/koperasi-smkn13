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
	<title>halaman 3</title>
</head>
<body>
	<h3>SELAMAT DATANG DI HALAMAN 3<?php echo $_SESSION['userid']; ?></h3>
	<h3>HALAMAN 3</h3>
	<a href="homeadmin.php">MENU UTAMA</a>
	<a href="log.php?op=out">LOG OUT</a>

</body>
</html>