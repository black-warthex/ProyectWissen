<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">    
    <link rel="stylesheet" type="text/css" href="vista/css/stylelog.css">    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    
    <link rel="stylesheet" type="text/css" href="vista/css/bootstrap.min.css">
    <script type="text/javascript" src="vista/js/jquery-3.4.1.min.js"></script>
    <script src="vista/js/bootstrap.min.js"></script>   
    <script src="vista/js/popper.min.js"></script>   
    <link rel="shortout icon" href="vista/img/dibujo.svg">
    <script src="vista/js/sweetalert.min.js"></script>
    <script type="text/javascript">
            
      
      function incorrecto(msj,msj2){
                    swal({
                icon: "error",
                title:msj,
                text:msj2,         
              button: "ok",
            });

      }
      </script>
  <title>Proyect Wissen</title>
  </head>
  <body>

    <section class="content_1" >
      <div id="particles-js"></div>
      <div class="content">
          <h2>PROYECT WISSEN</h2>
    <img src="vista/img/dibujo.svg">
          <p>Somos el mejor sistema para centros educativos. Fácil, confiable y seguro.</p><p>Gracias por elegirnos!<br><a style="cursor:pointer;" class="li" data-toggle="modal" data-target="#exampleModal">ver tutorial de uso</a>
          </p>
          
          <button data-toggle="modal" data-target="#staticBackdrop">Entrar</label></button>
      </div>
      
    </section>
<!-- otro modal -->
<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tutorial de uso</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <iframe style="width: 100%; height: 400px;" src=https://www.youtube.com/embed/-ls6LCX1-EM frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
      </div>

      </div>
    </div>
  </div>
</div>
      <!-- MODAL -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-center">Proyect Wissen</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <div class="modal-body">  

        <img src="vista/img/undraw_profile_pic_ic5t.svg">
        <h1>Login</h1>
          <form action="login.php" class="formulario" method="POST">

            <input type="text" class="formulario_input" name="usu"  id="usu" required >
            <label for="" class="formulario_label"> Usuario </label>
            <input type="password" class="formulario_input" id="cla" name="cla" required >
            <label for="" class="formulario_label"> Clave </label>            
    <!--         <input type="text" name="usu" required>
            <input type="password" name="cla" required> -->
            <button type="submit" Class="btn btn-primary btn-lg c" name="btn-enviar">Ingresar</button>
            
        </form>        
      </div>      




    </div>
  </div>
</div>

<script src="vista/js/lib/stats.js"></script>
<script src="vista/js/particles.js"></script>
<script src="vista/js/app.js"></script>

    <?php 
        if (isset($ess)) {
          if ($ess==2) {
             
            echo '<script type="text/javascript">            
            incorrecto("Usuario o contrasea incorrecta","Intente nuevamente");
          </script>'; 
          }else{
            if ($ess==6) {
                  echo '<script type="text/javascript">            
            swal({
                icon: "success",
                title:"Ha cerrado la sesion", 
                text:"te deseamos un feliz día :)",        
              button: "ok",
            });
          </script>';               
            }
          }
        }        
    ?>  
   </body>
   
</html>