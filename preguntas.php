<!DOCTYPE html>
<html lang="es">
  <?php
    include_once("parts/head.php");
  ?>
  <body class="bodylogin">
    <?php
      if (count($_SESSION) != 0){
        include_once("parts/headerLogOut.php");
      }else{
        include_once("parts/header.php");
      }
      include_once("parts/nav.php");
      include_once("parts/preguntas.php");
      include_once("parts/footer.php");
      include_once("parts/scriptsBootstrap.php");
    ?>
  </body>
</html>