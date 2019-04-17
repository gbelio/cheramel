<?php
include_once("controladores/funciones.php");
if($_POST){
    $usuario = buscarEmail($_POST["email"]);
    if($usuario ==null){
      $errores["email"]="Usted no esta registrado";
    }else{
      $nuevaPassword = recuperarPassword($_POST["email"]);
      echo $nuevaPassword;
      $to = $_POST["email"];

      $subject = "Restablecer Contraseña Cheramel";
      $message = "Ingrese nuevamente a Cheramel y coloque el siguiente password. Luego restablezca su contraseña";
      $headers = "From: mi@cuentadeemail.com";
      mail($to, $subject, $message, $headers);
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