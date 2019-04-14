<?php
include_once("controladores/funciones.php");
if($_POST){
  $datos=trimer($_POST);
  $errores=validar($datos);
  $avatarUsuario = guardarArchivo($_FILES, $_POST);
  if (count($errores) == 0){
    $registro=armarRegistro($_POST, $avatarUsuario);
    guardar($registro);
    header("location:login.php");
    exit;
  }
}
?>
<!DOCTYPE html>
<html lang="es">
  <?php
    include_once("parts/head.php");
  ?>
  <body class="bodyregistro" >
    <?php
      include_once("parts/header.php");
      include_once("parts/nav.php");
      include_once("parts/mostrarErrores.php");
      include_once("parts/registro.php");
      include_once("parts/footer.php");
      include_once("parts/scriptsBootstrap.php");
    ?>
  </body>
</html>