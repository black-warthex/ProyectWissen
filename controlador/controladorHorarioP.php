<?php  
require_once('modelo/modeloProfesor.php');
require_once('modelo/modeloAdministrador.php');
require_once('modelo/modeloUsuario.php');
$adm= new administrador();

$usu= new modelo_usuario();
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


$pro= new profesor();


$profesores=$pro->buscar_profesores();

//comprobar horas existentes
//cantidad de horas
$cantHoras=$adm->buscar_cant_horas();
foreach ($cantHoras as $horas) {
	$numHoras=$horas[0];
}

//Recibir documento y nombre de el docente
if (isset($_POST['doc_profesor'])) {

	$docu=$_POST['doc_profesor'];	  
	//rellenar vacios
	for ($dia=1; $dia <=5 ; $dia++) { 
		
	  	for ($i=1; $i <=$numHoras ; $i++) { 	  		
			
	  		$libre=$pro->restaurar_hora($docu,$dia,$i);
			  
	  		if (0<(count($libre))) {
	  			//echo "existe hora $i <br>";
	  		}else{
				  $alfin=$pro->insertar_horaLibre($dia,$i,$docu);	
				   	  		  	 	  				 	
	  		}
	  		
	  	}	
   		
	   }

   	//buscar nombre de profesor
   	$datosProfesor=$usu->consultar_documento($docu);	  	
   	$nombreProfesor="";
   	foreach ($datosProfesor as $date) {
   		$nombreProfesor="$date[3] $date[4]";
   	}
 	// Lunes  	
   	$horario=$pro->verHorario($docu,1);   	   	   	
	
// while ($numHoras!=$hor) {
// 	$valida = array();	
// 	$a=1;	
// 	$po=0;

// 	echo "las horas son $hor";
// 	foreach ($horario as $hr) {
// 		$valida[$po] = $hr[5];	
// 		echo "aqui $hr[5]<br>";
// 		$po+=1;		
// 	}		
// 	foreach ($valida as $v) {	 

// 	 			echo "v es $v[0] a es $a<br>"; 
				
// 	 	  			if ($v[0]==$a) {	 	  				
// 	 	  				$a+=1;		 	  				
// 	 	  			}else{	 	  				
// 	 	  				$falta=$a;	 	  					 	 	  				 	  				
// 	 	  					echo "falta $falta<br><br> "	;	 	  					 	  				
// 	 	  			//queda en 7
// 	 	  			$alfin=$pro->insertar_horaLibre($falta,$docu);	 	  		  	 	  				 	 	  			
// 	}

// 	}
// 	$horario=$pro->verHorario($docu,1);   	 	  					 	  		 	  	
// 	$hor=(count($horario));
// }	
	 	  	   	
  
   	
   	
   		
   
   
   	// Martes
   	$horarioMar=$pro->verHorario($docu,2);
   	//Miercoles
   	$horarioMie=$pro->verHorario($docu,3);
   	// Jueves
   	$horarioJue=$pro->verHorario($docu,4);
   	// viernes
   	$horarioVie=$pro->verHorario($docu,5);

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


require_once('vista/vistaHorarioP.php');	
 ?>

