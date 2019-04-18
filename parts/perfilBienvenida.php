<div class="container">
  <section class="row">
    <article class="col-12 col-lg-4">
      <h2>Bienvenide <?=$_SESSION["nombre"];?></h2>
      <img src="imagenes/<?=$_SESSION["avatar"];?>" alt="Foto de <?=$_SESSION["nombre"];?>">
      <br><br>
      <?php
        include_once("parts/mostrarErrores.php");        
      ?>
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
            <input type="file" class="" id="avatar" accept="image/png,image/jpg" name="avatar" value="<?=$_SESSION["avatar"];?>" placeholder="<?=$_SESSION["avatar"];?>">
            <br><br>
            <input type="password" class="form" id="password" name="password" value="" placeholder="Contraseña">
            <br><br>
            <input type="password" class="form" id="repassword" name="repassword" value="" placeholder="Confirmar Contraseña">
            <br><br>
            <div class="col-xs-12">
              <button type="submit" class="btn btn-primary1 col-xs-6">Guardar</button>
              <button type="reset" class="btn btn-primary1 col-xs-6">Limpiar</button>
            </div>
          </form>
        </div>
      </div>
    </article> 
  </section>
</div>