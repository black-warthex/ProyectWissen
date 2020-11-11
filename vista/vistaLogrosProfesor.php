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
        <a class="nav-link activo" id="color-letra-link" href="logrosProfesor.php">Logros</a>  
      </li>  
       <li class="nav-item">
        <a class="nav-link" id="color-letra-link" href="horarioP.php">Profesores</a>  
      </li>
      <li class="nav-item">
        <a class="nav-link" id="color-letra-link" href="lista.php">Alumnos</a>  
      </li> 

         <li class="nav-item">
        <a class="nav-link " id="color-letra-link" href="APQR.php">PQR</a>  
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
<h2 class="text-titulo-curso">Gestion de Logros</h2>
<p>Bienvenido, en este espacio asignar o eliminar logros de materias.</p> 


    <form method="POST">                  
    <p class="campo_dato es">Seleccione un grado.</p>    
    <select class="campo int" name="txt_grado" required onChange="this.form.submit()">   
      <option disabled="true" selected>Seleccione un grado</option>
      <?php foreach($allGrados as  $m){ ?>
      <?php if ($m[0]!=7) { ?>                    
      <option value="<?php echo "$m[0]"?>"><?php echo "$m[1]"?></option>      
      <?php }}?>
    </select>                    
  </form>


  <?php  if (isset($_POST['txt_grado'])) { ?>

    <?php if((count($materias)>0)){  ?>


  <form method="POST">     
  <?php foreach($allGrados as  $m){ 
    if ($m[0]==$_POST['txt_grado']){ ?>
    <h1>GRADO SELECCIONADO <span class="badge badge-warning"><?php echo $m[1]; ?></span></h1> 
  <?php } }?>                 
    <p class="campo_dato es">Seleccione una materia para consultar sus periodos academicos.</p>    
    <select class="campo int" name="materia" required onChange="this.form.submit()">   
      <option disabled="true" selected>Seleccione un curso</option>
      <?php foreach($materias as  $m){ ?>                    
      <option value="<?php echo "$m[0]"?>"><?php echo "$m[1]"?></option>      
      <?php }?>
    </select>                    
  </form>

  <?php }else{ ?>
    <?php foreach($allGrados as  $m){ 
      if ($m[0]==$_POST['txt_grado']){ ?>
    <h1>GRADO <span class="badge badge-info"><?php echo $m[1]; ?></span> NO TIENE MATERIAS REGISTRADAS</h1> 
  <?php } }?>  
    
  <?php }} ?>
  <?php  if (isset($logros_mat)){ ?> 
        <?php if(count($logros_mat)>0){ ?>
    <h1>MATERIA <span class="badge badge-warning"><?php echo "$nombreMateria"; ?></span></h1>        
  
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">

  <div class="carousel-inner">
    <div class="carousel-item active">
      <div class="logros">
  <h1>PERIODO ACADEMICO <span class="badge badge-info">I</span></h1> 
      <div class="min">        
      <label href="#carouselExampleIndicators"  class="ff" data-slide="prev">< anterior</label>      
      <label href="#carouselExampleIndicators"  class="ff" data-slide="next">siguente ></label>       
  </div>
    <?php if(count($I)>0){ ?>
         <table class="table d table-hover">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Logros</th>
      <th scope="col">Elimar</th>      
    </tr>
  </thead>
     <?php foreach($I as $PI){?>

    <form method="POST">
      <input type="hidden" name="codigoLogro" value="<?php echo "$PI[3]"; ?>">
      <input type="hidden" name="numeroPeriodo" value="<?php echo "$PI[4]"; ?>"> 
  <tbody>
    <tr>
      <th scope="row"><?php echo "$PI[2]"; ?></th>      
      <th><button class="btn btn-danger btn-lg blanco" type="submit" name="elimina" style="border-radius: 50px; width: 34px; height: 34px;"><img src="vista/img/bin.png" style="margin-left: -15px; margin-top: -22px;" class="imgg"></button></th  >
    </tr>
  </tbody>  
    </form>
    <?php }}else{ ?>
      <p>No hay logros asignados a este periodo</p>
    <?php } ?>  
    </table>  
    <button class="agregar btn btn-info es" style="margin: auto;" data-toggle="modal" data-target="#exampleModal"><img src="vista/img/add.png" class="imgg"> Agregar</button>
  <!-- MODAL -->  
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">AGREGAR LOGROS</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- AGREGAR LOGROS -->
      <form method="POST">
            <table class="table table-borderless table-hover" >
  <thead class="thead-dark">
    <tr>
      <th scope="col" colspan="3" style="text-align: center;">LOGROS</th>
      
    </tr>
  </thead>
  <tbody>      
    <input type="hidden" name="periodo" value="I PERIODO">
    <?php foreach ($logros_n as $ln) { ?> 
    <tr>

    <th scope="row" colspan="3">
       <label class="containerL"><?php echo "$ln[2]"; ?><input type="checkbox" name="opcion[]" value="<?php echo "$ln[0]"; ?>">
       <span class="checkmark"></span>
     </label>
    </th>
    </tr>   
    </tbody>
    
      <?php } ?>        
    </table>           
    
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">cerrar</button>
        <button type="submit" name="agregar" class="btn btn-primary"><img src="vista/img/add.png" class="imgg"> Agregar</button>                
        </form>
      </div>
    </div>
  </div>
</div>
  
  </div>
      <!-- <img src="..." class="d-block w-100" alt="..."> -->
    </div>
    <div class="carousel-item">
        <!-- PERIODO II -->
        <div class="logros">
  <h1>PERIODO ACADEMICO <span class="badge badge-info">II</span></h1> 
      <div class="min">        
      <label href="#carouselExampleIndicators"  class="ff" data-slide="prev">< anterior</label>      
      <label href="#carouselExampleIndicators"  class="ff" data-slide="next">siguente ></label>
  </div>
    <?php if(count($II)>0){ ?>
         <table class="table d table-hover">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Logros</th>
      <th scope="col">Elimar</th>      
    </tr>
  </thead>
     <?php foreach($II as $PII){?>

    <form method="POST">
      <input type="hidden" name="codigoLogro" value="<?php echo "$PII[3]"; ?>">
      <input type="hidden" name="numeroPeriodo" value="<?php echo "$PII[4]"; ?>"> 
  <tbody>
    <tr>
      <th scope="row"><?php echo "$PII[2]"; ?></th>      
      <th><button class="btn btn-danger btn-lg blanco" type="submit" name="elimina" style="border-radius: 50px; width: 34px; height: 34px;"><img src="vista/img/bin.png" style="margin-left: -15px; margin-top: -22px;" class="imgg"></button></th  >
    </tr>
  </tbody>  
    </form>
    <?php }}else{ ?>
      <p>No hay logros asignados a este periodo</p>
    <?php } ?>  
    </table>  
    <button class="agregar btn btn-info es" style="margin: auto;" data-toggle="modal" data-target="#exampleModal2"><img src="vista/img/add.png" class="imgg"> Agregar</button>
  <!-- MODAL -->  
<!-- Modal -->
<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">AGREGAR LOGROS</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- AGREGAR LOGROS -->
      <form method="POST">
            <table class="table table-borderless table-hover" >
  <thead class="thead-dark">
    <tr>
      <th scope="col" colspan="3" style="text-align: center;">LOGROS</th>
      
    </tr>
  </thead>
  <tbody>      
    <input type="hidden" name="periodo" value="II PERIODO">
    <?php foreach ($logros_n as $ln) { ?> 
    <tr>

    <th scope="row" colspan="3">
       <label class="containerL"><?php echo "$ln[2]"; ?><input type="checkbox" name="opcion[]" value="<?php echo "$ln[0]"; ?>">
       <span class="checkmark"></span>
     </label>
    </th>
    </tr>   
    </tbody>
    
      <?php } ?>        
    </table>           
    
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">cerrar</button>
        <button type="submit" name="agregar" class="btn btn-primary"><img src="vista/img/add.png" class="imgg"> Agregar</button>                
        </form>
      </div>
    </div>
  </div>
</div>
  


      </div>
      
    </div>
    <div class="carousel-item">
      <!-- III PERIODO -->
       <div class="logros">
  <h1>PERIODO ACADEMICO <span class="badge badge-info">III</span></h1>
      <div class="min">        
     <label href="#carouselExampleIndicators"  class="ff" data-slide="prev">< anterior</label>      
      <label href="#carouselExampleIndicators"  class="ff" data-slide="next">siguente ></label>
  </div> 
    <?php if(count($III)>0){ ?>
         <table class="table d table-hover">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Logros</th>
      <th scope="col">Elimar</th>      
    </tr>
  </thead>
     <?php foreach($III as $PIII){?>

    <form method="POST">
      <input type="hidden" name="codigoLogro" value="<?php echo "$PIII[3]"; ?>">
      <input type="hidden" name="numeroPeriodo" value="<?php echo "$PIII[4]"; ?>"> 
  <tbody>
    <tr>
      <th scope="row"><?php echo "$PIII[2]"; ?></th>      
      <th><button class="btn btn-danger btn-lg blanco" type="submit" name="elimina" style="border-radius: 50px; width: 34px; height: 34px;"><img src="vista/img/bin.png" style="margin-left: -15px; margin-top: -22px;" class="imgg"></button></th  >
    </tr>
  </tbody>  
    </form>
    <?php }}else{ ?>
      <p>No hay logros asignados a este periodo</p>
    <?php } ?>  
    </table>  
    <button class="agregar btn btn-info es" style="margin: auto;" data-toggle="modal" data-target="#exampleModal3"><img src="vista/img/add.png" class="imgg"> Agregar</button>
  <!-- MODAL -->  
<!-- Modal -->
<div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">AGREGAR LOGROS</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- AGREGAR LOGROS -->
      <form method="POST">
            <table class="table table-borderless table-hover" >
  <thead class="thead-dark">
    <tr>
      <th scope="col" colspan="3" style="text-align: center;">LOGROS</th>
      
    </tr>
  </thead>
  <tbody>      
    <input type="hidden" name="periodo" value="III PERIODO">
    <?php foreach ($logros_n as $ln) { ?> 
    <tr>

    <th scope="row" colspan="3">
       <label class="containerL"><?php echo "$ln[2]"; ?><input type="checkbox" name="opcion[]" value="<?php echo "$ln[0]"; ?>">
       <span class="checkmark"></span>
     </label>
    </th>
    </tr>   
    </tbody>
    
      <?php } ?>        
    </table>           
    
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">cerrar</button>
        <button type="submit" name="agregar" class="btn btn-primary"><img src="vista/img/add.png" class="imgg"> Agregar</button>                
        </form>
      </div>
    </div>
  </div>
</div>
      
    </div>
  </div>
<!-- IV PERIODO -->
<div class="carousel-item">
      <!-- III PERIODO -->
       <div class="logros">
  <h1>PERIODO ACADEMICO <span class="badge badge-info">IV</span></h1> 
      <div class="min">        
      <label href="#carouselExampleIndicators"  class="ff" data-slide="prev">< anterior</label>      
      <label href="#carouselExampleIndicators"  class="ff" data-slide="next">siguente ></label>        
  </div>
    <?php if(count($IV)>0){ ?>
         <table class="table d table-hover">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Logros</th>
      <th scope="col">Elimar</th>      
    </tr>
  </thead>
     <?php foreach($IV as $PIV){?>

    <form method="POST">
      <input type="hidden" name="codigoLogro" value="<?php echo "$PIV[3]"; ?>">
      <input type="hidden" name="numeroPeriodo" value="<?php echo "$PIV[4]"; ?>"> 
  <tbody>
    <tr>
      <th scope="row"><?php echo "$PIV[2]"; ?></th>      
      <th><button class="btn btn-danger btn-lg blanco" type="submit" name="elimina" style="border-radius: 50px; width: 34px; height: 34px;"><img src="vista/img/bin.png" style="margin-left: -15px; margin-top: -22px;" class="imgg"></button></th  >
    </tr>
  </tbody>  
    </form>
    <?php }}else{ ?>
      <p>No hay logros asignados a este periodo</p>
    <?php } ?>  
    </table>  
    <button class="agregar btn btn-info es" style="margin: auto;" data-toggle="modal" data-target="#exampleModal4"><img src="vista/img/add.png" class="imgg"> Agregar</button>
  <!-- MODAL -->  
<!-- Modal -->
<div class="modal fade" id="exampleModal4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">AGREGAR LOGROS</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- AGREGAR LOGROS -->
      <form method="POST">
            <table class="table table-borderless table-hover" >
  <thead class="thead-dark">
    <tr>
      <th scope="col" colspan="3" style="text-align: center;">LOGROS</th>
      
    </tr>
  </thead>
  <tbody>      
    <input type="hidden" name="periodo" value="IV PERIODO">
    <?php foreach ($logros_n as $ln) { ?> 
    <tr>

    <th scope="row" colspan="3">
       <label class="containerL"><?php echo "$ln[2]"; ?><input type="checkbox" name="opcion[]" value="<?php echo "$ln[0]"; ?>">
       <span class="checkmark"></span>
     </label>
    </th>
    </tr>   
    </tbody>
    
      <?php } ?>        
    </table>           
    
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">cerrar</button>
        <button type="submit" name="agregar" class="btn btn-primary"><img src="vista/img/add.png" class="imgg"> Agregar</button>                
        </form>
      </div>
    </div>
  </div>
</div>
      
    </div>
  </div>

<div class="btn_prev">
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    
  <span  aria-hidden="true" style="color: #000;font-size: 20px;">ANTERIOR<br>PERIODO</span>    
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span  aria-hidden="true" href="#carouselExampleIndicators"  data-slide="next" style="color: #000;font-size: 20px;">SIGUENTE<br>PERIODO</span>    
  </a>
  </div>  
</div>   

<?php }else{ ?>
    <h1><span class="badge badge-warning"><?php echo $nombreMateria; ?></span> NO TIENE LOGROS CREADOS</h1> 
<?php } }
?>

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

</div>
</div>
  </body>
</html>


