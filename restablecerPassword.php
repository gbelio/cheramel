<?php
require 'loader.php';
if (count($_SESSION) != 0) {
  redirect("perfil.php");
}
if($_POST){
    $user = new User ($_POST['email']);
    $userFound = MYSQL::searchUserByEmail($pdo, $user);
    /*$usuario = $db->buscarEmail($_POST["email"]);*/
    if($userFound == null){
      $errores["email"]="Usted no se encuentra registrado";
    }else{
      $newPassword = MYSQL::passwordReset($pdo, $user);
      /*$nuevaPassword = $db->recuperarPassword($_POST["email"]);*/
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