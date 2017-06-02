<center>
<h1>index stock barang</h1>
<br><br><br>
<form action="index.php" method="GET">
	<input type="text" name="s">
	<input type="submit" name="cari" value="cari">
</form>
<a href="form_input_barang.php">input barang</a>
	<?php

	$batas =  5;
	$halaman = @$_GET['halaman'];

	if (empty($halaman)) {
		$posisi=0;
		$halaman=1;
	}else{
		$posisi = ($halaman - 1) *$batas;
	}

	$konek = mysqli_connect("localhost", "root", "", "koperasi");
	//koneksi ke database
	
if (isset($_GET['cari'])) {
	$q = $_GET['s'];
	//query menampilkan data memakai limit
	$tampil = "SELECT * FROM barang WHERE nama_barang LIKE '%$q%' OR jumlah LIKE '%$q%' OR perusahaan LIKE '%$q%' LIMIT $posisi , $batas";

}else{

	//query menampilkan data memakai limit
	$tampil = "SELECT * FROM barang LIMIT $posisi , $batas";
}

	$hasil = mysqli_query($konek,$tampil);
	$jmlhasil = mysqli_num_rows($hasil);


	echo "<table border='1'>
		<tr>
			<th>no</th>
			<th>Namabarang</th>
			<th>jumlah</th>
			<th>perusahaan</th>
			<th>action</th>
		</tr>";
if ($jmlhasil < 1) {
	echo "<tr>";
	echo "<td colspan = '5'>data yang anda cari tidak ada</td>";
	echo "</tr>";
}else{
	//tampil nama, email dan pesan
	$no=$posisi + 1;
	$posisi = 0;
	while($data=mysqli_fetch_array($hasil)){
	echo "<tr>
			<td>$no</td>
			<td>$data[nama_barang]</td>
			<td>$data[jumlah]</td>
			<td>$data[perusahaan]</td>
			<td><a href=\"delete_barang.php?no=$data[no]\">DELETE</a> | <a href=\"update_barang.php?no=$data[no]\">UPDATE</a>	 <a href='detail.php?no=$data[no]'>DETAIL</a></td>
		</tr>";
		$no++;
	}
}
	echo "</table>";

	$tampil2 = "SELECT * FROM barang";
	$hasil2 = mysqli_query($konek,$tampil2);
	$jmldata = mysqli_num_rows ($hasil2);
	$jmlhalaman = ceil($jmldata/$batas);

	echo "JUMLAH barang $jmldata<br>";

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