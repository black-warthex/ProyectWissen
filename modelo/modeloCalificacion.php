<?php 
require_once('conexion.php');

class calificacion{

	public function find_curso($profesor){

		try{

			$pro=conexion::conexionDB()->prepare('call find_cursos(?)');
			$pro->BindParam(1,$profesor);
			$pro->execute();

			$cursos=$pro->fetchAll();

		}catch(Execption $e){
			echo "Error de consulta".$e;
		}

		return $cursos;
	}

	public function find_materias($profesor,$curso){

		try{

			$pro=conexion::conexionDB()->prepare('call find_materias(?,?)');
			$pro->BindParam(1,$profesor);
			$pro->BindParam(2,$curso);
			$pro->execute();

			$materias=$pro->fetchAll();

		}catch(Execption $e){
			echo "Error de consulta".$e;
		}

		return $materias;
	}

	public function default_calificacion($alumno,$logro){

		try{

			$adm=conexion::conexionDB()->prepare('call default_calificacion(?,?)');
			$adm->BindParam(1,$alumno);
			$adm->BindParam(2,$logro);
			

			if($adm->execute()){
				$estado=1;
			}else{
				$estado=0;
			}

		}catch(Execption $e){

			echo 'Error de consulta'.$e;

		}

		return $estado;

	}
	public function modificar_calificacion($estado,$alumno,$logro){

		try{

			$adm=conexion::conexionDB()->prepare('call modificar_calificacion(?,?,?)');
			$adm->BindParam(1,$estado);
			$adm->BindParam(2,$alumno);
			$adm->BindParam(3,$logro);
			

			if($adm->execute()){
				$estado=1;
			}else{
				$estado=0;
			}

		}catch(Execption $e){

			echo 'Error de consulta'.$e;

		}

		return $estado;

	}

	public function cantidad_logros($periodo,$materia){

		try{

			$pro=conexion::conexionDB()->prepare('call cantidad_logros(?,?)');
			$pro->BindParam(1,$periodo);
			$pro->BindParam(2,$materia);
			$pro->execute();

			$materias=$pro->fetchAll();

		}catch(Execption $e){
			echo "Error de consulta".$e;
		}

		return $materias;
	}

	public function alumnos_curso($curso){

		try{

			$pro=conexion::conexionDB()->prepare('call find_alumnosC(?)');
			$pro->BindParam(1,$curso);			
			$pro->execute();

			$materias=$pro->fetchAll();

		}catch(Execption $e){
			echo "Error de consulta".$e;
		}

		return $materias;
	}

	public function logros_periodo($periodo,$materia){

		try{

			$pro=conexion::conexionDB()->prepare('call logros_periodo(?,?)');
			$pro->BindParam(1,$periodo);
			$pro->BindParam(2,$materia);
			$pro->execute();

			$logros=$pro->fetchAll();

		}catch(Execption $e){
			echo "Error de consulta".$e;
		}

		return $logros;
	}

	public function logros_alumno($alumno,$materia,$logros){

		try{

			$pro=conexion::conexionDB()->prepare('call logros_alumno(?,?,?)');
			$pro->BindParam(1,$alumno);
			$pro->BindParam(2,$materia);			
			$pro->BindParam(3,$logros);
			$pro->execute();

			$logros=$pro->fetchAll();

		}catch(Execption $e){
			echo "Error de consulta".$e;
		}

		return $logros;
	}

	public function 	comprobar_logros($usuario,$logro){

		try{

			$pro=conexion::conexionDB()->prepare('call comprobar_logros(?,?)');
			$pro->BindParam(1,$usuario);
			$pro->BindParam(2,$logro);
			$pro->execute();

			$logros=$pro->fetchAll();

		}catch(Execption $e){
			echo "Error de consulta".$e;
		}

		return $logros;
	}







}


?>
