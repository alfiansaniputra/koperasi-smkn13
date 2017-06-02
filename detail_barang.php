<?php 
  session_start();
include "online/koneksi.php";
$no = $_GET['no'];
$perintah = "SELECT * FROM barang WHERE no='$no' ";

$hasil = mysqli_query($koneksi,$perintah);

$data = mysqli_fetch_array($hasil);
$deskripsi = $data['deskripsi'];
$foto = $data ['foto_barang'];
if($foto == NULL) {
	$foto = "/assets/img/default-image.jpg";
     }else{
     	$foto="barang/$foto";
     }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Detail Barang</title>
	<link rel="stylesheet" href="assets/css/materialize.min.css">
<link rel="stylesheet" href="assets/fonts/material-icons.css">
<link rel="stylesheet" href="assets/fonts/Josefin_Sans/josefinsans.css">
<link rel="stylesheet" href="assets/css/styles.css">
<link rel="stylesheet" href="assets/css/stylenavbar.css">
</head>
<body>
	<?php 
	include "config/navbar.php"
	 ?>
	<div class="row">
	<div class="center">
		<div class="col l12">DETAIL BARANG </div>
	</div>
	</div>
	<div class="row">
		<div class="col l1 s1" height="100%" style="background-color: red;">
		<?php
		echo "<img  src='$foto' width=100%;>
		";
		?>
			
		</div><!--end gambar kecil-->
		<div class="col l5"><?php
		echo "<img  src='$foto' width=100% >
		";
		?>
		</div><!--end gambar utama-->

		<div class="col l6">
			<div class="col s12" style=" background-color: #263238; color: white; border-radius:2px ;"><h3><?php echo $data['nama_barang']; ?></h3></div>
			<div class="row">
				<div class="col l6 s12">
				<?php 
				echo "$deskripsi";
				 ?>
				</div>
			<div class="col l6">
				<div class="row">
				<div class="center">
					SIZE
				</div>
				</div>
					<div class="col s6">
					<div class="center">
					      <input type="checkbox" id="#" checked="checked" />
					      <label for="#">S</label><br>
					      <input type="checkbox" id="#" checked="checked" />
					      <label for="#">M</label><br>
					      <input type="checkbox" id="#" checked="checked" />
					      <label for="#">L</label><br><br>
					</div>
					</div>
					<div class="col s6">
					<div class="left">
					      <input type="checkbox" id="#" checked="checked" />
					      <label for="#">XL</label><br>
					      <input type="checkbox" id="#" checked="checked" />
					      <label for="#">XXL</label><br>
					      <input type="checkbox" id="#" checked="checked" />
					      <label for="#">XXXL</label><br><br>
					</div>
					</div>
			   

				<br>
			    <a class="btn waves-effect waves-light red btn"  type="submit" <?php echo "<a href='form_pembelian.php?no=$data[no]'>"; ?>  <i class="small material-icons ">shopping_cart</i>Beli Sekarang
                </a>
			</div>
			</div>
		</div><!--end keterangan -->
	</div>
	</div><!--end konten detail barang-->
	 <?php 
	include "config/footer.php"
	 ?>
</body>
<script src="assets/js/jquery-3.1.0.min.js"></script>
<script src="assets/js/materialize.min.js"></script>
<script src="assets/js/jquery.elevatezoom.js"></script>
<script>
	$("#zoom_08").elevateZoom({
				zoomWindowFadeIn: 500,
				zoomWindowFadeOut: 500,
				lensFadeIn: 500,
				lensFadeOut: 500
	});
</script>
</html>