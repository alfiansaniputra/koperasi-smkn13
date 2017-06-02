<?php 

session_start();

$userid = $_POST['userid'];
$psw = $_POST['psw'];
$op = $_GET['op'];

if ($op == "in") {
	//mencari database sesuai inputan
	$konek = mysqli_connect("localhost","root","","koperasi");

	$tampil = "SELECT * FROM user WHERE userid='$userid' AND psw ='$psw' ";

	$cek = mysqli_query($konek ,$tampil);

	// mengecek hasil mencocokan database & inputan
	if (mysqli_num_rows($cek)==1) {
		echo "username dan password benar";
		
		//seting variabel global
		$c = mysqli_fetch_array($cek);
		$_SESSION['userid'] = $c['userid'];//buat ditampilkan
		$_SESSION['level'] = $c['level'];//buat syarat 

			if ($c['level']=="admin") {
				header("location:homeadmin.php");

			}elseif ($c['level']=="user") {
				header("location:homeuser.php");
			}

	}else {
		header("location:block.php");

	}

}elseif ($op == "out") {
	unset($_SESSION['userid']);
	unset($_SESSION['level']);
	header("location:index.php");
}

 ?>