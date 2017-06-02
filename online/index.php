<?php 
include'koneksi.php';
	//query menampilkan data memakai limit

	<?php $tampil = "SELECT * FROM barang";  ?>

	<?php $hasil = mysqli_query($koneksi,$tampil);  ?>

<?php while($data=mysqli_fetch_array($hasil)){  ?>

		<?php echo"$data[nama_barang]";  ?>

		<?php echo"$data[jumlah]";  ?>

		<?php echo"$data[perusahaan]";  ?>

<?php }  ?>

 ?>