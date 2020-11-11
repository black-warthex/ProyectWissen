<?php 
require_once('modelo/modeloHorario.php');

$hor= new horario();

if (isset($_POST['menu'])) {
	//recibir el codigo de materia
		$codCur=$_POST['codCur'];	

	$codMateria=$_POST['codMateria'];
	if ($codMateria=="1") {  //1 es hora libre		
		$codCur=$_POST['codCur'];	
		$codDia=$_POST['codDia'];
		$codHora=$_POST['codHora'];
		$profe=$_POST['profe'];
		//borrar materia que habia sido asiganada y insertar una libre
		$liberar=$hor->borrarLibre($codCur,$codDia,$codHora);		
		if ($liberar>0) {
			echo "libre";
		}else{
			echo "ERROR";
		}

	}else{
	
	$codDia=$_POST['codDia'];
	$codHora=$_POST['codHora'];
	$profe=$_POST['profe'];


	$disponibilidad=$hor->disponibilidad_profesor($codDia,$codHora,$profe);
	if (count($disponibilidad)>0) {
		foreach ($disponibilidad as $dis){

			if($dis[0]==0){
				//Borrar el horario libre				
				$deleteHorarioD=$hor->DeleteHorario($codDia,$codHora,$profe);
				$estadoEdit=$hor->updateHorario($codCur,$codMateria,$codDia,$codHora,$profe);
				if ($estadoEdit>0) {
					echo "Docente asignado correctamente";
				}else{
					echo "Error en la Modificacion";	  	  	  	
				}

			}else{				
			 	echo "Horario asignado en: \n Curso :  $dis[0] \nGrado :  $dis[5]";		
			} 		
		}		 
	}else{
		//update horario
		$estadoEdit=$hor->updateHorario($codCur,$codMateria,$codDia,$codHora,$profe);
		//estdo de upadate
		if ($estadoEdit>0) {	
			echo "Docente asignado correctamente";
		}else{
			echo "Error en la Modificacion";	
		}
	}
	
}
	$lunes=$hor->buscar_horario($codCur,'1');
	$martes=$hor->buscar_horario($codCur,'2');
	$miercoles=$hor->buscar_horario($codCur,'3');
	$jueves=$hor->buscar_horario($codCur,'4');
	$viernes=$hor->buscar_horario($codCur,'5');
	

}
?>