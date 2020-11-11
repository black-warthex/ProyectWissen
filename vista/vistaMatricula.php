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
   <script src="vista/js/mainCom.js"></script>
   <script src="vista/js/main.js"></script>
  <script src="vista/js/bootstrap.min.js"></script>   
  <script src="vista/js/popper.min.js"></script>   
    <link rel="shortout icon" href="vista/img/dibujo.svg">
  <title>Proyect Wissen</title>
   <script src="vista/js/sweetalert.min.js"></script>
  <script type="text/javascript">

    function advertencia(msj,msj2){
      var doc='<?php echo $buscaDatos ?>';
      var rol='<?php echo $secondRol ?>';
        swal({
          icon: "error",
          title:msj+doc+" pertenece a un "+rol,          
          text:"solo se matriculan alumnos!",
          button: "ok",
    });

      }
       

   

      </script>  
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
        <a class="nav-link " id="color-letra-link" href="ADMINISTRADOR.php">Mi Perfil</a>  
      </li>  
      <li class="nav-item ">
        <a class="nav-link " id="color-letra-link" href="horario.php">Horarios<span></span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="color-letra-link" href="curso.php">Cursos</a>
      </li>      
      <li class="nav-item">
        <a class="nav-link" id="color-letra-link" href="materia.php">Materias</a>
      </li>      
      <li class="nav-item">
        <a class="nav-link activo " id="color-letra-link" href="matricula.php">Matriculas</a>
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
  <!-- AQUI NUEVO CODIGO -->
  <div id="particles-js"></div>
<script src="vista/js/lib/stats.js"></script>
<script src="vista/js/particles.js"></script>
<script src="vista/js/app2.js"></script>
<div class="container">

    <h1>Gestion de Matriculas</h1>
    <p>Bienvenido en esta sección podras matricular a los estudiantes a un curso.</p>  
    <!-- MATRICULAR -->
    <H1 class="text-titulo-curso">MATRICULAR ESTUDIANTE</H1>
    <form action="" method="post">
        <label class="campo_dato">Escriba el documento de el estudiante</label>
        <input type="text" name="regDoc" placeholder="documento" class="input_curso campo" pattern="[0-9]+" title="Solo ingrese numeros" required>         
         <button class="btn btn-warning btn-lg blanco" type="submit" name="btn_consulta"><img src="vista/img/find.png" class="imgg"> Buscar</button> 
    </form>    

      <?php if($estadoDatos>0){?>
        <?php foreach ($DatosEst as $est) {?>
                  
    <form action="" method="POST">
      <H1 class="text-titulo-curso">Datos Estudiante</H1>
      <label class="campo_dato es">Nombre: <?php echo "$nombreApellido"; ?></label>
      <label class="campo_dato es">Documento: <?php echo "$docEst"; ?></label>
      <?php if(count($datosCurso)>0){ ?>
      <label class="campo_dato es">El estudiante es antiguo !</label>
      <label class="campo_dato es">Curso anterior : <?php echo "$estCur"; ?></label>
      <select name="regMatr"  class="int campo" required>  
            <option disabled="true" selected>Seleccione curso a matricular</option>
                    <?php foreach($matr2 as  $tr){?>
                      <?php foreach ($datosCurso as $dat) { ?>
                        <?php if ($tr[3]!=0) { ?>                                                  
                        <option value="<?php echo "$tr[0]"?>"><?php echo "$tr[4], Curso:$tr[3], Cupo: $tr[5]"?>

                      <?php }} ?>
                      
                    </option>
                    <?php }?>
         </select><br><br>

    <?php }else{ ?>
      <label class="campo_dato es">El estudiante es nuevo!</label>      
      <select name="regMatr"  class="int campo" required>  
            <option disabled="true" selected>Seleccione curso a matricular</option>
                    <?php foreach($matr as  $tr){?>
                    
                    <option value="<?php echo "$tr[0]"?>"><?php echo "$tr[4], Curso:$tr[3], Cupo: $tr[5]"?></option>
                    <?php }?>
         </select><br>
    <?php } ?>
        <input type="hidden" name="regDoc" value="<?php echo "$docEst"; ?>">
      
      <?php } ?>
        <input type="submit" name="btn_matricular"class="btn btn-outline-warning btn-lg" value="Matricular">
    </form>
    <?php } ?>    
    </div>
    <!-- //modal -->

