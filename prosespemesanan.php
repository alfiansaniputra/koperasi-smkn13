<?php 

	$konek= mysqli_connect("localhost","root","","koperasi");

    $a= $_POST['nama_siswa'];
    $b= $_POST['item_name'];
    $c= $_POST['size'];
    $d= $_POST['jml_pesan'];


	$perintah = "INSERT INTO `pemesanan`(nama_siswa, item_name, size,jml_pesan) VALUES (
	'$a','$b','$c','$d') "; 


    $hasil = mysqli_query($konek,$perintah);

    if($hasil){
       echo "berhasil";
    }else{
      echo "input pemesanan Gagal";
    }

 ?>