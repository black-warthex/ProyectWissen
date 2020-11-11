<?php  
require_once('modelo/modeloAdministrador.php');
require_once('modelo/modeloComentario.php');



$adm= new administrador();
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
// ZONA DE COMENTARIOS
$com = new comentario();
$cmn=$com->mostrar_comentarios();
if(isset($_POST['reg_com'])){
	$comentario=$_POST['com_com'];
	$tipo=$_POST['com_tip'];
	$persona="$nombre $apellido";
	$estado=$com->insert_comentario($comentario,$tipo,$persona);

	if ($estado>0) {
		echo "<script>
				alert('Ingresado');
		</script>";
	}else{
		echo "<script>
				alert('Error,comentario no ingresado');
		</script>";
	}
	$cmn=$com->mostrar_comentarios();
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


require_once('vista/vistaComentarios.php');
?>