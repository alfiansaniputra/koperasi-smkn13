<?php 
  session_start();
include "online/koneksi.php";

$no = $_GET['no'];

$nyelect = "SELECT * FROM barang WHERE no='$no' ";

$hasil = mysqli_query($koneksi,$nyelect);

$data = mysqli_fetch_array($hasil);

$foto_barang = $data['foto_barang'];
if($foto_barang == NULL) {
	$foto_barang = "../../assets/img/logo.png";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Detail Barang</title>
<?php include"config/css.php" ?>
</head>
<body>
	<?php 
	include "config/navbar.php"
	 ?>
	<div class="container">
	<div class="center flow-text" style="font-size:40px;">Form pembelian barang</div>
	<form action="proses/proses_pemesanan.php" method="POST">
		<div class="row">
			<div class="col l8">
				<div class="input-field col l12 s12">
				<input  name="no" type="hidden" value="<?php echo $data['no']; ?>">
					<input  name="item_name" type="text" id="#"
					 value="<?php echo $data['nama_barang']; ?> " class="#" disabled>
	                 <label for="#">Nama barang</label>
	             </div>
	             <div class="input-field col l9 s12">
	                <input name="nama_siswa" type="text" id="autocomplete-input" class="autocomplete">
	                <label for="autocomplete-input">Nama siswa</label>
	             </div>

	             <div class="input-field col s3 ">
	                <input name="jml_pesan"  type="number" id="#" >
	                <label for="jml_pesan">Jumlah barang</label>
	             </div>
	             <?php 
	             $tgl_pesan =['tgl_pesan'];
	              ?>
			<input type="hidden" name="tgl_pesan" value="$tgl_pesan">
 				<?php 
	             $status =['status'];
	              ?>
			<input type="hidden" name="status" value="belum">
			    <div class="col s12" id="pilihansize">
		          <div class="row">
		            <div class="col s2">
		                <input name="size" type="radio" value="S" 	id="test1" />
		                <label for="test1">S</label>
		            </div>
		            <div class="col s2">
		                <input name="size" type="radio" value="M" 	id="test2" />
		                <label for="test2">M</label>
		            </div>
		            <div class="col s2">
		                <input name="size" type="radio" value="L"  id="test3"  />
		                <label for="test3">L</label>
		            </div>
		            <div class="col s2">
		                <input name="size" type="radio" value="XL" 	id="test4" />
		                <label for="test4">XL</label>
		            </div>
		            <div class="col s2">
		                <input name="size" type="radio" value="XXL" 	id="test5" />
		                <label for="test5">XXL</label>
		            </div>
		            <div class="col s2">
		                <input name="size" type="radio" value="XXXL" 	id="test6" />
		                <label for="test6">XXXL</label>
		            </div>
		          </div>
		        </div><!--end pilihan warna -->

			     <div class="input-field col s1 ">
	                <input name="status"  type="hidden" id="#" value="belum" >
	                <label for="status"></label>
	             </div>

			</div><!--end l8  form kiri-->

			<div class="col l3">
				<?php echo "<img src ='barang/img/$foto_barang' width=100% class='activator' >" ?>
			</div><!--end l3 image-->
			<div class="col l12"><br>
			  	<div class="center">
			  		<button class="btn waves-effect waves-light" type="submit" value="reset" name="reset">Reset
			    		<i class="material-icons right">delete_forever</i>
			  		</button>
			  		<button class="btn waves-effect waves-light" type="submit" value="submit" name="action">Submit
			    		<i class="material-icons right">done</i>
			  		</button>
			  	</div>

<i style="font-size: 13px;">*perangkat anda telah terbaca oleh server kami , penyalah gunaan aplikasi akan di sangkutkan dengan kesiswaan smkn 13 bandung<br>

<?php
    if(!empty($_SERVER['HTTP_CLIENT_IP'])){
      $ip=$_SERVER['HTTP_CLIENT_IP'];
    }
    elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
      $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    else{
      $ip=$_SERVER['REMOTE_ADDR'];
    }
 $hostname = gethostbyaddr($_SERVER['REMOTE_ADDR']);
?>
<?php echo  "Nama Komputer=".$hostname;?>
<?php echo  "IP Address=".$ip;?></i>
			</div>
        </div><!--end row-->
	</form>
	</div><!--end container-->
		 <?php 
	include "config/footer.php"
	 ?>
</body>

<?php 
include "config/js.php"
 ?>

<script>
    $(document).ready(function(){
      $(".dropdown-button").dropdown();
    });  //dropdown
</script>
</html>