<?php 

require_once('conexion.php');

class logros{

	public function mis_materias($documento){

		try{

			$pro=conexion::conexionDB()->prepare('call profesor_materias(?)');
			$pro->BindParam(1,$documento);
			$pro->execute();

			$materias=$pro->fetchAll();

		}catch(Execption $e){
			echo "Error de consulta".$e;
		}

		return $materias;
	}

	public function logros_materias($materia){

		try{

			$pro=conexion::conexionDB()->prepare('call logros_no_asignados(?)');
			$pro->BindParam(1,$materia);
			$pro->execute();

			$logros=$pro->fetchAll();

		}catch(Execption $e){
			echo "Error de consulta".$e;
		}

		return $logros;
	}
		public function buscar_cursos(){

		try{

			$adm=conexion::conexionDB()->prepare('call buscar_cursos()');			
			

			$adm->execute();

			$cursos=$adm->fetchAll();			


		}catch(Execption $e){

			echo 'Error de consulta'.$e;

		}


		return $cursos;

	}

	public function buscar_materias_grado(){

		try{

			$adm=conexion::conexionDB()->prepare('call buscar_materia_grado()');						
			$adm->execute();

			$materias=$adm->fetchAll();			


		}catch(Execption $e){

			echo 'Error de consulta'.$e;

		}

		return $materias;
	}

	public function buscar_grados(){

		try{

			$adm=conexion::conexionDB()->prepare('call buscar_grados()');						

			$adm->execute();

			$grado=$adm->fetchAll();			


		}catch(Execption $e){

			echo 'Error de consulta'.$e;

		}

		return $grado;

	}

	public function logros_mat($materia){

		try{

			$pro=conexion::conexionDB()->prepare('call logros_asignados(?)');
			$pro->BindParam(1,$materia);
			$pro->execute();

			$logros=$pro->fetchAll();

		}catch(Execption $e){
			echo "Error de consulta".$e;
		}

		return $logros;
	}

	public function materiaxgrado($grado){

		try{

			$pro=conexion::conexionDB()->prepare('call materiaxgrado(?)');
			$pro->BindParam(1,$grado);
			$pro->execute();

			$logros=$pro->fetchAll();

		}catch(Execption $e){
			echo "Error de consulta".$e;
		}

		return $logros;
	}

	public function nombre_materia($materia){

		try{

			$pro=conexion::conexionDB()->prepare('call nombre_materia(?)');
			$pro->BindParam(1,$materia);
			$pro->execute();

			$logros=$pro->fetchAll();

		}catch(Execption $e){
			echo "Error de consulta".$e;
		}

		return $logros;
	}

	public function insert_lperiodo($codigoL,$nombreP){

		try{

			$adm=conexion::conexionDB()->prepare('call insertar_Lperiodo(?,?)');
			$adm->BindParam(1,$codigoL);
			$adm->BindParam(2,$nombreP);					

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

	public function delete_lperiodo($codigoL,$nombreP){

		try{

			$adm=conexion::conexionDB()->prepare('call eliminar_Lperiodo(?,?)');
			$adm->BindParam(1,$codigoL);
			$adm->BindParam(2,$nombreP);					

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
	
}


?>
