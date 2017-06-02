<?php
//koneksi
$konek = mysqli_connect("localhost", "root", "", "koperasi");

$a= $_POST['nama_barang']; // judul adalah nama dari form judul di form_buku.php
$b = $_POST['jumlah'];
$c = $_POST['perusahaan'];
$fotos= $_FILES['fotoup']['name'];
$lokasi = $_FILES['fotoup']['tmp_name'];
$tjn = "../barang/$fotos";
$deskripsi = $_POST['deskripsi'];
$upload = move_uploaded_file($lokasi,$tjn);


$input = "INSERT INTO barang(nama_barang,jumlah,perusahaan,foto_barang,deskripsi) VALUES ('$a','$b','$c','$fotos','$deskripsi')"; 

$hasil = mysqli_query($konek,$input);

if ($hasil OR $upload){
	header("location:barang.php");
}else{
	echo "GAGALLL INPUT";
}

?>