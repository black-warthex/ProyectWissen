<!DOCTYPE html>
<html>
<head>
	<title>Registro</title>
</head>
<body>
	<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">    
    <link rel="stylesheet" type="text/css" href="vista/css/style.css">
    <link rel="shortout icon" href="vista/img/dibujo.svg">
  <title>Proyect Wissen</title>
  </head>
  <body>
    <div class="content">
     <form action="" method="POST">
      <!-- contiene marca icono y texto de el proyecto -->
      <div class="marca"> 
        <h1 class="marca-text"><img src="vista/img/dibujo.svg" class="vec">WISSEN</h1>      
      </div>
      <!-- zona de registro -->
      <h1 class="text-center">Registro</h1>
      <fieldset>
        <label>usuario</label>
          <input type="text" name="usu">
        <label>clave</label>
          <input type="password" name="cla">
      </fieldset>
        <h1 class="text-center-label">Datos Personales</h1>
      <fieldset>
        <label>Tipo Documento</label>
          <select  name="tipdoc">
            <option value="CC">Cédula</option>
            <option value="TI">Tarjeta de Identidad</option>
          </select>
        <label>Documento</label>
          <input type="text" name="doc">
        <label>Nombre</label>
          <input type="text" name="nom">
        <label>Apellido</label>
          <input type="text" name="ape">
        <label>Tipo Rh</label>
          <select  class="content-select" name="rh">
            <option value="O+">O+</option>
            <option value="O-">O-</option>
          </select>
        <label>Fecha de Nacimiento</label>
          <input type="date" name="fec" value="1949-01-01" title="Minimo debe tener 18 años, el rango de edad es de 1949 a 2001" min="1949-01-01" max="2001-12-31">
      </fieldset>  
        <label>Rol</label>        
          <select  name="rol">
            <!-- rellenar roles -->
            <?php foreach ($roles as $rol) {?>
              <option value="<?php echo "$rol[0]";?>"><?php echo "$rol[1]";?></option>                
            <?php }?>
          </select>
        
        <span class="link"><a class="link" href="index.php">Atras</a><input type="submit" class="btn-enviar1"  name="btn-registrar" value="registrar"></span>        
    </form>
    </div>
  </body>
</html>
</body>
</html>