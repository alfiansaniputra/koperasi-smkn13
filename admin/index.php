<?php
  session_start();
  include "../online/koneksi.php"
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Koperasi Smkn13-Bdg</title>

<link rel="stylesheet" href="../assets/css/style_login.css">
<link rel="stylesheet"  href="../assets/css/ns-default.css" />
<link rel="stylesheet"  href="../assets/css/ns-style-growl.css" />

<body>
  <div class="cont">
  <div class="demo">
    <div class="login">
    <img src="../assets/img/logo.png"  width="80%" style="margin:28px;">
      <form action="../proses/login.php?op=in" method="POST">
      <div class="login__form">
        <div class="login__row">
          <svg class="login__icon name svg-icon" viewBox="0 0 20 20">
            <path d="M0,20 a10,8 0 0,1 20,0z M10,0 a4,4 0 0,1 0,8 a4,4 0 0,1 0,-8" />
          </svg>
         
          <input type="text" name="userid" class="login__input name" placeholder="Username"/>
        </div>
        <div class="login__row">
          <svg class="login__icon pass svg-icon" viewBox="0 0 20 20">
            <path d="M0,20 20,20 20,8 0,8z M10,13 10,16z M4,8 a6,8 0 0,1 12,0" />
          </svg>
          <input type="password" name="psw" class="login__input pass" placeholder="Password"/>
        </div>
        <button type="submit" class="login__submit">Sign in</button>

            </form>
      
      </div>
    </div>

  </div>
</div>
<script src='../assets/js/index.js'></script>
<script src="../assets/js/notificationFx.js"></script>

 </body>
<script>
var $toastContent = $('<span>Selamat Datang di Koperasi SMKN 13 bandung<br>Silahkan Login Terlebih Dahulu</span>');
Materialize.toast($toastContent, 3700); 
</script>
 <script>
      (function() {
        var bttn = document.getElementById( 'notification-trigger' );

        // make sure..
        bttn.disabled = false;

        bttn.addEventListener( 'click', function() {
          // simulate loading (for demo purposes only)
          classie.add( bttn, 'active' );
          setTimeout( function() {

            classie.remove( bttn, 'active' );
            
            // create the notification
            var notification = new NotificationFx({
              message : '<p> ID atau Password salah </p>',
              layout : 'growl',
              effect : 'jelly',
              type : 'notice', // notice, warning, error or success
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
    </script>


</html>