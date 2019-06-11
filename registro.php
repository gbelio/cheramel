<?php
require 'loader.php';
if($_POST){
  $user = new User (
    $_POST['email'],
    $_POST['password'],
    $_POST['repassword'],
    $_POST['nombre'],
    $_POST['apellido']
  );
  $validator->trimer($user);
  $errores=$validator->validar($user);
  if (count($errores) == 0){
    Database::guardarArchivo($_FILES, $user);
    if(MYSQL::searchUserByEmail($pdo, $user) != null){
      $errores["email"]="La cuenta <b>".$user->getEmail()."</b> se encuentra registrada.";
    }else{
      $user->setPassword(HashPassword::hash($user->getPassword()));
      /*$registro=$factory->armarRegistro($user);
      $db->guardar($registro);*/
      MYSQL::createUser($pdo, $user);
      redirect("login.php");
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
      if (isset($_COOKIE['email'])){
        MYSQL::restoreSession($pdo);
        /*$db->restaurarSesion($_COOKIE);*/
      }
      if (count($_SESSION) != 0){
        redirect("perfil.php");
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