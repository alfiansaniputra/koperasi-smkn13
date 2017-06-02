
<?php
  session_start();


  if (!isset($_SESSION['userid'])) {
    header("location:block.php");

  }
//cek level user
  if ($_SESSION['level'] !="admin") {
    header("location:block.php");
  }

$koneksi = mysqli_connect("localhost","root","","koperasi");



 ?>
<!DOCTYPE html>
<html>
  <head>
    <title>ADMIN - Update Barang</title>
      
          <?php include "atas.php" ?>
    <link href="assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="assets/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- bootstrap-wysiwyg -->
    </head>
                    <h2>UPDATE BARANG - ADMIN</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>


<?php
$no = $_GET['no']; //var $no = no (ambil dari var no dari index.php)

$pem = "SELECT * FROM pemesanan WHERE id_pemesanan = '$no'";

$hslpem = mysqli_query($koneksi,$pem);

$dataku = mysqli_fetch_array($hslpem);
?>

<h3>UPDATE PEMESANAN</h3><br>

<form action="z_prosesupdatepsn.php" method="POST">
  <label>STATUS ORDER:</label>
<input type="hidden" name="no" value="<?php echo $dataku['id_pemesanan'];?>">
    <div class="radio">
    <label>
      <input type="radio" name="status" value="belum" class="flat"  <?php if ($dataku['status'] == "belum") {echo "checked"; } ?>> Belum Disiapkan<br>

      <input type="radio" name="status" value="sudah_disiapkan" class="flat"  <?php if ($dataku['status'] == "sudah_disiapkan") {echo "checked"; } ?>> Sudah Siap<br>

      <input type="radio" name="status" value="diterima" class="flat" <?php if ($dataku['status'] == "diterima") {echo "checked"; } ?>> Telah Diterima<br>

    </label>
  </div>
  <input type="submit" value="kirim"> <br>
</form>

<?php include "bawah.php"; ?>
    <script src="assets/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="assets/vendors/iCheck/icheck.min.js"></script>
    <!-- bootstrap-daterangepicker -->
  </body>
</html>