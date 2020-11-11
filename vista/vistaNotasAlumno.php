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
        <a class="nav-link" id="color-letra-link" href="horarioAlumno.php">Horario<span></span></a>
      </li>   
      <li class="nav-item ">
        <a class="nav-link activo" id="color-letra-link" href="notasAlumno.php">Notas<span></span></a>
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
  <h2 class="text-titulo-curso">Reporte de Notas</h2>
  <p class="">Bienvenido,en este espacio podras visualizar tus notas.</p> 
      <?php if (isset($curso)){ ?>
                
          
        

         <form method="POST">                               
    <p class="campo_dato es">Materia</p>  
    <input type="hidden" name="curso_al" value="<?php echo "$curso"?>">  
    <select class="campo int" name="materiaSelect" required>   
      <option disabled="true" selected>Seleccione una materia</option>
      <?php foreach($materias as  $m){ ?>                    
      <option value="<?php echo "$m[0]"?>"><?php echo "$m[1]"?></option>      
      <?php } ?>
    </select>
    <p class="campo_dato es">Periodo Academico</p>    
    <select class="campo int" name="periodo" required>   
      <option disabled="true" selected>Seleccione una periodo academico</option>
      <option value="I PERIODO">I PERIODO</option>
      <option value="II PERIODO">II PERIODO</option>
      <option value="III PERIODO">III PERIODO</option>
      <option value="IV PERIODO">IV PERIODO</option>
    </select>               <br>     
    <input type="submit"  class="btn btn-info" name="buscar" value="buscar">
  </form>
<?php if ($mostrar==1) { ?>
      <?php 

      $alu_logros=$cal->logros_alumno($codigo,$materia,$periodo);
         if(count($alu_logros)>0){
      foreach ($alu_logros as $alog){
      ?>
      <table>
        <tr>
        <td class="log"><?php echo "$alog[5]";?></td>
        <?php  switch ($alog[2]) {
          case 'NO CALIFICADO':
            $califica="NO_CALIFICADO";
            break;
          case 'APROBADO':
            $califica="APROBADO";
            break;
          case 'NO APROBADO':
            $califica="NO_APROBADO";
            break;                                  
          default:
            # code...
            break;
        } ?>
        <td class="<?php echo "$califica";?>"><?php echo "$alog[2]";?></td>
        
        </tr>
      <p></p>
      </table>
      <?php } ?>      

<?php }else{ ?>
  <br>
  <div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Lo sentimos!</strong> Este periodo no tiene logros asignados.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>

<?php } ?>
  </div> 

<?php } ?>          

      <?php }else{ ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Lo sentimos!</strong> No estas matriculado a ningun curso.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
        
      <?php } ?>
    
    </div>
  </body>
</html>


