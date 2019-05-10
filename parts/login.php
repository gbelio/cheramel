<div class="login">
  <div class="col-xs-12 col-md-12 col-lg-12 formulario login">
      <form class="form" action="" method="POST">
        <h2 class="sesion">Iniciar Sesión</h2>
        <br>
        <div class="form-groups">
          <input type="email" class="form-control" name="email" value="<?=isset($errores["email"])? "": inputUsuario("email");?>" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ingresar correo" autofocus>
        </div>
        <br>
        <div class="form-group">
          <input type="password" class="form-control" name="passwordLogIn" value="" id="exampleInputPassword1" placeholder="**************">
        </div>
        <div class="form-group form-check">
          <br>
          <input type="checkbox" name="recordarme" class="form-check-input" id="exampleCheck1">
          <label class="form-check-label" for="exampleCheck1">Recordarme</label>  
        </div>
        <button type="submit" class="btn btn-primary1 BotonLogIn-Registro">Ingresar</button>
        <br><br>
        <p class="olvidaste"><a href="restablecerPassword.php">¿Olvidaste tu contraseña?</a></p>
      </form>
  </div>
</div>