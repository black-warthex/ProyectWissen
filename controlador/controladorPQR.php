<?php

require_once('modelo/modeloPQR.php');

$adm = new pqr();

session_start();

	if(!$_SESSION){

		echo "<script type='text/javascript'>			
				self.location='index.php';				
	  		  </script>";  	
	}else{	

		$rol=$_SESSION['rol_usu'];					
		if ($rol=="ALUMNO" || $rol=="PROFESOR" ) {			
			$usuario=$_SESSION['nomUsu'];
			$clave=$_SESSION['claUsu'];		
			$codigo=$_SESSION['codUsu'];
			$tipodoc=$_SESSION['tip_doc_per'];
			$documento=$_SESSION['doc_per'];
			$nombre=$_SESSION['nom_per'];
			$apellido=$_SESSION['ape_per'];
			$rh=$_SESSION['rh_per'];
			$fecha=$_SESSION['fec_per'];			
			$foto=$_SESSION['fot_usu'];

			

		}else{

			//si no es administrador se devuelve a su rol
			header('Location:'.$rol.'.php');
		}
	}

		if (isset($_POST['reg'])) {
			$tipo=$_POST['tipo'];
			$asu=$_POST['asu'];
			$des=$_POST['des'];

			$ingreso=$adm->insertar_pqr($asu,$des,$codigo,$tipo);

			if ($ingreso>0) {
				
			}
		}


		$mispqr=$adm->BuscarPQR($documento);
		

	if ($rol=="ALUMNO") {
		require_once('vista/vistaP.php');	
	}
	if ($rol=="PROFESOR" ) {	
			require_once('vista/vistaPQ.php');	
	}
	

?>