<?php

$no = $_GET['id_pemesanan'];

$koneksi = mysqli_connect("localhost", "root", "", "koperasi");

$tampilbarang = "SELECT no,nama_barang,jumlah FROM barang";
$tampilsiswa = "SELECT nisn, nama_siswa FROM siswa";
$pms = "SELECT * FROM pemesanan WHERE id_pemesanan = '$no'";

$hasilbarang = mysqli_query($koneksi, $tampilbarang);
$hasilsiswa = mysqli_query($koneksi, $tampilsiswa);
$hslpms = mysqli_query($koneksi,$pms);

$data = mysqli_fetch_array($hslpms)

?>

<h3>UPDATE PEMESANAN</h3>

<form action="proses_input_pemesanan.php" method="GET">
	TANGGAL PEMESANAN : <br>
	<input type="date" name="tgl_pesan" value="<?php echo $data['tgl_pesan']; ?>"> <br>


	NAMA SISWA : <br>
	<select name="nisn">
		<?php
		foreach ($hasilsiswa as $siswa) {
		?>
			<option value="<?php echo $siswa['nisn']; ?>" <?php if ($data['nisn'] == $siswa['nisn']) {
				echo "selected";
			} ?> ><?php echo $siswa['nama_siswa']; ?></option>
		<?php
			}
		?> 
	</select><br>

	NAMA BARANG: <br>
	<select name="no">
		<?php
		foreach ($hasilbarang as $barang) {
			echo "<option value= $barang[no]>$barang[nama_barang] </option>";
			}
		?> 
	</select><br>


	SIZE : <br>
	<input type="radio" name="size" value="S" <?php if ($data['size'] == "S") {
		echo "checked";
	} ?> >S  <br>

	<input type="radio" name="size" value="M" <?php if ($data['size'] == "M") {
		echo "checked";
	} ?> >M  <br>

	<input type="radio" name="size" value="L" <?php if ($data['size'] == "L") {
		echo "checked";
	} ?> >L  <br>

	<input type="radio" name="size" value="XL" <?php if ($data['size'] == "XL") {
		echo "checked";
	} ?> >XL  <br>


	<input type="radio" name="size" value="XXL" <?php if ($data['size'] == "XXL") {
		echo "checked";
	} ?> >XXL  <br>


	<input type="radio" name="size" value="XXXL" <?php if ($data['size'] == "XXXL") {
		echo "checked";
	} ?> >XXXL  <br>
	<input type="submit" name="kirim"> <br>
</form>