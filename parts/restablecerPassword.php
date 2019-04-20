<div class="login">
  <div class="col-xs-12 col-md-12 col-lg-12 formulario login">
      <form class="form" action="" method="POST">
        <h2 class="sesion">Restablecer Contraseña</h2>
        <br>
        <div class="form-groups">
          <input type="email" class="form-control" name="email" value="" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ingresar correo">
        </div>
          <br>
        <button type="submit" class="btn btn-primary1 Restablecer">Restablecer Contraseña</button>
        <br><br>
        <div>
          <?php
          if (isset($nuevaPassword)){
            echo "<h5>Su nueva contraseña es: <br>" . $nuevaPassword . "</h5>";
          }else {
            
          }
          ?>
        </div>
      </form>
  </div>
</div>