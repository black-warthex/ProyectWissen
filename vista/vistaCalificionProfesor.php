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
     <a class="navbar-brand" href="ADMINISTRADOR.php">
      <img src="vista/img/dibujo.svg" width="30" height="30" class="d-inline-block align-top" alt="">
      PROYECTO WISSEN 
     </a>  
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">    
      <li class="nav-item">
        <a class="nav-link " id="color-letra-link" href="ADMINISTRADOR.php">Mi Perfil</a>  
      </li>  
      <li class="nav-item ">
        <a class="nav-link" id="color-letra-link" href="horarioProfesor.php">Horario<span></span></a>
      </li>    

         <li class="nav-item ">
        <a class="nav-link activo"  id="color-letra-link" href="calificacionProfesor.php">Notas<span></span></a>
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
<h2 class="text-titulo-curso">Gestion de Notas</h2>
<p >Bienvenido,podra en este espacio calificar los logros de tus alumnos.</p> 
  <form method="POST">                  
    <p class="campo_dato es">Cursos asignados.</p>    
    <select class="campo int" name="curso" required onChange="this.form.submit()">   
      <option disabled="true" selected>Seleccione un curso</option>
      <?php foreach($cursos as  $c){ ?>                    
      <option value="<?php echo "$c[0]"?>"><?php echo "$c[0]"?></option>      
      <?php }?>
    </select>                    
  </form>

  <?php if (isset($materias)!=0){ ?>

 <form method="POST">                  
    <p class="campo_dato es">Curso: <?php echo "$curso"?></p>    
    <p class="campo_dato es">Materia</p>  
    <input type="hidden" name="curso_al" value="<?php echo "$curso"?>">  
    <select class="campo int" name="materiaSelect" required>   
      <option disabled="true" selected>Seleccione una materia</option>
      <?php foreach($materias as  $m){ ?>                    
      <option value="<?php echo "$m[0]"?>"><?php echo "$m[1]"?></option>      
      <?php }?>
    </select>
    <p class="campo_dato es">Periodo Academico</p>    
    <select class="campo int es" name="periodo" required>   
      <option disabled="true" selected>Seleccione una periodo academico</option>
      <option value="I PERIODO">I PERIODO</option>
      <option value="II PERIODO">II PERIODO</option>
      <option value="III PERIODO">III PERIODO</option>
      <option value="IV PERIODO">IV PERIODO</option>
    </select>                    <br>
    <input type="submit"  class="btn btn-info" name="buscar_alumnos" value="buscar">
  </form>
   
  <?php } ?>
  <?php if(isset($alumnos)){ ?>
    <?php
    //curso de los alumnos 
     foreach ($alumnos as $alc) {
        $curso=$alc[4];
     }

     if (count($alumnos)>0){

  ?>
  <h2 class="subtitle_log">Curso <?php echo "$curso";?> </h2>


  <?php foreach($alumnos as $alu){ ?>

  <div class="title_mat"><h2 class="alum"><?php echo "Documento: $alu[1] $alu[2] $alu[3]";?></h2></div>
  <!-- VER LOGROS -->
  <div class="content_view">  
    <?php 

      $alu_logros=$cal->logros_alumno($alu[0],$materia,$periodo);
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
      
       <button class="agregar btn btn-outline-info es">calificar</button>

<?php }else{ ?>
<h2>No hay logros asignados.</h2>
<?php } ?>
  </div>  
  <div class="content_edit">
    <form action="" method="POST">
      <input type="hidden" name="codigoAlumno" value="<?php echo "$alu[0]";?>">
    <?php foreach ($alu_logros as $aluCal){ ?>
            <input type="hidden" name="codigo_logro[]" value="<?php echo "$aluCal[3]";?>">
            <table>
            <tr>
              <td class="log">
           <label><?php echo "$aluCal[5]";?>
           </td>
<td class="log">
      <select name="calificacion_log[]">
        <?php switch ($aluCal[2]) {
          case 'NO CALIFICADO':
              ?>
              <option value="NO CALIFICADO" selected="" class="NO_CALIFICADO">NO CALIFICADO</option>
              <option value="APROBADO" class="APROBADO">APROBADO</option>
              <option value="NO APROBADO" class="NO_APROBADO">NO APROBADO</option>
              <?php
            break;

          case 'APROBADO':
              ?>
              <option value="NO CALIFICADO" class="NO_CALIFICADO">NO CALIFICADO</option>
              <option value="APROBADO" selected class="APROBADO">APROBADO</option>
              <option value="NO APROBADO" class="NO_APROBADO">NO APROBADO</option>
              <?php
            break;

          case 'NO APROBADO':
            ?>
              <option value="NO CALIFICADO" class="NO_CALIFICADO">NO CALIFICADO</option>
              <option value="APROBADO" class="APROBADO">APROBADO</option>
              <option value="NO APROBADO" class="NO_APROBADO" selected>NO APROBADO</option>
              <?php
            
            break;
          
          default:
          
            break;
        } 
          
         ?>
       
      </select>

    </label></td> 
    </tr>
    </table>
    <?php } ?> 
    <input type="button" class="back btn btn-secondary es" name="back" value="atras">
    <input type="submit"  class="btn btn-primary es" name="agregar" value="guardar">  
    </form>    
  </div>
  <?php }}else{ ?>

    <h2>Lo sentimos el curso <?php echo "$curso_al" ?> no tiene alumnos matriculados.</h2>
  <?php } } ?>
  

<br>

</div>

  </body>
</html>



