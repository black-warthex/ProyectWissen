<?php 
require_once('modelo/modeloUsuario.php');
//importar usuario
$usu= new modelo_usuario();
//Recuperar datos para iniciar session
if (isset($_POST['btn-enviar'])) {
	//recibir datos
	$user=$_POST['usu'];
	$clave=$_POST['cla'];
	//enviar consulta
	$datos=$usu->logueo_usuario($user,$clave);
	//comprobar si existe
	if (count($datos)>0) {
		
		//recorrer el arreglo con los datos
		foreach ($datos as $usuario) {
			
			if($usuario[2]=="activo"){

				//iniciar session
				session_start();
				//guardar los datos
				$_SESSION['nomUsu']=$usuario[0];
				$_SESSION['claUsu']=$usuario[1];		
				$_SESSION['codUsu']=$usuario[3];
				$_SESSION['tip_doc_per']=$usuario[4];
				$_SESSION['doc_per']=$usuario[5];
				$_SESSION['nom_per']=$usuario[6];
				$_SESSION['ape_per']=$usuario[7];
				$_SESSION['rh_per']=$usuario[8];
				$_SESSION['fec_per']=$usuario[9];
				$_SESSION['rol_usu']=$usuario[10];
				$_SESSION['fot_usu']=$usuario[11];

				//redirijir de acuerdo el rol
				header('Location:'.$_SESSION['rol_usu'].'.php');

			}else{
				
				echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
  				<strong>Usuario Inactivo,</strong> Contante al administrador
  				<button type='button' class='close' data-dismiss='alert'aria-label='Close'>
    				<span aria-hidden='true'>&times;</span>
  				</button>
			</div>";

			}

		}

	}else{
	$ess=2;
	

	}
}
// cerrar sesion
if (isset($_POST['salir'])) {
	session_start();	
	if($_SESSION){
		$ess=6;
		session_destroy();				
		

	}else{
			echo "<script type='text/javascript'>
					alert('Error');
					self.location='index.php';
				  </script>";

		 }

}

require_once('vista/vistaLogin.php');

 ?>