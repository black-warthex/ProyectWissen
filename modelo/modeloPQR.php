<?php 

require_once('conexion.php');

class pqr{
//	buscar pqr
	public  function BuscarPQR($pqr1){

		try{

			$adm=conexion::conexionDB()->prepare('call BuscarPQR(?);');			
			
			$adm->BindParam(1,$pqr1);

			$adm->execute();

			$pqr=$adm->fetchAll();			


		}catch(Execption $e){

			echo 'Error de consulta'.$e;

		}


		return $pqr;

	}
    // Mostrar todas las pqr

  public function mostrar_pqr(){

		try{

			$adm=conexion::conexionDB()->prepare('call mostrar_pqr()');			

			$adm->execute();
			while ($fila=$adm->fetch()) {
				$pqr[]=$fila;
			}

		}catch(Execption $e){

			echo 'Error de consulta'.$e;

		}

		return $pqr;

	}

	//Insertar las pqr
	public static function insertar_pqr($asunto,$descripcion,$usuario,$tipo){
		$pqrf=false;
		try {
			$ps=conexion::conexionDB()->prepare ('call InsertarPqr(?,?,?,?)');
			$ps->bindParam(1,$asunto);
			$ps->bindParam(2,$descripcion);
			$ps->bindParam(3,$usuario);
			$ps->bindParam(4,$tipo);

		
		if($ps->execute()){
				$datos=1;
			}else{
				$datos=0;
			}


			
		} catch (Exception $e) {
			echo "Error en insertar PQR".$e;
		}
		return $datos;
	}

	// filtar por tipo de pqr

	public static function filtro_Pqr($tipo){

		
		try {
			$ps=conexion::conexionDB()->prepare('call filtro_Pqr(?)');
			$ps->bindParam(1,$tipo);
			$ps->execute();
			$pqrf=$ps->fetchAll();
			
		} catch (Exception $e) {
			echo "Error en el filto de tipo";			
		}
		return $pqrf;
	}


	// filtar por tipo de pqr TODOS

	public static function filtro_Pqr_Todos($tipotodo){

		
		try {
			$ps=conexion::conexionDB()->prepare('call filtro_Pqr_Todos(?)');
			$ps->bindParam(1,$tipotodo);
			$ps->execute();
			$pqrtodosfiltos=$ps->fetchAll();
			
		} catch (Exception $e) {
			echo "Error";			
		}
		return $pqrtodosfiltos;
	}
	//Actualizar las Pqr

	public static function UpdatePQR($codpqr,$adm,$resp){
		$datos=false;
		$dat=0;
		try {
			$acpqr=conexion::conexionDB()->prepare('call UpdatePQR(?,?,?);');
			$acpqr->bindParam(1,$codpqr);
			$acpqr->bindParam(2,$adm);
			$acpqr->bindParam(3,$resp);
			if($acpqr->execute()){
				$datos=1;
			}else{
				$datos=0;
			}
			
			
		} catch (Exception $e) {
			echo "Error en la respuesta de la PQR";
			
		}
		return $datos;

	}

}

?>