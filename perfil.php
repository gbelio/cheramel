<?php
require 'loader.php';
include_once("controladores/funciones.php");
if($_POST){
  $user = new User ($_POST['nombre'],$_POST['apellido'],$_POST['email'],$_POST['password']);
  $validator->trimer($user);
  $errores=$validator->validar($user,$_POST["repassword"]);
  if (count($errores) == 0){
    $usuario=$db->buscarEmail($user->getEmail());
    $db->editarUsuario($user,$_POST['repassword'],$factory,$usuario);
    Session::crearSesion($user);
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