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
  <title>Proyect Wissen</title>    
  <script src="vista/js/bootstrap.min.js"></script>   
  <script src="vista/js/popper.min.js"></script>   
  <script src="vista/js/sweetalert.min.js"></script>
  <script type="text/javascript">      
      function correcto(msj){
        swal({
          icon: "success",
          title:msj,         
          button: "ok",
        });
      }
      
      function incorrecto(msj){
        swal({
          icon: "error",
          title:msj,        
          button: "ok",
        });
      }

      function advertencia(msj,msj2){
        swal({
          icon: "warning",
          title:msj,
          text:msj2,         
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
      <a class="nav-link activo" id="color-letra-link" href="ADMINISTRADOR.php">Mi Perfil</a>  
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
<div class="container">
<div id="particles-js"></div>
  <div id="datos">
    <img src="picture_user/<?php echo "$foto"?>" class="foto">
    <h2 id="saludo">Bienvenido, <span class="nombre"><?php echo "$usuario" ?></span> </h2> 
    <h2>Documento</h2>
    <p class="campo_dato"><?php echo "$tipodoc $documento" ?></p>
    <h2 >Nombre</h2>
    <p  class="campo_dato"><?php echo $nombre ?> <?php echo $apellido ?></p>  
    <h2 >Fecha de Nacimiento</h2>
    <p  class="campo_dato"><?php echo $fecha ?></p>
    <h2>Tipo RH</h2>
    <p  class="campo_dato"><?php echo $rh ?></p>
    <button type="button" class="btn_editar_p btn " data-toggle="modal" data-target="#exampleModalLong"><img class="imgg" src="vista/img/confirm.png"/> Editar</button>
  </div>
  
  
  <!-- Modal -->
  <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content ">
        <div class="modal-header ">
          <h2 class="modal-title " id="exampleModalLongTitle" id="saludo">Actualizar Datos</h2>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      <div class="modal-body">
        <form method="POST" enctype="multipart/form-data" >
          <h2 class="letra">Foto Actual</h2>
          <img src="picture_user/<?php echo "$foto"?>" class="foto" alt="" width="60" height="60"/>
          <h2 class="letra">Nueva Foto</h2> 
      <div class="input-group">
        <div class="custom-file">
          <input type="file" name="update_foto" class="custom-file-input" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04">
          <label class="custom-file-label campo" for="inputGroupFile04">sube tu foto</label>
        </div>
      </div>
         <h2 class="letra">Nombre</h2>
          <input class="input_curso per campo" pattern="[A-Za-z ]+"  title="solo puede contener letras" type="text"placeholder="nombre"name="update_nombre"value="<?php echo $nombre ?>">
          <h2 class="letra">Apellido</h2>
          <input class="input_curso per campo" pattern="[A-Za-z ]+"  title="solo puede contener letras" type="text"placeholder="apellido"name="update_apellido"value="<?php echo $apellido ?>">
          <h2 class="letra">Fecha de nacimiento</h2>
          <input class="input_curso per campo" type="date"placeholder="fecha"name="update_fecha"value="<?php echo $fecha?>">          
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-warning btn-lg" data-dismiss="modal"><img class="imgg" src="vista/img/atras.png"/></button>
        <button type="submit" name="btn-btnactualizar" class="col"><img class="imgg" src="vista/img/confirm.png"/> Editar</button>      
        </form>
      </div>
      </div>
    </div>
  </div>
</div>
<script src="vista/js/lib/stats.js"></script>
<script src="vista/js/particles.js"></script>
<script src="vista/js/app2.js"></script>
<?php 
  if ($estado==1) {          
    echo '<script type="text/javascript">
            correcto("actualizacion exitosa!");
          </script>'; 
  }else{
    if ($estado==2) {
      echo '<script type="text/javascript">
              incorrecto("error al actualizar datos");
            </script>'; 
    }else{
      if ($estado==3) {
        echo '<script type="text/javascript">
                advertencia("Error de tamaño de imagen","la imagen no puede superar 1mb de tamaño");
              </script>'; 
      }else{
        if ($estado==4) {
          echo '<script type="text/javascript">
                  advertencia("Error de formato de imagen","solo se admiten formatos: jpg jpge png gif");
                </script>';
        }
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