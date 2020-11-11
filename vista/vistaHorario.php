<!doctype html>
<html lang="en">
<head>    
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">    
  <!-- Bootstrap CSS -->  
  <link rel="stylesheet" type="text/css" href="vista/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="vista/css/styleAdministrador.css">
  <script type="text/javascript" src="vista/js/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="vista/js/mainAdministrador2.js"></script>      
  <script src="vista/js/envioAjax.js"></script>
  <script src="vista/js/bootstrap.min.js"></script>   
  <script src="vista/js/popper.min.js"></script>   
  <script src="vista/js/sweetalert.min.js"></script>
  <link rel="shortout icon" href="vista/img/dibujo.svg">
    <title>Proyect Wissen</title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light ">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarTogglerDemo01">  
     <a class="navbar-brand" href="#">
      <img src="vista/img/dibujo.svg" width="30" height="30" class="d-inline-block align-top" alt="">
      PROYECTO WISSEN 
     </a>  
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">    
      <li class="nav-item">
        <a class="nav-link " id="color-letra-link" href="ADMINISTRADOR.php">Mi Perfil</a>  
      </li>  
      <li class="nav-item ">
        <a class="nav-link activo" id="color-letra-link" href="horario.php">Horarios<span></span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="color-letra-link" href="curso.php">Cursos</a>
      </li>      
      <li class="nav-item">
        <a class="nav-link" id="color-letra-link" href="materia.php">Materias</a>
      </li>      
      <li class="nav-item">
        <a class="nav-link  " id="color-letra-link" href="matricula.php">Matriculas</a>
      </li>      
      <li class="nav-item">
        <a class="nav-link" id="color-letra-link" href="comentario.php">Comentarios</a>  
      </li>
       <li class="nav-item">
        <a class="nav-link" id="color-letra-link" href="logrosProfesor.php">Logros</a>  
      </li>  
       <li class="nav-item">
        <a class="nav-link" id="color-letra-link" href="horarioP.php">Profesores</a>  
      </li> 
      <li class="nav-item">
        <a class="nav-link" id="color-letra-link" href="lista.php">Alumnos</a>  
      </li> 
        <li class="nav-item">
        <a class="nav-link" id="color-letra-link" href="APQR.php">PQR</a>  
      </li>    
    <li class="nav-item">      
    <button  type="button" class="btn btn-outline-info nav-link" data-toggle="modal" data-target="#modalReg">Registrar</button>  
  </li>
  </ul>  
  <form action="index.php" class="form-inline my-2 my-lg-0" method="POST">                
    <input  class="nav-link btn-salir " id="text_salir"  type="submit" name="salir" value="Cerrar sesión">
  </form>      
  </div>
</nav>
<!-- REGISTRO MODAL -->
<!-- Modal -->
<div class="modal fade" id="modalReg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Registro de Personal</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="" method="POST">
          <h1 class="text-center">Datos de Usuario</h1>
      
        <label class="campo_dato es">usuario</label>
          <input type="text" name="usu" class="campo" required>
        <label class="campo_dato es">clave</label>
          <input type="password" name="cla" class="campo" required>      
        <h1 class="text-center">Datos Personales</h1>
      
        <label class="campo_dato es">Tipo Documento</label>
          <select  name="tipdoc" class="campo" required>
            <option disabled="true" selected="true">seleccione un tipo</option>
            <option value="CC">Cédula</option>
            <option value="TI">Tarjeta de Identidad</option>
          </select>
        <label class="campo_dato es">Documento</label>
          <input type="text" name="doc" class="campo" required>
        <label class="campo_dato es">Nombre</label>
          <input type="text" name="nom" class="campo" required pattern="[A-Za-z ]+"  title="solo puede contener letras">
        <label class="campo_dato es">Apellido</label>
          <input type="text" name="ape" class="campo" required >
        <label class="campo_dato es">Tipo Rh</label>
          <select  class="campo" name="rh">
            <option value="O+">O+</option>
            <option value="O-">O-</option>
            <option value="A+">A+</option>
            <option value="A-">A-</option>
            <option value="B+">B+</option>
            <option value="B-">B-</option>
            <option value="AB+">AB+</option>
            <option value="AB-">AB-</option>
          </select>
        <label class="campo_dato es">Fecha de Nacimiento</label>
          <input type="date" class="campo" name="fec" value="1949-01-01" title="Minimo debe tener 18 años, el rango de edad es de 1949 a 2001" min="1949-01-01" max="2001-12-31" required>      
        <label class="campo_dato es">Rol</label>        
        <select name="rol" class="campo " required>
          <option selected="true" disabled="true">Seleccione un rol</option>
          <option value="1">Profesor</option>
          <option value="4">Administrador</option>
        </select>      
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">cerrar</button>
        <button type="submit" class="btn btn-primary" name="regPersonal">Registrar</button>        
        </form>
      </div>
    </div>
  </div>
