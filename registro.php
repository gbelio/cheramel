<?php
include_once("controladores/funciones.php");
if($_POST){
  $datos=trimer($_POST);
  $errores=validar($datos);
  $avatarUsuario = guardarArchivo($_FILES, $_POST);
  if (count($errores) == 0){
    $usuario = buscarEmail($_POST["email"]);
      if($usuario != null){
        $errores["email"]="La cuenta <b>".$_POST["email"]."</b> se encuentra registrada.";
      }else{
        $registro=armarRegistro($_POST, $avatarUsuario);
        guardar($registro);
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
      restaurarSesion($_COOKIE);
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