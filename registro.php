<?php
require 'loader.php';
include_once("controladores/funciones.php");
if($_POST){
  $user = new User ($_POST['nombre'],$_POST['apellido'],$_POST['email'],$_POST['password']);
  $validator->trimer($user);
  $errores=$validator->validar($user,$_POST["repassword"]);
  if (count($errores) == 0){
    $db->guardarArchivo($_FILES, $user);
    if($db->buscarEmail($user->getEmail()) != null){
      $errores["email"]="La cuenta <b>".$user->getEmail()."</b> se encuentra registrada.";
    }else{
      $user->setPassword(HashPassword::hash($user->getPassword()));
      $registro=$factory->armarRegistro($user);
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