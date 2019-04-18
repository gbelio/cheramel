<?php
include_once("controladores/funciones.php");
if($_POST){
  $datos=trimer($_POST);
  $errores=validar($datos);
  $avatarUsuario = guardarArchivo($_FILES, $_POST);
  if (count($errores) == 0){
    editarUsuario($_SESSION["email"]);
    $usuario=buscarEmail($_SESSION["email"]);
    crearSesion($usuario,$_POST);
    usleep(10);
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
      restaurarSesion($_COOKIE);
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