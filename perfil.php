<?php
require 'loader.php';
if($_POST){
  //Pasar 'repassword' dentro del objeto User.
  $user = new User ($_POST['nombre'],$_POST['apellido'],$_POST['email'],$_POST['password']);
  $validator->trimer($user);
  $errores=$validator->validar($user,$_POST["repassword"]);
  if (count($errores) == 0){
    $usuario=$db->buscarEmail($user->getEmail());
    $db->editarUsuario($user,$_POST['repassword'],$factory,$usuario);
    Session::crearSesion($user);
    sleep(1);
    redirect("perfil.php");
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