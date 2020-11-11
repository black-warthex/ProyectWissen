<?php 
require_once('conexion.php');

Class profesor{

	public function verHorario($documento,$dia){

		try{

			$pro=conexion::conexionDB()->prepare('call verHorarioP(?,?)');
			
			$pro->BindParam(1,$documento);
			$pro->BindParam(2,$dia);			

			$pro->execute();

			$horario=$pro->fetchAll();			

		

		}catch(Execption $e){

			echo 'Error de consulta'.$e;

		}

		return $horario;

	}

	public function buscar_profesores(){

		try{

			$pro=conexion::conexionDB()->prepare('call buscar_profesores()');			

			$pro->execute();

			$profesores=$pro->fetchAll();			


		}catch(Execption $e){

			echo 'Error de consulta'.$e;

		}

		return $profesores;

	}

	public function restaurar_hora($documento,$dia,$hora){

		try{

			$pro=conexion::conexionDB()->prepare('call restaurar_horas(?,?,?)');			

			$pro->BindParam(1,$documento);
			$pro->BindParam(2,$dia);	
			$pro->BindParam(3,$hora);
			
			$pro->execute();

			$profesores=$pro->fetchAll();			


		}catch(Execption $e){

			echo 'Error de consulta'.$e;

		}

		return $profesores;

	}

	public function insertar_horaLibre($dia,$hora,$profesor){

		try{

			$adm=conexion::conexionDB()->prepare('call recuperar_hora(?,?,?)');			

			$adm->BindParam(1,$dia);
			$adm->BindParam(2,$hora);
			$adm->BindParam(3,$profesor);	
			
			
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


		public function buscar_cant_horas(){

		try{

			$adm=conexion::conexionDB()->prepare('call cantHoras()');			

			$adm->execute();

			$cantHoras=$adm->fetchAll();			


		}catch(Execption $e){

			echo 'Error de consulta'.$e;

		}

		return $cantHoras;

	}


	
}


 ?>