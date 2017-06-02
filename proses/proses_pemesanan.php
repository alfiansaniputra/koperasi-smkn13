<?php 
include "../online/koneksi.php";

    $a= $_POST['nama_siswa'];
    $b= $_POST['no'];
    $c= $_POST['size'];
    $d= $_POST['jml_pesan'];

    $perintah ="INSERT INTO pemesanan(nama_siswa, item_name, size, jml_pesan)
    VALUES ('$a','$b','$c','$d')";

    $hasil = mysqli_query($koneksi,$perintah);

    if($hasil){
       header("Location:../index.php");
    }else{
      echo "<script>alert('Pembelian Gagal');</script>";
    }


 ?>