<?php

require_once('conexion.php');


class alumno{


public function buscarCursoA($documento){

		try{

			$adm=conexion::conexionDB()->prepare('call buscarCursoM(?)');			
			$adm->BindParam(1,$documento);			
			$adm->execute();	
			$grado=$adm->fetchAll();

		}catch(Execption $e){

			echo 'Error de consulta'.$e;

		}

		return $grado;
}

public function reg_matricula($curso){

		try{

			$adm=conexion::conexionDB()->prepare('call insertMatricula(?)');			
			$adm->BindParam(1,$curso);			

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


	public function buscar_alumno($documento){

		try{

			$adm=conexion::conexionDB()->prepare('call buscar_estudiante(?)');			
			$adm->BindParam(1,$documento);
			$adm->execute();

			$codMat=$adm->fetchAll();			


		}catch(Execption $e){

			echo 'Error de consulta'.$e;

		}

		return $codMat;

	}

	public function update_datos($codigo,$nombre,$apellido,$fecha,$foto){

		try{

			$adm=conexion::conexionDB()->prepare('call update_datos(?,?,?,?,?)');			

			$adm->BindParam(1,$codigo);
			$adm->BindParam(2,$nombre);	
			$adm->BindParam(3,$apellido);
			$adm->BindParam(4,$fecha);
			$adm->BindParam(5,$foto);
			
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

	public function find_materias_alumno($curso){

		try{

			$pro=conexion::conexionDB()->prepare('call find_materias_alumno(?)');
			
			$pro->BindParam(1,$curso);
			$pro->execute();

			$materias=$pro->fetchAll();

		}catch(Execption $e){
			echo "Error de consulta".$e;
		}

		return $materias;
	}

		public function buscar_curso($documento){

		try{

			$pro=conexion::conexionDB()->prepare('call buscarCursoM(?)');
			
			$pro->BindParam(1,$documento);
			$pro->execute();

			$materias=$pro->fetchAll();

		}catch(Execption $e){
			echo "Error de consulta".$e;
		}

		return $materias;
	}



}
 ?>