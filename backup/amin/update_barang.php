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

$no = $_GET['no']; //var $no = no (ambil dari var no dari index.php)

//koneksi ke database

$tampil = "SELECT * FROM barang WHERE no = '$no' "; // perintah, (nama primary key) = variabel

$hasil = mysqli_query($koneksi,$tampil);

$data = mysqli_fetch_array($hasil);

 ?>
<!DOCTYPE html>
<html>
  <head>
    <title>ADMIN - Update Barang</title>
      
          <?php include "atas.php" ?>
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

<form method="GET" action="../proses/proses_update_barang.php">

</form>


<?php include "bawah.php"; ?>
  </body>
</html>