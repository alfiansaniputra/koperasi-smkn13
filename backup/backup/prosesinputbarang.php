<?php
//koneksi
$konek = mysqli_connect("localhost", "root", "", "koperasi");

$a= $_POST['nama_barang']; // judul adalah nama dari form judul di form_buku.php
$b = $_POST['jumlah'];
$c = $_POST['perusahaan'];
$fotos= $_FILES['fotoup']['name'];
$lokasi = $_FILES['fotoup']['tmp_name'];

$tjn = "img/$fotos";

$upload = move_uploaded_file($lokasi,$tjn);


$input = "INSERT INTO barang(nama_barang,jumlah,perusahaan,foto_barang) VALUES ('$a','$b','$c','$fotos')"; 

$hasil = mysqli_query($konek,$input);

if ($hasil OR $upload){
	header("location:index.php");
}else{
	echo "GAGALLL INPUT";
}

?>