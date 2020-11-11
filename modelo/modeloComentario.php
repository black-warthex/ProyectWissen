<?php
require_once('conexion.php');
	Class comentario{

		public function insert_comentario($comentario,$tipo,$usuario){

		try{

			$adm=conexion::conexionDB()->prepare('call insert_comentario(?,?,?)');			
			$adm->BindParam(1,$comentario);
			$adm->BindParam(2,$tipo);	
			$adm->BindParam(3,$usuario);		

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
	public function mostrar_comentarios(){

		try{

			$adm=conexion::conexionDB()->prepare('call mostrar_comentarios()');			

			$adm->execute();

			$comenta=$adm->fetchAll();			


		}catch(Execption $e){

			echo 'Error de consulta'.$e;

		}

		return $comenta;

	}


	}

 ?>