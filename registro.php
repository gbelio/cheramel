<?php
require 'loader.php';
include_once("controladores/funciones.php");
if($_POST){
  $datos=$validator->trimer($_POST);
  $errores=$validator->validar($datos);
  $avatarUsuario = $db->guardarArchivo($_FILES, $datos);
  if (count($errores) == 0){
    $usuario = $db->buscarEmail($datos["email"]);
    if($usuario != null){
      $errores["email"]="La cuenta <b>".$datos["email"]."</b> se encuentra registrada.";
    }else{
      $registro=$factory->armarRegistro($datos, $avatarUsuario);
      $db->guardar($registro);
      header("location:login.php");
      exit;
    }
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
      $db->restaurarSesion($_COOKIE);
      if (count($_SESSION) != 0){
        header("location:perfil.php");
      }else{
        include_once("parts/header.php");
        include_once("parts/nav.php");
        include_once("parts/mostrarErrores.php");
        include_once("parts/registro.php");
        include_once("parts/footer.php");
        include_once("parts/scriptsBootstrap.php");
      }
    ?>
  </body>
</html>