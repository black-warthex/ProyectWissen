<?php 
require_once('conexion.php');

class horario{

	public function buscar_profesores(){

		try{

			$hor=conexion::conexionDB()->prepare('call buscar_profesores()');			

			$hor->execute();

			$profesores=$hor->fetchAll();			


		}catch(Execption $e){

			echo 'Error de consulta'.$e;

		}

		return $profesores;

	}

	public function buscar_cursos(){

		try{

			$hor=conexion::conexionDB()->prepare('call buscar_cursos()');			
			

			$hor->execute();

			$cursos=$hor->fetchAll();			


		}catch(Execption $e){

			echo 'Error de consulta'.$e;

		}


		return $cursos;

	}

	public function buscar_horario($curso,$dia){

		try{

			$hor=conexion::conexionDB()->prepare('call readHorario(?,?)');			

			$hor->BindParam(1,$curso);
			$hor->BindParam(2,$dia);	

			$hor->execute();

			$horarioxdia=$hor->fetchAll();			


		}catch(Execption $e){

			echo 'Error de consulta'.$e;

		}

		return $horarioxdia;

	}

	public function buscar_grado($curso){

		try{

			$hor=conexion::conexionDB()->prepare('call buscar_grado(?)');			
			$hor->BindParam(1,$curso);

			$hor->execute();

			$grado=$hor->fetchAll();			


		}catch(Execption $e){

			echo 'Error de consulta'.$e;

		}

		return $grado;

	}	

	public function buscar_materias($grado){

		try{

			$adm=conexion::conexionDB()->prepare('call buscar_materias(?)');			
			$adm->BindParam(1,$grado);

			$adm->execute();

			$materias=$adm->fetchAll();			


		}catch(Execption $e){

			echo 'Error de consulta'.$e;

		}

		return $materias;

	}

	public function borrarLibre($curso,$dia,$hora){

		try{

			$hor=conexion::conexionDB()->prepare('call LiberarHora(?,?,?)');
			
			$hor->BindParam(1,$curso);
			$hor->BindParam(2,$dia);
			$hor->BindParam(3,$hora);									
			if($hor->execute()){
				$estado=1;
			}else{
				$estado=0;
			}

		}catch(Execption $e){

			echo 'Error de consulta'.$e;

		}

		return $estado;


	}	
	public function disponibilidad_profesor($dia,$hora,$profesor){

		try{

			$hor=conexion::conexionDB()->prepare('call disponibilidad2(?,?,?)');			
			$hor->BindParam(1,$dia);
			$hor->BindParam(2,$hora);
			$hor->BindParam(3,$profesor);
			

			$hor->execute();

			$disponibilidad=$hor->fetchAll();			


		}catch(Execption $e){

			echo 'Error de consulta'.$e;

		}

		return $disponibilidad;

	}
	public function DeleteHorario($dia,$hora,$pro){

		try{

			$hor=conexion::conexionDB()->prepare('call deleteHorario(?,?,?)');
			
			
			$hor->BindParam(1,$dia);
			$hor->BindParam(2,$hora);						
			$hor->BindParam(3,$pro);
			if($hor->execute()){
				$estado=1;
			}else{
				$estado=0;
			}

		}catch(Execption $e){

			echo 'Error de consulta'.$e;

		}

		return $estado;


	}	

	public function updateHorario($curso,$materia,$dia,$hora,$pro){

		try{

			$hor=conexion::conexionDB()->prepare('call updateHorario(?,?,?,?,?)');
			$hor->BindParam(1,$curso);
			$hor->BindParam(2,$materia);			
			$hor->BindParam(3,$dia);
			$hor->BindParam(4,$hora);						
			$hor->BindParam(5,$pro);
			if($hor->execute()){
				$estado=1;
			}else{
				$estado=0;
			}

		}catch(Execption $e){

			echo 'Error de consulta'.$e;

		}

		return $estado;
	}
		

}
?>