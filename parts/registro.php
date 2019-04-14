<div class="login">
  <div class="col-xs-12 col-md-12 col-lg-12 formulario login">
    <form class="form" action="" method="POST" enctype="multipart/form-data">
      <h2 class="sesion">Crear Cuenta</h2>
      <br>
      <div class="form-groups">
        <input type="text" class="form-control" id="nombre" name="nombre" value="<?=isset($errores["nombre"])? "": inputUsuario("nombre");?>" placeholder="Nombre" autofocus required>
        <br>
        <input type="text" class="form-control" id="apellido" name="apellido" value="<?=isset($errores["apellido"])? "": inputUsuario("apellido");?>" placeholder="Apellido" required>
        <br>
        <input type="email" class="form-control" id="email" name="email" value="<?=isset($errores["email"])? "": inputUsuario("email");?>" placeholder="Email" required>
        <br>
        <div class="custom-file">
          <input type="file" class="custom-file-input" id="avatar" name="avatar" value="<?=isset($errores["avatar"])? "": inputUsuario("avatar");?>" placeholder="Seleccione una imagen" required>
          <label class="custom-file-label" for="customFileLang"></label>
        </div>
        <br><br>
        <input type="password" class="form-control" id="password" name="password" value="" placeholder="Contraseña" required>  
        <br>
        <input type="password" class="form-control" id="repassword" name="repassword" value="" placeholder="Confirmar Contraseña" required>
      </div>
        <br>
      <div class="col-xs-12">
        <button type="submit" class="btn btn-primary1 col-xs-6">Enviar</button>
        <button type="reset" class="btn btn-primary1 col-xs-6">Limpiar</button>
      </div>
    </form>
  </div>
</div>