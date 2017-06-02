<?php
//koneksi
$konek = mysqli_connect("localhost", "root", "", "koperasi");

$a= $_GET['nama_siswa']; // judul adalah nama dari form judul di form_buku.php
$b = $_GET['tgl_pesan'];
$c = $_GET['nama_barang'];
$d = $_GET['size'];
$e = $_GET['jml_pesan'];

$input = "INSERT INTO pemesanan(nama_siswa,tgl_pesan,nama_barang,size,jml_pesan) VALUES ('$a','$b','$c','$d','$e')"; 

$hasil = mysqli_query($konek,$input);

if ($hasil){
	header("location:index.php");
}else{
	echo "GAGALLL INPUT";
}

?>