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
    header("location:perfil.php");
  }
}
?>
<div class="container">
  <section class="row">
    <?php
    include_once("parts/mostrarErrores.php");
    ?>
    <article class="col-12 col-lg-4">
      <h2>Bienvenido: <?=$_SESSION["nombre"];?></h2>
      <img src="imagenes/<?=$_SESSION["avatar"];?>" alt="Foto de <?=$_SESSION["nombre"];?>">
    </article>
    <article class="col-12 col-lg-8">
      <div class="login">
        <div class="col-xs-12 col-md-12 col-lg-12 formulario login">
          <form class="form" action="" method="POST" enctype="multipart/form-data">
            <h2 class="sesion">Editar Cuenta</h2>
            <br>
            <div class="form-groups">
            <input type="text" class="form-control" id="nombre" name="nombre" value="<?=$_SESSION["nombre"];?>" value="<?=isset($errores["apellido"])? "": inputUsuario("nombre");?>" placeholder="" autofocus required>
            <br>
            <input type="text" class="form-control" id="apellido" name="apellido" value="<?=$_SESSION["apellido"];?>" value="<?=isset($errores["apellido"])? "": inputUsuario("apellido");?>" placeholder="" required>
            <br>
            <input type="email" class="form-control" readonly="readonly" id="email" name="email" value="<?=$_SESSION["email"];?>" value="<?=isset($errores["email"])? "": inputUsuario("email");?>" placeholder="<?=$_SESSION["email"];?>" required>
            <br>
            <input type="file" class="" id="avatar" name="avatar" value="<?=$_SESSION["avatar"];?>" value="<?=isset($errores["avatar"])? "": inputUsuario("avatar");?>" placeholder="<?=$_SESSION["avatar"];?>">
            <br><br>
            <input type="password" class="form" id="password" name="password" value="" placeholder="Contraseña">
            <br>
            <br>
            <input type="password" class="form" id="repassword" name="repassword" value="" placeholder="Confirmar Contraseña">
            <br>
            <div class="col-xs-12">
              <button type="submit" class="btn btn-primary1 col-xs-6">Editar</button>
              <button type="reset" class="btn btn-primary1 col-xs-6">Limpiar</button>
            </div>
          </form>
        </div>
      </div>
    </article> 
  </section>
</div>