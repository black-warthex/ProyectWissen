<?php 
require_once('modelo/modeloAlumno.php');
require_once('modelo/modeloCalificacion.php');

$cal = new calificacion();
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
		$materias=$alu->find_materias_alumno($c[0]);
	}		
	}
	$mostrar=0;
	$cant=0;
	$materia="ninguna";
	$periodo="ninguno";
	if (isset($_POST['buscar'])) {
		$mostrar=1;
		$periodo=$_POST['periodo'];
		$materia=$_POST['materiaSelect'];

		$cantidaLogros=$cal->cantidad_logros($periodo,$materia);
		foreach ($cantidaLogros as $cnt) {
						$cant=$cnt[0];
		}	

			if ($cant>0) {
				//buscar los logros
				$log=$cal->logros_periodo($periodo,$materia);				
				//si se encontraron logros
				if (count($log)>0) {							
					//comprobar usuario->logros
					foreach ($log as $ll) {
						//comprobar logros logro->usuario  si es 1 existe sino inserte
						$comprobar=$cal->comprobar_logros($codigo,$ll[0]);

						if (count($comprobar)>0) {
						//echo "ya esta asignado";
						}else{
							$arreglar=$cal->default_calificacion($codigo,$ll[0]);

							if ($arreglar>0) {
							//	echo "logro insertado $ll[2] <br>";
							}else{
								echo "aiudaaa <br>";
							}
						}


					}



				}else{
					//echo "no existen logros";
				}



			}else{
				//echo "sin logros";
			}

	}

require_once('vista/vistaNotasAlumno.php');