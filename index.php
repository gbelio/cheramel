<?php
include_once("controladores/funciones.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Cheramel Design</title>
  <link href="https://fonts.googleapis.com/css?family=Arimo:400,700|Great+Vibes" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Julius+Sans+One" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Taviraj" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
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
  <div class="container-fluid p-0">
    <section class="__wrapper-carousel">
      <div id="carouselExampleControls" class="carousel slide carousel-fade" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active slide1">            
            <div class="__text-combo __light">
              <h3>Bienvenidos</h3>
              <p>Cheramel by Santino</p>
            </div>
          </div>
          <div class="carousel-item slide2">
            <div class="__text-combo __light">
                <h3>Bienvenidos</h3>
                <p>Cheramel by Santino</p>
            </div>
          </div>
          <div class="carousel-item slide3">
            <div class="__text-combo __light">
                <h3>Bienvenidos</h3>
                <p>Cheramel by Santino</p>
            </div>
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </section>
    <section class="col-12 col-md-12 col-lg-12 row productos">
      <article class="col-12 col-md-4 col-lg-4">
        <div class="card bg-light text-white">
          <a href="#"><img src="Recursos/Fotos/producto1.jpeg" class="card-img" alt="Producto1">
          <div class="card-img-overlay">
          </div></a>
        </div>
      </article>
      <article class="col-12 col-md-4 col-lg-4">  
        <div class="card bg-light text-white">
          <a href=""><img src="Recursos/Fotos/producto2.jpg" class="card-img" alt="Producto2">
          <div class="card-img-overlay">
          </div></a>
        </div>
      </article>
      <article class="col-12 col-md-4 col-lg-4">  
        <div class="card bg-light text-white">
          <a href=""><img src="Recursos/Fotos/producto3.jpg" class="card-img" alt="Producto3">
          <div class="card-img-overlay">
          </div></a>
        </div>
      </article>
      <article class="col-12 col-md-4 col-lg-4">
        <div class="card bg-light text-white">
          <a href=""><img src="Recursos/Fotos/producto4.jpg" class="card-img" alt="Producto4">
          <div class="card-img-overlay">
          </div></a>
        </div>
      </article>
      <article class="col-12 col-md-4 col-lg-4">  
        <div class="card bg-light text-white">
          <a href=""><img src="Recursos/Fotos/producto5.jpg" class="card-img" alt="Producto5">
          <div class="card-img-overlay">
          </div></a>
        </div>
      </article>
      <article class="col-12 col-md-4 col-lg-4">  
        <div class="card bg-light text-white">
          <a href=""><img src="Recursos/Fotos/producto6.jpg" class="card-img" alt="Producto6">
          <div class="card-img-overlay">
          </div></a>
        </div>
      </article>  
    </section>
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
  </div>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>