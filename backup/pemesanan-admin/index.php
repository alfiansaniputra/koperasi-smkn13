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
 
 <center>
<br><center>
<form action="index.php" method="GET">
	<input type="text" name="s">
	<input type="submit" name="cari" value="cari">
</form>
</center>

<?php
//seting halaman dan posisi
$batas =  5;
$halaman = @$_GET['halaman'];

if (empty($halaman)) {
	$posisi = 0;
	$halaman = 1;
}else{
	$posisi = ($halaman - 1) * $batas;
}

//koneksi ke database
$koneksi = mysqli_connect("localhost","root","","koperasi");

	if (isset($_GET['cari'])) {
		$q = $_GET['s'];
		//query menampilkan data memakai limit
		$tampil = "SELECT * FROM pemesanan WHERE nama_siswa LIKE '%$q%' OR nama_barang LIKE '%$q%' LIMIT $posisi , $batas";

	}else{

		//query menampilkan data memakai limit
		$tampil = "SELECT * FROM pemesanan LIMIT $posisi , $batas";
	}
	//searching-----------------------------------------------------------------

//perintah
$perintah = "SELECT pemesanan.id_pemesanan ,pemesanan.nama_siswa, pemesanan.tgl_pesan, barang.nama_barang, pemesanan.size, pemesanan.size, pemesanan.jml_pesan FROM pemesanan, barang WHERE barang.no=pemesanan.item_name LIMIT $posisi , $batas";
//eksekusi
$hasil = mysqli_query($koneksi , $perintah);
$jmlhasil = mysqli_num_rows($hasil);

//menjalankan fungsinya

echo "<center><table border='1' class='striped'>";

echo "<tr>";
echo "<th>no</th>";
echo "<td>Nama</td>";
echo "<td>Tgl pemesanan</td>";
echo "<td>Nama Barang</td>";
echo "<td>Size</td>";
echo "<td>jumlah pesan</td>";
echo "<td>Aksi</td>";
echo "</tr>";


if ($jmlhasil < 1) {
	echo "<tr>";
	echo "<td colspan = '7'>data yang anda cari tidak ada</td>";
	echo "</tr>";
}else{

	//no
	$no=$posisi + 1;

	while ($data=mysqli_fetch_array($hasil)) {
	  echo "<tr>";
	  echo "<td>$no</td>";
	  echo "<td>$data[nama_siswa]</td>";
	  echo "<td>$data[tgl_pesan]</td>";
	  echo "<td>$data[nama_barang]</td>";
	  echo "<td>$data[size]</td>";
	  echo "<td>$data[jml_pesan]</td>";
	  echo "<td><a href='update_pemesanan.php?no=$data[id_pemesanan]'>Update</a> |<a href='prosesdelete.php?no=$data[id_pemesanan]'>  Delete</a></td>";
	echo "</tr>";
	  	$no++;
	}
}

echo "</table></center>";

?>

<?php
	$tampil2 = "SELECT * FROM pemesanan";
	$hasil2 = mysqli_query($koneksi,$tampil2);
	$jmldata = mysqli_num_rows ($hasil2);
	$jmlhalaman = ceil($jmldata/$batas);

	echo "JUMLAH PEMESANAN $jmldata<br>";

	for ($i=1; $i <= $jmlhalaman; $i++) { 
		if ($i != $halaman) {
			echo "<a href=$_SERVER[PHP_SELF]?halaman=$i>
				$i </a> |";
		}else{
		echo "<b>$i </b>";
		}
	}
?>
</center>
