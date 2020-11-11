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
  <script type="text/javascript" src="vista/js/mainAdministrador2.js"></script>
  <link rel="shortout icon" href="vista/img/dibujo.svg">
  <title>Proyect Wissen</title>
   <script src="vista/js/mainCom.js"></script>
   <script src="vista/js/main.js"></script>
  <script src="vista/js/bootstrap.min.js"></script>   
  <script src="vista/js/popper.min.js"></script>   
    <script src="vista/js/sweetalert.min.js"></script>
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
        <a class="nav-link" id="color-letra-link" href="ADMINISTRADOR.php">Mi Perfil</a>  
      </li>  
      <li class="nav-item ">
        <a class="nav-link" id="color-letra-link" href="horario.php">Horarios<span></span></a>
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
        <a class="nav-link activo" id="color-letra-link" href="APQR.php">PQR</a>  
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
<script src="vista/js/lib/stats.js"></script>
<script src="vista/js/particles.js"></script>
<script src="vista/js/app2.js"></script>

<div class="container">
            
            <form action="" method="POST">
              <h1 class="text-titulo-curso">Peticiones, Quejas o Reclamos</h1>
              <p>Bienvenido en esta seccion podras dar solucion a la los incovenientes de la pagina.</p>
              <h2 class="campo_dato es">Buscar PQR por documento</h2>
              <input type="text" name="pqrbarra" class="campo" placeholder="Ingrese Numero de documento">
              <input type="submit"name="bton_pqr" class="btn btn-outline-warning btn-lg" value="buscar">
            </form>  


            <!-- FILTROS DE PQR --><br>
            <div class="buscar_Horario">
            <form action ="" method = "POST">
              <h2 class="campo_dato es">Mostrar PQR por resolver</h2>
            <select name="selectPQR" class="campo int" onChange="this.form.submit()">
             <option selected="true" disabled="true">Seleccione un tipo</option>
             <option value="Peticion">Peticion</option>
             <option value="Queja">Queja</option>
             <option value="Reclamo">Reclamo</option>
            </label></p></select></p>
           </form>  
         </div>

            <!-- VISTA DE LAS PQR -->
            
                 <div class="buscar_Horario">

          <form action="" method="POST"> 

         
           
              <h2 class="campo_dato es">Mostrar todas las PQR</h2>
            <select name="selectPQRTodas"class="campo int" onChange="this.form.submit()">
             <option selected="true" disabled="true">Seleccione un tipo</option>
             <option value="Peticion">Peticion</option>
             <option value="Queja">Queja</option>
             <option value="Reclamo">Reclamo</option>
            </label></p></select></p>
           </div>
            </form>

            <?php if(isset($mostrarpqr)){?>               
                  <label class="cmt"><h1><span class="badge badge-warning">VER PQR</span></h1></label>
            
              <?php foreach ($mostrarpqr as $verpqr) {
                
              ?>
              <div class="">    
             <div class="tit" id="tit2"><label><?php  echo "  $verpqr[5]";?></label></div>
             <div class="des" id="des">
              <div class="dos">
        <label class="style_l_comentario">Asunto: <p  class="campo_comentario"><?php echo " $verpqr[1]"?></p></label>
      <label class="style_l_comentario">Descripcion:<p class="campo_comentario"><?php echo" $verpqr[2]"?></p></label>
        <label class="style_l_comentario">Usuario: <p  class="campo_comentario"><?php echo" $verpqr[12] $verpqr[13]"?></p></label>
        <label class="style_l_comentario">Documento:<p class="campo_comentario"> <?php echo " $verpqr[11]"?></p></label>
        <label class="style_l_comentario">Fecha:<p class="campo_comentario"> <?php echo " $verpqr[6]"?></p></label>        

        <?php if ($verpqr[9] != 'Resuelto') {?> <!-- RESPONDER PQR-->        
        <div class="ocultar_respuesta">
            

           <form action="" method="POST">
            <h2 class="tit3">Resolver?</h2>
            <input type="hidden" name="codigoPQ" value="<?php echo "$verpqr[0]"?>">
           <!-- <label>Diligencie la respues</label>                  -->
          <textarea required class="txt" name="respon" placeholder="redactar respuesta"></textarea>
          <input type="submit" class="btt btn btn-info" name="btn_resPQR" value="responder">
        </form>
        </div>
       <?php } ?> 
       
        </div>
        </div>
       
      
          </div>
            <hr/>
          <?php }}?>

              
       
      
</div>
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
</body>
</html>