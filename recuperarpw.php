<?php
include_once("controladores/funciones.php");
if($_POST){
  $errores = validar($_POST);
  if(count($errores)===0){
    $usuario = buscarEmail($_POST["email"]);
    if($usuario ==null){
      $errores["email"]="Usted no esta registrado";
    }else{
      if(password_verify($_POST["passwordLogIn"],$usuario["password"])===false){
        $errores["password"]= "Datos incorrectos";
      }else{
        crearSesion($usuario,$_POST);
        header("location: perfil.php");
      }
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
      restaurarSesion($_COOKIE);
      if (count($_SESSION) != 0){
          header("location:perfil.php");
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

ingresa el email
buscarEmail en DB
Traer usuario
Sobreescribir password con un valor aleatorio
Enviar valor aleatorio por mail
