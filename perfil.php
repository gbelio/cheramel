<?php
require 'loader.php';
include_once("controladores/funciones.php");
if($_POST){
  $datos=$validator->trimer($_POST);
  $errores=$validator->validar($datos);
  $avatarUsuario = $db->guardarArchivo($_FILES, $datos);
  if (count($errores) == 0){
    $db->editarUsuario($_SESSION["email"],$datos);
    $usuario=$db->buscarEmail($_SESSION["email"]);
    Session::crearSesion($usuario,$datos);
    sleep(1);
    header("location:perfil.php");
  }
}
?>
<!DOCTYPE html>
<html lang="es">
  <?php
    include_once("parts/head.php");
  ?>
  <body>
    <?php
      $db->restaurarSesion($_COOKIE);
      if (count($_SESSION) != 0){
        include_once("parts/headerLogOut.php");
        include_once("parts/nav.php");
        include_once("parts/perfilBienvenida.php");
        include_once("parts/footer.php");
        include_once("parts/scriptsBootstrap.php");
      }else{
        header("location:login.php");
      }
    ?>
  </body>
</html>