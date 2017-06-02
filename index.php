 <?php

  include "online/koneksi.php";


 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Koperasi Smkn13-Bdg</title>

<link rel="stylesheet" href="assets/css/materialize.min.css">
<link rel="stylesheet" href="assets/fonts/material-icons.css">
<link rel="stylesheet" href="assets/fonts/Josefin_Sans/josefinsans.css">
<link rel="stylesheet" href="assets/css/styles.css">
<link rel="stylesheet" href="assets/css/component.css"><!--searchbar-->
<link rel="stylesheet" href="assets/css/default.css"><!--searchbar-->
<link rel="stylesheet" href="assets/css/jdialog.min.css"><!--dialog login-->
<link rel="stylesheet" href="assets/css/stylenavbar.css">


</head>
<body>
    <?php 
    include"config/navbar.php"
     ?>


<div id="paralax" class="parallax-container section scrollspy">
        <div class="section no-pad-bot" id="a">  
            <div class="row">
                <div class="col l6 s1" id="ganjelkiri"></div>
                    <div class="col l6 s10" id="cvrparalax">
                        <div class="isi"> 
                          <h5 class="header col s12 light" style="color:white;text-align: center; margin-top: 160px; font-weight:bold">Welcome to Koperasi SMKN 13 Bandung</h5>
                           selamat datang di web KOPERASI SMKN 13 Bandung , Web ini mempermudah anda untuk membeli Barang Sekolah yang anda butuhkan tanpa harus mengantri di koperasi 
                        </div><!-- isi -->
                    </div>
            </div>
        </div>
    <div class="parallax"><img src="assets/img/13.jpg" style="width:100%;" ></div>
</div>
<!--end PARALLAX LAYER-->
<div class="col l12">
  <div id="welc"> SELAMAT DATANG DI WEB KOPERASI SEKOLAH SMKN 13 BANDUNG </div>
</div>
<!--box1-->
<?php   $tampil = "SELECT * FROM barang ";
        $hasil = mysqli_query($koneksi,$tampil);
  ?>
<div class="row">
<?php while($data=mysqli_fetch_array($hasil)){ 

  $foto = $data['foto_barang'];



 ?>
      <div class="col l3  s6">

                <div class="card" style="background-color: #ecf0f1;">
                    <div class="card-image waves-effect waves-block waves-light"  style="padding: 10px; width: 100%; text-align: center;">
                  <?php echo "<img src ='barang/$foto' class='activator' style='size:100%;'>" ?>           
                    </div>
            <div class="card-content">
                  <span class="card-title activator grey-text text-darken-4">
                  <a href="#" style="color:black;"><?php echo"$data[nama_barang]";  ?></a><br>
                  <?php echo "<a class='waves-effect waves-light red btn modal-trigger center' href='detail_barang.php?no=$data[no]'><i class='material-icons left'>shopping_basket</i>DETAIL</a><br>"; ?>
                  </span>
             </div>
                  </div>
      </div>

<?php 
}
 ?>
<!--END CHART ONLINE SHOP-->

</div>

<?php
include "config/footer.php";
?>
<!--end footer-->

</body>
<!--manggil js-->
<?php include"config/js.php" ?>
<script>
var $toastContent = $('<span>Selamat Datang di Koperasi SMKN 13 bandung</span>');
Materialize.toast($toastContent, 3700); 
</script>
<script>
    $(document).ready(function(){

      $(".button-collapse").sideNav();
      $('.parallax').parallax();
      $(".dropdown-button").dropdown();
    });
</script>

<script>
   $(document).ready(function(){
     // MODAL //
    $("#dialog-4").jDialog({
        skinClassName: 'demo',
        animationType: 'flip',
        allowOverlay: false
    });
     // AKHIR MODAL //

    $('.scrollspy').scrollSpy();
});
</script>

</html>
