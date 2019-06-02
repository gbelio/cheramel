<?php
require 'loader.php';
if($_POST){
  $user = new User (
    $_POST['email'],
    $_POST['password'],
    $_POST['repassword'],
    $_POST['recordarme'] = null,
    $_POST['nombre'],
    $_POST['apellido']
  );
  $validator->trimer($user);
  $errores=$validator->validar($user);
  if (count($errores) == 0){
    $userFound = MYSQL::searchUserByEmail($pdo, $user);
    $user->setAvatar($userFound['avatar']);
    $user->setPassword($userFound['password']);
    $user->setId($userFound['id']);
    MYSQL::updateUser($pdo, $user);
    /*$db->editarUsuario($user,$factory);*/
    Session::crearSesion($user);
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
      if (count($_COOKIE)>1){
        //$db->restaurarSesion($_COOKIE);
        MYSQL::restoreSession($pdo);
      }
      if (count($_SESSION) != 0){
        include_once("parts/headerLogOut.php");
        include_once("parts/nav.php");
        include_once("parts/perfilBienvenida.php");
        include_once("parts/footer.php");
        include_once("parts/scriptsBootstrap.php");
      }else{
        redirect("login.php");
      }
    ?>
  </body>
</html>