<!-- Modal -->
<div class="modal fade " id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
    <div class="modal-content ">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalScrollableTitle">Formulario de registro para estudiantes</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
        <form method="POST">

          <label class="es subT">DATOS DE USUARIO</label>
          <label class="campo_dato es">Escriba su Usuario</label>
          <input type="text" name="usu" class="campo" placeholder="usuario" required>
          <label class="campo_dato es">Escriba su contraseña</label>
          <input type="password" name="pas" class="campo" placeholder="clave" required>

          <label class="es subT">DATOS PERSONALES</label>
          <?php if (isset($buscaDatos)) { ?>
          <label class="campo_dato es">Documento ingresado : <?php echo "$buscaDatos"; ?></label>
          <input type="hidden" name="doc" value="<?php echo "$buscaDatos"; ?>">  
          <?php }else{ ?>
            <label class="campo_dato es" style="color:red;">Escriba nuevamente su numero de documento*</label>
            <input type="text" class="campo" name="doc" placeholder="documento"  pattern="[0-9 ]+" title="no puede contener letras" required>  
          <?php }?>
              
          <label class="campo_dato es">Seleccione el tipo de documento</label>
           <select  name="tipdoc" class="campo intt" required>
            <option disabled="true" selected>tipo documento</option>
            <option value="CC">CEDULA</option>
            <option value="TI">TARJETA DE IDENTIDAD</option>
          </select>
          <label class="campo_dato es">Escriba su nombre</label>
          <input type="text" name="nom" placeholder="nombre" class="campo"  pattern="[A-Za-z ]+"  title="solo puede contener letras">
          <label class="campo_dato es">Escriba su apellido</label>
          <input type="text" name="ape" placeholder="apellido" class="campo"  pattern="[A-Za-z ]+"  title="solo puede contener letras">
          <label class="campo_dato es">Seleccione su fecha de nacimiento</label>    
          <input type="date" name="fec" class="campo" required>
            <label class="campo_dato es">Seleccione su tipo de rh</label>
           <select  name="rh" class="campo intt" required>
            <option disabled="true" selected>tipo rh</option>
            <option value="O+">O+</option>
            <option value="O-">O-</option>
            <option value="A+">A+</option>
            <option value="A-">A-</option>
            <option value="B+">B+</option>
            <option value="B-">B-</option>
            <option value="AB+">AB+</option>
            <option value="AB-">AB-</option>
          </select>
          <label class="es subT">DATOS DE ACUDIENTE</label>
          <label class="campo_dato es">Escriba la direccion de su ACUDIENTE</label>
          <input type="text" name="dir" class="campo" placeholder="direccion acudiente" required>
          <label class="campo_dato es">Escriba el numero telefonico de su ACUDIENTE</label>
          <input type="text" name="num" class="campo" placeholder="telefono acudiente" pattern="[0-9 ]+" title="no puede contener letras" required>          
          <label class="campo_dato es">Escriba el correo electronico de su ACUDIENTE</label>
          <input type="email" name="cor" placeholder="correo acudiente" class="campo">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><img class="imgg" src="vista/img/atras.png" /> Volver</button>
        <button type="submit" name="registrar_alumno" class="btn btn-info " data-toggle="modal" data-target="#exampleModal"><img class="imgg" src="vista/img/save.png" /> Registrar</button> 
        </form>       
      </div>
    </div>
  </div>
</div>


<?php 
  if ($estado==1) {          
    echo '<script type="text/javascript">
            swal({
              icon: "success",
              title:"Estudiante matriculado!",         
              button: "ok",
            });

          </script>'; 
  }else{
    if ($estado==2) {
      echo '<script type="text/javascript">
            swal({
              icon: "error",
              title:"Error! No se pudo matricular estudiante",         
              button: "ok",
            });
            </script>'; 
    }else{
      if ($estado==3) {
        echo '<script type="text/javascript">
                advertencia("El documento ","pertenece a un ");
              </script>'; 
      }else{
        if ($estado==4) {
          echo '<script type="text/javascript">
                  swal({
                    title: "El estudiante no se encuentra registrado!",
                    text: "Desea registrar al estudiante?",
                    icon: "warning",
                    buttons: true,                   
                    buttons: ["No", "Registrar"],                   
                    dangerMode: false,
                  })
                    .then((willDelete) => {
                      if (willDelete) {
                        $("#exampleModalScrollable").modal("show");          
                      }
                  });                 
                </script>';
        }
      }
    }
  }

  if ($reg==1) {
      echo '<script type="text/javascript">
            swal({
              icon: "success",
              title:"Estudiante creado correctamente!",         
              button: "ok",
            });

          </script>'; 
  }else{
      if ($reg==2) {                    
         echo '<script type="text/javascript">';
         echo "var a='$usu_alumno';";
         echo '
        swal({
          icon: "error",
          title:"El usuario "+a+" ya se encuentra registrado",          
          text:"intente con otro nombre de usuario!",
          button: "ok",          
        });
          setTimeout($("#exampleModalScrollable").modal("show"),5000);          
            </script>';                 
      }else{
        if ($reg==3) {
                 echo '<script type="text/javascript">';
         echo "var a='$usu_doc';";
         echo '
        swal({
          icon: "error",
          title:"El documento "+a+" ya se encuentra registrado",                    
          button: "ok",          
        });
          setTimeout($("#exampleModalScrollable").modal("show"),5000);          
            </script>'; 
        }
      }
  }

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