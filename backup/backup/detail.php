<?php

$no = $_GET['no'];

$konek = mysqli_connect("localhost","root","","koperasi");

$perintah = "SELECT * FROM barang WHERE no='$no' ";

$hasil = mysqli_query($konek,$perintah);

$data = mysqli_fetch_array($hasil);

$foto = $data['foto_barang'];

if($foto == NULL) {
	$foto = "user.png";
}else{
	$foto=$data['foto_barang'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	
	<table border="1">

		<tr>
			<td><?php echo $data['nama_barang']; ?></td>
			<td><?php echo "<img src ='img/$foto' width=100 height=100>" ?></td>
			<td><?php echo $data['perusahaan'];?></td>
		</tr>
	</table>
	
</body>
</html>
<a href="index.php">kembali</a>
