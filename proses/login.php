<?php 
  session_start();


$koneksi = mysqli_connect("localhost","root","","koperasi");


$userid = $_POST['userid'];
$psw = $_POST['psw'];
$op = $_GET['op'];

if ($op == "in") {
  //mencari database sesuai inputan


  $tampil = "SELECT * FROM user WHERE userid='$userid' AND psw ='$psw' ";

  $cek = mysqli_query($koneksi ,$tampil);

  // mengecek hasil mencocokan database & inputan
  if (mysqli_num_rows($cek)==1) {
    echo "username dan password benar";
    
    //seting variabel global
    $c = mysqli_fetch_array($cek);
    $_SESSION['userid'] = $c['userid'];//buat ditampilkan
    $_SESSION['level'] = $c['level'];//buat syarat 

      if ($c['level']=="admin") {
        header("location:../admin/indexadmin.php");

      }
  }else {

      echo '<script>
      (function() {
        var bttn = document.getElementById( "notification-trigger" );

        // make sure..
        bttn.disabled = false;

        bttn.addEventListener( "click", function() {
          // simulate loading (for demo purposes only)
          classie.add( bttn, "active" );
          setTimeout( function() {

            classie.remove( bttn, "active" );
            
            // create the notification
            var notification = new NotificationFx({
              message : "<p>Hello there!  a classic notification but I have some elastic jelliness thanks to <a href="http://bouncejs.com/">bounce.js</a>. </p>",
              layout : "growl",
              effect : "jelly",
              type : "notice", // notice, warning, error or success
              onClose : function() {
                bttn.disabled = false;
              }
            });

            // show the notification
            notification.show();

          }, 1200 );
          
          // disable the button (for demo purposes only)
          this.disabled = true;
        } );
      })();
      </script>';
  }

}elseif ($op == "out") {
  unset($_SESSION['userid']);
  unset($_SESSION['level']);
  header("location:../admin/index.php");
}

 ?>
 <link rel="stylesheet"  href="../assets/css/ns-default.css" />
<link rel="stylesheet"  href="../assets/css/ns-style-growl.css" />
<script src='../assets/js/index.js'></script>
<script src="../assets/js/notificationFx.js"></script>
