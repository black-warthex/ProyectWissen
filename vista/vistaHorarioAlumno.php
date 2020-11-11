<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">    
    <!-- Bootstrap CSS -->  
   <link rel="stylesheet" type="text/css" href="vista/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="vista/css/styleAdministrador.css">
  <link rel="stylesheet" type="text/css" href="vista/css/styleLogProfesor.css">
    <script type="text/javascript" src="vista/js/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="vista/js/logrosProfesor.js"></script>  
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
     <a class="navbar-brand" href="ALUMNO.php">
      <img src="vista/img/dibujo.svg" width="30" height="30" class="d-inline-block align-top" alt="">
      PROYECTO WISSEN 
     </a>  
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">    
      <li class="nav-item">
        <a class="nav-link" id="color-letra-link" href="ALUMNO.php">Mi Perfil</a>  
      </li>  
      <li class="nav-item ">
        <a class="nav-link  activo" id="color-letra-link" href="horarioAlumno.php">Horario<span></span></a>
      </li>   
      <li class="nav-item ">
        <a class="nav-link" id="color-letra-link" href="notasAlumno.php">Notas<span></span></a>
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

  <!-- AQUI NUEVO CODIGO -->
  <div id="particles-js"></div>
<script src="vista/js/lib/stats.js"></script>
<script src="vista/js/particles.js"></script>
<script src="vista/js/app2.js"></script>
<div class="container">
  <h2 class="text-titulo-curso">Tu Horario</h2>
  <p class="">Bienvenido,en este espacio podras visualizar tu horario.</p> 

<div class="container">

      <?php if (isset($curso)) { ?>  
    <h2 class="text-titulo-curso">Horario Curso <?php echo "$curso" ; ?></h2>
<div class="contenedor">        
     <div class="">      
     
     <div class="title_H"><h1>Lunes</h1></div>
      <div class="HorarioP">
          <?php foreach($lunes as $l) {?>             
        
            <?php if ($l[1]=="LIBRE"){ ?>
        <h1 class="">
              <label class="text-hora text-left opaco">Hora <?php echo "$l[5]"; ?></label>                 
              <label class="text-materias"><?php echo "$l[1]"; ?></label>           
        </h1>
           <?php  }else{ ?>
        <h1 class="ocupado">
           <label class="text-hora text-left opaco">Hora <?php echo "$l[5]"; ?></label>                 
          <label class="text-materias"><?php echo "$l[1]"; ?></label>      
        </h1>


        

    
        <?php }} ?>
      
      </div>  
      </div>

      <div class="">      
     
     <div class="title_H"><h1>Martes</h1></div>
      <div class="HorarioP">
          <?php foreach($martes as $l1) {?>             
     <?php if ($l1[1]=="LIBRE"){ ?>
        <h1 class="">
              <label class="text-hora text-left opaco">Hora <?php echo "$l1[5]"; ?></label>                 
              <label class="text-materias"><?php echo "$l1[1]"; ?></label>           
        </h1>
           <?php  }else{ ?>
        <h1 class="ocupado">
           <label class="text-hora text-left opaco">Hora <?php echo "$l1[5]"; ?></label>                 
          <label class="text-materias"><?php echo "$l1[1]"; ?></label>      
        </h1>


        

    
        <?php }} ?>
      </h1>
      </div>  
      </div>

      <div class="">      
     
     <div class="title_H"><h1>Miercoles</h1></div>
      <div class="HorarioP">
          <?php foreach($miercoles as $l2) {?>             
    <?php if ($l2[1]=="LIBRE"){ ?>
        <h1 class="">
              <label class="text-hora text-left opaco">Hora <?php echo "$l2[5]"; ?></label>                 
              <label class="text-materias"><?php echo "$l2[1]"; ?></label>           
        </h1>
           <?php  }else{ ?>
        <h1 class="ocupado">
           <label class="text-hora text-left opaco">Hora <?php echo "$l2[5]"; ?></label>                 
          <label class="text-materias"><?php echo "$l2[1]"; ?></label>      
        </h1>


        

    
        <?php }} ?>
      </div>  
      </div>

      <div class="">      
     
     <div class="title_H"><h1>Jueves</h1></div>
      <div class="HorarioP">
          <?php foreach($jueves as $l3) {?>             
       <?php if ($l3[1]=="LIBRE"){ ?>
        <h1 class="">
              <label class="text-hora text-left opaco">Hora <?php echo "$l3[5]"; ?></label>                 
              <label class="text-materias"><?php echo "$l3[1]"; ?></label>           
        </h1>
           <?php  }else{ ?>
        <h1 class="ocupado">
           <label class="text-hora text-left opaco">Hora <?php echo "$l3[5]"; ?></label>                 
          <label class="text-materias"><?php echo "$l3[1]"; ?></label>      
        </h1>


        

    
        <?php }} ?>
      </div>  
      </div>


      <div class="">      
     
     <div class="title_H"><h1>Viernes</h1></div>
      <div class="HorarioP">
          <?php foreach($viernes as $l4) {?>             
      <?php if ($l4[1]=="LIBRE"){ ?>
        <h1 class="">
              <label class="text-hora text-left opaco">Hora <?php echo "$l4[5]"; ?></label>                 
              <label class="text-materias"><?php echo "$l4[1]"; ?></label>           
        </h1>
           <?php  }else{ ?>
        <h1 class="ocupado">
           <label class="text-hora text-left opaco">Hora <?php echo "$l4[5]"; ?></label>                 
          <label class="text-materias"><?php echo "$l4[1]"; ?></label>      
        </h1>


        

    
        <?php }} ?>
      </div>  
      </div>

    </div>
       
     

           

    
  <?php }else{ ?>

    <div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Lo sentimos!</strong> No pertenece a un curso.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>


  <?php }?>













</div>


</body>
</html>