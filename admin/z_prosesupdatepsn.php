<?php 


$a = $_POST['no']; //var $no = no (ambil dari var no dari index.php)
$b = $_POST['status'];

$koneksi = mysqli_connect("localhost", "root", "", "koperasi");

$update = "UPDATE pemesanan SET status='$b' WHERE id_pemesanan='$a'";
$hasil = mysqli_query($koneksi,$update);

if($hasil){
		header("location:../admin/admin.php");
}else{
	echo "gagal update";
}
?>