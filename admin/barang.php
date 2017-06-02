<?php 
session_start();

 
//cek level user
  if ($_SESSION['level'] !="admin") {
    header("location:/barang.php");
  }

 ?>
<!DOCTYPE html>
<html>
  <head>
    <title>ADMIN - BARANG</title>

          <?php 
          include"z_atas.php";
          include "atas.php";
           ?>

                    <h2>Tabel Barang Koperasi Smkn 13 Bandung</h2>
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
                  <a href="barang-input.php">input barang</a>
  <?php

  $batas =  10;
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
  $tampil = "SELECT * FROM barang ORDER BY no DESC";
}

  $hasil = mysqli_query($konek,$tampil);
  $jmlhasil = mysqli_num_rows($hasil);


if ($jmlhasil < 1) {
  echo "data yang anda cari tidak ada";
}else{
  //tampil nama, email dan pesan
  $no=$posisi + 1;
  $posisi = 0;
  ?>

<!--==================================== tabel php===================================-->

                  <div class="x_content">
                    <table id="datatable" class="table table-striped table-bordered">
                      <thead>
                                     
                        <tr class="headings">
                        <th class="column-title">No </th>
                        <th class="column-title">Nama</th>
                        <th class="column-title">jumlah</th>
                        <th class="column-title">perusahaan</th>
                        <th class="column-title">foto barang</th>
                        <th class="column-title">deskripsi</th>
                        <th class="column-title no-link last"><span class="nobr">Action</span>
                        </th>
                        </tr>
                      </thead>
<?php 
  while($data=mysqli_fetch_array($hasil)){

$foto = $data['foto_barang'];

if($foto == NULL) {
  $foto = "../assets/img/user.png";
}else{
  $foto=$data['foto_barang'];
}
  echo "<tr>
      <td>$no</td>
      <td>$data[nama_barang]</td>
      <td>$data[jumlah]</td>
      <td>$data[perusahaan]</td>
      <td><img style='size=100' src ='../barang/$foto' width=100 height=100 class='activator' ></td>
      <td>$data[deskripsi]</td>

      <td><a href=\"../proses/delete_barang.php?no=$data[no]\">DELETE</a> | <a href=\"update_barang.php?no=$data[no]\">UPDATE</a></td>
    </tr>";
    ?>
<?php
    $no++;
  }
}
?>
                      <tbody>
                      </tbody>
                    </table>
                  </div>

<!--==================================end tabel php==================================-->
        <footer>
          <div class="pull-right">
             Koperasi Smkn 13 Bandung  <a href="#">alfiansaniputra</a>
          </div>
          <div class="clearfix"></div>
        </footer>
             </div>
   <script src="assets/vendors/jquery/dist/jquery.min.js"></script>
    <script src="assets/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="assets/vendors/fastclick/lib/fastclick.js"></script>
    <script src="assets/vendors/nprogress/nprogress.js"></script>
    <script src="assets/production/js/custom.js"></script>
<?php
include"z_bawah.php";?>