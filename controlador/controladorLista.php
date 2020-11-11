<?php 
require_once('modelo/modeloCalificacion.php');
require_once('fpdf/reporteempleado.php');
require_once('modelo/modeloHorario.php');
$hor= new horario();
$cal=new calificacion();
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

$estado=0;
//cargar cursos

$cursos=$hor->buscar_cursos();	

if (isset($_POST['curso'])) {
	$cur=$_POST['curso'];
	$alumnos=$cal->alumnos_curso($cur);	
	if (count($alumnos)>0) {		
		$estado=1;
	}else{
		$estado=2;
	}
}

if (isset($_POST['btn_consulta'])) {
$pdf = new PDF();
$pdf->AliasNbPages();

	$curr=$_POST['cursso'];
	$alumnoss=$cal->alumnos_curso($curr);	

//L horizontal P vertical hoja TAMAÑO
$pdf->AddPage('L','Letter');
$codigo=1;
$pdf->SetFont('Arial','B',15);
$pdf->Text(125,35,"CURSO $curr");
$pdf->Ln(5);
$pdf->Cell(260,10,'Registro de Asistencia',1,1,'C');
    $pdf->Cell(10,30,'#',1,0,'C');
    $pdf->Cell(80,30,'Nombres y Apellido',1,0,'C');
    $pdf->Cell(85,10,'Profesor: ',1,0,'L');
    $pdf->Cell(85,10,'Materia: ',1,1,'C');
    $pdf->Cell(90,10,'',0,0,'C');
    $pdf->Cell(170,10,'Numero de clase',1,1,'C');
    $pdf->Cell(90,10,'',0,0,'C'); 
    for ($i=0; $i <=16 ; $i++) { 
    $pdf->Cell(10,10,'',1,0,'C');
    }
    $pdf->Cell(10,10,'',0,1,'C');
    $pdf->SetFont('Times','',12);
    foreach ($alumnoss as $aa) {
	$nomee="$aa[2] $aa[3]";
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
$pdf->Output('Lista_Asistencia_$curr','I');

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




require_once('vista/vistaLista.php');
?>