</div>

<!-- FIN REGISTRO -->
<div id="particles-js"></div>
<div class="container">
  
  <h1>Gestion de Horarios</h1>
  <p>Bienvenido a este modulo, donde se te permite modificar el horario de el curso que elijas o solo   visualizarlo</p>
  <form method="POST">

    <div class="buscar_horario">                
      <p class="text_horario">Seleccione un curso</p>
      <select class="campo" name="curso" required onChange="this.form.submit()">
        <option disabled="true" selected>Seleccione un curso</option>
        <?php foreach($cursos as  $cur){
        if ($cur[1]!=0){ ?>
          <option value="<?php echo "$cur[1]"?>"><?php echo "$cur[1]"?></option><?php }} ?>
      </select>        
    </div>
  </form></br>

<?php if (isset($_POST['curso'])) { ?>
  <h1 class="text-titulo-curso center">Horario Curso  <?php echo "$curso"?></h1>
    <p class="titulo-dia lunes">Lunes</p>

      <div class="columna">
        <?php foreach($lunes as $l) {?>          
        <form method="POST">
          <input type="hidden" class="codCur" value="<?php echo "$l[0]"; ?>">
          <input type="hidden" class="codDia" value="<?php echo "$l[4]"; ?>">
          <input type="hidden" class="codHor" value="<?php echo "$l[5]"; ?>">

        <div class="hora_oculta">                        
          <label class="text-hora-2">Hora: <?php echo "$l[3]"; ?></label>
          <select class="codMateria campo">
            <option selected value="<?php echo "$l[6]" ?>"><?php echo "$l[1]" ?></option>
              <option value="1">LIBRE</option>
              <?php foreach ($materias as $mat) { ?>
                <option value="<?php echo "$mat[0]" ?>" ><?php echo "$mat[1]" ?></option> 
              <?php } ?>                  
          </select>              
          <select class="codProfesorMat campo">
            <?php if ($l[8]==0){?>
              <option value="0">Profesor: SIN ASIGNAR</option>
            <?php }else{?>
              <option value="<?php echo "$l[8]"; ?>" >Profesor: <?php echo "$l[8]"; ?> </option>
            <?php }?>         
            <?php foreach ($profesoresH as $pr) {?>                                
              <option value="<?php  echo "$pr[0]"; ?>"><?php  echo "$pr[1]  $pr[2]"; ?></option>
            <?php }?>
          </select>
            <button type="button" class="btn-editarMat btn btn-sm" name="btn-editar-hora"><img class="imgg" src="vista/img/confirm.png" /></button>                   
        </div>

        <div class="materia-hora">
          <label class="text-hora text-left opaco">Hora: <?php echo "$l[3]"; ?></label>
          <label class="text-materias"><?php echo "$l[1]"; ?></label>                   
          <?php if ($l[8]==0){?>
          <label class="text-materias line">Profesor: SIN ASIGNAR</label>
          <?php }else{?>
          <label class="text-materias line">Profesor: <?php echo "$l[8]"; ?> </label>
          <?php }?>
        </div>
        </form>
        <?php } ?>                
        <button class="btn-editarPrin btn btn-warning"><img class="imgg" src="vista/img/engranaje.png" /> Editar</button>
        <button class="btn btn-warning back blanco volver"><img class="imgg" src="vista/img/back.png" /> Atras</button>
      </div>

    <!-- MARTES -->        
    <p class="titulo-dia martes">Martes</p>

      <div class="columna">
        <?php foreach($martes as $l1) {?>          
        <form method="POST">
          <input type="hidden" class="codCur" value="<?php echo "$l1[0]"; ?>">
          <input type="hidden" class="codDia" value="<?php echo "$l1[4]"; ?>">
          <input type="hidden" class="codHor" value="<?php echo "$l1[5]"; ?>">                   

        <div class="hora_oculta">                        
          <label class="text-hora-2">Hora: <?php echo "$l1[3]"; ?></label>
          <select class="ediMat codMateria campo">
            <option selected value="<?php echo "$l1[6]" ?>"><?php echo "$l1[1]" ?></option>
            <option value="1">LIBRE</option>
            <?php foreach ($materias as $mat) { ?>
              <option value="<?php echo "$mat[0]" ?>" ><?php echo "$mat[1]" ?></option>
            <?php } ?>
          </select>                                     
          <select class="codProfesorMat campo">                    
            <?php if ($l1[8]==0){?>
              <option value="0">Profesor: SIN ASIGNAR</option>
            <?php }else{?>
              <option value="<?php echo "$l1[8]"; ?>" >Profesor: <?php echo "$l1[8]"; ?></option>
            <?php }?>         
            <?php foreach ($profesoresH as $pr) {?>                                
              <option value="<?php  echo "$pr[0]"; ?>"><?php  echo "$pr[1]  $pr[2]"; ?></option> 
            <?php }?>
          </select>     
          <button type="button" class="btn-editarMat btn btn-sm" name="btn-editar-hora"><img class="imgg" src="vista/img/confirm.png" /></button>  
        </div>

        <div class="materia-hora">
          <label class="text-hora text-left opaco">Hora: <?php echo "$l1[3]"; ?></label>
          <label class="text-materias"><?php echo "$l1[1]"; ?></label>                     
          <?php if ($l1[8]==0){?>
            <label class="text-materias line">Profesor: SIN ASIGNAR</label>
          <?php }else{?>
            <label class="text-materias line">Profesor: <?php echo "$l1[8]"; ?> </label>
          <?php }?>
        </div>                                                                               
        </form>
        <?php }?>                
        <button class="btn-editarPrin btn btn-warning"><img class="imgg" src="vista/img/engranaje.png" /> Editar</button>
        <button class="btn btn-warning back blanco volver"><img class="imgg" src="vista/img/back.png" /> Atras</button>
        </div>  



    <!-- MIERCOLES -->
    <p class="titulo-dia miercoles">Miercoles</p>

      <div class="columna">
        <?php foreach($miercoles as $l2) {?>          
        <form method="POST"> 
          <input type="hidden" name="codCur" class="codCur"  value="<?php echo "$l2[0]"; ?>">
          <input type="hidden" name="codDia" class="codDia"  value="<?php echo "$l2[4]"; ?>">
          <input type="hidden" name="codHor" class="codHor"  value="<?php echo "$l2[5]"; ?>">

        <div class="hora_oculta">                        
          <label class="text-hora-2">Hora: <?php echo "$l2[3]"; ?></label>
          <select class="codMateria campo">
            <option selected value="<?php echo "$l2[6]" ?>"><?php echo "$l2[1]" ?></option>
            <option value="1">LIBRE</option>
            <?php foreach ($materias as $mat) { ?>
              <option value="<?php echo "$mat[0]" ?>" ><?php echo "$mat[1]" ?></option>
            <?php } ?>
          </select>                 
          <select class="codProfesorMat campo" >                    
          <?php if ($l2[8]==0){?>
            <option value="0">Profesor: SIN ASIGNAR</option>
          <?php }else{?>
            <option value="<?php echo "$l2[8]"; ?>" >Profesor: <?php echo "$l2[8]"; ?> </option>
          <?php }?>         
          <?php foreach ($profesoresH as $pr) {?>                                
            <option value="<?php  echo "$pr[0]"; ?>"><?php  echo "$pr[1]  $pr[2]"; ?></option>
          <?php }?>
          </select>     
          <button type="button" class="btn-editarMat btn btn-sm" name="btn-editar-hora"><img class="imgg" src="vista/img/confirm.png" /></button>                        
        </div>

        <div class="materia-hora">
          <label class="text-hora text-left opaco">Hora: <?php echo "$l2[3]"; ?></label>
          <label class="text-materias"><?php echo "$l2[1]"; ?></label>                     
          <?php if ($l2[8]==0){?>
            <label class="text-materias line">Profesor: SIN ASIGNAR</label>
          <?php }else{?>
            <label class="text-materias line">Profesor: <?php echo "$l2[8]"; ?> </label>
          <?php }?>
        </div>                                                                     
        </form>
        <?php }?>                                                                    
        <button class="btn-editarPrin btn btn-warning"><img class="imgg" src="vista/img/engranaje.png" /> Editar</button>
        <button class="btn btn-warning back blanco volver"><img class="imgg" src="vista/img/back.png" /> Atras</button>
      </div>  

    <!-- JUEVES -->
    <p class="titulo-dia jueves">Jueves</p>

      <div class="columna">
        <?php foreach($jueves as $l3) {?>          
        <form method="POST">
          <input type="hidden" name="codCur" class="codCur" value="<?php echo "$l3[0]"; ?>">
          <input type="hidden" name="codDia" class="codDia"  value="<?php echo "$l3[4]"; ?>">
          <input type="hidden" name="codHor" class="codHor"  value="<?php echo "$l3[5]"; ?>">                    
        <div class="hora_oculta">                        
          <label class="text-hora-2">Hora: <?php echo "$l3[3]"; ?></label>
          <select class="codMateria campo">
            <option selected value="<?php echo "$l3[6]" ?>"><?php echo "$l3[1]" ?></option>
            <option value="1">LIBRE</option>
            <?php foreach ($materias as $mat) { ?>
              <option value="<?php echo "$mat[0]" ?>" ><?php echo "$mat[1]" ?></option>
            <?php } ?>
          </select>                       
          <select class="codProfesorMat campo">                    
            <?php if ($l3[8]==0){?>
              <option value="0">Profesor: SIN ASIGNAR</option>
            <?php }else{?>
              <option value="<?php echo "$l3[8]"; ?>" >Profesor: <?php echo "$l3[8]"; ?> </option>
            <?php }?>         
            <?php foreach ($profesoresH as $pr) {?>                                
              <option value="<?php  echo "$pr[0]"; ?>"><?php  echo "$pr[1]  $pr[2]"; ?></option>
            <?php }?>
          </select>     
          <button type="button" class="btn-editarMat btn btn-sm" name="btn-editar-hora"><img class="imgg" src="vista/img/confirm.png" /></button>                         
        </div>

        <div class="materia-hora">
          <label class="text-hora text-left opaco">Hora: <?php echo "$l3[3]"; ?></label>
          <label class="text-materias"><?php echo "$l3[1]"; ?></label>                   
          <?php if ($l3[8]==0){?>
            <label class="text-materias line">Profesor: SIN ASIGNAR</label>
          <?php }else{?>
            <label class="text-materias line">Profesor: <?php echo "$l3[8]"; ?> </label>
          <?php }?>
        </div>                                                                     
        </form>
        <?php }?>                
        <button class="btn-editarPrin btn btn-warning"><img class="imgg" src="vista/img/engranaje.png" /> Editar</button>
        <button class="btn btn-warning back blanco volver"><img class="imgg" src="vista/img/back.png" /> Atras</button>
      </div>  

    <!-- VIERNES -->
    <p class="titulo-dia viernes">Viernes</p>

      <div class="columna">
        <?php foreach($viernes as $l4) {?>          
        <form method="POST">
          <input type="hidden" name="codCur" class="codCur" value="<?php echo "$l4[0]"; ?>">
          <input type="hidden" name="codDia" class="codDia" value="<?php echo "$l4[4]"; ?>">     
          <input type="hidden" name="codHor" class="codHor"  value="<?php echo "$l4[5]"; ?>">                    
        <div class="hora_oculta">                        
          <label class="text-hora-2">Hora: <?php echo "$l4[3]"; ?></label>         
          <select class="codMateria campo">
            <option selected value="<?php echo "$l4[6]" ?>"><?php echo "$l4[1]" ?></option>      
            <option value="1">LIBRE</option>
            <?php foreach ($materias as $mat) { ?>
              <option value="<?php echo "$mat[0]" ?>" ><?php echo "$mat[1]" ?></option>
            <?php } ?>
          </select>                           
          <select class="codProfesorMat campo" >                    
            <?php if ($l4[8]==0){?>
              <option value="0">Profesor: SIN ASIGNAR</option>
            <?php }else{?>
              <option value="<?php echo "$l4[8]"; ?>" >Profesor: <?php echo "$l4[8]"; ?> </option>
            <?php }?>         
            <?php foreach ($profesoresH as $pr) {?>                                
              <option value="<?php  echo "$pr[0]"; ?>"><?php  echo "$pr[1]  $pr[2]"; ?></option>
            <?php }?>
          </select>     
          <button type="button" class="btn-editarMat btn btn-sm" name="btn-editar-hora"><img class="imgg" src="vista/img/confirm.png" /></button>                         
        </div>

        <div class="materia-hora">
          <label class="text-hora text-left opaco">Hora: <?php echo "$l4[3]"; ?></label>
          <label class="text-materias"><?php echo "$l4[1]"; ?></label>                     
          <?php if ($l4[8]==0){?>
            <label class="text-materias line">Profesor: SIN ASIGNAR</label>
          <?php }else{?>
            <label class="text-materias line">Profesor: <?php echo "$l4[8]"; ?> </label>
          <?php }?>
        </div>                                                                     
        </form>
        <?php }?>                                                                    
        <button class="btn-editarPrin btn btn-warning"><img class="imgg" src="vista/img/engranaje.png" /> Editar</button>        
        <button class="btn btn-warning back blanco volver"><img class="imgg" src="vista/img/back.png" /> Atras</button>
      </div>

  <?php } ?>
<script src="vista/js/lib/stats.js"></script>
<script src="vista/js/particles.js"></script>
<script src="vista/js/app2.js"></script></body>

<?php 
 if ($regg==1) {
        echo '<script type="text/javascript">
                              swal({
                                icon: "error",
                                title:"El usuario ya existe!",         
                                button: "ok",
                              });
                      </script>'; 
  }else{
    if ($regg==2) {
        echo '<script type="text/javascript">
                              swal({
                                icon: "error",
                                title:"Documento duplicado!",         
                                text:"el documento ya se encuentra registrado",
                                button: "ok",
                              });
                      </script>'; 
    }else{
      if ($regg==3) {
          echo '<script type="text/javascript">
                              swal({
                                icon: "success",
                                title:"Usuario registrado!",         
                                button: "ok",
                              });
                      </script>'; 
        
      }else{
        if ($regg==4) {
            echo '<script type="text/javascript">
                              swal({
                                icon: "error",
                                title:"Usuario no registrado!",         
                                button: "ok",
                              });
                      </script>'; 
        }else{

        }
      }
    }
  }



?>
</html>