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
 
<!DOCTYPE html>
<html>
  <head>
    <title>ADMIN - BARANG</title>
    
          <?php include "atas.php" ?>

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

<?php
//seting halaman dan posisi
$batas =  10;
$halaman = @$_GET['halaman'];

if (empty($halaman)) {
  $posisi = 0;
  $halaman = 1;
}else{
  $posisi = ($halaman - 1) * $batas;
}
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
$perintah = "SELECT pemesanan.id_pemesanan ,pemesanan.nama_siswa, pemesanan.tgl_pesan, barang.nama_barang, pemesanan.size, pemesanan.size, pemesanan.jml_pesan, pemesanan.status FROM  pemesanan, barang WHERE   barang.no=pemesanan.item_name LIMIT $posisi , $batas";
//eksekusi
$hasil = mysqli_query($koneksi , $perintah);
$jmlhasil = mysqli_num_rows($hasil);
?>
<!--TABEL PEMESANAN-->
  <div class="table-responsive">
    <table class="table table-striped jambo_table bulk_action">
      <thead>
        <tr class="headings">
          <th class="column-title">No </th>
          <th class="column-title">Nama</th>
          <th class="column-title">Tanggal Pesan</th>
          <th class="column-title">Nama Barang</th>
          <th class="column-title">Ukuran</th>
          <th class="column-title">Jumlah Pesan</th>
          <th class="column-title">status</th>
          <th class="column-title no-link last"><span class="nobr">Action</span>
          </th>
          <th class="bulk-actions" colspan="7">
            <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
          </th>
        </tr>
      </thead>


      <tbody>
      <tr>
<?php   //no
  $no=$posisi + 1;

  while ($data=mysqli_fetch_array($hasil)) {
    echo "<tr>";
    echo "<td>$no</td>";
    echo "<td>$data[nama_siswa]</td>";
    echo "<td>$data[tgl_pesan]</td>";
    echo "<td>$data[nama_barang]</td>";
    echo "<td>$data[size]</td>";
    echo "<td>$data[jml_pesan]</td>";
    echo "<td>$data[status]</td>";
    echo "<td><a href='update_pemesanan.php?no=$data[id_pemesanan]'>Update</a> |<a href='prosesdelete.php?no=$data[id_pemesanan]'>  Delete</a></td>";
  echo "</tr>";
      $no++;
  }
   ?>

      </tr>
      </tbody>
    </table>
  </div>
<!--// TABEL PEMESANAN-->

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
<?php include "bawah.php"; ?>
  </body>
</html>