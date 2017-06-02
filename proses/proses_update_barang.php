<?php

$no = $_POST['no'];
$nmbrg = $_POST['nama_barang'];
$jml = $_POST['jumlah'];
$prshn = $_POST['perusahaan'];
$lama = $_POST['fotolama'];

$namaf= $_FILES['fotoup']['name'];
$lokasi = $_FILES['fotoup']['tmp_name'];
$tjn = "../barang/$namaf";
$deskripsi = $_POST['deskripsi'];

//koneksi ke database
$konek = mysqli_connect("localhost", "root", "", "koperasi");

if ($namaf != NULL ) {
	//hapus foto
	unlink("../barang/$lama");
	//upload foto baru
	$tujuanf= "../barang/$namaf";
	move_uploaded_file($lokasi, $tujuanf);

	$in = $namaf;
}else{
	$in = $lama;
}


$update = "UPDATE barang SET nama_barang = '$nmbrg', jumlah = '$jml', perusahaan ='$prshn',foto_barang = '$namaf',deskripsi='$deskripsi' WHERE no='$no'"; //nomor = adalah primary key

$hasil = mysqli_query($konek,$update);

if($hasil){
	header("location:../admin/barang.php");
}else{
	echo "gagal update";
}

?>