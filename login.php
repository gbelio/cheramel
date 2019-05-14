<?php
require 'loader.php';
if($_POST){
    $user = new User ($_POST['email'],$_POST['passwordLogIn'],null, $_POST['recordarme']);
    $usuario = $db->buscarEmail($user->getEmail());
    $user->setNombre($usuario['nombre']);
    $user->setApellido($usuario['apellido']);
    $user->setAvatar($usuario['avatar']);
    if($usuario == null){
      $errores["email"]="Usted no esta registrado";
    }else{
      if($auth->validatePassword($user->getPassword(),$usuario["password"])===false){
        $errores["password"]= "Datos incorrectos";
      }else{
        Session::crearSesion($user);
        redirect("perfil.php");
      }
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
      if (count($_COOKIE) > 2){
        $db->restaurarSesion($_COOKIE);
        redirect("index.php");
      }
      if (count($_SESSION) != 0) {
          redirect("perfil.php");
        }else{
          include_once("parts/header.php");
          include_once("parts/nav.php");
          include_once("parts/mostrarErrores.php");
          include_once("parts/login.php");
          include_once("parts/footer.php");
          include_once("parts/scriptsBootstrap.php");
        }
    ?>
  </body>
</html>