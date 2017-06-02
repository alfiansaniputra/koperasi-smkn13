<?php 
  session_start();


  if ($_SESSION['level'] !="admin") {
    header("location:/admin.php");
  }
  

 ?>
 
<!DOCTYPE html>
<html>
  <head>
    <title>ADMIN - BARANG</title>
    
    <link href="assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="assets/production/css/custom.css" rel="stylesheet">
   <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- Datatables -->
    <link href="assets/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">


  </head>
<?php 

@$dada = mysqli_fetch_array($hasil);

$foto_user = $dada['foto_user'];

if($foto_user == NULL) {
  $foto_user = "../../assets/img/user.png";
}
    ?>
  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title">
              <img src="assets/production/images/logo.png" width="25%" style="margin:0px 0px 0px -10px; "> <span>Admin Koperasi</span></a>
            </div>

            <div class="clearfix"></div>
  <!-- menu profile quick info -->
            <div class="profile">
              <div class="profile_pic" >
               <?php echo "<img  src='../loginmultiuser/img/$foto_user' class='img-circle profile_img' >";?>
              </div>
              <div class="profile_info" >
                <span>Welcome</span>
                <h2><?php echo $_SESSION['userid'] ?></h2>
              </div>
            </div>
             <div class="clearfix"></div>
            <!-- /menu profile quick info -->

     

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <ul class="nav side-menu">
                  <li><a href="admin.php"><i class="fa fa-home"></i> PEMESANAN </a>
                  </li>
                  <li><a href="indexadmin.php"><i class="fa fa-edit"></i> INDEX ONLINE SHOP</span></a>
                  </li>
                  <li><a href="barang.php"><i class="fa fa-desktop"></i> BARANG </a>
                  </li>
                 </ul>
              </div>

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">

          <div class="nav_menu">
            <nav class="" role="navigation">
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <?php echo "<img  src='../loginmultiuser/img/$foto_user'>";?>
                    <?php echo $_SESSION['userid'] ?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="javascript:;">  Profile</a>
                    </li>
                    <li>
                       <a href="javascript:;">Settings</a>
                      </a>
                    </li>
                    <li>
                      <a href="javascript:;">Help</a>
                    </li>
                    <li><a href="../proses/login.php?op=out"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                    </li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>

        </div>
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
      </div>
    </div>
    <script src="assets/vendors/jquery/dist/jquery.min.js"></script>
    <script src="assets/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="assets/vendors/fastclick/lib/fastclick.js"></script>
    <script src="assets/vendors/nprogress/nprogress.js"></script>
    <script src="assets/production/js/custom.js"></script>




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

