<?php
  session_start();


  if ($_SESSION['level'] !="admin") {
    header("location:../loginmultiuser/block.php");
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
<?php 


$foto = $data['foto_barang'];

if($foto == NULL) {
  $foto = "../assets/img/user.png";
}
 ?>
<form method="POST" action="../proses/proses_update_barang.php" enctype="multipart/form-data">
<h3>Update Barang</h3>

<img src="../barang/<?php echo $foto ?>" width="100px" height="100px" >
<input type="hidden" name="namaf" value="<?php echo $data['foto_barang'] ?>">
<input type="hidden" value="<?php echo $data['foto_barang']; ?>" name="fotolama">

<input type="file" name="fotoup" required><br>

Nama Barang : 
<input type="text" name="nama_barang" value="<?php echo $data['nama_barang']; ?>"><br>
<input type="hidden" name="no" value="<?php echo $data['no']; ?>">
jumlah : 
<input type="text" name="jumlah" value="<?php echo $data['jumlah']; ?>"><br>

perusahaan : 
<input type="text" name="perusahaan" value="<?php echo $data['perusahaan']; ?>"><br>
deskripsi: 
<input type="text" name="deskripsi" value="<?php echo $data['deskripsi']; ?>"><br>

<input type="reset" value="reset"<br>
<input type="submit" value="Kirim"<br>
</form>

<?php include "bawah.php"; ?>
  </body>
</fotoup