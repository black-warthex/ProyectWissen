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
        <a class="nav-link activo" id="color-letra-link" href="horarioProfesor.php">Horario<span></span></a>
      </li>   
      <li class="nav-item ">
        <a class="nav-link" id="color-letra-link" href="calificacionProfesor.php">Notas<span></span></a>
      </li> 
            <li class="nav-item ">
        <a class="nav-link" id="color-letra-link" href="PQR.php">PQR<span></span></a>
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
  <!-- AQUI NUEVO CODIGO -->
<div class="container"> 
<h2 class="text-titulo-curso">Horario Asignado</h2>
<p>Bienvenido, en este espacio puedes visualizar tu horario asignado, el cual se encuentra organizado de primer a ultima hora.</p> 
</div>
<div class="contenedor">        
     <div class="">      
     
     <div class="title_H"><h1>Lunes</h1></div>
      <div class="HorarioP">
      <?php foreach ($horario as $h) { ?>
      
      <h1>
      <?php            
        if ($h[6]==1) {
          echo "Hora Libre";
        }else{ ?>
          <h1 class="ocupado">
          <?php echo "$h[1] \nCurso: $h[0]";  ?>     
          </h1>  
        <?php

        }        
         ?>          
      <?php } ?>
      </h1>
      </div>  
      </div> 

         <div class="">      
     
     <div class="title_H"><h1>Martes</h1></div>
      <div class="HorarioP">
      <?php foreach ($horarioMar as $hma) { ?>
      
      <h1>
      <?php            
        if ($hma[6]==1) {
          echo "Hora Libre";
        }else{ ?>
          <h1 class="ocupado">
          <?php echo "$hma[1] \nCurso: $hma[0]";  ?>     
          </h1>  
        <?php

        }        
         ?>          
      <?php } ?>
      </h1>
      </div>  
      </div> 


       <div class="">      
     
     <div class="title_H"><h1>Miercoles</h1></div>
      <div class="HorarioP">
      <?php foreach ($horarioMie as $hmi) { ?>
      
      <h1>
      <?php            
        if ($hmi[6]==1) {
          echo "Hora Libre";
        }else{ ?>
          <h1 class="ocupado">
          <?php echo "$hmi[1] \nCurso: $hmi[0]";  ?>     
          </h1>  
        <?php

        }        
         ?>          
      <?php } ?>
      </h1>
      </div>  
      </div> 

       <div class="">      
     
     <div class="title_H"><h1>Jueves</h1></div>
      <div class="HorarioP">
      <?php foreach ($horarioJue as $hj) { ?>
      
      <h1>
      <?php            
        if ($hj[6]==1) {
          echo "Hora Libre";
        }else{ ?>
          <h1 class="ocupado">
          <?php echo "$hj[1] \nCurso: $hj[0]";  ?>     
          </h1>  
        <?php

        }        
         ?>          
      <?php } ?>
      </h1>
      </div>  
      </div> 

    <div class="">      
     
     <div class="title_H"><h1>Viernes</h1></div>
      <div class="HorarioP">
      <?php foreach ($horarioVie as $hv) { ?>
      
      <h1>
      <?php            
        if ($hv[6]==1) {
          echo "Hora Libre";
        }else{ ?>
          <h1 class="ocupado">
          <?php echo "$hv[1] \nCurso: $hv[0]";  ?>     
          </h1>  
        <?php

        }        
         ?>          
      <?php } ?>
      </h1>
      </div>  
      </div> 


    </div>

  </body>
</html>


