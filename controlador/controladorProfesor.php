<?php 
require_once('modelo/modeloProfesor.php');

$adm= new profesor();
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

//controlar sweet alert

	$estado=0;

// ZONA DE ACTUALIZAR PERFIL
if(isset($_POST['btn-btnactualizar'])){
	
	$update_nombre=$_POST['update_nombre'];
	$update_apellido=$_POST['update_apellido'];
	$update_fecha=$_POST['update_fecha'];

	// datos de la foto


	// si subio foto
	if($_FILES['update_foto']['name']!=null){
	$update_foto=$_FILES['update_foto']['name'];
	$tipo=$_FILES['update_foto']['type'];
	$tama=$_FILES['update_foto']['size'];
		// tipo de foto
		if($tipo=="image/gif" || $tipo=="image/jpeg" || $tipo=="image/png"){
			//tamaño de la foto
			if($tama<=1000000){
				$hoy=date('dmy'); //es para saber la fecha de subida dia mes año ´+ el codigo de el empleado mas name foto
					$update_foto=$hoy."_".$codigo."_".$update_foto;
					// asignar la carpeta para el archivo
					// carpeta raiz de el serve con el nombre de el proyecto y de la carpeta de las img
					$carpeta_destino=$_SERVER['DOCUMENT_ROOT'].'/picture_user/';

					// realizar la actualizacion
					$update_estado=$adm->update_datos($codigo,$update_nombre,$update_apellido,$update_fecha,$update_foto);

					if ($update_estado>0) {
						if ($foto!="default.png") {
						unlink($carpeta_destino.$foto);
						}
						
						move_uploaded_file($_FILES['update_foto']['tmp_name'],$carpeta_destino.$update_foto);
						$nombre=$update_nombre;
						$apellido=$update_apellido;
						$fecha=$update_fecha;
						$foto=$update_foto;
						//sweet alert update ok
						$estado=1;
					}else{
						//fail update
						$estado=2;						
					}
			}else{
				//error img no debe superar 1mb
				$estado=3;
			}

		}else{
			//img tipo no se admite
			$estado=4;			
			}
		


	
	}else{
		// foto defecto si no subio
	$update_estado=$adm->update_datos($codigo,$update_nombre,$update_apellido,$update_fecha,$foto);

					if ($update_estado>0) {
						$nombre=$update_nombre;
						$apellido=$update_apellido;
						$fecha=$update_fecha;
						//sweet aler					
						$estado=1;
						
					}else{
						//fail update
						$estado=2;
					}
	}
}

require_once ('vista/vistaPerfilProfesor.php');
?>	