<div class="container">
    <section class="row  text-center ">
      <article class="col-12" >
        <h2>Bienvenido: <?=$_SESSION["nombre"];?></h2>
        <p>
            <img src="imagenes/<?=$_SESSION["avatar"];?>" alt="Foto de <?=$_SESSION["nombre"];?>">
        </p>
        <a href="logout.php">Cerrar Sesión</a>
      </article> 
    </section>
  </div>