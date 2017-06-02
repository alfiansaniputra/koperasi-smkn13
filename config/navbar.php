<div class="navbar-fixed">
    <nav>
      <div class="nav-wrapper">
      <div class="jarak">
        <a href="#" class="brand-logo">KOPERASI SMKN 13 BANDUNG</a>
         <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">view_headline</i></a>
          <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li><a href="index.php"><i class="material-icons">home</i></a></li>
            <li><a href="#"><i class="material-icons right">account_circle</i></a></li>
            <li><a href="#"><i class="material-icons">shopping_cart</i></a></li>
            <a class="waves-effect waves-light btn" id="butnap">button</a>
            <a class="waves-effect waves-light btn" id="butnap">button</a>
          </ul> 

          </div>
          <!--=======end DEKSTOP======-->


          <ul class="side-nav" id="mobile-demo">
            <li class="user-details" id="bgandr">
            <div class="row">
                <div class="col col s4 m4 l4">
                               <?php
    echo "<img  src='loginmultiuser/img/$foto_user'width=100%; class='circle responsive-img valign profile-image' >";?>

                </div>
                <div class="col col s8 m8 l8">
                    
                    <a class="btn-flat dropdown-button waves-effect waves-light white-text profile-btn" href="#" data-activates="profile-dropdown"><?php echo $_SESSION['userid']; ?>

                    <i class='small material-icons right'>keyboard_arrow_down</i></a>
                    <ul id="profile-dropdown" class="dropdown-content" style="width: 128px; position: absolute; top: 57px; left: 101.234px; opacity: 1; display: none;">
                        <li><a href="#"><i class="mdi-action-face-unlock"></i> Profile</a>
                        </li>
                        <li><a href="#"><i class="mdi-communication-live-help"></i> Help</a>
                        </li>
                        <li><a href="proses/login.php?op=out"><i class="material-icons left"></i> Logout</a>
                        </li>
                    </ul>
                    <p class="user-roal">Administrator</p>
                </div>
            </div>
            </li>
            <a href="masterwebnya.php"><i class="material-icons">home</i></a>
            <a href="#"><i class="material-icons">refresh</i></a>
            <a href="app-email.html" class="waves-effect waves-cyan"><i class="mdi-communication-email"></i> Mailbox <span class="new badge">4</span></a>
            <a href="#"><i class="material-icons">more_vert</i></a>
          </ul>
          <!--=======end mobile=======-->
      
      </div>
    </nav>
</div>
<!--====================NAVBAR====================-->
   <!-- isi dropdown -->

<!-- akhir isi drop down -->

<script src="assets/js/search.js"></script>
<script>
$(document).ready(function(){
    $(".dropdown-button").dropdown();
    $(".button-collapse").sideNav();
});
</script>
