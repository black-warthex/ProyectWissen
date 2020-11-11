<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">    
    <!-- Bootstrap CSS -->  
  <link rel="stylesheet" type="text/css" href="vista/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="vista/css/styleAdministrador.css">
  <script type="text/javascript" src="vista/js/jquery-3.4.1.min.js"></script>  
  <link rel="shortout icon" href="vista/img/dibujo.svg">
  <script type="text/javascript" src="vista/js/mainAdministrador2.js"></script>
  <title>Proyect Wissen</title>    

  <script src="vista/js/bootstrap.min.js"></script>   
  <script src="vista/js/popper.min.js"></script> 
  </head>
  <body>
<nav class="navbar navbar-expand-lg navbar-light ">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
    <!-- Logo -->
     <a class="navbar-brand" href="#">
      <img src="vista/img/dibujo.svg" width="30" height="30" class="d-inline-block align-top" alt="">
      PROYECTO WISSEN 
     </a>  
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">    
      <li class="nav-item">
        <a class="nav-link" id="color-letra-link" href="PROFESOR.php">Mi Perfil</a>  
      </li>  
      <li class="nav-item ">
        <a class="nav-link " id="color-letra-link" href="horarioProfesor.php">Horario<span></span></a>
      </li>   

      <li class="nav-item ">
        <a class="nav-link" id="color-letra-link" href="calificacionProfesor.php">Notas<span></span></a>
      </li>    
      <li class="nav-item ">
        <a class="nav-link activo" id="color-letra-link" href="PQR.php">PQR<span></span></a>
      </li>    
</ul>
       <form action="index.php" class="form-inline my-2 my-lg-0" method="POST">                
        <input  class="nav-link btn-salir " id="text_salir"  type="submit" name="salir" value="Cerrar sesión">
      </form>
      
  </div>
</nav>
  <div id="particles-js"></div>
<script src="vista/js/lib/stats.js"></script>
<script src="vista/js/particles.js"></script>
<script src="vista/js/app2.js"></script>


<div class="container">
<h2 class="text-titulo-curso">Peticiones, Quejas o Reclamos</h2>
<p >Bienvenido,en este espacio podra comunicar las PQR que necesite.</p> 

  <form method="POST">
  <div class="form-group">
    <label for="exampleInputEmail1">Ingrese Asunto</label>
    <input type="text" name="asu" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required="">
    <small id="emailHelp" class="form-text text-muted">Ingrese en pocas palabras el inconveniente presentado</small>
  </div>
   <div class="form-group" >
    <label for="exampleFormControlTextarea1">Descripcion</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" required name="des"></textarea>
    <small id="emailHelp" class="form-text text-muted">Describa el inconveniente presentado</small>
  </div>
    <label for="exampleFormControlTextarea2">Tipo PQR</label>
  <select class="form-control" id="exampleFormControlTextarea2" name="tipo" required>
    <option disabled="true" selected="">Seleccione un tipo</option>
  <option value="Peticion">Peticion</option>
  <option value="Queja">Queja</option>
  <option value="Reclamo">Reclamo</option>
  </select>
  <br>
  <button type="submit" name="reg" class="btn btn-info">enviar</button>
</form>
<br>
<br>  
<br>  
    <?php if(isset($mispqr)){ ?>
      <h2 class="subtitle">TUS PQR</h2><br>

      <?php foreach($mispqr as $m){ ?>

      <div class="card">
  <div class="card-header">
    Titulo <?php echo "$m[1] Tipo $m[5]" ; ?>
  </div>
  <div class="card-body">
    <h5 class="card-title">Descripcion</h5>
    <p class="card-text"><?php echo "$m[2]"; ?></p>
    
     <div class="card-footer text-muted">
    fecha <?php echo "Enviada: $m[6] ESTADO : $m[9]"; ?> 
    <?php  if($m[9]=="Resuelto"){ ?>
      Su PQR fue contestada :<br>
       <?php echo "fecha de Respuesta $m[8]"; ?><br>
       <?php echo "Respuesta: $m[7]"; ?>
    <?php } ?>
  </div>

  </div>
</div><br>
  <?php } ?>
  <?php }else{ ?>
    <div class="alert alert-success" role="alert">
  <h4 class="alert-heading">No tienes PQR!</h4>
  <p>Si tienes alguna inquietud puedes comunicarla por medio de los PQR.</p>
  <hr>
  <p class="mb-0">Tus comentarios nos ayudan a mejorar cada dia.</p>
</div>
  <?php } ?>  
</div>

</body>
</html>