<?php

$no = $_GET['no'];
$nmbrg = $_GET['nama_barang'];
$jml = $_GET['jumlah'];
$prshn = $_GET['perusahaan'];

//koneksi ke database
$konek = mysqli_connect("localhost", "root", "", "koperasi");

$update = "UPDATE barang SET nama_barang = '$nmbrg', jumlah = '$jml', perusahaan ='$prshn'
WHERE no='$no'"; //nomor = adalah primary key

$hasil = mysqli_query($konek,$update);

if($hasil){
	header("location:index.php");
}else{
	echo "gagal update";
}

?>