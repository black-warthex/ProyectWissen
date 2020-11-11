<?php 
require_once('modelo/modeloAlumno.php');
require_once('modelo/modeloAdministrador.php');

$adm= new administrador();

$alu= new alumno();
session_start();

	if(!$_SESSION){

		echo "<script type='text/javascript'>			
				self.location='index.php';				
	  		  </script>";  	
	}else{	

		$rol=$_SESSION['rol_usu'];					
		if ($rol=="ALUMNO") {			
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

	$cur=$alu->buscar_curso($documento);
	if (count($cur)>0) {
	foreach ($cur as $c) {
				
		$curso=$c[0];
		
	}	
		$lunes=$adm->buscar_lunes($curso,'1');
	$martes=$adm->buscar_martes($curso,'2');
	$miercoles=$adm->buscar_miercoles($curso,'3');
	$jueves=$adm->buscar_jueves($curso,'4');
	$viernes=$adm->buscar_viernes($curso,'5');

}


require_once('vista/vistaHorarioAlumno.php');