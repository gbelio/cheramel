<?php
require 'loader.php';
if (count($_SESSION) != 0) {
  redirect("perfil.php");
}
if($_POST){
    $usuario = $db->buscarEmail($_POST["email"]);
    if($usuario ==null){
      $errores["email"]="Usted no se encuentra registrado";
    }else{
      $nuevaPassword = $db->recuperarPassword($_POST["email"]);
      }
    }
?>
<!DOCTYPE html>
<html lang="es">
  <?php
    include_once("parts/head.php");
  ?>
  <body class="bodylogin">
    <?php
          include_once("parts/header.php");
          include_once("parts/nav.php");
          include_once("parts/mostrarErrores.php");
          include_once("parts/restablecerPassword.php");
          include_once("parts/footer.php");
          include_once("parts/scriptsBootstrap.php");
    ?>
  </body>
</html>