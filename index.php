<?php
require 'loader.php';
?>
<!DOCTYPE html>
<html lang="es">
  <?php
    include_once("parts/head.php");
  ?>
  <body>
    <div class="container-fluid p-0">
      <?php
        $db->restaurarSesion($_COOKIE);
        if (count($_SESSION) != 0){
          include_once("parts/headerLogOut.php");
        }else{
          include_once("parts/header.php");
        }
        include_once("parts/nav.php");
        include_once("parts/carousel.php");
        include_once("parts/productosIndex.php");
        include_once("parts/footer.php");
        include_once("parts/scriptsBootstrap.php");
      ?>
    </div>
  </body>
</html>