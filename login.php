<?php
require 'loader.php';
if($_POST){
    $user = new User ($_POST['email'],$_POST['passwordLogIn'],null, $_POST['recordarme']);
    $userFound = MYSQL::searchUserByEmail($pdo, $user);
    /*$usuario = $db->buscarEmail($user->getEmail());*/
    $user->setNombre($userFound['first_name']);
    $user->setApellido($userFound['last_name']);
    $user->setAvatar($userFound['avatar']);
    if($userFound == null){
      $errores["email"]="Usted no esta registrado";
    }else{
      if($auth->validatePassword($user->getPassword(),$userFound["password"])===false){
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
      if (isset($_COOKIE['email'])){
        /*$db->restaurarSesion($_COOKIE);*/
        MYSQL::restoreSession($pdo);
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