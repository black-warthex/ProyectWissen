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
// mostrar pqr
//$mostrarpqr=$adm->mostrar_pqr();

// //buscar pqr
if (isset($_POST['bton_pqr'])) {	
	$pqr1=$_POST['pqrbarra'];

	$mostrarpqr=$adm->BuscarPQR($pqr1);
	

}
// filtro por tipo de pqr
if (isset($_POST['selectPQR'])) {
	$pqrf=$_POST['selectPQR'];
	$mostrarpqr=$adm->filtro_Pqr($pqrf);
	
} 

// filtro por tipo de pqr TODOS
if (isset($_POST['selectPQRTodas'])) {
	$pqrtodosfiltos=$_POST['selectPQRTodas'];
	$mostrarpqr=$adm->filtro_Pqr_Todos($pqrtodosfiltos);
	
}

// Responder pqr
if (isset($_POST['btn_resPQR'])) {
	$codigoPQR=$_POST['codigoPQ'];

	$datos=$_POST['respon'];
	$mostrarpqr=$adm->UpdatePQR($codigoPQR,$codigo,$datos);
	if ($mostrarpqr>0) {
		echo "<script type='text/javascript'>			
				self.location='APQR.php';				
	  		  </script>";  
	}else{
		
		echo "No se respondio";

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
			echo "antes matrias d";
			$defautlMat=$adm->buscar_materias_definida();
			echo"materia definida";
			foreach ($defautlMat as $codMat) {
				$materiaCodigo=$codMat[0];
				echo "codigo materia $codMat[0]";
			}
			echo"pasa materia definida";
			//cantidad de dias
			$cantDias=$adm->buscar_cant_dias();			
			foreach ($cantDias as $dias) {
				$numDias=$dias[0];	
			}
			echo "pasa dias";
			//cantidad de horas
			$cantHoras=$adm->buscar_cant_horas();
			foreach ($cantHoras as $horas) {
				$numHoras=$horas[0];
			}
			echo "pasa cant horas";

        		for($i=1;$i<=$numDias;$i++){

            		for($z=1;$z<=$numHoras;$z++){
						echo "usuario registrado antes de insertar horario";
						$HorarioDefault=$adm->insertHorarioP(0,$materiaCodigo,$i,$z,$document);
						echo "usuario registrado antes de insertar horario des";
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
			echo "se registro"		;
		}else{
			//no se registro
			$regg=4;

			echo "no se registro";
		}
	}
		
	}
	
}



require_once('vista/vistaPQR.php');

 ?>