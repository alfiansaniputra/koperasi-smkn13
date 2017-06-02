<?php 
$a = $_GET['no'];
$b = $_GET['status'];

$koneksi = mysqli_connect("localhost", "root", "", "koperasi");

$update= "UPDATE pemesanan SET status= '$b' WHERE id_pemesanan = '$a'";

$hasil = mysqli_query($koneksi,$update);

if($hasil){
	header("location:admin.php");
}else{
	echo "gagal update";
}

?>