<?php 
require_once('modelo/modeloCalificacion.php');

$cal = new calificacion();
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

	//cargar cursos asignados

	$cursos=$cal->find_curso($documento);
	
	//default
	$curso=0;
	$materia=0;
	$cant=0;
	$periodo="";
	//recibir curso select

	if (isset($_POST['curso'])) {
		$curso=$_POST['curso'];
		$materias=$cal->find_materias($documento,$curso);

	}

	if (isset($_POST['buscar_alumnos'])) {
		$materia=$_POST['materiaSelect'];
		$periodo=$_POST['periodo'];
		$curso_al=$_POST['curso_al'];
		//echo "$materia $periodo $curso_al";

		$alumnos=$cal->alumnos_curso($curso_al);
		$cantidaLogros=$cal->cantidad_logros($periodo,$materia);		
		
		foreach ($alumnos as $al) {
			//echo "$al[0] --$al[2] $al[3] -- $al[4] <br>";			
				//cantidad logros		
					foreach ($cantidaLogros as $cnt) {
						$cant=$cnt[0];
					}	
			//si hay logros
			if ($cant>0) {
				//buscar los logros
				$log=$cal->logros_periodo($periodo,$materia);
				//si se encontraron logros
				if (count($log)>0) {							
					//comprobar usuario->logros
					foreach ($log as $ll) {
						//comprobar logros logro->usuario  si es 1 existe sino inserte
						$comprobar=$cal->comprobar_logros($al[0],$ll[0]);

						if (count($comprobar)>0) {
						//echo "ya esta asignado";
						}else{
							$arreglar=$cal->default_calificacion($al[0],$ll[0]);

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

			//mostrar logros de el alumno

		}
		
		
		
		//echo "la $cant";
	}

	//actualizar calificacion de logros de el alumno
	
	if (isset($_POST['agregar'])) {
			$codigoAlumno=$_POST['codigoAlumno'];
			$calificacion_log=$_POST['calificacion_log'];
			$codigo_logro=$_POST['codigo_logro'];
				
				$limite=(count($calificacion_log))-1;			
				for ($i=0; $i <=$limite ; $i++) { 

					$update=$cal->modificar_calificacion($calificacion_log[$i],$codigoAlumno,$codigo_logro[$i]);

					if ($update>0) {
						//echo "ok update";
					}else{
						//echo "fail update";
					}
					
				}

			
		}	


	



require_once('vista/vistaCalificionProfesor.php');
?>