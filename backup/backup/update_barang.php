<?php

$no = $_GET['no']; //var $no = no (ambil dari var no dari index.php)

//koneksi ke database
$konek = mysqli_connect("localhost", "root", "", "koperasi");
//query menampilkan data
$tampil = "SELECT * FROM barang WHERE no = '$no' "; // perintah, (nama primary key) = variabel

$hasil = mysqli_query($konek,$tampil);

$data = mysqli_fetch_array($hasil);

?>

<h3>Update Barang</h3>

<form method="GET" action="proses_update_barang.php">

Nama Barang : 
<input type="text" name="nama_barang" value="<?php echo $data['nama_barang']; ?>"><br>
<input type="hidden" name="no" value="<?php echo $data['no']; ?>">
jumlah : 
<input type="text" name="jumlah" value="<?php echo $data['jumlah']; ?>"><br>

perusahaan : 
<input type="text" name="perusahaan" value="<?php echo $data['perusahaan']; ?>"><br>

<input type="submit" value="Kirim"<br>

</form>