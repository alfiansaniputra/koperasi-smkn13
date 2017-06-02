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
    <title>ADMIN - Index Online</title>
      
          <?php include "atas.php" ?>
    </head>
                    <h2>Tabel Barang Koperasi Smkn 13 Bandung</h2>
                    
                <div class="col-md-3 col-sm-5 col-xs-12 form-group pull-right top_search">
                <form action="index.php" method="GET">
                  <div class="input-group">
                  
                    <input type="text" name="s" class="form-control" placeholder="CARI BARANG">
                    <span class="input-group-btn">
                              <button class="btn btn-default" type="submit" name="cari" value="cari">Go!</button>
                          </span>
                    
                  </div>
                  </form>
                </div>
                      
                    <div class="clearfix"></div>
                  </div>

  <?php

  $batas =  20;
  $halaman = @$_GET['halaman'];

  if (empty($halaman)) {
    $posisi=0;
    $halaman=1;
  }else{
    $posisi = ($halaman - 1) *$batas;
  }
//halaman batas 
  $koneksi = mysqli_connect("localhost", "root", "", "koperasi");
  //koneksi ke database
  
if (isset($_GET['cari'])) {
  $q = $_GET['s'];
  
  $tampil = "SELECT * FROM barang WHERE nama_barang LIKE '%$q%' OR jumlah LIKE '%$q%' OR perusahaan LIKE '%$q%' LIMIT $posisi , $batas";
//SEARCH
}else{

  
  $tampil = "SELECT * FROM barang LIMIT $posisi , $batas";
}
//KALO GAGAL SEARCH
  $hasil = mysqli_query($koneksi,$tampil);
  $jmlhasil = mysqli_num_rows($hasil);


//foto barang

if ($jmlhasil < 1) {
  echo " data yang anda cari tidak ada ";
}else{
  //tampil nama, email dan pesan
  $no=$posisi + 1;
  $posisi = 0;
?>
<?php 
  while($data=mysqli_fetch_array($hasil)){

$foto = $data['foto_barang'];

if($foto == NULL) {
  $foto = "../assets/img/default-image.jpg";
}
?>
                  <!--START GALERY-->
                      <div class="col-md-55">
                        <div class="thumbnail">
                          <div class="image view view-first">
                             <?php echo "<img style='width: 100%; display: block;' src ='../barang/$foto' width=100 height=100 class='activator' >" ?>
                            <div class="mask">
                              <p>Edit Gambar</p>
                              <div class="tools tools-bottom">
                                <a href="#"><i class="fa fa-link"></i></a><!--koding php crud barang-->
                                <?php echo "<a href=update_barang.php?no=$data[no]><i class='fa fa-pencil'></i></a>";?>
                                <a href="#"></a>
                                <?php echo "<a href=\"../proses/delete_barang.php?no=$data[no]\"><i class='fa fa-times'></i></a>" ?>
                              </div>
                            </div>
                          </div>
                          <div class="caption">
                            <p><?php echo "$data[nama_barang]"; ?></p>
                          </div>
                        </div>
                      </div>
                      <!--END CHART ONLINE SHOP-->
<?php 
    $no++;
  }
}
 ?>
<?php 
  $tampil2 = "SELECT * FROM barang";
  $hasil2 = mysqli_query($koneksi,$tampil2);
  $jmldata = mysqli_num_rows ($hasil2);
  $jmlhalaman = ceil($jmldata/$batas);

  echo "JUMLAH barang $jmldata<br>";

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