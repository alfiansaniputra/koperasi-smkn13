<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link href="assets/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">

	 <link href="assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
</head>
<body>
	

        <!-- /top navigation -->
                <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3></h3>
              </div>


            </div>
            <div class="clearfix"></div>

            <div class="row">

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel" style="height:auto;">
                  <div class="x_title">




                    <h2>Tabel PEMESANAN Koperasi Smkn 13 Bandung</h2>

                    <div class="clearfix"></div>
                  </div>

<?php
$koneksi = mysqli_connect("localhost","root","","koperasi");


    //query menampilkan data memakai limit
    $tampil = "SELECT * FROM pemesanan";

  //searching-----------------------------------------------------------------

//perintah
$perintah = "SELECT pemesanan.id_pemesanan ,pemesanan.nama_siswa, pemesanan.tgl_pesan, barang.nama_barang, pemesanan.size, pemesanan.size, pemesanan.jml_pesan, pemesanan.status FROM  pemesanan, barang WHERE   barang.no=pemesanan.item_name ORDER BY id_pemesanan DESC ";
//eksekusi
$hasil = mysqli_query($koneksi , $perintah);
$jmlhasil = mysqli_num_rows($hasil);
?>
<!--TABEL PEMESANAN-->

<!--// TABEL PEMESANAN-->

<?php
  $tampil2 = "SELECT * FROM pemesanan";
  $hasil2 = mysqli_query($koneksi,$tampil2);
  $jmldata = mysqli_num_rows ($hasil2);



?>



                  <div class="x_content">
                    <table id="datatable" class="table table-striped table-bordered">
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
                      </thead>

<?php 
  $posisi = 0;
  $posisi = 0;
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
    echo "<td><a href='z_update_pemesanan.php?no=$data[id_pemesanan]'>Update</a> |<a href='z_prosesdelete.php?no=$data[id_pemesanan]'>  Delete</a></td>";
  echo "</tr>";
      $no++;

}
 
   ?>
                      <tbody>
                      </tbody>
                    </table>
                  </div>

                    </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
             Koperasi Smkn 13 Bandung  <a href="#">alfiansaniputra</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->







    <script src="assets/vendors/jquery/dist/jquery.min.js"></script>
    <script src="assets/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="assets/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="assets/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <!-- Datatables -->
    <script>
      $(document).ready(function() {
        var handleDataTableButtons = function() {
          if ($("#datatable-buttons").length) {
            $("#datatable-buttons").DataTable({
              dom: "Bfrtip",
              buttons: [
                {
                  extend: "copy",
                  className: "btn-sm"
                },
                {
                  extend: "csv",
                  className: "btn-sm"
                },
                {
                  extend: "excel",
                  className: "btn-sm"
                },
                {
                  extend: "pdfHtml5",
                  className: "btn-sm"
                },
                {
                  extend: "print",
                  className: "btn-sm"
                },
              ],
              responsive: true
            });
          }
        };

        TableManageButtons = function() {
          "use strict";
          return {
            init: function() {
              handleDataTableButtons();
            }
          };
        }();

        $('#datatable').dataTable();
        $('#datatable-keytable').DataTable({
          keys: true
        });

        $('#datatable-responsive').DataTable();

        $('#datatable-scroller').DataTable({
          ajax: "js/datatables/json/scroller-demo.json",
          deferRender: true,
          scrollY: 380,
          scrollCollapse: true,
          scroller: true
        });

        var table = $('#datatable-fixed-header').DataTable({
          fixedHeader: true
        });

        TableManageButtons.init();
      });
    </script>
    <!-- /Datatables -->

</body>
</html>