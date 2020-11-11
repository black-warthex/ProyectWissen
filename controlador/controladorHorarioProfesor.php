<?php 
require_once('modelo/modeloProfesor.php');

$pro= new profesor();
session_start();

	if(!$_SESSION){

		echo "<script type='text/javascript'>			
				self.location='index.php';				
	  		  </script>";  	
	}else{	

		$rol=$_SESSION['rol_usu'];					
		if ($rol=="PROFESOR") {			
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


	$cantHoras=$pro->buscar_cant_horas();
		foreach ($cantHoras as $horas) {
	$numHoras=$horas[0];
	}


	//buscar campos vacios y rellenar
	for ($dia=1; $dia <=5 ; $dia++) { 
   	  		   	  	
	  	for ($i=1; $i <=$numHoras ; $i++) { 	  		
	  		
	  		$libre=$pro->restaurar_hora($documento,$dia,$i);

	  		if (0<(count($libre))) {
	  			//echo "existe hora $i <br>";
	  		}else{
	  			$alfin=$pro->insertar_horaLibre($dia,$i,$documento);	 	  		  	 	  				 	
	  		}
	  		
	  	}	
   		
   	}

//cargar horario

// Lunes  	
   	$horario=$pro->verHorario($documento,1);   	   	   	
   	// Martes
   	$horarioMar=$pro->verHorario($documento,2);
   	//Miercoles
   	$horarioMie=$pro->verHorario($documento,3);
   	// Jueves
   	$horarioJue=$pro->verHorario($documento,4);
   	// viernes
   	$horarioVie=$pro->verHorario($documento,5);	



require_once('vista/vistaHorarioProfesor.php');

 ?>