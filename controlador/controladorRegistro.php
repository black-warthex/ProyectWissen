<?php 
require_once('modelo/modeloUsuario.php');
require_once('modelo/modeloAdministrador.php');


$adm= new administrador();

//crear el  el obj usuario
$usu = new modelo_usuario();
//consultar rol para rellenar el select
$roles=$usu->consultar_rol();
//insertar usuario
if(isset($_POST['btn-registrar'])){

	$usuario=$_POST['usu'];
	//consultar si el usuario existe
	$verificar=$usu->consultar_usuario($usuario);	
	//verificar existencia si el arreglo es mayor a  0 existe alguien
	if(count($verificar)>0){
		echo "<script type='text/javascript'>alert('Usuario ya existe,Intente con otro nombre de usuario');
		location.href='registro.php';
		</script>";
	}else{
		//consultar si el documento esta registrado
		$documento=$_POST['doc'];
		$verificarDocumento=$usu->consultar_documento($documento);	
	//verificar existencia si el arreglo es mayor a  0 existe alguien
	if(count($verificarDocumento)>0){
		echo "<script type='text/javascript'>alert('Error el documento ingresado ya se encuentra registrado');
		location.href='registro.php';
		</script>";
	}else{
		//recibir otros datos
		$clave=$_POST['cla'];
		$tipoD=$_POST['tipdoc'];
		
		$nombre=$_POST['nom'];
		$apellido=$_POST['ape'];
		$rh=$_POST['rh'];
		$fec=$_POST['fec'];
		$rol=$_POST['rol'];

		//realizar insercion
		$segunda_verificacion=$usu->insert_usuario($usuario,$clave,$tipoD,$documento,$nombre,$apellido,$rh,$fec,$rol);
		if ($segunda_verificacion>0) {
				//Resgistro horario default para profesor
			if ($rol==1) {
				
			
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
                		$HorarioDefault=$adm->insertHorarioP(0,$materiaCodigo,$i,$z,$documento);
            		}
            
        		}	

        	if ($HorarioDefault>0) {        		
        		echo "<script type='text/javascript'>
					alert('Horario Creado');								
					
	  		  	</script>";
        	}else{
        		echo "<script type='text/javascript'>
					alert('Horario No Creado');								
					
	  		  	</script>";
        	}

			}









			echo "<script type='text/javascript'>alert('el usuario ha sido ingresado');
				location.href='index.php';
			</script>";	
		}else{
			echo "<script type='text/javascript'>alert('Error al registrar el usuario');
				location.href='registro.php';
			</script>";	
		}
	}
		
	}




}


require_once('vista/vistaRegistro.php');
?>