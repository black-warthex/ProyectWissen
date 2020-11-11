<?php 

require_once('modelo/modeloAdministrador.php');
require_once('modelo/modeloCalificacion.php');
require_once('fpdf/reporteempleado.php');
require_once('modelo/modeloUsuario.php');
$usu = new modelo_usuario();
$cal=new calificacion();
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


if (isset($_POST['pdf'])) {
	$pdf = new PDF();
$pdf->AliasNbPages();
//L horizontal P vertical hoja TAMAÑO
$pdf->AddPage('L','Letter');
$alumnos=$cal->alumnos_curso('1001');
$codigo=1;
$pdf->SetFont('Arial','B',15);
$pdf->Text(125,35,"CURSO 1001");
$pdf->Ln(5);
$pdf->Cell(260,10,'Registro de Asistencia',1,1,'C');
    $pdf->Cell(10,30,'#',1,0,'C');
    $pdf->Cell(80,30,'Nombres y Apellido',1,0,'C');
    $pdf->Cell(85,10,'Profesor: Esteban Chavez',1,0,'L');
    $pdf->Cell(85,10,'Materia: Ingles',1,1,'C');
    $pdf->Cell(90,10,'',0,0,'C');
    $pdf->Cell(170,10,'Numero de clase',1,1,'C');
    $pdf->Cell(90,10,'',0,0,'C'); 
    for ($i=0; $i <=16 ; $i++) { 
    $pdf->Cell(10,10,'',1,0,'C');
    }
    $pdf->Cell(10,10,'',0,1,'C');
    $pdf->SetFont('Times','',12);
foreach ($alumnos as $a) {
	$nomee="$a[2] $a[3]";
	$pdf->Cell(10,10,$codigo,1,0,'C'); 
	$pdf->Cell(80,10,$nomee ,1,0,'C'); 	
    for ($i=0; $i <=16 ; $i++) { 
    $pdf->Cell(10,10,'',1,0,'C');    
    }
    $pdf->Cell(1,0,'',0,1,'C');
    $pdf->Ln(10);
    $codigo+=1;
}

//nombre de el archovp escoger donde guadar
$pdf->Output('Lista_Asistencia_1001','I');

}


//registrar admin o profesor
$regg=0;
if (isset($_POST['regPersonal'])) {

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


require_once('vista/vistaPerfil.php');	
 ?>

