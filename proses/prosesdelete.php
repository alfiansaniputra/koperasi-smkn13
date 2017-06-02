<?php
//koneksi ke database
$konek= mysqli_connect("localhost", "root", "","koperasi");

//ambil id dari hasil klik link edit
$no = $_GET['no'];


$hapus= "DELETE FROM pemesanan WHERE id_pemesanan='$no'"; //buku adalah nama tabel db nya ,terus kalau nomor adalah nama primary key table nya, terus kalau $nomor adalah nama var

$hasil = mysqli_query($konek,$hapus);
//apabila query untuk input data benar

if($hasil)
{
//lakukan redirect

	header("location:../admin/admin.php");

}else{
echo "Hapus Data Barang Gagal";
} ?>