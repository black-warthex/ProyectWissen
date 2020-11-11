<?php
require_once('modelo/modeloMatricula.php');
$mtc= new matricula();
session_start();

	if(!$_SESSION){

		echo "<script type='text/javascript'>			
				self.location='index.php';				
	  		  </script>";  	
	}else{	

		$rol=$_SESSION['rol_usu'];					
		if ($rol=="ADMINISTRADOR") {			
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



//buscar cursos
$cursos=$mtc->buscar_cursos();	
//Buscar grados
$grados=$mtc->buscar_grados();
//MATRICULAR
//BUSCAR DATOS

$nombreApellido=0;
$docEst=0;
$graddo=0;
$estado=0;
$estadoDatos=0;
$estCur=0;
if(isset($_POST['btn_consulta'])){
	
	$buscaDatos=$_POST['regDoc'];

	//buscar si esta registrado ->comparar si es alumno sino decirile que es
	//mandar registrar
	$DatosEst=$mtc->buscar_datosPersona($buscaDatos);
	if (count($DatosEst)>0) {

			foreach ($DatosEst as $datosE) {				
				if ($datosE[3]=="ALUMNO") {
					$nombreApellido="$datosE[0] $datosE[1]";
					$docEst=$buscaDatos;
					$estadoDatos=1;

					//buscar curso
					$datosCurso=$mtc->comprobar_curso($docEst);

					if (count($datosCurso)>0) {
						foreach ($datosCurso as $k ){
							$estCur=$k[0];	
							$matr2=$mtc->buscar_matriculas2($k[1]);					
						}
						
					}
			

				}else{	
					//Existe usuario pero no es estudiante
					$secondRol=$datosE[3];

					$estado=3;						
				}
								
			}




	}else{
		$_SESSION['usuTemp']=$buscaDatos;	
		$estado=4;//el usuario no existe		

	}
}
//MOSTRAR MATRICULAS
$matr=$mtc->buscar_matriculas();
if (isset($_POST['btn_matricular'])) {
	$matricular_documento=$_POST['regDoc'];
	$matricular_matricula=$_POST['regMatr'];

$estado_matriculacion1=$mtc->mod_matricular($matricular_matricula,$matricular_documento);						
						if ($estado_matriculacion1>0) {
							$estado=1; //estudiante matriculado							
						}else{
							$estado=2;//no se pudo matricular							 
						}	
}

//REGISTRAR ALUMNOs
$reg=0;
if (isset($_POST['registrar_alumno'])) {
	
	$usu_alumno=$_POST['usu'];



	$cns_usu=$mtc->consultar_usuario($usu_alumno);
	if (count($cns_usu)>0) {		
		$reg=2;//el usuario ya existe
	}else{
		$usu_doc=$_POST['doc'];
		$verificarDocumento=$mtc->consultar_documento($usu_doc);
		if (count($verificarDocumento)>0) {
			$reg=3;//el documento ya esta registrado
		}else{

			$clave=$_POST['pas'];
			$tipoD=$_POST['tipdoc'];
			$nombre=$_POST['nom'];
			$apellido=$_POST['ape'];
			$rh=$_POST['rh'];
			$fec=$_POST['fec'];			

		//realizar insercion
		$segunda_verificacion=$mtc->insert_usuario($usu_alumno,$clave,$tipoD,$usu_doc,$nombre,$apellido,$rh,$fec,2);

		if ($segunda_verificacion>0) {

			$direccion=$_POST['dir'];
			$telefono=$_POST['num'];
			$correo=$_POST['cor'];
			$verificacion3=$mtc->insert_datosContacto($usu_doc,$direccion,$telefono,$correo);

			if ($verificacion3>0) {
				$reg=1;//usuario y datos ingresados ok
			}else{
				echo "error datos!";
				$reg=4;

			}


		}else{
			$reg=4;//error al insertar usuario
		}


		}
	}
}

//registrar admin o profesor
$regg=0;
if (isset($_POST['regPersonal'])) {

	require_once('modelo/modeloUsuario.php');
	$usu = new modelo_usuario();

	$usuari=$_POST['usu'];
	//consultar si el usuario existe
	$verificar=$usu->consultar_usuario($usuari);	
	//verificar existencia si el arreglo es mayor a  0 existe alguien
	if(count($verificar)>0){
		//ya existe el usuario
		$regg=1;
		
	}else{
		//consultar si el documento esta registrado
		$document=$_POST['doc'];
		$verificarDocumento=$usu->consultar_documento($document);	
	//verificar existencia si el arreglo es mayor a  0 existe alguien
	if(count($verificarDocumento)>0){
		//documento ya esta registrado
		$regg=2;
		
	}else{
		//recibir otros datos
		$clav=$_POST['cla'];
		$tipo=$_POST['tipdoc'];
		
		$nombr=$_POST['nom'];
		$apellid=$_POST['ape'];
		$r=$_POST['rh'];
		$fe=$_POST['fec'];
		$ro=$_POST['rol'];

		//realizar insercion
		$segunda_verificacion=$usu->insert_usuario($usuari,$clav,$tipo,$document,$nombr,$apellid,$r,$fe,$ro);
		if ($segunda_verificacion>0) {
				//Resgistro horario default para profesor
			if ($ro==1) {
				
			
			//codigo de materia libre
			$defautlMat=$adm->buscar_materias_definida();
			foreach ($defautlMat as $codMat) {
				$materiaCodigo=$codMat[0];
			}
			
			//cantidad de dias
			$cantDias=$adm->buscar_cant_dias();			
			foreach ($cantDias as $dias) {
				$numDias=$dias[0];	
			}

			//cantidad de horas
			$cantHoras=$adm->buscar_cant_horas();
			foreach ($cantHoras as $horas) {
				$numHoras=$horas[0];
			}


        		for($i=1;$i<=$numDias;$i++){

            		for($z=1;$z<=$numHoras;$z++){
                		$HorarioDefault=$adm->insertHorarioP(0,$materiaCodigo,$i,$z,$document);
            		}
            
        		}	

        	if ($HorarioDefault==1) {        		        
        	}else{
        		echo "<script type='text/javascript'>
					alert('Error al generar el horario de el profesor');								
					
	  		  	</script>";
        	}

			}

			//usuario registrado
			$regg=3;			
		}else{
			//no se registro
			$regg=4;
		}
	}
		
	}
	
}


require_once('vista/vistaMatricula.php');

?>