<?php
include_once("controladores/funciones.php");
if($_POST){
  $errores = validar($_POST);
  if(count($errores)===0){
    $usuario = buscarEmail($_POST["email"]);
    if($usuario ==null){
      $errores["email"]="Usted no esta registrado";
    }else {
      if(password_verify($_POST["password"],$usuario["password"])===false){
        $errores["password"]= "Datos incorrectos";
      }else {
        crearSesion($usuario,$_POST);
        header("location: perfil.php");
      }
    }
  }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/estilos.css">
    <link href="https://fonts.googleapis.com/css?family=Alegreya+Sans|Satisfy" rel="stylesheet">
    <title>Login</title>
</head>
<body class="bodylogin">
  <header class="encabezado">
    <nav class="main-nav">
      <ul>
        <li><a href="registro.php">CREAR CUENTA</a></li>
        |
        <li><a href="login.php">INICIAR SESIÓN</a></li>
      </ul>
    </nav>
  </header>
  <nav class="navbar navbar-expand-lg navbar-light">
    <a class="navbar-brand" href="index.php">
      <h1> <img src="img/LOGO.jpg" alt=""></h1>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-md-auto">
        <li class="nav-item active">
          <a class="nav-link" href="index.php">Inicio <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contactos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Productos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Quiénes Somos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Cómo comprar</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="preguntas.php">Preguntas Frecuentes</a>
        </li>
      </ul>
    </div>
  </nav>
  <?php
      if(isset($errores)):?>
        <ul class="alert alert-danger">
          <?php
          foreach ($errores as $key => $value) :?>
            <li> <?=$value;?> </li>
            <?php endforeach;?>
        </ul>
      <?php endif;?>
<div class="login">
  <div class="col-xs-12 col-md-12 col-lg-12 formulario login">
      <form class="form" action="" method="POST">
        <h2 class="sesion">Iniciar Sesión</h2>
        <br>
        <div class="form-groups">
          <input type="email" class="form-control" name="email" value="" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ingresar correo">
        </div>
        <br>
        <div class="form-group">
          <input type="password" class="form-control" name="password" value="" id="exampleInputPassword1" placeholder="**************">
        </div>
        <div class="form-group form-check">
          <br>
          <input type="checkbox" name="recordarme" class="form-check-input" id="exampleCheck1">
          <label class="form-check-label" for="exampleCheck1">Recordarme</label>  
        </div>
        <button type="submit" class="btn btn-primary1">Ingresar</button>
        <br><br>
        <p class="olvidaste"><a href="#">¿Olvidaste o bloqueaste tu contraseña?</a></p>
      </form>
  </div>
</div>
<footer>
    <section class="__wrapper-contact">
      <div class="row __max-width px-md-4">
        <article class="col-12 text-center col-sm-6 text-sm-left text-md-left col-lg-3">
          <h4>CONTACTANOS</h4>
          <p><strong>cherameliedg@gmail.com</strong><br>+54 11 1234 5678</p>
        </article>
        <article class="col-12 text-center col-sm-6 text-sm-left text-md-left col-lg-3">
          <h4>DIRECCION</h4>
          <p><strong>Calle Falsa 123</strong><br>CABA</p>
        </article>
        <article class="col-12 text-center col-sm-6 text-sm-left text-md-left col-lg-3">
          <h4>HORARIOS</h4>
          <p><strong>Lunes a Viernes</strong><br>De 9:00 a 20:00 hs</p>
        </article>
        <article class="col-12 text-center col-sm-6 text-sm-left text-md-left col-lg-3">
          <h4>NEWSLETTER</h4>
          <p><strong>Subscribite para recibir promos!</strong><br></p>
        </article>
        <article class="col-12 col-sm-12 col-lg-12">
          <div class="redes">
            <a href="http://www.facebook.com"><img class="size" src="img/facebook.png" alt="facebook"></a>
            <a href="http://www.instagram.com"><img class="size" src="img/instagram.png" alt="instagram"></a>
            <a href="https://web.whatsapp.com/send?phone=+541166793520&text=Hola!"><img class="sizedesktop" src="img/whatsapp.png" alt="whatsapp"></a>
            <a href="https://wa.me/541166793520?text=Hola"><img class="sizemobile" src="img/whatsapp.png" alt="whatsapp"></a>
          </div>
        </article>
      </div>
    </section>
    <section class="__wrapper-copyright">
      <div class="row __max-width">
        <div class="col-12 text-center">
          <small>© 2019 <strong>Cheramel</strong>. Todos los derechos reservados</small>
        </div>
      </div>
    </section>
  </footer>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>